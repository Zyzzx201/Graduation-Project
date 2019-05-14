<?php
require_once("db.php");
class junloc{
    public $id;
    public $json;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "gp";

    public function insert(){
//        $DBobject = new DB();
//        $sql = "INSERT INTO junloc (json) VALUES ('".$this->json."')";
//        //echo $sql;
//        $DBobject->connect();
//        $DBobject->execute($sql);
//        $DBobject->disconnect();
//        $stmt = $DBobject->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
//        $stmt->bind_param("s", $json);
        $con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // prepare and bind
        $stmt = $con->prepare("INSERT INTO junloc (json) VALUES (?)");

        $stmt->bind_param("s", $json);
        $json = $this->json;
        $stmt->execute();
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