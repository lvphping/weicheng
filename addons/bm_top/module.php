<?php

defined('IN_IA') or exit('Access Denied');

class bm_topModule extends WeModule {
    public $weid;
    public function __construct() {
        global $_W;
        $this->weid = IMS_VERSION<0.6?$_W['weid']:$_W['uniacid'];
    }
	
	public function fieldsFormDisplay($rid = 0) {
		//要嵌入规则编辑页的自定义内容，这里 $rid 为对应的规则编号，新增时为 0
		global $_W;
		if (!empty($rid)) {
			$reply = pdo_fetch("SELECT * FROM ".tablename('bm_top_reply')." WHERE rid = :rid ORDER BY `id` DESC", array(':rid' => $rid));
		}
		load()->func('tpl');
		include $this->template('form');		
	}

	public function fieldsFormValidate($rid = 0) {
		//规则编辑保存时，要进行的数据验证，返回空串表示验证无误，返回其他字符串将呈现为错误提示。这里 $rid 为对应的规则编号，新增时为 0
		return '';
	}

	public function fieldsFormSubmit($rid) {
		//规则验证无误保存入库时执行，这里应该进行自定义字段的保存。这里 $rid 为对应的规则编号
		global $_W,$_GPC;
		$weid=$_W['uniacid'];
		$data = array(
			'rid'         => $rid,
			'weid'        => $weid,
			'n'           => intval($_GPC['n']),
			'desc'        => $_GPC['desc'],
			'pictype'     => $_GPC['pictype'],
			'picurl'      => $_GPC['picurl'],
			'urlx'        => $_GPC['urlx'],
			'title'       => $_GPC['title'],
		);
		if ($_W['ispost']) {
			if (empty($_GPC['reply_id'])) {
				pdo_insert('bm_top_reply',$data);
			}else{
				pdo_update('bm_top_reply',$data,array('id' => $_GPC['reply_id']));
			}
			message('更新成功',referer(),'success');
		}
	}

	public function ruleDeleted($rid) {
		//删除规则时调用，这里 $rid 为对应的规则编号
		/*global $_W;
		$replies = pdo_fetchall("SELECT *  FROM ".tablename('bm_attraction_reply')." WHERE rid = '$rid'");
		$deleteid = array();
		if (!empty($replies)) {
			foreach ($replies as $index => $row) {
				file_delete($row['picurl']);
				file_delete($row['info_picurl']);
				file_delete($row['order_picurl']);
				$deleteid[] = $row['id'];
			}
		}
		pdo_delete('bm_attraction_reply', "id IN ('".implode("','", $deleteid)."')");*/
		return true;
	}

}
?>