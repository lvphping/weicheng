<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class ExchangeModel extends PluginModel 
{
	public function getSet() 
	{
		return parent::getSet();
	}
	public function sendMessage($coupon, $send_total, $member, $account = NULL) 
	{
		global $_W;
		$articles = array();
		$title = str_replace('[nickname]', $member['nickname'], $coupon['resptitle']);
		$desc = str_replace('[nickname]', $member['nickname'], $coupon['respdesc']);
		$title = str_replace('[total]', $send_total, $title);
		$desc = str_replace('[total]', $send_total, $desc);
		$url = ((empty($coupon['respurl']) ? mobileUrl('sale/coupon/my', NULL, true) : $coupon['respurl']));
		if (!(empty($coupon['resptitle']))) 
		{
			$articles[] = array('title' => urlencode($title), 'description' => urlencode($desc), 'url' => $url, 'picurl' => tomedia($coupon['respthumb']));
		}
		if (!(empty($articles))) 
		{
			$resp = m('message')->sendNews($member['openid'], $articles, $account);
			if (is_error($resp)) 
			{
				$msg = array( 'keyword1' => array('value' => $title, 'color' => '#73a68d'), 'keyword2' => array('value' => $desc, 'color' => '#73a68d') );
				$ret = m('message')->sendCustomNotice($member['openid'], $msg, $url, $account);
				if (is_error($ret)) 
				{
					return m('message')->sendCustomNotice($member['openid'], $msg, $url, $account);
				}
			}
		}
	}
}
?>