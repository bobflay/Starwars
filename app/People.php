<?php

namespace App;

class People extends Starwars
{


	protected $starship;

	public function __construct()
	{
		parent::__construct();
		$this->starship = new Starship();
		$this->vehicle = new Vehicle();
		$this->planet = new Planet();
	}



	public function format($data)
	{
		$result = [];
		foreach ($data->results as $entry) {
			array_push($result,$this->formatPeople($entry));
		}

		return $result;
	}


	public function formatPeople($entry)
	{
		$people = (object)[];
		$people->name = $entry->name;
		$people ->gender = $entry->gender;
		$people->starships = $this->starship->getFromURL($entry->starships);
		$people->vehicles = $this->vehicle->getFromURL($entry->vehicles);
		$people->homeworld = $this->planet->getFromURL($entry->homeworld);

		return $people;
	}




}
