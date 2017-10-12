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

<h2 align="center">
	<?php
include_once "../model/model.php";

if (isset($_POST["name"]) && isset($_POST["password"]) && $_POST["name"] != "" 
	&& $_POST["password"] != "" && $_POST["duty"] != "" && $_POST["number"] != "") 
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `admin` WHERE name = ?");
	$action -> execute(array($_POST["name"]));
	$result = $action -> fetchAll();
	if (count($result)) 
	{
		echo "该用户已是管理员!";
	}
	else
	{
		$action1 = $connect -> prepare("INSERT INTO `admin`(`name`, `password`, `duty`, `number`, `root`) VALUES (?,?,?,?,0)");
		$result = $action1 -> execute(array($_POST["name"], md5($_POST["password"]), $_POST["duty"], $_POST["number"]));
		if ($result) 
		{
			header("location:../addmanager.php");
		}	
	}
	
}
else
{
	echo "请填写完整信息！";
}
?>
<a href="../addmanager.php">返回</a>
</h2>

</body>
</html>