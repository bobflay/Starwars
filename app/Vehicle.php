<?php

namespace App;

class Vehicle extends Starwars
{

	public function __construct()
	{
		parent::__construct();
	}


	public function format($vehicles)
	{
		$result = [];
		foreach ($vehicles as $vehicle) {
			array_push($result, $this->formatVehicle($vehicle));
		}

		if(empty($result))
		{
			return '-';
		}

		return $result;
	}

	public function formatVehicle($vehicle)
	{
		$result = (object)[];
    	$result->name = $vehicle->name;
    	$result->model=$vehicle->model;
    	$result->cost_in_credits=$vehicle->cost_in_credits;

    	return $result;
	}
}
