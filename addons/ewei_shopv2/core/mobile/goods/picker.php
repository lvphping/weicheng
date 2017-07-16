<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Picker_EweiShopV2Page extends MobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$rank = intval($_SESSION[$id . '_rank']);
		$join_id = intval($_SESSION[$id . '_join_id']);
		$seckillinfo = false;
		$seckill = p('seckill');
		if ($seckill) 
		{
			$time = time();
			$seckillinfo = $seckill->getSeckill($id);
			if (!(empty($seckillinfo))) 
			{
				if (($seckillinfo['starttime'] <= $time) && ($time < $seckillinfo['endtime'])) 
				{
					$seckillinfo['status'] = 0;
				}
				else if ($time < $seckillinfo['starttime']) 
				{
					$seckillinfo['status'] = 1;
				}
				else 
				{
					$seckillinfo['status'] = -1;
				}
			}
		}
		$goods = pdo_fetch('select id,thumb,title,marketprice,total,maxbuy,minbuy,unit,hasoption,showtotal,diyformid,diyformtype,diyfields,isdiscount,presellprice,' . "\n" . '                isdiscount_time,isdiscount_discounts, needfollow, followtip, followurl, `type`, isverify, maxprice, minprice, merchsale,ispresell,preselltimeend' . "\n" . '                from ' . tablename('ewei_shop_goods') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (empty($goods)) 
		{
			show_json(0);
		}
		$goods['thistime'] = time();
		$goods = set_medias($goods, 'thumb');
		$openid = $_W['openid'];
		if (is_weixin()) 
		{
			$follow = m('user')->followed($openid);
			if (!(empty($goods['needfollow'])) && !($follow)) 
			{
				$followtip = ((empty($goods['followtip']) ? '如果您想要购买此商品，需要您关注我们的公众号，点击【确定】关注后再来购买吧~' : $goods['followtip']));
				$followurl = ((empty($goods['followurl']) ? $_W['shopset']['share']['followurl'] : $goods['followurl']));
				show_json(2, array('followtip' => $followtip, 'followurl' => $followurl));
			}
		}
		$openid = $_W['openid'];
		$member = m('member')->getMember($openid);
		$member = m('member')->getMember($_W['openid']);
		if (empty($openid)) 
		{
			show_json(4);
		}
		if (!(empty($_W['shopset']['wap']['open'])) && !(empty($_W['shopset']['wap']['mustbind'])) && empty($member['mobileverify'])) 
		{
			show_json(3);
		}
		if ($goods['isdiscount'] && (time() <= $goods['isdiscount_time'])) 
		{
			$isdiscount = true;
			$isdiscount_discounts = json_decode($goods['isdiscount_discounts'], true);
			$levelid = $member['level'];
			$key = ((empty($levelid) ? 'default' : 'level' . $levelid));
		}
		else 
		{
			$isdiscount = false;
		}
		$task_goods_data = m('goods')->getTaskGoods($openid, $id, $rank, $join_id);
		if (empty($task_goods_data['is_task_goods'])) 
		{
			$is_task_goods = 0;
		}
		else 
		{
			$is_task_goods = $task_goods_data['is_task_goods'];
			$is_task_goods_option = $task_goods_data['is_task_goods_option'];
			$task_goods = $task_goods_data['task_goods'];
		}
		$specs = false;
		$options = false;
		if (!(empty($goods)) && $goods['hasoption']) 
		{
			$specs = pdo_fetchall('select* from ' . tablename('ewei_shop_goods_spec') . ' where goodsid=:goodsid and uniacid=:uniacid order by displayorder asc', array(':goodsid' => $id, ':uniacid' => $_W['uniacid']));
			foreach ($specs as &$spec ) 
			{
				$spec['items'] = pdo_fetchall('select * from ' . tablename('ewei_shop_goods_spec_item') . ' where specid=:specid and `show`=1 order by displayorder asc', array(':specid' => $spec['id']));
			}
			unset($spec);
			$options = pdo_fetchall('select * from ' . tablename('ewei_shop_goods_option') . ' where goodsid=:goodsid and uniacid=:uniacid order by displayorder asc', array(':goodsid' => $id, ':uniacid' => $_W['uniacid']));
		}
		if ($seckillinfo && ($seckillinfo['status'] == 0)) 
		{
			$minprice = $maxprice = $goods['marketprice'] = $seckillinfo['price'];
			if ((0 < count($seckillinfo['options'])) && !(empty($options))) 
			{
				foreach ($options as &$option ) 
				{
					foreach ($seckillinfo['options'] as $so ) 
					{
						if ($option['id'] == $so['optionid']) 
						{
							$option['marketprice'] = $so['price'];
						}
					}
				}
				unset($option);
			}
		}
		else 
		{
			$minprice = $goods['minprice'];
			$maxprice = $goods['maxprice'];
		}
		if (!(empty($is_task_goods))) 
		{
			if (isset($options) && (0 < count($options)) && $goods['hasoption']) 
			{
				$prices = array();
				foreach ($task_goods['spec'] as $k => $v ) 
				{
					$prices[] = $v['marketprice'];
				}
				$minprice = min($prices);
				$maxprice = max($prices);
				foreach ($options as $k => $v ) 
				{
					$option_id = $v['id'];
					if (array_key_exists($option_id, $task_goods['spec'])) 
					{
						if ((0 < $goods['ispresell']) && (($goods['preselltimeend'] == 0) || (time() < $goods['preselltimeend']))) 
						{
							$options[$k]['marketprice'] = $task_goods['spec'][$option_id]['presellprice'];
						}
						else 
						{
							$options[$k]['marketprice'] = $task_goods['spec'][$option_id]['marketprice'];
						}
						$options[$k]['stock'] = $task_goods['spec'][$option_id]['total'];
					}
					$prices[] = $v['marketprice'];
				}
			}
			else 
			{
				$minprice = $task_goods['marketprice'];
				$maxprice = $task_goods['marketprice'];
			}
		}
		else 
		{
			if ($goods['isdiscount'] && (time() <= $goods['isdiscount_time'])) 
			{
				$goods['oldmaxprice'] = $maxprice;
				$isdiscount_discounts = json_decode($goods['isdiscount_discounts'], true);
				$prices = array();
				if (!(isset($isdiscount_discounts['type'])) || empty($isdiscount_discounts['type'])) 
				{
					$level = m('member')->getLevel($openid);
					$prices_array = m('order')->getGoodsDiscountPrice($goods, $level, 1);
					$prices[] = $prices_array['price'];
				}
				else 
				{
					$goods_discounts = m('order')->getGoodsDiscounts($goods, $isdiscount_discounts, $levelid, $options);
					$prices = $goods_discounts['prices'];
					$options = $goods_discounts['options'];
				}
				$minprice = min($prices);
				$maxprice = max($prices);
			}
		}
		if ((0 < $goods['ispresell']) && (($goods['preselltimeend'] == 0) || (time() < $goods['preselltimeend']))) 
		{
			$presell = pdo_fetch('select min(presellprice) as minprice,max(presellprice) as maxprice from ' . tablename('ewei_shop_goods_option') . ' where goodsid = ' . $id);
			$minprice = $presell['minprice'];
			$maxprice = $presell['maxprice'];
		}
		$goods['minprice'] = number_format($minprice, 2);
		$goods['maxprice'] = number_format($maxprice, 2);
		$diyformhtml = '';
		$diyform_plugin = p('diyform');
		if ($diyform_plugin) 
		{
			$fields = false;
			if ($goods['diyformtype'] == 1) 
			{
				if (!(empty($goods['diyformid']))) 
				{
					$diyformid = $goods['diyformid'];
					$formInfo = $diyform_plugin->getDiyformInfo($diyformid);
					$fields = $formInfo['fields'];
				}
			}
			else if ($goods['diyformtype'] == 2) 
			{
				$diyformid = 0;
				$fields = iunserializer($goods['diyfields']);
				if (empty($fields)) 
				{
					$fields = false;
				}
			}
			if (!(empty($fields))) 
			{
				ob_start();
				$inPicker = true;
				$openid = $_W['openid'];
				$member = m('member')->getMember($openid, true);
				$f_data = $diyform_plugin->getLastData(3, 0, $diyformid, $id, $fields, $member);
				$flag = 0;
				if (!(empty($f_data))) 
				{
					foreach ($f_data as $k => $v ) 
					{
						if (!(empty($v))) 
						{
							$flag = 1;
							break;
						}
					}
				}
				if (empty($flag)) 
				{
					$f_data = $diyform_plugin->getLastCartData($id);
				}
				include $this->template('diyform/formfields');
				$diyformhtml = ob_get_contents();
				ob_clean();
			}
		}
		if (!(empty($specs))) 
		{
			foreach ($specs as $key => $value ) 
			{
				foreach ($specs[$key]['items'] as $k => &$v ) 
				{
					$v['thumb'] = tomedia($v['thumb']);
				}
			}
		}
		$goods['canAddCart'] = true;
		if (($goods['isverify'] == 2) || ($goods['type'] == 2) || ($goods['type'] == 3) || ($goods['type'] == 20) || !(empty($goods['cannotrefund']))) 
		{
			$goods['canAddCart'] = false;
		}
		show_json(1, array('goods' => $goods, 'seckillinfo' => $seckillinfo, 'specs' => $specs, 'options' => $options, 'diyformhtml' => $diyformhtml));
	}
}
?>