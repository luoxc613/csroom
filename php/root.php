<?php
session_start();
include_once "../model/model.php";
include_once "../model/pile.php";
include_once "../public/layout_top.php";
if (!(isset($_SESSION["admin"]) && $_SESSION["admin"]))
{
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf8">
	<title>root</title>
</head>
<body>
<table>
	<?php 	$record = review();
			$num = count($record);
			for ($i=0; $i < $num; $i++) { 
				echo 
"<tr><td>项目名称 ".$record[$i][1]." </td><td>负责人 ".$record[$i][2]." 
</td><td>联系方式 ".$record[$i][3]." </td><td>项目人数 ".$record[$i][4]." </td><td>申请位置数 ".$record[$i][5]." 
</td><td>开始时间 ".$record[$i][6]." </td><td>结束时间 ".$record[$i][7]." </td><td>提交时间 ".$record[$i][8]."
</td><td>备注 ".$record[$i][9]."</td><td>
<form action='check.php' method='POST'><select name='check'><option value='1'>同意</option><option value='-1'>拒绝</option>
</select><input type='hidden' name='index' value='".$record[$i][0]."'><input type='submit' value='submit'></form></td></tr>";
	}?>
</table>
<br><br><br><br>
<table>
	<?php 	$record1 = review_room();
			$num1 = count($record1);
			for ($i=0; $i < $num1; $i++) { 
				echo 
"<tr><td>负责人".$record1[$i][1]."</td><td>日期".$record1[$i][2]."
</td><td>时间".$record1[$i][3]."</td><td>理由".$record1[$i][4]."</td><td>
<form action='review_room.php' method='POST'><select name='check'><option value='1'>同意</option><option value='-1'>拒绝</option>
</select><input type='hidden' name='index' value='".$record1[$i][0]."'><input type='submit' value='submit'></form></td></tr>" ;	
			}
							
?>
</table>
<table>
<tr><td>姓名</td><td>位置</td><td>时间</td><td>备注</td><td>操作</td></tr>
<?php 	$record2 = select_record_night();
		$num2 = count($record2);
		for ($i=0; $i < $num2; $i++) { 
			echo 
"<tr><td>".$record2[$i][0]."</td><td>".$record2[$i][1]."</td><td>".$record2[$i][2]."</td><td>".$record2[$i][3]."</td><td>
<form action='review_night.php' method='POST'><select name='check'><option value='1'>同意</option><option value='-1'>拒绝</option>
</select><input type='hidden' name='name' value='".$record2[$i][0]."'><input type='hidden' name='date' value='".$record2[$i][2]."'>
<input type='submit' value='submit'></form></td></tr>";
		}?>
</table>
<br>
<a href="manager_list.php">manage manager</a>
</body>
</html>
