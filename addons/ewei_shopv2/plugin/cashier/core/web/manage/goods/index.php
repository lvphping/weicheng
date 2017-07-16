<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'cashier/core/inc/page_cashier.php';
class Index_EweiShopV2Page extends CashierWebPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			$selfgoods = ((isset($_GPC['selfgoods']) ? $_GPC['selfgoods'] : array()));
			$goods = ((isset($_GPC['goods']) ? $_GPC['goods'] : array()));
			$data = $_GPC['data'];
			if ((double) $data['money'] <= 0) 
			{
				show_json(-101, '请输入有效收款金额');
			}
			$data['paytype'] = $this->model->paytype((int) $data['paytype'], $data['auth_code']);
			$params = array('auth_code' => $data['auth_code'], 'paytype' => $data['paytype'], 'money' => $data['money'], 'deduction' => $data['deduction'], 'mobile' => $data['mobile'], 'operatorid' => (isset($_W['cashieruser']['operator']) ? $_W['cashieruser']['operator']['id'] : 0));
			$res = $this->model->goodsCalculate($selfgoods, $goods, $params);
			if (is_error($res['res'])) 
			{
				if ($res['res']['errno'] == -2) 
				{
					$message = explode(':', $res['res']['message']);
					if ($message[0] != 'USERPAYING') 
					{
						show_json(-101, $res['res']);
					}
				}
				else 
				{
					show_json(-101, $res['res']);
				}
			}
			$success = $this->model->payResult($res['id']);
			($success ? show_json(1, '收款成功!') : show_json(0, $res['id']));
		}
		$cate = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_cashier_goods_category') . ' WHERE uniacid=:uniacid and cashierid=:cashierid ORDER BY displayorder desc, id DESC', array(':uniacid' => $_W['uniacid'], ':cashierid' => $_W['cashierid']));
		include $this->template();
	}
	public function get_goods() 
	{
		global $_W;
		global $_GPC;
		$keyword = trim($_GPC['keyword']);
		$cate = trim($_GPC['cate']);
		if (empty($keyword) && empty($cate)) 
		{
			show_json(0, '请选择分类或者输入关键字!');
		}
		$selfgoods = array();
		$goods = array();
		if ($cate != 'shop') 
		{
			$where = '';
			$params = array();
			if (!(empty($cate))) 
			{
				$where .= ' AND categoryid=:categoryid';
				$params[':categoryid'] = $cate;
			}
			if (!(empty($keyword))) 
			{
				if (is_numeric($keyword) && isset($keyword[7])) 
				{
					$where .= ' AND goodssn = :goodssn';
					$params[':goodssn'] = $keyword;
				}
				else 
				{
					$where .= ' AND title LIKE :keyword';
					$params[':keyword'] = '%' . $keyword . '%';
				}
			}
			$selfgoods = $this->getSelfGoods($where, $params);
		}
		if ((($cate != 'shop') && empty($cate)) || ($cate == 'shop') || empty($cate)) 
		{
			$goodsmanage = $this->getUserSet('goodsmanage');
			if (!(empty($goodsmanage['goods_ids']))) 
			{
				$where = '';
				$params = array(':uniacid' => $_W['uniacid']);
				if (!(empty($keyword))) 
				{
					if (is_numeric($keyword) && isset($keyword[7])) 
					{
						$where .= ' AND productsn = :productsn';
						$params[':productsn'] = $keyword;
					}
					else 
					{
						$where .= ' AND title LIKE :keyword';
						$params[':keyword'] = '%' . $keyword . '%';
					}
				}
				$goods_ids = implode(',', $goodsmanage['goods_ids']);
				$goods = pdo_fetchall('SELECT id,thumb,title,marketprice,total as stock,maxbuy,minbuy,productsn,unit,hasoption,showtotal,diyformid,diyformtype,diyfields,isdiscount,isdiscount_time,isdiscount_discounts, needfollow, followtip, followurl, `type`, isverify, maxprice, minprice, merchsale FROM ' . tablename('ewei_shop_goods') . ' WHERE uniacid=:uniacid AND cashier=1 AND id IN (' . $goods_ids . ') ' . $where, $params);
				foreach ($goods as $k => $g ) 
				{
					$options = false;
					$stock = 0;
					$price = $g['marketprice'];
					if (!(empty($g)) && $g['hasoption']) 
					{
						$options = pdo_fetchall('select * from ' . tablename('ewei_shop_goods_option') . ' where goodsid=:goodsid and uniacid=:uniacid order by displayorder asc', array(':goodsid' => $g['id'], ':uniacid' => $_W['uniacid']), 'id');
						if (!(empty($options))) 
						{
							foreach ($options as $key => $val ) 
							{
								$stock += $val['stock'];
							}
							$op = array_shift(array_values($options));
							$price = $op['marketprice'];
						}
					}
					$goods[$k]['stock'] = $stock;
					$goods[$k]['options'] = $options;
					$goods[$k]['price'] = $price;
				}
			}
		}
		foreach ($selfgoods as &$val ) 
		{
			$val['thumb'] = tomedia($val['image']);
		}
		unset($val);
		foreach ($goods as &$val ) 
		{
			$val['thumb'] = tomedia($val['thumb']);
		}
		unset($val);
		show_json(1, array('selfgoods' => $selfgoods, 'goods' => $goods));
	}
	protected function getSelfGoods($where = '', $params = array()) 
	{
		global $_W;
		$params = array_merge(array(':cashierid' => $_W['cashierid']), $params);
		$selfgoods = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_cashier_goods') . ' WHERE cashierid=:cashierid ' . $where . ' AND status=1 AND total<>0', $params);
		return $selfgoods;
	}
}
?>