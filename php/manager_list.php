<?php
include_once "../model/model.php";
include_once "../model/pile.php";
include_once "../public/layout_top.php";

session_start();
if (!$_SESSION["admin"]) 
{
	header("location:../login.php");
}
?>
<table>
	<tr><td>name</td><td>duty</td><td>number</td><td>manage</td></tr>
<?php 	$manage = new MANAGE();
		$record = $manage -> list_manager();
		$num = count($record);
		for ($i=0; $i < $num; $i++) { 
			echo "<tr><td>".$record[$i][0]."</td><td>".$record[$i][2]."</td><td>".$record[$i][3]."</td>
			<td><form action='del_manager.php' method='POST'><input name = 'name' type='hidden' value='".$record[$i][0]."'>
			<input type='submit' value='delete'></form></td></tr>";
		}
		?>
</table>
<br>add manager<br>
<form action = "add_manager.php" method = "POST">
	name 	<input type = "text" name = "name"><br>
	duty	<input tyoe = "text" name = "duty"><br>
	phonenumber<input type = "text" name = "number"><br>
	initial password <input type = "text" name = "password"><br>
	<input type = "submit" value = "submit">
</form>
<a href="root.php">review</a>
</body>
</html>