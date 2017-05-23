<?php

include("nav.php");
include("database_connection.php");


if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "create"){
$year = $_REQUEST['year'];
$month = $_REQUEST['month'];
$date = date("Y-m-d");
$error1 = "";
$success = "";
$mysql = mysql_query("SELECT * FROM `payrolldate` WHERE `PayrolMonth` = '".$month."' AND `PayrollYear` = '".$year."'") or die("error");	
	
	$number = mysql_num_rows($mysql);
	
	if($number == "1"){
		$start = mysql_result($mysql,0,'PayrolStart');
		$start = strtotime($start); // Convert date to a UNIX timestamp  
		
		$end = mysql_result($mysql,0,'PayrolCalculationUpto'); 
		$end = strtotime($end); // Convert date to a UNIX timestamp 
		
		$sql = "select * from `attendance` where EmpNo = '$user_id' and Year = '$year' and month = '$month'";
		if($query_run = mysql_query($sql)){
			$exist = mysql_num_rows($query_run);
			
			if($exist == "1"){
				$error1 =  "You have generated the the sheet. Please click here to view your sheet";
			}
			else{
				mysql_query("INSERT INTO `attendance` (`attendance_id`, `EmpNo`, `Year`, `Month`, `Punch_card_upload`, `created`, `status`) 
					VALUES ('', '$user_id', '$year', '$month', '', '$date', '$user_id')") or die("error");
		
					$attendance_id = mysql_insert_id();
					
					// Loop from the start date to end date and output all dates inbetween  
					for ($i=$start; $i<=$end; $i+=86400) {
						$view_date = date("Y-m-d", $i);
					mysql_query("INSERT INTO `attendance_details` (`attendance_details_id`, `attendance_id`, `date`, `AM_IN`, `AM_OUT`, `PM_IN`, `PM_OUT`, `OT_IN`, `OT_OUT`, `2nd_OT_IN`, `2nd_OT_OUT`, `Norm_hrs`, `OT_hrs`, `late_hrs`, `Remarks`) 
					VALUES ('', '$attendance_id', '$view_date', '', '', '', '', '', '', '', '', '','','', '')") or die("error");
				$success = "Your Sheet sucessfully generated";
				
			}
		}
		
		
	}
}
else{
	$error1 = "Date information not defined. Contact Administrator for further details";
}
}


?>
<script>
function createSheet(){
	var x = document.new_sheet;
	var year = x.year.value;
	var month = x.month.value;
	
	if(month != "0" && year != "0")
	{
		x.cmd.value = "create";
		x.submit;
	}
}

</script>

	<form name = "new_sheet" method = "POST" action = "<?php echo $current_file; ?>">
	<input type = "hidden" name = "cmd" />
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
        New Sheet
        <small>Preview page</small>
      </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">New Sheet Form</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create New Sheet</h3>
							<p style = "color:red;"><?php if(isset($error1) && $error1 != ""){echo $error1;}?></p>
							<p style = "color:green;"><?php if(isset($success) && $success != ""){echo $success;}?></p>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">For the Year</label>
                                    <select class="form-control" id="year" name="year" >
                                        <option value="0">--Please Select--</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Month</label>
                                    <select class="form-control" id="month" name="month">
                                        <option value="0">--Please Select--</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                               <button class="btn btn-success pull-right" onclick="createSheet()">Create Sheet</button>
                           </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                
            </section>
        </div>
    </form>
    <?php



include("footer.php");
?>
