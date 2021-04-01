<?php
function getAllUsers()
{
    require_once 'myfuncs.php';
    $conn = dbConnect();
    $sql = "SELECT id, FIRST_NAME, LAST_NAME FROM users";
    $result = $conn->query($sql);
    
    $users = array();
    $index = 0;
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc())
        {
             $users[$index] = array($row[id] ,$row[FIRST_NAME], $row[LAST_NAME]);
             ++$index;
        }
    } else{
        echo "No Results";
    }
    return $users;
}

function getUsersByFirstName($search)
{
	require_once 'myfuncs.php';
	$conn = dbConnect();
	$sql = "SELECT * FROM users WHERE FIRST_NAME Like '%$search%'";
	$result = $conn->query($sql);
	
	$users = array();
	$index = 0;
	if($result->num_rows > 0){
		
		while($row = $result->fetch_assoc())
		{
			$users[$index] = array($row[ID] ,$row[FIRST_NAME], $row[LAST_NAME]);
			++$index;
		}
	} else{
		echo "No Results";
	}
	return $users;
}
?>