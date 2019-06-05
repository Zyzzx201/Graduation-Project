<?php
require "dbconnect.php";
$id = "5";

$sql = "SELECT `image` FROM `dataset` WHERE `id` like '$id';";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            echo   $row['image'] ;
        }        
    }
else
{
    echo "failed" ;
}
?>