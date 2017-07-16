<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Order_EweiShopV2Model 
{
	public function payResult($params) 
	{
		global $_W;
		$fee = intval($params['fee']);
		$data = array('status' => ($params['result'] == 'success' ? 1 : 0));
		$ordersn = $params['tid'];
		$order = pdo_fetch('select id,ordersn, price,openid,dispatchtype,addressid,carrier,status,isverify,deductcredit2,`virtual`,isvirtual,couponid,isvirtualsend,isparent,paytype,merchid,agentid,createtime,buyagainprice from ' . tablename('ewei_shop_order') . ' where  ordersn=:ordersn and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':ordersn' => $ordersn));
		$orderid = $order['id'];
		if ($params['from'] == 'return') 
		{
			$seckill_result = plugin_run('seckill::setOrderPay', $order['id']);
			if ($seckill_result == 'refund') 
			{
				return 'seckill_refund';
			}
			$address = false;
			if (empty($order['dispatchtype'])) 
			{
				$address = pdo_fetch('select realname,mobile,address from ' . tablename('ewei_shop_member_address') . ' where id=:id limit 1', array(':id' => $order['addressid']));
			}
			$carrier = false;
			if (($order['dispatchtype'] == 1) || ($order['isvirtual'] == 1)) 
			{
				$carrier = unserialize($order['carrier']);
			}
			if ($params['type'] == 'cash') 
			{
				if ($order['isparent'] == 1) 
				{
					$change_data = array();
					$change_data['merchshow'] = 1;
					pdo_update('ewei_shop_order', $change_data, array('id' => $orderid));
					$this->setChildOrderPayResult($order, 0, 0);
				}
				return true;
			}
			if ($order['status'] == 0) 
			{
				if (!(empty($order['virtual'])) && com('virtual')) 
				{
					return com('virtual')->pay($order);
				}
				if ($order['isvirtualsend']) 
				{
					return $this->payVirtualSend($order['id']);
				}
				$time = time();
				$change_data = array();
				$change_data['status'] = 1;
				$change_data['paytime'] = $time;
				if ($order['isparent'] == 1) 
				{
					$change_data['merchshow'] = 1;
				}
				pdo_update('ewei_shop_order', $change_data, array('id' => $orderid));
				if ($order['isparent'] == 1) 
				{
					$this->setChildOrderPayResult($order, $time, 1);
				}
				$this->setStocksAndCredits($orderid, 1);
				if (com('coupon')) 
				{
					com('coupon')->sendcouponsbytask($order['id']);
				}
				if (com('coupon') && !(empty($order['couponid']))) 
				{
					com('coupon')->backConsumeCoupon($order['id']);
				}
				m('notice')->sendOrderMessage($orderid);
				com_run('printer::sendOrderMessage', $orderid);
				if (p('commission')) 
				{
					p('commission')->checkOrderPay($order['id']);
				}
				if (p('lottery')) 
				{
					$res = p('lottery')->getLottery($_W['openid'], 1, array('money' => $order['price'], 'paytype' => 1));
					if ($res) 
					{
						p('lottery')->getLotteryList($_W['openid']);
					}
				}
			}
			return true;
		}
		return false;
	}
	public function setChildOrderPayResult($order, $time, $type) 
	{
		global $_W;
		$orderid = $order['id'];
		$list = $this->getChildOrder($orderid);
		if (!(empty($list))) 
		{
			$change_data = array();
			if ($type == 1) 
			{
				$change_data['status'] = 1;
				$change_data['paytime'] = $time;
			}
			$change_data['merchshow'] = 0;
			foreach ($list as $k => $v ) 
			{
				if ($v['status'] == 0) 
				{
					pdo_update('ewei_shop_order', $change_data, array('id' => $v['id']));
				}
			}
		}
	}
	public function setOrderPayType($orderid, $paytype) 
	{
		global $_W;
		pdo_update('ewei_shop_order', array('paytype' => $paytype), array('id' => $orderid));
		if (!(empty($orderid))) 
		{
			pdo_update('ewei_shop_order', array('paytype' => $paytype), array('parentid' => $orderid));
		}
	}
	public function getChildOrder($orderid) 
	{
		global $_W;
		$list = pdo_fetchall('select id,ordersn,status,finishtime,couponid  from ' . tablename('ewei_shop_order') . ' where  parentid=:parentid and uniacid=:uniacid', array(':parentid' => $orderid, ':uniacid' => $_W['uniacid']));
		return $list;
	}
	public function payVirtualSend($orderid = 0) 
	{
		global $_W;
		global $_GPC;
		$order = pdo_fetch('select id,ordersn, price,openid,dispatchtype,addressid,carrier,status,isverify,deductcredit2,`virtual`,isvirtual,couponid from ' . tablename('ewei_shop_order') . ' where  id=:id and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':id' => $orderid));
		$order_goods = pdo_fetch('select g.virtualsend,g.virtualsendcontent from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.orderid=:orderid and og.uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':orderid' => $orderid));
		$time = time();
		pdo_update('ewei_shop_order', array('virtualsend_info' => $order_goods['virtualsendcontent'], 'status' => '3', 'paytime' => $time, 'sendtime' => $time, 'finishtime' => $time), array('id' => $orderid));
		$this->setStocksAndCredits($orderid, 1);
		m('member')->upgradeLevel($order['openid']);
		m('order')->setGiveBalance($orderid, 1);
		if (com('coupon')) 
		{
			com('coupon')->sendcouponsbytask($order['id']);
		}
		if (com('coupon') && !(empty($order['couponid']))) 
		{
			com('coupon')->backConsumeCoupon($order['id']);
		}
		m('notice')->sendOrderMessage($orderid);
		if (p('commission')) 
		{
			p('commission')->checkOrderPay($order['id']);
			p('commission')->checkOrderFinish($order['id']);
		}
		return true;
	}
	public function getGoodsCredit($goods) 
	{
		global $_W;
		$credits = 0;
		foreach ($goods as $g ) 
		{
			$gcredit = trim($g['credit']);
			if (!(empty($gcredit))) 
			{
				if (strexists($gcredit, '%')) 
				{
					$credits += intval((floatval(str_replace('%', '', $gcredit)) / 100) * $g['realprice']);
				}
				else 
				{
					$credits += intval($g['credit']) * $g['total'];
				}
			}
		}
		return $credits;
	}
	public function setDeductCredit2($order) 
	{
		global $_W;
		if (0 < $order['deductcredit2']) 
		{
			m('member')->setCredit($order['openid'], 'credit2', $order['deductcredit2'], array('0', $_W['shopset']['shop']['name'] . '购物返还抵扣余额 余额: ' . $order['deductcredit2'] . ' 订单号: ' . $order['ordersn']));
		}
	}
	public function setGiveBalance($orderid = '', $type = 0) 
	{
		global $_W;
		$order = pdo_fetch('select id,ordersn,price,openid,dispatchtype,addressid,carrier,status from ' . tablename('ewei_shop_order') . ' where id=:id limit 1', array(':id' => $orderid));
		$goods = pdo_fetchall('select og.goodsid,og.total,g.totalcnf,og.realprice,g.money,og.optionid,g.total as goodstotal,og.optionid,g.sales,g.salesreal from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.orderid=:orderid and og.uniacid=:uniacid ', array(':uniacid' => $_W['uniacid'], ':orderid' => $orderid));
		$balance = 0;
		foreach ($goods as $g ) 
		{
			$gbalance = trim($g['money']);
			if (!(empty($gbalance))) 
			{
				if (strexists($gbalance, '%')) 
				{
					$balance += intval((floatval(str_replace('%', '', $gbalance)) / 100) * $g['realprice']);
				}
				else 
				{
					$balance += intval($g['money']) * $g['total'];
				}
			}
		}
		if (0 < $balance) 
		{
			$shopset = m('common')->getSysset('shop');
			if ($type == 1) 
			{
				if ($order['status'] == 3) 
				{
					m('member')->setCredit($order['openid'], 'credit2', $balance, array(0, $shopset['name'] . '购物赠送余额 订单号: ' . $order['ordersn']));
					return;
				}
			}
			else if ($type == 2) 
			{
				if (1 <= $order['status']) 
				{
					m('member')->setCredit($order['openid'], 'credit2', -$balance, array(0, $shopset['name'] . '购物取消订单扣除赠送余额 订单号: ' . $order['ordersn']));
				}
			}
		}
	}
	public function setStocksAndCredits($orderid = '', $type = 0) 
	{
		global $_W;
		$order = pdo_fetch('select id,ordersn,price,openid,dispatchtype,addressid,carrier,status,isparent,paytype from ' . tablename('ewei_shop_order') . ' where id=:id limit 1', array(':id' => $orderid));
		$param = array();
		$param[':uniacid'] = $_W['uniacid'];
		if ($order['isparent'] == 1) 
		{
			$condition = ' og.parentorderid=:parentorderid';
			$param[':parentorderid'] = $orderid;
		}
		else 
		{
			$condition = ' og.orderid=:orderid';
			$param[':orderid'] = $orderid;
		}
		$goods = pdo_fetchall('select og.goodsid,og.total,g.totalcnf,og.realprice,g.credit,og.optionid,g.total as goodstotal,og.optionid,g.sales,g.salesreal from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where ' . $condition . ' and og.uniacid=:uniacid ', $param);
		$credits = 0;
		foreach ($goods as $g ) 
		{
			$stocktype = 0;
			if ($type == 0) 
			{
				if ($g['totalcnf'] == 0) 
				{
					$stocktype = -1;
				}
			}
			else if ($type == 1) 
			{
				if ($g['totalcnf'] == 1) 
				{
					$stocktype = -1;
				}
			}
			else if ($type == 2) 
			{
				if (1 <= $order['status']) 
				{
					if ($g['totalcnf'] == 1) 
					{
						$stocktype = 1;
					}
				}
				else if ($g['totalcnf'] == 0) 
				{
					$stocktype = 1;
				}
			}
			if (!(empty($stocktype))) 
			{
				if (!(empty($g['optionid']))) 
				{
					$option = m('goods')->getOption($g['goodsid'], $g['optionid']);
					if (!(empty($option)) && ($option['stock'] != -1)) 
					{
						$stock = -1;
						if ($stocktype == 1) 
						{
							$stock = $option['stock'] + $g['total'];
						}
						else if ($stocktype == -1) 
						{
							$stock = $option['stock'] - $g['total'];
							($stock <= 0) && ($stock = 0);
						}
						if ($stock != -1) 
						{
							pdo_update('ewei_shop_goods_option', array('stock' => $stock), array('uniacid' => $_W['uniacid'], 'goodsid' => $g['goodsid'], 'id' => $g['optionid']));
						}
					}
				}
				if (!(empty($g['goodstotal'])) && ($g['goodstotal'] != -1)) 
				{
					$totalstock = -1;
					if ($stocktype == 1) 
					{
						$totalstock = $g['goodstotal'] + $g['total'];
					}
					else if ($stocktype == -1) 
					{
						$totalstock = $g['goodstotal'] - $g['total'];
						($totalstock <= 0) && ($totalstock = 0);
					}
					if ($totalstock != -1) 
					{
						pdo_update('ewei_shop_goods', array('total' => $totalstock), array('uniacid' => $_W['uniacid'], 'id' => $g['goodsid']));
					}
				}
			}
			$gcredit = trim($g['credit']);
			if (!(empty($gcredit))) 
			{
				if (strexists($gcredit, '%')) 
				{
					$credits += intval((floatval(str_replace('%', '', $gcredit)) / 100) * $g['realprice']);
				}
				else 
				{
					$credits += intval($g['credit']) * $g['total'];
				}
			}
			if ($type == 0) 
			{
				if ($g['totalcnf'] != 1) 
				{
					pdo_update('ewei_shop_goods', array('sales' => $g['sales'] + $g['total']), array('uniacid' => $_W['uniacid'], 'id' => $g['goodsid']));
				}
			}
			else if ($type == 1) 
			{
				if (1 <= $order['status']) 
				{
					if ($g['totalcnf'] != 1) 
					{
						pdo_update('ewei_shop_goods', array('sales' => $g['sales'] - $g['total']), array('uniacid' => $_W['uniacid'], 'id' => $g['goodsid']));
					}
					$salesreal = pdo_fetchcolumn('select ifnull(sum(total),0) from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_order') . ' o on o.id = og.orderid ' . ' where og.goodsid=:goodsid and o.status>=1 and o.uniacid=:uniacid limit 1', array(':goodsid' => $g['goodsid'], ':uniacid' => $_W['uniacid']));
					pdo_update('ewei_shop_goods', array('salesreal' => $salesreal), array('id' => $g['goodsid']));
				}
			}
		}
		if (0 < $credits) 
		{
			$shopset = m('common')->getSysset('shop');
			if ($type == 1) 
			{
				m('member')->setCredit($order['openid'], 'credit1', $credits, array(0, $shopset['name'] . '购物积分 订单号: ' . $order['ordersn']));
			}
			else if ($type == 2) 
			{
				if (1 <= $order['status']) 
				{
					m('member')->setCredit($order['openid'], 'credit1', -$credits, array(0, $shopset['name'] . '购物取消订单扣除积分 订单号: ' . $order['ordersn']));
				}
			}
		}
		if ($type == 1) 
		{
			com_run('sale::getCredit1', $order['openid'], $order['price'], $order['paytype'], 1);
			return;
		}
		if ($type == 2) 
		{
			if (1 <= $order['status']) 
			{
				com_run('sale::getCredit1', $order['openid'], $order['price'], $order['paytype'], 1, 1);
			}
		}
	}
	public function getTotals($merch = 0) 
	{
		global $_W;
		$paras = array(':uniacid' => $_W['uniacid']);
		$merch = intval($merch);
		$condition = ' and isparent=0';
		if ($merch < 0) 
		{
			$condition .= ' and merchid=0';
		}
		$totals['all'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0 and deleted=0', $paras);
		$totals['status_1'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0 and status=-1 and refundtime=0 and deleted=0', $paras);
		$totals['status0'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0  and status=0 and paytype<>3 and deleted=0', $paras);
		$totals['status1'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0  and ( status=1 or ( status=0 and paytype=3) ) and deleted=0', $paras);
		$totals['status2'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0  and status=2 or (status = 1 and sendtype > 0) and deleted=0', $paras);
		$totals['status3'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0  and status=3 and deleted=0', $paras);
		$totals['status4'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0  and refundstate>0 and refundid<>0 and deleted=0', $paras);
		$totals['status5'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_order') . '' . ' WHERE uniacid = :uniacid ' . $condition . ' and ismr=0 and refundtime<>0 and deleted=0', $paras);
		return $totals;
	}
	public function getFormartDiscountPrice($isd, $gprice, $gtotal = 1) 
	{
		$price = $gprice;
		if (!(empty($isd))) 
		{
			if (strexists($isd, '%')) 
			{
				$dd = floatval(str_replace('%', '', $isd));
				if ((0 < $dd) && ($dd < 100)) 
				{
					$price = round(($dd / 100) * $gprice, 2);
				}
			}
			else if (0 < floatval($isd)) 
			{
				$price = round(floatval($isd * $gtotal), 2);
			}
		}
		return $price;
	}
	public function getGoodsDiscounts($goods, $isdiscount_discounts, $levelid, $options = array()) 
	{
		$key = ((empty($levelid) ? 'default' : 'level' . $levelid));
		$prices = array();
		if (empty($goods['merchsale'])) 
		{
			if (!(empty($isdiscount_discounts[$key]))) 
			{
				foreach ($isdiscount_discounts[$key] as $k => $v ) 
				{
					$k = substr($k, 6);
					$op_marketprice = m('goods')->getOptionPirce($goods['id'], $k);
					$gprice = $this->getFormartDiscountPrice($v, $op_marketprice);
					$prices[] = $gprice;
					if (!(empty($options))) 
					{
						foreach ($options as $key => $value ) 
						{
							if ($value['id'] == $k) 
							{
								$options[$key]['marketprice'] = $gprice;
							}
						}
					}
				}
			}
		}
		else if (!(empty($isdiscount_discounts['merch']))) 
		{
			foreach ($isdiscount_discounts['merch'] as $k => $v ) 
			{
				$k = substr($k, 6);
				$op_marketprice = m('goods')->getOptionPirce($goods['id'], $k);
				$gprice = $this->getFormartDiscountPrice($v, $op_marketprice);
				$prices[] = $gprice;
				if (!(empty($options))) 
				{
					foreach ($options as $key => $value ) 
					{
						if ($value['id'] == $k) 
						{
							$options[$key]['marketprice'] = $gprice;
						}
					}
				}
			}
		}
		$data = array();
		$data['prices'] = $prices;
		$data['options'] = $options;
		return $data;
	}
	public function getGoodsDiscountPrice($g, $level, $type = 0) 
	{
		if ($type == 0) 
		{
			$total = $g['total'];
		}
		else 
		{
			$total = 1;
		}
		$gprice = $g['marketprice'] * $total;
		if (empty($g['buyagain_islong'])) 
		{
			$gprice = $g['marketprice'] * $total;
		}
		$buyagain_sale = true;
		$buyagainprice = 0;
		$canbuyagain = false;
		if (empty($g['is_task_goods'])) 
		{
			if (0 < floatval($g['buyagain'])) 
			{
				if (m('goods')->canBuyAgain($g)) 
				{
					$canbuyagain = true;
					if (empty($g['buyagain_sale'])) 
					{
						$buyagain_sale = false;
					}
				}
			}
		}
		$price = $gprice;
		$price1 = $gprice;
		$price2 = $gprice;
		$taskdiscountprice = 0;
		if (!(empty($g['is_task_goods']))) 
		{
			$buyagain_sale = false;
			$price = $g['task_goods']['marketprice'] * $total;
			if ($price < $gprice) 
			{
				$taskdiscountprice = abs($gprice - $price);
			}
		}
		$discountprice = 0;
		$isdiscountprice = 0;
		$isd = false;
		@$isdiscount_discounts = json_decode($g['isdiscount_discounts'], true);
		$discounttype = 0;
		$isCdiscount = 0;
		$isHdiscount = 0;
		if ($g['isdiscount'] && (time() <= $g['isdiscount_time']) && $buyagain_sale) 
		{
			if (is_array($isdiscount_discounts)) 
			{
				$key = ((!(empty($level['id'])) ? 'level' . $level['id'] : 'default'));
				if (!(isset($isdiscount_discounts['type'])) || empty($isdiscount_discounts['type'])) 
				{
					if (empty($g['merchsale'])) 
					{
						$isd = trim($isdiscount_discounts[$key]['option0']);
						if (!(empty($isd))) 
						{
							$price1 = $this->getFormartDiscountPrice($isd, $gprice, $total);
						}
					}
					else 
					{
						$isd = trim($isdiscount_discounts['merch']['option0']);
						if (!(empty($isd))) 
						{
							$price1 = $this->getFormartDiscountPrice($isd, $gprice, $total);
						}
					}
				}
				else if (empty($g['merchsale'])) 
				{
					$isd = trim($isdiscount_discounts[$key]['option' . $g['optionid']]);
					if (!(empty($isd))) 
					{
						$price1 = $this->getFormartDiscountPrice($isd, $gprice, $total);
					}
				}
				else 
				{
					$isd = trim($isdiscount_discounts['merch']['option' . $g['optionid']]);
					if (!(empty($isd))) 
					{
						$price1 = $this->getFormartDiscountPrice($isd, $gprice, $total);
					}
				}
			}
			if ($gprice < $price1) 
			{
				$isdiscountprice = 0;
			}
			else 
			{
				$isdiscountprice = abs($price1 - $gprice);
			}
			$isCdiscount = 1;
		}
		if (empty($g['isnodiscount']) && $buyagain_sale) 
		{
			$discounts = json_decode($g['discounts'], true);
			if (is_array($discounts)) 
			{
				$key = ((!(empty($level['id'])) ? 'level' . $level['id'] : 'default'));
				if (!(isset($discounts['type'])) || empty($discounts['type'])) 
				{
					if (!(empty($discounts[$key]))) 
					{
						$dd = floatval($discounts[$key]);
						if ((0 < $dd) && ($dd < 10)) 
						{
							$price2 = round(($dd / 10) * $gprice, 2);
						}
					}
					else 
					{
						$dd = floatval($discounts[$key . '_pay'] * $total);
						$md = floatval($level['discount']);
						if (!(empty($dd))) 
						{
							$price2 = round($dd, 2);
						}
						else if (0 < $md)
						{
							$price2 = round(($md / 10) * $gprice, 2);
						}
					}
				}
				else 
				{
					$isd = trim($discounts[$key]['option' . $g['optionid']]);
					if (!(empty($isd))) 
					{
						$price2 = $this->getFormartDiscountPrice($isd, $gprice, $total);
					}
				}
			}
			$discountprice = abs($price2 - $gprice);
			$isHdiscount = 1;
		}
		if ($isCdiscount == 1) 
		{
			$price = $price1;
			$discounttype = 1;
		}
		else if ($isHdiscount == 1) 
		{
			$price = $price2;
			$discounttype = 2;
		}
		$unitprice = round($price / $total, 2);
		$isdiscountunitprice = round($isdiscountprice / $total, 2);
		$discountunitprice = round($discountprice / $total, 2);
		if ($canbuyagain) 
		{
			if (empty($g['buyagain_islong'])) 
			{
				$buyagainprice = ($unitprice * (10 - $g['buyagain'])) / 10;
			}
			else 
			{
				$buyagainprice = ($price * (10 - $g['buyagain'])) / 10;
			}
		}
		$price = $price - $buyagainprice;
		return array('unitprice' => $unitprice, 'price' => $price, 'taskdiscountprice' => $taskdiscountprice, 'discounttype' => $discounttype, 'isdiscountprice' => $isdiscountprice, 'discountprice' => $discountprice, 'isdiscountunitprice' => $isdiscountunitprice, 'discountunitprice' => $discountunitprice, 'price0' => $gprice, 'price1' => $price1, 'price2' => $price2, 'buyagainprice' => $buyagainprice);
	}
	public function getChildOrderPrice($order, $goods, $dispatch_array, $merch_array, $sale_plugin, $discountprice_array) 
	{
		global $_GPC;
		$totalprice = $order['price'];
		$goodsprice = $order['goodsprice'];
		$grprice = $order['grprice'];
		$deductprice = $order['deductprice'];
		$deductcredit = $order['deductcredit'];
		$deductcredit2 = $order['deductcredit2'];
		$deductenough = $order['deductenough'];
		$is_deduct = 0;
		$is_deduct2 = 0;
		$deduct_total = 0;
		$deduct2_total = 0;
		$ch_order = array();
		if ($sale_plugin) 
		{
			if (!(empty($_GPC['deduct']))) 
			{
				$is_deduct = 1;
			}
			if (!(empty($_GPC['deduct2']))) 
			{
				$is_deduct2 = 1;
			}
		}
		foreach ($goods as &$g ) 
		{
			$merchid = $g['merchid'];
			$ch_order[$merchid]['goods'][] = $g['goodsid'];
			$ch_order[$merchid]['grprice'] += $g['ggprice'];
			$ch_order[$merchid]['goodsprice'] += $g['marketprice'] * $g['total'];
			$ch_order[$merchid]['couponprice'] = $discountprice_array[$merchid]['deduct'];
			if ($is_deduct == 1) 
			{
				if ($g['manydeduct']) 
				{
					$deduct = $g['deduct'] * $g['total'];
				}
				else 
				{
					$deduct = $g['deduct'];
				}
				if ($g['seckillinfo'] && ($g['seckillinfo']['status'] == 0)) 
				{
				}
				else 
				{
					$deduct_total += $deduct;
					$ch_order[$merchid]['deducttotal'] += $deduct;
				}
			}
			if ($is_deduct2 == 1) 
			{
				if ($g['deduct2'] == 0) 
				{
					$deduct2 = $g['ggprice'];
				}
				else if (0 < $g['deduct2']) 
				{
					if ($g['ggprice'] < $g['deduct2']) 
					{
						$deduct2 = $g['ggprice'];
					}
					else 
					{
						$deduct2 = $g['deduct2'];
					}
				}
				if ($g['seckillinfo'] && ($g['seckillinfo']['status'] == 0)) 
				{
				}
				else 
				{
					$ch_order[$merchid]['deduct2total'] += $deduct2;
					$deduct2_total += $deduct2;
				}
			}
		}
		unset($g);
		foreach ($ch_order as $k => $v ) 
		{
			if ($is_deduct == 1) 
			{
				if (0 < $deduct_total) 
				{
					$n = $v['deducttotal'] / $deduct_total;
					$deduct_credit = ceil(round($deductcredit * $n, 2));
					$deduct_money = round($deductprice * $n, 2);
					$ch_order[$k]['deductcredit'] = $deduct_credit;
					$ch_order[$k]['deductprice'] = $deduct_money;
				}
			}
			if ($is_deduct2 == 1) 
			{
				if (0 < $deduct2_total) 
				{
					$n = $v['deduct2total'] / $deduct2_total;
					$deduct_credit2 = round($deductcredit2 * $n, 2);
					$ch_order[$k]['deductcredit2'] = $deduct_credit2;
				}
			}
			$op = round($v['grprice'] / $grprice, 2);
			$ch_order[$k]['op'] = $op;
			if (0 < $deductenough) 
			{
				$deduct_enough = round($deductenough * $op, 2);
				$ch_order[$k]['deductenough'] = $deduct_enough;
			}
		}
		foreach ($ch_order as $k => $v ) 
		{
			$merchid = $k;
			$price = ($v['grprice'] - $v['deductprice'] - $v['deductcredit2'] - $v['deductenough'] - $v['couponprice']) + $dispatch_array['dispatch_merch'][$merchid];
			if (0 < $merchid) 
			{
				$merchdeductenough = $merch_array[$merchid]['enoughdeduct'];
				if (0 < $merchdeductenough) 
				{
					$price -= $merchdeductenough;
					$ch_order[$merchid]['merchdeductenough'] = $merchdeductenough;
				}
			}
			$ch_order[$merchid]['price'] = $price;
		}
		return $ch_order;
	}
	public function getMerchEnough($merch_array) 
	{
		$merch_enough_total = 0;
		$merch_saleset = array();
		foreach ($merch_array as $key => $value ) 
		{
			$merchid = $key;
			if (0 < $merchid) 
			{
				$enoughs = $value['enoughs'];
				if (!(empty($enoughs))) 
				{
					$ggprice = $value['ggprice'];
					foreach ($enoughs as $e ) 
					{
						if ((floatval($e['enough']) <= $ggprice) && (0 < floatval($e['money']))) 
						{
							$merch_array[$merchid]['showenough'] = 1;
							$merch_array[$merchid]['enoughmoney'] = $e['enough'];
							$merch_array[$merchid]['enoughdeduct'] = $e['money'];
							$merch_saleset['merch_showenough'] = 1;
							$merch_saleset['merch_enoughmoney'] += $e['enough'];
							$merch_saleset['merch_enoughdeduct'] += $e['money'];
							$merch_enough_total += floatval($e['money']);
							break;
						}
					}
				}
			}
		}
		$data = array();
		$data['merch_array'] = $merch_array;
		$data['merch_enough_total'] = $merch_enough_total;
		$data['merch_saleset'] = $merch_saleset;
		return $data;
	}
	public function getOrderDispatchPrice($goods, $member, $address, $saleset = false, $merch_array, $t, $loop = 0) 
	{
		global $_W;
		$realprice = 0;
		$dispatch_price = 0;
		$dispatch_array = array();
		$dispatch_merch = array();
		$total_array = array();
		$totalprice_array = array();
		$nodispatch_array = array();
		$seckill_payprice = 0;
		$seckill_dispatchprice = 0;
		$user_city = '';
		if (!(empty($address))) 
		{
			$user_city = $address['city'];
		}
		else if (!(empty($member['city']))) 
		{
			$user_city = $member['city'];
		}
		foreach ($goods as $g ) 
		{
			$realprice += $g['ggprice'];
			$dispatch_merch[$g['merchid']] = 0;
			$total_array[$g['goodsid']] += $g['total'];
			$totalprice_array[$g['goodsid']] += $g['ggprice'];
		}
		foreach ($goods as $g ) 
		{
			$seckillinfo = plugin_run('seckill::getSeckill', $g['goodsid'], $g['optionid'], true, $_W['openid']);
			if ($seckillinfo && ($seckillinfo['status'] == 0)) 
			{
				$seckill_payprice += $g['ggprice'];
			}
			$isnodispatch = 0;
			$sendfree = false;
			$merchid = $g['merchid'];
			if (!(empty($g['issendfree']))) 
			{
				$sendfree = true;
			}
			else 
			{
				if ($seckillinfo && ($seckillinfo['status'] == 0)) 
				{
				}
				else if (($g['ednum'] <= $total_array[$g['goodsid']]) && (0 < $g['ednum'])) 
				{
					$gareas = explode(';', $g['edareas']);
					if (empty($gareas)) 
					{
						$sendfree = true;
					}
					else if (!(empty($address))) 
					{
						if (!(in_array($address['city'], $gareas))) 
						{
							$sendfree = true;
						}
					}
					else if (!(empty($member['city']))) 
					{
						if (!(in_array($member['city'], $gareas))) 
						{
							$sendfree = true;
						}
					}
					else 
					{
						$sendfree = true;
					}
				}
				if ($seckillinfo && ($seckillinfo['status'] == 0)) 
				{
				}
				else if ((floatval($g['edmoney']) <= $totalprice_array[$g['goodsid']]) && (0 < floatval($g['edmoney']))) 
				{
					$gareas = explode(';', $g['edareas']);
					if (empty($gareas)) 
					{
						$sendfree = true;
					}
					else if (!(empty($address))) 
					{
						if (!(in_array($address['city'], $gareas))) 
						{
							$sendfree = true;
						}
					}
					else if (!(empty($member['city']))) 
					{
						if (!(in_array($member['city'], $gareas))) 
						{
							$sendfree = true;
						}
					}
					else 
					{
						$sendfree = true;
					}
				}
			}
			if ($g['dispatchtype'] == 1) 
			{
				if (!(empty($user_city))) 
				{
					$citys = m('dispatch')->getAllNoDispatchAreas();
					if (!(empty($citys))) 
					{
						if (in_array($user_city, $citys) && !(empty($citys))) 
						{
							$isnodispatch = 1;
							$has_goodsid = 0;
							if (!(empty($nodispatch_array['goodid']))) 
							{
								if (in_array($g['goodsid'], $nodispatch_array['goodid'])) 
								{
									$has_goodsid = 1;
								}
							}
							if ($has_goodsid == 0) 
							{
								$nodispatch_array['goodid'][] = $g['goodsid'];
								$nodispatch_array['title'][] = $g['title'];
								$nodispatch_array['city'] = $user_city;
							}
						}
					}
				}
				if ((0 < $g['dispatchprice']) && !($sendfree) && ($isnodispatch == 0)) 
				{
					$dispatch_merch[$merchid] += $g['dispatchprice'];
					if ($seckillinfo && ($seckillinfo['status'] == 0)) 
					{
						$seckill_dispatchprice += $g['dispatchprice'];
					}
					else 
					{
						$dispatch_price += $g['dispatchprice'];
					}
				}
			}
			else if ($g['dispatchtype'] == 0) 
			{
				if (empty($g['dispatchid'])) 
				{
					$dispatch_data = m('dispatch')->getDefaultDispatch($merchid);
				}
				else 
				{
					$dispatch_data = m('dispatch')->getOneDispatch($g['dispatchid']);
				}
				if (empty($dispatch_data)) 
				{
					$dispatch_data = m('dispatch')->getNewDispatch($merchid);
				}
				if (!(empty($dispatch_data))) 
				{
					$dkey = $dispatch_data['id'];
					if (!(empty($user_city))) 
					{
						$citys = m('dispatch')->getAllNoDispatchAreas($dispatch_data['nodispatchareas']);
						if (!(empty($citys))) 
						{
							if (in_array($user_city, $citys) && !(empty($citys))) 
							{
								$isnodispatch = 1;
								$has_goodsid = 0;
								if (!(empty($nodispatch_array['goodid']))) 
								{
									if (in_array($g['goodsid'], $nodispatch_array['goodid'])) 
									{
										$has_goodsid = 1;
									}
								}
								if ($has_goodsid == 0) 
								{
									$nodispatch_array['goodid'][] = $g['goodsid'];
									$nodispatch_array['title'][] = $g['title'];
									$nodispatch_array['city'] = $user_city;
								}
							}
						}
					}
					if (!$sendfree  && !$sendfree && ($isnodispatch == 0)) 
					{
						$areas = unserialize($dispatch_data['areas']);
						if ($dispatch_data['calculatetype'] == 1) 
						{
							$param = $g['total'];
						}
						else 
						{
							$param = $g['weight'] * $g['total'];
						}
						if (array_key_exists($dkey, $dispatch_array)) 
						{
							$dispatch_array[$dkey]['param'] += $param;
						}
						else 
						{
							$dispatch_array[$dkey]['data'] = $dispatch_data;
							$dispatch_array[$dkey]['param'] = $param;
						}
						if ($seckillinfo && ($seckillinfo['status'] == 0)) 
						{
							if (array_key_exists($dkey, $dispatch_array)) 
							{
								$dispatch_array[$dkey]['seckillnums'] += $param;
							}
							else 
							{
								$dispatch_array[$dkey]['seckillnums'] = $param;
							}
						}
					}
				}
			}
		}
		if (!(empty($dispatch_array))) 
		{
			foreach ($dispatch_array as $k => $v ) 
			{
				$dispatch_data = $dispatch_array[$k]['data'];
				$param = $dispatch_array[$k]['param'];
				$areas = unserialize($dispatch_data['areas']);
				if (!(empty($address))) 
				{
					$dprice = m('dispatch')->getCityDispatchPrice($areas, $address['city'], $param, $dispatch_data);
				}
				else if (!(empty($member['city']))) 
				{
					$dprice = m('dispatch')->getCityDispatchPrice($areas, $member['city'], $param, $dispatch_data);
				}
				else 
				{
					$dprice = m('dispatch')->getDispatchPrice($param, $dispatch_data);
				}
				$merchid = $dispatch_data['merchid'];
				$dispatch_merch[$merchid] += $dprice;
				if (0 < $v['seckillnums']) 
				{
					$seckill_dispatchprice += $dprice;
				}
				else 
				{
					$dispatch_price += $dprice;
				}
			}
		}
		if (!(empty($merch_array))) 
		{
			foreach ($merch_array as $key => $value ) 
			{
				$merchid = $key;
				if (0 < $merchid) 
				{
					$merchset = $value['set'];
					if (!(empty($merchset['enoughfree']))) 
					{
						if (floatval($merchset['enoughorder']) <= 0) 
						{
							$dispatch_price = $dispatch_price - $dispatch_merch[$merchid];
							$dispatch_merch[$merchid] = 0;
						}
						else if (floatval($merchset['enoughorder']) <= $merch_array[$merchid]['ggprice']) 
						{
							if (empty($merchset['enoughareas'])) 
							{
								$dispatch_price = $dispatch_price - $dispatch_merch[$merchid];
								$dispatch_merch[$merchid] = 0;
							}
							else 
							{
								$areas = explode(';', $merchset['enoughareas']);
								if (!(empty($address))) 
								{
									if (!(in_array($address['city'], $areas))) 
									{
										$dispatch_price = $dispatch_price - $dispatch_merch[$merchid];
										$dispatch_merch[$merchid] = 0;
									}
								}
								else if (!(empty($member['city']))) 
								{
									if (!(in_array($member['city'], $areas))) 
									{
										$dispatch_price = $dispatch_price - $dispatch_merch[$merchid];
										$dispatch_merch[$merchid] = 0;
									}
								}
								else if (empty($member['city'])) 
								{
									$dispatch_price = $dispatch_price - $dispatch_merch[$merchid];
									$dispatch_merch[$merchid] = 0;
								}
							}
						}
					}
				}
			}
		}
		if ($saleset) 
		{
			if (!(empty($saleset['enoughfree']))) 
			{
				$saleset_free = 0;
				if ($loop == 0) 
				{
					if (floatval($saleset['enoughorder']) <= 0) 
					{
						$saleset_free = 1;
					}
					else if (floatval($saleset['enoughorder']) <= $realprice - $seckill_payprice) 
					{
						if (empty($saleset['enoughareas'])) 
						{
							$saleset_free = 1;
						}
						else 
						{
							$areas = explode(';', $saleset['enoughareas']);
							if (!(empty($address))) 
							{
								if (!(in_array($address['city'], $areas))) 
								{
									$saleset_free = 1;
								}
							}
							else if (!(empty($member['city']))) 
							{
								if (!(in_array($member['city'], $areas))) 
								{
									$saleset_free = 1;
								}
							}
							else if (empty($member['city'])) 
							{
								$saleset_free = 1;
							}
						}
					}
				}
				if ($saleset_free == 1) 
				{
					$is_nofree = 0;
					if (!(empty($saleset['goodsids']))) 
					{
						foreach ($goods as $k => $v ) 
						{
							if (!(in_array($v['goodsid'], $saleset['goodsids']))) 
							{
								unset($goods[$k]);
							}
							else 
							{
								$is_nofree = 1;
							}
						}
					}
					if (($is_nofree == 1) && ($loop == 0)) 
					{
						$new_data = $this->getOrderDispatchPrice($goods, $member, $address, $saleset, $merch_array, $t, 1);
						$dispatch_price += $new_data['dispatch_price'];
					}
					else if ($saleset_free == 1) 
					{
						$dispatch_price = 0;
					}
				}
			}
		}
		if ($dispatch_price == 0) 
		{
			foreach ($dispatch_merch as &$dm ) 
			{
				$dm = 0;
			}
			unset($dm);
		}
		if (!(empty($nodispatch_array))) 
		{
			$nodispatch = '商品';
			foreach ($nodispatch_array['title'] as $k => $v ) 
			{
				$nodispatch .= $v . ',';
			}
			$nodispatch = trim($nodispatch, ',');
			$nodispatch .= '不支持配送到' . $nodispatch_array['city'];
			$nodispatch_array['nodispatch'] = $nodispatch;
			$nodispatch_array['isnodispatch'] = 1;
		}
		$data = array();
		$data['dispatch_price'] = $dispatch_price + $seckill_dispatchprice;
		$data['dispatch_merch'] = $dispatch_merch;
		$data['nodispatch_array'] = $nodispatch_array;
		$data['seckill_dispatch_price'] = $seckill_dispatchprice;
		return $data;
	}
	public function changeParentOrderPrice($parent_order) 
	{
		global $_W;
		$id = $parent_order['id'];
		$item = pdo_fetch('SELECT price,ordersn2,dispatchprice,changedispatchprice FROM ' . tablename('ewei_shop_order') . ' WHERE id = :id and uniacid=:uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (!(empty($item))) 
		{
			$orderupdate = array();
			$orderupdate['price'] = $item['price'] + $parent_order['price_change'];
			$orderupdate['ordersn2'] = $item['ordersn2'] + 1;
			$orderupdate['dispatchprice'] = $item['dispatchprice'] + $parent_order['dispatch_change'];
			$orderupdate['changedispatchprice'] = $item['changedispatchprice'] + $parent_order['dispatch_change'];
			if (!(empty($orderupdate))) 
			{
				pdo_update('ewei_shop_order', $orderupdate, array('id' => $id, 'uniacid' => $_W['uniacid']));
			}
		}
	}
	public function getOrderCommission($orderid, $agentid = 0) 
	{
		global $_W;
		if (empty($agentid)) 
		{
			$item = pdo_fetch('select agentid from ' . tablename('ewei_shop_order') . ' where id=:id and uniacid=:uniacid Limit 1', array('id' => $orderid, ':uniacid' => $_W['uniacid']));
			if (!(empty($item))) 
			{
				$agentid = $item['agentid'];
			}
		}
		$level = 0;
		$pc = p('commission');
		if ($pc) 
		{
			$pset = $pc->getSet();
			$level = intval($pset['level']);
		}
		$commission1 = 0;
		$commission2 = 0;
		$commission3 = 0;
		$m1 = false;
		$m2 = false;
		$m3 = false;
		if (!(empty($level))) 
		{
			if (!(empty($agentid))) 
			{
				$m1 = m('member')->getMember($agentid);
				if (!(empty($m1['agentid']))) 
				{
					$m2 = m('member')->getMember($m1['agentid']);
					if (!(empty($m2['agentid']))) 
					{
						$m3 = m('member')->getMember($m2['agentid']);
					}
				}
			}
		}
		$order_goods = pdo_fetchall('select g.id,g.title,g.thumb,g.goodssn,og.goodssn as option_goodssn, g.productsn,og.productsn as option_productsn, og.total,og.price,og.optionname as optiontitle, og.realprice,og.changeprice,og.oldprice,og.commission1,og.commission2,og.commission3,og.commissions,og.diyformdata,og.diyformfields from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.orderid=:orderid ', array(':uniacid' => $_W['uniacid'], ':orderid' => $orderid));
		foreach ($order_goods as &$og ) 
		{
			if (!(empty($level)) && !(empty($agentid))) 
			{
				$commissions = iunserializer($og['commissions']);
				if (!(empty($m1))) 
				{
					if (is_array($commissions)) 
					{
						$commission1 += ((isset($commissions['level1']) ? floatval($commissions['level1']) : 0));
					}
					else 
					{
						$c1 = iunserializer($og['commission1']);
						$l1 = $pc->getLevel($m1['openid']);
						$commission1 += ((isset($c1['level' . $l1['id']]) ? $c1['level' . $l1['id']] : $c1['default']));
					}
				}
				if (!(empty($m2))) 
				{
					if (is_array($commissions)) 
					{
						$commission2 += ((isset($commissions['level2']) ? floatval($commissions['level2']) : 0));
					}
					else 
					{
						$c2 = iunserializer($og['commission2']);
						$l2 = $pc->getLevel($m2['openid']);
						$commission2 += ((isset($c2['level' . $l2['id']]) ? $c2['level' . $l2['id']] : $c2['default']));
					}
				}
				if (!(empty($m3))) 
				{
					if (is_array($commissions)) 
					{
						$commission3 += ((isset($commissions['level3']) ? floatval($commissions['level3']) : 0));
					}
					else 
					{
						$c3 = iunserializer($og['commission3']);
						$l3 = $pc->getLevel($m3['openid']);
						$commission3 += ((isset($c3['level' . $l3['id']]) ? $c3['level' . $l3['id']] : $c3['default']));
					}
				}
			}
		}
		unset($og);
		$commission = $commission1 + $commission2 + $commission3;
		return $commission;
	}
	public function checkOrderGoods($orderid) 
	{
		global $_W;
		$flag = 0;
		$msg = '订单中的商品' . '<br/>';
		$uniacid = $_W['uniacid'];
		$sql = 'select g.id,g.title,g.status,g.deleted' . ' from ' . tablename('ewei_shop_goods') . ' g left join  ' . tablename('ewei_shop_order_goods') . ' og on g.id=og.goodsid and g.uniacid=og.uniacid' . ' where og.orderid=:orderid and og.uniacid=:uniacid';
		$list = pdo_fetchall($sql, array(':uniacid' => $uniacid, ':orderid' => $orderid));
		if (!(empty($list))) 
		{
			foreach ($list as $k => $v ) 
			{
				if (empty($v['status']) || !(empty($v['deleted']))) 
				{
					$flag = 1;
					$msg .= $v['title'] . '<br/>';
				}
			}
			if ($flag == 1) 
			{
				$msg .= '已下架,不能付款!';
			}
		}
		$data = array();
		$data['flag'] = $flag;
		$data['msg'] = $msg;
		return $data;
	}
}
?>