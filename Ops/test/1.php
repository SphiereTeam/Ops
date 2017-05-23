<?php
include("database_connection.php");
/* 

$sql = mysql_query("SELECT * FROM `table 1`",$conn2);

while($row = mysql_fetch_array($sql)){
	//echo $row['COL 1']."   ".$row["COL 2"]."   ".$row["COL 3"]."   ".$row["COL 4"]."   ".$row["COL 5"]."   ".$row["COL 6"]."<br/>";
	
	$year = date("Y",strtotime($row["COL 1"]));
	$month = date("m",strtotime($row["COL 1"]));
	$date = date("Y-m-d",strtotime($row["COL 1"]));
	$time = date("H:i:s",strtotime($row["COL 1"]));
	
	
	$s = mysql_query("select * from usertemp where card_details ='".$row["COL 3"]."'",$conn1);
	$num = mysql_num_rows($s);
	
	if($num != 0)
	{
		$id = mysql_result($s,0,"UserTempId");
	
		
		$test = mysql_query("SELECT * FROM `attendance` WHERE `EmpNo` = '$id' AND `Year` = '$year' AND `Month` LIKE '".sprintf("%'.02d\n", $month)."'",$conn1);
		echo $id."    "."        ".$year."       ".$month;
		$ro = mysql_num_rows($test);
		
		if($ro != 0)
		{
			
		$attendance_id = mysql_result($test,0,"attendance_id");
		echo "   ".$attendance_id."<br/>";
		$search = mysql_query("select * from attendance_details where attendance_id = '$attendance_id' and date = '$date'",$conn1);
			while($row2 = mysql_fetch_array($search)){
				if($row["COL 2"] == "0"){
					
					if($time < "12:00")
					{
						mysql_query("UPDATE `attendance_details` SET `AM_IN` = '$time' WHERE `attendance_details_id` = '".$row2['attendance_details_id']."'",$conn1);
					}
					if($time >= "12:00")
					{
						mysql_query("UPDATE `attendance_details` SET `PM_IN` = '$time' WHERE `attendance_details_id` = '".$row2['attendance_details_id']."'",$conn1);
					}
				}
				if($row["COL 2"] == "1"){
					
					if($time > "14:00")
					{
						mysql_query("UPDATE `attendance_details` SET `PM_OUT` = '$time' WHERE `attendance_details_id` = '".$row2['attendance_details_id']."'",$conn1);
					}
					if($time <= "13:00")
					{
						mysql_query("UPDATE `attendance_details` SET `AM_OUT` = '$time' WHERE `attendance_details_id` = '".$row2['attendance_details_id']."'",$conn1);
					}
				}
			}
		}
		else{
			echo "<br/>";
		}
		
		
		
		
		
	}
	
} */


$sql2 = mysql_query("SELECT * FROM `attendance_details`",$conn1);
while($rows = mysql_fetch_array($sql2)){
	$time_am_in = $rows['AM_IN'];
	$time_am_out = $rows['AM_OUT'];
	$time_pm_in = $rows['PM_IN'];
	$time_pm_out = $rows['PM_OUT'];
	
	if($time_am_in != "00:00:00" && $time_pm_out != "00:00:00"){
		if($time_am_in < 8)
		{
			$time_am_in = "08:00:00";
		}
		if($time_pm_out > "05:15:00"){
			$time_pm_out = "17:15:00";
		}
		
		
		$norm_hrs = strtotime($time_pm_out) - strtotime($time_am_in);
		$total_hrs = ($norm_hrs/(60*60));
		
		mysql_query("update attendance_details set `norm_hrs` = '$total_hrs' where attendance_details_id = '".$rows['attendance_details_id']."'",$conn1);
		
	}
	
}




?>