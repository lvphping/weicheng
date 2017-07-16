<?php
if (!defined('IN_IA')) 
{
	exit('Access Denied');
}
class Jingdong_EweiShopV2Page extends PluginWebPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$sql = 'SELECT * FROM ' . tablename('ewei_shop_category') . ' WHERE `uniacid` = :uniacid ORDER BY `parentid`, `displayorder` DESC';
		$category = pdo_fetchall($sql, array(':uniacid' => $_W['uniacid']), 'id');
		$parent = $children = array();
		if (!empty($category)) 
		{
			foreach ($category as $cid => $cate ) 
			{
				if (!empty($cate['parentid'])) 
				{
					$children[$cate['parentid']][] = $cate;
				}
				else 
				{
					$parent[$cate['id']] = $cate;
				}
			}
		}
		$shopset = $_W['shopset']['shop'];
		load()->func('tpl');
		include $this->template();
	}
	public function fetch() 
	{
		global $_GPC;
		set_time_limit(0);
		$ret = array();
		$url = $_GPC['url'];
		$pcate = intval($_GPC['pcate']);
		$ccate = intval($_GPC['ccate']);
		$tcate = intval($_GPC['tcate']);
		if (is_numeric($url)) 
		{
			$itemid = $url;
		}
		else 
		{
			preg_match('/(\\d+).html/i', $url, $matches);
			if (isset($matches[1])) 
			{
				$itemid = $matches[1];
			}
		}
		if (empty($itemid)) 
		{
			exit(json_encode(array('result' => 0, 'error' => '未获取到 itemid!')));
		}
		$ret = $this->model->get_item_jingdong($itemid, $_GPC['url'], $pcate, $ccate, $tcate);
		plog('jingdong.main', '京东抓取宝贝 京东id:' . $itemid);
		exit(json_encode($ret));
	}
}
?>