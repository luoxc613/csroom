<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>管理员登录</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">

<style type="text/css">


div#chart{width:60%; margin: auto;}
div#chart1{float: right;}

</style>
</head>

<body>
<hr color="grey" >

<div class="container">
</br></br></br>  
<div id="chart">
<h2><p class="text-center"><strong>&nbsp;管理员登录&nbsp;</strong></p></h2>
<br>
    
   
    <div class="row" align="center">
    <div class="col-xs-6 col-md-offset-3">
    <input type = "text" id = "name" class="form-control" placeholder="用户名"></div></div><br/>
    <div class="row">
    <div class="col-xs-6 col-md-offset-3">

    <input type = "password" id = "password"  class="form-control" placeholder="密码"></div></div><br>
    <div class="row">
    <div class="col-xs-6 col-md-offset-3" id="chart1">
     
     <button id = "submit" class="btn btn-primary">登录</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" class="btn btn-primary">重置</button><br/><br/>
    </div>
</div>
<br>




  
   

    <script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
  $("button#submit").click(function(){
    var value1 = $("#name").val();
    var value2 = $("#password").val();
    $.post("php/login.php",
    {
      name:value1,
      password:value2
    },
    function(data,status){
      if (data == 1) alert("账号不能为空！")
        else if(data == 2) alert("密码不能为空！")
            else if(data == 3) alert("密码错误！")
                else if(data == 4) alert("没有该用户！")
                    else if (data == 5) location.href="vipcheck.php"
                        else location.href="check.php";
                
    });
  });
});</script>
    
<body>



</script>
</body>
</html>