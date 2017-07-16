<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Finance_EweiShopV2Model 
{
	public function pay($openid = '', $paytype = 0, $money = 0, $trade_no = '', $desc = '', $return = true) 
	{
		global $_W;
		global $_GPC;
		if (empty($openid)) 
		{
			return error(-1, 'openid不能为空');
		}
		$member = m('member')->getMember($openid);
		if (empty($member)) 
		{
			return error(-1, '未找到用户');
		}
		if (empty($paytype)) 
		{
			m('member')->setCredit($openid, 'credit2', $money, array(0, $desc));
			return true;
		}
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (!(is_array($setting['payment']))) 
		{
			return error(1, '没有设定支付参数');
		}
		$pay = m('common')->getSysset('pay');
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		$wechat = $setting['payment']['wechat'];
		$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
		$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
		$certs = $sec;
		$url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';
		$pars = array();
		$pars['mch_appid'] = $row['key'];
		$pars['mchid'] = $wechat['mchid'];
		$pars['nonce_str'] = random(32);
		$pars['partner_trade_no'] = ((empty($trade_no) ? time() . random(4, true) : $trade_no));
		$pars['openid'] = $openid;
		$pars['check_name'] = 'NO_CHECK';
		$pars['amount'] = $money;
		$pars['desc'] = ((empty($desc) ? '现金提现' : $desc));
		$pars['spbill_create_ip'] = gethostbyname($_SERVER['HTTP_HOST']);
		ksort($pars, SORT_STRING);
		$string1 = '';
		foreach ($pars as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 .= 'key=' . $wechat['apikey'];
		$pars['sign'] = strtoupper(md5($string1));
		$xml = array2xml($pars);
		$extras = array();
		$errmsg = '未上传完整的微信支付证书，请到【系统设置】->【支付方式】中上传!';
		if (is_array($certs)) 
		{
			if (empty($certs['cert']) || empty($certs['key']) || empty($certs['root'])) 
			{
				if ($return) 
				{
					if ($_W['ispost']) 
					{
						show_json(0, array('message' => $errmsg));
					}
					show_message($errmsg, '', 'error');
				}
				else 
				{
					return error(-1, $errmsg);
				}
			}
			$certfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($certfile, $certs['cert']);
			$keyfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($keyfile, $certs['key']);
			$rootfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($rootfile, $certs['root']);
			$extras['CURLOPT_SSLCERT'] = $certfile;
			$extras['CURLOPT_SSLKEY'] = $keyfile;
			$extras['CURLOPT_CAINFO'] = $rootfile;
		}
		else if ($return) 
		{
			if ($_W['ispost']) 
			{
				show_json(0, array('message' => $errmsg));
			}
			show_message($errmsg, '', 'error');
		}
		else 
		{
			return error(-1, $errmsg);
		}
		load()->func('communication');
		$resp = ihttp_request($url, $xml, $extras);
		@unlink($certfile);
		@unlink($keyfile);
		@unlink($rootfile);
		if (is_error($resp)) 
		{
			return error(-2, $resp['message']);
		}
		if (empty($resp['content'])) 
		{
			return error(-2, '网络错误');
		}
		$arr = json_decode(json_encode(simplexml_load_string($resp['content'], 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		if (($arr['return_code'] == 'SUCCESS') && ($arr['result_code'] == 'SUCCESS')) 
		{
			return true;
		}
		if ($arr['return_msg'] == $arr['err_code_des']) 
		{
			$error = $arr['return_msg'];
		}
		else 
		{
			$error = $arr['return_msg'] . ' | ' . $arr['err_code_des'];
		}
		return error(-2, $error);
	}
	public function payRedPack($openid, $money, $logno, $data, $desc = '红包发送', $config) 
	{
		global $_W;
		$money = round($money / 100, 2);
		$sendmoney = (double) $data['sendmoney'];
		$realsendmoney = round($money - $sendmoney, 2);
		if (empty($realsendmoney)) 
		{
			return error(-1, '发送金额错误 ,或者已经全部发送');
		}
		$error = 0;
		$senddata = array();
		$senddata_count = 0;
		if (!(empty($data['senddata']))) 
		{
			$senddata = json_decode($data['senddata'], true);
			$senddata_count = count($senddata);
		}
		if (empty($config['redpack'])) 
		{
			$redpack = 188;
		}
		else if ($config['redpack'] == '1') 
		{
			$redpack = 288;
		}
		else 
		{
			$redpack = 388;
		}
		$shopset = m('common')->getSysset('shop');
		$params = array('openid' => $openid, 'tid' => '', 'send_name' => $shopset['name'], 'money' => '', 'wishing' => '恭喜发财,大吉大利!', 'act_name' => $_W['shopset']['shop']['name'] . '活动', 'remark' => $desc);
		$setting = uni_setting($_W['uniacid'], array('payment'));
		$wechats = $setting['payment']['wechat'];
		$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
		$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		$wechat = array('appid' => $row['key'], 'mchid' => $wechats['mchid'], 'apikey' => $wechats['apikey'], 'certs' => $sec);
		if ($redpack < $realsendmoney) 
		{
			$for_count = ceil($realsendmoney / $redpack);
			$end_money = round($realsendmoney - (($for_count - 1) * $redpack), 2);
			$i = 0;
			while ($i < $for_count) 
			{
				++$senddata_count;
				$params['tid'] = $logno . 'R' . $senddata_count;
				$params['money'] = $redpack;
				if (($for_count == $i + 1) && !(empty($end_money))) 
				{
					$params['money'] = $end_money;
				}
				if ($params['money'] < 1) 
				{
					$res = m('member')->setCredit($openid, 'credit2', $money, array(0, $desc));
				}
				else 
				{
					$res = m('common')->sendredpack($params, $wechat);
				}
				if (is_error($res)) 
				{
					$error = $res;
					break;
				}
				$senddata[] = array('no' => $params['tid'], 'money' => $params['money']);
				$sendmoney += $params['money'];
				++$i;
			}
		}
		else 
		{
			++$senddata_count;
			$params['tid'] = $logno . 'R' . $senddata_count;
			$params['money'] = $realsendmoney;
			if ($params['money'] < 1) 
			{
				$res = m('member')->setCredit($openid, 'credit2', $money, array(0, $desc));
			}
			else 
			{
				$res = m('common')->sendredpack($params, $wechat);
			}
			if (is_error($res)) 
			{
				$error = $res;
			}
			else 
			{
				$senddata[] = array('no' => $params['tid'], 'money' => $params['money']);
				$sendmoney += $params['money'];
			}
		}
		return array('sendmoney' => $sendmoney, 'senddata' => $senddata, 'error' => $error);
	}
	public function AliPay($aliPayAccount, $batch_no, $config, $remark = '现金提现') 
	{
		global $_W;
		if (empty($aliPayAccount)) 
		{
			return error('-1', '打款账户错误');
		}
		if (empty($config['partner'])) 
		{
			return error('-1', 'partner 未配置!');
		}
		if (empty($config['account_name'])) 
		{
			return error('-1', 'account_name 未配置!');
		}
		if (empty($config['email'])) 
		{
			return error('-1', 'email 未配置!');
		}
		if (empty($config['key'])) 
		{
			return error('-1', '支付秘钥 未配置!');
		}
		$data = date('YmdHis');
		$detail_data = '';
		$money = 0;
		$total = 0;
		if (is_array2($aliPayAccount)) 
		{
			foreach ($aliPayAccount as $val ) 
			{
				if ($val['money'] <= 0) 
				{
					continue;
				}
				$detail_data .= $data . random(8, true) . '^' . $val['account'] . '^' . $val['name'] . '^' . $val['money'] . '^' . $remark . '|';
				$money += $val['money'];
				++$total;
			}
			$detail_data = substr($detail_data, 0, -1);
		}
		else 
		{
			$detail_data .= $data . random(8, true) . '^' . $aliPayAccount['account'] . '^' . $aliPayAccount['name'] . '^' . $aliPayAccount['money'] . '^' . $remark;
			$money = $aliPayAccount['money'];
			$total = 1;
		}
		if (empty($money)) 
		{
			return error('-1', '打款资金错误');
		}
		$set = array();
		$set['service'] = 'batch_trans_notify';
		$set['partner'] = $config['partner'];
		$set['notify_url'] = $_W['siteroot'] . 'addons/ewei_shopv2/payment/alipay/notify.php';
		$set['_input_charset'] = 'UTF-8';
		$set['sign_type'] = 'MD5';
		$set['account_name'] = $config['account_name'];
		$set['detail_data'] = $detail_data;
		$set['batch_no'] = $batch_no;
		$set['batch_num'] = $total;
		$set['batch_fee'] = $money;
		$set['email'] = $config['email'];
		$set['pay_date'] = date('Ymd');
		$prepares = array();
		foreach ($set as $key => $value ) 
		{
			if (($key != 'sign') && ($key != 'sign_type')) 
			{
				$prepares[] = $key . '=' . $value;
			}
		}
		sort($prepares);
		$string = implode($prepares, '&');
		$string .= $config['key'];
		$set['sign'] = md5($string);
		$url = 'https://mapi.alipay.com/gateway.do?' . http_build_query($set, '', '&');
		return $url;
	}
	public function refund($openid, $out_trade_no, $out_refund_no, $totalmoney, $refundmoney = 0, $app = false, $refund_account = false) 
	{
		global $_W;
		global $_GPC;
		if (empty($openid)) 
		{
			return error(-1, 'openid不能为空');
		}
		$member = m('member')->getMember($openid);
		if (empty($member)) 
		{
			return error(-1, '未找到用户');
		}
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (!(is_array($setting['payment']))) 
		{
			return error(1, '没有设定支付参数');
		}
		$pay = m('common')->getSysset('pay');
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		$certs = $sec;
		if (!(empty($pay['weixin_sub']))) 
		{
			$wechat = array('appid' => $sec['appid_sub'], 'mchid' => $sec['mchid_sub'], 'sub_appid' => (!(empty($sec['sub_appid_sub'])) ? $sec['sub_appid_sub'] : ''), 'sub_mch_id' => $sec['sub_mchid_sub'], 'apikey' => $sec['apikey_sub']);
			$row = array('key' => $sec['appid_sub']);
			$certs = $sec['sub'];
		}
		else 
		{
			$wechat = $setting['payment']['wechat'];
			$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
			$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
		}
		if ($app) 
		{
			if (empty($sec['app_wechat']['appid']) || empty($sec['app_wechat']['appsecret']) || empty($sec['app_wechat']['merchid']) || empty($sec['app_wechat']['apikey'])) 
			{
				return error(1, '没有设定APP支付参数');
			}
			$wechat = array('appid' => $sec['app_wechat']['appid'], 'mchid' => $sec['app_wechat']['merchid'], 'apikey' => $sec['app_wechat']['apikey']);
			$row = array('key' => $sec['app_wechat']['appid'], 'secret' => $sec['app_wechat']['appsecret']);
			$certs = array('cert' => $sec['app_wechat']['cert'], 'key' => $sec['app_wechat']['key'], 'root' => $sec['app_wechat']['root']);
		}
		$url = 'https://api.mch.weixin.qq.com/secapi/pay/refund';
		$pars = array();
		$pars['appid'] = $row['key'];
		$pars['mch_id'] = $wechat['mchid'];
		$pars['nonce_str'] = random(8);
		$pars['out_trade_no'] = $out_trade_no;
		$pars['out_refund_no'] = $out_refund_no;
		$pars['total_fee'] = $totalmoney;
		$pars['refund_fee'] = $refundmoney;
		$pars['op_user_id'] = $wechat['mchid'];
		if ($refund_account) 
		{
			$pars['refund_account'] = $refund_account;
		}
		if (!(empty($pay['weixin_sub'])) && !($app)) 
		{
			if (!(empty($wechat['sub_appid']))) 
			{
				$pars['sub_appid'] = $wechat['sub_appid'];
			}
			$pars['sub_mch_id'] = $wechat['sub_mch_id'];
		}
		ksort($pars, SORT_STRING);
		$string1 = '';
		foreach ($pars as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 .= 'key=' . $wechat['apikey'];
		$pars['sign'] = strtoupper(md5($string1));
		$xml = array2xml($pars);
		$extras = array();
		$errmsg = '未上传完整的微信支付证书，请到【系统设置】->【支付方式】中上传!';
		if (is_array($certs)) 
		{
			if (empty($certs['cert']) || empty($certs['key']) || empty($certs['root'])) 
			{
				if ($_W['ispost']) 
				{
					show_json(0, array('message' => $errmsg));
				}
				show_message($errmsg, '', 'error');
			}
			$certfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($certfile, $certs['cert']);
			$keyfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($keyfile, $certs['key']);
			$rootfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($rootfile, $certs['root']);
			$extras['CURLOPT_SSLCERT'] = $certfile;
			$extras['CURLOPT_SSLKEY'] = $keyfile;
			$extras['CURLOPT_CAINFO'] = $rootfile;
		}
		else 
		{
			if ($_W['ispost']) 
			{
				show_json(0, array('message' => $errmsg));
			}
			show_message($errmsg, '', 'error');
		}
		load()->func('communication');
		$resp = ihttp_request($url, $xml, $extras);
		@unlink($certfile);
		@unlink($keyfile);
		@unlink($rootfile);
		if (is_error($resp)) 
		{
			return error(-2, $resp['message']);
		}
		if (empty($resp['content'])) 
		{
			return error(-2, '网络错误');
		}
		$arr = json_decode(json_encode(simplexml_load_string($resp['content'], 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		if (($arr['return_code'] == 'SUCCESS') && ($arr['result_code'] == 'SUCCESS')) 
		{
			return true;
		}
		if (($arr['return_code'] == 'SUCCESS') && ($arr['result_code'] == 'FAIL') && ($arr['return_msg'] == 'OK') && !($refund_account)) 
		{
			if ($arr['err_code'] == 'NOTENOUGH') 
			{
				return $this->refund($openid, $out_trade_no, $out_refund_no, $totalmoney, $refundmoney, $app, 'REFUND_SOURCE_RECHARGE_FUNDS');
			}
		}
		else 
		{
			if ($arr['return_msg'] == $arr['err_code_des']) 
			{
				$error = $arr['return_msg'];
			}
			else 
			{
				$error = $arr['return_msg'] . ' | ' . $arr['err_code_des'];
			}
			return error(-2, $error);
		}
	}
	public function refundBorrow($openid, $out_trade_no, $out_refund_no, $totalmoney, $refundmoney = 0, $gaijia = 0, $refund_account = false) 
	{
		global $_W;
		global $_GPC;
		if (empty($openid)) 
		{
			return error(-1, 'openid不能为空');
		}
		$pay = m('common')->getSysset('pay');
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		$certs = $sec['jie'];
		if (!(empty($pay['weixin_jie_sub']))) 
		{
			$wechat = array('sub_appid' => (!(empty($sec['sub_appid_jie_sub'])) ? $sec['sub_appid_jie_sub'] : ''), 'sub_mch_id' => $sec['sub_mchid_jie_sub']);
			$sec['appid'] = $sec['appid_jie_sub'];
			$sec['mchid'] = $sec['mchid_jie_sub'];
			$sec['apikey'] = $sec['apikey_jie_sub'];
			$row = array('key' => $sec['appid_jie_sub']);
			$certs = $sec['jie_sub'];
		}
		else 
		{
			if (empty($sec['appid']) || empty($sec['mchid']) || empty($sec['apikey'])) 
			{
				return error(1, '没有设定支付参数');
			}
		}
		if (!(empty($gaijia))) 
		{
			$out_trade_no = $out_trade_no . '_B';
		}
		else 
		{
			$out_trade_no = $out_trade_no . '_borrow';
		}
		$url = 'https://api.mch.weixin.qq.com/secapi/pay/refund';
		$pars = array();
		$pars['appid'] = $sec['appid'];
		$pars['mch_id'] = $sec['mchid'];
		$pars['nonce_str'] = random(8);
		$pars['out_trade_no'] = $out_trade_no;
		$pars['out_refund_no'] = $out_refund_no;
		$pars['total_fee'] = $totalmoney;
		$pars['refund_fee'] = $refundmoney;
		$pars['op_user_id'] = $sec['mchid'];
		if ($refund_account) 
		{
			$pars['refund_account'] = $refund_account;
		}
		if (!(empty($pay['weixin_jie_sub']))) 
		{
			$pars['sub_mch_id'] = $wechat['sub_mch_id'];
			$pars['op_user_id'] = $wechat['sub_mch_id'];
			if ($wechat['sub_appid']) 
			{
				$pars['sub_appid'] = $wechat['sub_appid'];
			}
		}
		ksort($pars, SORT_STRING);
		$string1 = '';
		foreach ($pars as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 .= 'key=' . $sec['apikey'];
		$pars['sign'] = strtoupper(md5($string1));
		$xml = array2xml($pars);
		$extras = array();
		$errmsg = '未上传完整的微信支付证书，请到【系统设置】->【支付方式】中上传!';
		if (is_array($certs)) 
		{
			if (empty($certs['cert']) || empty($certs['key']) || empty($certs['root'])) 
			{
				if ($_W['ispost']) 
				{
					show_json(0, array('message' => $errmsg));
				}
				show_message($errmsg, '', 'error');
			}
			$certfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($certfile, $certs['cert']);
			$keyfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($keyfile, $certs['key']);
			$rootfile = IA_ROOT . '/addons/ewei_shopv2/cert/' . random(128);
			file_put_contents($rootfile, $certs['root']);
			$extras['CURLOPT_SSLCERT'] = $certfile;
			$extras['CURLOPT_SSLKEY'] = $keyfile;
			$extras['CURLOPT_CAINFO'] = $rootfile;
		}
		else 
		{
			if ($_W['ispost']) 
			{
				show_json(0, array('message' => $errmsg));
			}
			show_message($errmsg, '', 'error');
		}
		load()->func('communication');
		$resp = ihttp_request($url, $xml, $extras);
		@unlink($certfile);
		@unlink($keyfile);
		@unlink($rootfile);
		if (is_error($resp)) 
		{
			return error(-2, $resp['message']);
		}
		if (empty($resp['content'])) 
		{
			return error(-2, '网络错误');
		}
		$arr = json_decode(json_encode(simplexml_load_string($resp['content'], 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		if (($arr['return_code'] == 'SUCCESS') && ($arr['result_code'] == 'SUCCESS')) 
		{
			return true;
		}
		if (($arr['return_code'] == 'SUCCESS') && ($arr['result_code'] == 'FAIL') && ($arr['return_msg'] == 'OK') && !($refund_account)) 
		{
			if ($arr['err_code'] == 'NOTENOUGH') 
			{
				$this->refundBorrow($openid, $out_trade_no, $out_refund_no, $totalmoney, $refundmoney, $gaijia, 'REFUND_SOURCE_RECHARGE_FUNDS');
				return;
			}
		}
		else 
		{
			if ($arr['return_msg'] == $arr['err_code_des']) 
			{
				$error = $arr['return_msg'];
			}
			else 
			{
				$error = $arr['return_msg'] . ' | ' . $arr['err_code_des'];
			}
			return error(-2, $error);
		}
	}
	public function AlipayRefund($params, $batch_no, $config) 
	{
		global $_W;
		$params['refund_reason'] = str_replace(array('^', '|', '$', '#'), '', $params['refund_reason']);
		$parameter = array('service' => 'refund_fastpay_by_platform_pwd', 'partner' => $config['partner'], '_input_charset' => 'UTF-8', 'notify_url' => (isset($params['notify_url']) ? $params['notify_url'] : $_W['siteroot'] . 'addons/ewei_shopv2/payment/alipay/notify.php'), 'seller_user_id' => $config['partner'], 'seller_email' => $config['account'], 'refund_date' => date('Y-m-d H:i:s'), 'batch_no' => $batch_no, 'batch_num' => '1', 'detail_data' => $params['trade_no'] . '^' . $params['refund_price'] . '^' . $params['refund_reason']);
		$parameter = array_filter($parameter);
		$prepares = array();
		foreach ($parameter as $key => $value ) 
		{
			$prepares[] = $key . '=' . $value;
		}
		sort($prepares);
		$string = implode($prepares, '&');
		$string_md5 = $string . $config['secret'];
		$parameter['sign'] = md5($string_md5);
		$parameter['sign_type'] = 'MD5';
		load()->func('communication');
		$url = 'https://mapi.alipay.com/gateway.do?' . http_build_query($parameter, '', '&');
		return $url;
	}
	public function newAlipayRefund($params, $config) 
	{
		global $_W;
		$biz_content = array();
		$biz_content['out_trade_no'] = $params['out_trade_no'];
		$biz_content['refund_amount'] = $params['refund_amount'];
		$biz_content['refund_reason'] = $params['refund_reason'];
		$biz_content['out_request_no'] = $params['out_request_no'];
		$biz_content['operator_id'] = $params['operator_id'];
		$biz_content['store_id'] = $params['store_id'];
		$biz_content['terminal_id'] = $params['terminal_id'];
		$biz_content = array_filter($biz_content);
		$config['method'] = 'alipay.trade.refund';
		$config['biz_content'] = json_encode($biz_content);
		$result = m('common')->publicAliPay($config);
		if (is_error($result)) 
		{
			return $result;
		}
		if ($result['alipay_trade_refund_response']['code'] == '10000') 
		{
			return $result['alipay_trade_refund_response'];
		}
		return error($result['alipay_trade_refund_response']['code'], $result['alipay_trade_refund_response']['msg'] . ':' . $result['alipay_trade_refund_response']['sub_msg']);
	}
	public function downloadbill($starttime, $endtime, $type = 'ALL') 
	{
		global $_W;
		global $_GPC;
		$dates = array();
		$startdate = date('Ymd', $starttime);
		$enddate = date('Ymd', $endtime);
		if ($startdate == $enddate) 
		{
			$dates = array($startdate);
		}
		else 
		{
			$days = (double) $endtime - $starttime / 86400;
			$d = 0;
			while ($d < $days) 
			{
				$dates[] = date('Ymd', strtotime($startdate . '+' . $d . ' day'));
				++$d;
			}
		}
		if (empty($dates)) 
		{
			show_message('对账单日期选择错误!', '', 'error');
		}
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (!(is_array($setting['payment']))) 
		{
			return error(1, '没有设定支付参数');
		}
		$wechat = $setting['payment']['wechat'];
		$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
		$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
		$content = '';
		foreach ($dates as $date ) 
		{
			$dc = $this->downloadday($date, $row, $wechat, $type);
			if (is_error($dc) || strexists($dc, 'CDATA[FAIL]')) 
			{
				continue;
			}
			$content .= $date . ' 账单' . "\r\n\r\n";
			$content .= $dc . "\r\n\r\n";
		}
		$content = '﻿' . $content;
		$file = time() . '.csv';
		header('Content-type: application/octet-stream ');
		header('Accept-Ranges: bytes ');
		header('Content-Disposition: attachment; filename=' . $file);
		header('Expires: 0 ');
		header('Content-Encoding: UTF8');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0 ');
		header('Pragma: public ');
		exit($content);
	}
	private function downloadday($date, $row, $wechat, $type) 
	{
		$url = 'https://api.mch.weixin.qq.com/pay/downloadbill';
		$pars = array();
		$pars['appid'] = $row['key'];
		$pars['mch_id'] = $wechat['mchid'];
		$pars['nonce_str'] = random(8);
		$pars['device_info'] = 'ewei_shopv2';
		$pars['bill_date'] = $date;
		$pars['bill_type'] = $type;
		ksort($pars, SORT_STRING);
		$string1 = '';
		foreach ($pars as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 .= 'key=' . $wechat['apikey'];
		$pars['sign'] = strtoupper(md5($string1));
		$xml = array2xml($pars);
		$extras = array();
		load()->func('communication');
		$resp = ihttp_request($url, $xml, $extras);
		if (strexists($resp['content'], 'No Bill Exist')) 
		{
			return error(-2, '未搜索到任何账单');
		}
		if (is_error($resp)) 
		{
			return error(-2, $resp['message']);
		}
		if (empty($resp['content'])) 
		{
			return error(-2, '网络错误');
		}
		return $resp['content'];
	}
	public function closeOrder($out_trade_no = '') 
	{
		global $_W;
		global $_GPC;
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (!(is_array($setting['payment']))) 
		{
			return error(1, '没有设定支付参数');
		}
		$wechat = $setting['payment']['wechat'];
		$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
		$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
		$url = 'https://api.mch.weixin.qq.com/pay/closeorder';
		$pars = array();
		$pars['appid'] = $row['key'];
		$pars['mch_id'] = $wechat['mchid'];
		$pars['nonce_str'] = random(8);
		$pars['out_trade_no'] = $out_trade_no;
		ksort($pars, SORT_STRING);
		$string1 = '';
		foreach ($pars as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 .= 'key=' . $wechat['apikey'];
		$pars['sign'] = strtoupper(md5($string1));
		$xml = array2xml($pars);
		load()->func('communication');
		$resp = ihttp_post($url, $xml);
		if (is_error($resp)) 
		{
			return error(-2, $resp['message']);
		}
		if (empty($resp['content'])) 
		{
			return error(-2, '网络错误');
		}
		$arr = json_decode(json_encode(simplexml_load_string($resp['content'], 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		if (($arr['return_code'] == 'SUCCESS') && ($arr['result_code'] == 'SUCCESS')) 
		{
			return true;
		}
		if ($arr['return_msg'] == $arr['err_code_des']) 
		{
			$error = $arr['return_msg'];
		}
		else 
		{
			$error = $arr['return_msg'] . ' | ' . $arr['err_code_des'];
		}
		return error(-2, $error);
	}
	public function isWeixinPay($out_trade_no, $money = 0, $app = false) 
	{
		global $_W;
		global $_GPC;
		$pay = m('common')->getSysset('pay');
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		if (!(empty($pay['weixin_sub']))) 
		{
			$wechat = array('appid' => $sec['appid_sub'], 'mchid' => $sec['mchid_sub'], 'sub_appid' => (!(empty($sec['sub_appid_sub'])) ? $sec['sub_appid_sub'] : ''), 'sub_mch_id' => $sec['sub_mchid_sub'], 'apikey' => $sec['apikey_sub']);
			$row = array('key' => $sec['appid_sub']);
		}
		else 
		{
			$setting = uni_setting($_W['uniacid'], array('payment'));
			if (!(is_array($setting['payment']))) 
			{
				return error(1, '没有设定支付参数');
			}
			$wechat = $setting['payment']['wechat'];
			$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
			$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
		}
		if ($app) 
		{
			$wechat = array('version' => 1, 'apikey' => $sec['app_wechat']['apikey'], 'signkey' => $sec['app_wechat']['apikey'], 'appid' => $sec['app_wechat']['appid'], 'mchid' => $sec['app_wechat']['merchid']);
		}
		$url = 'https://api.mch.weixin.qq.com/pay/orderquery';
		$pars = array();
		$pars['appid'] = (($app ? $wechat['appid'] : $row['key']));
		$pars['mch_id'] = $wechat['mchid'];
		$pars['nonce_str'] = random(8);
		$pars['out_trade_no'] = $out_trade_no;
		if (!(empty($pay['weixin_sub'])) && !(is_h5app())) 
		{
			$pars['sub_mch_id'] = $wechat['sub_mch_id'];
		}
		ksort($pars, SORT_STRING);
		$string1 = '';
		foreach ($pars as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 .= 'key=' . $wechat['apikey'];
		$pars['sign'] = strtoupper(md5($string1));
		$xml = array2xml($pars);
		load()->func('communication');
		$resp = ihttp_post($url, $xml);
		if (is_error($resp)) 
		{
			return error(-2, $resp['message']);
		}
		if (empty($resp['content'])) 
		{
			return error(-2, '网络错误');
		}
		$arr = json_decode(json_encode((array) simplexml_load_string($resp['content'])), true);
		$xml = '<?xml version="1.0" encoding="utf-8"?>' . $resp['content'];
		$dom = new DOMDocument();
		if ($dom->loadXML($xml)) 
		{
			$xpath = new DOMXPath($dom);
			$code = $xpath->evaluate('string(//xml/return_code)');
			$ret = $xpath->evaluate('string(//xml/result_code)');
			$trade_state = $xpath->evaluate('string(//xml/trade_state)');
			if ((strtolower($code) == 'success') && (strtolower($ret) == 'success') && (strtolower($trade_state) == 'success')) 
			{
				$total_fee = intval($xpath->evaluate('string(//xml/total_fee)')) / 100;
				if ($total_fee != $money) 
				{
					return error(-1, '金额出错');
				}
				return true;
			}
			if ($xpath->evaluate('string(//xml/return_msg)') == $xpath->evaluate('string(//xml/err_code_des)')) 
			{
				$error = $xpath->evaluate('string(//xml/return_msg)');
			}
			else 
			{
				$error = $xpath->evaluate('string(//xml/return_msg)') . ' | ' . $xpath->evaluate('string(//xml/err_code_des)');
			}
			return error(-2, $error);
		}
		return error(-1, '未知错误');
	}
	public function isWeixinPayBorrow($out_trade_no, $money = 0) 
	{
		global $_W;
		global $_GPC;
		if (strexists($out_trade_no, 'GJ')) 
		{
			$out_trade_no = $out_trade_no . '_B';
		}
		else 
		{
			$out_trade_no = $out_trade_no . '_borrow';
		}
		$pay = m('common')->getSysset('pay');
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		if (!(empty($pay['weixin_jie_sub']))) 
		{
			$wechat = array('sub_appid' => (!(empty($sec['sub_appid_jie_sub'])) ? $sec['sub_appid_jie_sub'] : ''), 'sub_mch_id' => $sec['sub_mchid_jie_sub']);
			$sec['appid'] = $sec['appid_jie_sub'];
			$sec['mchid'] = $sec['mchid_jie_sub'];
			$sec['apikey'] = $sec['apikey_jie_sub'];
		}
		else 
		{
			if (empty($sec['appid']) || empty($sec['mchid']) || empty($sec['apikey'])) 
			{
				return error(1, '没有设定支付参数');
			}
		}
		$url = 'https://api.mch.weixin.qq.com/pay/orderquery';
		$pars = array();
		$pars['appid'] = $sec['appid'];
		$pars['mch_id'] = $sec['mchid'];
		$pars['nonce_str'] = random(8);
		$pars['out_trade_no'] = $out_trade_no;
		if (!(empty($pay['weixin_jie_sub']))) 
		{
			$pars['sub_mch_id'] = $wechat['sub_mch_id'];
		}
		ksort($pars, SORT_STRING);
		$string1 = '';
		foreach ($pars as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 .= 'key=' . $sec['apikey'];
		$pars['sign'] = strtoupper(md5($string1));
		$xml = array2xml($pars);
		load()->func('communication');
		$resp = ihttp_post($url, $xml);
		if (is_error($resp)) 
		{
			return error(-2, $resp['message']);
		}
		if (empty($resp['content'])) 
		{
			return error(-2, '网络错误');
		}
		$arr = json_decode(json_encode((array) simplexml_load_string($resp['content'])), true);
		$xml = '<?xml version="1.0" encoding="utf-8"?>' . $resp['content'];
		$dom = new DOMDocument();
		if ($dom->loadXML($xml)) 
		{
			$xpath = new DOMXPath($dom);
			$code = $xpath->evaluate('string(//xml/return_code)');
			$ret = $xpath->evaluate('string(//xml/result_code)');
			$trade_state = $xpath->evaluate('string(//xml/trade_state)');
			if ((strtolower($code) == 'success') && (strtolower($ret) == 'success') && (strtolower($trade_state) == 'success')) 
			{
				$total_fee = intval($xpath->evaluate('string(//xml/total_fee)')) / 100;
				if ($total_fee != $money) 
				{
					return error(-1, '金额出错');
				}
				return true;
			}
			if ($xpath->evaluate('string(//xml/return_msg)') == $xpath->evaluate('string(//xml/err_code_des)')) 
			{
				$error = $xpath->evaluate('string(//xml/return_msg)');
			}
			else 
			{
				$error = $xpath->evaluate('string(//xml/return_msg)') . ' | ' . $xpath->evaluate('string(//xml/err_code_des)');
			}
			return error(-2, $error);
		}
		return error(-1, '未知错误');
	}
	public function isAlipayNotify($gpc) 
	{
		global $_W;
		$notify_id = trim($gpc['notify_id']);
		$notify_sign = trim($gpc['sign']);
		if (empty($notify_id) || empty($notify_sign)) 
		{
			return false;
		}
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (!(is_array($setting['payment']))) 
		{
			return false;
		}
		$alipay = $setting['payment']['alipay'];
		$params = array('body' => $gpc['body'], 'is_success' => $gpc['is_success'], 'notify_id' => $gpc['notify_id'], 'notify_time' => $gpc['notify_time'], 'notify_type' => $gpc['notify_type'], 'out_trade_no' => $gpc['out_trade_no'], 'payment_type' => $gpc['payment_type'], 'seller_id' => $gpc['seller_id'], 'service' => $gpc['service'], 'subject' => $gpc['subject'], 'total_fee' => $gpc['total_fee'], 'trade_no' => $gpc['trade_no'], 'trade_status' => $gpc['trade_status']);
		ksort($params, SORT_STRING);
		$string1 = '';
		foreach ($params as $k => $v ) 
		{
			$string1 .= $k . '=' . $v . '&';
		}
		$string1 = rtrim($string1, '&') . $alipay['secret'];
		$sign = strtolower(md5($string1));
		if ($notify_sign != $sign) 
		{
			return false;
		}
		$url = 'https://mapi.alipay.com/gateway.do?service=notify_verify&partner=' . $alipay['partner'] . '&notify_id=' . $notify_id;
		$resp = @file_get_contents($url);
		return preg_match('/true$/i', $resp);
	}
	public function RSAVerify($return_data, $public_key, $ksort = true) 
	{
		if (empty($return_data) || !(is_array($return_data))) 
		{
			return false;
		}
		$public_key = m('common')->chackKey($public_key);
		$pkeyid = openssl_pkey_get_public($public_key);
		if (empty($pkeyid)) 
		{
			return false;
		}
		$rsasign = $return_data['sign'];
		unset($return_data['sign']);
		unset($return_data['sign_type']);
		if ($ksort) 
		{
			ksort($return_data);
		}
		if (is_array($return_data) && !(empty($return_data))) 
		{
			$strdata = '';
			foreach ($return_data as $k => $v ) 
			{
				if (empty($v)) 
				{
					continue;
				}
				if (is_array($v)) 
				{
					$strdata .= $k . '=' . json_encode($v) . '&';
				}
				else 
				{
					$strdata .= $k . '=' . $v . '&';
				}
			}
		}
		$strdata = trim($strdata, '&');
		$rsasign = str_replace(' ', '+', $rsasign);
		$rsasign = base64_decode($rsasign);
		$rsaverify = openssl_verify($strdata, $rsasign, $pkeyid);
		openssl_free_key($pkeyid);
		return $rsaverify;
	}
}
?>