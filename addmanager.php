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
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>计算机学院项目申请系统管理</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">

<style type="text/css">
div#chart{width: 75%;margin: auto;}
div#chart1{width: 65%; float: left; }
div#chart2{width:30%;float:right;}

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
<div class="container">
  <div id="chart">

</br></br></br>



  <div id="chart1">
  <table class="table table-bordered">
    <h3><p class="text-center"><strong>&nbsp;管理员信息&nbsp;
        </strong><a href="add.php" class="btn btn-default" type="button">添加管理员 +</a> </p></h3>
        <tr>
          <th width="15%">用户名</th>
          <th width="20%">身份</th>
          <th width="35%">联系方式</th>
          <th width="30%">删除管理员</th>
 <?php   $manage = new MANAGE();
    $record = $manage -> list_manager();
    $num = count($record);
    for ($i=0; $i < $num; $i++) { 
      echo "<tr><td align= 'center'>".$record[$i][0]."</td><td align= 'center'>".$record[$i][2]."</td>
      <td align= 'center'>".$record[$i][3]."</td><td align= 'center'><form action='php/del_manager.php' method='POST'>
      <input name = 'name' type='hidden' value='".$record[$i][0]."'>
      <button class = 'btn btn-default' type = 'submit'>删除</button></form></td></tr>";
    }
?>
    
       
</table></div>




  <div id="chart2">
  <table class="table table-bordered">
    <h3><p class="text-center"><strong>&nbsp;黑名单&nbsp;
        </strong><a href="vipaddblacklist.php" class="btn btn-default" type="button">添加成员+</a> </td></p></h3>

          <th width="50%">姓名</th>
          <th width="50%">删除记录</th>
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

</div></div>



<script type="text/javascript">
function configure (name) {
  var con;
  con = confirm("确认删除？");
  if (con) {
    alert(name);
  };
}
</script>

</body>
</html>



