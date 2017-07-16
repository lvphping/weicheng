<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Util_EweiShopV2Model 
{
	public function getExpressList($express, $expresssn) 
	{
		$express = (($express == 'jymwl' ? 'jiayunmeiwuliu' : $express));
		$express = (($express == 'TTKD' ? 'tiantian' : $express));
		$express = (($express == 'jjwl' ? 'jiajiwuliu' : $express));
		$express = (($express == 'zhongtiekuaiyun' ? 'ztky' : $express));
		$url = 'https://www.kuaidi100.com/query?type=' . $express . '&postid=' . $expresssn . '&id=1&valicode=&temp=';
		load()->func('communication');
		$resp = ihttp_request($url);
		$content = $resp['content'];
		if (empty($content)) 
		{
			return array();
		}
		$info = json_decode($content, true);
		if (empty($info) || !(is_array($info)) || empty($info['data'])) 
		{
			return array();
		}
		$list = array();
		foreach ($info['data'] as $index => $data ) 
		{
			$list[] = array('time' => trim($data['time']), 'step' => trim($data['context']));
		}
		return $list;
	}
	public function getIpAddress() 
	{
		$ipContent = file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js');
		$jsonData = explode('=', $ipContent);
		$jsonAddress = substr($jsonData[1], 0, -1);
		return $jsonAddress;
	}
	public function checkRemoteFileExists($url) 
	{
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		$result = curl_exec($curl);
		$found = false;
		if ($result !== false) 
		{
			$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ($statusCode == 200) 
			{
				$found = true;
			}
		}
		curl_close($curl);
		return $found;
	}
	public function GetDistance($lat1, $lng1, $lat2, $lng2, $len_type = 1, $decimal = 2) 
	{
		$pi = 3.1415926000000001;
		$er = 6378.1369999999997;
		$radLat1 = ($lat1 * $pi) / 180;
		$radLat2 = ($lat2 * $pi) / 180;
		$a = $radLat1 - $radLat2;
		$b = (($lng1 * $pi) / 180) - (($lng2 * $pi) / 180);
		$s = 2 * asin(sqrt(pow(sin($a / 2), 2) + (cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))));
		$s = $s * $er;
		$s = round($s * 1000);
		if (1 < $len_type) 
		{
			$s /= 1000;
		}
		return round($s, $decimal);
	}
	public function multi_array_sort($multi_array, $sort_key, $sort = SORT_ASC) 
	{
		if (is_array($multi_array)) 
		{
			foreach ($multi_array as $row_array ) 
			{
				if (is_array($row_array)) 
				{
					$key_array[] = $row_array[$sort_key];
				}
				else 
				{
					return false;
				}
			}
		}
		else 
		{
			return false;
		}
		array_multisort($key_array, $sort, $multi_array);
		return $multi_array;
	}
}
?>