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
//include_once "../public/layout_top.php";
if (isset($_POST["check"])) 
{
	if($_POST["check"] == 1)
	{
		check($_POST["index"], $_POST["check"]);
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("SELECT * FROM apply_site WHERE id = ?");
		$action -> execute(array($_POST["index"]));
		$result = $action -> fetchAll();
		if (count($result)) 
		{
			//var_dump($result);
			//var_dump($_POST["index"]);
			$distribute = new REQUEST();
			$num = $distribute -> site_rest($result[0][6], $result[0][7]);
			if((24 - $num) >= $result[0][5])
			{
				//echo "ok";
				if ($distribute -> site_distribute($_POST["index"]) === "ok") 
				{
					if ($_SESSION["admin"]) {
						header("location:../vipcheck.php");
					}
					else
						header("location:../check.php");
				};
			}
			else
			{
				echo "位置不足！";
			}
		}
		else
		{
			echo "系统错误";
		}
	}
	else
	{
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("UPDATE `apply_site` SET `status`= -1 WHERE id = ?");
		$result = $action -> execute(array($_POST["index"]));
		if ($result) 
		{
			//echo "操作成功！";	
			if ($_SESSION["admin"]) {
				header("location:../vipcheck.php");
			}
			else
				header("location:../check.php");
		}
	}
}
//var_dump($_POST["check"]);
//var_dump($_POST["index"]);
//var_dump(check($_POST["index"], $_POST["check"]));
if ($_SESSION["admin"]) {
	echo "<a href = '../vipcheck.php'>返回</a>";
}
else
	echo "<a href = '../check.php'>返回</a>";

?>
</h2>

</body>
</html>