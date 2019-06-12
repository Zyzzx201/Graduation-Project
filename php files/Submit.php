<?php
require_once("dataset.php");
$submit = new dataset();
//$submit->$u_id = $_POST['u_id'];
//$submit->$image = $_POST['image'];
//$submit->$Address =$_POST['Address'];
//$submit->$result_id = $_POST['result_id'];
//$submit->$name = $_POST['name'];

$submit->insert($_POST['u_id'],$_POST['image'],$_POST['Address'],$_POST['name']);
// $command = escapeshellcmd('C:/Users/MAC/PycharmProjects/detect_light/light.py');
// $output = shell_exec($command);
//echo $output;
//exec("python light.py lightDet()",$my_output);
////var_dump($my_output);
//echo implode("|",$my_output);
//$arg1=exec("/usr/bin/python light.py /tmp");
//$arg1_arr=json_decode($arg1);
//echo $arg1;

//function execInBackground($cmd) { 
//    if (substr(php_uname(), 0, 7) == "Windows"){ 
//        pclose(popen("start /B ". $cmd, "r"));  
//    } 
//    else { 
//        exec($cmd . " > /dev/null &");   
//    }
//}
//
//$arg1=execInBackground(' del C:/Users/MAC/PycharmProjects/detect_light/light.py');
//echo $arg1;
//if (exec('echo TEST') == 'TEST')
//{
//    echo 'exec works!';
//}

?>
