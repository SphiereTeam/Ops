<?php
include("nav.php");

if(isset($_REQUEST['cmd_gen']) && $_REQUEST['cmd_gen'] == "gen_month"){
	$year = $_REQUEST['year'];
	$sql = "select * from payrolldate where PayrollYear = '$year'";
	if($query_run = mysql_query($sql)){
		$num_rows = mysql_num_rows($query_run);
		
		if($num_rows > 0){
			
		}
		else{
			for($x = 1;$x<=12;$x++)
			mysql_query("INSERT INTO `payrolldate` (`PayrollDateID`, `PayrolMonth`, `PayrollYear`, `PayrolStart`, `PayrolCalculationUpto`, `status`) 
			VALUES ('', '$x', '$year', '', '', '');");
		}
	}
}
if(isset($_REQUEST['cmd_gen']) && $_REQUEST['cmd_gen'] == "save_date"){
	$year = $_REQUEST['yearID'];
		for($x = 1;$x<=12;$x++){
			$payrolStart = @$_REQUEST[$year."frm".$x];
			$payrolend = @$_REQUEST[$year."to".$x];
			mysql_query("update payrolldate set PayrolStart = '$payrolStart', PayrolCalculationUpto = '$payrolend' where PayrollYear = '$year' and PayrolMonth = '$x'") or die("err");
		}
	
}
?>
<script>
function generate_month(){
	var x = document.month;
	if(x.year.value == "0"){
		alert("Please Select Year");
		return false;
	}
	else{
		x.cmd_gen.value = "gen_month";
		x.submit();
	}
}

function save_changes(yearID){
	
	var yearV =yearID
	var x = document.month;
	x.cmd_gen.value = "save_date";
	x.yearID.value = yearV;
	x.submit();
}
</script>

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
			Payroll Date Configuration
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Payroll Date Configuration</li>
            </ol>
        </section>
        <section class="content">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Payroll Calendar</h3>
			  <div class = "pull-right">
			  <a class="btn btn-block btn-social btn-purple" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-calendar"></i> New Calendar Year
              </a>
			  <form name = "month" method = "POST" action = "<?php echo $current_file;?>">
			  <input type = "hidden" name = "cmd_gen" />
			  <input type = "hidden" name = "yearID" />
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Generate New year Calendar</h4>
					  </div>
					  <div class="modal-body">
								<h4>Year</h4>
								<?php
								$year = date("Y");
								?>
								<select class = "form-control" name = "year">
									<option value = "0">Please select</option>
									<option><?php echo $year;?></option>
									<option><?php echo $year+1;$year +=1;?></option>
									<option><?php echo $year+1;?></option>
								</select>
								
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-purple" onclick = "generate_month()">Generate Month</button>
					  </div>
					</div>
				  </div>
				</div>

				
			  
			  
			  </div>
            </div>
            <!-- /.box-header -->
        
		<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Payroll Year</th>
                  <th>Status</th>
                  <th>No of month</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				
				$sql = mysql_query("select * from payrolldate group by PayrollYear");
				while($row = mysql_fetch_array($sql)){
					
				?>
				<tr>
                  <td><?php echo $row['PayrollYear'];?></td>
                  <td> <?php echo $row['status'];?></td>
                  <td>12</td>
                  <td>
				  <span><button class = "btn btn-purple btn-sm"   data-toggle="modal" data-target="#myModal<?php echo $row["PayrollYear"]?>"><i class = "fa fa-pencil"></i></button></span>
				  
				  </td>
                </tr>
				
				<?php	
				}
				?>
				<?php
				$sql12 = mysql_query("select * from payrolldate group by PayrollYear");
				while($a = mysql_fetch_array($sql12)){
				
				?>
				<!-- Modal -->
				<div class="modal fade" id="myModal<?php echo $a["PayrollYear"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Payroll Date for Year <?php echo $a['PayrollYear'];?></h4>
					  </div>
					  <div class="modal-body">
								<div class = "row">
									<div class = "col-md-4">
										Month
									</div>
									<div class = "col-md-4">
									Payroll Start
									</div>
									<div class = "col-md-4">
									Payroll calculation up to
									</div>
								
								</div>
								<hr/>
						<?php
						$sql = mysql_query("select * from PayrollDate where PayrollYear = '".$a['PayrollYear']."' order by PayrolMonth ASC");
						while($rows = mysql_fetch_array($sql)){
						$month=$rows['PayrolMonth'];
						$monthName = date('F', mktime(0, 0, 0, $month, 10));	
							
						?>		
								<div class = "row">
									<div class = "form-group">
										<div class = "col-md-4">
											<h5><?php if($rows['PayrolStart'] != "0000-00-00" || $rows['PayrolCalculationUpto'] != "0000-00-00") {?><span style = "color:green;"class="fa fa-thumbs-up"><?php }else{ ?> <span  style = "color:red;"class="fa fa-thumbs-down"><?php }?></span><?php echo "   ".$monthName;?><?php ?></h5>
										</div>
										<div class = "col-md-4">
										<input  class = "form-control input-sm" type = "date" name = "<?php echo $a['PayrollYear']."frm".$month; ?>" value = "<?php echo $rows['PayrolStart']?>"/>
										</div>
										<div class = "col-md-4">
										<input class = "form-control input-sm" type = "date" name = "<?php echo $a['PayrollYear']."to".$month; ?>" value = "<?php echo $rows['PayrolCalculationUpto']?>" />
										</div>
									
									</div>
								</div>
						<?php
						}
						?>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Deactivate</button>
						
						<button onclick = "save_changes(<?php echo $a["PayrollYear"];?>)" class="btn btn-primary">Save changes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>
               <?php
			   }
			   ?>
               
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</section>
		</form>
</div>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
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