section class="content">
            <div class="col-md-6">
			<form name = "application_form" method = "POST" >
                <!--    Context Classes  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>APPLICANT TYPE</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="disabledSelect">Application Type </label>
                                <select class="form-control" name = "application_type" onchange = "update_application(this)">
                                    <option value = "0">--- Please Select ---</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){echo "selected = 'selected'";}?> value = "1">Card Replacement **</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "2"){echo "selected = 'selected'";}?> value = "2">New Application</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "3"){echo "selected = 'selected'";}?> value = "3">Renewal</option>
                                    <option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "4"){echo "selected = 'selected'";}?> value = "4">Zone Amendment</option>
                                </select>
                            </div>
                        </div>
						<?php
						if(isset($_POST['application_type']) && $_POST['application_type'] != "0")
						{
							switch($_POST["application_type"]){
								case "1":
								?>
								<div class="form-group">
									<div class="form-group">
										<label for="disabledSelect">Replacement type </label>
										<select class="form-control" name = "renewal_type"  onchange = "update_renewal(this)">
											<option value = "0">--- Please Select ---</option>
											<option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){if(isset($_POST['renewal_type']) && $_POST['renewal_type'] == "1"){echo "selected = 'selected'";}}?> value = "1">Faulty/Broken</option>
											<option <?php if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){if(isset($_POST['renewal_type']) && $_POST['renewal_type'] == "2"){echo "selected = 'selected'";}}?>  value = "2">Lost</option>
										</select>
									</div>
								</div>
								<?php
								break;
							}
						?>
                        
						<?php
						}
						?>
						<?php
						if(isset($_POST['application_type']) && $_POST['application_type'] == "1"){
						if(isset($_POST['renewal_type']) && $_POST['renewal_type'] != "0")
						{
							switch($_POST["renewal_type"]){
								case "2":
								?>
								 <div class="panel-body">
									<div class="form-group">
										<label>Scanned Receipt issued by finance (Pdf or Img format only)</label>
										<input type="file" class="form-control" />
									</div>
									<hr />
								</div>
								<?php
								break;
							}
						?>
                        
						<?php
						}
						}
						?>
						
							<?php
						if(isset($_POST['application_type']) && $_POST['application_type'] != "0")
						{
								if($_POST['application_type'] == "2"){
								?>	
								 
						
									<div class="form-group">
									<label>Employment Type</label>
										<select class="form-control" name = "application_for" <?php if($_POST["application_type"] == "2"){echo "required";}?> onchange = "update_employment(this)">
											<option value = "0">-- Select One --</option>
											<option value = "1">Attachment Student</option>
											<option value = "2">Contract</option>
											<option value = "3">Consultant</option>
											<option value = "4">Part Time</option>
											<option value = "5">Temporary</option>
											<option value = "6">Vendor</option>
										</select>
									</div>
								 
						
								<?php
								}
								
							
						?>
                        
						<?php
						}
						if(isset($_POST['application_for']) && $_POST['application_for'] != "0"){
						?>
						
          

						<?php
						}
						
						if(isset($_POST['application_type']) && $_POST['application_type'] != "0" && $_POST['application_type'] != "1" || isset($_POST['renewal_type']) && $_POST['renewal_type'] != "0")
						{	
						?>
						  <div class="row">
							<div class="col-md-12" style="text-align:center;">
								<a onclick = "next_app()" class="btn btn-block btn-purple btn-lg">Next Page<i class = "fa fa-arrow-right pull-right"></i> </a>
							</div>
						</div>
						<?php
						}
						?>
                    </div>
                    
               
			  
            </div>
        </section>