<?php
include("nav.php");

?>	  

 <script type='text/javascript'>
    function setHidden(key) {
        var dataStr = '';
        dataStr += key.name;

        document.getElementById('data').value = dataStr;
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


<form action="function/generate_report.php" method="POST" target = "_blank">
 <input type="hidden" id='data' name="data" value="" />
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
			   $sql = mysql_query("select * from reference_letter where ref_status_done = '1'");
			   while($row = mysql_fetch_array($sql))
			   {?>
				 <tr>
				 <td><?php echo sprintf("%'.06d",  $row['ref_letter_id']);?></td>
				 <td><?php 
				 $userid = $row['ref_user_id'];
				 $search_username = mysql_query("select * from user where EmpNo = '$userid'");
				 $username = mysql_result($search_username,0,'EmpFullName');
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
				 <button class="btn btn-success btn-sm"  target = "_blank" title = "Put to archive" type="submit" onclick='setHidden(this)' name="<?php echo $row['ref_letter_id'];?>"><span class="fa fa-check-circle"></span> </button>
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

<?php
include("footer.php");
?>