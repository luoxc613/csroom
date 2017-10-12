<?php
session_start();
if (!$_SESSION["status"]) 
{
  header("location:managerlogin.php");
}
include_once "model/model.php";
include_once "model/pile.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>计算机学院项目申请系统管理</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">

<style type="text/css">
div#chart{width: 20%;margin: auto;}
div#f{float: left;}
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

<body>
<div id="container">
  <div id="chart">

</br></br></br>


<div class="f">
  <table class="table table-bordered">
    <h3><p class="text-center"><strong>&nbsp;黑名单&nbsp;
        </strong><a href="addblacklist.php" class="btn btn-default" type="button">添加成员+</a> </td></p></h3>
        <tr>
          <th width="60%">姓名</th></p>
          <th width="40">删除记录</th></p></tr>
          
 <?php
        $record = blacklist();
        $num = count($record);
        for ($i=0; $i < $num; $i++) { 
            echo "<tr ><td align='center'>".$record[$i][0]."</td><td>
            <form action='php/del_blacklist.php' method='POST'><input type='hidden' value='".$record[$i][0]."' name='name'><button class='btn btn-default' type='submit'>删除</button></form></td>
       </tr>";
        }
 ?>        

</table></p></div>

</div></div></div>
</body>
</html>