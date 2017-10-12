
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>管理员审核表</title>
  
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/check.css">

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
      <li><a href="../index1.php"><h4>首页</h4></a></li>
      <li><a href="../form1.php"><h4>位子申请</h4></a></li>
      <li><a href="../form2.php"><h4>刷夜申请</h4></a></li>
      <li><a href="../form3.php"><h4>会议室申请</h4></a></li>
      <li><a href="about.php"><h4>关于我们</h4></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
    
</div>
  </div>
</div>
</nav>
</br>
</br><br><br><br><br><br>
<p><div id = "line6"></div></p>

<h1 align="center"><strong>申请结果</strong></h1>

<h2 align="center">
<?php

/*session_start();
	$name1 = "陈章玉";
	echo strtotime("now"). "\n";
	echo strtotime("10 September 2000"). "\n";
	echo strtotime("+1 day"). "\n";
	echo strtotime("+1 week"). "\n";
	echo strtotime("+1 week 2 days 4 hours 2 seconds"). "\n";
	echo strtotime("next Thursday"). "\n";
	echo strtotime("last Monday"). "\n";
	echo date("Y-m-d", strtotime("2011-W17-6")) . "\n";
	$zero1=date('y-m-d h:i:s');
$zero2="2010-11-29 21:07:00";
echo "zero1的时间为:".$zero1."<br>";
echo "zero2的时间为:".$zero2."<br>";
if(strtotime($zero1)<strtotime($zero2)){
 echo 'zero1早于zero2';
}else{
 echo 'zero2早于zero1';
}

$start_time = '7:00';
 
// 定义结束时间，千万别问我下午六点为何写成十八点，我会建议你重读小学
$end_time  = '18:00';
 
// 获取现在时间段，date()函数的使用我就不废话了，不明白的直接看以往文章或者google
$now_time  = date('H:i');
 
// 判断
if( strtotime($start_time) <= strtotime($now_time) && strtotime($end_time) >= strtotime($now_time) ){
     echo '我要发布信息啦！';
}else{
     echo '大哥，现在才几点啊～～～人家都还没睡醒呢！！！';
}
echo $now_time;
echo $_SESSION["name"]."<br>";
echo $_SESSION["status"]."<br>";
echo $_SESSION["admin"];
*/

