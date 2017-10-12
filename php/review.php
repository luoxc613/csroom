<?php
session_start();
$status = false;
if (isset($_SESSION["status"]) && $_SESSION["status"]) 
{
	echo "hello manager!";
}
elseif(isset($_SESSION["admin"]) && $_SESSION["admin"])
{
	header("location:root.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>review</title>
</head>
<body>

</body>
</html>
