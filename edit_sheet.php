<?php
include("nav.php");




   if(isset($_POST['data']) && $_POST['data'] != "")
   {
     $data=$_POST['data'];
     $status=$_POST['status'];
	// echo $data;
	$s = "Select * from attendance where attendance_id = '$data'";
	
	if($run_sql = mysql_query($s))
	{
		$month = mysql_result($run_sql,0,'Month');
		$year = mysql_result($run_sql,0,'Year');
		$month_name =  date('F', mktime(0, 0, 0, $month, 10));
	}
   }
	else{
		?>
		<script>window.location.assign("sheet_submit.php")</script>
		<?php
	}   
	
	if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "submit_sheet"){
	
		$data2 = $_REQUEST["data"];
		$status = $_REQUEST["status"];
		$sql = "SELECT * FROM `usertempapprover` WHERE `UserTempId` = $user_id AND `state` = '1'";
		if($query_run = mysql_query($sql) or die("error")){
			$num_row = mysql_num_rows($query_run);
			$appoverid = mysql_result($query_run,0,'UserTempApproverId');
			$approver1 = mysql_result($query_run,0,'1');
			$approver2 = mysql_result($query_run,0,'2');
			$approver3 = mysql_result($query_run,0,'3');
			$approver4 = mysql_result($query_run,0,'4_hr');
			$approver5 = mysql_result($query_run,0,'5_hr');
			$approver6 = mysql_result($query_run,0,'6_hr');
			if($num_row == "1"){
				
				$esql = mysql_query("select * from attendance_status where attendance_id = '$data2'");
			mysql_query("UPDATE `attendance` SET `status` = '$approver1' WHERE `attendance`.`attendance_id` = $data2");
			
			mysql_query("INSERT INTO `attendance_status` (`att_appr_id`, `attendance_id`, `1`, `1_status`, `1_timestamp`, `1_remarks`, `2`, `2_timestamp`, `2_status`, `2_remarks`, `3`, `3_status`, `3_timestamp`, `3_remarks`, `4_hr`, `4hr_status`, `4hr_timestamp`, `4hr_remarks`, `5_hr`, `5hr_status`, `5hr_timestamp`, `5hr_remarks`, `6_hr`, `6hr_timestamp`, `6hr_status`, `6hr_remarks`, `current_status`, `pointer`) 
			VALUES ('', '$data2', '$approver1', 'pending', '0000-00-00 00:00:00.000000', '',
									'$approver2', '0000-00-00 00:00:00.000000', 'pending', '',
									'$approver3', 'pending', '0000-00-00 00:00:00.000000', '',
									'$approver4', 'pending', '0000-00-00 00:00:00.000000', '', 
									'$approver5', 'pending', '0000-00-00 00:00:00.000000', '',
									'$approver5', '0000-00-00 00:00:00.000000', 'pending', '', '', '$approver1')");
									
			/* mysql_query("INSERT INTO `attendance_status` (`att_appr_id`, `attendance_id`, `1`, `1_status`, `1_timestamp`, `2`, `2_timestamp`, `2_status`, `3`, `3_status`, `3_timestamp`, `4_hr`, `4hr_status`, `4hr_timestamp`, `5_hr`, `5hr_status`, `5hr_timestamp`, `6_hr`, `6hr_timestamp`, `6hr_status`, `current_status`,`pointer`) 
			VALUES ('', '$data2', '$approver1', '', '0000-00-00 00:00:00.000000', 
			'$approver2', '0000-00-00 00:00:00.000000', '', '$approver3', '', '0000-00-00 00:00:00.000000', '$approver4', '', '0000-00-00 00:00:00.000000', '$approver5', '', '0000-00-00 00:00:00.000000', '$approver6', '0000-00-00 00:00:00.000000', '', '', '$approver1');");
			 */
			
				$status = $approver1;
			}
		}
	}
	
	
	
	if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "continue"){
		$data1 = $_REQUEST["data"];
		$status = $_POST["status"];
		echo "here".$data1;
		$sq = "Select * from attendance_details where attendance_id = '$data1'";
		if($run_sql2 = mysql_query($sq))
		{
			while($rows = mysql_fetch_array($run_sql2)){
			$attendance_details_id = $rows["attendance_details_id"];
			$date = $rows["date"];
			$am_in = $_REQUEST[$attendance_details_id."am_in"];
			$am_out = $_REQUEST[$attendance_details_id."am_out"];
			$pm_in = $_REQUEST[$attendance_details_id."pm_in"];
			$pm_out = $_REQUEST[$attendance_details_id."pm_out"];
			$ot_in = $_REQUEST[$attendance_details_id."ot_in"];
			$ot_out = $_REQUEST[$attendance_details_id."ot_out"];
			$ot_in_2nd = $_REQUEST[$attendance_details_id."2nd_ot_in"];
			$ot_out_2nd = $_REQUEST[$attendance_details_id."2nd_ot_out"];
			$remarks = mysql_escape_string($_REQUEST[$attendance_details_id."remarks"]);
			mysql_query("UPDATE `test`.`attendance_details` SET `AM_IN` = '$am_in', `AM_OUT` = '$am_out', `PM_IN` = '$pm_in', `PM_OUT` = '$pm_out', `OT_IN` = '$ot_in', `OT_OUT` = '$ot_out', `2nd_OT_IN` = '$ot_in_2nd', `2nd_OT_OUT` = '$ot_out_2nd', `Remarks` = '$remarks' WHERE `attendance_details`.`attendance_details_id` = $attendance_details_id") or die("errorhere1");
			$new_id = mysql_insert_id();
			//echo $am_out;
			
			if($level == "3"){
				if($am_in != "" && $am_out != ""){
					$time1 = $date." ".$am_in;
					$time2 = $date." ".$am_out;
				}
				if($pm_in != "" && $pm_out != ""){
					$time3 = $date." ".$pm_in;
					$time4 = $date." ".$pm_out;
				}
				if($am_out == "" && $pm_out == ""){
				$time1 = "";
				$time2 = "";
				$time3 = "";
				$time4 = "";
			}
				
			}
			else{
			
			if($am_in != ""){
				
				if($am_in < "08:00:00"){
				$am_in = "08:00:00";
				}
				$time1 = $date." ".$am_in;
				if($am_out != "00:00:00")
				{
					if($am_out < "12:00:00")
					{
						$time2 = $date." ".$am_out;
					}
					else{
						$time2 = "$date 12:00:00";
					}
					
				}
				if($am_out == ""){
					
					$time2 = "$date 12:00:00";
				}
				
			}
			if($pm_out != ""){
				if($pm_in != ""){
				if($pm_in > "13:30:00"){
					$time3 = $date." ".$pm_in;
				}
				else{
					$time3 = "$date 13:30:00";
				}
				
				}
				if($pm_in == ""){
					
					$time3 = "$date 13:30:00";
				}
				if($pm_out != ""){
					if($pm_out > "17:15:00")
					{
						$pm_out = "17:15:00";
					}
					$time4 = $date." ".$pm_out;
				}
			}
			
			if($am_out == "" && $pm_out == ""){
				$time1 = "";
				$time2 = "";
				$time3 = "";
				$time4 = "";
			}
			
			
				
			}
			
			if($ot_in != "" && $ot_out != ""){
				$ot_time_in = convert_hr_hrs_only($ot_in);
				$ot_time_out = convert_hr_hrs_only($ot_out);
				$total_ot_1st = $ot_time_out-$ot_time_in;
			}
			else{
				$total_ot_1st = "";
			}
			
			if($ot_in_2nd != "" && $ot_out_2nd != ""){
				$ot_time_in_2nd =convert_hr_hrs_only($ot_in_2nd);
				$ot_time_out_2nd = convert_hr_hrs_only($ot_out_2nd);
				$total_ot_2nd = $ot_time_out_2nd-$ot_time_in_2nd;
			}
			else{
				$total_ot_2nd = "";
			}
			
			//echo $time1."-".$time2."    ".$time3."-".$time4."<br/>";
			$datetimeori1 = convert_hr_hrs($time1,$time2);
			$datetimeori2 = convert_hr_hrs($time3,$time4);
			
			$datetime1 = convert_hr_hrs($time1,$time2);
			$datetime2 = convert_hr_hrs($time3,$time4);
			$total = $datetime1 + $datetime2;
			$total_ot = $total_ot_1st + $total_ot_2nd;
			
			/*
			$time1 = "";
			$time2 = "";
			$time3 = "";
			$time4 = "";
			 */
			mysql_query("UPDATE `test`.`attendance_details` SET `Norm_hrs` = '$total',OT_hrs = '$total_ot',`Remarks` = '$remarks' WHERE `attendance_details`.`attendance_details_id` = $attendance_details_id") or die("errorhere2");
			
		}
	}
	}
