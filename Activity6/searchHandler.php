<?php
$searchPattern = $_POST['Search'];
echo "Search Term: " . $searchPattern . "<br>";
require_once 'myfuncs.php';
require_once 'utility.php';
$users = getUsersByFirstName($searchPattern);
if($users != null)
{
	require_once '_displayUsers.php';
}
?>