<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Cache_EweiShopV2Model 
{
	public function get_key($key = '', $uniacid = '') 
	{
		global $_W;
		static $APPID;
		if (empty($uniacid)) 
		{
			$uniacid = $_W['uniacid'];
		}
		if (function_exists('redis')) 
		{
			$redis = redis();
			if (!(is_error($redis))) 
			{
				if (stripos($uniacid, 'global') !== false) 
				{
					return 'ewei_shopv2_syscache_' . $_W['setting']['site']['key'] . '_global_' . $key;
				}
				if (empty($_W['account']['key'])) 
				{
					if (is_null($APPID) || empty($APPID)) 
					{
						$APPID = pdo_fetchcolumn('SELECT `key` FROM ' . tablename('account_wechats') . ' WHERE uniacid=:uniacid', array(':uniacid' => $uniacid));
					}
					$_W['account']['key'] = $APPID;
				}
				return 'ewei_shopv2_syscache_' . $_W['setting']['site']['key'] . '_' . $uniacid . '_' . $_W['account']['key'] . '_' . $key;
			}
		}
		return EWEI_SHOPV2_PREFIX . md5($uniacid . '_new_' . $key);
	}
	public function getArray($key = '', $uniacid = '') 
	{
		return $this->get($key, $uniacid);
	}
	public function getString($key = '', $uniacid = '') 
	{
		return $this->get($key, $uniacid);
	}
	public function get($key = '', $uniacid = '') 
	{
		if (function_exists('redis')) 
		{
			$redis = redis();
			if (!(is_error($redis))) 
			{
				$prefix = '__iserializer__format__::';
				$value = $redis->get($this->get_key($key, $uniacid));
				if (empty($value)) 
				{
					return false;
				}
				if (stripos($value, $prefix) === 0) 
				{
					return iunserializer(substr($value, strlen($prefix)));
				}
				return $value;
			}
		}
		return cache_read($this->get_key($key, $uniacid));
	}
	public function set($key = '', $value = NULL, $uniacid = '') 
	{
		if (function_exists('redis')) 
		{
			$redis = redis();
			if (!(is_error($redis))) 
			{
				$prefix = '__iserializer__format__::';
				if (is_array($value)) 
				{
					$value = $prefix . iserializer($value);
				}
				$redis->set($this->get_key($key, $uniacid), $value);
				return;
			}
		}
		cache_write($this->get_key($key, $uniacid), $value);
	}
}
?>