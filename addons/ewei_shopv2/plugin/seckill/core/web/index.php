<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'seckill/core/seckill_page_web.php';
class Index_EweiShopV2Page extends SeckillWebPage 
{
	public function main() 
	{
		global $_W;
		if (cv('seckill.task')) 
		{
			header('location: ' . webUrl('seckill/task'));
			return;
		}
		if (cv('seckill.goods')) 
		{
			header('location: ' . webUrl('seckill/goods'));
			return;
		}
		if (cv('seckill.category')) 
		{
			header('location: ' . webUrl('seckill/category'));
			return;
		}
		if (cv('seckill.adv')) 
		{
			header('location: ' . webUrl('seckill/adv'));
			return;
		}
		if (cv('seckill.calendar')) 
		{
			header('location: ' . webUrl('seckill/calendar'));
			return;
		}
		if (cv('seckill.cover')) 
		{
			header('location: ' . webUrl('seckill/cover'));
			return;
		}
		header('location: ' . webUrl());
	}
}
?>