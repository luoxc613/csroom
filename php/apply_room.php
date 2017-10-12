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
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
<div class = "row">
  <div class = "col-md-10 col-md-offset-1">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    </div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="../index1.php"><h4>首页</h4></a></li>
      <li><a href="../form1.php"><h4>位子申请</h4></a></li>
      <li><a href="../form2.php"><h4>刷夜申请</h4></a></li>
      <li><a href="../form3.php"><h4>会议室申请</h4></a></li>
      <li><a href="about.php"><h4>关于我们</h4></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
    
</div>
  </div>
</div>
</nav>
</br>
</br><br><br><br><br><br>
<p><div id = "line6"></div></p>

<h1 align="center"><strong>申请结果</strong></h1>

<h2 align="center">
<?php
include_once "../model/model.php";
include_once "../model/pile.php";
include_once "../public/layout_top.php";
//function applyroom()
if (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["year"] != "" && $_POST["month"] != ""
	 && $_POST["day"] != "" && $_POST["time"] != "") 
{
	//$date = date("Y-n-j");
if (is_numeric($_POST["month"]) && is_numeric($_POST["year"]) && is_numeric($_POST["day"])) {
	if (checkdate($_POST["month"], $_POST["day"], $_POST["year"])) 
	{
		if ($_POST["time"] === "上午" || $_POST["time"] === "下午" ||$_POST["time"] === "晚上") {
				$date = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
				//echo $date."<br>";
				if (strtotime($date) > strtotime(date("Y-n-j"))) 
				{
					$meeting_request = new MEETING();
					$requestofroom = $meeting_request -> check($_POST["name"], $date, $_POST["time"], $_POST["detail"]);
					//var_dump($requestofroom);
					switch ($requestofroom) 
					{
						case MEETING::waitting:
							echo "申请已记录，等待管理员审核……";
							//prompt_jump("申请已记录，等待管理员审核……","../apply.php");
							break;
						
						case MEETING::refuse:
							echo "您已被添加至黑名单，不具有申请资格！";
							break;

						case MEETING::submitted:
							echo "您已经提交申请！";
							break;

						case MEETING::full:		
							echo "会议室已被占用！";
							break;
						default:
							echo "something is wrong!";
							break;
					}
				}
				else
				{
					echo "无效的申请时间！";
				}
			}
			else
				echo "无效的使用时间段！";
		
	}
	else
	{
		echo "请检查日期！";
	}
}
else
	echo "日期格式不正确！";
	
		
}
else
{
	echo "请填写完整信息！";
}
?>
<a href="../form3.php">返回</a></h2>
</div>
</div></body>
</html>