<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "activity1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(!is_null($_POST[FirstName]) && $_POST[FirstName] != ""){
    if(!is_null($_POST[LastName])&& $_POST[LastName] != "")
    {
        $sql = "INSERT INTO users (FIRST_NAME, LAST_NAME)
        VALUES ('$_POST[FirstName]', '$_POST[LastName]')";
    }
    else
    {
        echo " The Last Name is a required field and cannot be blank.";
    }
}
else
{
    echo "The First name is a required field and cannot be blank.";
}


if ($conn->query($sql) == TRUE) {
  echo "New record created successfully";
} 


$conn->close();
?>