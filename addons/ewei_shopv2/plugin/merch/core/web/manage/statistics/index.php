<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}


require EWEI_SHOPV2_PLUGIN . 'merch/core/inc/page_merch.php';
class Index_EweiShopV2Page extends MerchWebPage
{
	public function main()
	{
		if (mcv('statistics.sale.main')) {
			header('location: ' . merchUrl('statistics/sale'));
			return NULL;
		}


		if (mcv('statistics.sale_analysis.main')) {
			header('location: ' . merchUrl('statistics/sale_analysis'));
			return NULL;
		}


		if (mcv('statistics.order.main')) {
			header('location: ' . merchUrl('statistics/order'));
			return NULL;
		}


		if (mcv('statistics.sale_analysis.main')) {
			header('location: ' . merchUrl('statistics/sale_analysis'));
			return NULL;
		}


		if (mcv('statistics.goods.main')) {
			header('location: ' . merchUrl('statistics/goods'));
			return NULL;
		}


		if (mcv('statistics.goods_rank.main')) {
			header('location: ' . merchUrl('statistics/goods_rank'));
			return NULL;
		}


		if (mcv('statistics.goods_trans.main')) {
			header('location: ' . merchUrl('statistics/goods_trans'));
			return NULL;
		}


		if (mcv('statistics.member_cost.main')) {
			header('location: ' . merchUrl('statistics/member_cost'));
			return NULL;
		}


		if (mcv('statistics.member_increase.main')) {
			header('location: ' . merchUrl('statistics/member_increase'));
			return NULL;
		}


		header('location: ' . merchUrl());
	}
}


?>