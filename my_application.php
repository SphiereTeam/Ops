<?php
include("nav.php");
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
			Pending my approval
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">My Application List</li>
            </ol>
        </section>
        <section class="content">
		
		  
		  <div class="box">
            <div class="box-header">
			
              <h3 class="box-title"><i class="fa fa-users"></i>  DST ID Security Access Pass Application</h3>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Application Type</th>
                  <th>Date Submitted</th>
				  
                  <th>Door Requested</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$sql0 = mysql_query("select * from kantech_application where kant_app_emp_no = '$user_id'") or die("error");
				
				$count = mysql_num_rows($sql0);
			
				if($count == "1"){
					$application_type = mysql_result($sql0,0,'kant_application_type');
					$date = mysql_result($sql0,0,'kant_app_date_apply');
					$kant_app_id = mysql_result($sql0,0,'kant_app_id');
					
				?>
				<tr>
                    <td> <?php echo $application_type;?></td>
                  <td> <?php echo date("d-M-y",strtotime($date));?></td>
                
                  <td>
					<?php
					$sql2 = mysql_query("select * from kantech_application_details where kant_app_id = '".$kant_app_id."' GROUP BY zone");
					
					while($row2 = mysql_fetch_array($sql2)){
						$zone_specific = $row2['zone'];
						echo "<h5>ZONE ".$zone_specific;
						$c = mysql_query("select * from kantech_zone where Zone_ID = '$zone_specific'");
						$num_row = mysql_num_rows($c);
						
						if($num_row == "1"){
							
							$approver = mysql_result($c,0,'Zone_owner_emp_id');
							$approver_name = getuserfield('FullName',$approver);
						}
						else{
							$approver_name = "Not Set";
						}
						echo "  (<i>Pending $approver_name approval</i>)</h5>";
							$sql3 = mysql_query("select * from kantech_application_details where kant_app_id = '".$kant_app_id."' and zone LIKE '$zone_specific'");
							while($row3 = mysql_fetch_array($sql3)){
									$kant_abbr = $row3['kant_door_id'];
									$sql4 = mysql_query("select * from kantechdoor where kant_door_abbr = '$kant_abbr'");
									$door_name = mysql_result($sql4,0,'kant_door_name');
								?>
								<div class="form-group"> 
									<div class="checkbox">
									<label>
									<input type="checkbox" name = "zone[]" checked value = "<?php echo $kant_abbr;?>" >
									<?php echo $door_name;?>
									</label>
									</div>
								</div><br/>
								<?php
							}
							?>
							<hr/>
							<?php
					
					}
					?>
				  </td>
                
                </tr>
			
				<?php
               }
				
					
				?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Application Type</th>
                  <th>Date Submitted</th>
                 
				   <th>Door Requested</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
		  
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
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


<?php
include("footer.php");
?>