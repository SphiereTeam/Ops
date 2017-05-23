<?php
include("nav.php");

if(isset($_POST['command']) && $_POST['command'] == "move_archive"){
	$reference_id = $_POST['data'];
	echo "1";
	mysql_query("UPDATE `reference_letter` SET `ref_status` = '1' WHERE `reference_letter`.`ref_letter_id` = $reference_id");
?>
<script type = "text/javascript">
	alert("letter moved to archive");
 </script>
<?php

}
?>
 <script type='text/javascript'>
    function setHidden(key) {
        var dataStr = '';
        dataStr += key.name;
		var form = document.form;
        document.getElementById('data').value = dataStr;
		form.setAttribute("method", "POST");
		form.setAttribute("action", "function/generate_report.php");
		
    }
    </script>
 <script type='text/javascript'>
    function viewHidden(key) {
        var dataStr = '';
        dataStr += key.name;
		var form = document.form;
        document.getElementById('data').value = dataStr;
		form.setAttribute("method", "POST");
		form.setAttribute("action", "function/view_report.php");
		   
    }
    function move_archive(id) {  
		var form = document.form;
		document.getElementById('data').value = id;
		document.getElementById('command').value = "move_archive";
		form.setAttribute("method", "POST");
		form.setAttribute("action", "reference_admin.php");
		form.submit();
		   
    }
    function mail_user(id) {  
		var form = document.form;
		document.getElementById('data').value = id;
		document.getElementById('command').value = "mail_user";
		form.setAttribute("method", "POST");
		form.setAttribute("action", "reference_admin.php");
		form.submit();
		   
    }
    </script>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reference Letter
        <small>Landing Page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reference Letter Landing Page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


<form name = "form" method="POST">
 <input type="hidden" id='data' name="data" value="" />
 <input type="hidden" id='command' name="command" value="" />
<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">List of employees applied for reference letter</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Ref#</th>
                  <th>User</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
             <?php
			   $sql = mysql_query("select * from reference_letter where ref_status_done = '1' and ref_status = '0'");
			   while($row = mysql_fetch_array($sql))
			   {?>
				 <tr>
				 <td><?php echo sprintf("%'.06d",  $row['ref_letter_id']);?></td>
				 <td><?php 
				 $userid = $row['ref_user_id'];
				 $search_username = mysql_query("select * from users where EmpNo = '$userid'");
				 $username = mysql_result($search_username,0,'FullName');
				 echo $username;
				 ?>
				 
				 </td>
				 <td><?php
				 $type = $row['type'];
				 $esql =mysql_query("select * from reference_type where reference_type_id = '$type'");
				 $type_name = mysql_result($esql,0,'reference_type_name');
				 
				 echo $type_name;
				 ?></td>
				 <td><?php echo date('d M Y',strtotime($row['date']))." (".$row['time'].")";?></td>
				 <td><span class="label label-success">Done</span></td>
				 <td><?php echo $row['ref_remarks'];?></td>
				 <td>  
				 <button class="btn btn-default btn-sm"  target = "_blank" title = "Generate Letter" type="submit" onclick='setHidden(this)' name="<?php echo $row['ref_letter_id'];?>"><span class="fa fa-refresh"></span> </button>
				 <button class="btn btn-success btn-sm"  target = "_blank" title = "View Reference Letter" type="submit" onclick='viewHidden(this)' name="<?php echo $row['ref_letter_id'];?>"><span class="fa fa-eye"></span> </button>
				 <button class="btn btn-green btn-sm"  title = "Ready For Collection" onclick='mail_user(<?php echo $userid;?>)' ><span class="fa fa-envelope"></span> </button>
				 <button class="btn btn-purple btn-sm"  title = "Move to archive" onclick='move_archive(<?php echo $row['ref_letter_id'];?>)' ><span class="fa fa-arrow-right"></span> </button>
				 </td>
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
	  </form>
	  
	    </section>
	  </div>
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Notification</h4>
                                        </div>
                                        <div class="modal-body">
                                        The student has been sucesfully added!
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php




include("footer.php");



if(isset($_POST['command']) && $_POST['command'] == "mail_user"){
	$to = $_POST['data'];
	//send_collection_reference($to,$user_id);
?>
<script type = "text/javascript">
	$(window).load(function(){
		$("#myModal").modal('show');
		
	});
 </script>
<?php

}
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Notification</h4>
                                        </div>
                                        <div class="modal-body">
                                        The student has been sucesfully added!
										</div>
                                        <div class="modal-footer">
                                            <a href = "reference_admin.php" class="btn btn-purple">Okay, Thank You!</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                   