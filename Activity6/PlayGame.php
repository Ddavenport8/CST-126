<?php
require_once 'SuperHero.php';
require_once 'Batman.php';
require_once 'Superman.php';
$superman = new Superman();
$batman = new Batman();

echo "Superman has joined the fight with " . $superman->getHeatlh() . " hp <br>";
echo "Batman has joined the fight with " . $batman->getHeatlh() . " hp <br>";
while(!$superman->isDead() && !$batman->isDead())
{
	$superman->Attack($batman);
	if(!$batman->isDead())
	{
		$batman->Attack($superman);
	}
}
if($superman->isDead())
{
	echo "Superman has died. Batman wins with " . $batman->getHeatlh() . " health remaining";
}
else 
{
	echo "Batman has died. Superman wins with " . $superman->getHeatlh() . " health remaining";
}