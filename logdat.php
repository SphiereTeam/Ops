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
$level = getfield('level');


}
else
{
	
header("Location:login.php");
} 


/* $user_id = '1165';//getfield('EmpNo');
$username = getfield('UserName');
$power = getfield('level');
$fullname = getfield('FullName');
$doj = getfield('DOJ'); */

/* $user_id = getfield('EmpNo');
$username = getfield('UserName');
$power = getfield('level');
$corpID = getfield('CorporateTitle');
$fullname = getfield('FullName');
$doj = getfield('DOJ');


$level = getTempfield('level'); */


?>