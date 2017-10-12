<?php

function prompt_jump($str=null, $url=null){
    if($str != null){
        echo '<script language="javascript">alert("'.$str.'");</script>';
    }
    if($url == "back"){
        echo '<script language="javascript">history.back();</script>';
    }else if($url != ""){
        echo '<script language="javascript">location.href="'.$url.'";</script>';
    }
    return true;
}

//获取位置申请情况
function review()
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$time = date("Y-n-j");
	$action = $connect -> prepare("SELECT * FROM apply_site WHERE status = 0 AND time_from >= ?");
	$action -> execute(array($time));
	$result = $action -> fetchAll();
	$num = count($result);
	//var_dump($result);
	//var_dump($time);
	//var_dump($num);
	return $result;
}


//
function check($id, $status)
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("UPDATE `apply_site` SET `status` = ? WHERE id = ?");
	$resultofcheck = $action -> execute(array($status, $id));
	if ($status === 1) 
	{
		$action1 = $connect -> prepare("UPDATE `team_member` SET `have_site`= 1 WHERE id = ? and have_site != -1");
		$resultofadd = $action1 -> execute(array($id));
		//var_dump($resultofadd);
		if (!$resultofadd) {
			echo "PDO::errorInfo";
			print_r($action1->errorInfo());
		}
	}
	else
	{
		$action1 = $connect -> prepare("UPDATE `team_member` SET `have_site`= 0 WHERE id = 22 and have_site != -1");
		$action1 -> execute(array($id));	
	}
	//var_dump($status);
	return $resultofcheck;
}


//获取会议室申请情况
function review_room()
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$time = date("Y-n-j");
	$action = $connect -> prepare("SELECT * FROM apply_meeting_room WHERE status = 0 AND date >= ?");
	$action -> execute(array($time));
	$result = $action -> fetchAll();
	return $result;
}


//获取刷夜申请情况
function select_record_night()
{
	$now = date("Y-n-j");
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `night` WHERE date >= ? AND status = 0");
	$configure = $action -> execute(array($now));
	$result = $action -> fetchAll();
	return $result;
}

//获取近期项目情况
function select_record_activity()
{
	$now = date("Y-n-j");
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `apply_site` WHERE time_to >= ? AND status = 1");
	$action -> execute(array($now));
	$record = $action -> fetchAll();
	return $record;
}


//获取项目成员
function get_member($id)
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `team_member` WHERE id = ?");
	$action -> execute(array($id));
	$record = $action -> fetchAll();
	return $record;
}

//获取最近位置分配情况
function select_record_site()
{
	$now = date("Y-n-j");
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `site_distribution` WHERE time_from <= ? AND time_to >= ?");
	$action -> execute(array($now, $now));
	$record = $action -> fetchAll();
	return $record;
}


//获取最近会议室使用情况
function select_record_meeting_room()
{
	$now = date("Y-n-j");
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `apply_meeting_room` WHERE status = 1 AND date >= ?");
	$action -> execute(array($now));
	$record = $action -> fetchAll();
	return $record;
}

//获取位置审核历史记录
function history_site()
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `apply_site` WHERE status = -1 OR status = 1");
	$action ->execute();
	$record = $action -> fetchAll();
	return $record;
}

function history_meeting_room()
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `apply_meeting_room` WHERE status = -1 OR status = 1");
	$action -> execute();
	$record = $action -> fetchAll();
	return $record;	
}


function history_night()
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `night` WHERE status = -1 OR status = 1");
	$action -> execute();
	$record = $action -> fetchAll();
	return $record;	
}

function blacklist()
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `blacklist`");
	$action -> execute();
	$record = $action -> fetchAll();
	return $record;	
}
//var_dump(check(22,1));

//获取近期公告内容
function history_content()
{
	$connect = new CONNECT();
	$connect = $connect -> connecttodb();
	$action = $connect -> prepare("SELECT * FROM `detail_of_csroom`");
	$action -> execute();
	$record = $action -> fetchAll();
	return $record;	
}

?>