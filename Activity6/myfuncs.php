<?php
function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "activity4";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function saveUserId($id)
{
    try {
        session_start();
    $_SESSION["USER_ID"] = $id;
    } catch (Exception $e) {
        echo $e;
    }
      
}
function getUserId()
{
    try {
        session_start();
    return $_SESSION["USER_ID"];
    } catch (Exception $e) {
        echo $e;
    }
    
}

?>