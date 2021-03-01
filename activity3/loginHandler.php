<?php
include 'myfuncs.php';
$conn = dbConnect();
$loginAttempts = 0;
$maxAttempts = 5;

    /*try{
    $conn = new mysqli($servername, $username, $password);
    $sql = "CREATE DATABASE activity2";
    echo "Database created successfully";
 
    }catch (PDOException $e)
    {
        echo "Error creating database: " . $conn->error;
        die("Connection failed: " . $conn->connect_error);
    }*/

/*$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $sql = "CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FIRSTNAME VARCHAR(100),
    LASTNAME VARCHAR(100),
    USERNAME VARCHAR(50),
    PASSWORD VARCHAR(50)
        
)";
    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
    }
    else {
        echo "Error creating table: " . $conn->error;
    }
}*/
if(!is_null($_POST[Username])&& $_POST[Username] != "")
{
    if(!is_null($_POST[Password])&& $_POST[Password] != "")
    {
        $username = $_POST[Username]; 
        $password = $_POST[Password];
        $loginAttempts++;
        
        $sql = "SELECT id FROM users WHERE USERNAME = '$username' and PASSWORD = '$password'";
        $result = $conn->query($sql);
        
        try {
        
            if($loginAttempts < $maxAttempts)
            {
                if($result->num_rows == 1)
                {
                    $row = $result->fetch_assoc();	// Read the Row from the Query
                    saveUserId($row["ID"]);		// Save User ID in the Session
                    include('loginResponse.php');
                    $loginAttempts=0;
                }
                else if($result->num_rows == 0)
                {
                    $message = "Connection Failed, wrong username or password";
                    include('loginFailed.php');
                    
                }
                else if($result->num_rows > 2)
                {
                    echo "There are multple users registered with those credentials";
                }
            }
            else
            {
                echo "Max attemps reached";
            
            }
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }else
    {
        echo "The password field is required and cannot be left blank";
    }
}else
{
 echo "The Username field is required and cannot be left blank";   
}

$conn->close();
?>
