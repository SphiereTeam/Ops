<?php
include("nav.php");
?>
    <script type='text/javascript'>
    function setHidden(key,status) {
        var dataStr = '';
        dataStr += key.name;
		var status = status;
        document.getElementById('data').value = dataStr;
        document.getElementById('status').value = status;
    }
    </script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
						Submit Sheet
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Submit Sheet Form</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Sheet Lists</h3>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <form action="edit_sheet.php" method="POST">
                    <input type="hidden" id='data' name="data" value="" />
                    <input type="hidden" id='status' name="status" value="" />
                    <!-- /.box-header -->
                    <div class="box-body" style="display: block;">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
				  $s = "select * from attendance where EmpNo = '$user_id'";
				  if($sql = mysql_query($s))
				  {
					  $num_rows = mysql_num_rows($sql);
					  
					  if($num_rows >=1)
					  {
						  while($row = mysql_fetch_array($sql))
						  {
							  $user = $row['EmpNo'];
							  $date = $row['created'];
							  $status = $row['status'];
							 $created = date("d-m-Y", strtotime($date));
							 $m = $row['Month'];
							 $monthName = @date('F', mktime(0, 0, 0, $m, 10)); // March
							  ?>
                                        <tr>
                                            <td>
                                                <input class="btn  btn-flat btn-default" type="submit" value="<?php echo $monthName;?>" onclick="setHidden(this,'<?php echo $status; ?>')" name="<?php echo $row['attendance_id'];?>"></input>
                                            </td>
                                            <td>
                                                <?php echo $row['Year'];?>
                                            </td>
                                            <td>
                                                <?php echo $created;?>
                                            </td>
											<?php
											if($status != $user_id)
											{
												$sqlN = mysql_query("select * from users where EmpNo = '".$status."'");
											$userN = @mysql_result($sqlN,0,'UserName');
											?>
											 <td><span class="label label-primary"><?php echo "Pending (".$userN.")";?></span></td>
											<?php
											}
											else{
												?>
												<td><span class="label label-primary"><?php echo "Created";?></span></td>
											<?php
											}
											
											?>
                                            
                                        </tr>
                                        <?php
						  }
					  }
					  else
					  {
						  
					  }
					  
				  }
				  
				  ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-footer -->
            </div>
        </section>
        </form>
    </div>
    <?php
include("footer.php");
?>
