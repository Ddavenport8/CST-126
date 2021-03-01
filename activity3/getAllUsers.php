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

$sql = "SELECT FIRST_NAME, LAST_NAME FROM users";
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "First Name             Last Name" . "<br>";
    while($row = $result->fetch_assoc())
    {
        echo $row[FIRST_NAME]. " " . $row["LAST_NAME"]. "<br>";
    }
} else{
    echo "No Results";
}


$conn->close();
?>