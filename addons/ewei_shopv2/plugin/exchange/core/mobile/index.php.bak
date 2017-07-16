<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Index_EweiShopV2Page extends PluginMobileLoginPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$codetype = intval($_GPC['codetype']);
		$id = intval($_GPC['id']);
		if (empty($id) && !(empty($codetype))) 
		{
			$this->message('页面不存在', '', 'error');
		}
		else if (!(empty($id))) 
		{
			$_SESSION['exchangeGroupId'] = $id;
		}
		$key = trim($_GPC['key']);
		if (!(empty($codetype))) 
		{
			$res = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_group') . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $id));
			$banner = json_decode($res['banner'], 1);
			if (p('diypage')) 
			{
				$diypage = p('diypage')->exchangePage($res['diypage']);
				if ($diypage) 
				{
					include $this->template('diypage/exchange');
					exit();
				}
			}
			include $this->template('exchange/common');
			exit();
		}
		if (empty($key) && !(empty($_SESSION['exchange_key']))) 
		{
			$key = $_SESSION['exchange_key'];
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '1') 
		{
			show_json($is_exchange[2], mobileUrl('exchange.' . $is_exchange[1], array('exchange' => 1), 1));
			header('Location:' . mobileUrl('exchange.' . $is_exchange[1]));
		}
		else 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1], '', 'error');
		}
	}
	private function is_exchange($key) 
	{
		global $_W;
		if (empty($_SESSION['exchangeGroupId'])) 
		{
			$return = array('0', '兑换超时,请重试');
			return $return;
		}
		$_SESSION['exchange_key'] = NULL;
		$return = array();
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT * FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key` = :key', array(':uniacid' => $_W['uniacid'], ':key' => $key));
		if ($_SESSION['exchangeGroupId'] != $codeResult['groupid']) 
		{
			$return = array('0', '兑换码不存在或已失效');
			return $return;
		}
		if ($codeResult === false) 
		{
			$return = array('0', '兑换码不存在或已失效');
			return $return;
		}
		if ($codeResult['status'] == 2) 
		{
			$return = array('0', '兑换码已兑换');
			return $return;
		}
		if (strtotime($codeResult['endtime']) <= time()) 
		{
			$return = array('0', '兑换码已过期');
			return $return;
		}
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		if (!(empty($codeResult['openid'])) && ($codeResult['openid'] != $_W['openid']) && !(empty($groupResult['binding']))) 
		{
			$return = array('0', '兑换码已绑定其他用户');
			return $return;
		}
		pdo_query('UPDATE ' . tablename('ewei_shop_exchange_code') . ' SET openid = :openid , `count` = `count` + 1 WHERE openid != :openid AND uniacid = :uniacid AND `key`=:key', array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid'], ':key' => $key));
		if ($groupResult === false) 
		{
			$return = array('0', '兑换活动不存在');
			return $return;
		}
		if (strtotime($groupResult['endtime']) <= time()) 
		{
			$return = array('0', '兑换活动已结束');
			return $return;
		}
		if ($groupResult['status'] == 0) 
		{
			$return = array('0', '兑换活动暂停中');
			return $return;
		}
		if (time() < strtotime($groupResult['starttime'])) 
		{
			$return = array('0', '兑换活动未开始');
			return $return;
		}
		@session_start();
		$_SESSION['exchange_key'] = $key;
		switch ($groupResult['mode']) 
		{
			case '1': $method = 'goods';
			break;
			case 2: $method = 'balance';
			break;
			case 3: $method = 'redpacket';
			break;
			case 4: $method = 'score';
			break;
			case 5: $method = 'coupon';
			break;
			case 6: $method = 'group';
			break;
		}
		$return = array('1', $method, $groupResult['mode']);
		return $return;
	}
	public function balance() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, '未检测到兑换码');
			$this->message('未检测到兑换码');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'balance') 
		{
			show_json(0, '兑换类型不符');
			$this->message('兑换类型不符');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			$type = 1;
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['type'] == 1) 
			{
				$balance = $groupResult['balance'];
				$str = '兑换中心：余额兑换';
				$channel = 1;
			}
			else if ($groupResult['type'] == 2) 
			{
				$balance = rand($groupResult['balance_left'] * 100, $groupResult['balance_right'] * 100) / 100;
			}
			else if ($groupResult['type'] == 3) 
			{
				$type = 2;
				$balance = $groupResult['balance'];
				$str = '余额充值';
				$channel = 2;
			}
			$balance = round($balance, 2);
			$balance_res = $this->chongzhi('credit2', $member['id'], 0, $balance, $str, $channel);
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1));
				pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				$info = m('member')->getInfo($_W['openid']);
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'balance' => $balance, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 2, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
				$this->notice($balance, $_W['openid'], $type);
				pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
				show_json(1, '恭喜！成功兑换了' . $balance . '元');
				$this->message('成功充值了' . $balance . '元');
			}
			else 
			{
				show_json(0, '很遗憾！兑换失败了！');
				$this->message('充值失败');
			}
		}
		else 
		{
			$this->message('点击充值', mobileUrl('exchange.balance', array('exchange' => 1)));
		}
	}
	public function score() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, '未检测到兑换码');
			$this->message('未检测到兑换码');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'score') 
		{
			show_json(0, '兑换类型不符');
			$this->message('兑换类型不符');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['type'] == 1) 
			{
				$score = $groupResult['score'];
			}
			else 
			{
				$score = rand($groupResult['score_left'], $groupResult['score_right']);
			}
			$balance_res = $this->chongzhi('credit1', $member['id'], 0, $score, '兑换中心:积分兑换');
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1));
				pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				$info = m('member')->getInfo($_W['openid']);
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'score' => $score, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 4, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
				$this->notice($score, $_W['openid'], 3);
				pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
				show_json(1, '成功兑换了' . $score . '个积分');
				$this->message('成功兑换了' . $score . '个积分');
			}
			else 
			{
				show_json(0, '很遗憾，兑换失败了');
				$this->message('兑换失败');
			}
		}
		else 
		{
			$this->message('点击兑换积分', mobileUrl('exchange.score', array('exchange' => 1)));
		}
	}
	public function redpacket() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, '未检测到兑换码');
			$this->message('未检测到兑换码');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'redpacket') 
		{
			show_json(0, '兑换类型不符');
			$this->message('兑换类型不符');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			load()->model('payment');
			$setting = uni_setting($_W['uniacid'], array('payment'));
			if (isset($setting['payment']['wechat']) && is_array($setting['payment']['wechat'])) 
			{
				$wechat = $setting['payment']['wechat'];
			}
			$account = pdo_get('account_wechats', array('uniacid' => $_W['uniacid']), array('key', 'secret'));
			$sec = m('common')->getSec();
			$sec = iunserializer($sec['sec']);
			if ($groupResult['type'] == 1) 
			{
				$red = $groupResult['red'];
			}
			else 
			{
				$red = rand($groupResult['red_left'] * 100, $groupResult['red_right'] * 100) / 100;
			}
			$params = array('openid' => $_W['openid'], 'tid' => time(), 'send_name' => '人人商城:兑换中心', 'money' => $red, 'wishing' => '红包兑换', 'act_name' => '红包兑换活动', 'remark' => '兑换中心:红包兑换');
			$wechat = array('appid' => $account['key'], 'mchid' => $wechat['mchid'], 'apikey' => $wechat['apikey'], 'certs' => $sec);
			$result = m('common')->sendredpack($params, $wechat);
			if (!(is_error($result))) 
			{
				pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1));
				pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				$info = m('member')->getInfo($_W['openid']);
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'red' => $red, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 3, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
				pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
				show_json(1, '成功兑换了' . $red . '元红包');
				$this->message('成功兑换了' . $red . '元红包');
			}
			else 
			{
				show_json(0, $result['message']);
			}
		}
		else 
		{
			$this->message('点击兑换红包', mobileUrl('exchange.redpacket', array('exchange' => 1)));
		}
	}
	public function coupon() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, '未检测到兑换码');
			$this->message('未检测到兑换码');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'coupon') 
		{
			show_json(0, '兑换类型不符');
			$this->message('兑换类型不符');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			$coupon = json_decode($groupResult['coupon'], true);
			if (empty($coupon[0])) 
			{
				show_json(0, '没有可兑换的优惠券');
				$this->message('没有可兑换的优惠券');
			}
			if ($groupResult['type'] == 1) 
			{
				$condition = '(';
				foreach ($coupon as $k => $item ) 
				{
					$condition .= 'id = ' . $item . ' OR ';
				}
				$condition = substr($condition, 0, -4);
				$condition .= ')';
				$record_coupon = $groupResult['coupon'];
			}
			else 
			{
				$rand = array_rand($coupon, 1);
				$condition = 'id = ' . $coupon[$rand];
				$record_coupon = json_encode($coupon[$rand]);
			}
			$allCoupon = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_coupon') . ' WHERE ' . $condition . ' and uniacid=:uniacid and merchid=0', array(':uniacid' => $_W['uniacid']));
			if (empty($allCoupon[0])) 
			{
				show_json(0, '没有可兑换的优惠券');
				$this->message('没有可兑换的优惠券');
			}
			$m = m('member')->getInfo($_W['openid']);
			$resp = array();
			$resp['resptitle'] = '优惠券兑换成功';
			$resp['respdesc'] = '您兑换的优惠券已发放到账户中,点击立即使用';
			$resp['respurl'] = mobileUrl('sale.coupon.my', array(), 1);
			$resp['respthumb'] = '';
			foreach ($allCoupon as $k => $v ) 
			{
				$data = array('uniacid' => $_W['uniacid'], 'merchid' => 0, 'openid' => $_W['openid'], 'couponid' => $v['id'], 'gettype' => 7, 'gettime' => time(), 'senduid' => $_W['uid']);
				pdo_insert('ewei_shop_coupon_data', $data);
			}
			$this->model->sendMessage($resp, 1, $m);
			pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
			$info = m('member')->getInfo($_W['openid']);
			$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'coupon' => $record_coupon, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 5, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
			pdo_insert('ewei_shop_exchange_record', $record);
			pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
			show_json(1, '兑换成功');
			$this->message('兑换成功');
		}
		else 
		{
			$this->message('点击兑换优惠券', mobileUrl('exchange.coupon', array('exchange' => 1)));
		}
	}
	public function goods() 
	{
		global $_W;
		global $_GPC;
		$exchange = trim($_GPC['exchange']);
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, '未检测到兑换码');
			$this->message('未检测到兑换码');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			if ($exchange == '1') 
			{
				show_json(0, $is_exchange[1]);
			}
			else 
			{
				$this->message('兑换类型不符', '', 'error');
			}
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'goods') 
		{
			if ($exchange == '1') 
			{
				show_json(0, '兑换类型不符');
			}
			else 
			{
				$this->message('兑换类型不符', '', 'error');
			}
		}
		else if ($exchange == '1') 
		{
			show_json(1, '确定跳转到商品页兑换？');
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		if ($exchange == '1') 
		{
		}
		else 
		{
			$goods_arr = json_decode($groupResult['goods'], true);
			if ($goods_arr['goods'] != false) 
			{
				foreach ($goods_arr['goods'] as $k => $v ) 
				{
					$goodsList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $v, ':uniacid' => $_W['uniacid']));
				}
			}
			if ($goods_arr['option'] != false) 
			{
				foreach ($goods_arr['option'] as $k => $v ) 
				{
					$optionList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $k, ':uniacid' => $_W['uniacid']));
					$optionstr = implode('-', $v);
					$optionList[$k]['optionstr'] = $optionstr;
				}
			}
			$banner = json_decode($groupResult['banner'], 1);
			if (!(empty($banner))) 
			{
				foreach ($banner as $k => $v ) 
				{
					$banner[$k] = urldecode($v);
					$banner[$k] = tomedia($banner[$k]);
				}
			}
			include $this->template();
		}
	}
	public function group() 
	{
		global $_W;
		global $_GPC;
		$ajax = intval($_GPC['ajax']);
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			if (empty($ajax)) 
			{
				$this->message('未检测到兑换码');
			}
			else 
			{
				show_json(0, '未检测到兑换码');
			}
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			if (empty($ajax)) 
			{
				$this->message($is_exchange[1]);
			}
			else 
			{
				show_json(0, $is_exchange[1]);
			}
		}
		else if ($is_exchange[1] != 'group') 
		{
			if (empty($ajax)) 
			{
				$this->message('兑换类型不符');
			}
			else 
			{
				show_json(0, '兑换类型不符');
			}
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			if ($codeResult['balancestatus'] == 2) 
			{
				show_json(0, '已兑换过余额');
				$this->message('已兑换过余额');
			}
			if (($groupResult['balance'] <= 0) && ($groupResult['balance_left'] <= 0) && ($groupResult['balance_right'] <= 0)) 
			{
				show_json(0, '你的兑换码不能兑换余额');
				$this->message('你的兑换码不能兑换余额');
			}
			$type = 1;
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['balance_type'] == 1) 
			{
				$balance = $groupResult['balance'];
				$str = '兑换中心：余额兑换';
				$channel = 1;
			}
			else if ($groupResult['balance_type'] == 2) 
			{
				$balance = rand($groupResult['balance_left'] * 100, $groupResult['balance_right'] * 100) / 100;
			}
			else if ($groupResult['balance_type'] == 3) 
			{
				$type = 2;
				$balance = $groupResult['balance'];
				$str = '余额充值';
				$channel = 2;
			}
			$balance = round($balance, 2);
			$balance_res = $this->chongzhi('credit2', $member['id'], 0, $balance, $str, $channel);
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				pdo_update('ewei_shop_exchange_code', array('balancestatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				$info = m('member')->getInfo($_W['openid']);
				$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
				if (empty($record_exist)) 
				{
					$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'balance' => $balance, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
					pdo_insert('ewei_shop_exchange_record', $record);
				}
				else 
				{
					$record = array('balance' => $balance, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
					pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				if ((($codeResult['scorestatus'] == 2) || empty($groupResult['score_type'])) && (($codeResult['redstatus'] == 2) || empty($groupResult['red_type'])) && (($codeResult['couponstatus'] == 2) || empty($groupResult['coupon_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				$this->notice($balance, $_W['openid'], $type);
				show_json(1, '成功充值了' . $balance . '元');
				$this->message('成功充值了' . $balance . '元');
			}
			else 
			{
				show_json(0, '充值失败了');
				$this->message('充值失败');
			}
		}
		else if ($exchange == '2') 
		{
			if ($codeResult['redstatus'] == 2) 
			{
				show_json(0, '已兑换过余额');
				$this->message('已兑换过余额');
			}
			if (($groupResult['red'] <= 0) && ($groupResult['red_left'] <= 0) && ($groupResult['red_right'] <= 0)) 
			{
				show_json(0, '你的兑换码不能兑换红包');
				$this->message('你的兑换码不能兑换红包');
			}
			load()->model('payment');
			$setting = uni_setting($_W['uniacid'], array('payment'));
			@$wechat = $setting['payment']['wechat'];
			$account = pdo_get('account_wechats', array('uniacid' => $_W['uniacid']), array('key', 'secret'));
			$sec = m('common')->getSec();
			$sec = iunserializer($sec['sec']);
			if ($groupResult['red_type'] == 1) 
			{
				$red = $groupResult['red'];
			}
			else 
			{
				$red = rand($groupResult['red_left'] * 100, $groupResult['red_right'] * 100) / 100;
			}
			$params = array('openid' => $_W['openid'], 'tid' => time(), 'send_name' => '人人商城:兑换中心', 'money' => $red, 'wishing' => '红包兑换', 'act_name' => '红包兑换活动', 'remark' => '兑换中心:红包兑换');
			if (empty($wechat['mchid']) || empty($wechat['apikey'])) 
			{
				show_json(0, '红包暂停兑换，请稍后再试');
			}
			$wechat = array('appid' => $account['key'], 'mchid' => $wechat['mchid'], 'apikey' => $wechat['apikey'], 'certs' => $sec);
			$result = m('common')->sendredpack($params, $wechat);
			if (!(is_error($result))) 
			{
				pdo_update('ewei_shop_exchange_code', array('redstatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				$info = m('member')->getInfo($_W['openid']);
				$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
				if (empty($record_exist)) 
				{
					$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'red' => $red, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
					pdo_insert('ewei_shop_exchange_record', $record);
				}
				else 
				{
					$record = array('red' => $red, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
					pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				if ((($codeResult['balancestatus'] == 2) || empty($groupResult['balance_type'])) && (($codeResult['scorestatus'] == 2) || empty($groupResult['score_type'])) && (($codeResult['couponstatus'] == 2) || empty($groupResult['coupon_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				show_json(1, '成功兑换了' . $red . '元红包');
				$this->message('成功兑换了' . $red . '元红包');
			}
			else 
			{
				show_json(0, '很遗憾，兑换失败了！');
				$this->message('兑换失败了,请稍后再试');
			}
		}
		else if ($exchange == '3') 
		{
			if ($codeResult['scorestatus'] == 2) 
			{
				show_json(0, '已兑换过积分');
				$this->message('已兑换过积分');
			}
			if (($groupResult['score'] <= 0) && ($groupResult['score_left'] <= 0) && ($groupResult['score_right'] <= 0)) 
			{
				show_json(0, '你的兑换码不能兑换积分');
				$this->message('你的兑换码不能兑换积分');
			}
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['score_type'] == 1) 
			{
				$score = $groupResult['score'];
			}
			else 
			{
				$score = rand($groupResult['score_left'], $groupResult['score_right']);
			}
			$balance_res = $this->chongzhi('credit1', $member['id'], 0, $score, '兑换中心:积分兑换');
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				pdo_update('ewei_shop_exchange_code', array('scorestatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				$info = m('member')->getInfo($_W['openid']);
				$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
				if (empty($record_exist)) 
				{
					$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'score' => $score, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
					pdo_insert('ewei_shop_exchange_record', $record);
				}
				else 
				{
					$record = array('score' => $score, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
					pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				if ((($codeResult['balancestatus'] == 2) || empty($groupResult['balance_type'])) && (($codeResult['redstatus'] == 2) || empty($groupResult['red_type'])) && (($codeResult['couponstatus'] == 2) || empty($groupResult['coupon_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				$this->notice($score, $_W['openid'], 3);
				show_json(1, '成功兑换了' . $score . '个积分');
				$this->message('成功兑换了' . $score . '个积分');
			}
			else 
			{
				show_json(0, '很遗憾，兑换失败了！');
				$this->message('兑换失败');
			}
		}
		else if ($exchange == '4') 
		{
			if ($codeResult['couponstatus'] == 2) 
			{
				show_json(0, '已兑换过优惠券');
				$this->message('已兑换过优惠券');
			}
			if (empty($groupResult['coupon'])) 
			{
				show_json(0, '你的兑换码不能兑换优惠券');
				$this->message('你的兑换码不能兑换优惠券');
			}
			$coupon = json_decode($groupResult['coupon'], true);
			if (empty($coupon[0])) 
			{
				show_json(0, '没有可兑换的优惠券');
				$this->message('没有可兑换的优惠券');
			}
			if ($groupResult['balance_type'] == 1) 
			{
				$condition = '(';
				foreach ($coupon as $k => $item ) 
				{
					$condition .= 'id = ' . $item . ' OR ';
				}
				$condition = substr($condition, 0, -4);
				$condition .= ')';
				$record_coupon = $groupResult['coupon'];
			}
			else 
			{
				$rand = array_rand($coupon, 1);
				$condition = 'id = ' . $coupon[$rand];
				$record_coupon = json_encode($coupon[$rand]);
			}
			$allCoupon = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_coupon') . ' WHERE ' . $condition . ' and uniacid=:uniacid and merchid=0', array(':uniacid' => $_W['uniacid']));
			if (empty($allCoupon[0])) 
			{
				show_json(0, '没有可兑换的优惠券');
				$this->message('没有可兑换的优惠券');
			}
			$m = m('member')->getInfo($_W['openid']);
			$resp = array();
			$resp['resptitle'] = '优惠券兑换成功';
			$resp['respdesc'] = '您兑换的优惠券已发放到账户中,点击立即使用';
			$resp['respurl'] = mobileUrl('sale.coupon.my', array(), 1);
			$resp['respthumb'] = '';
			foreach ($allCoupon as $k => $v ) 
			{
				$data = array('uniacid' => $_W['uniacid'], 'merchid' => 0, 'openid' => $_W['openid'], 'couponid' => $v['id'], 'gettype' => 7, 'gettime' => time(), 'senduid' => $_W['uid']);
				pdo_insert('ewei_shop_coupon_data', $data);
			}
			$this->model->sendMessage($resp, 1, $m);
			pdo_update('ewei_shop_exchange_code', array('couponstatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
			$info = m('member')->getInfo($_W['openid']);
			$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
			if (empty($record_exist)) 
			{
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'coupon' => $record_coupon, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
			}
			else 
			{
				$record = array('coupon' => $record_coupon, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
				pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
			}
			if ((($codeResult['balancestatus'] == 2) || empty($groupResult['balance_type'])) && (($codeResult['scorestatus'] == 2) || empty($groupResult['score_type'])) && (($codeResult['redstatus'] == 2) || empty($groupResult['red_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
			{
				pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
			}
			show_json(1, '恭喜，兑换成功！');
			$this->message('兑换成功');
		}
		else if ($exchange == '5') 
		{
			if ($codeResult['goodsstatus'] == 2) 
			{
				if (!(empty($ajax))) 
				{
					show_json(0, '已兑换过商品');
				}
				$this->message('已兑换过商品');
			}
			if (empty($groupResult['goods'])) 
			{
				if (!(empty($ajax))) 
				{
					show_json(0, '你的兑换码不能兑换商品');
				}
				$this->message('你的兑换码不能兑换商品');
			}
			$goods_arr = json_decode($groupResult['goods'], true);
			if ($goods_arr['goods'] != false) 
			{
				foreach ($goods_arr['goods'] as $k => $v ) 
				{
					$goodsList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $v, ':uniacid' => $_W['uniacid']));
				}
			}
			if ($goods_arr['option'] != false) 
			{
				foreach ($goods_arr['option'] as $k => $v ) 
				{
					$optionList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $k, ':uniacid' => $_W['uniacid']));
					$optionstr = implode('-', $v);
					$optionList[$k]['optionstr'] = $optionstr;
				}
			}
			$banner = json_decode($groupResult['banner'], 1);
			if (!(empty($banner))) 
			{
				foreach ($banner as $k => $v ) 
				{
					$banner[$k] = urldecode($v);
					$banner[$k] = tomedia($banner[$k]);
				}
			}
			if (!(empty($ajax))) 
			{
				show_json(1, 'ok');
			}
			include $this->template('exchange/goods');
		}
		else 
		{
			include $this->template();
		}
	}
	private function chongzhi($type, $id, $changetype, $num, $remark, $channel = 1) 
	{
		global $_W;
		$profile = m('member')->getMember($id, true);
		$typestr = (($type == 'credit1' ? '积分' : '余额'));
		if ($num <= 0) 
		{
			return 0;
		}
		if ($changetype == 2) 
		{
			$num -= $profile[$type];
		}
		else if ($changetype == 1) 
		{
			$num = -$num;
		}
		m('member')->setCredit($profile['openid'], $type, $num, array($_W['uid'], '后台会员充值' . $typestr . ' ' . $remark));
		$set = m('common')->getSysset('shop');
		$logno = m('common')->createNO('member_log', 'logno', 'RC');
		return 1;
	}
	public function modal() 
	{
		global $_GPC;
		global $_W;
		$yx0 = trim($_GPC['yx']);
		$yx = substr($yx0, 1);
		if ($yx) 
		{
			$yx_arr = explode('_', $yx);
		}
		$id = intval($_GPC['goods']);
		$goods = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		$optionstr = trim($_GPC['option']);
		$optionid = explode('-', $optionstr);
		foreach ($optionid as $k => $v ) 
		{
			$option[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods_option') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $v, ':uniacid' => $_W['uniacid']));
		}
		include $this->template();
	}
	public function calculate() 
	{
		global $_GPC;
		global $_W;
		@session_start();
		pdo_delete('ewei_shop_exchange_cart', array('openid' => $_W['openid'], 'selected' => 1));
		$key = $_SESSION['exchange_key'];
		$exchange = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_code') . ' WHERE `key` = :key AND uniacid = :uniacid', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$group = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_group') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $exchange['groupid'], ':uniacid' => $_W['uniacid']));
		if (($exchange == false) || ($group == false)) 
		{
			$this->message('兑换失败');
		}
		$postage = 0;
		$goods_tmp = array();
		if (!(empty($_GPC['goods']))) 
		{
			$goods_tmp = array_filter($_GPC['goods']);
		}
		$goods = array();
		foreach ($goods_tmp as $gk => $gv ) 
		{
			$price = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid=:uniacid', array(':id' => $gv, ':uniacid' => $_W['uniacid']));
			pdo_insert('ewei_shop_exchange_cart', array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'goodsid' => $price['id'], 'marketprice' => $price['marketprice'], 'optionid' => 0, 'merchid' => $price['merchid'], 'title' => $price['title'], 'groupid' => $exchange['groupid'], 'serial' => $exchange['serial']));
			if ($price == false) 
			{
				continue;
			}
			$value = array($gv, 0, $price['marketprice']);
			array_push($goods, $value);
			$postage += $price['exchange_postage'];
			unset($value);
		}
		$option_str = array_filter($_GPC['option']);
		foreach ($option_str as $k => $v ) 
		{
			$tmp = array_filter(explode('_', $v));
			foreach ($tmp as $k2 => $v2 ) 
			{
				$price = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods_option') . ' WHERE id = :id AND uniacid=:uniacid', array(':id' => $v2, ':uniacid' => $_W['uniacid']));
				pdo_insert('ewei_shop_exchange_cart', array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'goodsid' => $price['goodsid'], 'marketprice' => $price['marketprice'], 'optionid' => $price['id'], 'merchid' => $price['merchid'], 'title' => $price['title'], 'groupid' => $exchange['groupid'], 'serial' => $exchange['serial']));
				$value = array($v2, 1, $price['marketprice']);
				array_push($goods, $value);
				$postage += $price['exchange_postage'];
				unset($value);
			}
		}
		$_SESSION['exchangegoods'] = json_encode($goods);
		unset($price);
		$must_goods = json_decode($group['goods'], 1);
		foreach ($goods as $k => $v ) 
		{
			if ($v[1] == 0) 
			{
				if (!(in_array($v[0], $must_goods['goods']))) 
				{
					$this->message('商品校验失败');
				}
			}
			else 
			{
				foreach ($must_goods['option'] as $k2 => $v2 ) 
				{
					if (!(in_array($v[0], $must_goods['option'][$k2]))) 
					{
						$erro = 1;
					}
					else 
					{
						$erro = 0;
						break;
					}
				}
				if ($erro == 1) 
				{
					$this->message('规格校验失败');
				}
			}
		}
		uasort($goods, function($x, $y) 
		{
			return $x[2] - $y[2];
		}
		);
		$price = 0;
		if ($group['type'] == 1) 
		{
			if (0 < $group['max']) 
			{
				$i = 0;
				while ($i < $group['max']) 
				{
					array_pop($goods);
					++$i;
				}
				foreach ($goods as $pk => $pv ) 
				{
					$price += $pv[2];
				}
				$calprice = $goods;
			}
		}
		else 
		{
			$count = 0;
			foreach ($goods as $pk => $pv ) 
			{
				$price += $pv[2];
				$chajia = $price - $group['value'];
				if ($price == $group['value']) 
				{
				}
				else if ($group['value'] < $price) 
				{
					$calprice[$count][0] = $goods[$pk][0];
					$calprice[$count][1] = $goods[$pk][1];
					if (empty($can)) 
					{
						$calprice[$count][2] = $chajia;
					}
					else 
					{
						$calprice[$count][2] = $goods[$pk][2];
					}
					$can = 1;
					++$count;
				}
			}
			$price = $price - $group['value'];
		}
		$_SESSION['exchangepriceset'] = $calprice;
		$price = round($price, 2);
		if (empty($group['postage_type'])) 
		{
			$_SESSION['exchangepostage'] = $group['postage'];
		}
		else 
		{
			$_SESSION['exchangepostage'] = $postage;
		}
		$_SESSION['exchangeserial'] = $exchange['serial'];
		$_SESSION['exchangetitle'] = $group['title'];
		$_SESSION['groupid'] = $group['id'];
		if (0 < $price) 
		{
			$_SESSION['exchangeprice'] = $price;
			header('Location:' . mobileUrl('order.create', array('exchange' => 1)));
		}
		else 
		{
			$_SESSION['exchangeprice'] = 0;
			header('Location:' . mobileUrl('order.create', array('exchange' => 1)));
		}
	}
	public function qr() 
	{
		global $_W;
		global $_GPC;
		$key = trim($_GPC['key']);
		$url = mobileUrl('exchange', array('key' => $key), 1);
		require IA_ROOT . '/framework/library/qrcode/phpqrcode.php';
		QRcode::png($url, false, QR_ECLEVEL_L, 10, 3);
		exit();
	}
	public function notice($m, $openid, $type) 
	{
		if ($type == 1) 
		{
			$type = '余额兑换';
			$danwei = '元';
		}
		else if ($type == 2) 
		{
			$type = '余额充值';
			$danwei = '元';
		}
		else 
		{
			$type = '积分兑换';
			$danwei = '积分';
		}
		$message = array( 'first' => array('value' => '恭喜您充值成功!', 'color' => '#4a5077'), 'money' => array('title' => '成功充值', 'value' => $m . $danwei, 'color' => '#4a5077'), 'product' => array('title' => '充值方式', 'value' => $type, 'color' => '#4a5077'), 'remark' => array('value' => "\r\n" . '谢谢您对我们的支持！', 'color' => '#4a5077') );
		@m('notice')->sendNotice(array('openid' => $openid, 'tag' => 'recharge_ok', 'default' => $message, 'url' => mobileUrl('member', array(), 1)));
		return 1;
	}
	public function groupexchange() 
	{
		global $_GPC;
		global $_W;
		$key = trim($_GPC['key']);
		$code = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_code') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		if ($code == false) 
		{
			show_json(0, '没有这个兑换码');
		}
		$group = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_group') . ' WHERE id =:id AND uniacid = :uniacid', array(':id' => $code['groupid'], ':uniacid' => $_W['uniacid']));
		if ($group == false) 
		{
			show_json(0, '没有这个兑换组');
		}
		$arr['goods']['has'] = 0;
		$arr['balance']['has'] = 0;
		$arr['red']['has'] = 0;
		$arr['score']['has'] = 0;
		$arr['coupon']['has'] = 0;
		$arr['count'] = $code['count'];
		if (!(empty($group['type']))) 
		{
			$arr['goods']['has'] = 1;
			if ($group['type'] == 1) 
			{
				if (($group['mode'] == 1) || ($group['mode'] == 6)) 
				{
					$arr['goods']['type'] = 1;
					$arr['goods']['max'] = $group['max'];
				}
				else if ($group['mode'] == 2) 
				{
					$arr['balance']['type'] = 1;
					$arr['balance']['val'] = $group['balance'];
				}
				else if ($group['mode'] == 3) 
				{
					$arr['red']['type'] = 1;
					$arr['red']['val'] = $group['red'];
				}
				else if ($group['mode'] == 4) 
				{
					$arr['score']['type'] = 1;
					$arr['score']['val'] = $group['score'];
				}
				else if ($group['mode'] == 5) 
				{
					$arr['coupon']['type'] = 1;
				}
			}
			else if ($group['type'] == 2) 
			{
				if (($group['mode'] == 1) || ($group['mode'] == 6)) 
				{
					$arr['goods']['type'] = 2;
					$arr['goods']['val'] = $group['value'];
				}
				else if ($group['mode'] == 2) 
				{
					$arr['balance']['type'] = 2;
					$arr['balance']['rand'] = $group['balance_left'] . '-' . $group['balance_right'];
				}
				else if ($group['mode'] == 3) 
				{
					$arr['red']['type'] = 2;
					$arr['red']['rand'] = $group['red_left'] . '-' . $group['red_right'];
				}
				else if ($group['mode'] == 4) 
				{
					$arr['score']['type'] = 2;
					$arr['score']['rand'] = $group['score_left'] . '-' . $group['score_right'];
				}
				else if ($group['mode'] == 5) 
				{
					$arr['coupon']['type'] = 2;
				}
			}
			if ($code['goodsstatus'] != 2) 
			{
				$arr['goods']['sta'] = 1;
			}
			else 
			{
				$arr['goods']['sta'] = 0;
			}
		}
		else 
		{
			$arr['goods']['has'] = 0;
		}
		if (!(empty($group['balance_type']))) 
		{
			$arr['balance']['has'] = 1;
			if ($group['balance_type'] == 1) 
			{
				$arr['balance']['type'] = 1;
				$arr['balance']['val'] = $group['balance'];
			}
			else if ($group['balance_type'] == 2) 
			{
				$arr['balance']['type'] = 2;
				$arr['balance']['rand'] = $group['balance_left'] . '-' . $group['balance_right'];
			}
			if ($code['balancestatus'] != 2) 
			{
				$arr['balance']['sta'] = 1;
			}
			else 
			{
				$arr['balance']['sta'] = 0;
			}
		}
		else 
		{
			$arr['balance']['has'] = 0;
		}
		if (!(empty($group['score_type']))) 
		{
			$arr['score']['has'] = 1;
			if ($group['score_type'] == 1) 
			{
				$arr['score']['type'] = 1;
				$arr['score']['val'] = $group['score'];
			}
			else if ($group['score_type'] == 2) 
			{
				$arr['score']['type'] = 2;
				$arr['score']['rand'] = $group['score_left'] . '-' . $group['score_right'];
			}
			if ($code['scorestatus'] != 2) 
			{
				$arr['score']['sta'] = 1;
			}
			else 
			{
				$arr['score']['sta'] = 0;
			}
		}
		else 
		{
			$arr['score']['has'] = 0;
		}
		if (!(empty($group['red_type']))) 
		{
			$arr['red']['has'] = 1;
			if ($group['red_type'] == 1) 
			{
				$arr['red']['type'] = 1;
				$arr['red']['val'] = $group['red'];
			}
			else if ($group['red_type'] == 2) 
			{
				$arr['red']['type'] = 2;
				$arr['red']['rand'] = $group['red_left'] . '-' . $group['red_right'];
			}
			if ($code['redstatus'] != 2) 
			{
				$arr['red']['sta'] = 1;
			}
			else 
			{
				$arr['red']['sta'] = 0;
			}
		}
		else 
		{
			$arr['red']['has'] = 0;
		}
		if (!(empty($group['coupon_type']))) 
		{
			$arr['coupon']['has'] = 1;
			if ($group['coupon_type'] == 1) 
			{
				$arr['coupon']['type'] = 1;
				$arr['coupon']['val'] = $group['coupon'];
			}
			else if ($group['coupon_type'] == 2) 
			{
				$arr['coupon']['type'] = 2;
				$arr['coupon']['rand'] = $group['coupon_left'] . '-' . $group['coupon_right'];
			}
			if ($code['couponstatus'] != 2) 
			{
				$arr['coupon']['sta'] = 1;
			}
			else 
			{
				$arr['coupon']['sta'] = 0;
			}
		}
		else 
		{
			$arr['coupon']['has'] = 0;
		}
		show_json(1, $arr);
	}
}
?>