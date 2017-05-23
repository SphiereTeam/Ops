<?php
include("nav.php");
?>
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
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Purpose of Application</label>
                 <select class="form-control">
					<option>-- Please Select --</option>
					<option>Credit Card</option>
					<option>Government Housing Scheme</option>
					<option>Government Department</option>
					<option>Consumer Product Loan</option>
					<option>Car Financing</option>
					<option>Motorcycle Financing</option>
					<option>Bank Overdraft</option>
					<option>Part-Time Studies *</option>
					
				 </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Name of Banks / Government Departments / Colleges</label>
                      <select class="form-control">
							<option>-- Please Select --</option>
							<?php
							$sql = mysql_query("select * from bank");
							while($row = mysql_fetch_array($sql))
							{
								?>
								<option><?php echo $row['BankName'];?></option>
								<?php
							}
							?>
				 </select>
                </div>
        
              </div>
              <!-- /.box-body -->
            </form>
          </div>
	</div>
	
	
	<div class = "col-md-6">
	<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Remarks</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Remarks</label>
               <textarea class = "form-control" placeholder = "Enter Remarks"><?php echo convert_number(2085.00)." only"?></textarea>
                </div>
              
        
              </div>
              <!-- /.box-body -->

             
            </form>
          </div>
	</div>
		<div class = "col-md-6">
		
                <button type="submit" class="btn btn-success pull-right">Submit Application</button>
              
		</div>
	
	  <!-- =========================================================== -->
	  </section>
	  </div>
<?php
include("footer.php");	
?>