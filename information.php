<?php
session_start();
if (!$_SESSION["status"]) 
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
div#chart{width: 70%;margin: auto;}
</style>
<style type="text/css">


div#form1{width:50%; margin: auto;}
div#button{margin-top:20px;
          
    }

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
      <li><a href="check.php"><h4>首页</h4></a></li>
      <li><a href="history.php"><h4>查看审核记录</h4></a></li>
      <li><a href="information.php"><h4>个人信息更改</h4></a></li>
      <li><a href="blacklist.php"><h4>黑名单</h4></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="php/logout.php"><h4>退出</h4></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->

</div></div>
</nav>
</br>
</br>
<div id="form1">
 
  <br><br><br><br><br><br>


 <form role = "form" action = "" name="form1"method = "POST">
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 原账号：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="原账号"name="name">
    </div>
  </div><br><br><br>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 原密码：</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="原密码"name="password">
    </div>
  </div><br><br>



     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 新账号：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="新账号"name="newname">
    </div>
  </div><br><br>

     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 新密码：</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="新密码"name="newpwd">
    </div>
  </div><br><br>
      <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 联系方式：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="联系方式"name="number">
    </div>
  </div><br><br>

  <div class="row">
    <div class="col-xs-3 col-md-offset-5" id="chart1">
      <button type = "submit" class="btn btn-primary" id="bu">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" class="btn btn-primary">重置</button><br><br>
    </div>
</div>
</form>
</div>
<script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="js/information.js"></script>
  </body>   
  </html>