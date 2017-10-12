<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
<form action = "php/apply.php" method = "POST">
activity<input type = "text" name = "activity"><br>
leader<input type = "text" name = "leader"><br>
phonenumber<input type = "text" name = "number"><br>
sum_member<input type = "text" name = "sum_member"><br>
sum<input type = "text" name = "sum"><br>
1<input type = "text" name = "1">
2<input type = "text" name = "2">
3<input type = "text" name = "3">
others<input type = "text" name = "others"><br>
from<input type = "text" name = "from_year">&nbsp;<input type = "text" name = "from_month">&nbsp;<input type = "text" name = "from_day"><br>
to  <input type = "text" name = "to_year">&nbsp;<input type = "text" name = "to_month">&nbsp;<input type = "text" name = "to_day"><br>
detail<input type = "text" name = "detail"><br>
<input type = "submit" value = "submit">
</form>
<br>
<p>APPLY MEETING_ROOM</p><br>
<form action = "php/apply_room.php" method = "POST">
name<input type = "text" name = "name"><br>
date<input type = "text" name = "year"><input type = "text" name = "month"><input type = "text" name = "day"><br>
time<input type = "text" name = "time"><br>
detail<input type = "text" name = "detail"><br>
<input type = "submit" value = "submit">
</form><br>
<p>APPLY NIGHT</p>
<form action = "php/apply_night.php" method = "POST">
	name<input type = "text" name = "name"><br>
	date<input type = "text" name = "year"><input type = "text" name = "month"><input type = "text" name = "day"><br>
	detail<input type = "text" name = "detail"><br>
	<input type = "submit" value = "submit">
</form>
</body>
</html>