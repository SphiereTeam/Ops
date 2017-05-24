<?php include("nav.php"); ?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>User Lists<small>page</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">User Lists</li>
		</ol>
	</section><!-- /.content-header -->


	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Responsive Users Table</h3>
						<h5>This table will gather all user in this system and make them dynamically searchable</h5>
					</div><!-- /.box-header -->

					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>User ID</th>
									<th>Full Name</th>
									<th>Username</th>
									<th>User Type</th>
									<th>Email</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$query = "SELECT * FROM users";
									$result = $connection->query($query);
								?>
								<?php if ($result = mysqli_query($connection, $query)) : ?>
									
									<!-- fetch results -->
									<?php while ($row = mysqli_fetch_assoc($result)) : ?>
										<tr>
											<td><?php echo $row['EmpNo'];?></td>
											<td>
												<span><img src="dist/img/users/<?php echo $row['EmpNo'];?>.jpg" class="img-circle img-sm 1x" alt="User Image"></span><?php echo ucwords(strtolower($row['FullName']));?>
											</td>
											<td><?php echo ucwords(strtolower($row['UserName']));?></td>
											<td>
												<span class="label label-success">Permanent</span>
												<?php if($row['level'] == "9"): ?>
													<span class="label bg-red">Admin</span>
												<?php else: ?>
													<span class="label bg-blue">Normal Users</span>
												<?php endif; ?>
											</td>
											<td><?php echo $row['Email']; ?></td>
										</tr>
									<?php endwhile; ?>
									
									<!-- free result set -->
									<?php mysqli_free_result($result); ?>

								<?php endif; ?>
								
								<!-- close connection -->
								<?php mysqli_close($connection); ?>

							</tbody>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col-xs-12 -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
		
		
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