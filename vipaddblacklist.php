<?php
session_start();
if (!$_SESSION["admin"]) {
  header("location:managerlogin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>计算机学院项目申请系统</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">

<style type="text/css">

div#form1{width:70%; margin: auto;}



</style>
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
</br></br></br>
</br>
<div id="inner">
<div id="form1">
 <form action="" name="form1"    method="POST" id="form1" >
  <br><br><br><br><br><br>


 
    
   
   <div class = "row">
  <div class = "col-md-4 col-md-offset-4">

  <div class="form-group">
    <label for="exampleInputEmail1">姓名：</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="姓名" name = 'name'>
  </div>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" id="bu"class="btn btn-default">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</form>
<a href="addmanager.php" class="btn btn-default">取消</a>


  <script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/jquery-ui.js"></script>
<script type="text/javascript"  src="js/vipaddblacklist.js"></script>




</body>
</html>

