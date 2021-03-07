<?php
function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "activity2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function saveUserId($id)
{
    session_start();
    $_SESSION["USER_ID"] = $id;  
}
function getUserId()
{
    session_start();
    return $_SESSION["USER_ID"];
}
function languageFilter($text)
{
    $Passed = true;
    //List of bad words
    include_once('ListOfBadWords.php');
    echo array($Badwords);
    $textarray = (explode(" ", $text));
    foreach($textarray as $word)
    {
        //Grab the next word
        foreach($Badwords as $badword)
        {
            echo $badword;
            //Check if it is a bad word
            if($badword == $word)
            {
                
               $Passed = false;
            }
        }
       
    }
    return $Passed;
    
}

?>