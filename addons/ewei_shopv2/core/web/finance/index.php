<?php
if (!defined('IN_IA')) 
{
	exit('Access Denied');
}
class Index_EweiShopV2Page extends WebPage 
{
	public function main() 
	{
		if (cv('finance.recharge.view')) 
		{
			header('location: ' . webUrl('finance/log/recharge'));
			return NULL;
		}
		if (cv('finance.withdraw.view')) 
		{
			header('location: ' . webUrl('finance/log/withdraw'));
			return NULL;
		}
		if (cv('finance.downloadbill')) 
		{
			header('location: ' . webUrl('finance/downloadbill'));
			return NULL;
		}
		header('location: ' . webUrl());
	}
}
?>