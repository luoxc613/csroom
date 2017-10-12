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

div#chart{width:100%; margin: auto;}


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
      <li><a href="?.php"><h4>关于我们</h4></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="managerlogin.php"><h4>管理员入口</h4></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
    
</div>
  </div>
</nav>
</br>
</br>






<body>
<div class="container">

</br></br></br>
<div id="chart1">
  <br><br><br>
  <div class="btn-group-vertical">
    <button class="btn btn-success" type="button">系统菜单</button>
    <a href="index1.php" class="btn btn-default" type="button">a.近期活动一览表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href="seat.php" class="btn btn-default" type="button">b.近期位子使用情况&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href="meetingroom.php" class="btn btn-default" type="button">c.近期会议室使用情况&nbsp;</a>
  </div>
</div>

<div id="chart2">
<div id="chart" >
  
  <p align="center">
    <h2><p class="text-center"><strong>&nbsp;近期位子使用情况&nbsp;</strong></p></h2>
           
        

 <div >           
<table class="table table-bordered ">
  <tr> 
    <th width="12" text-align="center">座位号</th>
    <th width="10%">姓名</th>
    <th width="63%">项目</th>
    <th width="15%">到期时间</th>
   
  </tr>
<?php   $record = select_record_site();
        $num = count($record);
        //var_dump($record[1][0]);
        //var_dump($num);
        for ($i=1; $i <= 24; $i++) {
            $flag = 0; 
            for ($j=0; $j < $num; $j++) { 
                if ($record[$j][0] == $i) {
                  $flag = 1;
                  $loca = $j;
                  break;
                }
            }
            //global $loca;
            //echo $flag, $j;
            //var_dump($loca);
            
            if ($flag) {
              echo "<tr class='tdbg'><td align='center' rowspan='1'>".$record[$loca][0]."</td>
              <td>".$record[$loca][2]."</td><td>".$record[$loca][1]."</td><td>".$record[$loca][4]."</td></tr>";
            }
            else
            {
              echo "<tr class='tdbg'><td align='center' rowspan='1'>".$i."</td><td> </td><td> </td><td> </td></tr>";
            }
        }
        ?>
  
</table></p></div>

</div></div>



 <script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/jquery-ui.js"></script>
<body>



</script>
</body>
</html>

