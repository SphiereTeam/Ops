<?php
$title = "Reference Letter Application";
include("nav.php");
if(isset($_POST['cmd']) && $_POST['cmd'] == "pas"){

$dept  = $_POST['department'];
$bank_name  = $_POST['bank_name'];
if(isset($_POST['district']) && $_POST['district'] != ""){
$district  = $_POST['district'];
$s = mysql_query("select * from bank where BankName = '$bank_name' and addr_2 LIKE '$district'");
}
else{
	$s = mysql_query("select * from bank where BankName = '$bank_name'");
}

$bank_id = mysql_result($s,0,'BankID');
$attn_to = mysql_result($s,0,'Attention_to');

$remarks  = $_POST['remarks'];
$district = "";
$date = date("Y-m-d");	
$time = date("H:i:s");
if(isset($_POST['district']) && $_POST['district'] != ""){
$district  = $_POST['district'];
}
$sql = mysql_query("select * from reference_letter_approver where LevelRange LIKE '%".$corpID."%' and status = 'Active'");
$approver = mysql_result($sql,0,'Approver');
$receiver = mysql_result($sql,0,'Receiver');


 $sql1 = mysql_query ("INSERT INTO `reference_letter` (`ref_letter_id`, `ref_user_id`, `ref_receiver_id`,`type`, `date`, `time`, `ref_remarks`, `ref_status_receive`, `ref_status_progress`, `ref_status_done`, `ref_status`, `ref_approver_EmpUserID`, `ImpersonateBy`) 
VALUES ('', '$user_id', '$receiver', '$dept', '$date', '$time', '$remarks', '0', '0', '1', '0', '$approver', '');") or die("error1");



$ref_letter_id = mysql_insert_id();

$sql2 = mysql_query("INSERT INTO `reference_letter_details` 
		(`ref_details_id`, `reference_letter_id`, `bank_id`, `ref_type_id`, `ref_type_attn_to`, `ref_loc`,
		`p1`, `p1_1`, `p1_2`, `p1_3`, `p1_4`, `p1_5`, `p1_6`, `p1_7`, 
		`p2`, `p2_1`, `p2_2`,
		`p2_3`, `p3`, 
		`p4`, `p4_1`, `p4_3`)
		
 VALUES ('', '$ref_letter_id', '$bank_id', '$dept', '$attn_to', '$district', 
 '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')") or die("error2"); 
 send_mail_reference('1165',$user_id,$ref_letter_id);
?>
<script>
alert("Your Reference Letter Application submitted successfully");
</script>
<?php
header("location:reference.php"); 
}
?>
<script type='text/javascript'>
function update_department(key){
	var x = document.reference_form;
	
	 var dataStr = '';
        dataStr += key.value;
        document.getElementById('data').value = dataStr;
		document.reference_form.submit();	

	
}
function update_bank(key){
	var x = document.reference_form;
	
	 var dataStr = '';
        dataStr += key.value;
        document.getElementById('data2').value = dataStr;
		document.reference_form.submit();	

	
}


	
	function submitForm(){
		var s = document.reference_form;
		
		
		if(s.department.value != "0" && s.bank_name.value == "PENGARAH KEMAJUAN PERUMAHAN")
		{
			if(s.district.value == "0"){
				alert("Please Select District");
				return false;
			}
			else{
				
			s.cmd.value = "pas";
			s.submit();
			}
		}
		else
		{
			if((s.department.value != "0" && s.bank_name.value != "0")){
			s.cmd.value = "pas";
			s.submit();
			}
		}
		
	}
</script>
    
    </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reference Letter Application
        <small>Preview page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reference Letter Application Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<div class = "col-md-6">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reference Letter Details</h3>
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name = "reference_form" action = "<?php echo $current_file;?>" method = "POST" onsubmit="ShowLoading()">
			 <input type="hidden" id='data' name="data" value="" />
			 <input type="hidden" id='data2' name="data2" value="" />
			 <input type="hidden" id='cmd' name="cmd" value="" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Purpose of Application</label>
                 <select class="form-control" onchange = "update_department(this)" name = "department" id = "department">
				 <option <?php if(isset($_POST['department']) && $_POST['department'] == "0"){echo "selected = 'selected'";} ?> value = "0">-- Please Select --</option>
				 <?php
				 $esq = mysql_query("SELECT * FROM `reference_type`  order by reference_type_name ASC");
				 while($row = mysql_fetch_array($esq)){
					 ?>
					 
					<option <?php if(isset($_POST['department']) &&  $_POST['department'] == $row['reference_type_id']){echo "selected = 'selected'";} ?> value = "<?php echo $row['reference_type_id']?>"><?php echo $row['reference_type_name'];?></option>
					 <?php
				 }
				 ?>
					
					
				 </select>
                </div>
				<?php
				
				if(isset($_POST['department']) && $_POST['department'] != "0"){
					
					?>
                <div class="form-group">
                  <label for="exampleInputPassword1">Name of Banks / Government Departments / Colleges</label>
                      <select class="form-control" name = "bank_name"  onchange = "update_bank(this)" >
							<option value = "0">-- Please Select --</option>
							<?php
							if($_POST['department'] == "2"){
								$sql = mysql_query("select * from bank where level LIKE '".$_POST['department']."' group by BankName");
							}
							else{
								$sql = mysql_query("select * from bank where level LIKE '%".$_POST['department']."%'");
							}
							
							while($row = mysql_fetch_array($sql))
							{
								?>
								<option <?php  if(isset($_POST['bank_name']) &&  $_POST['bank_name'] == $row['BankName']){echo "selected = 'selected'";} ?> value = "<?php echo $row['BankName'];?>"><?php echo $row['BankName'];?></option>
								<?php
							}
							?>
				 </select>
                </div>
				<?php  }
					
						
				?>
              </div>
              <!-- /.box-body -->
       
          </div>
	</div>

	
	
	
	<?php
				
		if(isset($_POST['bank_name']) && $_POST['bank_name'] != "0" && $_POST['department'] != '0'){
					
					?>
	<div class = "col-md-6">
	<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Remarks</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        
              <div class="box-body">
			  
		<?php
		if(isset($_POST['department']) && $_POST['department'] == "2" && $_POST['bank_name'] == "PENGARAH KEMAJUAN PERUMAHAN")
		{
		?>	  
			  <div class="form-group">
                  <label for="exampleInputEmail1">District</label>
             <select class="form-control" name = "district">
				<option value = "0">-Please Select-</option>
				<option value = "Bandar Seri begawan">Brunei Muara District</option>
				<option value = "BELAIT">Belait District</option>
				<option value = "TUTONG">Tutong District</option>
				<option value = "TEMBURONG">Temburong District</option>
			 </select>
                </div>
		<?php
		}
		else{}
		?>  
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Remarks</label>
               <textarea class = "form-control" placeholder = "Enter Remarks" name = "remarks"></textarea>
                </div>
              
        
              </div>
              <!-- /.box-body -->

         
          </div>
	</div>
	<div class = "col-md-12">
		
                <button onclick = "submitForm()" class="btn btn-success pull-right">Submit Application</button>
              
		</div>
	<?php 
	
		}
		else{
			
		}
	
	?>
		
	     </form>
	  <!-- =========================================================== -->
	  </section>
	  </div>
<?php
include("footer.php");	
?>