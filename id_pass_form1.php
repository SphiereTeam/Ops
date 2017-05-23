<?php
include("nav.php");?>
<script language = "text/javascript" type="text/javascript">

function update_application(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}
function update_application_for(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}
function update_employment(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}
function update_renewal(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}

function next_app(nomber){
	var x = document.application_form;
	if(nomber == "0"){
		x.new_id.value = nomber;
		x.action='tes_page.php';
	}
	else{
		if(nomber == "2"){
			if(x.profile.value == "" || x.fn.value == "" || x.gender.value == "" || x.ic.value == ""){
				alert("Please fill in all field");
				return false;
			}
			else{	
			x.cmd.value = "insert";
			x.action = '<?php echo $current_file;?>';
			}
		}
		if(nomber == "3"){
				if(x.receipt.value == ""){
					alert("Please select scanned receipt")
					x.receipt.focus();
					return false;
				}
				else{
				x.cmd.value = "upload";
				x.action = '<?php echo $current_file;?>';
				}
			}
		if(nomber == "23"){
				if(x.profile.value == "" || x.fn.value == "" || x.gender.value == "" || x.passport.value == "" || x.nationalty.value == "" || x.issue_date.value == "" || x.expiry_date.value == ""){
				alert("Please fill in all field");
				return false;
			}
			else{	
			x.cmd.value = "insert";
			x.action = '<?php echo $current_file;?>';
			}
			}
		
	}
	x.submit();
}
function go_next_app(nomber){
	var x = document.application_form_2;
		x.submit();
}
</script>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($set) && $set == "go"){
		
		echo "<script  language = 'text/javascript' type='text/javascript'>go_next_app();</script>";
		}
}
?>
    <div class="content-wrapper">
	
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
        Application
        <small>Preview page</small>
      </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Application Form</li>
            </ol>
        </section>
		
	
        <!-- Main content -->
	<form name = "application_form" method = "POST" enctype = 'multipart/form-data' >
	<input type = "hidden" name = "cmd"/>
	<input type = "hidden" name = "id"/>
	<input type = "hidden" name = "new_id" <?php if(isset($new_id) && $new_id != ""){echo "value = '$new_id'";}?>/>
	
	 <div class="col-md-6">
			 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>APPLICANT TYPE</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="disabledSelect">Application Type </label>
                                <select class="form-control" name = "application_type" onchange = "update_application(this)">
                                    <option value = "0">--- Please Select ---</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){echo "selected = 'selected'";}?> value = "1">Card Replacement **</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){echo "selected = 'selected'";}?> value = "2">New Application</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "3"){echo "selected = 'selected'";}?> value = "3">Renewal</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "4"){echo "selected = 'selected'";}?> value = "4">Zone Amendment</option>
                                </select>
                            </div>
                        </div>
					</div>
					<?php
					if(isset($_POST['application_type']) && $_POST['application_type'] != ""){
						switch($_POST['application_type']){
								case "1";
								?>
								<div class="panel-body">
									<div class="form-group">
										<div class="form-group">
											<label for="disabledSelect">Replacement type </label>
											<select class="form-control" name = "renewal_type"  onchange = "update_renewal(this)">
												<option value = "0">--- Please Select ---</option>
												<option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){if(isset($_POST['renewal_type']) && $_POST['renewal_type'] == "1"){echo "selected = 'selected'";}}?> value = "1">Faulty/Broken</option>
												<option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){if(isset($_POST['renewal_type']) && $_POST['renewal_type'] == "2"){echo "selected = 'selected'";}}?>  value = "2">Lost</option>
											</select>
										</div>
									</div>
								</div>
								
								<?php
								break;
								
								
								
								case "2";
							?>
							<div class="panel-body">
								<div class="form-group">
									<div class="form-group">
										<label for="disabledSelect">Employment Type </label>
									   <select class="form-control" name = "application_for" <?php if($_POST["application_type"] == "2"){echo "required";}?>  onchange = "update_application_for(this)" >
										<option value = "0">-- Select One --</option>
										<option value = "1"  <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "1"){echo "selected = 'selected'";}}?>>Attachment Student</option>
										<option value = "2" <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "2"){echo "selected = 'selected'";}}?>>Contract</option>
										<option value = "3" <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "3"){echo "selected = 'selected'";}}?>>Contract Expat</option>
										<option value = "4" <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "4"){echo "selected = 'selected'";}}?>>Consultant</option>
										<option value = "5" <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "5"){echo "selected = 'selected'";}}?>>Part Time</option>
										<option value = "6" <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "6"){echo "selected = 'selected'";}}?>>Temporary</option>
										<option value = "7" <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "7"){echo "selected = 'selected'";}}?>> Vendor</option>
									</select>
									</div>
								</div>
							</div>
							<?php
							break;
								case "3";
							?>
							  <div class="row">
									<div class="col-md-12" style="text-align:center;">
										<a onclick = "next_app(<?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){echo "2";}else{echo "0";}?>)" class="btn btn-block btn-purple btn-lg">Next Page<i class = "fa fa-arrow-right pull-right"></i> </a>
									</div>
								</div>
							<?php
							break;
								case "4";
							?>
							  <div class="row">
									<div class="col-md-12" style="text-align:center;">
										<a onclick = "next_app(<?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){echo "2";}else{echo "0";}?>)" class="btn btn-block btn-purple btn-lg">Next Page<i class = "fa fa-arrow-right pull-right"></i> </a>
									</div>
								</div>
							<?php
							break;
						}
					}
					?>
			</div>
	 </div>
	 
	 <div class = "col-md-6">
	 <?php
	  if(isset($_POST["application_type"] ) && $_POST["application_type"] == "2"){
	 if(isset($_POST['application_for']) && $_POST['application_for'] != "0"){
		 ?>
		 
		 
			 <div class="panel panel-default">
					<div class="panel-heading">
                     <h4>I.	DETAILS OF APPLICANT</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Passport Picture</label><br/>
									<i>Please select recent Passport Sized Colour photo with <label class = "label bg-blue">BLUE</label> background</i>
                                    <input class="form-control" type="file" accept="image/*"  name = "profile"  placeholder = "Please select your passport sized photo" />
                             
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" name = "fn" style="text-transform:uppercase;" <?php if($_POST["application_type"] == "2"){echo "required";}?>/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name = "gender" <?php if($_POST["application_type"] == "2"){echo "required";}?>>
                                        <option></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
						<?php
						 if(isset($_POST['application_for']) && $_POST['application_for'] == "7"){
							 ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" name = "project_name" style="text-transform:uppercase;" <?php if($_POST["application_type"] == "2"){echo "required";}?>/>
                                </div>
                            </div>
							<?php
						 }
						 else{
							 
						 }
						 if((isset($_POST['application_type']) && $_POST['application_type'] == "2") && (isset($_POST['application_for']) && $_POST['application_for'] == "3")){
							 ?>
							 
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport Number</label>
                                    <input class="form-control" name = "passport" style="text-transform:uppercase;" <?php if($_POST["application_type"] == "2" && $_POST["application_for"] == "3"){echo "required";}?>/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <input class="form-control" name = "nationalty" style="text-transform:uppercase;" <?php if($_POST["application_type"] == "2" && $_POST["application_for"] == "3"){echo "required";}?>/>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>issue Date</label>
                                    <input type = "date" class="form-control" name = "issue_date" style="text-transform:uppercase;" <?php if($_POST["application_type"] == "2" && $_POST["application_for"] == "3"){echo "required";}?>/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input type = "date" class="form-control" name = "expiry_date" style="text-transform:uppercase;" <?php if($_POST["application_type"] == "2" && $_POST["application_for"] == "3"){echo "required";}?>/>
                                </div>
                            </div>
                           
							<?php
						 }
						 else{
							 
						 }
						 
						 if(isset($_POST['application_for']) && $_POST['application_for'] != "3"){
							?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Brunei I.C No</label>
                                    <input class="form-control" style="text-transform:uppercase;" name = "ic" <?php if($_POST["application_type"] == "2"){echo "required";}?>/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color</label>
                                    <select class="form-control" name = "color" <?php if($_POST["application_type"] == "2"){echo "required";}?>>
									
                                        <option>-- Select One --</option>
                                        <option>Yellow</option>
                                        <option>Purple</option>
                                        <option>Green</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input type="date" class="form-control" name= "expiry_date"/>
                                </div>
                            </div>
							<?php 
						 }
						 else{
							 
						 }
							?>
                        </div>
                    </div>
                    </div>
					  
						  <div class="row">
							<div class="col-md-12" style="text-align:center;">
								<a onclick = "next_app(<?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){if(isset($_POST['application_for']) && $_POST['application_for'] == "3"){echo "23";}else{echo "2";}}?>)" class="btn btn-block btn-purple btn-lg">Next Page<i class = "fa fa-arrow-right pull-right"></i> </a>
							</div>
						</div>
						
		 
		 <?php
		 }
		 
	 }
	 
	 if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){
	 if(isset($_POST['renewal_type']) && ($_POST['renewal_type'] == "1" || $_POST['renewal_type'] == "2")){
		?>	 <div class="panel panel-default">
					<div class="panel-body">
									<div class="form-group">
										<label>Scanned Receipt issued by finance (Pdf or Img format only)</label>
										<input type="file" class="form-control" name = "receipt"/>
									</div>
									<hr />
								</div>
								  <div class="row">
									<div class="col-md-12" style="text-align:center;">
									
										<a onclick = "next_app('3')" class="btn btn-block btn-purple btn-lg">Next Page<i class = "fa fa-arrow-right pull-right"></i> </a>
									</div>
								</div>
								</div>
		<?php
	}
	}
	 ?>
	
						
	 </div>
	



	</div>
	
	</form>

    <?php
		include("footer.php");