include_once "../model/model.php";
include_once "../public/layout_top.php";
function apply($start, $end)
{
	/*
	$status = array(1=>0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	//var_dump($status);
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT distinct site FROM `site_distribution` WHERE (time_from <= ? AND time_to >= ?) OR (time_from <= ? AND time_to >= ?) OR (time_from >= ? AND time_to <= ?)");

	//$action = $connect -> prepare("SELECT * FROM `site_distribution`");
	$action -> execute(array($start, $start, $end, $end, $start, $end));
	$result = $action -> fetchAll();
	//var_dump($result);
	$num = count($result);
	for ($i=0; $i < $num; $i++) 
	{ 
		$status[$result[$i][0]] = 1;	
	}
	//var_dump($status);
	*/
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM apply_site WHERE activity = ? AND leader = ? AND time_from = ? AND time_to = ?");
	$action -> execute(array($_POST["activity"], $_POST["leader"], $start, $end));
	$result = $action ->fetchAll();
	if (count($result)) 
	{
		echo "该项目在同一时间段重复申请！";
		return;
	}
	$request = new REQUEST();	
	$num = $request -> site_rest($start, $end);
	//echo $num;
	//echo "string";
	if((24 - $num) >= $_POST["sum"]) 
	{
			//echo "ok";
			$connect = new CONNECT();
			$connect = $connect -> connecttodb();
			$action = $connect -> prepare("SELECT * FROM `blacklist`");
			$action -> execute();
			$result = $action -> fetchAll();
			//var_dump($result);
			//echo $_POST["1"];
			//for ($i=1; $i <= $_POST["sum"]; $i++) { 
			//		echo $_POST["$i"];
			//}
			$sumofblacklist = count($result);
			for ($j=1; $j <= $_POST["sum"]; $j++) 
			{ 
				for ($i=0; $i < $sumofblacklist; $i++) 
				{ 
					if ($result[0][$i] == $_POST["$j"]) 
					{
						echo "抱歉，第".$j."位成员在黑名单中";
						return;
					}
				}
			}
			$connect = new CONNECT();
			$connect = $connect -> connecttodb();
			$action = $connect -> prepare("INSERT INTO `apply_site`(`activity`, `leader`, `number`, `sum_member`, `sum`, `time_from`, `time_to`, `apply_time`, `detail`, `status`) VALUES (?,?,?,?,?,?,?,?,?,0)");
			$resultofinsert = $action -> execute(array($_POST["activity"], $_POST["leader"], $_POST["number"], $_POST["sum_member"], $_POST["sum"],$start, $end, date("Y-n-j H:i:s"), $_POST["detail"]));
			$action1 = $connect -> prepare("SELECT `id` FROM `apply_site` WHERE activity = ? AND leader = ? AND time_from = ? AND time_to = ?");
			$action1 -> execute(array($_POST["activity"], $_POST["leader"], $start, $end));
			$resultofid = $action1 -> fetchAll();
			//var_dump($resultofid);
			//echo "!!!!!!!!!!!!!!!!!!!!!!";
			if (isset($_POST["others"]) && $_POST["others"] != "") 
			{
				$action1 = $connect -> prepare("INSERT INTO `team_member`(`id`, `member`, `have_site`) VALUES (?,?,-1)");
				$action1 -> execute(array($resultofid[0][0], $_POST["others"]));	
			}
			//var_dump($_POST["others"]);
			$action2 = $connect -> prepare("INSERT INTO `team_member`(`id`, `member`, `have_site`) VALUES (?,?,1)");
			for ($i=1; $i <= $_POST["sum"]; $i++) 
			{ 
				$resultofinsert = $action2 -> execute(array($resultofid[0][0], $_POST["$i"]));
				//var_dump($_POST["$i"]);
				//var_dump($resultofinsert);
			}
			//$action1 = $connect -> prepare();
			if ($resultofinsert) 
			{
				echo "$num site have been taken <br>申请成功，请管理员审核……";
				return;
			}
			else
			{
				if (!$resultofinsert) {
					echo "\nPDO::errorInfo():\n";
    				print_r($action2->errorInfo());		
				}
				//var_dump($resultofinsert);
				//var_dump(array($_POST["activity"], $_POST["leader"], $_POST["number"], $_POST["sum_member"], $_POST["sum"], $start, $end, date("Y-n-j H:i:s"), $_POST["detail"]));
			}
	}
	else
	{
		echo "很抱歉，位置不足！";
	}
}

if (isset($_POST["from_year"]) && $_POST["from_year"] != "" && $_POST["from_month"] != "" 
	&& $_POST["from_day"] != "" && $_POST["to_year"] != "" && $_POST["to_month"] != "" 
	&& $_POST["to_day"] != "" && $_POST["activity"] != "" && $_POST["leader"] != ""
	 && $_POST["number"] != "" && $_POST["sum_member"] != "" && $_POST["sum"] != "") 
{
	if ($_POST["sum_member"] >= $_POST["sum"]) 
	{
		if (is_numeric($_POST["from_year"]) && is_numeric($_POST["from_month"]) && is_numeric($_POST["from_day"])
		&& is_numeric($_POST["to_year"]) && is_numeric($_POST["to_month"]) && is_numeric($_POST["to_day"]))
		{
			$start = $_POST["from_year"]."-".$_POST["from_month"]."-".$_POST["from_day"];
			$end = $_POST["to_year"]."-".$_POST["to_month"]."-".$_POST["to_day"];
			if (checkdate($_POST["from_month"], $_POST["from_day"], $_POST["from_year"]) && checkdate($_POST["to_month"], $_POST["to_day"], $_POST["to_year"])) 
			{
				$now = date("Y-n-j");
				if ($start >= $now) 
				{
					if (strtotime($start) <= strtotime($end)) 
					{
						apply($start, $end);
					}
					else
					{
						echo "起始时间不能大于终止时间！";
					}	# code...
				}
				else
				{
					echo "申请时间有误！";
				}
				//echo "ok";
				//apply($start, $end);
			}
			else
			{
				echo "时间格式有误！";
			}
		}
		else
			echo "时间格式有误！";
		
	}
	else
		echo "您不能申请大于项目总人数的位置数！";
		

}
else
{
	echo "请填写完整信息！";
}

//var_dump($start);
//var_dump($end);

?>
<a href="../form1.php">返回</a></h2>
</div>
</div>
</body>
</html>