<?php
session_start();
include_once "../model/model.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>管理员审核表</title>
  
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/check.css">
<style type="text/css">
#main{
padding: 0 15px;}</style>



</style>
</head>
<body>
  <div id = "main">
</br>
</br><br><br><br><br><br>
 <p><div id = "line6"></div></p>

<h1 align="center"><strong>处理结果</strong></h1>

<h2 align="center">
<?php

if ($_SESSION["status"]) 
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("select * from admin where name = ?");
	$action -> execute(array($_POST["name"]));
	$result = $action -> fetchAll();
	if (count($result)) 
	{
		if ($result[0][1] == md5($_POST["password"])) 
		{
			
			$action1 = $connect -> prepare("UPDATE `admin` SET `name`= ?,`password`= ?,`number`= ? WHERE name = ?");
			$result1 = $action1 -> execute(array($_POST["newname"], md5($_POST["newpwd"]),  $_POST["number"], $_POST["name"]));
			if ($result1) {
				echo "修改成功！";
				if ($_SESSION["admin"]) {
				echo "<a href = '../vipcheck.php'>返回</a>";
				}
				else
					echo "<a href = '../check.php'>返回</a>";
				
				}
		}
		else
		{
			echo "密码错误！";
			if ($_SESSION["admin"]) {
			echo "<a href = '../vipinfomation.php'>返回</a>";
			}
			else
				echo "<a href = '../infomation.php'>返回</a>";

		}
	}
	else
	{
		echo "用户名错误！";
		if ($_SESSION["admin"]) {
			echo "<a href = '../vipinfomation.php'>返回</a>";
		}
		else
			echo "<a href = '../infomation.php'>返回</a>";
	
	}
}
	
?>

</div>
</div></body>
</html>