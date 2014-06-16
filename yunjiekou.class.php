<?php
if(!defined("YJK_API_HOST"))
{
	define("YJK_API_HOST", "http://api.yunjiekou.com/");
	define("YJK_API_VERSION", "1.0");
	define("YJK_APP_KEY", "1ebacf4cce2c1bd36d9cbbceb1e369f1");
	define("YJK_APP_SECRET", "c31d41b52126d94b8d3fb366d84ad645");
}

class YunJieKou
{
	public function req($api_name,$params= array(),$format = "json",$req_type = "post")
	{
		
		$p = $params;
		$p["appkey"] = YJK_APP_KEY;
		$p["v"] = YJK_API_VERSION;
		$p["timestamp"] = time();
		$p["method"] = $api_name;
		$p["format"] = $format;
		
		$sign = $this->sign($p);
		
		$url = YJK_API_HOST."?".http_build_query($p)."&sign=".$sign;
		return $url;
	}
	
	private function sign($p)
	{
		$s = '';
		ksort($p);
		foreach($p as $k=>$v)
		{
			$s.=($k.$v);
		}
		return md5(YJK_APP_SECRET.$s.YJK_APP_SECRET);
	}
	
	private function getData($url,$params)
	{
	
	}
} 

?>