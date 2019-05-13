<?php
require_once("juncloc.php");
/**
 * Created by PhpStorm.
 * User: tofee
 * Date: 5/9/2019
 * Time: 9:39 PM
 */

$location = new junloc();
$location->json = $_POST['JSON'];
$location->insert();