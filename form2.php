<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>刷夜申请表</title>
	
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/form2.css">

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
<div id="form1">
<form class="form-horizontal" role="form" name="form1" action="" method="POST">
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 姓名：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="申请人名字"name="name">
    </div>
 </div><br>
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> 使用时间:</label>
    <div class="col-sm-10">
      <div class="row">
        <div class="col-md-4">
      <input type="text" class="form-control" id="inputEmail3" placeholder="年份 "name="year">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" id="inputEmail3" placeholder="月份 "name="month">
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" id="inputEmail3" placeholder="日期 "name="day">
    </div>
    </div>
    </div>
  </div><br>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">补充说明: </label>
    <div class="col-sm-10">
      <input type="textarea" class="form-control" id="inputEmail3" placeholder="需要另外说明的"name="detail">
    </div>
  </div><br>
  <div id="but">
  <button type="submit" class="btn btn-success" id="button">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="reset" class="btn btn-primary">重置</button>
</div>
</form>
</div>
  <script type="text/javascript"  src="js/form2.js"></script>
   <script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</body>