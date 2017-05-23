<?php
include("nav.php");
?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
			User Lists
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User Lists</li>
            </ol>
        </section>
        <section class="content">
			<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Users Table</h3>
			  <h5>This table will gather all user in this system and make them dynamically searchable</h5>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-bordered table-striped">
                <thead><tr>
                  <th>User ID</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>User Type</th>
                  <th>Email</th>
                </tr>
				</thead>
				<tbody>
				<?php
				$sql = mysql_query("select * from users");
				while($row = mysql_fetch_array($sql)){
				?>
				<tr>
                  <td><?php echo $row['EmpNo'];?></td>
                  <td><span> <img src="dist/img/users/<?php echo $row['EmpNo'];?>.jpg" class="img-circle img-sm 1x" alt="User Image"></span><?php echo ucwords(strtolower($row['FullName']));?></td>
                  <td><?php echo ucwords(strtolower($row['UserName']));?></td>
                  <td>
				 
				  <span class="label label-success">Permanent</span>
				  <?php
				  if($row['level'] == "9"){
					  ?>
					  
				  <span class="label bg-red">Admin</span>
					  <?php
				  }
				  if($row['level'] == ""){
					  ?>
					  
				  <span class="label bg-blue">Normal Users</span>
					  <?php
				  }
				  ?>
				  </td>
                  <td><?php echo $row['Email']; ?></td>
                </tr>
				<?php
				}
				?>
                
				<?php
				$sql = mysql_query("select * from UserTemp");
				while($row = mysql_fetch_array($sql)){
				?>
				<tr>
                  <td><?php echo $row['UserTempId'];?></td>
                  <td><span> <img src="dist/img/users/<?php echo $row['dp_picture']?>.jpg" class="img-circle img-sm 1x" alt="User Image"></span><?php echo ucwords(strtolower($row['User_name']));?></td>
                  <td><?php echo ucwords(strtolower($row['UserId']));?></td>
				  <td>
				  <?php
				  $sql1 = mysql_query("select * from usertemplevel where UserTempLevelId = '".$row['user_type']."'");
				  $type = mysql_result($sql1,0,'UserTempLevelId');
				  $type_name = mysql_result($sql1,0,'UserTempLevel_name');
				  
				if($type == "2"){
				?>
				<span class="label label-purple"><?php echo $type_name;?></span>
				<?php
				} 
				if($type == "1"){
				?>
				<span class="label label-green"><?php echo $type_name;?></span>
				<?php
				}
					  
				  ?>
				  </td>
                  <td></td>
                </tr>
				<?php
				}
				?>
                
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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