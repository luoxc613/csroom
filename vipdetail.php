<?php
session_start();
if (!$_SESSION["admin"]) 
{
  header("location:managerlogin.php");
}
include_once "model/model.php";
include_once "model/pile.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>修改公告</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<style>

div#main{padding: 0 15px;}
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
     <li><a href="vipcheck.php"><h4>首页</h4></a></li>
      <li><a href="addmanager.php"><h4>管理员及黑名单管理</h4></a></li>
       <li><a href="viphistory.php"><h4>查看审核记录</h4></a></li>
      <li><a href="vipinformation.php"><h4>个人信息更改</h4></a></li>
      <li><a href="vipdetail.php"><h4>修改公告</h4></a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="php/logout.php"><h4>退出</h4></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
    
</div>
  </div>
</nav>

	
		<br><br><br><br><br><br>
		<div class = "row">
			<div class = "col-md-4 col-md-offset-4">

				<h2><p class="text-center"><strong>&nbsp;修改公告&nbsp;</strong></p></h2>
				
				<form action = "php/detail.php" method = "POST" role = "form">
					
					 <div class="form-group">
					 	<label for="input1">内容</label>
					<textarea id = "input1" class = "form-control" rows = "5" name = "content"><?php
				$record = history_content();
				echo $record[0][0];
					?></textarea>
					</div>

					<div class = "form-group">
						<label for = "input2">电话</label>
					<input id = "input2" class="form-control" type = "text" name = "phone" value = "<?php
				echo $record[0][1];
					?>">
					</div>
					<div class = "form-group">
						<label for = "input3">邮箱</label>
					<input id = "input3" class="form-control" type = "text"  name = "mail" value = "<?php
				echo $record[0][2];
					?>"></div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type = "submit" class="btn btn-primary">确定</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        			<button type="reset" class="btn btn-primary">重置</button>
				</form>

			</div>
		</div>
	</div>



	<script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</body>
</html>