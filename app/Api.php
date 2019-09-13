<?php

namespace App;

use Cache;

class Api
{

	protected $cache_time = 604800;


	public function get($request)
	{
		$url = $request['url'].'?';

		foreach ($request['params'] as $key => $value) {
			$url = $url.$key.'='.$value.'&'	;
		}

		$key = md5($url);

		if(is_null($response = Cache::get($key)))
		{
			$response  =  file_get_contents($url);
			Cache::put($key,$response,$this->cache_time);
		}


		return json_decode($response);


	}
}
