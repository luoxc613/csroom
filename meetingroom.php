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
div#chart2{width:80%;float:right;}

div#chart{width:80%; margin: auto;}

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

<div class="container">
</br></br></br> 
 
<div id="chart"> 
<div id="chart1">
  <br><br><br>
  <div class="btn-group-vertical">
    <button class="btn btn-success" type="button">系统菜单</button>
    <a href="index1.php" class="btn btn-default" type="button">a.近期项目一览表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </a>
    <a href="seat.php" class="btn btn-default" type="button">b.近期位子使用情况&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href="meetingroom.php" class="btn btn-default" type="button">c.近期会议室使用情况</a>
  </div>
</div>

<div id="chart2">

<table class="table table-bordered">
  <h2><p class="text-center"><strong>&nbsp;近期会议室使用情况&nbsp;</strong></p></h2>

  
  <tr>
    <th width="20%">日期</th>
    <th width="20%">时间段</th>
    <th width="40%">姓名</th>
    </tr> 
<?php
    $record = select_record_meeting_room();
    $num = count($record);
    for ($i=0; $i < $num; $i++) { 
            echo "<tr><td align='center'>".$record[$i][2]."</td><td align='center'>".$record[$i][3]."</td>
            <td align='center'>".$record[$i][1]."</td></tr>";
    }
?>
      
<!--
            <tr class="tdbg">
            <td align="center" rowspan="3"></td>
            <td align="center">上午</td>
            <td align="center"></td>
            </tr>
            <tr>
            <td align="center">下午</td>
            <td align="center"></td>
            </tr>
            <tr>
            <td align="center">晚上</td>
            <td align="center"></td>
            </tr>
            <tr class="tdbg">
                            <td align="center" rowspan="3"></td>
                            
                            <td align="center">上午</td>
                            <td align="center"></td>
                             
                        </tr>
                        <tr>
                            <td align="center">下午</td>
                            <td align="center"></td>
                               
                        </tr>
                        <tr>
                            <td align="center">晚上</td>
                            <td align="center"></td>
                            
                        </tr>
                                                <tr class="tdbg">
                            <td align="center" rowspan="3"></td>
                            
                            <td align="center">上午</td>
                            <td align="center"></td>
                           
                        </tr>
                        <tr>
                            <td align="center">下午</td>
                            <td align="center"></td>
                           
                        </tr>
                        <tr>
                            <td align="center">晚上</td>
                            <td align="center">
                          
                        </tr>
                                                <tr class="tdbg">
                            <td align="center" rowspan="3"></td>
                            
                            <td align="center">上午</td>
                            <td align="center">
                             
                        </tr>
                        <tr>
                            <td align="center">下午</td>
                            <td align="center">
                          
                        </tr>
                        <tr>
                            <td align="center">晚上</td>
                            <td align="center">
                                                            </td>
                           
                        </tr>
                                                <tr class="tdbg">
                            <td align="center" rowspan="3"></td>
                            
                            <td align="center">上午</td>
                            <td align="center">
                                                            </td>
                          
                        </tr>
                        <tr>
                            <td align="center">下午</td>
                            <td align="center">
                                                            </td>
                          
                        </tr>
                        <tr>
                            <td align="center">晚上</td>
                            <td align="center">
                                                            </td>
                        
                        </tr>
                                                <tr class="tdbg">
                            <td align="center" rowspan="3"></td>
                            
                            <td align="center">上午</td>
                            <td align="center">
                                                            </td>
                          
                        </tr>
                        <tr>
                            <td align="center">下午</td>
                            <td align="center">
                                                            </td>
                          
                        </tr>
                        <tr>
                            <td align="center">晚上</td>
                            <td align="center">
                                                            </td>
                           
                        </tr>
                                             <tr class="tdbg">
                            <td align="center" rowspan="3"></td>
                            
                            <td align="center">上午</td>
                            <td align="center">
                                                            </td>
                          
                        </tr>
                        <tr>
                            <td align="center">下午</td>
                            <td align="center">
                                                            </td>
                          
                        </tr>
                        <tr>
                            <td align="center">晚上</td>
                            <td align="center">                                                                                                                                                                                                                                                                                                                                             
                                                            </td>
                        
                        </tr>
                    -->
                                        </table>
    </div>
  </div></div>





<script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/jquery-ui.js"></script>

</body>
</html>                                        