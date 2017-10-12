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
<title>计算机学院项目申请系统</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">

<style type="text/css">

div#chart{width:100%; margin: auto;}
div#chart1{width:70%;margin: auto;}


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
</br></br></br>
</br>



<div class="container">
</br>
<div id="chart" >
  
  <p align="center">
    <h3><p class="text-center"><strong>&nbsp;位子审核记录&nbsp;</strong></p></h3>
           
        

 <div>           
<table class="table table-bordered ">
  <tr> 
    <th width="20%" >项目名称</th>
    <th width="8%">负责人</th>
    <th width="10%">联系方式</th>
    <th width="10%">项目人数</th>
    <th width="8%" >位子数</th>
    <th width="12%">开始时间</th>
    <th width="12%">结束时间</th>
    <th width="12%">提交时间</th>
    <th width="8">操作</th>
   
  </tr>
 <?php
  $record = history_site();
  $num = count($record);
  for ($i=0; $i < $num ; $i++) {
  if ($record[$i][10] == 1) 
      $str = "已同意";
    else
      $str = "已拒绝";
    echo "<tr class='tdbg'><td align='center'>".$record[$i][1]."</td><td>".$record[$i][2]."</td><td>".$record[$i][3]."</td>
    <td>".$record[$i][4]."</td><td>".$record[$i][5]."</td><td>".$record[$i][6]."</td><td>".$record[$i][7]."</td><td>
  ".$record[$i][8]." </td><td>".$str."</td></tr>";
  }
?>
  </table></div>
  <br>


    
  
  <p align="center">
    <h3><p class="text-center"><strong>&nbsp;刷夜审核记录&nbsp;</strong></p></h3>
 <div id="chart1" >           
<table class="table table-bordered ">
  <tr> 
    
    <th width="15%">申请人</th>
    <th width="8%" >位置</th>
    <th width="20%">日期</th>
    <th width="40%">备注</th>
    <th width="17">操作</th>
<?php
$record1 = history_night();
$num1 = count($record1);
for ($i=0; $i < $num1; $i++) { 
    if ($record1[$i][4] == 1) {
      $str1 = "已同意";
    }
    else
      $str1 = "已拒绝";
    echo "<tr class='tdbg'><td align='center'>".$record1[$i][0]."</td><td>".$record1[$i][1]."</td>
    <td>".$record1[$i][2]."</td><td>".$record1[$i][3]."</td><td>".$str1."</td></tr>";
}
?>
  </table></div>

<br>
   <p align="center">
    <h3><p class="text-center"><strong>&nbsp;会议室审核记录&nbsp;</strong></p></h3>
 <div id="chart1" >           
<table class="table table-bordered ">
  <tr> 
    
    <th width="15%">负责人</th>
    <th width="10%" >时间段</th>
    <th width="20%">日期</th>
    <th width="40%">备注</th>
    <th width="15">操作</th>
  </tr>
<?php
$record2 = history_meeting_room();
$num2 = count($record2);
for ($i=0; $i < $num2; $i++) { 
  if ($record2[$i][5] == 1) 
    $str2 = "已同意";
  else
    $str2 = "已拒绝";
  echo "<tr class='tdbg'><td align='center'>".$record2[$i][1]."</td><td>".$record2[$i][3]."</td><td>".$record2[$i][2]."
  </td><td>".$record2[$i][4]."</td><td>".$str2."</td></tr>";
}
?> 
  </table>
</div>

</div>
</body>
</html>