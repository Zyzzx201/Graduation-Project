<?php
require "db.php";
class junloc{
    public $id;
    public $json;


    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO user (username, password, email) 
        VALUES ('".$this->username."','".$this->password."','".$this->email."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }

//$id = "14";
public function select(){
    $seconds = 7;
    $DBobject = new DB();
    $sql = "SELECT * FROM `junloc` ";
    $sql1 ="DELETE FROM `junloc` ";
    $DBobject->connect();
    $result = $DBobject->execute($sql);
    while ($row = mysqli_fetch_array($result)){
        echo $row['json'];
    }
    sleep($seconds);
    $DBobject->execute($sql1);
    $DBobject->disconnect();
    
}
}

?>
