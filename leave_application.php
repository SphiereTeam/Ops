<?php
include("nav.php");
include ("database_connection.php");
if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "submit_leave")
{
	$start = $_REQUEST['start_date'];
	$end = $_REQUEST['end_date'];
	
	$start_date = strtotime($_REQUEST['start_date']);
	$end_end = strtotime($_REQUEST['end_date']);
	
	
	$reason = $_REQUEST['reason'];
	 $datediff = $end_end - $start_date;
	 $day = floor($datediff/(60*60*24));
	$day +=1;
	
	mysql_query("INSERT INTO `test`.`leave_application` (`leave_app_id`, `user_id`, `start_date`, `end_date`, `no_of_day`, `leave_reason`, `date_applied`, `status`)
	VALUES ('', '$userid', '$start', '$end', '$day', '$reason', '".date("Y-m-d")."', 'pending');") or die("Error");
	$status = "success";

}
if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "refresh")
{
	$start = strtotime($_REQUEST['start_date']);
	$end = strtotime($_REQUEST['end_date']);
/* 	
$count = 0;

while(date('Y-m-d', $start) < date('Y-m-d', $end)){
	
  $count += date('N', $start) < 7 ? 1 : 0;
  $start = strtotime("+1 day", $start);
} */

$datetime1 = new DateTime($_REQUEST['start_date']);
$datetime2 = new DateTime($_REQUEST['end_date']);
$interval = $datetime1->diff($datetime2);
$woweekends = 0;
for($i=0; $i<=$interval->d; $i++){
    $modif = $datetime1->modify('+1 day');
    $weekday = $datetime1->format('w');

    if($weekday != 0){ // 0 for Sunday and 6 for Saturday
        $woweekends++;  
    }
}

$days = $woweekends;

}




?>
<script>
function submit_leave_app(){
	var cmd = document.getElementById("cmd");
	var start = document.getElementById("start_date");
	var end = document.getElementById("end_date");
	var reason = document.getElementById("reason");
	
	if(start.value == "" || end.value == "" || reason.value == "" )
	{
		alert("Please Fill all field");
		return false;
	}
	
	cmd.value = "submit_leave";
	document.submit_form.submit();
}

function refresh()
{
	var start = document.getElementById("start_date");
	var end = document.getElementById("end_date");
	var cmd = document.getElementById("cmd");
	if(start.value == "" || end.value == "")
	{
		alert("Please Enter Date");
		return false;
	}
	
	if(start.value>end.value)
	{
		alert("Please Select Date Properly");
		return false;
	}
	
	cmd.value = "refresh";
	document.submit_form.submit();
	
}
</script>
<div class="content-wrapper">
	<div class = "col-md-8">
	<?php
	if(isset($status) && $status == "success")
	{

	?><p style = "color:green;font-size:15px;">Form Successfully submitted</p>
	<meta http-equiv="refresh" content="3;url=leave_application.php">
	<?php
	}
	?>
			<h3>Leave Application</h3>
			<hr />
	</div>
	<form name = "submit_form" method = "POST" action = "<?php echo $current_file;?>">
	<input type = "hidden" id = "cmd" name = "cmd" >
	<div class = "col-md-8">
			<div class = "col-md-6">
				<label>Start Date</label>
				<input type = "date"  class = "form-control" name = "start_date" id = "start_date" onchange = "check_date()" <?php if(isset($_POST['start_date']) && $_POST['start_date'] != ""){echo "value = '$_POST[start_date]'";}?>/>
			</div>
			
			<div class = "col-md-6">
			<label>End Date</label>
			<input type = "date" class = "form-control"  name = "end_date" id = "end_date"  <?php if(isset($_POST['end_date']) && $_POST['end_date'] != ""){echo "value = '$_POST[end_date]'";}?>/>
			</div>
	</div>
	

			<div class = "col-md-6" style = "margin-top:30px;">
				<div class = "col-md-8">
				<label>No Of Day</label>
				<input type = "text" name = "day" class = "form-control" disabled style = "width:100%;" <?php if(isset($days) && $days != ""){ echo "value = '$days'";}?>/> 
				</div> 
				<div class = "col-md-2">
				<br />
				<input type = "button" class = "btn btn-default" value = "Refresh" style = "margin-top:5px;" onclick = "refresh()"></input>
				</div>
			<div class = "col-md-6">
			 
			</div>
			<br>
	</div>

		<div class= "col-md-8" style = "margin-top:20px;">
		
			<div class= "col-md-12">
			<label> Reasons </label>
			<textarea class="form-control" rows="3" name = "reason" id = "reason"></textarea>
		</div>
		</div>
	
	<hr>
	
	<div class= "col-md-9">
	<hr />
	
	
	<div class= "col-md-8">
	<p style = "color:#777; font-size:15px;margin-top:-20px;">**Please Note that all leave request must be submitted at least 5 working days in advance</p>
	</div>
	
	<div class= "col-md-4" >
	<button class= "btn btn-primary" onclick = "submit_leave_app()">Send My Application</button>
	</div>
	
	</div>

	</form>
</div>