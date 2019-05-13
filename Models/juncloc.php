<?php
require_once("db.php");
class junloc{
    public $id;
    public $json;

    public function insert(){
        $DBobject = new DB();
        $sql = "INSERT INTO junloc (json) VALUES ('".$this->json."')";
        echo $sql;
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    public function select(){
        $DBobject = new DB();
        $sql = "SELECT * FROM junloc";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        while ($row = mysqli_fetch_array($result)){
            echo $row['json'];
        }
        $DBobject->disconnect();
    }
    public function delete(){
        $DBobject = new DB();
        $sql = "DELETE FROM junloc";
        $DBobject->connect();
        $result = $DBobject->execute($sql);
        $DBobject->disconnect();
    }
}
?>