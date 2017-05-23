<?php
if(isset($_GET["new_id_2"]) && $_GET['new_id_2'] != ""){
	$new_id = $_GET['new_id_2'];


}
if(isset($_POST["new_id_2"]) && $_POST['new_id_2'] != ""){
	$new_id = $_POST['new_id_2'];

}
if(isset($_POST["scanned"]) && $_POST['scanned'] != ""){
	$scanned_receipt = $_POST['scanned'];
}
include("nav.php");
require("database_connection.php");



if(isset($_POST['application_type']) && $_POST['application_type'] != ""){
$application_type = $_POST['application_type'];
if($application_type == "1"){ $application_type = "Card Replacement"; }
if($application_type == "2"){ $application_type =  "New Application"; }
if($application_type == "3"){ $application_type =  "Renewal"; }
if($application_type == "4"){ $application_type =  "Zone Amendment"; }

if(isset($_POST['renewal_type']) && $_POST['renewal_type'] != ""){
	$renewal_type = $_POST['renewal_type'];
	echo $renewal_type;
}
if(isset($_POST['gender']) && $_POST['gender'] != ""){
	$gender = $_POST['gender'];
	echo $gender;
}
if(isset($_POST['ic']) && $_POST['ic'] != ""){
	$ic = $_POST['ic'];
	echo $ic;
}
if(isset($_POST['color']) && $_POST['color'] != ""){
	$color = $_POST['color'];
	echo $color;
}
if(isset($_POST['expiry_date']) && $_POST['expiry_date'] != ""){
	$expiry_date = $_POST['expiry_date'];
	echo $expiry_date;
}
if(isset($_POST['application_for']) && $_POST['application_for'] != ""){
	$application_for = $_POST['application_for'];
	echo $application_for;
}
if(isset($_POST['job_post']) && $_POST['job_post'] != ""){
	$job_post = $_POST['job_post'];
	echo $job_post;
}
if(isset($_POST['unit']) && $_POST['unit'] != ""){
	$unit = $_POST['unit'];
	echo $unit;
}

if(isset($_POST['start_date']) && $_POST['start_date'] != ""){
$start_date = $_POST['start_date'];
	echo $start_date;
}

if(isset($_POST['end_date']) && $_POST['end_date'] != ""){
	$end_date = $_POST['end_date'];
	echo $end_date;
}

}


