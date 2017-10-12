<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>管理员审核表</title>
  
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/check.css">

</head>
<body>
 
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
</br><br><br><br><br><br><br>
<p><div id = "line6"></div></p>

<h1 align="center"><strong>申请结果</strong></h1>

<h2 align="center">
<?php
include_once "../model/model.php";
include_once "../model/pile.php";
//include_once "../public/layout_top.php";

if (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["year"] != "" && $_POST["month"] != "" 
	&& $_POST["day"] != "") 
{
	$date = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
	$now = date("Y-n-j");
	if (is_numeric($_POST["month"]) && is_numeric($_POST["day"]) && is_numeric($_POST["year"])) {
	if (checkdate($_POST["month"], $_POST["day"], $_POST["year"])) 
	{
		if (strtotime($date) >= strtotime($now)) 
		{
			//echo "123";
			$night = new NIGHT();
			switch ($night -> check($_POST["name"], $date, $_POST["detail"])) 
			{
				case NIGHT::refuse:
					echo "您没有使用权";
					break;
				
				case NIGHT::submitted:
					echo "您已提交申请!";
					break;

				case NIGHT::waitting:
					echo "申请已提交，等待管理员审核……";
					break;

				default:
					echo "system error!";
					break;
			}
		}
		else
			echo "请输入有效时间！";
	}

	}
	
	else
		echo "请输入有效时间！";
}
else
{
	echo "请填写完整信息！";
}

?>
<a href="../form2.php">返回</a></h2>
</div>
</div>
</body>
</html>