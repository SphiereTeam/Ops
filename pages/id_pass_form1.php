
<?php
include("nav.php");

?>

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
<div class="col-md-6">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                           <h4>APPLICANT TYPE</h4> 
                        </div>
						 <div class="panel-body">
						<div class="form-group">
                                           
										   <div class="form-group">
                                                <label for="disabledSelect">Application Type </label>
                                                <select class="form-control">
                                                    <option>--- Please Select ---</option>
													
                                                    <option>Card Replacement</option>
                                                    <option>New Application</option>
                                                    <option>Renewal</option>
                                                    <option>Zone Amendment</option>
                                                </select>
                                            </div>
											
                        </div>
						</div>
                        <div class="panel-heading">
                           <h4>I.	DETAILS OF APPLICANT</h4> 
                        </div>
                        
                        <div class="panel-body">
									<div class = "row">
											<div class = "col-md-8">
													<div class="form-group">
													<label>Passport Picture</label>
													<input class =  "form-control" type="file" accept="image/*" onchange="loadFile(event)"><br/>
													<img id="output" style = "width:150px;height:auto;"/>
													
												</div>
												
											
											</div>
											
                                     </div>
									 <hr/>
									<div class = "row">
											<div class = "col-md-8">
												<div class="form-group">
													<label>Full Name</label>
													<input class="form-control" style = "text-transform:uppercase;"/>
													
												</div>
											</div>
											<div class = "col-md-4">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control">
														<option></option>
														<option>Male</option>
														<option>Female</option>
													</select>
													
												</div>
											</div>
                                     </div>
									 <hr />
									<div class = "row">
											<div class = "col-md-4">
												<div class="form-group">
													<label>Brunei I.C No</label>
													<input class="form-control" style = "text-transform:uppercase;"/>
													
												</div>
											</div>
											
											<div class = "col-md-4">
												<div class="form-group">
													<label>Color</label>
													<select class="form-control">
														<option>-- Select One --</option>
														<option>Yellow</option>
														<option>Purple</option>
														<option>Green</option>
													</select>
													
												</div>
											</div>
											
											<div class = "col-md-4">
												<div class="form-group">
													<label>Expiry Date</label>
													<input type = "date" class="form-control"/>
													
												</div>
											</div>
                                     </div>
                        </div>
					
</div>				
</div>				

<div class="col-md-6" >
 <div class="panel panel-default">
				 <div class="panel-heading">
				 
				 
				 
                           <h4>II.	Type of Employment/Status/Occupation</h4>  
                        </div>
						
						   <div class="panel-body">
						   <div class="form-group">
                                           <select class="form-control">
														<option>-- Select One --</option>
														<option>Attachment Student</option>
														<option>Contract</option>
														<option>Consultant</option>
														<option>Part Time</option>
														<option>Permanent</option>
														<option>Temporary</option>
														<option>Vendor</option>
													</select>
                                        </div>
										<hr />
						   <div class = "row">
											<div class = "col-md-6">
												<div class="form-group">
													<label>Job Post</label>
													<input type = "text" class="form-control" />
													
												</div>
											</div>
											<div class = "col-md-6">
												<div class="form-group">
													<label>Unit / Department</label>
													<input type = "text"  class="form-control"/>
													
												</div>
											</div>
                    </div>
						   <div class = "row">
											<div class = "col-md-4">
												<div class="form-group">
													<label>Start Date</label>
													<input type = "date" class="form-control" />
													
												</div>
											</div>
											<div class = "col-md-4">
												<div class="form-group">
													<label>End Date</label>
													<input type = "date"  class="form-control"/>
													
												</div>
											</div>
                    </div>
						   
						   </div>
						   
						   
						    <div class="panel-heading">
                           <h4>Scanned Receipt for Lost Card</h4>  
						   </div>
						   <div class="panel-body">
						   <div class="form-group">
                                           	<label>Scanned Receipt issued by finance (Pdf or Img format only)</label>
											<input type = "file"  class="form-control"/>
                                        </div>
										<hr />
						   
						   
						   </div>
                        </div>
						
					<div class = "row">
						<div class = "col-md-12" style = "text-align:center;">
							<a class = "btn btn-block btn-success btn-lg" href = "id_pass_form2.php">Next Page</a>
						</div>
					</div>
				</div>
				
				
				

	
		</section>
		</div>
		
			  <?php
		include("footer.php");

		?>