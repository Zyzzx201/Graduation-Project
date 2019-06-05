<?php
require "dbconnect.php";

$id = $_POST["id"];

$sql = "SELECT `json` FROM `junloc` WHERE id  like '$id';";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            echo $row['json'] ; 
        }    
   
    }
else
{
    echo "failed" ;
}

?>