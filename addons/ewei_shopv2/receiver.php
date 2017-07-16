<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}


require IA_ROOT . '/addons/ewei_shopv2/version.php';
require IA_ROOT . '/addons/ewei_shopv2/defines.php';
require EWEI_SHOPV2_INC . 'functions.php';
require EWEI_SHOPV2_INC . 'receiver.php';
class Ewei_shopv2ModuleReceiver extends Receiver
{
	public function receive()
	{
		parent::receive();
	}
}


?>