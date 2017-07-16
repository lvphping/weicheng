<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class TaskModel extends PluginModel 
{
	public function getSceneTicket($expire, $scene_id) 
	{
		global $_W;
		global $_GPC;
		$account = m('common')->getAccount();
		$bb = '{"expire_seconds":' . $expire . ',"action_info":{"scene":{"scene_id":' . $scene_id . '}},"action_name":"QR_SCENE"}';
		$token = $account->fetch_token();
		$url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=' . $token;
		$ch1 = curl_init();
		curl_setopt($ch1, CURLOPT_URL, $url);
		curl_setopt($ch1, CURLOPT_POST, 1);
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch1, CURLOPT_POSTFIELDS, $bb);
		$c = curl_exec($ch1);
		$result = @json_decode($c, true);
		if (!(is_array($result))) 
		{
			return false;
		}
		if (!(empty($result['errcode']))) 
		{
			return error(-1, $result['errmsg']);
		}
		$ticket = $result['ticket'];
		return array('barcode' => json_decode($bb, true), 'ticket' => $ticket);
	}
	public function getSceneID() 
	{
		global $_W;
		$acid = $_W['acid'];
		$start = 1;
		$end = 2147483647;
		$scene_id = rand($start, $end);
		if (empty($scene_id)) 
		{
			$scene_id = rand($start, $end);
		}
		while (1) 
		{
			$count = pdo_fetchcolumn('select count(*) from ' . tablename('qrcode') . ' where qrcid=:qrcid and acid=:acid and model=0 limit 1', array(':qrcid' => $scene_id, ':acid' => $acid));
			if ($count <= 0) 
			{
				break;
			}
			$scene_id = rand($start, $end);
			if (empty($scene_id)) 
			{
				$scene_id = rand($start, $end);
			}
		}
		return $scene_id;
	}
	public function getQR($poster, $member) 
	{
		global $_W;
		global $_GPC;
		$acid = $_W['acid'];
		$time = time();
		$expire = $poster['days'];
		if (((86400 * 30) - 15) < $expire) 
		{
			$expire = (86400 * 30) - 15;
		}
		$posterendtime = $time + $expire;
		$qr = pdo_fetch('select * from ' . tablename('ewei_shop_task_poster_qr') . ' where openid=:openid and acid=:acid and posterid=:posterid limit 1', array(':openid' => $member['openid'], ':acid' => $acid, ':posterid' => $poster['id']));
		if (empty($qr)) 
		{
			$qr['current_qrimg'] = '';
			$scene_id = $this->getSceneID();
			$result = $this->getSceneTicket($expire, $scene_id);
			if (is_error($result)) 
			{
				return $result;
			}
			if (empty($result)) 
			{
				return error(-1, '生成二维码失败');
			}
			$barcode = $result['barcode'];
			$ticket = $result['ticket'];
			$qrimg = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' . $ticket;
			$ims_qrcode = array('uniacid' => $_W['uniacid'], 'acid' => $_W['acid'], 'qrcid' => $scene_id, 'model' => 0, 'name' => 'EWEI_SHOPV2_TASK_QRCODE', 'keyword' => 'EWEI_SHOPV2_TASK', 'expire' => $expire, 'createtime' => time(), 'status' => 1, 'url' => $result['url'], 'ticket' => $result['ticket']);
			pdo_insert('qrcode', $ims_qrcode);
			$qr = array('acid' => $acid, 'openid' => $member['openid'], 'sceneid' => $scene_id, 'type' => 1, 'ticket' => $result['ticket'], 'qrimg' => $qrimg, 'posterid' => $poster['id'], 'expire' => $expire, 'url' => $result['url'], 'endtime' => $posterendtime);
			pdo_insert('ewei_shop_task_poster_qr', $qr);
			$qr['id'] = pdo_insertid();
		}
		else 
		{
			$qr['current_qrimg'] = $qr['qrimg'];
			if ($qr['endtime'] < $time) 
			{
				$scene_id = $qr['sceneid'];
				$result = $this->getSceneTicket($expire, $scene_id);
				if (is_error($result)) 
				{
					return $result;
				}
				if (empty($result)) 
				{
					return error(-1, '生成二维码失败');
				}
				$barcode = $result['barcode'];
				$ticket = $result['ticket'];
				$qrimg = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' . $ticket;
				pdo_update('qrcode', array('ticket' => $result['ticket'], 'url' => $result['url']), array('acid' => $_W['acid'], 'qrcid' => $scene_id));
				pdo_update('ewei_shop_task_poster_qr', array('ticket' => $ticket, 'qrimg' => $qrimg, 'url' => $result['url'], 'endtime' => $posterendtime), array('id' => $qr['id']));
				$qr['ticket'] = $ticket;
				$qr['qrimg'] = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' . $qr['ticket'];
			}
		}
		return $qr;
	}
	public function getRealData($data) 
	{
		$data['left'] = intval(str_replace('px', '', $data['left'])) * 2;
		$data['top'] = intval(str_replace('px', '', $data['top'])) * 2;
		$data['width'] = intval(str_replace('px', '', $data['width'])) * 2;
		$data['height'] = intval(str_replace('px', '', $data['height'])) * 2;
		$data['size'] = intval(str_replace('px', '', $data['size'])) * 2;
		$data['src'] = tomedia($data['src']);
		return $data;
	}
	public function createImage($imgurl) 
	{
		load()->func('communication');
		$resp = ihttp_request($imgurl);
		if (($resp['code'] == 200) && !(empty($resp['content']))) 
		{
			return imagecreatefromstring($resp['content']);
		}
		$i = 0;
		while ($i < 3) 
		{
			$resp = ihttp_request($imgurl);
			if (($resp['code'] == 200) && !(empty($resp['content']))) 
			{
				return imagecreatefromstring($resp['content']);
			}
			++$i;
		}
		return '';
	}
	public function mergeImage($target, $data, $imgurl) 
	{
		$img = $this->createImage($imgurl);
		$w = imagesx($img);
		$h = imagesy($img);
		imagecopyresized($target, $img, $data['left'], $data['top'], 0, 0, $data['width'], $data['height'], $w, $h);
		imagedestroy($img);
		return $target;
	}
	public function mergeHead($target, $data, $imgurl) 
	{
		if ($data['head_type'] == 'default') 
		{
			$img = $this->createImage($imgurl);
			$w = imagesx($img);
			$h = imagesy($img);
			imagecopyresized($target, $img, $data['left'], $data['top'], 0, 0, $data['width'], $data['height'], $w, $h);
			imagedestroy($img);
			return $target;
		}
		if ($data['head_type'] == 'circle') 
		{
		}
		else if ($data['head_type'] == 'rounded') 
		{
		}
	}
	public function mergeText($target, $data, $text) 
	{
		$font = IA_ROOT . '/addons/ewei_shopv2/static/fonts/msyh.ttf';
		$colors = $this->hex2rgb($data['color']);
		$color = imagecolorallocate($target, $colors['red'], $colors['green'], $colors['blue']);
		imagettftext($target, $data['size'], 0, $data['left'], $data['top'] + $data['size'], $color, $font, $text);
		return $target;
	}
	public function hex2rgb($colour) 
	{
		if ($colour[0] == '#') 
		{
			$colour = substr($colour, 1);
		}
		if (strlen($colour) == 6) 
		{
			list($r, $g, $b) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
		}
		else if (strlen($colour) == 3) 
		{
			list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
		}
		else 
		{
			return false;
		}
		$r = hexdec($r);
		$g = hexdec($g);
		$b = hexdec($b);
		return array('red' => $r, 'green' => $g, 'blue' => $b);
	}
	public function createPoster($poster, $member, $qr, $upload = true) 
	{
		global $_W;
		$path = IA_ROOT . '/addons/ewei_shopv2/data/task/poster/' . $_W['uniacid'] . '/';
		if (!(is_dir($path))) 
		{
			load()->func('file');
			mkdirs($path);
		}
		$md5 = md5(json_encode(array('openid' => $member['openid'], 'id' => $qr['id'], 'bg' => $poster['bg'], 'data' => $poster['data'], 'version' => 1)));
		$file = $md5 . '.png';
		$is_new = false;
		if (!(is_file($path . $file)) || ($qr['qrimg'] != $qr['current_qrimg'])) 
		{
			$is_new = true;
			set_time_limit(0);
			@ini_set('memory_limit', '256M');
			$target = imagecreatetruecolor(640, 1008);
			$bg = $this->createImage(tomedia($poster['bg']));
			imagecopy($target, $bg, 0, 0, 0, 0, 640, 1008);
			imagedestroy($bg);
			$data = json_decode(str_replace('&quot;', '\'', $poster['data']), true);
			foreach ($data as $d ) 
			{
				$d = $this->getRealData($d);
				if ($d['type'] == 'head') 
				{
					$avatar = preg_replace('/\\/0$/i', '/96', $member['avatar']);
					$target = $this->mergeImage($target, $d, $avatar);
				}
				else if ($d['type'] == 'time') 
				{
					$time = date('Y-m-d H:i', $qr['endtime']);
					$target = $this->mergeText($target, $d, $d['title'] . ':' . $time);
				}
				else if ($d['type'] == 'img') 
				{
					$target = $this->mergeImage($target, $d, $d['src']);
				}
				else if ($d['type'] == 'qr') 
				{
					$target = $this->mergeImage($target, $d, tomedia($qr['qrimg']));
				}
				else if ($d['type'] == 'nickname') 
				{
					$target = $this->mergeText($target, $d, $member['nickname']);
				}
				else if (!(empty($goods))) 
				{
					if ($d['type'] == 'title') 
					{
						$target = $this->mergeText($target, $d, $goods['title']);
					}
					else if ($d['type'] == 'thumb') 
					{
						$thumb = ((!(empty($goods['commission_thumb'])) ? tomedia($goods['commission_thumb']) : tomedia($goods['thumb'])));
						$target = $this->mergeImage($target, $d, $thumb);
					}
					else if ($d['type'] == 'marketprice') 
					{
						$target = $this->mergeText($target, $d, $goods['marketprice']);
					}
					else if ($d['type'] == 'productprice') 
					{
						$target = $this->mergeText($target, $d, $goods['productprice']);
					}
				}
			}
			imagepng($target, $path . $file);
			imagedestroy($target);
		}
		$img = $_W['siteroot'] . 'addons/ewei_shopv2/data/task/poster/' . $_W['uniacid'] . '/' . $file;
		if (!($upload)) 
		{
			return $img;
		}
		if (($qr['qrimg'] != $qr['current_qrimg']) || empty($qr['mediaid']) || empty($qr['createtime']) || ((($qr['createtime'] + (3600 * 24 * 3)) - 7200) < time()) || $is_new) 
		{
			$mediaid = $this->uploadImage($path . $file);
			$qr['mediaid'] = $mediaid;
			$qr['img'] = $mediaid;
			pdo_update('ewei_shop_task_poster_qr', array('mediaid' => $mediaid, 'createtime' => time()), array('id' => $qr['id']));
		}
		return array('img' => $img, 'mediaid' => $qr['mediaid']);
	}
	public function uploadImage($img) 
	{
		load()->func('communication');
		$account = m('common')->getAccount();
		$access_token = $account->fetch_token();
		$url = 'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=' . $access_token . '&type=image';
		$ch1 = curl_init();
		$data = array('media' => '@' . $img);
		if (version_compare(PHP_VERSION, '5.5.0', '>')) 
		{
			$data = array('media' => curl_file_create($img));
		}
		curl_setopt($ch1, CURLOPT_URL, $url);
		curl_setopt($ch1, CURLOPT_POST, 1);
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch1, CURLOPT_POSTFIELDS, $data);
		$content = @json_decode(curl_exec($ch1), true);
		if (!(is_array($content))) 
		{
			$content = array('media_id' => '');
		}
		curl_close($ch1);
		return $content['media_id'];
	}
	public function getQRByTicket($ticket = '') 
	{
		global $_W;
		if (empty($ticket)) 
		{
			return false;
		}
		$qrs = pdo_fetchall('select * from ' . tablename('ewei_shop_task_poster_qr') . ' where ticket=:ticket and acid=:acid limit 1', array(':ticket' => $ticket, ':acid' => $_W['acid']));
		$count = count($qrs);
		if ($count <= 0) 
		{
			return false;
		}
		if ($count == 1) 
		{
			return $qrs[0];
		}
		return false;
	}
	public function checkMember($openid = '') 
	{
		global $_W;
		$acc = WeiXinAccount::create($_W['acid']);
		$userinfo = $acc->fansQueryInfo($openid);
		$userinfo['avatar'] = $userinfo['headimgurl'];
		load()->model('mc');
		$uid = mc_openid2uid($openid);
		if (!(empty($uid))) 
		{
			pdo_update('mc_members', array('nickname' => $userinfo['nickname'], 'gender' => $userinfo['sex'], 'nationality' => $userinfo['country'], 'resideprovince' => $userinfo['province'], 'residecity' => $userinfo['city'], 'avatar' => $userinfo['headimgurl']), array('uid' => $uid));
		}
		pdo_update('mc_mapping_fans', array('nickname' => $userinfo['nickname']), array('uniacid' => $_W['uniacid'], 'openid' => $openid));
		$model = m('member');
		$member = $model->getMember($openid);
		if (empty($member)) 
		{
			$mc = mc_fetch($uid, array('realname', 'nickname', 'mobile', 'avatar', 'resideprovince', 'residecity', 'residedist'));
			$member = array('uniacid' => $_W['uniacid'], 'uid' => $uid, 'openid' => $openid, 'realname' => $mc['realname'], 'mobile' => $mc['mobile'], 'nickname' => (!(empty($mc['nickname'])) ? $mc['nickname'] : $userinfo['nickname']), 'avatar' => (!(empty($mc['avatar'])) ? $mc['avatar'] : $userinfo['avatar']), 'gender' => (!(empty($mc['gender'])) ? $mc['gender'] : $userinfo['sex']), 'province' => (!(empty($mc['resideprovince'])) ? $mc['resideprovince'] : $userinfo['province']), 'city' => (!(empty($mc['residecity'])) ? $mc['residecity'] : $userinfo['city']), 'area' => $mc['residedist'], 'createtime' => time(), 'status' => 0);
			pdo_insert('ewei_shop_member', $member);
			$member['id'] = pdo_insertid();
			$member['isnew'] = true;
		}
		else 
		{
			$member['nickname'] = $userinfo['nickname'];
			$member['avatar'] = $userinfo['headimgurl'];
			$member['province'] = $userinfo['province'];
			$member['city'] = $userinfo['city'];
			pdo_update('ewei_shop_member', $member, array('id' => $member['id']));
			$member['isnew'] = false;
		}
		return $member;
	}
	public function perms() 
	{
		return array( 'task' => array('text' => $this->getName(), 'isplugin' => true, 'view' => '浏览', 'add' => '添加-log', 'edit' => '修改-log', 'delete' => '删除-log', 'log' => '扫描记录', 'clear' => '清除缓存-log', 'setdefault' => '设置默认海报-log') );
	}
	public function responseUnsubscribe($param = '') 
	{
		global $_W;
		if (isset($param['openid']) && !(empty($param['openid']))) 
		{
			$openid = $param['openid'];
			$where = array('uniacid' => $_W['uniacid'], 'joiner_id' => $openid);
			$task_info = pdo_fetch('SELECT join_user FROM ' . tablename('ewei_shop_task_join') . 'WHERE failtime>' . time() . ' and is_reward=0 and join_id in (SELECT join_id from ' . tablename('ewei_shop_task_joiner') . ' where uniacid=:uniacid and joiner_id=:joiner_id and join_status=1)', array(':uniacid' => $_W['uniacid'], ':joiner_id' => $openid));
			if ($task_info) 
			{
				$member = $this->checkMember($openid);
				pdo_update('ewei_shop_task_joiner', array('join_status' => 0), $where);
				$updatesql = 'UPDATE ' . tablename('ewei_shop_task_join') . ' SET completecount = completecount-1 WHERE failtime>' . time() . ' and is_reward=0 and join_id in (SELECT join_id from ' . tablename('ewei_shop_task_joiner') . ' where uniacid=:uniacid and joiner_id=:joiner_id and join_status=1)';
				pdo_query($updatesql, array(':uniacid' => $_W['uniacid'], ':joiner_id' => $openid));
				foreach ($task_info as $val ) 
				{
					m('message')->sendCustomNotice($val['join_user'], '您推荐的用户[' . $member['nickname'] . ']取消了关注，您失去了一个小伙伴');
				}
			}
		}
	}
	public function notice_complain($templete, $member, $poster, $scaner = '', $type = 1) 
	{
		$reward_type = 'sub';
		$openid = $scaner['openid'];
		if ($type == 2) 
		{
			$reward_type = 'rec';
			$openid = $member['openid'];
		}
		if ($templete) 
		{
			$templete = trim($templete);
			$templete = str_replace('[任务执行者昵称]', $member['nickname'], $templete);
			$templete = str_replace('[任务名称]', $poster['title'], $templete);
			if ($poster['poster_type'] == 1) 
			{
				$templete = str_replace('[任务目标]', $poster['needcount'], $templete);
			}
			else if ($poster['poster_type'] == 2) 
			{
				$reward_data = unserialize($poster['reward_data']);
				$reward_data = array_shift($reward_data['rec']);
				$templete = str_replace('[任务目标]', $reward_data['needcount'], $templete);
			}
			$templete = str_replace('[任务领取时间]', date('Y年m月d日 H:i', $poster['timestart']) . '-' . date('Y年m月d日 H:i', $poster['timeend']), $templete);
			if (!(empty($scaner))) 
			{
				$templete = str_replace('[海报扫描者昵称]', $scaner['nickname'], $templete);
			}
			if ($poster['reward_data']) 
			{
				$poster['reward_data'] = unserialize($poster['reward_data']);
				$templete = str_replace('[余额奖励]', $poster['reward_data'][$reward_type]['money']['num'], $templete);
				if (isset($poster['reward_data'][$reward_type]['coupon']['total'])) 
				{
					$templete = str_replace('[奖励优惠券]', $poster['reward_data'][$reward_type]['coupon']['total'], $templete);
				}
				else 
				{
					$templete = str_replace('[奖励优惠券]', '', $templete);
				}
				$templete = str_replace('[积分奖励]', $poster['reward_data'][$reward_type]['credit'], $templete);
				$reward_text = '';
				foreach ($poster['reward_data'][$reward_type] as $key => $val ) 
				{
					if ($key == 'credit') 
					{
						$reward_text .= '积分' . $val . ' |';
					}
					if ($key == 'goods') 
					{
						$reward_text .= '指定商品' . count($val) . '件';
					}
					if ($key == 'money') 
					{
						$reward_text .= '余额' . $val['num'] . '元 |';
					}
					if ($key == 'coupon') 
					{
						$reward_text .= '优惠券' . $val['total'] . '张 |';
					}
					if ($key == 'bribery') 
					{
						$reward_text .= '红包' . $val . '元 |';
					}
				}
				$templete = str_replace('[关注奖励列表]', $reward_text, $templete);
			}
			else 
			{
				$templete = str_replace('[余额奖励]', '0', $templete);
				$templete = str_replace('[奖励优惠券]', '0', $templete);
				$templete = str_replace('[积分奖励]', '0', $templete);
			}
			if (isset($poster['completecount'])) 
			{
				$notcomplete = intval($poster['needcount'] - $poster['completecount']);
				if ($notcomplete <= 0) 
				{
					$notcomplete = 0;
				}
				$templete = str_replace('[还需完成数量]', $notcomplete, $templete);
				$templete = str_replace('[完成数量]', intval($poster['completecount']), $templete);
			}
			if (isset($poster['okdays'])) 
			{
				$templete = str_replace('[海报有效期]', date('Y年m月d日 H:i', $poster['okdays']), $templete);
			}
			$db_data = pdo_fetchcolumn('select `data` from ' . tablename('ewei_shop_task_default') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
			$res = '';
			if (!(empty($db_data))) 
			{
				$res = unserialize($db_data);
			}
			$rankinfo = array();
			$rankinfoone = array(1 => $res['taskranktitle'] . '1', 2 => $res['taskranktitle'] . '2', 3 => $res['taskranktitle'] . '3', 4 => $res['taskranktitle'] . '4', 5 => $res['taskranktitle'] . '5');
			$rankinfotwo = array(1 => $res['taskranktitle'] . 'Ⅰ', 2 => $res['taskranktitle'] . 'Ⅱ', 3 => $res['taskranktitle'] . 'Ⅲ', 4 => $res['taskranktitle'] . 'Ⅳ', 5 => $res['taskranktitle'] . 'Ⅴ');
			$rankinfothree = array(1 => $res['taskranktitle'] . 'A', 2 => $res['taskranktitle'] . 'B', 3 => $res['taskranktitle'] . 'C', 4 => $res['taskranktitle'] . 'D', 5 => $res['taskranktitle'] . 'E');
			if ($res['taskranktype'] == 1) 
			{
				$rankinfo = $rankinfoone;
			}
			else if ($res['taskranktype'] == 2) 
			{
				$rankinfo = $rankinfotwo;
			}
			else if ($res['taskranktype'] == 3) 
			{
				$rankinfo = $rankinfothree;
			}
			else 
			{
				$rankinfo = $rankinfoone;
			}
			if (isset($poster['reward_rank']) && !(empty($poster['reward_rank']))) 
			{
				$templete = str_replace('[任务阶段]', $rankinfo[$poster['reward_rank']], $templete);
			}
			return trim($templete);
		}
		return '';
	}
	public function rec_notice_complain($poster) 
	{
		if ($poster['reward_data']) 
		{
			$poster['reward_data'] = unserialize($poster['reward_data']);
			$reward_text = '';
			foreach ($poster['reward_data'] as $key => $val ) 
			{
				if ($key == 'credit') 
				{
					$reward_text .= '积分:' . $val;
				}
				if ($key == 'goods') 
				{
					$reward_text .= '商品:' . count($val) . '个';
				}
				if ($key == 'money') 
				{
					$reward_text .= '奖金:' . $val['num'] . '元';
				}
				if ($key == 'coupon') 
				{
					$reward_text .= '优惠券:' . $val['total'] . '张';
				}
				if ($key == 'bribery') 
				{
					$reward_text .= '红包:' . $val . '元';
				}
			}
			return trim($reward_text);
		}
		return '';
	}
	public function getdefault($key) 
	{
		global $_W;
		if ($key) 
		{
			$default = pdo_fetchcolumn('select `data` from ' . tablename('ewei_shop_task_default') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
			$default = unserialize($default);
			return $default[$key];
		}
		return 0;
	}
	public function getGoods($param = '') 
	{
		if (empty($param)) 
		{
			return false;
		}
		if (isset($param['join_id']) || empty($param['join_id'])) 
		{
			return false;
		}
		global $_W;
		$search_sql = 'SELECT * FROM ' . tablename('ewei_shop_task_join') . ' WHERE openid= :openid AND uniacid = :uniacid AND `join_id`=:join_id  AND is_reward=1';
		$data = array(':uniacid' => $_W['uniacid'], ':openid' => $param['openid'], ':join_id' => $param['join_id']);
		$join_info = pdo_fetch($search_sql, $data);
		if (empty($join_info)) 
		{
			return false;
		}
		if (isset($param['goods_num']) && !(empty($param['goods_num']))) 
		{
			if ($join_info['task_type'] == 1) 
			{
				$rec_reward = unserialize($join_info['reward_data']);
				if (!(empty($rec_reward))) 
				{
					$goods_id = intval($param['goods_id']);
					if (isset($rec_reward['goods'][$goods_id]) && !(empty($rec_reward['goods'][$goods_id]))) 
					{
						$goods_spec = intval($param['goods_spec']);
						$goods_num = intval($param['goods_num']);
						if (0 < $goods_spec) 
						{
							$rec_reward['goods'][$goods_id]['spec'][$goods_spec]['total'] -= $goods_num;
							if ($rec_reward['goods'][$goods_id]['spec'][$goods_spec]['total'] < 0) 
							{
								return false;
							}
							$rec_reward = serialize($rec_reward);
							$update_data = array('reward_data' => $rec_reward);
							$update_where = array('join_id' => $param['join_id']);
							$res = pdo_update('ewei_shop_task_join', $update_data, $update_where);
							if ($res) 
							{
								return true;
							}
							return false;
						}
						$rec_reward['goods'][$goods_id]['total'] -= $goods_num;
						if ($rec_reward['goods'][$goods_id]['total'] < 0) 
						{
							return false;
						}
						$rec_reward = serialize($rec_reward);
						$update_data = array('reward_data' => $rec_reward);
						$update_where = array('join_id' => $param['join_id']);
						$res = pdo_update('ewei_shop_task_join', $update_data, $update_where);
						if ($res) 
						{
							return true;
						}
						return false;
					}
					return false;
				}
				return false;
			}
			if ($join_info['task_type'] == 2) 
			{
				$rec_reward = unserialize($join_info['reward_data']);
				if (!(empty($rec_reward))) 
				{
					$rank = intval($param['rank']);
					$goods_id = intval($param['goods_id']);
					if (!(isset($rec_reward[$rank]['is_reward'])) || empty($rec_reward[$rank]['is_reward'])) 
					{
						return false;
					}
					if (isset($rec_reward[$rank]['goods'][$goods_id]) && !(empty($rec_reward[$rank]['goods'][$goods_id]))) 
					{
						$goods_spec = intval($param['goods_spec']);
						$goods_num = intval($param['goods_num']);
						if (0 < $goods_spec) 
						{
							$rec_reward[$rank]['goods'][$goods_id]['spec'][$goods_spec]['total'] -= $goods_num;
							if ($rec_reward[$rank]['goods'][$goods_id]['spec'][$goods_spec]['total'] < 0) 
							{
								return false;
							}
							$rec_reward = serialize($rec_reward);
							$update_data = array('reward_data' => $rec_reward);
							$update_where = array('join_id' => $param['join_id']);
							$res = pdo_update('ewei_shop_task_join', $update_data, $update_where);
							if ($res) 
							{
								return true;
							}
							return false;
						}
						$rec_reward[$rank]['goods'][$goods_id]['total'] -= $goods_num;
						if ($rec_reward[$rank]['goods'][$goods_id]['total'] < 0) 
						{
							return false;
						}
						$rec_reward = serialize($rec_reward);
						$update_data = array('reward_data' => $rec_reward);
						$update_where = array('join_id' => $param['join_id']);
						$res = pdo_update('ewei_shop_task_join', $update_data, $update_where);
						if ($res) 
						{
							return true;
						}
						return false;
					}
					return false;
				}
				return false;
			}
		}
		else if ($join_info['task_type'] == 1) 
		{
			$rec_reward = unserialize($join_info['reward_data']);
			if (!(empty($rec_reward))) 
			{
				$goods_id = intval($param['goods_id']);
				if (isset($rec_reward['goods'][$goods_id]) && !(empty($rec_reward['goods'][$goods_id]))) 
				{
					return $rec_reward['goods'][$goods_id];
				}
				return false;
			}
			return false;
		}
		else if ($join_info['task_type'] == 2) 
		{
			$rec_reward = unserialize($join_info['reward_data']);
			if (!(isset($param['rank'])) || empty($param['rank'])) 
			{
				return false;
			}
			$rank = intval($param['rank']);
			if (!(empty($rec_reward))) 
			{
				$goods_id = intval($param['goods_id']);
				if (isset($rec_reward[$rank]['goods'][$goods_id]) && !(empty($rec_reward[$rank]['goods'][$goods_id]))) 
				{
					return $rec_reward[$rank]['goods'][$goods_id];
				}
				return false;
			}
			return false;
		}
	}
	public function reward($member_info, $poster, $join_info, $qr, $openid, $qrmember) 
	{
		if (empty($member_info) || empty($poster) || empty($join_info) || empty($openid) || empty($qr)) 
		{
			return false;
		}
		global $_W;
		load()->func('logging');
		$reward_data = unserialize($poster['reward_data']);
		$count = $join_info['completecount'] + 1;
		if (($join_info['needcount'] == $count) && ($join_info['is_reward'] == 0)) 
		{
			$reward = serialize($reward_data['rec']);
			$sub_reward = serialize($reward_data['sub']);
			$reward_log = array('uniacid' => $_W['uniacid'], 'openid' => $qr['openid'], 'from_openid' => $openid, 'join_id' => $join_info['join_id'], 'taskid' => $qr['posterid'], 'task_type' => 1, 'subdata' => $sub_reward, 'recdata' => $reward, 'createtime' => time());
			pdo_update('ewei_shop_task_join', array('completecount' => $count, 'is_reward' => 1, 'reward_data' => $reward), array('uniacid' => $_W['uniacid'], 'join_id' => $join_info['join_id'], 'join_user' => $qr['openid'], 'task_id' => $poster['id'], 'task_type' => 1));
			pdo_insert('ewei_shop_task_log', $reward_log);
			$log_id = pdo_insertid();
			$scaner = array('uniacid' => $_W['uniacid'], 'task_user' => $qr['openid'], 'joiner_id' => $openid, 'task_id' => $qr['posterid'], 'join_id' => $join_info['join_id'], 'task_type' => 1, 'join_status' => 1, 'addtime' => time());
			pdo_insert('ewei_shop_task_joiner', $scaner);
			foreach ($reward_data as $key => $val ) 
			{
				if ($key == 'rec') 
				{
					if (isset($val['credit']) && (0 < $val['credit'])) 
					{
						m('member')->setCredit($qr['openid'], 'credit1', $val['credit'], array(0, '推荐扫码关注积分+' . $val['credit']));
					}
					if (isset($val['money']) && (0 < $val['money']['num'])) 
					{
						$pay = $val['money']['num'];
						if ($val['money']['type'] == 1) 
						{
							$pay *= 100;
						}
						m('finance')->pay($qr['openid'], $val['money']['type'], $pay, '', '任务活动推荐奖励', false);
					}
					if (isset($val['bribery']) && (0 < $val['bribery'])) 
					{
						$setting = uni_setting($_W['uniacid'], array('payment'));
						if (!(is_array($setting['payment']))) 
						{
							return error(1, '没有设定支付参数');
						}
						$sec = m('common')->getSec();
						$sec = iunserializer($sec['sec']);
						$certs = $sec;
						$wechat = $setting['payment']['wechat'];
						$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
						$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
						$tid = rand(1, 1000) . time() . rand(1, 10000);
						$params = array('openid' => $qr['openid'], 'tid' => $tid, 'send_name' => '推荐奖励', 'money' => $val['bribery'], 'wishing' => '推荐奖励', 'act_name' => $poster['title'], 'remark' => '推荐奖励');
						$wechat = array('appid' => $row['key'], 'mchid' => $wechat['mchid'], 'apikey' => $wechat['apikey'], 'certs' => $certs);
						$err = m('common')->sendredpack($params, $wechat);
						if (!(is_error($err))) 
						{
							$reward = unserialize($reward);
							$reward['briberyOrder'] = $tid;
							$reward = serialize($reward);
							$upgrade = array('recdata' => $reward);
							pdo_update('ewei_shop_task_log', $upgrade, array('id' => $log_id));
						}
					}
					if (isset($val['coupon']) && !(empty($val['coupon']))) 
					{
						$cansendreccoupon = false;
						$plugin_coupon = com('coupon');
						unset($val['coupon']['total']);
						foreach ($val['coupon'] as $k => $v ) 
						{
							if ($plugin_coupon) 
							{
								if (!(empty($v['id'])) && (0 < $v['couponnum'])) 
								{
									$reccoupon = $plugin_coupon->getCoupon($v['id']);
									if (!(empty($reccoupon))) 
									{
										$cansendreccoupon = true;
									}
								}
							}
							if ($cansendreccoupon) 
							{
								$plugin_coupon->taskposter($qrmember, $v['id'], $v['couponnum']);
							}
						}
					}
				}
				else if ($key == 'sub') 
				{
					if (0 < $val['credit']) 
					{
						m('member')->setCredit($openid, 'credit1', $val['credit'], array(0, '扫码关注积分+' . $val['credit']));
					}
					if (0 < $val['money']['num']) 
					{
						$pay = $val['money']['num'];
						if ($val['money']['type'] == 1) 
						{
							$pay *= 100;
						}
						$res = m('finance')->pay($openid, $val['money']['type'], $pay, '', '任务活动奖励', false);
						if (is_error($res)) 
						{
							logging_run($res['message']);
						}
					}
					if (isset($val['coupon']) && isset($val['coupon']) && !(empty($val['coupon']))) 
					{
						$cansendreccoupon = false;
						$plugin_coupon = com('coupon');
						unset($val['coupon']['total']);
						foreach ($val['coupon'] as $k => $v ) 
						{
							if ($plugin_coupon) 
							{
								if (!(empty($v['id'])) && (0 < $v['couponnum'])) 
								{
									$reccoupon = $plugin_coupon->getCoupon($v['id']);
									if (!(empty($reccoupon))) 
									{
										$cansendreccoupon = true;
									}
								}
							}
							if ($cansendreccoupon) 
							{
								$plugin_coupon->taskposter($member_info, $v['id'], $v['couponnum']);
							}
						}
					}
				}
			}
			$default_text = pdo_fetchcolumn('SELECT `data` FROM ' . tablename('ewei_shop_task_default') . ' WHERE uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
			if (!(empty($default_text))) 
			{
				$default_text = unserialize($default_text);
				if (!(empty($default_text['successscaner']))) 
				{
					$poster['okdays'] = $join_info['failtime'];
					$poster['completecount'] = $join_info['completecount'];
					foreach ($default_text['successscaner'] as $key => $val ) 
					{
						$default_text['successscaner'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 1);
					}
					if ($default_text['templateid']) 
					{
						m('message')->sendTplNotice($openid, $default_text['templateid'], $default_text['successscaner'], '');
					}
					else 
					{
						m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
					}
				}
				else 
				{
					m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
				}
				if (!(empty($default_text['complete']))) 
				{
					$poster['okdays'] = $join_info['failtime'];
					$poster['completecount'] = $count;
					foreach ($default_text['complete'] as $key => $val ) 
					{
						$default_text['complete'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 2);
					}
					if ($default_text['templateid']) 
					{
						m('message')->sendTplNotice($qrmember['openid'], $default_text['templateid'], $default_text['complete'], mobileUrl('task', array('tabpage' => 'complete'), true));
					}
					else 
					{
						m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
					}
				}
				else 
				{
					m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
				}
			}
			else 
			{
				m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
				m('message')->sendCustomNotice($openid, '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
			}
		}
		else 
		{
			$reward = serialize($reward_data['rec']);
			$sub_reward = serialize($reward_data['sub']);
			$reward_log = array('uniacid' => $_W['uniacid'], 'openid' => $qr['openid'], 'from_openid' => $openid, 'join_id' => $join_info['join_id'], 'taskid' => $qr['posterid'], 'task_type' => 1, 'subdata' => $sub_reward, 'createtime' => time());
			pdo_update('ewei_shop_task_join', array('completecount' => $count), array('uniacid' => $_W['uniacid'], 'join_user' => $qr['openid'], 'task_id' => $poster['id'], 'task_type' => 1));
			pdo_insert('ewei_shop_task_log', $reward_log);
			$log_id = pdo_insertid();
			$scaner = array('uniacid' => $_W['uniacid'], 'task_user' => $qr['openid'], 'joiner_id' => $openid, 'task_id' => $qr['posterid'], 'join_id' => $join_info['join_id'], 'task_type' => 1, 'join_status' => 1, 'addtime' => time());
			pdo_insert('ewei_shop_task_joiner', $scaner);
			foreach ($reward_data as $key => $val ) 
			{
				if ($key == 'sub') 
				{
					if (0 < $val['credit']) 
					{
						m('member')->setCredit($openid, 'credit1', $val['credit'], array(0, '扫码关注积分+' . $val['credit']));
					}
					if (0 < $val['money']['num']) 
					{
						$pay = $val['money']['num'];
						if ($val['money']['type'] == 1) 
						{
							$pay *= 100;
						}
						$res = m('finance')->pay($openid, $val['money']['type'], $pay, '', '任务活动奖励', false);
						if (is_error($res)) 
						{
							logging_run('submoney' . $res['message']);
						}
					}
					if (0 < $val['bribery']) 
					{
						$setting = uni_setting($_W['uniacid'], array('payment'));
						if (!(is_array($setting['payment']))) 
						{
							return error(1, '没有设定支付参数');
						}
						$sec = m('common')->getSec();
						$sec = iunserializer($sec['sec']);
						$certs = $sec;
						$wechat = $setting['payment']['wechat'];
						$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
						$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
						$tid = rand(1, 1000) . time() . rand(1, 10000);
						$params = array('openid' => $openid, 'tid' => $tid, 'send_name' => '推荐奖励', 'money' => $val['bribery'], 'wishing' => '推荐奖励', 'act_name' => $poster['title'], 'remark' => '推荐奖励');
						$wechat = array('appid' => $row['key'], 'mchid' => $wechat['mchid'], 'apikey' => $wechat['apikey'], 'certs' => $certs);
						$err = m('common')->sendredpack($params, $wechat);
						if (!(is_error($err))) 
						{
							$sub_reward = unserialize($sub_reward);
							$sub_reward['briberyOrder'] = $tid;
							$sub_reward = serialize($sub_reward);
							$upgrade = array('subdata' => $sub_reward);
							pdo_update('ewei_shop_task_log', $upgrade, array('id' => $log_id));
						}
						else 
						{
							logging_run('bribery' . $err['message']);
						}
					}
					if (isset($val['coupon']) && !(empty($val['coupon']))) 
					{
						$cansendreccoupon = false;
						$plugin_coupon = com('coupon');
						unset($val['coupon']['total']);
						foreach ($val['coupon'] as $k => $v ) 
						{
							if ($plugin_coupon) 
							{
								$cansendreccoupon = false;
								if (!(empty($v['id'])) && (0 < $v['couponnum'])) 
								{
									$reccoupon = $plugin_coupon->getCoupon($v['id']);
									if (!(empty($reccoupon))) 
									{
										$cansendreccoupon = true;
									}
								}
							}
							if ($cansendreccoupon) 
							{
								$plugin_coupon->taskposter($member_info, $v['id'], $v['couponnum']);
							}
						}
					}
				}
			}
			$default_text = pdo_fetchcolumn('SELECT `data` FROM ' . tablename('ewei_shop_task_default') . ' WHERE uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
			if (!(empty($default_text))) 
			{
				$default_text = unserialize($default_text);
				if (!(empty($default_text['successscaner']))) 
				{
					$poster['okdays'] = $join_info['failtime'];
					$poster['completecount'] = $join_info['completecount'];
					foreach ($default_text['successscaner'] as $key => $val ) 
					{
						$default_text['successscaner'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 1);
					}
					if ($default_text['templateid']) 
					{
						m('message')->sendTplNotice($openid, $default_text['templateid'], $default_text['successscaner'], '');
					}
					else 
					{
						m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
					}
				}
				else 
				{
					m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
				}
				if ($poster['needcount'] < $count) 
				{
					if ($default_text['is_completed'] == 1) 
					{
						if (!(empty($default_text['completed']))) 
						{
							$poster['okdays'] = $join_info['failtime'];
							$poster['completecount'] = $count;
							foreach ($default_text['completed'] as $key => $val ) 
							{
								$default_text['completed'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 2);
							}
							if ($default_text['templateid']) 
							{
								m('message')->sendTplNotice($qrmember['openid'], $default_text['templateid'], $default_text['completed'], mobileUrl('task', array('tabpage' => 'complete'), true));
							}
							else 
							{
								m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
							}
						}
						else 
						{
							m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
						}
					}
				}
				else if (!(empty($default_text['successtasker']))) 
				{
					$poster['okdays'] = $join_info['failtime'];
					$poster['completecount'] = $count;
					foreach ($default_text['successtasker'] as $key => $val ) 
					{
						$default_text['successtasker'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 2);
					}
					if ($default_text['templateid']) 
					{
						m('message')->sendTplNotice($qrmember['openid'], $default_text['templateid'], $default_text['successtasker'], mobileUrl('task', array('tabpage' => 'runninga'), true));
					}
					else 
					{
						m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '您的海报被' . $member_info['nickname'] . '关注,增加了1点人气值', mobileUrl('task', array('tabpage' => 'runninga'), true));
					}
				}
				else 
				{
					m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '您的海报被' . $member_info['nickname'] . '关注,增加了1点人气值', mobileUrl('task', array('tabpage' => 'runninga'), true));
				}
			}
			else 
			{
				m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
				m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '您的海报被' . $member_info['nickname'] . '关注,增加了1点人气值', mobileUrl('task', array('tabpage' => 'runninga'), true));
			}
		}
	}
	public function rankreward($member_info, $poster, $join_info, $qr, $openid, $qrmember) 
	{
		if (empty($member_info) || empty($poster) || empty($join_info) || empty($openid) || empty($qr)) 
		{
			return false;
		}
		global $_W;
		$reward_data = unserialize($poster['reward_data']);
		$rec_data = unserialize($join_info['reward_data']);
		$count = $join_info['completecount'] + 1;
		$is_reward = 0;
		foreach ($rec_data as $k => $val ) 
		{
			if ($val['needcount'] == $count) 
			{
				if ($is_reward == 0) 
				{
					$is_reward = 1;
					if (!(isset($val['is_reward'])) || empty($val['is_reward'])) 
					{
						unset($val['rank']);
						unset($val['needcount']);
						$reward_data['rec'] = $reward_data['rec'][$k];
						$poster['reward_rank'] = $k;
						$this->reward_both($count, $reward_data, $qr, $join_info, $openid, $qrmember, $member_info, $poster);
						$rec_data[$k] = $reward_data['rec'];
						$rec_data[$k]['is_reward'] = 1;
						$rec_data[$k]['reward_time'] = time();
						$rec_data = serialize($rec_data);
						pdo_update('ewei_shop_task_join', array('reward_data' => $rec_data, 'is_reward' => 1), array('uniacid' => $_W['uniacid'], 'join_id' => $join_info['join_id'], 'join_user' => $qr['openid'], 'task_id' => $poster['id'], 'task_type' => 2));
					}
					else 
					{
						$this->reward_scan($count, $reward_data, $qr, $join_info, $openid, $qrmember, $member_info, $poster);
					}
				}
			}
			else if ($is_reward == 0) 
			{
				$is_reward = 1;
				$this->reward_scan($count, $reward_data, $qr, $join_info, $openid, $qrmember, $member_info, $poster);
			}
		}
	}
	protected function reward_both($count, $reward_data, $qr, $join_info, $openid, $qrmember, $member_info, $poster) 
	{
		global $_W;
		load()->func('logging');
		$reward = serialize($reward_data['rec']);
		$sub_reward = serialize($reward_data['sub']);
		$reward_log = array('uniacid' => $_W['uniacid'], 'openid' => $qr['openid'], 'from_openid' => $openid, 'join_id' => $join_info['join_id'], 'taskid' => $qr['posterid'], 'task_type' => 2, 'subdata' => $sub_reward, 'recdata' => $reward, 'createtime' => time());
		pdo_update('ewei_shop_task_join', array('completecount' => $count), array('uniacid' => $_W['uniacid'], 'join_id' => $join_info['join_id'], 'join_user' => $qr['openid'], 'task_id' => $poster['id'], 'task_type' => 2));
		pdo_insert('ewei_shop_task_log', $reward_log);
		$log_id = pdo_insertid();
		$scaner = array('uniacid' => $_W['uniacid'], 'task_user' => $qr['openid'], 'joiner_id' => $openid, 'task_id' => $qr['posterid'], 'join_id' => $join_info['join_id'], 'task_type' => 2, 'join_status' => 1, 'addtime' => time());
		pdo_insert('ewei_shop_task_joiner', $scaner);
		foreach ($reward_data as $key => $val ) 
		{
			if ($key == 'rec') 
			{
				if (isset($val['credit']) && (0 < $val['credit'])) 
				{
					m('member')->setCredit($qr['openid'], 'credit1', $val['credit'], array(0, '推荐扫码关注积分+' . $val['credit']));
				}
				if (isset($val['money']) && (0 < $val['money']['num'])) 
				{
					$pay = $val['money']['num'];
					if ($val['money']['type'] == 1) 
					{
						$pay *= 100;
					}
					m('finance')->pay($qr['openid'], $val['money']['type'], $pay, '', '任务活动推荐奖励', false);
				}
				if (isset($val['bribery']) && (0 < $val['bribery'])) 
				{
					$setting = uni_setting($_W['uniacid'], array('payment'));
					if (!(is_array($setting['payment']))) 
					{
						return error(1, '没有设定支付参数');
					}
					$sec = m('common')->getSec();
					$sec = iunserializer($sec['sec']);
					$certs = $sec;
					$wechat = $setting['payment']['wechat'];
					$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
					$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
					$tid = rand(1, 1000) . time() . rand(1, 10000);
					$params = array('openid' => $qr['openid'], 'tid' => $tid, 'send_name' => '推荐奖励', 'money' => $val['bribery'], 'wishing' => '推荐奖励', 'act_name' => $poster['title'], 'remark' => '推荐奖励');
					$wechat = array('appid' => $row['key'], 'mchid' => $wechat['mchid'], 'apikey' => $wechat['apikey'], 'certs' => $certs);
					$err = m('common')->sendredpack($params, $wechat);
					if (!(is_error($err))) 
					{
						$reward = unserialize($reward);
						$reward['briberyOrder'] = $tid;
						$reward = serialize($reward);
						$upgrade = array('recdata' => $reward);
						pdo_update('ewei_shop_task_log', $upgrade, array('id' => $log_id));
					}
				}
				if (isset($val['coupon']) && !(empty($val['coupon']))) 
				{
					$cansendreccoupon = false;
					$plugin_coupon = com('coupon');
					unset($val['coupon']['total']);
					foreach ($val['coupon'] as $k => $v ) 
					{
						if ($plugin_coupon) 
						{
							if (!(empty($v['id'])) && (0 < $v['couponnum'])) 
							{
								$reccoupon = $plugin_coupon->getCoupon($v['id']);
								if (!(empty($reccoupon))) 
								{
									$cansendreccoupon = true;
								}
							}
						}
						if ($cansendreccoupon) 
						{
							$plugin_coupon->taskposter($qrmember, $v['id'], $v['couponnum']);
						}
					}
				}
			}
			else if ($key == 'sub') 
			{
				if (0 < $val['credit']) 
				{
					m('member')->setCredit($openid, 'credit1', $val['credit'], array(0, '扫码关注积分+' . $val['credit']));
				}
				if (0 < $val['money']['num']) 
				{
					$pay = $val['money']['num'];
					if ($val['money']['type'] == 1) 
					{
						$pay *= 100;
					}
					$res = m('finance')->pay($openid, $val['money']['type'], $pay, '', '任务活动奖励', false);
					if (is_error($res)) 
					{
						logging_run($res['message']);
					}
				}
				if (isset($val['coupon']) && isset($val['coupon']) && !(empty($val['coupon']))) 
				{
					$cansendreccoupon = false;
					$plugin_coupon = com('coupon');
					unset($val['coupon']['total']);
					foreach ($val['coupon'] as $k => $v ) 
					{
						if ($plugin_coupon) 
						{
							if (!(empty($v['id'])) && (0 < $v['couponnum'])) 
							{
								$reccoupon = $plugin_coupon->getCoupon($v['id']);
								if (!(empty($reccoupon))) 
								{
									$cansendreccoupon = true;
								}
							}
						}
						if ($cansendreccoupon) 
						{
							$plugin_coupon->taskposter($member_info, $v['id'], $v['couponnum']);
						}
					}
				}
			}
		}
		$default_text = pdo_fetchcolumn('SELECT `data` FROM ' . tablename('ewei_shop_task_default') . ' WHERE uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
		if (!(empty($default_text))) 
		{
			$default_text = unserialize($default_text);
			if (!(empty($default_text['successscaner']))) 
			{
				$poster['okdays'] = $join_info['failtime'];
				$poster['completecount'] = $join_info['completecount'];
				foreach ($default_text['successscaner'] as $key => $val ) 
				{
					$default_text['successscaner'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 1);
				}
				if ($default_text['templateid']) 
				{
					m('message')->sendTplNotice($openid, $default_text['templateid'], $default_text['successscaner'], '');
				}
				else 
				{
					m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
				}
			}
			else 
			{
				m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
			}
			if (!(empty($default_text['completed']))) 
			{
				$poster['okdays'] = $join_info['failtime'];
				$poster['completecount'] = $count;
				foreach ($default_text['completed'] as $key => $val ) 
				{
					$default_text['completed'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 2);
				}
				if ($default_text['templateid']) 
				{
					m('message')->sendTplNotice($qrmember['openid'], $default_text['templateid'], $default_text['completed'], mobileUrl('task', array('tabpage' => 'complete'), true));
				}
				else 
				{
					m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
				}
			}
			else 
			{
				m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
			}
		}
		else 
		{
			m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
			m('message')->sendCustomNotice($openid, '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
		}
	}
	protected function reward_scan($count, $reward_data, $qr, $join_info, $openid, $qrmember, $member_info, $poster) 
	{
		global $_W;
		load()->func('logging');
		$sub_reward = serialize($reward_data['sub']);
		$reward_log = array('uniacid' => $_W['uniacid'], 'openid' => $qr['openid'], 'from_openid' => $openid, 'join_id' => $join_info['join_id'], 'taskid' => $qr['posterid'], 'task_type' => 2, 'subdata' => $sub_reward, 'createtime' => time());
		pdo_update('ewei_shop_task_join', array('completecount' => $count), array('uniacid' => $_W['uniacid'], 'join_user' => $qr['openid'], 'task_id' => $poster['id'], 'task_type' => 2));
		pdo_insert('ewei_shop_task_log', $reward_log);
		$log_id = pdo_insertid();
		$scaner = array('uniacid' => $_W['uniacid'], 'task_user' => $qr['openid'], 'joiner_id' => $openid, 'task_id' => $qr['posterid'], 'join_id' => $join_info['join_id'], 'task_type' => 2, 'join_status' => 1, 'addtime' => time());
		pdo_insert('ewei_shop_task_joiner', $scaner);
		foreach ($reward_data as $key => $val ) 
		{
			if ($key == 'sub') 
			{
				if (0 < $val['credit']) 
				{
					m('member')->setCredit($openid, 'credit1', $val['credit'], array(0, '扫码关注积分+' . $val['credit']));
				}
				if (0 < $val['money']['num']) 
				{
					$pay = $val['money']['num'];
					if ($val['money']['type'] == 1) 
					{
						$pay *= 100;
					}
					$res = m('finance')->pay($openid, $val['money']['type'], $pay, '', '任务活动奖励', false);
					if (is_error($res)) 
					{
						logging_run('submoney' . $res['message']);
					}
				}
				if (0 < $val['bribery']) 
				{
					$setting = uni_setting($_W['uniacid'], array('payment'));
					if (!(is_array($setting['payment']))) 
					{
						return error(1, '没有设定支付参数');
					}
					$sec = m('common')->getSec();
					$sec = iunserializer($sec['sec']);
					$certs = $sec;
					$wechat = $setting['payment']['wechat'];
					$sql = 'SELECT `key`,`secret` FROM ' . tablename('account_wechats') . ' WHERE `uniacid`=:uniacid limit 1';
					$row = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
					$tid = rand(1, 1000) . time() . rand(1, 10000);
					$params = array('openid' => $openid, 'tid' => $tid, 'send_name' => '推荐奖励', 'money' => $val['bribery'], 'wishing' => '推荐奖励', 'act_name' => $poster['title'], 'remark' => '推荐奖励');
					$wechat = array('appid' => $row['key'], 'mchid' => $wechat['mchid'], 'apikey' => $wechat['apikey'], 'certs' => $certs);
					$err = m('common')->sendredpack($params, $wechat);
					if (!(is_error($err))) 
					{
						$sub_reward = unserialize($sub_reward);
						$sub_reward['briberyOrder'] = $tid;
						$sub_reward = serialize($sub_reward);
						$upgrade = array('subdata' => $sub_reward);
						pdo_update('ewei_shop_task_log', $upgrade, array('id' => $log_id));
					}
					else 
					{
						logging_run('bribery' . $err['message']);
					}
				}
				if (isset($val['coupon']) && !(empty($val['coupon']))) 
				{
					$cansendreccoupon = false;
					$plugin_coupon = com('coupon');
					unset($val['coupon']['total']);
					foreach ($val['coupon'] as $k => $v ) 
					{
						if ($plugin_coupon) 
						{
							$cansendreccoupon = false;
							if (!(empty($v['id'])) && (0 < $v['couponnum'])) 
							{
								$reccoupon = $plugin_coupon->getCoupon($v['id']);
								if (!(empty($reccoupon))) 
								{
									$cansendreccoupon = true;
								}
							}
						}
						if ($cansendreccoupon) 
						{
							$plugin_coupon->taskposter($member_info, $v['id'], $v['couponnum']);
						}
					}
				}
			}
		}
		$default_text = pdo_fetchcolumn('SELECT `data` FROM ' . tablename('ewei_shop_task_default') . ' WHERE uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
		if (!(empty($default_text))) 
		{
			$default_text = unserialize($default_text);
			if (!(empty($default_text['successscaner']))) 
			{
				$poster['okdays'] = $join_info['failtime'];
				$poster['completecount'] = $join_info['completecount'];
				foreach ($default_text['successscaner'] as $key => $val ) 
				{
					$default_text['successscaner'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 1);
				}
				if ($default_text['templateid']) 
				{
					m('message')->sendTplNotice($openid, $default_text['templateid'], $default_text['successscaner'], '');
				}
				else 
				{
					m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
				}
			}
			else 
			{
				m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
			}
			if ($poster['needcount'] < $count) 
			{
				if ($default_text['is_completed'] == 1) 
				{
					if (!(empty($default_text['completed']))) 
					{
						$poster['okdays'] = $join_info['failtime'];
						$poster['completecount'] = $count;
						foreach ($default_text['completed'] as $key => $val ) 
						{
							$default_text['completed'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 2);
						}
						if ($default_text['templateid']) 
						{
							m('message')->sendTplNotice($qrmember['openid'], $default_text['templateid'], $default_text['completed'], mobileUrl('task', array('tabpage' => 'complete'), true));
						}
						else 
						{
							m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
						}
					}
					else 
					{
						m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '恭喜您完成任务获得奖励', mobileUrl('task', array('tabpage' => 'complete'), true));
					}
				}
			}
			else if (!(empty($default_text['successtasker']))) 
			{
				$poster['okdays'] = $join_info['failtime'];
				$poster['completecount'] = $count;
				foreach ($default_text['successtasker'] as $key => $val ) 
				{
					$default_text['successtasker'][$key]['value'] = $this->notice_complain($val['value'], $qrmember, $poster, $member_info, 2);
				}
				if ($default_text['templateid']) 
				{
					m('message')->sendTplNotice($qrmember['openid'], $default_text['templateid'], $default_text['successtasker'], mobileUrl('task', array('tabpage' => 'runninga'), true));
				}
				else 
				{
					m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '您的海报被' . $member_info['nickname'] . '关注,增加了1点人气值', mobileUrl('task', array('tabpage' => 'runninga'), true));
				}
			}
			else 
			{
				m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '您的海报被' . $member_info['nickname'] . '关注,增加了1点人气值', mobileUrl('task', array('tabpage' => 'runninga'), true));
			}
		}
		else 
		{
			m('message')->sendCustomNotice($openid, '感谢您的关注，恭喜您获得关注奖励');
			m('message')->sendCustomNotice($qrmember['openid'], '亲爱的' . $qrmember['nickname'] . '您的海报被' . $member_info['nickname'] . '关注,增加了1点人气值', mobileUrl('task', array('tabpage' => 'runninga'), true));
		}
	}
}
?>