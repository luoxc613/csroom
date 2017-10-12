<?php
session_start();
if (!$_SESSION["admin"]) 
{
  header("location:../managerlogin.php");
}
include_once "../model/model.php";
include_once "../model/pile.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>处理结果</title>
  
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/check.css">

</head>
<body>
  <p><div id = "line6"></div></p>

<h1 align="center"><strong>处理结果</strong></h1>

<h2 align="center">
<?php

if (isset($_POST["content"]) && $_POST["content"] != "" && $_POST["phone"] != "" 
	&& $_POST["mail"] != "") 
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("UPDATE `detail_of_csroom` SET `content`=?,`phone`=?,`mail`=?");
	$result = $action -> execute(array($_POST["content"], $_POST["phone"], $_POST["mail"]));
	if ($result) {
		echo "操作成功！<a href='../vipcheck.php'>返回</a>";
	}
	else
	{
		echo "操作失败！<a href='../vipdetail.php'>返回</a>";
	}
}
else
{
	echo "请填写完整信息！<a href='../vipdetail.php'>返回</a>";
}
?>
</h2>

</body>
</html>