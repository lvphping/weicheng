<?php
if (!defined('IN_IA')) 
{
	exit('Access Denied');
}
class Tip_EweiShopV2Page extends MobileLoginPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		
		$members = pdo_fetchall( 'SELECT m.avatar,m.nickname,m.province FROM '  . tablename ( 'ewei_shop_member' ) . 'm where m.uniacid=:uniacid and m.openid!=:openid limit 0,100 ', array (
				':uniacid' => $_W ['uniacid'],
				":openid"=>$_W['openid']
		));
		$pos = rand(0,count($members)-1);
		$member = $members[$pos];
		$order = array();
		$order['avatar'] = $member['avatar'];
		$order['nickname'] = $member['nickname'];
		$order ['info1'] = $member ['province'];
		$order['info2'] =rand(1,60) ;
		
		
		show_json(0, $order);
	}
}
?>