<?php
include("nav.php");
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
			My Part Time Employee List
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">My Part Time Employee List</li>
            </ol>
        </section>
        <section class="content">
		
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Table</h3>
			  <h5>This table will gather all your part time user in this system and make them dynamically searchable</h5>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-bordered table-striped">
                <thead><tr>
                  <th>User ID</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>User Type</th>
                  <th>Email</th>
                </tr>
				</thead>
				<tbody>
				
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
		</section>
</div>


<?php
include("footer.php");
?>