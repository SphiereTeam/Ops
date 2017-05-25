<?php

include("database_connection.php");


if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "approve")
{
	$appid = $_REQUEST['appid'];
	mysql_query("UPDATE `test`.`leave_application` SET `status` = 'approved' WHERE `leave_application`.`leave_app_id` = $appid;");
	header("location:approve_application.php");
}
if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "decline")
{
		$appid = $_REQUEST['appid'];
	mysql_query("UPDATE `test`.`leave_application` SET `status` = 'declined' WHERE `leave_application`.`leave_app_id` = $appid;");
	header("location:approve_application.php");
}
?>

<h3><i class="glyphicon glyphicon-list-alt"></i>My Application</h3>  
<hr />

<script>
function approve(appid){
	document.getElementById("cmd").value = "approve";
	document.getElementById("appid").value = appid;
	document.submit_form.submit();
}
function decline(appid){
	document.getElementById("cmd").value = "decline";
	document.getElementById("appid").value = appid;
	document.submit_form.submit();
}
</script>

<div class="col-md-9">
      <div class="panel panel-default">
                        <div class="panel-heading">
                            Application Approval
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Duration</th>
											<th>Date</th>
											<th>Application Date</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								
										
									
										$query = mysql_query("SELECT * FROM leave_application INNER JOIN ops_user on leave_application.user_id = ops_user.user_id WHERE status ='pending'");
										while($row = mysql_fetch_array($query))
										{
											?>
											<tr>
											<td><?php echo "#".$row['leave_app_id'];?></td>
											<?php $s = mysql_query("select * from ops_user where user_id = ".$row['user_id']);
											$name = mysql_result($s,0,'user_id');
											?>
											
											<td><?php echo $name;?></td>
											<td><?php echo $row['no_of_day']." day(s)";?></td>
											<td><?php echo "<font style = 'color:green;'>".date("j/m/Y",strtotime($row['start_date']))."</font> to <font style = 'color:green;'>". date("j/m/Y",strtotime($row['end_date']))."</font>";?></td>
											<td><?php echo date("j/m/Y",strtotime($row['date_applied']));?></td>
											<td><?php echo $row['leave_reason'];?></td>
											<td style = "<?php if($row['status'] == "approved"){echo "color:green;";}
													if($row['status'] == "declined"){echo "color:red;";}?>font-style:italic; font-size:10px;">
											<?php if($row['status'] == "pending")
											{	
											?>
											<button class = "btn btn-success" style = " font-size:10px;" onclick = "approve(<?php echo $row['leave_app_id'];?>)">Approve</button>
											<button class = "btn btn-danger" style = " font-size:10px;" onclick = "decline(<?php echo $row['leave_app_id'];?>)">Decline</button>
											<?php
											}
											else
												
												{
												echo $row['status'];
												}
											?>
											</td>
											</tr>
											<?php
										}
									
									?>
                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
      <form name = "submit_form" method = "post" action = "<?php echo $current_file;?>">
	  <input type = "hidden" name = "cmd" id = "cmd">
	  <input type = "hidden" name = "appid" id = "appid">
	  </form>
              
      
    
      <hr>
      
    
    </div>
	
	  <!-- JQUERY SCRIPTS -->
    <script src="js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
 
     <!-- DATA TABLE SCRIPTS -->
    <script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
            <!-- CUSTOM SCRIPTS -->
    <script src="js/custom.js"></script>
