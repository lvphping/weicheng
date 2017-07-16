<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Index_EweiShopV2Page extends PluginWebPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 20;
		$condition = ' and uniacid=:uniacid';
		$params = array(':uniacid' => $_W['uniacid']);
		if (!(empty($_GPC['keyword']))) 
		{
			$_GPC['keyword'] = trim($_GPC['keyword']);
			$condition .= ' and title  like :keyword';
			$params[':keyword'] = '%' . $_GPC['keyword'] . '%';
		}
		$list = pdo_fetchall('SELECT * FROM ' . tablename('ewei_message_mass_task') . ' WHERE 1 ' . $condition . '  ORDER BY id asc limit ' . (($pindex - 1) * $psize) . ',' . $psize, $params);
		$total = pdo_fetchcolumn('SELECT count(*) FROM ' . tablename('ewei_message_mass_task') . ' WHERE 1 ' . $condition, $params);
		$pager = pagination($total, $pindex, $psize);
		foreach ($list as &$item ) 
		{
			switch ($item['status']) 
			{
				case 0: $item['statustext'] = '未生成发送列表';
				break;
				case 1: $item['statustext'] = '发送未开始';
				break;
				case 2: $item['statustext'] = '发送未完成';
				break;
				case 3: $item['statustext'] = '发送完成';
				break;
			}
			$counts = pdo_fetchall('select `status`,COUNT(*) as num from ' . tablename('ewei_message_mass_sign') . ' WHERE taskid=' . $item['id'] . '  GROUP BY `status`');
			$num = 0;
			$item['nosend'] = 0;
			$item['sendsuccess'] = 0;
			$item['sendfail'] = 0;
			foreach ($counts as $count ) 
			{
				$num += $count['num'];
				if ($count['status'] == 1) 
				{
					$item['nosend'] = $count['num'];
				}
				if ($count['status'] == 2) 
				{
					$item['nosend'] += $count['num'];
				}
				if ($count['status'] == 3) 
				{
					$item['sendsuccess'] = $count['num'];
				}
				if ($count['status'] == 4) 
				{
					$item['sendfail'] = $count['num'];
				}
			}
			$item['num'] = $num;
		}
		unset($item);
		include $this->template();
	}
	public function add() 
	{
		$this->post();
	}
	public function edit() 
	{
		$this->post();
	}
	protected function post() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		if (!(empty($_GPC['id']))) 
		{
			$item = pdo_fetch('SELECT * FROM ' . tablename('ewei_message_mass_task') . ' WHERE id=:id and uniacid=:uniacid ', array(':id' => $_GPC['id'], ':uniacid' => $_W['uniacid']));
			if (!(empty($item['templateid']))) 
			{
				$send = pdo_fetch('SELECT *  FROM ' . tablename('ewei_message_mass_template') . ' WHERE id=:id and uniacid=:uniacid ', array(':id' => $item['templateid'], ':uniacid' => $_W['uniacid']));
			}
			if (intval($item['sendlimittype']) == 1) 
			{
				$send_openid1 = $item['send_openid'];
			}
			if ($item['sendlimittype'] == 2) 
			{
				$salers = array();
				if (!(empty($item['send_openid']))) 
				{
					$openids = array();
					$strsopenids = explode(',', $item['send_openid']);
					foreach ($strsopenids as $openid ) 
					{
						$openids[] = '\'' . $openid . '\'';
					}
					$salers = pdo_fetchall('select id,nickname,avatar,openid from ' . tablename('ewei_shop_member') . ' where openid in (' . implode(',', $openids) . ') and uniacid=' . $_W['uniacid']);
				}
			}
		}
		$list = pdo_fetchall('SELECT *  FROM ' . tablename('ewei_shop_member_level') . ' WHERE uniacid = \'' . $_W['uniacid'] . '\' ORDER BY level asc');
		$list2 = pdo_fetchall('SELECT *  FROM ' . tablename('ewei_shop_member_group') . ' WHERE uniacid = \'' . $_W['uniacid'] . '\' ORDER BY id asc');
		$list3 = pdo_fetchall('SELECT *  FROM ' . tablename('ewei_shop_commission_level') . ' WHERE uniacid = \'' . $_W['uniacid'] . '\' ORDER BY id asc');
		if ($_W['ispost']) 
		{
			$data = array('uniacid' => $_W['uniacid'], 'title' => trim($_GPC['title']), 'processnum' => intval($_GPC['processnum']), 'messagetype' => intval($_GPC['messagetype']), 'sendlimittype' => intval($_GPC['sendlimittype']), 'status' => 0);
			if (empty($_GPC['messagetype'])) 
			{
				$data['templateid'] = intval($_GPC['templateid']);
			}
			else if (empty($_GPC['customertype'])) 
			{
				$data['customertype'] = intval($_GPC['customertype']);
				$data['resptitle'] = trim($_GPC['send_title']);
				$data['respthumb'] = trim($_GPC['send_thumb']);
				$data['respdesc'] = trim($_GPC['send_desc']);
				$data['respurl'] = trim($_GPC['send_url']);
			}
			else 
			{
				$data['customertype'] = intval($_GPC['customertype']);
				$data['resdesc2'] = html_entity_decode($_GPC['send_desc2']);
			}
			if (intval($_GPC['sendlimittype']) == 1) 
			{
				$data['send_openid'] = trim($_GPC['send_openid1']);
			}
			else if (intval($_GPC['sendlimittype']) == 2) 
			{
				$data['send_openid'] = implode(',', $_GPC['send_openid2']);
			}
			else if (intval($_GPC['sendlimittype']) == 3) 
			{
				$data['send_level'] = intval($_GPC['send_level']);
			}
			else if (intval($_GPC['sendlimittype']) == 4) 
			{
				$data['send_group'] = intval($_GPC['send_group']);
			}
			else if (intval($_GPC['sendlimittype']) == 5) 
			{
				$data['send_agentlevel'] = intval($_GPC['send_agentlevel']);
			}
			if (empty($id)) 
			{
				pdo_insert('ewei_message_mass_task', $data);
				$id = pdo_insertid();
				plog('messages.template.add', '添加群发模板 ID: ' . $id . ' 标题: ' . $data['title'] . ' ');
			}
			else 
			{
				pdo_update('ewei_message_mass_task', $data, array('id' => $id));
				plog('messages.template.edit', '编辑群发模板 ID: ' . $id . ' 标题: ' . $data['title'] . ' ');
			}
			show_json(1, array('url' => webUrl('messages')));
		}
		include $this->template();
	}
	public function build() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$item = pdo_fetch('SELECT id,sendlimittype,send_openid,send_level,send_group,send_agentlevel FROM ' . tablename('ewei_message_mass_task') . ' WHERE id =:id AND uniacid=:uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (!(empty($item))) 
		{
			$params = array(':taskid' => $item['id'], ':uniacid' => $_W['uniacid']);
			$sql = 'insert into  ' . tablename('ewei_message_mass_sign') . '  (uniacid,openid,nickname,taskid,`status`) ';
			$sql .= ' SELECT  :uniacid,sm.openid,sm.nickname,:taskid,1 from ' . tablename('ewei_shop_member') . ' sm  inner join ' . tablename('mc_mapping_fans') . ' mf  on sm.openid=mf.openid and mf.follow=1 where sm.uniacid=:uniacid ';
			if ((intval($item['sendlimittype']) == 1) || (intval($item['sendlimittype']) == 2)) 
			{
				if (!(empty($item['send_openid']))) 
				{
					$openids[] = array();
					$openids = explode(',', $item['send_openid']);
					foreach ($openids as $key => $openid ) 
					{
						$openids[$key] = '\'' . $openid . '\'';
					}
					$sql .= ' and sm.openid in(' . implode(',', $openids) . ')';
				}
				else 
				{
					$sql .= ' and 1<>1';
				}
			}
			else if (intval($item['sendlimittype']) == 3) 
			{
				if (!(empty($item['send_level']))) 
				{
					$sql .= ' and sm.level =:send_level';
					$params[':send_level'] = $item['send_level'];
				}
			}
			else if (intval($item['sendlimittype']) == 4) 
			{
				if (!(empty($item['send_group']))) 
				{
					$sql .= ' and sm.groupid =:send_group';
					$params[':send_group'] = $item['send_group'];
				}
			}
			else if (intval($item['sendlimittype']) == 5) 
			{
				if (!(empty($item['send_agentlevel']))) 
				{
					$sql .= ' and  sm.agentlevel =:send_agentlevel';
					$params[':send_agentlevel'] = $item['send_agentlevel'];
				}
			}
			pdo_delete('ewei_message_mass_sign', array('taskid' => $id, 'uniacid' => $_W['uniacid']));
			pdo_query($sql, $params);
			$data = array('status' => 1);
			pdo_update('ewei_message_mass_task', $data, array('id' => $id, 'uniacid' => $_W['uniacid']));
		}
		show_json(1, array('url' => referer()));
	}
	public function reset() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$item = pdo_fetch('SELECT id,title FROM ' . tablename('ewei_message_mass_task') . ' WHERE id =:id AND uniacid=:uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (!(empty($item))) 
		{
			$data = array('status' => 1);
			pdo_update('ewei_message_mass_task', $data, array('id' => $id, 'uniacid' => $_W['uniacid']));
			$data['log'] = '';
			pdo_update('ewei_message_mass_sign', $data, array('taskid' => $id, 'uniacid' => $_W['uniacid']));
			plog('messages.delete', '重置群发任务 ID: ' . $item['id'] . ' 标题: ' . $item['title'] . ' ');
		}
		show_json(1, array('url' => referer()));
	}
	public function delete() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$item = pdo_fetch('SELECT id,title FROM ' . tablename('ewei_message_mass_task') . ' WHERE id =:id AND uniacid=:uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (!(empty($item))) 
		{
			pdo_delete('ewei_message_mass_task', array('id' => $id, 'uniacid' => $_W['uniacid']));
			pdo_delete('ewei_message_mass_sign', array('taskid' => $id, 'uniacid' => $_W['uniacid']));
			plog('messages.delete', '删除群发任务 ID: ' . $item['id'] . ' 标题: ' . $item['title'] . ' ');
		}
		show_json(1, array('url' => referer()));
	}
	public function run() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$data = array('status' => 1);
		pdo_update('ewei_message_mass_sign', $data, array('taskid' => $id, 'uniacid' => $_W['uniacid'], 'status' => 2));
		$item = pdo_fetch('SELECT id,title,processnum FROM ' . tablename('ewei_message_mass_task') . ' WHERE id =:id AND uniacid=:uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		$processnum = intval($item['processnum']);
		$process = array();
		$i = 0;
		while ($i < $processnum) 
		{
			$process[] = webUrl('messages/fetch', array('id' => $id));
			++$i;
		}
		$data = array('status' => 2);
		pdo_update('ewei_message_mass_task', $data, array('id' => $id, 'uniacid' => $_W['uniacid']));
		include $this->template();
	}
	public function fetch() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$item = pdo_fetch('SELECT s.id,s.taskid,s.openid,s.nickname,t.messagetype,t.templateid,t.resptitle,t.respthumb,t.respdesc,t.respurl,t.customertype,t.resdesc2  FROM ' . tablename('ewei_message_mass_sign') . ' s inner join ' . tablename('ewei_message_mass_task') . ' t' . "\r\n" . '          on s.taskid = t.id  WHERE s.taskid =:id AND s.uniacid=:uniacid and s.status =1 order by id limit 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (!(empty($item))) 
		{
			$hasNext = true;
			$resp = false;
			$data = array('status' => 2);
			pdo_update('ewei_message_mass_sign', $data, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
			if ($item['messagetype'] == 0) 
			{
				$resp = $this->sendTplNotice($item['openid'], $item['templateid'], $item['nickname']);
			}
			else if ($item['messagetype'] == 1) 
			{
				if (empty($item['customertype'])) 
				{
					$resp = $this->sendNews($item['openid'], $item['resptitle'], $item['respdesc'], $item['respurl'], $item['respthumb']);
				}
				else 
				{
					$resp = m('message')->sendCustomNotice($item['openid'], $item['resdesc2']);
				}
			}
			else if ($item['messagetype'] == 2) 
			{
				if (empty($item['customertype'])) 
				{
					$resp = $this->sendNews($item['openid'], $item['resptitle'], $item['respdesc'], $item['respurl'], $item['respthumb']);
				}
				else 
				{
					$resp = m('message')->sendCustomNotice($item['openid'], $item['resdesc2']);
				}
				if (is_error($resp)) 
				{
					$resp = $this->sendTplNotice($item['openid'], $item['templateid'], $item['nickname']);
				}
			}
			if (is_error($resp)) 
			{
				$data['status'] = 4;
				$data['log'] = $resp['message'];
			}
			else 
			{
				$data['status'] = 3;
			}
			pdo_update('ewei_message_mass_sign', $data, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
		}
		else 
		{
			$hasNext = false;
			$data = array('status' => 3);
			pdo_update('ewei_message_mass_task', $data, array('id' => $id, 'uniacid' => $_W['uniacid']));
		}
		$targetUrl = webUrl('messages/fetch', array('id' => $id));
		include $this->template();
	}
	public function fetch2() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$item = pdo_fetch('SELECT s.id,s.taskid,s.openid,s.nickname,t.messagetype,t.templateid,t.resptitle,t.respthumb,t.respdesc,t.respurl  FROM ' . tablename('ewei_message_mass_sign') . ' s inner join ' . tablename('ewei_message_mass_task') . ' t' . "\r\n" . '          on s.taskid = t.id  WHERE s.taskid =:id AND s.uniacid=:uniacid and s.status =1 order by id limit 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (!(empty($item))) 
		{
			$hasNext = true;
			$resp = false;
			$data = array('status' => 2);
			pdo_update('ewei_message_mass_sign', $data, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
			if ($item['messagetype'] == 0) 
			{
				$resp = $this->sendTplNotice($item['openid'], $item['templateid'], $item['nickname']);
			}
			else if ($item['messagetype'] == 1) 
			{
				$resp = $this->sendNews($item['openid'], $item['resptitle'], $item['respdesc'], $item['respurl'], $item['respthumb']);
			}
			else if ($item['messagetype'] == 2) 
			{
				$resp = $this->sendNews($item['openid'], $item['resptitle'], $item['respdesc'], $item['respurl'], $item['respthumb']);
				if (is_error($resp)) 
				{
					$resp = $this->sendTplNotice($item['openid'], $item['templateid'], $item['nickname']);
				}
			}
			if (is_error($resp)) 
			{
				$data['status'] = 4;
				$data['log'] = $resp['message'];
			}
			else 
			{
				$data['status'] = 3;
			}
			pdo_update('ewei_message_mass_sign', $data, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
		}
		else 
		{
			$hasNext = false;
		}
		show_json(array('next' => $hasNext));
	}
	public function sendTplNotice($openid, $templateid, $nickname) 
	{
		global $_W;
		$member = m('member')->getMember($openid);
		$result = false;
		if (!(empty($templateid))) 
		{
			$template = pdo_fetch('SELECT * FROM ' . tablename('ewei_message_mass_template') . ' WHERE id=:id and uniacid=:uniacid ', array(':id' => $templateid, ':uniacid' => $_W['uniacid']));
			$data = iunserializer($template['data']);
			$msg = array( 'first' => array('value' => $template['first'], 'color' => $template['firstcolor']), 'remark' => array('value' => $template['remark'], 'color' => $template['remarkcolor']) );
			$i = 0;
			while ($i < count($data)) 
			{
				if (stripos($data[$i]['value'], '[商城名称]') !== false) 
				{
					$data[$i]['value'] = str_replace('[商城名称]', $_W['shopset']['shop']['name'], $data[$i]['value']);
				}
				if (stripos($data[$i]['value'], '[粉丝昵称]') !== false) 
				{
					$data[$i]['value'] = str_replace('[粉丝昵称]', $nickname, $data[$i]['value']);
				}
				$msg[$data[$i]['keywords']] = array('value' => $data[$i]['value'], 'color' => $data[$i]['color']);
				++$i;
			}
			$result = m('message')->sendTplNotice($openid, $template['template_id'], $msg, $template['url']);
		}
		return $result;
	}
	public function sendNews($openid, $title, $desc, $url, $picurl, $account = NULL) 
	{
		global $_W;
		$result = false;
		$articles[] = array('title' => urlencode($title), 'description' => urlencode($desc), 'url' => $url, 'picurl' => tomedia($picurl));
		$result = m('message')->sendNews($openid, $articles, $account);
		return $result;
	}
}
?>