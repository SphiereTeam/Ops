<!DOCTYPE html>
<?php
include("database_connection.php");
include("core.inc.php");
if(isset($_POST['username']) && isset($_POST['pwd'])){
  
$username = $_POST['username'];
$username_ad = $_POST['username'];
$password = $_POST['pwd'];
$error = "";
		$sql = "select * from users where UserName LIKE '$username' and pwd LIKE '$password'";
		
		if($query_run = mysql_query($sql))
		{
			$num_rows = mysql_num_rows($query_run);
			
			if($num_rows == 1){
				session_start();
				echo $num_rows;
				 $_SESSION['username'] = $username;
				header("location:index.php");    
			}
			else{
				$error = "2";
				
			}
		}
          
        }
    




?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HR | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="dist/img/1.png" style="width:100%;margin:auto;" />
               
                <!--<a style = "font-size:0.75em;">Centralised <b> Form </b>Centre</a>-->
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?php echo $current_file;?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username" required />
                        <span class="fa fa-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="pwd" required />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
					<?php
					if(isset($error) && $error == "2")
					{
					?>
                    <div class="row">
                        <div class="col-xs-12">
                                <label style = "color:red;">
                                    Wrong Username or Password
                                </label>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
					<?php
					}
					?>
					<?php
					if(isset($error) && $error == "4")
					{
					?>
                    <div class="row">
                        <div class="col-xs-12">
                                <label style = "color:red;">
                                   Connection Lost, Please contact administrator
                                </label>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
					<?php
					}
					?>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-purple btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <div class="box-footer" style ="font-size:0.8em;color:#666;">
                 <strong>Copyright &copy; Pay System.</strong> All rights reserved.
                <br>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 2.2.3 -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
        </script>
    </body>

    </html>
