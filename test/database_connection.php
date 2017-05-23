<?php
/**>>>>>>>> Start of databse connection <<<<<<<<<<<<<*/
$hostname = "localhost";
$DB_UserName = "root";
$DB_Pwd = "";
$DB_Name1 = "test";
$DB_Name2 = "csv_db";
$error = "Database failed to connect!";
date_default_timezone_set("Asia/Brunei");


$conn1 = mysql_connect($hostname, $DB_UserName, $DB_Pwd); 
$conn2 = mysql_connect($hostname, $DB_UserName, $DB_Pwd, true); 

mysql_select_db('test', $conn1);
mysql_select_db('csv_db', $conn2);





/* if(mysql_connect($hostname,$DB_UserName,$DB_Pwd) && mysql_select_db($DB_Name1))
{
	$conn1 =  mysql_select_db($DB_Name1);
	//echo "<i style = 'color: #ccc;'>Database Connection established!</i>";
}

else
{
	//die is terminate the connection
	die($error);
}
if(mysql_connect($hostname,$DB_UserName,$DB_Pwd) && mysql_select_db($DB_Name2))
{
		$conn2 =  mysql_select_db($DB_Name2);
	//echo "<i style = 'color: #ccc;'>Database Connection established!</i>";
}

else
{
	//die is terminate the connection
	die($error);
} */
/**>>>>>>>> End of databse connection <<<<<<<<<<<<<*/


?>
