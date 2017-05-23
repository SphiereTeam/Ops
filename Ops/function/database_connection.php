<?php
/**>>>>>>>> Start of databse connection <<<<<<<<<<<<<*/
$hostname = "localhost";
$DB_UserName = "root";
$DB_Pwd = "";
$DB_Name = "test";
$error = "Database failed to connect!";
date_default_timezone_set("Asia/Brunei");
if(mysql_connect($hostname,$DB_UserName,$DB_Pwd) && mysql_select_db($DB_Name))
{
	//echo "<i style = 'color: #ccc;'>Database Connection established!</i>";
}

else
{
	//die is terminate the connection
	die($error);
}
/**>>>>>>>> End of databse connection <<<<<<<<<<<<<*/

?>
