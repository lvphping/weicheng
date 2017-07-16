<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require_once IA_ROOT . '/addons/ewei_shopv2/defines.php';
require_once EWEI_SHOPV2_INC . 'plugin_processor.php';
require_once EWEI_SHOPV2_INC . 'receiver.php';
class PosterProcessor extends PluginProcessor 
{
	public function __construct() 
	{
		parent::__construct('exchange');
	}
}
?>