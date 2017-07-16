<?php

defined('IN_IA') or exit('Access Denied');
class bm_siteModuleSite extends WeModuleSite {
    public $weid;
    public function __construct() {
        global $_W;
        $this->weid = IMS_VERSION<0.6?$_W['weid']:$_W['uniacid'];
    }

}
?>