<?php
require_once("register1.php");
$exec = new user();
$exec->$username=$_POST['username'];
$exec->$password=$_POST['password'];
$exec->$email=$_POST['email'];
$exec->insert($_POST['username'],$_POST['password'],$_POST['email']);
?>