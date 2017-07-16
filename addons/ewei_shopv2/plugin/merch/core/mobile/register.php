<?php

class Register_EweiShopV2Page extends PluginMobileLoginPage
{
	public function main()
	{
		global $_W;
		global $_GPC;
		$set = $_W['shopset']['merch'];

		if (empty($set['apply_openmobile'])) {
			$this->message('未开启商户入驻申请', '', 'error');
		}


		$reg = pdo_fetch('select * from ' . tablename('ewei_shop_merch_reg') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
		$user = false;

		if (!empty($reg['status'])) {
			$user = pdo_fetch('select * from ' . tablename('ewei_shop_merch_user') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
		}


		if (!empty($user) && (1 <= $user['status'])) {
			$this->message('您已经申请，无需重复申请!', '', 'error');
		}


		$apply_set = array();
		$apply_set['open_protocol'] = $set['open_protocol'];

		if (empty($set['applytitle'])) {
			$apply_set['applytitle'] = '入驻申请协议';
		}
		 else {
			$apply_set['applytitle'] = $set['applytitle'];
		}

		$template_flag = 0;
		$diyform_plugin = p('diyform');
		$fields = array();

		if ($diyform_plugin) {
			if (!empty($set['apply_diyform']) && !empty($set['apply_diyformid'])) {
				$template_flag = 1;
				$diyform_id = $set['apply_diyformid'];

				if (!empty($diyform_id)) {
					$formInfo = $diyform_plugin->getDiyformInfo($diyform_id);
					$fields = $formInfo['fields'];
					$diyform_data = iunserializer($reg['diyformdata']);
					$member = m('member')->getMember($_W['openid']);
					$f_data = $diyform_plugin->getDiyformData($diyform_data, $fields, $member);
				}

			}

		}


		if ($_W['ispost']) {
			if (empty($set['apply_openmobile'])) {
				show_json(0, '未开启商户入驻申请!');
			}


			if (!empty($user) && (1 <= $user['status'])) {
				show_json(0, '您已经申请，无需重复申请!');
			}


			$data = array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'status' => 0, 'realname' => trim($_GPC['realname']), 'mobile' => trim($_GPC['mobile']), 'merchname' => trim($_GPC['merchname']), 'salecate' => trim($_GPC['salecate']), 'desc' => trim($_GPC['desc']));

			if ($template_flag == 1) {
				$mdata = $_GPC['mdata'];
				$insert_data = $diyform_plugin->getInsertData($fields, $mdata);
				$datas = $insert_data['data'];
				$m_data = $insert_data['m_data'];
				$mc_data = $insert_data['mc_data'];
				$data['diyformfields'] = iserializer($fields);
				$data['diyformdata'] = $datas;
			}


			if (empty($reg)) {
				$data['applytime'] = time();
				pdo_insert('ewei_shop_merch_reg', $data);
			}
			 else {
				pdo_update('ewei_shop_merch_reg', $data, array('id' => $reg['id']));
			}

			$this->model->sendMessage(array('merchname' => $data['merchname'], 'salecate' => $data['salecate'], 'realname' => $data['realname'], 'mobile' => $data['mobile'], 'applytime' => time()), 'merch_apply');
			show_json(1);
		}


		include $this->template();
	}

	public function notice()
	{
		global $_W;
		$set = $_W['shopset']['merch'];
		include $this->template('merch/register_notice');
	}

	public function message($msg, $redirect = '', $type = '')
	{
		global $_W;
		$title = '';
		$buttontext = '';
		$message = $msg;

		if (is_array($msg)) {
			$message = ((isset($msg['message']) ? $msg['message'] : ''));
			$title = ((isset($msg['title']) ? $msg['title'] : ''));
			$buttontext = ((isset($msg['buttontext']) ? $msg['buttontext'] : ''));
		}


		if (empty($redirect)) {
			$redirect = 'javascript:history.back(-1);';
		}
		 else if ($redirect == 'close') {
			$redirect = 'javascript:WeixinJSBridge.call("closeWindow")';
		}


		include $this->template('_message');
		exit();
	}
}


?>