if(isset($_POST['zone']) && $_POST['zone'] != "")
{
	if(isset($_POST["new_id_2"]) && $_POST['new_id_2'] != ""){
		$new_id = $_POST["new_id_2"];
	$s = mysql_query("SELECT * FROM `kantech_application_temp` WHERE `kantech_app_temp`= '$new_id'");
	$num_rows = mysql_num_rows($s);
	$type = mysql_result($s,0,'type');

	$date = date("Y-m-d");
	mysql_query("INSERT INTO `test`.`kantech_application` (`kant_app_id`, `kant_app_emp_no`, `kant_application_type`, `application_impersonate`, `kant_app_date_apply`, `kant_file_upload`, `overall_status`) 
	VALUES ('', '$new_id', '$type', '$user_id', '$date', '', 'pending')") or die("error1");
	$application_id = mysql_insert_id();
		foreach($_POST['zone'] as $selected) {
		
			$sql = mysql_query("select * from kantechdoor where kant_door_abbr LIKE '$selected'") or die("error");
			$run = mysql_num_rows($sql);
			if($run == "1"){
				$zone = mysql_result($sql,0,'zone');
			}
			else{
				$zone = "";
			}
			mysql_query("INSERT INTO `test`.`kantech_application_details` (`kant_app_detail_id`, `kant_app_id`, `zone`, `kant_door_id`, `status`, `status_date`) 
		VALUES ('', '$application_id', '$zone', '$selected', 'pending', CURRENT_TIMESTAMP)") or die("error2"); 
		
		
			
		}
		
		?>
		<script type = "text/javascript">
		alert("Your application no <?php echo $application_id;?> has been successfully submitted");
		window.location = "application_history.php";
		</script>
		<?php
		
	}else{

	echo "1";
	$date = date("Y-m-d");
	$application_type = $_POST['application_type'];
	mysql_query("INSERT INTO `test`.`kantech_application` (`kant_app_id`, `kant_app_emp_no`, `kant_application_type`, `application_impersonate`, `kant_app_date_apply`, `kant_file_upload`, `overall_status`) 
	VALUES ('', '$user_id', '$application_type', '0', '$date', '$scanned', 'pending')") or die("error1");
	$application_id = mysql_insert_id();
		foreach($_POST['zone'] as $selected) {
		
			$sql = mysql_query("select * from kantechdoor where kant_door_abbr LIKE '$selected'") or die("error");
			$run = mysql_num_rows($sql);
			if($run == "1"){
				$zone = mysql_result($sql,0,'zone');
			}
			else{
				$zone = "";
			}
			mysql_query("INSERT INTO `test`.`kantech_application_details` (`kant_app_detail_id`, `kant_app_id`, `zone`, `kant_door_id`, `status`, `status_date`) 
		VALUES ('', '$application_id', '$zone', '$selected', 'pending', CURRENT_TIMESTAMP)") or die("error2"); 
		
		
			
		}
		
		?>
		<script type = "text/javascript">
		alert("Your application no <?php echo $application_id;?> has been successfully submitted")
		</script>
		<?php
			header("location:application_history.php");
}
}

?>

<style>
.checkbox label:first child {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
.checkbox label {
    min-height: 20px;
    padding-left: 30px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
.purple{
	color:#412B72;
}
.purple:hover{
	color:#aec940;
}

.box-header > .fa, .box-header > .glyphicon, .box-header > .ion, .box-header .box-title{
	font-size:1em;
}
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
        Zone Authority Clearance
        <small>Application page</small>
      </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Zone Authority Clearance Application Form</li>
            </ol>
        </section>
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-green">
                        <div class="box-header with-border">
                            <h3 class="box-title">Zone Authority Clearance</h3>
                        </div>
                        <!-- /.box-header -->
<form method = "POST" action = "<?php echo $current_file;?>">   
<input type = "hidden" name = "new_id_2" value = "<?php if(isset($new_id)){echo "$new_id";}?>"/>
<?php
if(isset($_POST['renewal_type']) && $_POST[''] != ""){
	$renewal_type = $_POST['renewal_type'];
	?>
<input type = "hidden" name = "renewal_type" value = "<?php echo $renewal_type;?>" />
<?php
}
if(isset($_POST['gender']) && $_POST['gender'] != ""){
	$gender = $_POST['gender'];
	?>
<input type = "hidden" name = "gender" value = "<?php echo $gender;?>" />
<?php
}


if(isset($_POST['ic']) && $_POST['ic'] != ""){
	$ic = $_POST['ic'];
	?>
<input type = "hidden" name = "ic" value = "<?php echo $ic;?>" />
<?php
}
if(isset($_POST['color']) && $_POST['color'] != ""){
	$color = $_POST['color'];
	?>
<input type = "hidden" name = "color" value = "<?php echo $color;?>" />
<?php
}
if(isset($_POST['expiry_date']) && $_POST['expiry_date'] != ""){
	$expiry_date = $_POST['expiry_date'];
	?>
<input type = "hidden" name = "expiry_date" value = "<?php echo $expiry_date;?>" />
<?php
}
if(isset($_POST['application_for']) && $_POST['application_for'] != ""){
	$application_for = $_POST['application_for'];
	?>
<input type = "hidden" name = "application_for" value = "<?php echo $application_for;?>" />
<?php
}
if(isset($_POST['job_post']) && $_POST['job_post'] != ""){
	$job_post = $_POST['job_post'];
	?>
<input type = "hidden" name = "job_post" value = "<?php echo $job_post;?>" />
<?php
}
if(isset($_POST['unit']) && $_POST['unit'] != ""){
	$unit = $_POST['unit'];
	?>
<input type = "hidden" name = "unit" value = "<?php echo $unit;?>" />
<?php
}

if(isset($_POST['start_date']) && $_POST['start_date'] != ""){
$start_date = $_POST['start_date'];
	?>
<input type = "hidden" name = "start_date" value = "<?php echo $start_date;?>" />
<?php
}

if(isset($_POST['end_date']) && $_POST['end_date'] != ""){
	$end_date = $_POST['end_date'];
	?>
<input type = "hidden" name = "end_date" value = "<?php echo $end_date;?>" />
<?php
}

?>
<input type = "hidden" value = "<?php echo $application_type?>" name = "application_type" />



                  
					 <div class="box-body">
                            <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a  class = "purple" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
											<span class="pull-left-container">
											  <i class="fa fa-angle-right pull-left"></i>
											</span>
											Zone A (Group Human Resources)
										  </a>
										 
										</h4>
                                     <i class="label label-success pull-right">Green Zone</i>
									
                                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											 <div class="box-header with-border">
											<h5 class="box-title">
											  <a class = "purple" data-toggle="collapse" data-parent="#collapseOne" href="#collapseOneV1" aria-expanded="false" class="collapsed">
												General Office Areas
											  </a>
											</h5>
											</div>
												<div id="collapseOneV1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l3" >
																	LEVEL 3 ACEO OFFICE
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l4 " >
																	LEVEL 4 IT MULTIMEDIA
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l5" >
																	LEVEL 5 FINANCE
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l6" >
																	LEVEL 6 ENGINEERING
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l7" >
																	LEVEL 7 FACILITIES MANAGEMENT AND HSE
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l9" >
																	LEVEL 9 DCE, LEGAL & HR
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l10" >
																	LEVEL 10 PRODUCT NBD
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l11" >
																	LEVEL 11 INTERCONNECT DEG
																</label>
															</div>
													</div>
												</div>
											</div>
											<div class="box-header with-border">
											<h5 class="box-title">
											  <a class = "purple"   class = "purple" data-toggle="collapse" data-parent="#collapseOne" href="#collapseOneV2" aria-expanded="false" class="collapsed">
												Sports Hall, HQ Building 2
											  </a>
											</h5>
											</div>
												<div id="collapseOneV2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "sph" >
																  SPORTS HALL MAIN ENTRANCE
																</label>
														</div>
													</div>
												</div>
											</div>
											<div class="box-header with-border">
											<h5 class="box-title">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapseOne" href="#collapseOneV3" aria-expanded="false" class="collapsed">
												Male Gym, HQ Building 4
											  </a>
											</h5>
											</div>
											<div id="collapseOneV3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "mg" >
																  MALE GYM
																</label>
														</div>
													</div>
												</div>
											</div>
											
											 <div class="box-header with-border">	
											<h5 class="box-title">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapseOne" href="#collapseOneV4" aria-expanded="false" class="collapsed">
												Female Gym, HQ Building 4
											  </a>
											</h5>
											</div>
											<div id="collapseOneV4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "fg" >
																  FEMALE GYM
																</label>
														</div>
													</div>
												</div>
											</div>
											
											 <div class="box-header with-border">	
											<h5 class="box-title">
											  <a class = "purple"  data-toggle="collapse" data-parent="#collapseOne" href="#collapseOneV5" aria-expanded="false" class="collapsed">
												Documentation Centre, HQ Building 4
											  </a>
											</h5>
											</div>
										<div id="collapseOneV5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "dfd" >
																  DOCUMENTATION FRONT DOOR
																</label>
														</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "dbd" >
																  DOCUMENTATION BACK DOOR
																</label>
														</div>
													</div>
												</div>
											</div>
												
												
												
                                </div>
                                </div>
                                </div>
                            
                                <div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone B (Customer Services)
										  </a>
										</h4>
                                    <i class="label label-success pull-right">Green Zone</i>
									
								   <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapseTwo" href="#collapseOneV21" aria-expanded="false" class="collapsed">
												All Counter / Branches
											  </a>
											</h5>
									</div>		
												<div id="collapseOneV21" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>AIRPORT MALL</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "airco" >
																	COUNTER OFFICE
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "airback" >
																	COUNTER BACKDOOR
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>GADONG</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "gdgfd" >
																	FRONT DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "gdgod" >
																	OFFICE DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "gdgsd" >
																	SLIDING DOOR
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>YAYASAN</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "yysnld" >
																	LEFT DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "yysnbd" >
																	BACK DOOR
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>KUALA BELAIT</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "kbgfbd" >
																	GROUND FLOOR BACKDOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "kbl1bd" >
																	LEVEL 1 BACKDOOR
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>TUTONG</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "ttgbd" >
																	BACK DOOR
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>TEMBURONG</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "tmbo" >
																	OFFICE
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "tmbbd" >
																	BACK DOOR
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>GIANT RIMBA</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "rimbac" >
																	COUNTER
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "rimbasd" >
																	SLIDING DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "rimbabd" >
																	BACK DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "rimbasr" >
																	SERVER ROOM
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>TANJUNG BUNUT</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "tgbl1sd" >
																	FIRST FLOOR SLIDING DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "tgbl1c" >
																	FIRST FLOOR COUNTER
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "tgbgfsd" >
																	GROUND FLOOR SIDE DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "tgbgfc" >
																	GROUND FLOOR COUNTER
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>CPA</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "cpa" >
																	CPA
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "cpata" >
																	CPA T & A
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>FASCOM</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "fscm" >
																	FASCOM DOOR
																</label>
															</div>
														</div>
													</div>
												</div>
												
										 <div class="box-header with-border">
										 <h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapseTwo" href="#collapseOneV22" aria-expanded="false" class="collapsed">
												151 CALL CENTER
											  </a>
											</h5>
										</div>	
											<div id="collapseOneV22" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>Headquarters Building 4</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b4l1_151d" >
																	LEVEL 1 151 DOOR
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>Airport Mall</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "airccta" >
																	CALL CENTER T & A
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "ccd" >
																	CALL CENTER DOOR
																</label>
															</div>
														</div>
											</div>
											</div>
										 <div class="box-header with-border">	
											<h5 class="box-title">
											  <a  class = "purple" class = "purple" data-toggle="collapse" data-parent="#collapseTwo" href="#collapseOneV23" aria-expanded="false" class="collapsed">
												COUNTER STRONG ROOM
											  </a>
											</h5>
													
                                    <i class="label label-warning pull-right">Restricted Access</i>
									
										</div>
											<div id="collapseOneV23" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>GPC GADONG</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "gdggpcstr" >
																	STRONG ROOM
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>GIANT RIMBA</label>
															  <div class="checkbox">
																
																<label>
																  <input type="checkbox" name = "zone[]" value = "rimbastr" >
																	STRONG ROOM
																</label>
															</div>
														</div>
														<div class="form-group">
															  <label>TEMBURONG</label>
															  <div class="checkbox">
																
																<label>
																  <input type="checkbox" name = "zone[]" value = "tmbstr" >
																	STRONG ROOM
																</label>
															</div>
														</div>
											</div>
											</div>
                                </div>
                                </div>
                                </div>
                                
								
								
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" class="collapsed">
										<i class="fa fa-angle-right pull-left"></i>	Zone C (Product)
										  </a>
										</h4>
                                    
									 <i class="label label-success pull-right">Green Zone</i>
								   <div id="collapse3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse3" href="#collapse31" aria-expanded="false" class="collapsed">
												Prepaid Centre Strong room
											  </a>
											</h5>
											
                                    <span class="label label-warning pull-right">Restricted Access</span>
									</div>		
												<div id="collapse31" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															
															</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone D (Network Infrastructure)
										  </a>
										</h4>
                                    
									 <span class="label label-danger pull-right">Red Zone</span>
								   <div id="collapse4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse4" href="#collapse41" aria-expanded="false" class="collapsed">
												MSC Switching room, Building 3, DST Headquarters
											  </a>
											</h5>
									</div>		
												<div id="collapse41" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>MSC</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "mscme" >
																	MSC MAIN ENTRANCE
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "mscbd" >
																	MSC BACKDOOR
																</label>
															</div>
															  <label>SWITCHING ROOM</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "swbd" >
																	SWITCHING BACKDOOR
																</label>
															</div>
														</div>
														</div>
														</div>
														
											<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse4" href="#collapse42" aria-expanded="false" class="collapsed">
												Building 3
											  </a>
											</h5>
									</div>		
												<div id="collapse42" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>LEVEL 1</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3gfmd" >
																	GROUND FLOOR MAIN DOOR
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3hw" >
																	HALLWAY
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3l1md" >
																	LEVEL 1 MAIN FLOOR
																</label>
															</div>
														</div>
														</div>
														</div>
														
											<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse4" href="#collapse43" aria-expanded="false" class="collapsed">
												NOC, HQ BUILDING 3
											  </a>
											</h5>
									</div>		
												<div id="collapse43" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3l1noc" >
																	LEVEL 1 NOC
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3l2noc" >
																	LEVEL 2 NOC
																</label>
															</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone E (Multimedia Services)
										  </a>
										</h4>
                                    <i class="label label-danger pull-right">Red Zone</i>
		
								   <div id="collapse5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									
									
									<div class="box-header with-border">
									
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse5" href="#collapse51" aria-expanded="false" class="collapsed">
												Co-Location, HQ Building 3
											  </a>
											</h5>
											
										<i class="label label-danger pull-right">Restricted Access</i>
									</div>		
												<div id="collapse51" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "h3coloc_fdbd" >
																	Front Door / Back Door
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3coloc_dst" >
																	DST
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3coloc_rented" >
																	Rented
																</label>
															</div>
														</div>
														</div>
														</div>
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse5" href="#collapse52" aria-expanded="false" class="collapsed">
												Building 3, LEVEL 2 Back Door
											  </a>
											</h5>
											
										<i class="label label-danger pull-right">Restricted Access</i>
									</div>		
												<div id="collapse52" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>AIRPORT MALL</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3l2co" >
																	COUNTER OFFICE
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3cbd" >
																	COUNTER BACKDOOR
																</label>
															</div>
														</div>
														</div>
														</div>
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse5" href="#collapse53" aria-expanded="false" class="collapsed">
												Multimedia Server Room
											  </a>
											</h5>
											
										<i class="label label-danger pull-right">Restricted Access</i>
									</div>		
												<div id="collapse53" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "datacom" >
																	DATACOM
																</label>
															</div>
														</div>
														</div>
														</div>
														

														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone F (IT Services)
										  </a>
										</h4>
                                    <i class="label label-danger pull-right">Red Zone</i>
		
								   <div id="collapse6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								

								<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse6" href="#collapse61" aria-expanded="false" class="collapsed">
												IT Server Room
											  </a>
											</h5>
											
                                    <span class="label label-danger pull-right">Restricted Access</span>
									</div>		
												<div id="collapse61" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "itserv" >
																	Multimedia Server
																</label>
															</div>
														</div>
														</div>
														</div>
														
														
														

								<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse6" href="#collapse62" aria-expanded="false" class="collapsed">
												Printing / Sorting Room
											  </a>
											</h5>
											
                                    <span class="label label-danger pull-right">Restricted Access</span>
									</div>		
												<div id="collapse62" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "emerg" >
																	Emergency Exit
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "pr" >
																	Printing Room
																</label>
															</div>
														</div>
														</div>
														</div>
														
														
														
														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone G (Group Facilities Management)
										  </a>
										</h4>
										<span class="pull-right"> <i class = "label label-danger">Red Zone</i> , <i class = "label label-warning">Restricted Access</i></span>

                                   
		
								   <div id="collapse7" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									<div class="box-header with-border">
											<h6 class="box-title">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse7" href="#collapse71" aria-expanded="false" class="collapsed">
												DST SECURITY ROOM, HQ BUILDING 1
											  </a>
											</h6>
									</div>
									
									 <div id="collapse71" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;font-size:14px;">
													<div class="box-body">
														<div class="form-group">
															  <label>Building 1, DST Headquarters</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1sec" >
																	Security Control
																</label>
															</div>
														</div>
														</div>
														</div>
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse7" href="#collapse72" aria-expanded="false" class="collapsed">
												SERVICE LIFT, HQ BUILDING 1
											  </a>
											</h5>
									</div>
									
									
									 <div id="collapse72" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;font-size:14px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1ld" >
																	LIFT DOOR
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l2bd" >
																	LEVEL 2 BACKDOOR
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l3bd" >
																	LEVEL 3 ACEO OFFICE
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l4bd" >
																	LEVEL 4 IT MULTIMEDIA
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l5bd" >
																	LEVEL 5 FINANCE
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l6bd" >
																	LEVEL 6 ENGINEERING
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l7bd" >
																	LEVEL 7 FACILITIES MANAGEMENT AND HSE
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l9bd" >
																	LEVEL 9 DCE, LEGAL & HR
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l10bd" >
																	LEVEL 10 PRODUCT NBD
																</label>
															</div>
													</div>
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l11bd" >
																	LEVEL 11 INTERCONNECT DEG
																</label>
															</div>
													</div>
														</div>
														</div>
									
									
									
									 <div id="collapse72" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>AIRPORT MALL</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = " " >
																	COUNTER OFFICE
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = " " >
																	COUNTER BACKDOOR
																</label>
															</div>
														</div>
														</div>
														</div>
														
														
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse7" href="#collapse73" aria-expanded="false" class="collapsed">
												BATTERY ROOM, HQ BUILDING 3
											  </a>
											</h5>
									</div>
									
									 <div id="collapse73" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>BUILDING 3, DST HEADQUARTERS</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3l0brm" >
																	BASEMENT BATTERY ROOM
																</label>
															</div>
														</div>
														</div>
														</div>
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse7" href="#collapse74" aria-expanded="false" class="collapsed">
												Rectifier / UPS Room, HQ Building 3, Compartment Storage, HQ Building 4
											  </a>
											</h5>
									</div>	

									 <div id="collapse74" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>Building 3, DST HEADQUARTERS</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b3rectrm" >
																	RECTIFIER ROOM
																</label>
																
															</div>
														</div>
														<div class="form-group">
															  <label>Building 4, DST HEADQUARTERS</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b4gfstorefd" >
																	GROUND FLOOR STORAGE ROOM (FRONT DOOR)
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b4gfstoresd" >
																	
																	GROUND FLOOR STORAGE ROOM SIDE DOOR (SIDE DOOR)
																</label>
															</div>
														</div>
														</div>
														</div>									
												
														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone H (Kristal Astro / Kristal Media)
										  </a>
										</h4>
                                    <i class="label label-danger pull-right">Red Zone</i>
								
								   <div id="collapse8" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse81" href="#collapse81" aria-expanded="false" class="collapsed">
												KFM Studio
											  </a>
											</h5>
													
                                    <span class="label label-warning pull-right">Restricted Access</span>
									
									</div>		
												<div id="collapse81" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "kfm_md" >
																	KFM Main Door
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "kfm_e" >
																	KFM Emergency
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "kfm_lb" >
																	KFM Load Bay
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "kfm_mcr" >
																	KFM MCR
																</label>
															</div>
														</div>
														</div>
														</div>
														
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse8" href="#collapse82" aria-expanded="false" class="collapsed">
												KFM Server Room
											  </a>
											</h5>
													
                                    <span class="label label-warning pull-right">Restricted Access</span>
									
									</div>		
												<div id="collapse82" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
														
														
														</div>
														</div>
														</div>
														
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse8" href="#collapse83" aria-expanded="false" class="collapsed">
												Subok Station
											  </a>
											</h5>
													
                                    <span class="label label-warning pull-right">Restricted Access</span>
									
									</div>		
												<div id="collapse83" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															 Offline
														</div>
														</div>
														</div>
														
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse8" href="#collapse84" aria-expanded="false" class="collapsed">
												Andulau Station
											  </a>
											</h5>
													
                                    <span class="label label-warning pull-right">Restricted Access</span>
									
									</div>		
												<div id="collapse84" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  Offline
														</div>
														</div>
														</div>
														
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse8" href="#collapse85" aria-expanded="false" class="collapsed">
												Kristal Astro Helpdesk
											  </a>
											</h5>
													
                                    <span class="label label-warning pull-right">Restricted Access</span>
									
									</div>		
												<div id="collapse85" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "ka_hd_md" >
																	Kristal Astro Main Door
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "kd_tech" >
																	Kristal Astro Technical
																</label>
															</div>
														</div>
														</div>
														</div>
														
									
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse8" href="#collapse86" aria-expanded="false" class="collapsed">
												Kristal Counter GPC
											  </a>
											</h5>
													
                                    <span class="label label-warning pull-right">Restricted Access</span>
									
									</div>		
												<div id="collapse86" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "kc_vs" >
																	Vendor Store
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "kc_bd" >
																	Kristal Backdoor
																</label>
															</div>
														</div>
														</div>
														</div>
														
														
														
														
														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone I (Incomm)
										  </a>
										</h4>
                                    
		
								   <div id="collapse9" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse9" href="#collapse91" aria-expanded="false" class="collapsed">
												Incomm Retail Office / Logistic Room
											  </a>
											  
											</h5>
													
                                    <span class="label label-warning pull-right">Restricted Access</span>
									
									</div>		
												<div id="collapse91" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>INCOMM Gadong</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "incommgdgl1" >
																	LEVEL 1
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "incommgdgl2" >
																	LEVEL 2
																</label>
															</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone J (DSTSOLUTION)
										  </a>
										</h4>
                                    
		
								   <div id="collapse10" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse10" href="#collapse101" aria-expanded="false" class="collapsed">
												DSS Server Room
											  </a>
											</h5>
									</div>		
												<div id="collapse101" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <label>DSS Office</label>
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "dssgf" >
																	Ground Floor
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "dssl1" >
																	LEVEL 1
																</label>
															</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														
														
								<div class="panel box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
										  <a class = "purple"  data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" class="collapsed">
											<i class="fa fa-angle-right pull-left"></i>Zone K (CEO)
										  </a>
										</h4>
                                    
									
									 <i class="label label-warning pull-right">Resticted Access</i>
								   <div id="collapse11" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
									<div class="box-header with-border">
											<h5 class="box-title with-border">
											  <a  class = "purple" data-toggle="collapse" data-parent="#collapse11" href="#collapse111" aria-expanded="false" class="collapsed">
												LEVEL 8, HQ Building 1
											  </a>
											</h5>
									</div>		
												<div id="collapse111" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
													<div class="box-body">
														<div class="form-group">
															  <div class="checkbox">
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l8fd" >
																	LEVEL 8, CEO, Internal Audit Front Door
																</label>
																<label>
																  <input type="checkbox" name = "zone[]" value = "b1l8bd" >
																	LEVEL 8, CEO, Internal Audit Back Door (Lift)
																</label>
															</div>
														</div>
														</div>
														</div>
														</div>
														</div>
														</div>
													
														
														
														
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
				
				    <div class="col-md-4">
					  <div class="box box-primary">
						<div class="box-header with-border">
						
						  <span class="label label-success"><i class="fa fa-user"></i></span>
						  <h3 class="box-title"> Zone Owner</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
						  <ul class="nav nav-stacked">
							<li><a href="#">Zone A <span class="pull-right badge bg-dst-purple">GROUP HUMAN RESOURCES</span></a></li>
							<li><a href="#">Zone B <span class="pull-right badge bg-dst-purple">CUSTOMER SERVICES</span></a></li>
							<li><a href="#">Zone C <span class="pull-right badge bg-dst-purple">PRODUCT</span></a></li>
							<li><a href="#">Zone D <span class="pull-right badge bg-dst-purple">NETWORK INFRASTRUCTURE</span></a></li>
							<li><a href="#">Zone E <span class="pull-right badge bg-dst-purple">MULTIMEDIA SERVICES</span></a></li>
							<li><a href="#">Zone F <span class="pull-right badge bg-dst-purple">IT SERVICES</span></a></li>
							<li><a href="#">Zone G <span class="pull-right badge bg-dst-purple">GROUP FACILITIES MANAGEMENT</span></a></li>
							<li><a href="#">Zone H <span class="pull-right badge bg-dst-purple">KRISTAL ASTRO / KRISTAL MEDIA</span></a></li>
							<li><a href="#">Zone I <span class="pull-right badge bg-dst-purple">DSTINCOMM</span></a></li>
							<li><a href="#">Zone J <span class="pull-right badge bg-dst-purple">DSTSOLUTION</span></a></li>
							<li><a href="#">Zone K <span class="pull-right badge bg-dst-purple">GROUP CEO</span></a></li>
						  </ul>
						
						</div><!-- /.box-body -->
					  </div><!-- /.box -->
					
					<div class = "pull-right">
                      <a href = "id_pass_form1.php" type="button" class="btn btn-green btn-lg"> <i class = "fa fa-arrow-left"></i> Back</a>
                      <button type = "submit" class="btn btn-purple btn-lg">Submit Form  <i class = "fa fa-arrow-right"></i> </button>
					
					</div>
				</div>
				
                </div>
				
				
            
				
            </div>
			
			<div class = "row">
				<div class = "col-md-12">
                   
				</div>
			</div>
        </div>
    </div>
	</form>
    <?php
include("footer.php");

?>
