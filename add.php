<?php
session_start();
if (!$_SESSION["admin"]) 
{
  header("location:managerlogin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>计算机学院项目申请系统管理</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">

<style type="text/css">

</style>
</head>


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
</br>
</br>


<body>
<hr color="grey" >

<h3><p class="text-center"><strong>&nbsp;添加管理员&nbsp;</strong></p></h3>

<div class = "row">
  <div class = "col-md-4 col-md-offset-4">
<form role="form" action = "" id="form1" name="form1" method = "POST">
  <div class="form-group">
    <label for="exampleInputEmail1">管理员用户名：</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="用户名" name = "name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">管理员密码：</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="密码" name = "password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">管理员身份：</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name = "duty">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">管理员联系方式：</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name = "number">
  </div>

  <button type="submit" class="btn btn-default"id="bu">确认</button>&nbsp;&nbsp;
  <a href="addmanager.php" class="btn btn-default">取消</a>
</form>
</div>
</div>
<script type="text/javascript"  src="js/add.js"></script>
</body>
</html>