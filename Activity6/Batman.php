<?php
require_once('SuperHero.php');
class Batman extends SuperHero
{
	public function Batman()
	{
		$name = "Batman";
		$this->setHealth(rand(1,1000));
	}
}

