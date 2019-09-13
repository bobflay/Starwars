<?php

namespace App;


class Starwars extends Api
{

	protected $base_url = 'https://swapi.co/api/';
	protected $entity = '';


	public function __construct()
	{
		$this->entity = $this->getChildClass();
	}


    public function root()
    {
    	$request = [
    		'url'=>$this->base_url,
    		'params'=>[]
    	];

    	$result = $this->get($request);
    	return $result;
    }


    public function search($keyword)
    {
    	$keyword = str_replace(' ', '%20', $keyword);

    	$request = [
    		'url'=>$this->base_url.$this->entity,
    		'params'=>[
    			'search'=>$keyword
    		]
    	];


    	$result = $this->get($request);
    	return $this->format($result);
    }



    private function getChildClass()
    {
    	$class = get_class($this);
    	$class = str_replace('App\\', '', $class);
    	$class = strtolower($class);
    	return $class;
    }



    public function getFromURL($urls)
    {
    	$result = [];
    	
    	if(!is_array($urls))
    	{
    		$urls = [$urls];
    	}

    	foreach ($urls as $url) {
    		$request = [
    			'url'=>$url,
    			'params'=>[]
    		];

    		$response = $this->get($request);

    		array_push($result, $response);
    	}

    	return $this->format($result);
    }

}
