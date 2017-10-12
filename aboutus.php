<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>关于我们</title>
  
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
<style>
div#line6{width: 100%;height: 200px;margin:0 auto}

div#main{padding: 0 15px;}
</style>
</head>

<body>
   
   
<br><br><br><br><br><br>
<div id = "main">
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
<p><h2 class = "text-center">公告</h2></p>
<p>
<?php
include_once "model/model.php";
include_once "model/pile.php";
$record = history_content();
echo $record[0][0];
?>
</p>
<br>
<p class = "text-left text-primary">管理员联系方式：<?php echo $record[0][1];?></p>
<p class = "text-left text-primary">邮箱：<?php echo $record[0][2];?></p>
 <p class = "text-left text-primary">华中科技大学计算机学院科技创新基地</p>
 <p class = "text-left text-primary">技术支持：华中科技大学腾讯创新俱乐部</p> 
</div>
</div>

<p><div id="line6"></div></p>
  



</div>
 </body>
</html>