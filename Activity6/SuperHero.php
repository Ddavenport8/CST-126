<?php

class SuperHero
{
	Private $name;
	Private $health;
	Private $isDead = false;
	
	public function Constructor()
	{
		$name = "Default";
		$health = 0;
	}
	
	public function Attack(SuperHero $Oppenent)
	{
		$Oppenent->setHealth($Oppenent->DetermineHealth(rand(1,10)));
	}
	
	public function DetermineHealth($Damage)
	{
		$this->setHealth($this->health-$Damage);
		if($this->health <=0)
		{
			$this->setHealth(0);
			$this->isDead = true;
		}
		else 
		{
			echo $this->name . " took " . $Damage . " points of damage, and now has " . $this->health . " health left <br>";
		}
	}
	
	public function isDead()
	{
		return $this->isDead;
	}
	public function getHeatlh()
	{
		return $this->health;
	}
	public function setHealth($newHealth)
	{
		$health = $newHealth;
	}
	public function setName($NewName)
	{
		$this->name = $NewName;
	}
}

