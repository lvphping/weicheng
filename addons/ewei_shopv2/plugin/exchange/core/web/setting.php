<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Setting_EweiShopV2Page extends PluginWebPage 
{
	public function main() 
	{
	}
	public function download() 
	{
		global $_GPC;
		global $_W;
		$dir = IA_ROOT . '/addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/exchange';
		if (!(file_exists($dir)) || !(is_writable($dir))) 
		{
			load()->func('file');
			mkdirs($dir);
		}
		else 
		{
			$file = array();
			$allFile = scandir($dir);
			array_splice($allFile, 0, 2);
			$file_dir = $dir . '/' . $v;
			$file[$k]['name'] = $v;
			$file[$k]['dir'] = $file_dir;
			$file[$k]['time'] = filemtime($file_dir);
			$file[$k]['size'] = filesize($file_dir);
			$expanded = substr($v, -4, 4);
			switch ($expanded) 
			{
				case '.zip': $type = 1;
				break;
				case '.txt': $type = 2;
				break;
				case '.xls': $type = 3;
				break;
			}
			$file[$k]['type'] = $type;
			uasort($file, function($x, $y) 
			{
				return $y['time'] - $x['time'];
			}
			);
		}
		include $this->template();
	}
	public function filedel() 
	{
		global $_GPC;
		global $_W;
		$filename = trim($_GPC['fname']);
		$filetype = intval($_GPC['ftype']);
		$dir = IA_ROOT . '/addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/exchange';
		$fileDir = $dir . '/' . $filename;
		if (0 < $filetype) 
		{
			if (unlink($fileDir)) 
			{
				show_json(1, '删除成功');
			}
			else 
			{
				show_json(0, '删除失败');
			}
		}
		else 
		{
			$delres = $this->delDirAndFile($fileDir);
			if (!(empty($delres))) 
			{
				show_json(1, '删除成功');
			}
			else 
			{
				show_json(0, '删除失败');
			}
		}
	}
	public function delDirAndFile($path, $delDir = true) 
	{
		$handle = opendir($path);
		if ($handle) 
		{
			while (false !== $item = readdir($handle)) 
			{
				if (($item != '.') && ($item != '..')) 
				{
					(is_dir($path . '/' . $item) ? delDirAndFile($path . '/' . $item, $delDir) : unlink($path . '/' . $item));
				}
			}
			closedir($handle);
			if ($delDir) 
			{
				return rmdir($path);
			}
		}
		else if (file_exists($path)) 
		{
			return unlink($path);
		}
		else 
		{
			return false;
		}
	}
	public function delall() 
	{
		global $_GPC;
		global $_W;
		$dir = IA_ROOT . '/addons/ewei_shopv2/data/qrcode/' . $_W['uniacid'] . '/exchange';
		$this->delDirAndFile($dir, 0);
	}
}
?>