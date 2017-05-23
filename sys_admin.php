<?php
include("nav.php");

?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        System Control Panel
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">
<div class="box">
            <div class="box-header">
			
              <h3 class="box-title"><i class="fa fa-users"></i>  User Group For HRMS Users</h3>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Level ID</th>
                  <th>Previleges</th>
                  <th>No Of User</th>
				  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
			   $sql = mysql_query("select * from level");
			   while($row = mysql_fetch_array($sql)){
				   $sql2 = mysql_query("select * from users where level ='".$row['level_id']."'");
					$no = mysql_num_rows($sql2);				   
				   ?>
				   <tr>
						<td><?php echo $row['level_id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $no; ?></td>
						<td></td>
				   </tr>
				   
				   <?php
			   }
			   ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Level ID</th>
                  <th>Previleges</th>
                  <th>No Of User</th>
				  
                  <th>Action</th>
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
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
    <?php
        include("footer.php");
        ?>
