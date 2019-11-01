<?php

namespace App\Services;
use Illuminate\Support\Facades\Cache;

class cacheService
{
	

	public static function newKeyIndex()
	{	
		$index = Cache::store('file')->get('index');
		if(is_null($index))
		{
			$value = 0;
			$index = [];
		}
		else {
			$value = array_key_last($index) + 1; 
		}
		$index[] = $value;
		Cache::store('file')->put('index',$index);
		return $value;
	}

	public static function allValues()
	{	
		$index = Cache::store('file')->get('index');

		if(!empty($index)){
		
		foreach ($index as $key => $value) {
				$data[] = Cache::store('file')->get($value);
			}
	
			return $data;
		}
		return [];
	}

	public static function remove(int $index)
	{
		$original = Cache::store('file')->get('index');
		unset($original[$index]);
		Cache::store('file')->put('index',$original);
	}


}