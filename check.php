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
<meta charset="utf8">
<title>管理员审核表</title>
  
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
 
  <style type="text/css">
  div#chart1{width: 80%;margin: auto}
  div#chart2{width: 80%;margin: auto}
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
</br><br><br>

<body>
<div class="container">

<h3><p class="text-center"><strong>位子申请审核表</strong></p></h3>
<div >           
<table class="table table-bordered ">


  <tr>
    <th width="20%">项目名称</th>
    <th width="8%">负责人</th>
    <th width="8%">联系方式</th>
    <th width="8%">项目人数</th>
    <th width="9%">申请位置数</th>
    <th width="8%">开始时间</th>
    <th width="8%">结束时间</th>
    <th width="8%">提交时间</th>
    <th width="8%"> 备注</th>
    <th width="15%">操作</th>
  </tr>  
  <?php   $record = review();
      $num = count($record);
      for ($i=0; $i < $num; $i++) { 
        echo 
"<tr><td>".$record[$i][1]." </td><td>".$record[$i][2]."</td><td>".$record[$i][3]." </td>
<td>".$record[$i][4]." </td><td>".$record[$i][5]."</td><td>".$record[$i][6]." </td><td>".$record[$i][7]." </td>
<td>".$record[$i][8]."</td><td>".$record[$i][9]."</td><td><form action='php/check.php' method='POST'>
<select name='check'><option value='1'>同意</option><option value='-1'>拒绝</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' name='index' value='".$record[$i][0]."'>
<button type='submit' value='submit' class='btn btn-default btn-sm'>确认</button></form></td></tr>";
  }?>
</table>
</div>
<br>
<div id="chart1">
<h3><p class="text-center"><strong>刷夜申请审核表</strong></p></h3>
<div >           
<table class="table table-bordered ">
  <tr>
    <th width="15%">负责人</th>
    <th width="10%">位置</th>
    <th width="15%" >日期</th>
    <th width="40%">备注</th>
    <th width="20%">操作</th>
  </tr>  


<?php   $record2 = select_record_night();
    $num2 = count($record2);
    for ($i=0; $i < $num2; $i++) { 
      echo 
"<tr><td>".$record2[$i][0]."</td><td>".$record2[$i][1]."</td><td>".$record2[$i][2]."</td>
<td>".$record2[$i][3]."</td><td><form action='php/review_night.php' method='POST'>
<select name='check'><option value='1'>同意</option><option value='-1'>拒绝</option>
</select><input type='hidden' name='name' value='".$record2[$i][0]."'>
<input type='hidden' name='date' value='".$record2[$i][2]."'>
&nbsp;&nbsp;&nbsp;&nbsp;<button type='submit' value='submit' class='btn btn-default btn-sm'>确认
</button></form></td></tr>";
    }?>


</table>
</div></div><br>

<div id="chart2">
<h3><p class="text-center"><strong>会议室申请审核表</strong></p></h3>
<div >           
<table class="table table-bordered ">
  <tr>
    <th width="15%">负责人</th>
    <th width="10%">时间段</th>
    <th width="15%">日期</th>
    <th width="40%">备注</th>
    <th width="20%">
    操作
  </th>
  </tr>  
 <?php   $record1 = review_room();
      $num1 = count($record1);
      for ($i=0; $i < $num1; $i++) { 
        echo 
"<tr><td>".$record1[$i][1]."</td><td>".$record1[$i][2]."</td><td>".$record1[$i][3]."</td><td>".$record1[$i][4]."</td>
<td><form action='php/review_room.php' method='POST'><select name='check'><option value='1'>同意</option>
<option value='-1'>拒绝</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
<input type='hidden' name='index' value='".$record1[$i][0]."'>
<button type='submit' value='submit' class='btn btn-default btn-sm'>确认</button></form></td></tr>" ; 
      }
              
?>
</table>
</div></div>
</div>


</body>
</html>