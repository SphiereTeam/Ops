<?php
ob_start();
require("database_connection.php");
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];



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

		$query = "SELECT `$field` FROM `users` WHERE UserName LIKE '".$_SESSION['username']."'";
	
			if($query_run = mysql_query($query) or die("error"))
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
	
			if($query_run = mysql_query($query) or die("error"))
			{
				if($query_result = @mysql_result($query_run, 0, $field));
				{
				return $query_result;
				}
			}
	
	
	
}
function getName($id)
{

		$query = "SELECT `FullName` FROM `users` WHERE EmpNo = '".$id."'";
	
			if($query_run = mysql_query($query) or die("error"))
			{
				if($query_result = @mysql_result($query_run, 0, 'FullName'));
				{
				return $query_result;
				}
			}
	
	
	
}
function getFN($id)
{

		$query = "SELECT `FirstName` FROM `users` WHERE EmpNo = '".$id."'";
	
			if($query_run = mysql_query($query) or die("error"))
			{
				if($query_result = @mysql_result($query_run, 0, 'FirstName'));
				{
				return $query_result;
				}
			}
	
	
	
}
function getTempName($id)
{

		$query = "SELECT `User_name` FROM `usertemp` WHERE UserTempId = '".$id."'";
	
			if($query_run = mysql_query($query) or die("error"))
			{
				if($query_result = @mysql_result($query_run, 0, 'User_name'));
				{
				return $query_result;
				}
			}
	
	
	
}



function getuserfield($field,$id)
{

		$query = "SELECT `$field` FROM `users` WHERE EmpNo = '".$id."'";
	
			if($query_run = mysql_query($query) or die("error"))
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

function getCorpTitle($id)
{

		$query = "SELECT `EmpPos` FROM `pos` WHERE EmpPosID = '".$id."'";
	
			if($query_run = mysql_query($query) or die("error"))
			{
				if($query_result = @mysql_result($query_run, 0, 'EmpPos'));
				{
				return $query_result;
				}
			}
	
	
	
}



function getMail($id)
{

			$query = "SELECT `Email` FROM `users` WHERE EmpNo = '".$id."'";
	
			if($query_run = mysql_query($query) or die("error"))
			{
				if($query_result = @mysql_result($query_run, 0, 'Email'))
				{
				return $query_result;
				}
				else{
					echo "";
				}
			}
	
	
	
}

?>