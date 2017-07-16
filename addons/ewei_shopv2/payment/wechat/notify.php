<?php
error_reporting(0);
define('IN_MOBILE', true);
$input = file_get_contents('php://input');
libxml_disable_entity_loader(true);
if (!(empty($input)) && empty($_GET['out_trade_no'])) 
{
	$obj = simplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA);
	$data = json_decode(json_encode($obj), true);
	if (empty($data)) 
	{
		exit('fail');
	}
	if (($data['result_code'] != 'SUCCESS') || ($data['return_code'] != 'SUCCESS')) 
	{
		$result = array('return_code' => 'FAIL', 'return_msg' => (empty($data['return_msg']) ? $data['err_code_des'] : $data['return_msg']));
		echo array2xml($result);
		exit();
	}
	$get = $data;
}
else 
{
	$get = $_GET;
}
require dirname(__FILE__) . '/../../../../framework/bootstrap.inc.php';
require IA_ROOT . '/addons/ewei_shopv2/defines.php';
require IA_ROOT . '/addons/ewei_shopv2/core/inc/functions.php';
require IA_ROOT . '/addons/ewei_shopv2/core/inc/plugin_model.php';
require IA_ROOT . '/addons/ewei_shopv2/core/inc/com_model.php';
new EweiShopWechatPay($get);
exit('fail');
class EweiShopWechatPay 
{
	public $get;
	public $type;
	public $total_fee;
	public $set;
	public $setting;
	public $sec;
	public $sign;
	public $isapp = false;
	public $is_jie = false;
	public function __construct($get) 
	{
		global $_W;
		$this->get = $get;
		$strs = explode(':', $this->get['attach']);
		$this->type = intval($strs[1]);
		$this->total_fee = round($this->get['total_fee'] / 100, 2);
		$_W['uniacid'] = $_W['weid'] = intval($strs[0]);
		$this->init();
	}
	public function success() 
	{
		$result = array('return_code' => 'SUCCESS', 'return_msg' => 'OK');
		echo array2xml($result);
		exit();
	}
	public function fail() 
	{
		$result = array('return_code' => 'FAIL');
		echo array2xml($result);
		exit();
	}
	public function init() 
	{
		if ($this->type == '0') 
		{
			$this->order();
		}
		else if ($this->type == '1') 
		{
			$this->recharge();
		}
		else if ($this->type == '2') 
		{
			$this->creditShop();
		}
		else if ($this->type == '3') 
		{
			$this->creditShopFreight();
		}
		else if ($this->type == '4') 
		{
			$this->coupon();
		}
		else if ($this->type == '5') 
		{
			$this->groups();
		}
		else if ($this->type == '10') 
		{
			$this->mr();
		}
		else if ($this->type == '11') 
		{
			$this->pstoreCredit();
		}
		else if ($this->type == '12') 
		{
			$this->pstore();
		}
		else if ($this->type == '13') 
		{
			$this->cashier();
		}
		$this->success();
	}
	public function order() 
	{
		if (!($this->publicMethod())) 
		{
			exit('order');
		}
		$tid = $this->get['out_trade_no'];
		$isborrow = 0;
		$borrowopenid = '';
		if (strpos($tid, '_borrow') !== false) 
		{
			$tid = str_replace('_borrow', '', $tid);
			$isborrow = 1;
			$borrowopenid = $this->get['openid'];
		}
		if (strpos($tid, '_B') !== false) 
		{
			$tid = str_replace('_B', '', $tid);
			$isborrow = 1;
			$borrowopenid = $this->get['openid'];
		}
		if (strexists($tid, 'GJ')) 
		{
			$tids = explode('GJ', $tid);
			$tid = $tids[0];
		}
		$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `module`=:module AND `tid`=:tid  limit 1';
		$params = array();
		$params[':tid'] = $tid;
		$params[':module'] = 'ewei_shopv2';
		$log = pdo_fetch($sql, $params);
		if (!(empty($log)) && ($log['status'] == '0') && ($log['fee'] == $this->total_fee)) 
		{
			$site = WeUtility::createModuleSite($log['module']);
			if (!(is_error($site))) 
			{
				$method = 'payResult';
				if (method_exists($site, $method)) 
				{
					$ret = array();
					$ret['weid'] = $log['weid'];
					$ret['uniacid'] = $log['uniacid'];
					$ret['result'] = 'success';
					$ret['type'] = $log['type'];
					$ret['from'] = 'return';
					$ret['tid'] = $log['tid'];
					$ret['user'] = $log['openid'];
					$ret['fee'] = $log['fee'];
					$ret['tag'] = $log['tag'];
					pdo_update('ewei_shop_order', array('paytype' => 21), array('ordersn' => $log['tid'], 'uniacid' => $log['uniacid']));
					$result = $site->$method($ret);
					if ($result) 
					{
						$log['tag'] = iunserializer($log['tag']);
						$log['tag']['transaction_id'] = $this->get['transaction_id'];
						$record = array();
						$record['status'] = '1';
						$record['tag'] = iserializer($log['tag']);
						pdo_update('core_paylog', $record, array('plid' => $log['plid']));
						pdo_update('ewei_shop_order', array('isborrow' => $isborrow, 'borrowopenid' => $borrowopenid, 'apppay' => ($this->isapp ? 1 : 0)), array('ordersn' => $log['tid'], 'uniacid' => $log['uniacid']));
						return;
					}
				}
			}
		}
		else 
		{
			$this->fail();
		}
	}
	public function recharge() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('recharge');
		}
		$logno = trim($this->get['out_trade_no']);
		$isborrow = 0;
		$borrowopenid = '';
		if (strpos($logno, '_borrow') !== false) 
		{
			$logno = str_replace('_borrow', '', $logno);
			$isborrow = 1;
			$borrowopenid = $this->get['openid'];
		}
		if (empty($logno)) 
		{
			$this->fail();
		}
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_log') . ' WHERE `uniacid`=:uniacid and `logno`=:logno limit 1', array(':uniacid' => $_W['uniacid'], ':logno' => $logno));
		$OK = !(empty($log)) && empty($log['status']) && ($log['money'] == $this->total_fee);
		if (!($this->set['pay']['weixin_jie']) && !($this->isapp)) 
		{
			$OK = $OK && ($log['openid'] == $this->get['openid']);
		}
		if ($OK) 
		{
			pdo_update('ewei_shop_member_log', array('status' => 1, 'rechargetype' => 'wechat', 'isborrow' => $isborrow, 'borrowopenid' => $borrowopenid, 'apppay' => ($this->isapp ? 1 : 0)), array('id' => $log['id']));
			$shopset = m('common')->getSysset('shop');
			m('member')->setCredit($log['openid'], 'credit2', $log['money'], array(0, $shopset['name'] . '会员充值:wechatnotify:credit2:' . $log['money']));
			m('member')->setRechargeCredit($log['openid'], $log['money']);
			com_run('sale::setRechargeActivity', $log);
			com_run('coupon::useRechargeCoupon', $log);
			m('notice')->sendMemberLogMessage($log['id']);
			return;
		}
		if ($log['money'] == $this->total_fee) 
		{
			pdo_update('ewei_shop_member_log', array('rechargetype' => 'wechat', 'isborrow' => $isborrow, 'borrowopenid' => $borrowopenid, 'apppay' => ($this->isapp ? 1 : 0)), array('id' => $log['id']));
		}
	}
	public function creditShop() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('creditShop');
		}
		$logno = trim($this->get['out_trade_no']);
		if (empty($logno)) 
		{
			exit();
		}
		$logno = str_replace('_borrow', '', $logno);
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_creditshop_log') . ' WHERE `logno`=:logno and `uniacid`=:uniacid  limit 1', array(':uniacid' => $_W['uniacid'], ':logno' => $logno));
		if (!(empty($log)) && empty($log['status'])) 
		{
			$goods = pdo_fetch('SELECT * FROM' . tablename('ewei_shop_creditshop_goods') . 'WHERE id=:id and uniacid=:uniacid limit 1 ', array(':id' => $log['goodsid'], ':uniacid' => $_W['uniacid']));
			if (!(empty($goods)) && ($this->total_fee == $goods['money'])) 
			{
				pdo_update('ewei_shop_creditshop_log', array('paystatus' => 1, 'paytype' => 1), array('id' => $log['id']));
			}
		}
	}
	public function creditShopFreight() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('creditShopFreight');
		}
		$dispatchno = trim($this->get['out_trade_no']);
		$dispatchno = str_replace('_borrow', '', $dispatchno);
		if (empty($dispatchno)) 
		{
			exit();
		}
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_creditshop_log') . ' WHERE `dispatchno`=:dispatchno and `uniacid`=:uniacid  limit 1', array(':uniacid' => $_W['uniacid'], ':dispatchno' => $dispatchno));
		if (!(empty($log)) && empty($log['dispatchstatus'])) 
		{
			pdo_update('ewei_shop_creditshop_log', array('dispatchstatus' => 1), array('id' => $log['id']));
		}
	}
	public function coupon() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('coupon');
		}
		$logno = str_replace('_borrow', '', $this->get['out_trade_no']);
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_coupon_log') . ' WHERE `logno`=:logno and `uniacid`=:uniacid  limit 1', array(':uniacid' => $_W['uniacid'], ':logno' => $logno));
		$coupon = pdo_fetchcolumn('select money from ' . tablename('ewei_shop_coupon') . ' where id=:id limit 1', array(':id' => $log['couponid']));
		if ($coupon == $this->total_fee) 
		{
			com_run('coupon::payResult', $logno);
		}
	}
	public function groups() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('groups');
		}
		$orderno = trim($this->get['out_trade_no']);
		$orderno = str_replace('_borrow', '', $orderno);
		if (empty($orderno)) 
		{
			exit();
		}
		if ($this->is_jie) 
		{
			pdo_update('ewei_shop_groups_order', array('isborrow' => '1', 'borrowopenid' => $this->get['openid']), array('orderno' => $orderno, 'uniacid' => $_W['uniacid']));
		}
		if (p('groups')) 
		{
			p('groups')->payResult($orderno, 'wechat', ($this->isapp ? true : false));
		}
	}
	public function mr() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('mr');
		}
		$ordersn = trim($this->get['out_trade_no']);
		$isborrow = 0;
		$borrowopenid = '';
		if (strpos($ordersn, '_borrow') !== false) 
		{
			$ordersn = str_replace('_borrow', '', $ordersn);
			$isborrow = 1;
			$borrowopenid = $this->get['openid'];
		}
		if (empty($ordersn)) 
		{
			exit();
		}
		if (p('mr')) 
		{
			$price = pdo_fetchcolumn('select payprice from ' . tablename('ewei_shop_mr_order') . ' where ordersn=:ordersn limit 1', array(':ordersn' => $ordersn));
			if ($price == $this->total_fee) 
			{
				if ($isborrow == 1) 
				{
					pdo_update('ewei_shop_order', array('isborrow' => $isborrow, 'borrowopenid' => $borrowopenid), array('ordersn' => $ordersn));
				}
				p('mr')->payResult($ordersn, 'wechat');
			}
		}
	}
	public function pstoreCredit() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('pstoreCredit');
		}
		$ordersn = trim($this->get['out_trade_no']);
		$ordersn = str_replace('_borrow', '', $ordersn);
		if (empty($ordersn)) 
		{
			exit();
		}
		if (p('pstore')) 
		{
			p('pstore')->payResult($ordersn, $this->total_fee);
		}
	}
	public function pstore() 
	{
		global $_W;
		if (!($this->publicMethod())) 
		{
			exit('pstore');
		}
		$ordersn = trim($this->get['out_trade_no']);
		$ordersn = str_replace('_borrow', '', $ordersn);
		if (empty($ordersn)) 
		{
			exit();
		}
		if (p('pstore')) 
		{
			p('pstore')->wechat_complete($ordersn);
		}
	}
	public function cashier() 
	{
		global $_W;
		$ordersn = trim($this->get['out_trade_no']);
		if (empty($ordersn)) 
		{
			exit();
		}
		if (p('cashier')) 
		{
			p('cashier')->payResult($ordersn);
		}
	}
	public function publicMethod() 
	{
		global $_W;
		$this->set = m('common')->getSysset(array('shop', 'pay'));
		if (empty($_W['uniacid'])) 
		{
			return false;
		}
		$this->setting = uni_setting($_W['uniacid'], array('payment'));
		if (is_array($this->setting['payment']) || ($this->set['pay']['weixin_jie'] == 1) || ($this->set['pay']['weixin_sub'] == 1) || ($this->set['pay']['weixin_jie_sub'] == 1) || ($this->get['trade_type'] == 'APP')) 
		{
			$this->is_jie = (strpos($this->get['out_trade_no'], '_B') !== false) || (strpos($this->get['out_trade_no'], '_borrow') !== false);
			$sec_yuan = m('common')->getSec();
			$this->sec = iunserializer($sec_yuan['sec']);
			if ((($this->set['pay']['weixin_jie'] == 1) && $this->is_jie) || ($this->set['pay']['weixin_sub'] == 1) || (($this->set['pay']['weixin_jie_sub'] == 1) && $this->is_jie)) 
			{
				if ($this->set['pay']['weixin_sub'] == 1) 
				{
					$wechat = array('version' => 1, 'key' => $this->sec['apikey_sub'], 'signkey' => $this->sec['apikey_sub']);
				}
				if (($this->set['pay']['weixin_jie'] == 1) && $this->is_jie) 
				{
					$wechat = array('version' => 1, 'key' => $this->sec['apikey'], 'signkey' => $this->sec['apikey']);
				}
				if (($this->set['pay']['weixin_jie_sub'] == 1) && $this->is_jie) 
				{
					$wechat = array('version' => 1, 'key' => $this->sec['apikey_jie_sub'], 'signkey' => $this->sec['apikey_jie_sub']);
				}
			}
			else if ($this->set['pay']['weixin'] == 1) 
			{
				$wechat = $this->setting['payment']['wechat'];
			}
			if (($this->get['trade_type'] == 'APP') && ($this->set['pay']['app_wechat'] == 1)) 
			{
				$this->isapp = true;
				$wechat = array('version' => 1, 'key' => $this->sec['app_wechat']['apikey'], 'signkey' => $this->sec['app_wechat']['apikey'], 'appid' => $this->sec['app_wechat']['appid'], 'mchid' => $this->sec['app_wechat']['merchid']);
			}
			if (!(empty($wechat))) 
			{
				ksort($this->get);
				$string1 = '';
				foreach ($this->get as $k => $v ) 
				{
					if (($v != '') && ($k != 'sign')) 
					{
						$string1 .= $k . '=' . $v . '&';
					}
				}
				$wechat['signkey'] = (($wechat['version'] == 1 ? $wechat['key'] : $wechat['signkey']));
				$this->sign = strtoupper(md5($string1 . 'key=' . $wechat['signkey']));
				$this->get['openid'] = ((isset($this->get['sub_openid']) ? $this->get['sub_openid'] : $this->get['openid']));
				if ($this->sign == $this->get['sign']) 
				{
					return true;
				}
			}
		}
		return false;
	}
}
?>