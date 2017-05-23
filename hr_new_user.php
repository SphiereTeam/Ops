<?php
include("nav.php");
include("database_connection.php");

$month = $_REQUEST['month'];
mysql_query("INSERT INTO `attendance` (`attendance_id`, `EmpNo`, `Year`, `Month`, `Punch_card_upload`, `created`, `status`) 
					VALUES ('', '$user_id', '$year', '$month', '', '$date', '$user_id')") or die("error");
?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
			New User Registration
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">New User Registration</li>
            </ol>
        </section>
        <section class="content">
			<div class = "box">
				<div class = "box-header">
					 <h3 class="box-title">Personal Information</h3>
				</div>
				<form name = "new_sheet" method = "POST" action = "<?php echo $current_file; ?>">
				 <div class="box-body">
				 <div class = "col-md-6">
					<div class="form-group">
						  <label for="exampleInputEmail1">Full Name</label>
						  <input type="text" class="form-control" placeholder="Enter full name" name="fullname">
						</div>
				 </div>
				 </div>
				 
				 <div class = "box-header">
					 <h3 class="box-title">Job Status</h3>
				</div>
				 <div class="box-body">
				 <div class = "col-md-6">
					<div class="form-group">
						  <label for="exampleInputEmail1">Employment Type</label>
						  <select class="form-control" >
							<option>--Please Select--</option>
							<?php
							$sql = mysql_query("select * from usertemplevel");
							while($row = mysql_fetch_array($sql)){
								?>
								<option><?php echo $row['UserTempLevel_name']?></option>
								<?php
							}
							?>
						  </select>
						</div>
				 </div> 
				 <div class = "col-md-6">
					<div class="form-group">
						  <label for="exampleInputEmail1">Daily basis salary</label>
							 <div class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" class="form-control" placeholder="xxx.xx" />
							  </div>
						</div>
				 </div>
				 </div>
				 
				 <div class = "box-header">
					 <h3 class="box-title">Account Setting</h3>
				</div>
				<div class="box-body">
				 <div class = "col-md-6">
					<div class="form-group">
						  <label for="exampleInputEmail1">User name</label>
						  <input type="text" class="form-control" placeholder="Enter full name">
						</div>
				 </div> 
				 <div class = "col-md-6">
					<div class="form-group">
						  <label for="exampleInputEmail1">Assign password</label>
						  <input type="text" class="form-control" placeholder="Enter full name">
						</div>
				 </div>
				 </div>
				 <div class = "box-header">
					 <h3 class="box-title">Security Access Pass ID</h3>
				</div>
				<div class="box-body">
				 <div class = "col-md-6">
					<div class="form-group">
						  <label for="exampleInputEmail1">Pass ID Number</label><br/>
						  <i>Pass ID number is located at the behind of the physical pass ID</i>
						  <input type="text" class="form-control" placeholder="0000:00000">
						</div>
				 </div> 
				
				 </div>
				 
				 <div class = "box-footer">
					<div class = "pull-right">
						<a type = "button" class = "btn btn-purple">Create User</a>
					</div>
				 
				 </div>
				</form>
			</div>
		</section>
		</div>
<?php
include("footer.php");
?>