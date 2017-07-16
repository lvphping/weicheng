<?php
if (!defined('IN_IA')) 
{
	exit('Access Denied');
}
class Downloadbill_EweiShopV2Page extends WebPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			$starttime = strtotime($_GPC['time']['start']);
			$endtime = strtotime($_GPC['time']['end']);
			$result = m('finance')->downloadbill($starttime, $endtime, $_GPC['type']);
			if (is_error($result)) 
			{
				$this->message($result['message'], '', 'error');
			}
			plog('finance.downloadbill.main', '下载对账单');
		}
		if (empty($starttime) || empty($endtime)) 
		{
			$starttime = $endtime = time();
		}
		load()->func('tpl');
		include $this->template();
	}
}
?>