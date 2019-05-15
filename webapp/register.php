<?php
require "dbconnect.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql_query = "INSERT INTO `user`( `username`, `password`, `email`)
VALUES ('$username', '$password','$email') "; 

if($con->query($sql_query)===true)
{
    echo " data insert success";
}
else
{
    echo "error inserting" .mysqli_error($con);
}
$con->close();
?>
