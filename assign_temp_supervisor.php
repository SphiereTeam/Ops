<?php
include("nav.php");
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
						Assign Part Time Employee Supervisor
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Assign Part Time Employee Supervisor</li>
            </ol>
        </section>
        <section class="content">
		
		<div class = "row">
		<div class = "col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Part Time Employee with assigned supervisor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>1st level Supervisor</th>
                  <th>2nd level Supervisor</th>
                  <th>3rd level Supervisor</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$sql = mysql_query("select * from usertemp where user_type != '1'");
				
			
				while($row = mysql_fetch_array($sql)){
					?>
				<tr>
                  <td><?php echo $row['User_name'];?></td>
				  <?php
				  if($sq = mysql_query("select * from usertempapprover = '".$row['UserTempId']."'")){
					 $num_row = mysql_num_rows($sq);
					  if($num_row == "1"){
						$one = mysql_result($sq,0,'1');
						$two = mysql_result($sq,0,'2');
						$three = mysql_result($sq,0,'3');
						}
				  }
					?>
					 <td><?php if(isset($one) && $one != ""){echo getName($one);}else{echo "<i>Not Set</i>";}?> </td>
					  <td><?php if(isset($two) && $two != ""){echo getName($two);}else{echo "<i>Not Set</i>";}?> </td>
					  <td> <?php if(isset($three) && $three != ""){echo getName($three);}else{echo "<i>Not Set</i>";}?> </td>
					<?php
				 
				  ?>
                 
                  <td><a class = "btn btn-purple btn-xs" title = "Edit"  data-toggle="modal" data-target="#myModal<?php echo $row["UserTempId"]?>"><i class = "fa fa-pencil"></i></button></td>
                </tr>	
				<div class="modal fade" id="myModal<?php echo $row["UserTempId"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Supervisor for <?php echo getTempName($row["UserTempId"]);?> </h4>
					  </div>
					  <div class="modal-body">
								
									<div class="box-body">
									<div class = "row">
											<div class="form-group" style = "text-align:center;">
											  <label>1st Level Supervisor</label>
											  <input type="text" class="form-control" placeholder="Enter ...">
											</div>
											<i class = "fa fa-arrow-down"></i><br/>
											<div class="form-group" style = "text-align:center;">
											  <label>2nd Level Supervisor</label>
											  <input type="text" class="form-control" placeholder="Enter ...">
											</div>
											<i class = "fa fa-arrow-down"></i><br/>
											<div class="form-group" style = "text-align:center;">
											  <label>3rd Level Supervisor</label>
											  <input type="text" class="form-control" placeholder="Enter ...">
											</div>
										</div>
									</div>
								<hr/>
					
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
                <tfoot>
                <tr>
                  <th>Employee Name</th>
                  <th>1st level Supervisor</th>
                  <th>2nd level Supervisor</th>
                  <th>3rd level Supervisor</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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