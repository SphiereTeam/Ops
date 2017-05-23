<?php
ob_start();
require("database_connection.php");
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
//$http_referer = $_SERVER['HTTP_REFERER'];


function loggedin()
{

			if(isset($_SESSION['username']) && !empty($_SESSION['username']))
				{
				return true;
				}
				else
				{
					
				return false;
				}
	

}

function getfield($field)
{

		$query = "SELECT `$field` FROM `users` WHERE UserName = '".$_SESSION['username']."'";
	
			if($query_run = mysql_query($query))
			{
				if($query_result = @mysql_result($query_run, 0, $field))
				{
				return $query_result;
				}
				else{
					echo "";
				}
			}
	
	
	
}

function getTempfield($field)
{

		$query = "SELECT `$field` FROM `usertemp` WHERE UserId = '".$_SESSION['username']."'";
	
			if($query_run = mysql_query($query))
			{
				if($query_result = @mysql_result($query_run, 0, $field));
				{
				return $query_result;
				}
			}
	
	
	
}
?>