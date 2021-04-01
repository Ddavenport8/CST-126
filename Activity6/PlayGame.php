<?php
require_once 'SuperHero.php';
require_once 'Batman.php.php';
require_once 'Superman.php';
$superman = new Superman();
$batman = new Batman();

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
	echo "Superman has died. Batman wins with" . $batman->getHeatlh(); 
}
else 
{
	echo "Batman has died. Superman wins with" . $superman->getHeatlh();
}