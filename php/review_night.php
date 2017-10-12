<?php
session_start();
if (!$_SESSION["status"]) {
	header("location:../managerlogin.php");
}
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
include_once "../model/model.php";
include_once "../model/pile.php";
include_once "../public/layout_top.php";

if (isset($_POST["check"])) 
{
	$night = new NIGHT();
	if($night -> review_night($_POST["name"], $_POST["date"], $_POST["check"]) === NIGHT::ok)
		{
			if ($_SESSION["admin"]) {
						header("location:../vipcheck.php");
					}
					else
						header("location:../check.php");
		}
	else
		echo "操作失败!";
}
if ($_SESSION["admin"]) {
	echo "<a href = '../vipcheck.php'>返回</a>";
}
else
	echo "<a href = '../check.php'>返回</a>";

?>
</h2>

</body>
</html>