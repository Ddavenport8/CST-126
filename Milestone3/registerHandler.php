<?php
include 'myfuncs.php';
$conn = dbConnect();
if(!is_null($_POST[FirstName]) && $_POST[FirstName] != ""){
    if(!is_null($_POST[LastName])&& $_POST[LastName] != "")
    {
        if(!is_null($_POST[Username])&& $_POST[Username] != "")
        {
            if(!is_null($_POST[Password])&& $_POST[Password] != "")
            {
                $sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD)
                VALUES ('$_POST[FirstName]', '$_POST[LastName]', '$_POST[Username]', '$_POST[Password]')";
            }else{
                echo " The Password field is required and cannot be blank";
            }
        }else{
            echo " The Username field is required and cannot be blank";
        }
        
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