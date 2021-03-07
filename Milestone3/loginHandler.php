<?php
include('myfuncs.php');
$conn = dbConnect();
$loginAttempts = 0;
$maxAttempts = 5;
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
                    saveUserId($row["id"]);		// Save User ID in the Session
                    include('loginResponse.php');
                    include('myfuncs');
                    echo "<br> Good word Blog Post: <br>";
                    $BadBlogPost = "The profain word is jerk";
                    $GoodBlogPost = "This has no profain words in it";
                    //If no bad words, then post the string
                    if(languageFilter(strtolower($GoodBlogPost)))
                    {
                        echo $GoodBlogPost;
                    }
                    //otherwise, prevent the string from being posted
                    else
                    {
                        echo "Please use appropriate words";
                    }
                    echo "<br> Bad Word Blog Post <br>";
                    if(languageFilter(strtolower($BadBlogPost)))
                    {
                        echo $BadBlogPost;
                    }
                    else{
                        echo "Please use appropriate words";
                    }
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
