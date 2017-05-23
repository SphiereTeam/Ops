<?php

include("core.inc.php");
if(loggedin())
{

$user_id = getfield('EmpNo');
$username = getfield('UserName');
$power = getfield('level');
$corpID = getfield('CorporateTitle');
$fullname = getfield('FullName');
$doj = getfield('DOJ');


$level = getTempfield('level');
if($level == "0")
{
$user_id = getTempfield('UserTempId');
$username = getTempfield('UserId');
$power = getTempfield('level');
$fullname = getTempfield('User_name');
}
}
else
{
	
//header("Location:login.php");
} 


/* $user_id = '1165';//getfield('EmpNo');
$username = getfield('UserName');
$power = getfield('level');
$fullname = getfield('FullName');
$doj = getfield('DOJ'); */
?>