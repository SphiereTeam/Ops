<?php
include("nav.php");

?>
<style>
datalist{
	display:none;
}
</style>

<script>

</script>

    <!-- Content Wrapper. Contains page content -->
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
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username text-center">Online Securiy Pass Application</h3>
                            <h5 class="widget-user-desc text-center">DST ID PASS</h5>
                        </div>
                        <div class="box-footer">
                            <div class="row text-center">
                                <div class="btn-group margin">
                                    <a type="button" class="btn btn-info" href="id_pass_form1.php">Apply Now</a>
                                    <button type="button" class="btn btn-info">Impersonate</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-olive-active">
                            <h3 class="widget-user-username text-center">Attachment Student Application</h3>
                            <h5 class="widget-user-desc text-center">Request for attachment student</h5>
                        </div>
                        <div class="box-footer">
                            <div class="row text-center">
                                <button type="button" class="btn bg-olive margin">Apply now</button>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-orange-active">
                            <h3 class="widget-user-username text-center">Reference Letter Application</h3>
                            <h5 class="widget-user-desc text-center">Reference letter for your preusal</h5>
                        </div>
                        <div class="box-footer">
                           <div class="row text-center">
                                <div class="btn-group margin">
                                    <a type="button" class="btn bg-orange " href="reference.php">Apply Now</a>
                                    <button type="button" class="btn bg-orange " data-toggle="modal" data-target="#myModal">Impersonate</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-maroon-active">
                            <h3 class="widget-user-username text-center">Coming soon!</h3>
                            <h5 class="widget-user-desc text-center"></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" style="border:0px solid #000;" src="dist/img/logo.png" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">3,200</h5>
                                        <span class="description-text">SALES</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
            <!-- /.row -->
            <!-- =========================================================== -->
            <!-- =========================================================== -->
        </section>
    </div>
	
	
	<form action = "reference-impersonate.php" method = "POST">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Impersonate Reference Letter Application</h4>
                                        </div>
                                        <div class="modal-body">
										<div class="form-group">
											  <label for="exampleInputEmail1">Impersonate to</label>
											  <input name = "user" type="text" list = "users" class="form-control" required placeholder="Employee Number or Name">
											  <input name = "cmd" type = "hidden" />
											</div>
										
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
											<button type="submit" class="btn bg-orange">Impersonate</button>
										  </div>
										</div>
										</div>
										</div>
									
										
											<datalist id="users">
											<?php
											$sql = mysql_query("Select * from users");
											while($row = mysql_fetch_array($sql))
											{
											?>
											 <option value="<?php echo $row['EmpNo'];?>"><?php echo $row['FullName']; ?></option>
											<?php
											}
											?>
										</datalist>
							</form>
			<script type = "text/javascript">
			$(window).load(function(){
				$("#myModal").modal('show');
				
			});
		 </script>
	
    <?php
        include("footer.php");
        ?>
