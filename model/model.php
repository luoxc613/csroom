<?php
/**
* 连接数据库		
*/	
class CONNECT 
{
	const 	dsn = "mysql:dbname=csroom;host=localhost";

	const 	user = "root";

	const 	password = "123456";

	const  	charset = "UTF8";

	function connecttodb()
	{
		$obj = new PDO(self::dsn, self::user, self::password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		return $obj;
	}
}

/**
* 查询空位及分配空位
*/		
class REQUEST
{
	public $status;
	public $check;

	public function __construct()
	{
		$this -> status = array(1=>0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$this -> check = false;
	}
	//查询某一时间段占用位置的数量
	public function site_rest($start, $end)	
	{	
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
			$this -> status[$result[$i][0]] = 1;	
		}
		$this -> check = true;
		return $num;
	}

	public function site_distribute($id)
	{
		if ($this -> check) 
		{
			//$rest = array();
			$counter = 0;
			for ($i=1; $i <= 24; $i++) 
			{
				if ($this -> status[$i]) 
				{
					continue;
				}
				else
				{
					$rest[$counter] = $i;
					$counter ++;
				}
			}
			/*
			foreach ($this -> status as $key => $value) 
			{
				echo $key." => ".$value."<br>";		
			}*/
			//var_dump($rest);
			/*
			foreach ($rest as $key => $value) 
			{
				echo $key." => ".$value."<br>";	
			}
			echo "<br><br>";
			*/


			$connect = new CONNECT();
			$connect = $connect -> connecttodb();
			$action = $connect -> prepare("SELECT `activity`, `sum`, `time_from`, `time_to` FROM `apply_site` WHERE id = ?");
			$action ->execute(array($id));
			$result = $action -> fetchAll();
			$action1 = $connect -> prepare("SELECT `member` FROM `team_member` WHERE id = ? AND have_site = 1");
			$action1 -> execute(array($id));
			$name = $action1 -> fetchAll();
			//var_dump($name);

			//var_dump($result);
			//echo "<br>";
			//var_dump($name);
			//var_dump($result[0][1]);
			//echo "<br>distribution<br>";
			shuffle($rest);
			$distribution = array_slice($rest, 0, $result[0][1]);
			/*foreach ($distribution as $key => $value) 
			{
				echo $key." => ".$value."<br>";	
			}
			echo "<br><br><br><br>";*/
			$connect = new CONNECT();
			$connect = $connect -> connecttodb();
			$action2 = $connect -> prepare("INSERT INTO `site_distribution`(`site`, `activity`, `name`, `time_from`, `time_to`) VALUES (?,?,?,?,?)");
			if (!$action2) {
				echo "\nPDO::errorInfo():\n";
    			print_r($connect->errorInfo());
			}
			for ($i=0; $i < $result[0][1]; $i++) 
			{ 
				/*
				try {
				$status_insert = $action2 -> execute(array($distribution[$i], $result[0][0], $name[0][$i], $result[0][2], $result[0][3]));		
				} catch (Exception $e) {
					echo 'Caught exception: '.$e->getMessage()."<br>";
				}*/

				$status_insert = $action2 -> execute(array($distribution[$i], $result[0][0], $name[$i][0], $result[0][2], $result[0][3]));		
				if (!$status_insert) {
					//echo "456";
					echo "\nPDO::errorInfo():\n";
    				print_r($action2->errorInfo());		
				}
				//var_dump($action2);
				//echo "<br>$status_insert<br>";
				//var_dump($status_insert);
				//var_dump($name[0][$i]);
				//var_dump($name);
				//echo "<br><br><br><br>";
			}
			if ($status_insert) 
			{
				return "ok";
			}
		}
	}

}



/**
* 查询是否有可用的会议室及处理对会议室的请求
*/		
class MEETING
{
	const error = -4;
	const refuse = -3;
	const full = -2;
	const submitted = -1;
	const waitting = 0;
	const ok = 1;
	
