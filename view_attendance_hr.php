<?php
include("nav.php");
 if(isset($_POST['attendance_id']) && $_POST['attendance_id'] != "")
   {
     $data=$_POST['attendance_id'];
     $sid=$_POST['student_id'];

	$s = "Select * from attendance where attendance_id = '$data'";
	
	if($run_sql = mysql_query($s))
	{
		$month = mysql_result($run_sql,0,'Month');
		$year = mysql_result($run_sql,0,'Year');
		$status = mysql_result($run_sql,0,'status');
		$month_name =  date('F', mktime(0, 0, 0, $month, 10));
	}
	
	
	$s2 = "Select * from usertemp where UserTempId = '$sid'";
	if($run_sql1 = mysql_query($s2))
	{
		$level = mysql_result($run_sql1,0,'user_type');
	}
   }

    if(isset($_POST['cmd']) && $_POST['cmd'] == "calculate"){
		$data=$_POST['attendance_id'];
		$sid=$_POST['student_id'];
		$total=$_POST['total'];
		$sql= mysql_query("select * from usertemp where UserTempId = '$sid'");
						$pay_per_day = mysql_result($sql,0,'pay_per_day');
		$payment = ($total)*$pay_per_day;
		$sql = mysql_query("select * from attendance_calculate where attendance_id = $data and status = 'active'");
		$num_rows = mysql_num_rows($sql);
		if($num_rows == "1"){
			
		}
		if($num_rows == "0"){
			mysql_query("INSERT INTO `attendance_calculate` (`att_cal_id`, `attendance_id`, `student_id`, `no_of_days`, `payment`, `overtime`, `tap`, `scp`, `status`)
						VALUES ('', '$data', '$sid', '$total', '$payment', '','', '', 'active')");
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

function calc_sheet(){
	var x = document.save;
	x.cmd.value = "calculate";

	x.submit();
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
		<input type = "hidden" name = "student_id" value = "<?php echo $sid;?>" />
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
						<a class="btn btn-green" href = "rgen.php"> <span><i class = "fa fa-arrow-left"></i></span> Back</a>
							<button class = "btn btn-purple" onclick = "calc_sheet()" ><i class = "fa fa-calculator"></i> Calculate Day</button>
							<button class = "btn btn-purple" onclick = "save_sheet()" ><i class = "fa fa-save"></i> Save Sheet</button>
					</div>
					
                </div>
				<?php
				$sql2= mysql_query("select * from attendance_calculate where attendance_id = '$data' and student_id = '$sid' and status LIKE 'active'");
				
				$sql3= mysql_query("select * from UserTemp where UserTempId = '$sid'");
				$pay_per_day = mysql_result($sql3,0,'pay_per_day');
				$num_rows = mysql_num_rows($sql2);
				
				//echo $num_rows;
				if($num_rows == "1"){
					$total_day = mysql_result($sql2,0,'no_of_days');
					$total_payment = mysql_result($sql2,0,'payment'); 
				}
				else{
					$total_day = "";
					$total_payment = "";
				}
				?>
				
				
                <div class="col-md-12" style = "margin-top:20px;">
				<div class = "row">
				<div class = "col-md-4">
					<div class="form-group">
					<div class="col-sm-4">
					  <label class="control-label">Number of days</label>
					</div>
					  <div class="col-sm-8">
						<div class="input-group">
						<input type="text" class="form-control" placeholder="hrs" value = "<?php echo $total_day; ?>" >
						<span class="input-group-addon"><i class="fa fa-times"> <?php echo "  $".$pay_per_day;?></i></span>
					  </div>
						
					  </div>
					</div>
				</div>
				<div class = "col-md-6">
					<div class="form-group">
					<div class="col-sm-5">
					
					<?php
					$dql = mysql_query("select * from usertemplevel where UserTempLevelId = $level");
					$num = mysql_num_rows($dql);
					if($num == "1"){
						$formula = mysql_result($dql,0,'payroll_formula');
						
						$eql = mysql_query("select * from payroll_formula where formula_id = $formula");
						$num1 = mysql_num_rows($eql);
						if($num1 =="1"){
							$norm_rate = mysql_result($eql,0,'norm_rate');
							$off_hrs_4_less = mysql_result($eql,0,'off_hrs_4_less');
							$off_hrs_4_over = mysql_result($eql,0,'off_hrs_4_over');
							$off_hrs_8_more = mysql_result($eql,0,'off_hrs_8_more');
						}
						
						
					}
					?>
					  <label class="control-label">Monday To Friday <br/>(<?php echo $norm_rate." * Hourly Rate";?>)</label>
					</div>
					  <div class="col-sm-4">
						<div class="input-group">
						<input type="text" class="form-control" placeholder="hours" value = "" >
						<span class="input-group-addon"><i class="fa fa-times"> <?php echo " ".$norm_rate;?></i></span>
					  </div>
						
					  </div>
					</div>
				</div>
				
				</div>
				<br/>
				<div class = "row">
				
				<div class = "col-md-4">
					<div class="form-group">
					<div class="col-sm-4">
					  <label class="control-label">Payable Amount</label>
					</div>
					  <div class="col-sm-8">
					  <div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="text" class="form-control" placeholder="$xxx.xx" value = "<?php echo $total_payment; ?>" />
						  </div>
						
					  </div>
					</div>
				</div>
				<div class = "col-md-6">
					<div class="form-group">
					<div class="col-sm-5">
					
					
					  <label class="control-label">Sat/Sun/PH - 4 hrs or Less  <br/>(<?php echo $off_hrs_4_less." * Daily Basic Pay";?>)</label>
					</div>
					  <div class="col-sm-4">
						<div class="input-group">
						<input type="text" class="form-control" placeholder="daily basic day" value = "" >
						<span class="input-group-addon"><i class="fa fa-times"> <?php echo " ".$off_hrs_4_less;?></i></span>
					  </div>
						
					  </div>
					</div>
				</div>
				</div>
				<br/>
				<div class = "row">
				<div class = "col-md-4">
				
				</div>
				
				<div class = "col-md-6">
					<div class="form-group">
					<div class="col-sm-5">
					
					
					  <label class="control-label">Sat/Sun/PH - 5 to 8 hrs <br/>(<?php echo $off_hrs_4_over." * Daily Basic Pay";?>)</label>
					</div>
					  <div class="col-sm-4">
						<div class="input-group">
						<input type="text" class="form-control" placeholder="daily basic day" value = "" >
						<span class="input-group-addon"><i class="fa fa-times"> <?php echo " ".$off_hrs_4_over;?></i></span>
					  </div>
						
					  </div>
					</div>
				</div>
				
				</div>
				
				<br/>
				<div class = "row">
				<div class = "col-md-4">
					
				</div>
				
				<div class = "col-md-6">
					<div class="form-group">
					<div class="col-sm-5">
					
					
					  <label class="control-label">Sat/Sun/PH - Extra (more than 8 hrs) <br/>(<?php echo $off_hrs_8_more." * Hourly Rate";?>)</label>
					</div>
					  <div class="col-sm-4">
						<div class="input-group">
						<input type="text" class="form-control" placeholder="daily basic day" value = "" >
						<span class="input-group-addon"><i class="fa fa-times"> <?php echo " ".$off_hrs_8_more;?></i></span>
					  </div>
						
					  </div>
					</div>
				</div>
				
				</div>
				<br/>
				<div class = "row">
				<div class = "col-md-4">
					
				</div>
				
			<div class = "col-md-6">
					<div class="form-group">
					<div class="col-sm-5">
					  <label class="control-label">Overtime Amount</label>
					</div>
					  <div class="col-sm-4">
						 <div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="text" class="form-control" placeholder="$xxx.xx" />
						  </div>
					  </div>
					</div>
				</div>
				
				</div>
				</div>
				<hr/>
				<div class = "col-md-12" style = "margin-top:50px;">
                <div class="box-body table-responsive no-padding">
				
				<table   class="table-hover">
                                <thead><tr>
                                    <th style="overflow:hidden;min-width:100px;">Date</th>
                                    <th class="text-center" style="overflow:hidden;"><?php if($level == "3"){echo "1ST IN";}else{echo "AM IN";}?></th>
                                    <th class="td text-center" style="overflow:hidden;"><?php if($level == "3"){echo "1ST OUT";}else{echo "AM OUT";}?></th>
                                    <th class="td text-center" style="overflow:hidden;"><?php if($level == "3"){echo "2ND IN";}else{echo "AM IN";}?></th>
                                    <th class="td text-center" style="overflow:hidden;"><?php if($level == "3"){echo "2ND OUT";}else{echo "AM IN";}?></th>
                                    <th class="td text-center" style="overflow:hidden;">(1st) OT IN</th>
                                    <th class="td text-center" style="overflow:hidden;">(1st) OT OUT</th>
                                    <th class="td text-center" style="overflow:hidden;">(2nd) OT IN</th>
                                    <th class="td text-center" style="overflow:hidden;">(2nd) OT OUT</th>
                                    <th class="td" style="overflow:hidden;min-width:100px;">Remarks</th>
                                    <th  style = "width:10%;" >No. of day</th>
                                    <th>OT HRS</th>
                                </tr>
								</thead>
								<tbody>
									<?php
									$total = 0;
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
											<?php if($row['AM_IN'] == "00:00:00"){echo "";}else{echo $row['AM_IN'];}?>
											</td>
											
											<td <?php if($level == "3"){}else{ ?> style = "color:<?php if($time_exceed_am_out<0){echo "red;font-weight:700;";}if($time_exceed_am_out>0){echo "green";}if($time_exceed_am_out == "-28800"){echo "green";}if($time_exceed_am_out == "0"){echo "green";}}?>;" class="text-center" > 
											<?php if($row['AM_OUT'] == "00:00:00"){echo "";}else{echo $row['AM_OUT'];}?>
											</td>
											
											
											<td <?php if($level == "3"){}else{ ?> style = "color:<?php if($time_exceed_pm_in>0){echo "red;font-weight:700;";}if($time_exceed_pm_in<0){echo "green";}if($time_exceed_pm_in == "-28800"){echo "green";}if($time_exceed_pm_in == "0"){echo "green";}}?>;" class="text-center" >
											<?php if($row['PM_IN'] == "00:00:00"){echo "";}else{echo $row['PM_IN'];}?>
											</td>
											
											
											<td <?php if($level == "3"){}else{ ?> style = "color:<?php if($time_exceed_pm_out<0){echo "red;font-weight:700;";}if($time_exceed_pm_out>0){echo "green";}if($time_exceed_pm_out == "-28800"){echo "green";}if($time_exceed_pm_out == "0"){echo "green";}}?>;" class="text-center" >
											<?php if($row['PM_OUT'] == "00:00:00"){echo "";}else{echo $row['PM_OUT'];}?>
											</td>
											
											
											
											<td class="text-center" >
											<?php if($row['OT_IN'] == "00:00:00"){echo "";}else{echo $row['OT_IN']."<br/>".convert_hr_hrs_only($row['OT_IN']);}?>
											</td>
											
											<td id = "li" class="text-center" >
											<?php if($row['OT_OUT'] == "00:00:00"){echo "";}else{echo $row['OT_OUT']."<br/>".convert_hr_hrs_only($row['OT_OUT']);}?>
											</td>
											
											<td class="text-center" >
											<?php if($row['2nd_OT_IN'] == "00:00:00"){echo "";}else{echo $row['2nd_OT_IN']."<br/>".convert_hr_hrs_only($row['2nd_OT_IN']);}?>
											</td>
											
											<td id = "li" class="text-center" >
											<?php if($row['2nd_OT_OUT'] == "00:00:00"){echo "";}else{echo $row['2nd_OT_OUT']."<br/>".convert_hr_hrs_only($row['2nd_OT_OUT']);}?>
											</td>
												
											
												
											
											<td>
											<input type = "text" name = "<?php echo $row["attendance_details_id"]."remarks";?>" <?php if($status != $user_id){echo "disabled";}?>  value = "<?php echo $row['Remarks']?>" />
											</td>
											
										<td>
										<input type = "number" step = "any" value ="<?php if($row["Norm_hrs"]==0){$no_day = 0;$total = $total+0; echo $no_day;}if($row["Norm_hrs"]<=5 && $row["Norm_hrs"] > 0){$no_day = 0.5;$total = $total+0.5; echo $no_day;}if($row["Norm_hrs"]<=20 && $row["Norm_hrs"] > 5){$no_day = 1;$total = $total+1; echo $no_day;}?>" />
										</td>
										<td>
										<input type = "number" step = "0.05" value ="<?php if($row["OT_hrs"]=="0"){}else{ echo $row["OT_hrs"]; }?>" />
										</td>
										
										</tr>
										
									<?php
									
									
									}
									
									?>
								</tbody>
				</table>
							
				
				<input type = "hidden" name = "total" value = "<?php echo $total;?>"/>
				
                </div>
                </div>
			
			<div class="box-footer">
				
            </div>
			
			</div>
			
        </section>
    </div>
	</form>
		</section>
</div>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script>


<?php
include("footer.php");
?>