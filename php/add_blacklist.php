<?php
session_start();
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>管理员审核表</title>
  
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/check.css">

</head>
<body>

 <p><div id = "line6"></div></p>

<h1 align="center"><strong>申请结果</strong></h1>

<h2 align="center">该用户已是管理员!



<?php
if (!$_SESSION["status"]) {
	header("location:../managerlogin.php");
}
//echo $_POST["name"];
include_once "../model/model.php";
include_once "../model/pile.php";

if (isset($_POST["name"])) {	
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();

	$action = $connect -> prepare("SELECT * FROM `blacklist` WHERE name = ?");
	$action -> execute(array($_POST["name"]));
	$result = $action -> fetchAll();
	if (count($result)) {
		//var_dump($result);
		//var_dump($_POST["name"]);
		//var_dump(count($result));
		echo "该用户已在黑名单！";
		if ($_SESSION["admin"]) {
	echo "<a href = '../addmanager.php'>返回</a>";
}
else
	echo "<a href = '../blacklist.php'>返回</a>";
	}
	else
	{


	$action = $connect -> prepare("INSERT INTO `blacklist`(`name`) VALUES (?)");
	$result = $action -> execute(array($_POST["name"]));
	if ($result) {
		
			if ($_SESSION["admin"]) {
			header("location:../addmanager.php");
			}
			else
			header("location:../blacklist.php");
		
		}
	}

}
?>
</h2>

</body>
</html>