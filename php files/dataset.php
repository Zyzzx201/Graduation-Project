<?php
require "db.php";
class dataset{
//    public $id;
//    public $u_id;
//    public $image;
//    public $Address;
//    public $result_id;
//    public $name;
    public function insert($us_id,$img,$addres,$name)
    {
//        exec("python traffic.py TrafficDec()",$res_id);
//        var_dump($res_id);
//        $res_id2=implode("|",$res_id);
//        echo $res_id2;
        
        $DBobject = new DB();
        $sql = "INSERT INTO dataset (`u_id`, `image`, `Address`, `name`)  VALUES
        ('".$us_id."','".$img."','".$addres."','".$name."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
//        $arg1=exec("/usr/bin/python light.py /tmp");
//$arg1_arr=json_decode($arg1);
//echo $arg1;
echo'i am here';
        
        exec("python light.py lightDet()",$res_id);
        var_dump($res_id);
        $res_id2=implode("|",$res_id);
        
        exec("python traffic.py TrafficDec()",$res_id3);
        var_dump($res_id3);
        $res_id4=implode("|",$res_id3);
        
        
        

        
//        $command = escapeshellcmd('C:/Users/MAC/PycharmProjects/detect_light/light.py');
//        $output = shell_exec($command);
//        echo $output;
    }
    
    /*
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM dataset WHERE id = '".$this->id."' ";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['id'];
            echo $row['u_id'];
            echo $row['image'];
            echo $row['imagesrclon'];
            echo $row['imagesrclat'];
            echo $row['result_id'];
            echo $row['name'];
        }
        $DBobject->disconnect();
    }
    public function update(){
        $DBobject = new DB();
        $sql = "UPDATE dataset SET result_id='".$this->result_id."' WHERE id = '".$this->id."'";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();

    }
*/
}
?>