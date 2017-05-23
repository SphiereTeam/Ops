	<?php
include("nav.php");


if(isset($_POST['cmd']) && $_POST['cmd'] == "approve"){
	$attendance_id = $_POST['attendance_id'];
	echo $attendance_id;

			mysql_query("UPDATE `attendance_status` SET `1_status` = 'approved' WHERE `attendance_status`.`attendance_id` = '$attendance_id'") or die("error");

}
?>
<script>
function view_attendance(aid){

	var x = document.attachment_form;
	x.attendance_id.value = aid;
	x.action='view_attendance.php';
	x.submit();
}
function approve_attendance(aid){

	var x = document.attachment_form;
	x.attendance_id.value = aid;
	x.cmd.value = "approve";
	x.submit();
}
function approve_application(kid){

	var x = document.attachment_form;
	x.kid.value = kid;
	x.cmd.value = "approve_kantech";
	x.submit();
}
function reject_app(kid){

	var x = document.attachment_form;
	x.kid.value = kid;
	x.cmd.value = "reject_kantech";
	x.submit();
}
</script>
<form name = "attachment_form" method = "POST">
<input type = "hidden" name = "attendance_id"/>
<input type = "hidden" name = "kid"/>
<input type = "hidden" name = "cmd"/>
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
			Pending my approval
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pending my approval</li>
            </ol>
        </section>
        <section class="content">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-calendar"></i> Attendance Approval</h3>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>Date Submitted</th>
                  <th>Month</th>
                  <th>Progress</th>
                  <th>Approve</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$sql = mysql_query("SELECT * FROM `attendance_status` 
				WHERE  `1` = $user_id and `1_status` LIKE 'pending'");
				
				while($row = mysql_fetch_array($sql)){
					$attendance_id = $row['attendance_id'];
					$sq = mysql_query("select attendance.*,usertemp.* from attendance, usertemp where attendance.EmpNo = usertemp.UserTempId and attendance.attendance_id = $attendance_id") or die("error");
					$student_name=mysql_result($sq,0,'usertemp.User_name');
					
					$date=mysql_result($sq,0,'attendance.created');
					$month=mysql_result($sq,0,'attendance.Month');
					$monthName = date('F', mktime(0, 0, 0, $month, 10));
					
					
				
					
				?>
				<tr>
                  <td><?php echo $student_name;?></td>
                  <td> <?php echo date('d M Y',strtotime($date));?></td>
                  <td><a onclick = "view_attendance(<?php echo $attendance_id;?>)" class = "btn btn-purple btn-sm"><span class = "fa fa-calendar"></span><?php echo "  ".$monthName; ?></a></td>
                  <td><div class="progress active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                  <span class="sr-only">25% Complete (success)</span>
                </div>
              </div></td>
                  <td> 
                 <a class = "btn btn-purple btn-flat btn-sm" data-toggle="modal" data-target="#myModalApprove<?php echo $attendance_id;?>">Yes</a>
                 <a class = "btn btn-green  btn-flat btn-sm"  data-toggle="modal" data-target="#myModal<?php echo $attendance_id; ?>">No</a>
				 </td>
                </tr>
				
				<div class="modal fade" id="myModal<?php  echo $attendance_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
					  </div>
					  <div class="modal-body">
					  
						<div class = "form-group">
							<label>Enter remarks</label>
							<textarea class = "form-control"></textarea>
						<i>Note : This cannot be undone.</i>
						</div>
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Yes, Im sure!</button>
						
						<button class="btn btn-green" data-dismiss="modal" aria-label="Close">No</button>
					  </div>
					</div>
				  </div>
				</div>
				
				<div class="modal fade" id="myModalApprove<?php echo $attendance_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Approve the attendance?</h4>
					  </div>
					  <div class="modal-body">
					  
						<div class = "form-group">
							<label>Once approved, the attendance will goes to another level of approval before HR</label><br/>
							
						<i>Note : This cannot be undone.</i>
						</div>
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-purple" onclick = "approve_attendance('<?php echo $attendance_id;?>')">Yes, Im sure!</button>
						
						<a class="btn btn-green" data-dismiss="modal" aria-label="Close">Cancel</a>
					  </div>
					</div>
				  </div>
				</div>
				
				<?php	
				
				}
				?>
               
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Employee Name</th>
                  <th>Date</th>
                  <th>Month</th>
                  <th>Progress</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		  
		  
		  	
</div>
</form>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>



<?php
include("footer.php");
?>