if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "upload"){
if(isset($_FILES["receipt"]['name']) && $_FILES["receipt"]['name'] != ""){
	
	if(isset($_POST['renewal_type']) && $_POST[''] != ""){
	$renewal_type = $_POST['renewal_type'];
	echo $renewal_type;
}
else{
	$renewal_type = "";
}


	$temp = explode(".", $_FILES["receipt"]["name"]);
	$newfilename = round(microtime(true)).'.'.end($temp);
	move_uploaded_file($_FILES["receipt"]["tmp_name"], "dist/receipt/".$newfilename);
	$scanned = "dist/receipt/".$newfilename;
	?>
	<script type = "text/javascript">
	$(window).load(function(){
		$("#myModal3").modal('show');
		
	});
 </script>
	<?php
	
}
else
{
	$scanned = "";
}

}	

if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "insert"){
	
if(isset($_POST['renewal_type']) && $_POST[''] != ""){
	$renewal_type = $_POST['renewal_type'];
	echo $renewal_type;
}
else{
	$renewal_type = "";
}


if(isset($_POST['fn']) && $_POST['fn'] != ""){
	$fn = mysql_real_escape_string(strtoupper($_POST['fn']));
	echo $fn;
}
else{
	$fn = "";
}

if(isset($_POST['gender']) && $_POST['gender'] != ""){
	$gender = $_POST['gender'];
	echo $gender;
}
else{
	$gender = "";
}


if(isset($_POST['ic']) && $_POST['ic'] != ""){
	$ic = $_POST['ic'];
	echo $ic;
}
else{
	$ic = "";
}


if(isset($_POST['color']) && $_POST['color'] != ""){
	$color = $_POST['color'];
	echo $color;
}
else{
	$color = "";
}

if(isset($_POST['issue_date']) && $_POST['issue_date'] != ""){
	$issue_date = $_POST['issue_date'];
	echo $issue_date;
}
else{
	$issue_date = "";
}
if(isset($_POST['passport']) && $_POST['passport'] != ""){
	$passport = $_POST['passport'];
	echo $passport;
}
else{
	$passport = "";
}
if(isset($_POST['nationalty']) && $_POST['nationalty'] != ""){
	$nationalty = $_POST['nationalty'];
	echo $nationalty;
}
else{
	$nationalty = "";
}
if(isset($_POST['expiry_date']) && $_POST['expiry_date'] != ""){
	$expiry_date = $_POST['expiry_date'];
	echo $expiry_date;
}
else{
	$expiry_date = "";
}

if(isset($_POST['application_for']) && $_POST['application_for'] != ""){
	$application_for = $_POST['application_for'];
	echo $application_for;
}

else{
	$application_for = "";
}
if(isset($_POST['job_post']) && $_POST['job_post'] != ""){
	$job_post = $_POST['job_post'];
	echo $job_post;
}
else{
	$job_post = "";
}


if(isset($_POST['unit']) && $_POST['unit'] != ""){
	$unit = $_POST['unit'];
	echo $unit;
}
else{
	$unit = "";
}


if(isset($_POST['start_date']) && $_POST['start_date'] != ""){
$start_date = $_POST['start_date'];
	echo $start_date;
}
else{
	$start_date = "";
}


if(isset($_POST['end_date']) && $_POST['end_date'] != ""){
	$end_date = $_POST['end_date'];
	echo $end_date;
}
else{
	$end_date = "";
}
if(isset($_POST['project_name']) && $_POST['project_name'] != ""){
	$project_name = $_POST['project_name'];
	echo $project_name;
}
else{
	$project_name = "";
}

if(isset($_POST['application_for']) && $_POST['application_for'] != ""){
	$application_for = $_POST['application_for'];
	
	if($application_for == "1"){$application_for = "Attachment";}
	if($application_for == "2"){$application_for = "Contract";}
	if($application_for == "3"){$application_for = "Contract Expat";}
	if($application_for == "4"){$application_for = "Consultant ";} 
	if($application_for == "5"){$application_for = "Part Time ";}
	if($application_for == "6"){$application_for = "Temporary";} 
	if($application_for == "7"){$application_for = "Vendor";}
	
}
else{
	$application_for = "";
}
if(isset($_POST['project_name']) && $_POST['project_name'] != ""){
	$project_name = mysql_real_escape_string($_POST['project_name']);
	echo $project_name;
}
else{
	$project_name = "";
}


mysql_query("INSERT INTO `test`.`kantech_application_temp` 
(`kantech_app_temp`, `FullName`, `IC_Number`, `type`, `gender`, `ic_color`,`passport`,`nationalty`, `issue_date`, `expiry_date`, `unit`, `dept`, `job_post`, `company`, `dst_porject`,`upload`) 
VALUES ('', '$fn', '$ic', 'new application', '$gender', '$color','$passport','$nationalty','$issue_date', '$expiry_date', '', '', '$application_for', '', '$project_name','')");

$new_id = mysql_insert_id();
if(isset($_FILES["profile"]['name']) && $_FILES["profile"]['name'] != ""){
	$temp = explode(".", $_FILES["profile"]["name"]);
	$newfilename = $new_id.'.'.end($temp);
	move_uploaded_file($_FILES["profile"]["tmp_name"], "dist/img/user_temp/".$newfilename);
	$profile_loc = "dist/img/user_temp/".$newfilename;
	
	
}
else
{
	$profile_loc = "";
}

mysql_query("UPDATE `kantech_application_temp` SET `upload` = '$profile_loc' WHERE `kantech_application_temp`.`kantech_app_temp` = $new_id") or die("Error");

?>
<script type = "text/javascript">
	$(window).load(function(){
		$("#myModal").modal('show');
		
	});
 </script>

<?php
//header("Location: tes_page.php?new_id=$new_id");
}
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Notification</h4>
                                        </div>
                                        <div class="modal-body">
										You will be redirected to next page for Door selection
										<form name = "application_form_2" method = "POST" action = "tes_page.php" >
											<?php echo $application_for;?>
											<input type = "hidden" name = "new_id_2" <?php if(isset($new_id) && $new_id != ""){echo "value = '$new_id'";}?>/>
											<input type = "hidden" name = "application_type" value = "New Application for <?php echo $_POST['application_for']?>"/>
										</div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-purple" >Continue</button>
                                            
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Notification</h4>
                                        </div>
                                        <div class="modal-body">
										You receipt was uploaded successfully. You will be redirected to next page for Door selection
										<form name = "application_form_3" method = "POST" action = "tes_page.php" >
											
											<input type = "hidden" name = "scanned" <?php if(isset($scanned) && $scanned != ""){echo "value = '$scanned'";}?>/>
											<input type = "hidden" name = "application_type" value = "Card Replacement"/>
										</div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-purple" >Continue</button>
                                            
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>