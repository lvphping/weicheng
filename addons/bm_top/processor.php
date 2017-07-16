<?php
/**
 * 粉丝榜模块处理程序
 *
 * 美丽心情
 * QQ:513316788 
 */
defined('IN_IA') or exit('Access Denied');

class bm_topModuleProcessor extends WeModuleProcessor {
	public function respond() {
		global $_W;
		load()->func('compat.biz');
    	$rid = $this->rule;
    	$sql = "SELECT * FROM " . tablename('bm_top_reply') . " WHERE `rid`=:rid LIMIT 1";
    	$row = pdo_fetch($sql, array(':rid' => $rid));
    	if (empty($row['id'])) {
    		return $this->respText("系统升级中，请稍候！") ;
    	}
		$desc = $row['desc'];//描述
		$n = $row['n'];//粉丝基数
		$fromuser=$this->message['from'];
		$num = mc_fansinfo($fromuser);
		$numx=$n+$num['fanid'];
		$name = $_W['account']['name'];//公众号名称
		$str = str_replace('{name}', $name, $desc);
		$str = str_replace('{numx}', $numx, $str);
    	if ($row['pictype'] == 1) {
			//$str = "嗨,欢迎关注【".$name."】,您是第".$numx."位关注人!\n".$desc."\n <a href='".$url."'>".$urltext."</a>";
			return $this->respText($str);    		
    	} else {
			$response['FromUserName'] = $this->message['to'];
			$response['ToUserName'] = $this->message['from'];
			$response['MsgType'] = 'news';
			$response['ArticleCount'] = 1;
			$response['Articles'] = array();
			$response['Articles'][] = array(
				'Title' => $row['title'],
				'Description' => $str,
				'PicUrl' => !strexists($row['picurl'], 'http://') ? $_W['attachurl'] . $row['picurl'] : $row['picurl'],
				'Url' => $row['urlx'],
				'TagName' => 'item',
			);
			return $response;		
		}
	}
}
?>