<?php
include("nav.php");
 if(isset($_POST['attendance_id']) && $_POST['attendance_id'] != "")
   {
     $data=$_POST['attendance_id'];
    
	$s = "Select * from attendance where attendance_id = '$data'";
	
	if($run_sql = mysql_query($s))
	{
		$month = mysql_result($run_sql,0,'Month');
		$year = mysql_result($run_sql,0,'Year');
		$status = mysql_result($run_sql,0,'status');
		$month_name =  date('F', mktime(0, 0, 0, $month, 10));
	}
   }

   
	if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "continue"){
		$data1 = $_REQUEST["attendance_id"];
		$status = $_POST["status"];
		
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
			$remarks = mysql_escape_string($_REQUEST[$attendance_details_id."remarks"]);
			mysql_query("UPDATE `test`.`attendance_details` SET `AM_IN` = '$am_in', `AM_OUT` = '$am_out', `PM_IN` = '$pm_in', `PM_OUT` = '$pm_out', `OT_IN` = '$ot_in', `OT_OUT` = '$ot_out', `Remarks` = '$remarks' WHERE `attendance_details`.`attendance_details_id` = $attendance_details_id") or die("error");
			$new_id = mysql_insert_id();
			//echo $am_out;
			
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
			//echo $time1."-".$time2."    ".$time3."-".$time4."<br/>";
			$datetimeori1 = convert_hr_hrs_ori($time1,$time2);
			$datetimeori2 = convert_hr_hrs_ori($time3,$time4);
			
			$datetime1 = convert_hr_hrs($time1,$time2);
			$datetime2 = convert_hr_hrs($time3,$time4);
			$total = $datetime1 + $datetime2;
			
			/*
			$time1 = "";
			$time2 = "";
			$time3 = "";
			$time4 = "";
			 */
			mysql_query("UPDATE `test`.`attendance_details` SET `Norm_hrs` = '$total', `Remarks` = '$remarks' WHERE `attendance_details`.`attendance_details_id` = $attendance_details_id") or die("error");
			$noti = "Successfully Saved";
		}
	}
	}
?>
<style>
#time_input{
	width:85px;
	height:25px;
	font-size:12px;
}
</style>

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
</script>

 <div class="content-wrapper">
 <section class="content-header">
            <h1>
			View Attendance
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Pending my approval</li>
                <li class="active">Attendance Sheet</li>
            </ol>
			
        </section>
		
		<form name = "save" method = "POST" action = "<?php echo $current_file;?>">
		<input type = "hidden" name = "cmd" />
		<input type = "hidden" name = "attendance_id" value = "<?php echo $data;?>" />
		<input type = "hidden" name = "status" value = "<?php echo $status;?>" />
       
	   <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Attendance Sheets</h3>
					<?php
					if(isset($noti) && $noti != ""){
					?>
					<p style = "color:green;"><i><?php if(isset($noti) && $noti != ""){echo $noti;}?></i></p>
					<?php
					}
					?>
					<div class = "margin pull-right">
						<a class="btn btn-green" href = "approval_page.php"> <span><i class = "fa fa-arrow-left"></i></span> Back</a>
							<button class = "btn btn-purple" onclick = "save_sheet()" ><i class = "fa fa-save"></i> Save Sheet</button>
					</div>
					
                </div>
                <div class="box-body" style="display: block;">
				<table class="table table-hover">
                                <thead><tr>
                                    <th style="overflow:hidden;min-width:100px;">Date</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">AM IN</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">AM OUT</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">PM IN</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">PM OUT</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">OT In</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">OT Out</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">Norm Hours</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">OT Hours</th>
                                    <th class="td" style="overflow:hidden;min-width:250px;">Remarks</th>
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
											<td class="text-center" style = "color:<?php if($time_exceed_am_in>0){echo "red;font-weight:700;";}if($time_exceed_am_in<0){echo "green";}if($time_exceed_am_in == "-28800"){echo "green";}if($time_exceed_am_in == "0"){echo "green";}?>;" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"   name = "<?php echo $row["attendance_details_id"]."am_in";?>"  type = 'time' value = "<?php if($row['AM_IN'] == "00:00:00"){echo "";}else{echo $row['AM_IN'];}?>" />
											</td>
											
											<td style = "color:<?php if($time_exceed_am_out<=0){if($time_exceed_am_out == "-28800" || $time_exceed_am_out == "-43200"){echo "#555";}else {echo "red;font-weight:700;";}}if($time_exceed_am_out>0){echo "green";}if($time_exceed_am_out == "0"){echo "green";}?>;" class="text-center" > 
											<input  id = "time_input"  <?php if($status != $user_id){echo "disabled";}?>  name = "<?php echo $row["attendance_details_id"]."am_out";?>"  type = 'time' value = "<?php if($row['AM_OUT'] == "00:00:00"){echo "";}else{echo $row['AM_OUT'];}?>" />
											</td>
											
											
											<td style = "color:<?php if($time_exceed_pm_in>0){echo "red;font-weight:700;";}if($time_exceed_pm_in<0){echo "green";}if($time_exceed_pm_in == "-28800"){echo "green";}if($time_exceed_pm_in == "0"){echo "green";}?>;" class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"   name = "<?php echo $row["attendance_details_id"]."pm_in";?>"  type = 'time' value = "<?php if($row['PM_IN'] == "00:00:00"){echo "";}else{echo $row['PM_IN'];}?>" />
											</td>
											
											
											<td style = "color:<?php if($time_exceed_pm_out<0){echo "red;font-weight:700;";}if($time_exceed_pm_out>0){echo "green";}if($time_exceed_pm_out == "-28800"){echo "green";}if($time_exceed_pm_out == "0"){echo "green";}?>;" class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"    name = "<?php echo $row["attendance_details_id"]."pm_out";?>"  type = 'time' value = "<?php if($row['PM_OUT'] == "00:00:00"){echo "";}else{echo $row['PM_OUT'];}?>" />
											</td>
											
											
											<td class="text-center" >
											<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"    name = "<?php echo $row["attendance_details_id"]."ot_in";?>"  type = 'time' value = "<?php if($row['OT_IN'] == "00:00:00"){echo "";}else{echo $row['OT_IN'];}?>" />
											</td>
											
											<td id = "li" class="text-center" >
																	<input <?php if($status != $user_id){echo "disabled";}?> id = "time_input"   name = "<?php echo $row["attendance_details_id"]."ot_out";?>"  type = 'time' value = "<?php if($row['OT_OUT'] == "00:00:00"){echo "";}else{echo $row['OT_OUT'];}?>" /></td>
												<td class="text-center" ><?php echo $row["Norm_hrs"]; ?></td>
												<td class="text-center" ><?php echo $row["OT_hrs"]; ?></td>
											<td><input type = "text" name = "<?php echo $row["attendance_details_id"]."remarks";?>" <?php if($status != $user_id){echo "disabled";}?>  value = "<?php echo $row['Remarks']?>" /></td>
										
										</tr>
										
									<?php
									}
									
									?>
								</tbody>
				</table>
							
				
				
				
                </div>
			
			<div class="box-footer">
				
            </div>
			
			</div>
			
        </section>
    </div>
	</form>
		</section>
</div>

<?php
include("footer.php");
?>