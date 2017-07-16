<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Qrcode_EweiShopV2Model 
{
	public function createShopQrcode($mid = 0, $posterid = 0) 
	{
		global $_W;
		global $_GPC;
		$path = IA_ROOT . '/addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/';
		if (!(is_dir($path))) 
		{
			load()->func('file');
			mkdirs($path);
		}
		$url = mobileUrl('', array('mid' => $mid), true);
		if (!(empty($posterid))) 
		{
			$url .= '&posterid=' . $posterid;
		}
		$file = 'shop_qrcode_' . $posterid . '_' . $mid . '.png';
		$qrcode_file = $path . $file;
		if (!(is_file($qrcode_file))) 
		{
			require_once IA_ROOT . '/framework/library/qrcode/phpqrcode.php';
			QRcode::png($url, $qrcode_file, QR_ECLEVEL_L, 4);
		}
		return $_W['siteroot'] . 'addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/' . $file;
	}
	public function createGoodsQrcode($mid = 0, $goodsid = 0, $posterid = 0) 
	{
		global $_W;
		global $_GPC;
		$path = IA_ROOT . '/addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'];
		if (!(is_dir($path))) 
		{
			load()->func('file');
			mkdirs($path);
		}
		$url = mobileUrl('goods/detail', array('id' => $goodsid, 'mid' => $mid), true);
		if (!(empty($posterid))) 
		{
			$url .= '&posterid=' . $posterid;
		}
		$file = 'goods_qrcode_' . $posterid . '_' . $mid . '_' . $goodsid . '.png';
		$qrcode_file = $path . '/' . $file;
		if (!(is_file($qrcode_file))) 
		{
			require_once IA_ROOT . '/framework/library/qrcode/phpqrcode.php';
			QRcode::png($url, $qrcode_file, QR_ECLEVEL_L, 4);
		}
		return $_W['siteroot'] . 'addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/' . $file;
	}
	public function createQrcode($url) 
	{
		global $_W;
		global $_GPC;
		$path = IA_ROOT . '/addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/';
		if (!(is_dir($path))) 
		{
			load()->func('file');
			mkdirs($path);
		}
		$file = md5(base64_encode($url)) . '.jpg';
		$qrcode_file = $path . $file;
		if (!(is_file($qrcode_file))) 
		{
			require_once IA_ROOT . '/framework/library/qrcode/phpqrcode.php';
			QRcode::png($url, $qrcode_file, QR_ECLEVEL_L, 4);
		}
		return $_W['siteroot'] . 'addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/' . $file;
	}
}
?>