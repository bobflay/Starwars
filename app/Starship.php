<?php

namespace App;

class Starship extends Starwars
{
    public function __construct()
    {
    	parent::__construct();
    }

    public function format($starships)
    {
    	$result = [];
    	foreach($starships as $starship)
    	{
    		array_push($result, $this->formtStarship($starship));
    	}

    	if(empty($result))
    	{
    		return '-';
    	}

    	return $result;
    }



    public function formtStarship($starship)
    {
    	$result = (object)[];
    	$result->name = $starship->name;
    	$result->model = $starship->model;
    	$result->class = $starship->starship_class;
    	$result->hyperdrive_rating=$starship->hyperdrive_rating;
    	$result->cost_in_credits=$starship->cost_in_credits;
    	$result->manufacturer=$starship->manufacturer;

    	return $result;
    }


}
