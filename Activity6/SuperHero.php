<?php

class SuperHero
{
	Private $name;
	Private $health;
	Private $isDead = false;
	
	public function SuperHero()
	{
		$this->name = "Default";
		$this->health = 0;
	}
	
	public function Attack(SuperHero $Oppenent)
	{
		$Oppenent->DetermineHealth(rand(1,10));
	}
	
	public function DetermineHealth($Damage)
	{
		$this->setHealth($this->health-$Damage);
		if($this->health <=0)
		{
			$this->setHealth(0);
			$this->isDead = true;
		}
		echo $this->name . " took " . $Damage . " points of damage, and now has " . $this->health . " health left <br>";
		
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
		$this->health = $newHealth;
	}
	public function setName($NewName)
	{
		$this->name = $NewName;
	}
}

