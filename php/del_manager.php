<?php
include_once "../model/model.php";
include_once "../model/pile.php";


if (isset($_POST["name"])) 
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("DELETE FROM `admin` WHERE name = ?");
	$result = $action -> execute(array($_POST["name"]));
	if ($result) 
	{
		header("location:../addmanager.php");
	}
}
?>