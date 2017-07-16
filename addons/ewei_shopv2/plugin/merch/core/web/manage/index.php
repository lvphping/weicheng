<?php

require EWEI_SHOPV2_PLUGIN . 'merch/core/inc/page_merch.php';
class Index_EweiShopV2Page extends MerchWebPage
{
	public function main()
	{
		header('location: ' . merchUrl('shop'));
		exit();
	}

	public function quit()
	{
		global $_W;
		global $_GPC;
		isetcookie('__merch_' . $_W['uniacid'] . '_session', -7 * 86400);
		isetcookie('__uniacid', -7 * 86400);
		unset($_SESSION['__merch_uniacid']);
		header('location: ' . merchUrl('login') . '&i=' . $_W['uniacid']);
		exit();
	}

	public function updatepassword()
	{
		global $_W;
		global $_GPC;
		$no_left = true;

		if ($_W['ispost']) {
			$password = trim($_GPC['password']);
			$newpassword = trim($_GPC['newpassword']);
			$surenewpassword = trim($_GPC['surenewpassword']);
			(strlen($newpassword) < 6) && show_json(0, '密码至少是6位!');
			($newpassword != $surenewpassword) && show_json(0, '两次输入密码不一致!');
			$item = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_merch_account') . ' WHERE id=:id AND uniacid=:uniacid AND merchid=:merchid', array(':id' => $_W['uniaccount']['id'], ':uniacid' => $_W['uniacid'], ':merchid' => $_W['merchid']));
			($item['pwd'] != md5($password . $item['salt'])) && show_json(0, '原密码输入不正确!');
			$date = array('salt' => random(8));
			$newpassword = md5($newpassword . $date['salt']);
			$date['pwd'] = $newpassword;
			pdo_update('ewei_shop_merch_account', $date, array('id' => $_W['uniaccount']['id'], 'uniacid' => $_W['uniacid'], 'merchid' => $_W['merchid']));
			show_json(1);
		}


		include $this->template();
	}
}


?>