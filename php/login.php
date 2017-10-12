<?php
include_once "../model/model.php";

function login($name,$password)
{
	if (isset($name) && isset($password)) 
	{
		if($name === "")
		{
			echo "1";
			return;
		}
		elseif ($password === "") 
		{
			echo "2";
			return;
		}
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("select * from admin where name = ? ");
		$action -> execute(array($name));
		$result = $action -> fetchAll();
		//var_dump($result);	
		$num = count($result);
		if ($num) 
		{
			if ($result[0][1] === md5($password)) 
			{
				//echo "ok";
				session_start();
				$_SESSION["name"] = $name;
				$_SESSION["status"] = true;
				$action = $connect -> prepare("select root from admin where name = ?");
				$action -> execute(array($name));
				$result = $action -> fetchAll();
				if ($result[0][0]) 
				{
					$_SESSION["admin"] = true;
					echo "5";
					//header("location:../vipcheck.php");
				}
				else
				{
					$_SESSION["admin"] = false;
					echo "6";
					//header("location:../check.php");
				}
			}
			else
			{
				echo "3";
			}
			
		}
		else
		{
			echo "4";
		}
	}
	else
	{
		echo "wrong";
		return;
	}
}




login($_POST["name"], $_POST["password"]);
//cppassword($_POST["current"], $_POST["newpwd"]);
//echo $_SESSION["name"];


?>