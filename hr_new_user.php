<?php include("nav.php"); ?>

<div class="content-wrapper">
	
	<section class="content-header">
		<h1>New User Registration<small>page</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">New User Registration</li>
		</ol>
	</section><!-- /.content-header -->

	<section class="content">
		<div class="box">

			<?php if( !empty( $_POST["submit"] ) ) : ?>
				<?php 
					// echo '<pre>' . var_export($_POST, true) . '</pre>';

					//prevents MySQL injections
					$user_fullname = mysqli_real_escape_string( $connection, $_POST["user_fullname"] );
					$user_email = mysqli_real_escape_string( $connection, $_POST["user_email"] );
					$user_ic = mysqli_real_escape_string( $connection, $_POST["user_ic"] );

					$user_type = mysqli_real_escape_string( $connection, $_POST["user_type"] );
					$user_salary = mysqli_real_escape_string( $connection, $_POST["user_salary"] );
					
					$user_username = mysqli_real_escape_string( $connection, $_POST["user_username"] );
					$user_password = mysqli_real_escape_string( $connection, $_POST["user_password"] );

					//add '-' to ic
					//assumes ic given is 8 numbers with no special characters
					$user_ic_array = array();
					$user_ic_array[0] = substr($user_ic, 0, 2);
					$user_ic_array[1] = substr($user_ic, 2,7);
					$user_ic = $user_ic_array[0] . "-" . $user_ic_array[1];
					//echo $user_ic;

					//Check if user already exists by selecting the user ic
					$query  = "SELECT * ";
					$query .= "FROM ops_user ";
					$query .= "WHERE user_ic = '{$user_ic}' ";

					$check = mysqli_query($connection, $query);

					if(mysqli_num_rows($check) != 0){
						die("User already exists!");
					}else{

						//Perform database insert
						$query  = "INSERT INTO ops_user (";
						$query .= " user_fullname, user_email, user_ic, user_type, user_salary, user_username, user_password ";
						$query .= ") VALUES (";
						$query .= " '{$user_fullname}', '{$user_email}', '{$user_ic}', $user_type, $user_salary, '{$user_username}', '{$user_password}' ";
						$query .= ")";
						
						$result = mysqli_query($connection, $query);
						if($result){
							echo "User created!";
						} else{
							die("Failed to create user!");
						}
					}

					mysqli_close($connection);
				?>
			<?php endif; ?>

			<form id="new_sheet" name="new_sheet" method="POST">
				<div class="box-header">
					 <h3 class="box-title">Personal Information</h3>
				</div>

				<div class="box-body">
					<div class = "col-md-6">
						<div class="form-group">
							<label for="user_fullname">Full Name</label>
							<input id="user_fullname" name="user_fullname" type="text" class="form-control" placeholder="Enter full name" required>
						</div>
					</div>

					<div class = "col-md-6">
						<div class="form-group">
							<label for="user_email">Email</label>
							<input id="user_email" name="user_email" type="email" class="form-control" placeholder="Enter email" required>
						</div>
					</div>

					<div class = "col-md-6">
						<div class="form-group">
							<label for="user_ic">IC</label>
							<input id="user_ic" name="user_ic" type="text" class="form-control" placeholder="Enter ic" required>
						</div>
					</div>
				</div><!-- /.box-body -->

				<div class = "box-header">
					<h3 class="box-title">Job Status</h3>
				</div>

				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="user_type">Employment Type</label>
							<select id="user_type" name="user_type" class="form-control" >
								<option value="0">Temporary</option>
								<option value="1">Permanent</option>
							</select>
						</div>
					</div><!-- /.col-md-6 -->

					<div class = "col-md-6">
						<div class="form-group">
							<label for="user_salary">Daily salary</label>
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<input id="user_salary" name="user_salary" type="number" step="0.1" min="1" max="500" class="form-control" placeholder="xxx.xx" required>
							</div>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.box-body -->

				<div class="box-header">
					<h3 class="box-title">Account Settings</h3>
				</div>

				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="user_username">Username</label>
							<input id="user_username" name="user_username" type="text" class="form-control" placeholder="Enter username" required>
						</div>
					</div><!-- /.col-md-6 -->

					<div class="col-md-6">
						<div class="form-group">
							<label for="user_password">Password</label>
							<input id="user_password" name="user_password" type="password" class="form-control" placeholder="Enter password" required>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.box-body -->

				<div class="box-footer">
					<div class="pull-right">
						<button name="submit" value="1" class="btn btn-purple" type="submit">Create User</button>
					</div>
				</div><!-- /.box-footer -->
			</form>
		</div>
	</section><!-- /.content -->
</div>
<?php include("footer.php"); ?>