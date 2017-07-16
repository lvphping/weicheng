<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'merch/core/inc/page_merch.php';
class Index_EweiShopV2Page extends MerchWebPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$category = m('plugin')->getList(1);
		$has_plugins = array();
		if (p('exhelper')) 
		{
			$has_plugins[] = 'exhelper';
		}
		if (p('taobao')) 
		{
			$has_plugins[] = 'taobao';
		}
		if (p('diypage')) 
		{
			$has_plugins[] = 'diypage';
		}
		$plugins_list = array();
		$plugins_all = array();
		foreach ($category as $key => $value ) 
		{
			foreach ($value['plugins'] as $k => $v ) 
			{
				$plugins_all[$v['identity']] = $v;
				if (in_array($v['identity'], $has_plugins)) 
				{
					$plugins_list[] = $v;
				}
			}
		}
		$cashier = false;
		if (p('cashier')) 
		{
			$sql = 'SELECT * FROM ' . tablename('ewei_shop_cashier_user') . ' WHERE uniacid=:uniacid AND merchid=:merchid AND deleted=0 AND status=1';
			$res = pdo_fetch($sql, array(':uniacid' => $_W['uniacid'], ':merchid' => $_W['merchid']));
			if (!(empty($res)) && (time() < $res['lifetimeend'])) 
			{
				$cashier = $res;
				$auth_code = base64_encode(authcode($cashier['username'] . '|' . $cashier['password'] . '|' . $cashier['salt'], 'ENCODE', 'ewei_shopv2_cashier'));
				$url = $_W['siteroot'] . 'web/cashier.php?i=' . $_W['uniacid'] . '&r=login&auth_code=' . $auth_code;
			}
		}
		include $this->template();
	}
}
?>