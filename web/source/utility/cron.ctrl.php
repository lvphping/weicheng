<?php

defined('IN_IA') or exit('Access Denied');
error_reporting(0);
global $_W;
if (!in_array($do, array('log'))) {
	exit('Access Denied');
}

if($do == 'log') {
	$tid = intval($_GPC['tid']);
	$module = trim($_GPC['module']);
	$type = trim($_GPC['type']);
	$data = pdo_getall('core_cron_record', array('uniacid' => $_W['uniacid'], 'tid' => $tid, 'module' => $module, 'type' => $type));
	if(!empty($data)) {
		foreach($data as &$da) {
			$da['createtime'] = date('Y-m-d H:i:s', $da['createtime']);
		}
	}
	message(array('items' => $data), '', 'ajax');
}
