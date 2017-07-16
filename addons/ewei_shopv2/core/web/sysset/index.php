<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Index_EweiShopV2Page extends WebPage 
{
	public function main() 
	{
		if (cv('sysset.shop')) 
		{
			header('location: ' . webUrl('sysset/shop'));
			return;
		}
		if (cv('sysset.follow')) 
		{
			header('location: ' . webUrl('sysset/follow'));
			return;
		}
		if (cv('sysset.wap')) 
		{
			header('location: ' . webUrl('sysset/wap'));
			return;
		}
		if (cv('sysset.pcset')) 
		{
			header('location: ' . webUrl('sysset/pcset'));
			return;
		}
		if (cv('sysset.notice')) 
		{
			header('location: ' . webUrl('sysset/notice'));
			return;
		}
		if (cv('sysset.trade')) 
		{
			header('location: ' . webUrl('sysset/trade'));
			return;
		}
		if (cv('sysset.payset')) 
		{
			header('location: ' . webUrl('sysset/payset'));
			return;
		}
		if (cv('sysset.templat')) 
		{
			header('location: ' . webUrl('sysset/templat'));
			return;
		}
		if (cv('sysset.member')) 
		{
			header('location: ' . webUrl('sysset/member'));
			return;
		}
		if (cv('sysset.category')) 
		{
			header('location: ' . webUrl('sysset/category'));
			return;
		}
		if (cv('sysset.contact')) 
		{
			header('location: ' . webUrl('sysset/contact'));
			return;
		}
		if (cv('sysset.qiniu')) 
		{
			header('location: ' . webUrl('sysset/qiniu'));
			return;
		}
		if (cv('sysset.sms.set')) 
		{
			header('location: ' . webUrl('sysset/sms/set'));
			return;
		}
		if (cv('sysset.sms.temp')) 
		{
			header('location: ' . webUrl('sysset/sms/temp'));
			return;
		}
		if (cv('sysset.close')) 
		{
			header('location: ' . webUrl('sysset/close'));
			return;
		}
		if (cv('sysset.tmessage')) 
		{
			header('location: ' . webUrl('sysset/tmessage'));
			return;
		}
		if (cv('sysset.cover')) 
		{
			header('location: ' . webUrl('sysset/cover'));
			return;
		}
		header('location: ' . webUrl());
	}
	public function shop() 
	{
		global $_W;
		global $_GPC;
		$data = m('common')->getSysset('shop');
		if ($_W['ispost']) 
		{
			ca('sysset.shop.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$data['name'] = trim($data['name']);
			$data['img'] = save_media($data['img']);
			$data['logo'] = save_media($data['logo']);
			$data['signimg'] = save_media($data['signimg']);
			$data['diycode'] = $_POST['data']['diycode'];
			m('common')->updateSysset(array('shop' => $data));
			plog('sysset.shop.edit', '修改系统设置-商城设置');
			show_json(1);
		}
		include $this->template('sysset/index');
	}
	public function follow() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			ca('sysset.follow.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$data['logo'] = save_media($data['icon']);
			m('common')->updateSysset(array('share' => $data));
			plog('sysset.follow.edit', '修改系统设置-分享及关注设置');
			show_json(1);
		}
		$data = m('common')->getSysset('share');
		include $this->template();
	}
	public function settemplateid() 
	{
		global $_W;
		global $_GPC;
		$tag = $_GPC['tag'];
		load()->func('communication');
		$account = m('common')->getAccount();
		$token = $account->fetch_token();
		$url = 'https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=' . $token;
		$c = ihttp_request($url);
		$result = json_decode($c['content'], true);
		if (!(is_array($result))) 
		{
			show_json(1, array('status' => 0, 'messages' => '微信接口错误.', 'tag' => $tag));
		}
		if (!(empty($result['errcode']))) 
		{
			show_json(1, array('status' => 0, 'messages' => $result['errmsg'], 'tag' => $tag));
		}
		$error_message = '';
		$templatenum = count($result['template_list']);
		$templatetype = pdo_fetch('select `name`,templatecode,content  from ' . tablename('ewei_shop_member_message_template_type') . ' where typecode=:typecode  limit 1', array(':typecode' => $tag));
		if (empty($templatetype)) 
		{
			show_json(1, array('status' => 0, 'messages' => '默认模板信息错误', 'tag' => $tag));
		}
		$content = str_replace("\n", '', $templatetype['content']);
		$issnoet = true;
		foreach ($result['template_list'] as $key => $value ) 
		{
			if (str_replace("\n", '', $value['content']) == $content) 
			{
				$issnoet = false;
				pdo_update('ewei_shop_member_message_template_type', array('templateid' => $value['template_id']), array('typecode' => $tag));
				show_json(1, array('status' => 1, 'tag' => $tag));
			}
		}
		if ($issnoet) 
		{
			if (25 <= $templatenum) 
			{
				show_json(1, array('status' => 0, 'messages' => '开启' . $templatetype['name'] . '失败！！您的可用微信模板消息数量达到上限，请删除部分后重试！！', 'tag' => $tag));
			}
			$bb = '{"template_id_short":"' . $templatetype['templatecode'] . '"}';
			$account = m('common')->getAccount();
			$token = $account->fetch_token();
			$url = 'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token=' . $token;
			$ch1 = curl_init();
			curl_setopt($ch1, CURLOPT_URL, $url);
			curl_setopt($ch1, CURLOPT_POST, 1);
			curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch1, CURLOPT_POSTFIELDS, $bb);
			$c = curl_exec($ch1);
			$result = @json_decode($c, true);
			if (!(is_array($result))) 
			{
				show_json(1, array('status' => 0, 'messages' => '微信接口错误.', 'tag' => $tag));
			}
			if (!(empty($result['errcode']))) 
			{
				if (strstr($result['errmsg'], 'template conflict with industry hint')) 
				{
					show_json(1, array('status' => 0, 'messages' => '默认模板与公众号所属行业冲突,请将公众平台模板消息所在行业选择为： IT科技/互联网|电子商务， 其他/其他', 'tag' => $tag));
				}
				else if (strstr($result['errmsg'], 'system error hint')) 
				{
					show_json(1, array('status' => 0, 'messages' => '微信接口系统繁忙,请稍后再试!', 'tag' => $tag));
				}
				else if (strstr($result['errmsg'], 'invalid industry id hint')) 
				{
					show_json(1, array('status' => 0, 'messages' => '微信接口系统繁忙,请稍后再试!', 'tag' => $tag));
				}
				else if (strstr($result['errmsg'], 'access_token is invalid or not latest hint')) 
				{
					show_json(1, array('status' => 0, 'messages' => '微信证书无效，请检查微擎access_token设置', 'tag' => $tag));
				}
				else 
				{
					show_json(1, array('status' => 0, 'messages' => $result['errmsg'], 'tag' => $tag));
				}
			}
			else 
			{
				pdo_update('ewei_shop_member_message_template_type', array('templateid' => $result['template_id']), array('typecode' => $tag));
			}
		}
		show_json(1, array('status' => 1, 'tag' => $tag));
	}
	public function notice() 
	{
		global $_W;
		global $_GPC;
		$data = m('common')->getSysset('notice', false);
		$salers = array();
		if (isset($data['openid'])) 
		{
			if (!(empty($data['openid']))) 
			{
				$openids = array();
				$strsopenids = explode(',', $data['openid']);
				foreach ($strsopenids as $openid ) 
				{
					$openids[] = '\'' . $openid . '\'';
				}
				$salers = pdo_fetchall('select id,nickname,avatar,openid from ' . tablename('ewei_shop_member') . ' where openid in (' . implode(',', $openids) . ') and uniacid=' . $_W['uniacid']);
			}
		}
		$salers2 = array();
		if (isset($data['openid2'])) 
		{
			if (!(empty($data['openid2']))) 
			{
				$openids2 = array();
				$strsopenids2 = explode(',', $data['openid2']);
				foreach ($strsopenids2 as $openid2 ) 
				{
					$openids2[] = '\'' . $openid2 . '\'';
				}
				$salers2 = pdo_fetchall('select id,nickname,avatar,openid from ' . tablename('ewei_shop_member') . ' where openid in (' . implode(',', $openids2) . ') and uniacid=' . $_W['uniacid']);
			}
		}
		$opensms = com('sms');
		if ($_W['ispost']) 
		{
			ca('sysset.notice.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			if (is_array($_GPC['openids'])) 
			{
				$data['openid'] = implode(',', $_GPC['openids']);
			}
			else 
			{
				$data['openid'] = '';
			}
			if (is_array($_GPC['openids2'])) 
			{
				$data['openid2'] = implode(',', $_GPC['openids2']);
			}
			else 
			{
				$data['openid2'] = '';
			}
			if (empty($data['willcancel_close_advanced'])) 
			{
				$uniacids = m('cache')->get('willcloseuniacid', 'global');
				if (!(is_array($uniacids))) 
				{
					$uniacids = array();
				}
				if (!(in_array($_W['uniacid'], $uniacids))) 
				{
					$uniacids[] = $_W['uniacid'];
					m('cache')->set('willcloseuniacid', $uniacids, 'global');
				}
			}
			else 
			{
				$uniacids = m('cache')->get('willcloseuniacid', 'global');
				if (is_array($uniacids)) 
				{
					if (in_array($_W['uniacid'], $uniacids)) 
					{
						$datas = array();
						foreach ($uniacids as $uniacid ) 
						{
							if ($uniacid != $_W['uniacid']) 
							{
								$datas[] = $uniacid;
							}
						}
						m('cache')->set('willcloseuniacid', $datas, 'global');
					}
				}
			}
			m('common')->updateSysset(array('notice' => $data));
			plog('sysset.notice.edit', '修改系统设置-模板消息通知设置');
			show_json(1);
		}
		$template_list = pdo_fetchall('SELECT id,title,typecode FROM ' . tablename('ewei_shop_member_message_template') . ' WHERE uniacid=:uniacid ', array(':uniacid' => $_W['uniacid']));
		$templatetype_list = pdo_fetchall('SELECT * FROM  ' . tablename('ewei_shop_member_message_template_type'));
		$template_group = array();
		foreach ($templatetype_list as $type ) 
		{
			$templates = array();
			foreach ($template_list as $template ) 
			{
				if ($template['typecode'] == $type['typecode']) 
				{
					$templates[] = $template;
				}
			}
			$template_group[$type['typecode']] = $templates;
		}
		if ($opensms) 
		{
			$smsset = com('sms')->sms_set();
			if (empty($smsset['juhe']) && empty($smsset['dayu']) && empty($smsset['emay'])) 
			{
				$opensms = false;
			}
			$template_sms = com('sms')->sms_temp();
		}
		include $this->template();
	}
	public function trade() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			ca('sysset.trade.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			if ($data['maxcredit'] < 0) 
			{
				$data['maxcredit'] = 0;
			}
			if (!(empty($data['withdrawcharge']))) 
			{
				$data['withdrawcharge'] = trim($data['withdrawcharge']);
				$data['withdrawcharge'] = floatval(trim($data['withdrawcharge'], '%'));
			}
			$data['minimumcharge'] = floatval(trim($data['minimumcharge']));
			$data['withdrawbegin'] = floatval(trim($data['withdrawbegin']));
			$data['withdrawend'] = floatval(trim($data['withdrawend']));
			$data['nodispatchareas'] = iserializer($data['nodispatchareas']);
			$data['withdrawcashweixin'] = intval($data['withdrawcashweixin']);
			$data['withdrawcashalipay'] = intval($data['withdrawcashalipay']);
			$data['withdrawcashcard'] = intval($data['withdrawcashcard']);
			if (!(empty($data['closeorder']))) 
			{
				$data['closeorder'] = intval($data['closeorder']);
			}
			if (!(empty($data['willcloseorder']))) 
			{
				$data['willcloseorder'] = intval($data['willcloseorder']);
			}
			m('common')->updateSysset(array('trade' => $data));
			plog('sysset.trade.edit', '修改系统设置-交易设置');
			show_json(1);
		}
		$areas = m('common')->getAreas();
		$data = m('common')->getSysset('trade');
		$data['nodispatchareas'] = iunserializer($data['nodispatchareas']);
		include $this->template();
	}
	protected function upload_cert($fileinput) 
	{
		global $_W;
		$path = IA_ROOT . '/addons/ewei_shopv2/cert';
		load()->func('file');
		mkdirs($path);
		$f = $fileinput . '_' . $_W['uniacid'] . '.pem';
		$outfilename = $path . '/' . $f;
		$filename = $_FILES[$fileinput]['name'];
		$tmp_name = $_FILES[$fileinput]['tmp_name'];
		if (!(empty($filename)) && !(empty($tmp_name))) 
		{
			$ext = strtolower(substr($filename, strrpos($filename, '.')));
			if ($ext != '.pem') 
			{
				$errinput = '';
				if ($fileinput == 'weixin_cert_file') 
				{
					$errinput = 'CERT文件格式错误';
				}
				else if ($fileinput == 'weixin_key_file') 
				{
					$errinput = 'KEY文件格式错误';
				}
				else if ($fileinput == 'weixin_root_file') 
				{
					$errinput = 'ROOT文件格式错误';
				}
				show_json(0, $errinput . ',请重新上传!');
			}
			return file_get_contents($tmp_name);
		}
		return '';
	}
	public function payset() 
	{
		global $_W;
		global $_GPC;
		$data = m('common')->getSysset('pay');
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		if ($_W['ispost']) 
		{
			ca('sysset.payset.edit');
			if ($_FILES['weixin_cert_file']['name']) 
			{
				$sec['cert'] = $this->upload_cert('weixin_cert_file');
			}
			if ($_FILES['weixin_key_file']['name']) 
			{
				$sec['key'] = $this->upload_cert('weixin_key_file');
			}
			if ($_FILES['weixin_root_file']['name']) 
			{
				$sec['root'] = $this->upload_cert('weixin_root_file');
			}
			if ($_FILES['weixin_sub_cert_file']['name']) 
			{
				$sec['sub']['cert'] = $this->upload_cert('weixin_sub_cert_file');
			}
			if ($_FILES['weixin_sub_key_file']['name']) 
			{
				$sec['sub']['key'] = $this->upload_cert('weixin_sub_key_file');
			}
			if ($_FILES['weixin_sub_root_file']['name']) 
			{
				$sec['sub']['root'] = $this->upload_cert('weixin_sub_root_file');
			}
			if ($_FILES['weixin_jie_cert_file']['name']) 
			{
				$sec['jie']['cert'] = $this->upload_cert('weixin_jie_cert_file');
			}
			if ($_FILES['weixin_jie_key_file']['name']) 
			{
				$sec['jie']['key'] = $this->upload_cert('weixin_jie_key_file');
			}
			if ($_FILES['weixin_jie_root_file']['name']) 
			{
				$sec['jie']['root'] = $this->upload_cert('weixin_jie_root_file');
			}
			if ($_FILES['weixin_jie_sub_cert_file']['name']) 
			{
				$sec['jie_sub']['cert'] = $this->upload_cert('weixin_jie_sub_cert_file');
			}
			if ($_FILES['weixin_jie_sub_key_file']['name']) 
			{
				$sec['jie_sub']['key'] = $this->upload_cert('weixin_jie_sub_key_file');
			}
			if ($_FILES['weixin_jie_sub_root_file']['name']) 
			{
				$sec['jie_sub']['root'] = $this->upload_cert('weixin_jie_sub_root_file');
			}
			if ($_FILES['app_wechat_cert_file']['name']) 
			{
				$sec['app_wechat']['cert'] = $this->upload_cert('app_wechat_cert_file');
			}
			if ($_FILES['app_wechat_key_file']['name']) 
			{
				$sec['app_wechat']['key'] = $this->upload_cert('app_wechat_key_file');
			}
			if ($_FILES['app_wechat_root_file']['name']) 
			{
				$sec['app_wechat']['root'] = $this->upload_cert('app_wechat_root_file');
			}
			$sec['app_wechat']['appid'] = trim($_GPC['data']['app_wechat_appid']);
			$sec['app_wechat']['appsecret'] = trim($_GPC['data']['app_wechat_appsecret']);
			$sec['app_wechat']['merchname'] = trim($_GPC['data']['app_wechat_merchname']);
			$sec['app_wechat']['merchid'] = trim($_GPC['data']['app_wechat_merchid']);
			$sec['app_wechat']['apikey'] = trim($_GPC['data']['app_wechat_apikey']);
			$sec['alipay_pay'] = ((is_array($_GPC['data']['alipay_pay']) ? $_GPC['data']['alipay_pay'] : array()));
			$sec['app_alipay']['public_key'] = trim($_GPC['data']['app_alipay_public_key']);
			$sec['app_alipay']['private_key'] = trim($_GPC['data']['app_alipay_private_key']);
			$sec['app_alipay']['appid'] = trim($_GPC['data']['app_alipay_appid']);
			$sec['appid_sub'] = trim($_GPC['data']['appid_sub']);
			$sec['sub_appid_sub'] = trim($_GPC['data']['sub_appid_sub']);
			$sec['mchid_sub'] = trim($_GPC['data']['mchid_sub']);
			$sec['sub_mchid_sub'] = trim($_GPC['data']['sub_mchid_sub']);
			$sec['apikey_sub'] = trim($_GPC['data']['apikey_sub']);
			$sec['appid'] = trim($_GPC['data']['appid']);
			$sec['secret'] = trim($_GPC['data']['secret']);
			$sec['mchid'] = trim($_GPC['data']['mchid']);
			$sec['apikey'] = trim($_GPC['data']['apikey']);
			$sec['appid_jie_sub'] = trim($_GPC['data']['appid_jie_sub']);
			$sec['sub_appid_jie_sub'] = trim($_GPC['data']['sub_appid_jie_sub']);
			$sec['sub_secret_jie_sub'] = trim($_GPC['data']['sub_secret_jie_sub']);
			$sec['mchid_jie_sub'] = trim($_GPC['data']['mchid_jie_sub']);
			$sec['sub_mchid_jie_sub'] = trim($_GPC['data']['sub_mchid_jie_sub']);
			$sec['apikey_jie_sub'] = trim($_GPC['data']['apikey_jie_sub']);
			pdo_update('ewei_shop_sysset', array('sec' => iserializer($sec)), array('uniacid' => $_W['uniacid']));
			$inputdata = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$data['weixin'] = intval($inputdata['weixin']);
			$data['weixin_sub'] = intval($inputdata['weixin_sub']);
			$data['weixin_jie'] = intval($inputdata['weixin_jie']);
			$data['weixin_jie_sub'] = intval($inputdata['weixin_jie_sub']);
			$data['alipay'] = intval($inputdata['alipay']);
			$data['credit'] = intval($inputdata['credit']);
			$data['cash'] = intval($inputdata['cash']);
			$data['app_wechat'] = intval($inputdata['app_wechat']);
			$data['app_alipay'] = intval($inputdata['app_alipay']);
			$data['paytype'] = ((isset($inputdata['paytype']) ? $inputdata['paytype'] : array()));
			m('common')->updateSysset(array('pay' => $data));
			plog('sysset.payset.edit', '修改系统设置-支付设置');
			show_json(1);
		}
		$url = $_W['siteroot'] . 'addons/ewei_shopv2/payment/wechat/notify.php';
		load()->func('communication');
		$resp = ihttp_get($url);
		include $this->template();
		exit();
	}
	public function member() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			ca('sysset.member.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$data['levelname'] = trim($data['levelname']);
			$data['levelurl'] = trim($data['levelurl']);
			$data['leveltype'] = intval($data['leveltype']);
			m('common')->updateSysset(array('member' => $data));
			$shop = m('common')->getSysset('shop');
			$shop['levelname'] = $data['levelname'];
			$shop['levelurl'] = $data['levelurl'];
			$shop['leveltype'] = $data['leveltype'];
			m('common')->updateSysset(array('shop' => $shop));
			plog('sysset.member.edit', '修改系统设置-会员设置');
			show_json(1);
		}
		$data = m('common')->getSysset('member');
		if (!(isset($data['levelname']))) 
		{
			$shop = m('common')->getSysset('shop');
			$data['levelname'] = $shop['levelname'];
			$data['levelurl'] = $shop['levelurl'];
			$data['leveltype'] = $shop['leveltype'];
		}
		include $this->template();
	}
	public function category() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			ca('sysset.category.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$shop = m('common')->getSysset('shop');
			$shop['level'] = intval($data['level']);
			$shop['show'] = intval($data['show']);
			$shop['advimg'] = save_media($data['advimg']);
			$shop['advurl'] = trim($data['advurl']);
			m('common')->updateSysset(array('category' => $data));
			$shop = m('common')->getSysset('shop');
			$shop['catlevel'] = $data['level'];
			$shop['catshow'] = $data['show'];
			$shop['catadvimg'] = save_media($data['advimg']);
			$shop['catadvurl'] = $data['advurl'];
			m('common')->updateSysset(array('shop' => $shop));
			plog('sysset.category.edit', '修改系统设置-分类层级设置');
			m('shop')->getCategory(true);
			show_json(1);
		}
		$data = m('common')->getSysset('category');
		if (empty($data)) 
		{
			$shop = m('common')->getSysset('shop');
			$data['level'] = $shop['catlevel'];
			$data['show'] = $shop['catshow'];
			$data['advimg'] = $shop['catadvimg'];
			$data['advurl'] = $shop['catadvurl'];
		}
		include $this->template();
	}
	public function contact() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			ca('sysset.contact.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$data['qq'] = trim($data['qq']);
			$data['address'] = trim($data['address']);
			$data['phone'] = trim($data['phone']);
			m('common')->updateSysset(array('contact' => $data));
			$shop = m('common')->getSysset('shop');
			$shop['qq'] = $data['qq'];
			$shop['address'] = $data['address'];
			$shop['phone'] = $data['phone'];
			m('common')->updateSysset(array('shop' => $shop));
			plog('sysset.contact.edit', '修改系统设置-联系方式设置');
			show_json(1);
		}
		$data = m('common')->getSysset('contact');
		if (empty($data)) 
		{
			$shop = m('common')->getSysset('shop');
			$data['qq'] = $shop['qq'];
			$data['address'] = $shop['address'];
			$data['phone'] = $shop['phone'];
		}
		include $this->template();
	}
	public function close() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			ca('sysset.close.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$data['flag'] = intval($data['flag']);
			$data['detail'] = m('common')->html_images($data['detail']);
			$data['url'] = trim($data['url']);
			m('common')->updateSysset(array('close' => $data));
			$shop = m('common')->getSysset('shop');
			$shop['close'] = $data['flag'];
			$shop['closedetail'] = $data['detail'];
			$shop['closeurl'] = $data['url'];
			m('common')->updateSysset(array('shop' => $shop));
			plog('sysset.close.edit', '修改系统设置-商城关闭设置');
			show_json(1);
		}
		$data = m('common')->getSysset('close');
		if (empty($data)) 
		{
			$shop = m('common')->getSysset('shop');
			$data['flag'] = $shop['close'];
			$data['detail'] = $shop['closedetail'];
			$data['url'] = $shop['closeurl'];
		}
		include $this->template();
	}
	public function templat() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			ca('sysset.templat.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			m('common')->updateSysset(array('template' => $data));
			$shop = m('common')->getSysset('shop');
			$shop['style'] = $data['style'];
			m('common')->updateSysset(array('shop' => $shop));
			m('cache')->set('template_shop', $data['style']);
			plog('sysset.templat.edit', '修改系统设置-模板设置');
			show_json(1);
		}
		$styles = array();
		$dir = IA_ROOT . '/addons/ewei_shopv2/template/mobile/';
		if ($handle = opendir($dir)) 
		{
			while (($file = readdir($handle)) !== false) 
			{
				if (($file != '..') && ($file != '.')) 
				{
					if (is_dir($dir . '/' . $file)) 
					{
						$styles[] = $file;
					}
				}
			}
			closedir($handle);
		}
		$data = m('common')->getSysset('template', false);
		include $this->template();
	}
	public function goodsprice() 
	{
		include $this->template();
	}
	public function wap() 
	{
		global $_W;
		global $_GPC;
		$data = m('common')->getSysset('wap');
		$wap = com('wap');
		if (!($wap)) 
		{
			$this->message('您没权限访问!');
			exit();
		}
		$sms = com('sms');
		if (!($sms)) 
		{
			$this->message('开启全网通请先开通短信通知');
			exit();
		}
		$template_sms = com('sms')->sms_temp();
		if ($_W['ispost']) 
		{
			ca('sysset.wap.edit');
			$data = ((is_array($_GPC['data']) ? $_GPC['data'] : array()));
			$data['open'] = intval($data['open']);
			$data['loginbg'] = save_media($data['loginbg']);
			$data['regbg'] = save_media($data['regbg']);
			$data['sns']['wx'] = intval($data['sns']['wx']);
			$data['sns']['qq'] = intval($data['sns']['qq']);
			m('common')->updateSysset(array('wap' => $data));
			plog('sysset.wap.edit', '修改WAP设置');
			show_json(1);
		}
		$styles = array();
		$dir = IA_ROOT . '/addons/ewei_shopv2/template/account/';
		if ($handle = opendir($dir)) 
		{
			while (($file = readdir($handle)) !== false) 
			{
				if (($file != '..') && ($file != '.')) 
				{
					if (is_dir($dir . '/' . $file)) 
					{
						$styles[] = $file;
					}
				}
			}
			closedir($handle);
		}
		include $this->template('sysset/wap');
	}
	public function funbar() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			$data = pdo_fetch('select * from ' . tablename('ewei_shop_funbar') . ' where uid=:uid and uniacid=:uniacid limit 1', array(':uid' => $_W['uid'], ':uniacid' => $_W['uniacid']));
			$funbardata = ((is_array($_GPC['funbardata']) ? $_GPC['funbardata'] : array()));
			$funbardata = serialize($funbardata);
			if (empty($data)) 
			{
				pdo_insert('ewei_shop_funbar', array('uid' => $_W['uid'], 'datas' => $funbardata, 'uniacid' => $_W['uniacid']));
			}
			else 
			{
				pdo_update('ewei_shop_funbar', array('datas' => $funbardata), array('uid' => $data['uid'], 'uniacid' => $_W['uniacid']));
			}
			show_json(1);
		}
	}
}
?>