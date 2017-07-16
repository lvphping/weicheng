<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Index_EweiShopV2Page extends WebPage
{
	public function main()
	{
		if (cv('statistics.sale.main')) {
			header('location: ' . webUrl('statistics/sale'));
			return NULL;
		}


		if (cv('statistics.sale_analysis.main')) {
			header('location: ' . webUrl('statistics/sale_analysis'));
			return NULL;
		}


		if (cv('statistics.order.main')) {
			header('location: ' . webUrl('statistics/order'));
			return NULL;
		}


		if (cv('statistics.sale_analysis.main')) {
			header('location: ' . webUrl('statistics/sale_analysis'));
			return NULL;
		}


		if (cv('statistics.goods.main')) {
			header('location: ' . webUrl('statistics/goods'));
			return NULL;
		}


		if (cv('statistics.goods_rank.main')) {
			header('location: ' . webUrl('statistics/goods_rank'));
			return NULL;
		}


		if (cv('statistics.goods_trans.main')) {
			header('location: ' . webUrl('statistics/goods_trans'));
			return NULL;
		}


		if (cv('statistics.member_cost.main')) {
			header('location: ' . webUrl('statistics/member_cost'));
			return NULL;
		}


		if (cv('statistics.member_increase.main')) {
			header('location: ' . webUrl('statistics/member_increase'));
			return NULL;
		}


		header('location: ' . webUrl());
	}
}


?>