	//对会议室的申请做初步筛选
	public function check($name, $date, $time, $detail)
	{
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("SELECT * FROM `blacklist` WHERE name = ?");
		$action -> execute(array($name));
		$resultofname = $action -> fetchAll();
		if (count($resultofname)) 
		{
			return MEETING::refuse; 
		}
		$action1 = $connect -> prepare("SELECT * FROM `apply_meeting_room` WHERE `date` = ? AND `time` = ?");
		$action1 -> execute(array($date, $time));
		$result = $action1 -> fetchAll();
		if (count($result)) 
		{
			if ($result[0][1] == $name) 
			{	
				return MEETING::submitted;
			}
			else
			{
				
				return MEETING::full;
			}
			
		}
		else 
		{
			$action2 = $connect -> prepare("INSERT INTO `apply_meeting_room`(`leader`, `date`, `time`, `detail`, `status`) VALUES (?,?,?,?,0)");
			$resultofinsert = $action2 -> execute(array($name, $date, $time, $detail));
			if ($resultofinsert) 
			{
				return MEETING::waitting;
			}
			else
			{

				var_dump($resultofinsert);
				if (!$resultofinsert) {
					echo "\nPDO::errorInfo():\n";
    				print_r($action2->errorInfo());		
				}
				echo "233333333333";
				return;
			}
			
		}
			
	}

	//检查某时刻是否有空的会议室
	public function is_valiable($date, $time)
	{
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("SELECT * FROM `apply_meeting_room` WHERE `date` = ? AND `time` = ? AND status = 1");
		$action -> execute(array($date, $time));
		$result = $action -> fetchAll();
		if (count($result)) 
			return false;
		else
			return true;
	}

	//提供管理员管理会议室申请的函数
	public function review_meeting_room($id, $status)
	{
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("SELECT * FROM `apply_meeting_room` WHERE id = ? AND status = 0");
		$action -> execute(array($id));
		$result = $action -> fetchAll();
		//var_dump($result);
		if ($this -> is_valiable($result[0][2], $result[0][3]) || $status === -1) 
		{
			$action1 = $connect -> prepare("UPDATE `apply_meeting_room` SET `status`= ? WHERE id = ?");
			$resultofreview = $action1 -> execute(array($status, $id));
			if ($resultofreview) 
				return MEETING::ok;
			else
				return MEETING::error;
		}
		elseif ($status === 1) 
		{
			return MEETING::full;
		}
	}
}

/**
* 刷夜		
*/	
class NIGHT
{
	const error = -3;
	const refuse = -2;
	const submitted = -1;
	const waitting = 0;
	const ok = 1;

	//申请刷夜
	public function check($name, $date, $detail)
	{
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("SELECT * FROM `site_distribution` WHERE time_from <= ? AND time_to >= ? AND name = ?");
		$action -> execute(array($date, $date, $name));
		$result = $action -> fetchAll();
		if (count($result))
		{
			$connect = new CONNECT();
			$connect = $connect -> connecttodb();
			$action2 = $connect -> prepare("SELECT * FROM `night` WHERE name = ? AND date = ?");	
			$action2 -> execute(array($name, $date));
			$resultofconfigure = $action2 ->fetchAll();
			if (count($resultofconfigure)) 
			{
				return NIGHT::submitted;
			}
			$action1 = $connect -> prepare("INSERT INTO `night`(`name`, `site`, `date`, `detail`, `status`) VALUES (?,?,?,?,0)");
			$resultofinsert = $action1 ->execute(array($name, $result[0][0], $date, $detail));
			if ($resultofinsert) 
			{
				return NIGHT::waitting;
			}
			else
			{
				var_dump($resultofinsert);
				return NIGHT::error;
			}
			
		}
		else
		{
			return NIGHT::refuse;
		}
	}

	//管理员处理刷夜请求
	public function review_night($name, $date, $status)
	{
		//$now = date("Y-n-j");
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		//$action = $connect -> prepare("SELECT * FROM `night` WHERE name = ? AND date = ? AND date >= ?");
		//$action -> execute(array($name, $date, $now));
		//$result = $action -> fetchAll();
		//return $result;
		$action = $connect -> prepare("UPDATE `night` SET `status`= ? WHERE name = ? AND `date` = ?");
		$result = $action -> execute(array($status, $name, $date));
		if ($result === true) 
		{
			return NIGHT::ok;
		}
	}
}

/**
* 
*/
class MANAGE
{
	public function list_manager()
	{
		$connect = new CONNECT();
		$connect = $connect -> connecttodb();
		$action = $connect -> prepare("SELECT * FROM `admin` WHERE root = 0");
		$action -> execute();
		$result = $action -> fetchAll();
		return $result;	
	}
}
?>