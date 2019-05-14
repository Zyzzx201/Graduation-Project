<?php
require_once("juncloc.php");
/**
 * Created by PhpStorm.
 * User: tofee
 * Date: 5/9/2019
 * Time: 9:39 PM
 */
//echo $_POST['JSON'];
$location = new junloc();
$location->json = $_POST['JSON'];
$location->insert();

//$text = str_replace(array("\n", "\r"), '', $_POST['JSON']);
//$text = preg_replace("/\r|\n/", "", $_POST['JSON']);
//$location->json = $text;
//echo "This is my text";
//echo $text;
//$manage = json_encode($_POST['JSON'],JSON_FORCE_OBJECT);
//echo "THis is MANAGE";
//echo $manage;