?>
<script>

function save_sheet(){
	if(confirm("are your sure?")){
		var x = document.save;
		x.cmd.value = "continue";
		x.submit();
	}
	else{
		alert("You cancelled the action");
	}
}

function submit_sheet(id){
	if(confirm("Are you sure?")){
		document.save.cmd.value = "submit_sheet";
	document.save.submit();
	}
	else{
		return false;
	}
	
}
</script>

<style>
#time_input{
	width:85px;
	height:25px;
	font-size:12px;
}
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
		<form name = "save" method = "POST" action = "<?php echo $current_file;?>">
		<input type = "hidden" name = "cmd" />
		<input type = "hidden" name = "data" value = "<?php echo $data;?>" />
		<input type = "hidden" name = "status" value = "<?php echo $status;?>" />
            <h1>
						Edit my <?php echo $month_name." ".$year;?> Sheet
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Sheet</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sheet Lists</h3>
					<?php if($status != $user_id){}else{?> 
                    <div class="pull-right">
					<button class = "btn btn-purple" onclick = "save_sheet()" ><i class = "fa fa-save"></i> Save Sheet</button>
                    </div>
					<?php
					}
					?>
                </div>
                <div class="box-body" style="display: block;">
				<table class="table table-hover">
                                <thead>
								<tr>
                                    <th style="overflow:hidden;min-width:100px;">Date</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;"><?php if($level == "3"){echo "1ST IN";}else{echo "AM IN";}?></th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;"><?php if($level == "3"){echo "1ST OUT";}else{echo "AM OUT";}?></th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;"><?php if($level == "3"){echo "2ND IN";}else{echo "AM IN";}?></th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;"><?php if($level == "3"){echo "2ND OUT";}else{echo "AM IN";}?></th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">(1st) OT IN</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">(1st) OT OUT</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">(2nd) OT IN</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">(2nd) OT OUT</th>
                                    <th class="td" style="overflow:hidden;min-width:250px;">Remarks</th>
                                    <th class="td" style="overflow:hidden;min-width:50px;">OT HRS</th>
                                </tr>
								</thead>
								<tbody>
									<?php
									$sql = mysql_query("SELECT * FROM `attendance_details` where attendance_id = '$data'");
									while($row = mysql_fetch_array($sql)){
									$time_in_am = "08:00:00";
									$time_out_am = "12:00:00";
									$time_in_pm = "13:30:00";
									$time_out_pm = "17:15:00";
									
									$time_exceed_am_in = strtotime($row['AM_IN']) - strtotime($time_in_am);
									$time_exceed_am_out = strtotime($row['AM_OUT']) - strtotime($time_out_am);
									$time_exceed_pm_in = strtotime($row['PM_IN']) - strtotime($time_in_pm);
									$time_exceed_pm_out = strtotime($row['PM_OUT']) - strtotime($time_out_pm);
									
									?>
									
									<input type = "hidden" name = "id" value = "<?php echo $row["attendance_details_id"]; ?>"/>
										<tr>
											<td class="pull-left" ><?php echo Date("d/m/Y",strtotime($row['date']))."(".date("D",strtotime($row['date'])).")"; ?></td>
									<td class="text-center" <?php if($level == "3"){}else{ ?> style = "color:<?php if($time_exceed_am_in>0){echo "red;font-weight:700;";}if($time_exceed_am_in<0){echo "green";}if($time_exceed_am_in == "-28800"){echo "green";}if($time_exceed_am_in == "0"){echo "green";}}?>;" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"   name = "<?php echo $row["attendance_details_id"]."am_in";?>"  type = 'time' value = "<?php if($row['AM_IN'] == "00:00:00"){echo "";}else{echo $row['AM_IN'];}?>" />
											</td>
											
											<td <?php if($level == "3"){}else{ ?> style = "color:<?php if($time_exceed_am_out<0){echo "red;font-weight:700;";}if($time_exceed_am_out>0){echo "green";}if($time_exceed_am_out == "-28800"){echo "green";}if($time_exceed_am_out == "0"){echo "green";}}?>;" class="text-center" > 
											<input  id = "time_input"  <?php if($status != $user_id){echo "disabled";}?>  name = "<?php echo $row["attendance_details_id"]."am_out";?>"  type = 'time' value = "<?php if($row['AM_OUT'] == "00:00:00"){echo "";}else{echo $row['AM_OUT'];}?>" />
											</td>
											
											
											<td <?php if($level == "3"){}else{ ?> style = "color:<?php if($time_exceed_pm_in>0){echo "red;font-weight:700;";}if($time_exceed_pm_in<0){echo "green";}if($time_exceed_pm_in == "-28800"){echo "green";}if($time_exceed_pm_in == "0"){echo "green";}}?>;" class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"   name = "<?php echo $row["attendance_details_id"]."pm_in";?>"  type = 'time' value = "<?php if($row['PM_IN'] == "00:00:00"){echo "";}else{echo $row['PM_IN'];}?>" />
											</td>
											
											
											<td <?php if($level == "3"){}else{ ?> style = "color:<?php if($time_exceed_pm_out<0){echo "red;font-weight:700;";}if($time_exceed_pm_out>0){echo "green";}if($time_exceed_pm_out == "-28800"){echo "green";}if($time_exceed_pm_out == "0"){echo "green";}}?>;" class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"    name = "<?php echo $row["attendance_details_id"]."pm_out";?>"  type = 'time' value = "<?php if($row['PM_OUT'] == "00:00:00"){echo "";}else{echo $row['PM_OUT'];}?>" />
											</td>
											
											
											
											<td class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"    name = "<?php echo $row["attendance_details_id"]."ot_in";?>"  type = 'time' value = "<?php if($row['OT_IN'] == "00:00:00"){echo "";}else{echo $row['OT_IN'];}?>" />
											</td>
											
											<td id = "li" class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"   name = "<?php echo $row["attendance_details_id"]."ot_out";?>"  type = 'time' value = "<?php if($row['OT_OUT'] == "00:00:00"){echo "";}else{echo $row['OT_OUT'];}?>" />
											</td>
											
											<td class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"    name = "<?php echo $row["attendance_details_id"]."2nd_ot_in";?>"  type = 'time' value = "<?php if($row['2nd_OT_IN'] == "00:00:00"){echo "";}else{echo $row['2nd_OT_IN'];}?>" />
											</td>
											
											<td id = "li" class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"   name = "<?php echo $row["attendance_details_id"]."2nd_ot_out";?>"  type = 'time' value = "<?php if($row['2nd_OT_OUT'] == "00:00:00"){echo "";}else{echo $row['2nd_OT_OUT'];}?>" />
											</td>
												
											
												
											<td><input type = "text" name = "<?php echo $row["attendance_details_id"]."remarks";?>" <?php if($status != $user_id){echo "disabled";}?>  value = "<?php echo $row['Remarks']?>" /></td>
											
											<td><input type = "text" name = "<?php echo $row["attendance_details_id"]."OT_HRS";?>" <?php if($status != $user_id){echo "disabled";}?>  value = "<?php echo $row['OT_hrs']?>" /></td>
										
										</tr>
										
									<?php
									}
									
									?>
								</tbody>
				</table>
							
				
				
				
                </div>
			
			<div class="box-footer">
				<div class = "margin pull-right">
					<a class="btn btn-success btn-flat" href = "sheet_submit.php"> <span><i class = "fa fa-arrow-left"></i></span> Back</a>
					<?php if($status != $user_id){}else{?> 
					<button class = "btn btn-purple" onclick = "save_sheet()" ><i class = "fa fa-save"></i> Save Sheet</button>
					<button onclick = "submit_sheet('<?php echo $data; ?>')" class="btn btn-primary"><span><i class = "fa fa-check"></i></span> Submit My Sheet</button>
					<?php } ?>
				</div>
            </div>
			
			</div>
			
        </section>
    </div>
	</form>
    <?php
	
	include("footer.php");
	?>
