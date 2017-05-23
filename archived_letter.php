<?php
include("nav.php");

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
		form.setAttribute("action", "function/view_report_hr.php");
		   
    }
    function move_archive(id) {  
		var form = document.form;
		document.getElementById('data').value = id;
		document.getElementById('command').value = "move_archive";
		form.setAttribute("method", "POST");
		form.setAttribute("action", "reference_admin.php");
		form.submit();
		   
    }
    </script>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Archived Letter
        <small>Landing Page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Archived Reference Letter Landing Page</li>
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
              <h3 class="box-title">List of archived reference letter</h3>

         
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Ref No.</th>
                  <th>Name</th>
                  <th>Application Type</th>
				  
                  <th>Date Requested</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
             <?php
			   $sql = mysql_query("select * from reference_letter where ref_status_done = '1' and ref_status = '1'");
			   while($row = mysql_fetch_array($sql))
			   {?>
				 <tr>
				 <td><?php echo "10006/".sprintf("%'.06d",  $row['ref_letter_id']);?></td>
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
				 <td>
				 <span class="label label-success">Done</span>
				 <span class="label label-danger">Archieved</span>
				 <button onclick='viewHidden(this)' name="<?php echo $row['ref_letter_id'];?>" class="btn label label-primary"><i class = "fa fa-eye"></i></button>
				 
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