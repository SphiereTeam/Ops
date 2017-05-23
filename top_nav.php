<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>H</b>RMS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>HR</b>MS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                <!-- Notifications: style can be found in dropdown.less -->
                
                <!-- Tasks: style can be found in dropdown.less -->
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php
					if(getfield('EmpNo') != ""){
							?>
							  <img src="dist/img/users/<?php echo  $user_id;?>.jpg" class="user-image" alt="User Image">
						
							
							
						<?php
					}
					else{
						?>	
                        <img src="dist/img/prof/<?php echo $user_id;?>.jpg" class="user-image" alt="User Image">
						<?php
					}
						?>
                        <span class="hidden-xs">Profile</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
						   <p>
                                <?php echo ucwords(strtolower($fullname));?>
                           <?php
							
							if(getfield('EmpNo') != ""){
							?>   
							<small>Member since <?php echo date('F Y', strtotime($doj))?></small>
							<?php
							}
							else{
							?>
                               <small>Attachment Student</small>
							<?php
							}
							?>
                            
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            
                            <div class="pull-right">
                                <a href = "signout.php" class="btn btn-default btn-flat">Sign Out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
