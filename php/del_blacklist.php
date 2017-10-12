<?php
session_start();
include_once "../model/model.php";
include_once "../model/pile.php";
if (!$_SESSION["status"]) {
	header("location:../managerlogin.php");
}
//echo $_POST["name"];


if (isset($_POST["name"])) {	
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("DELETE FROM `blacklist` WHERE name = ?");
	$result = $action -> execute(array($_POST["name"]));
	if ($result) {
		if ($_SESSION["admin"]) {
			header("location:../addmanager.php");	
		}
		else
		header("location:../blacklist.php");
	}

}
?>