<?php
include("nav.php");
?>
<script>
function view_attendance_hr(aid,sid){

	var x = document.attachment_form;
	x.attendance_id.value = aid;
	x.student_id.value = sid;
	x.action='view_attendance_hr.php';
	x.submit();
}
</script>
<form name = "attachment_form" method = "POST">
<input type = "hidden" name = "attendance_id"/>
<input type = "hidden" name = "student_id"/>
<input type = "hidden" name = "cmd"/>
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
			Generate Payroll Report
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Generate Payroll Report</li>
            </ol>
        </section>
        <section class="content">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-calendar"></i> Payroll Report Generation</h3>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Select</th>
                  <th>Employee Name</th>
                  <th>Date Submitted</th>
                  <th>Month</th>
                  <th>No. of days<br/>Payment</th>
                  <th>Progress</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$sql = mysql_query("SELECT * FROM `attendance_status` 
				WHERE 
				 current_status LIKE 'ready' and `pointer` = '$user_id'");
				
				while($row = mysql_fetch_array($sql)){
					$attendance_id = $row['attendance_id'];
					$sq = mysql_query("select attendance.*,usertemp.* from attendance, usertemp where attendance.EmpNo = usertemp.UserTempId and attendance.attendance_id = $attendance_id GROUP BY user_type ASC") or die("error");
					$student_id=mysql_result($sq,0,'usertemp.UserTempId');
					$student_name=mysql_result($sq,0,'usertemp.User_name');
					$pay_per_day=mysql_result($sq,0,'usertemp.pay_per_day');
					
					$date=mysql_result($sq,0,'attendance.created');
					$month=mysql_result($sq,0,'attendance.Month');
					$monthName = date('F', mktime(0, 0, 0, $month, 10));
					
					
				
					
				?>
				<tr>
                  <td><input type = "checkbox"></td>
                  <td><?php echo $student_name;?></td>
                  
				  
				  <td> <?php echo date('d M Y',strtotime($date));?></td>
                  
				  
				  <td><a onclick = "view_attendance_hr('<?php echo $attendance_id;?>','<?php echo $student_id;?>')" class = "btn btn-purple btn-sm"><span class = "fa fa-calendar"></span><?php echo "  ".$monthName; ?></a></td>
                   
				   
				   <td>
					<?php
							$sql2= mysql_query("select * from attendance_calculate where attendance_id = '$attendance_id' and student_id = '$student_id' and status = 'active'");
							$num_rows = mysql_num_rows($sql2);
							
							if($num_rows == "1"){
								$total_day = mysql_result($sql2,0,'no_of_days');
								$total_payment = mysql_result($sql2,0,'payment'); 
							
								echo $total_day." days x $".$pay_per_day;
								echo "<h4 style = 'color:green;'>$".number_format(($total_day*$pay_per_day),2)."</h4>";
							}
							else{
								$total_day = "dsad";
								$total_payment = "";
							}
					?>						
				   
				   </td>
				  
				  
				  <td><div class="progress active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                  <span class="sr-only">25% Complete (success)</span>
                </div>
              </div></td>
			 
               
                </tr>
				
				
				<?php	
				
				}
				?>
               
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</section>
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