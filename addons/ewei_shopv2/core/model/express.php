<?php
if (!defined('IN_IA')) 
{
	exit('Access Denied');
}
class Express_EweiShopV2Model 
{
	public function getExpressList() 
	{
		global $_W;
		$sql = 'select * from ' . tablename('ewei_shop_express') . ' where status=1 order by displayorder desc,id asc';
		$data = pdo_fetchall($sql);
		return $data;
	}
}
?>