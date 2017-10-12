<?php 
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
div#chart1{width: 14%; float: left; }
div#chart2{width:84%;float:right;}


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
      <li><a href="index1.php"><h4>首页</h4></a></li>
      <li><a href="form1.php"><h4>位子申请</h4></a></li>
      <li><a href="form2.php"><h4>刷夜申请</h4></a></li>
      <li><a href="form3.php"><h4>会议室申请</h4></a></li>
      <li><a href="aboutus.php"><h4>关于我们</h4></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="managerlogin.php"><h4>管理员入口</h4></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
    
</div>
  </div>
</nav>
</br></br></br>
</br>
<body>
   

            

<div class="container">


<br>
<div id="chart1">
  <br><br><br>
  <div class="btn-group-vertical">
    <button class="btn btn-success" type="button">系统菜单</button>
    <a href="index1.php" class="btn btn-default" type="button">a.近期项目一览表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href="seat.php" class="btn btn-default" type="button">b.近期位子使用情况&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href="meetingroom.php" class="btn btn-default" type="button">c.近期会议室使用情况</a>
  </div>
</div>

  




<div id="chart2">
  <h2><p class="text-center"><strong>近期项目一览表</strong></p></h2>

<table class="table table-bordered ">
    <tr>
    <th width="20" text-align="center">项目名称</th>
    <th width="54%">成员</th>
    <th width="13%">开始时间</th>
    <th width="13%">结束时间</th></tr>
    <?php $record = select_record_activity();
          $num = count($record);
          for ($i=0; $i < $num; $i++) { 
            $result = get_member($record[$i][0]);
            $sumofresult = count($result);
            $str = "";
            for ($j=0; $j < $sumofresult; $j++) { 
                $str = $str." ".$result[$j][1];
            }
            echo "<tr><td align='center'>".$record[$i][1]."</td><td>".$str."</td><td align='center'>".$record[$i][6]."
            </td><td align='center'>".$record[$i][7]."</td></tr>";
          }
          ?>
  </table>
</div2>
</div>

</br></br></br> 


 <script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/jquery-ui.js"></script>

</body>
</html>