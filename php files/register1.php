<?php
require "db.php";
class user{
    public $id;
    public $username;
    public $password;
    public $email;


    public function insert($name,$pass,$mail)
    {
        $DBobject = new DB();
        $sql = "INSERT INTO user (username, password, email) 
        VALUES ('".$name."','".$pass."','".$mail."')";
        $DBobject->connect();
        $DBobject->execute($sql);
        $DBobject->disconnect();
    }
    
}
?>