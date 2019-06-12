<?php
require "dbconnect.php";

$u_id = $_POST['u_id'];
$image = $_POST['image'];
$Address =$_POST['Address'];
//$result_id =$_POST['result_id'];
$name = "nice";

$sql_query = "INSERT INTO dataset (`u_id`, `image`, `Address`, `name`) 
VALUES ('$u_id','$image' , '$Address', '$name') "; 

if($con->query($sql_query)===true)
{
    echo "<h3> data insert success";
    echo "succesfully";
//    $result=exec("C:/Users/MAC/PycharmProjects/detect_light/light.py");
//    $res_array=json_decode($result);
//    foreach($res_array as $row)
//    {
//        echo $row."<BR>";
//    }
        
}
else
{
    echo "error inserting" .mysqli_error($con);
    echo $sql_query;
}

?>
<?php
//$command = escapeshellcmd('C:/Users/MAC/PycharmProjects/detect_light/light.py');
//$output = shell_exec($command);
//echo $output;
?>