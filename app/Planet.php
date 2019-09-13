<?php

namespace App;

class Planet extends Starwars
{
    
    public function __contruct()
    {
    	parent::__construct();
    }

	public function format($homeworld)
	{
		$homeworld = $homeworld[0];
		$result = (object)[];
		$result->name = $homeworld->name;
		$result->population= $homeworld->population;
		$result->climate =$homeworld->climate;
		return $result;
	}

}
