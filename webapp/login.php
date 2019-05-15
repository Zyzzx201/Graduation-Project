<?php
require "dbconnect.php";


$username = $_POST["username"];
$password = $_POST["password"];
// $username = "andrew";
// $password = "123";


$sql = "SELECT id FROM user WHERE username like '$username' and password like '$password';";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            echo   $row['id'] ;
        }        
   }
else
{
    echo "failed" ;
}

?>