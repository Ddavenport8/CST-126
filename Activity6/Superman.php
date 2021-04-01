<?php
require_once('SuperHero.php');
class Superman extends SuperHero
{
	public function Superman()
	{
		$name = "Superman";
		$this->setHealth(rand(1,1000));
	}
}