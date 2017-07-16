<?php
error_reporting(0);
require '../../../../../framework/bootstrap.inc.php';
require '../../../../../addons/ewei_shopv2/defines.php';
require '../../../../../addons/ewei_shopv2/core/inc/functions.php';
require '../../../../../addons/ewei_shopv2/core/inc/plugin_model.php';
global $_W;
global $_GPC;
ignore_user_abort();
set_time_limit(0);
$sets = pdo_fetchall('select uniacid from ' . tablename('ewei_shop_sysset'));
foreach ($sets as $set ) 
{
	$_W['uniacid'] = $set['uniacid'];
	if (empty($_W['uniacid'])) 
	{
		continue;
	}
	$trade = m('common')->getSysset('trade', $_W['uniacid']);
	$days = intval($trade['receive']);
	$p = p('commission');
	$pcoupon = com('coupon');
	$orders = pdo_fetchall('select id,couponid,openid,isparent,sendtime from ' . tablename('ewei_shop_order') . ' where uniacid=' . $_W['uniacid'] . ' and status=2 ', array(), 'id');
	if (!(empty($orders))) 
	{
		foreach ($orders as $orderid => $order ) 
		{
			$result = goodsReceive($order, $days);
			if (!($result)) 
			{
				continue;
			}
			pdo_query('update ' . tablename('ewei_shop_order') . ' set status=3,finishtime=' . time() . ' where id=' . $orderid);
			if ($order['isparent'] == 1) 
			{
				continue;
			}
			m('member')->upgradeLevel($order['openid']);
			m('order')->setGiveBalance($orderid, 1);
			m('notice')->sendOrderMessage($orderid);
			if ($pcoupon) 
			{
				com('coupon')->sendcouponsbytask($item['id']);
				if (!(empty($order['couponid']))) 
				{
					$pcoupon->backConsumeCoupon($order['id']);
				}
			}
			if ($p) 
			{
				$p->checkOrderFinish($orderid);
			}
		}
	}
}
function goodsReceive($order, $sysday = 0) 
{
	$days = array();
	$goods = pdo_fetchall('select og.goodsid, g.autoreceive from' . tablename('ewei_shop_order_goods') . ' og left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid where og.orderid=' . $order['id']);
	foreach ($goods as $i => $g ) 
	{
		$days[] = $g['autoreceive'];
	}
	$day = max($days);
	if ($day < 0) 
	{
		return false;
	}
	if ($day == 0) 
	{
		if ($sysday <= 0) 
		{
			return false;
		}
		$day = $sysday;
	}
	$daytimes = 86400 * $day;
	if (($order['sendtime'] + $daytimes) <= time()) 
	{
		return true;
	}
	return false;
}
?>