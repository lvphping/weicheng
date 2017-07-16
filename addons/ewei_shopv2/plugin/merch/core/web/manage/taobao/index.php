<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}


require EWEI_SHOPV2_PLUGIN . 'merch/core/inc/page_merch.php';
class Index_EweiShopV2Page extends MerchWebPage
{
	public function main()
	{
		global $_W;
		global $_GPC;

		if (mcv('taobao.main')) {
			$sql = 'SELECT * FROM ' . tablename('ewei_shop_category') . ' WHERE `uniacid` = :uniacid ORDER BY `parentid`, `displayorder` DESC';
			$category = pdo_fetchall($sql, array(':uniacid' => $_W['uniacid']), 'id');
			$parent = $children = array();

			if (!empty($category)) {
				foreach ($category as $cid => $cate ) {
					if (!empty($cate['parentid'])) {
						$children[$cate['parentid']][] = $cate;
					}
					 else {
						$parent[$cate['id']] = $cate;
					}
				}
			}


			$set = m('common')->getSysset(array('shop'));
			$shopset = $set['shop'];
			load()->func('tpl');
			include $this->template();
			return NULL;
		}


		if (mcv('taobao.jingdong')) {
			header('location: ' . webUrl('taobao/jingdong'));
			exit();
			return NULL;
		}


		if (mcv('taobao.one688')) {
			header('location: ' . webUrl('taobao/one688'));
			exit();
			return NULL;
		}


		if (mcv('taobao.taobaocsv')) {
			header('location: ' . webUrl('taobao/taobaocsv'));
			exit();
		}

	}

	public function fetch()
	{
		global $_W;
		global $_GPC;
		$merchid = $_W['merchid'];
		set_time_limit(0);
		$ret = array();
		$url = $_GPC['url'];
		$pcate = intval($_GPC['pcate']);
		$ccate = intval($_GPC['ccate']);
		$tcate = intval($_GPC['tcate']);

		if (is_numeric($url)) {
			$itemid = $url;
		}
		 else {
			preg_match('/id\\=(\\d+)/i', $url, $matches);

			if (isset($matches[1])) {
				$itemid = $matches[1];
			}

		}

		if (empty($itemid)) {
			exit(json_encode(array('result' => 0, 'error' => '未获取到 itemid!')));
		}


		$taobao_plugin = p('taobao');
		$ret = $taobao_plugin->get_item_taobao($itemid, $_GPC['url'], $pcate, $ccate, $tcate, $merchid);
		plog('taobao.main', '淘宝抓取宝贝 淘宝id:' . $itemid);
		exit(json_encode($ret));
	}
}


?>