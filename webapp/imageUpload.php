<?php
require "dbconnect.php";

$u_id = $_POST['u_id'];
$image = $_POST['image'];
$Address =$_POST['Address'];
$result_id = "0";
$name = "nice";

$sql_query = "INSERT INTO dataset (`u_id`, `image`, `Address`, `result_id`, `name`) 
VALUES ('$u_id','$image' , '$Address' , '$result_id' , '$name') "; 

if($con->query($sql_query)===true)
{
    echo "<h3> data insert success";
    echo "succesfully";
}
else
{
    echo "error inserting" .mysqli_error($con);
    echo $sql_query;
}

?>
