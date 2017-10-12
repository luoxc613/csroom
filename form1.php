<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>位子申请表</title>
  
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/form1.css">

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
      <li><a href="aboutus.php"><h4>关于我们</h4></a></li>
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

<form class="form-horizontal" name="form1"role="form" action="" method="post" id="form1">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 项目名称：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="act" placeholder="你的项目名称"name="activity">
    </div>
  </div><br>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 负责人：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lea" placeholder="负责人名字"name="leader">
    </div>
  </div><br>
  
   
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 电话号码：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="num" placeholder="电话号码 至少一个" name="number">
    </div>
  </div><br>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 起始时间:</label>
    <div class="col-sm-10">
      <div class="row">
        <div class="col-md-4">
      <input type="text" class="form-control" id="fy" placeholder="年份 "name="from_year">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" id="fm" placeholder="月份 "name="from_month">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" id="fd" placeholder="日期 "name="from_day">
    </div>
    </div>
    </div>
  </div><br>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">结束时间: </label>
    <div class="col-sm-10">
       <div class="row">
        <div class="col-md-4">
      <input type="text" class="form-control" id="ty" placeholder="年份 "name="to_year">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" id="tm" placeholder="月份 "name="to_month">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" id="td" placeholder="日期 "name="to_day">
    </div>
    </div>
    </div>
  </div><br>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 总人数：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sm" placeholder="项目总人数" name="sum_member" >
    </div></div><br>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 位子数：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="su" placeholder="申请位子数" name="sum"onblur="addName()" >
    </div>
  </div><br>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 成员名字：</label>
    <div class="col-sm-10"id="name">
      <input type="text" class="form-control" id="1" placeholder="使用人姓名" name="1" >
    </div>
  </div><br>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">补充说明: </label>
    <div class="col-sm-10">
      <input type="textarea" class="form-control" id="det" placeholder="需要另外说明的"name="detail">
    </div>
  </div>
  <div id="but">
  <button type="submit" class="btn btn-success"  id="button">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="reset" class="btn btn-primary">重置</button>
</div>
</div>
<script type="text/javascript"  src="js/form1.js"></script>
 <script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
   

</body>



  