<?php
include("database_connection.php");

$sql = mysql_query("select * from user");

while($row = mysql_fetch_array($sql)){
	mysql_query("UPDATE `users` SET `CorporateTitle` = '".$row['EmpPos']."' WHERE `users`.`EmpNo` = ".$row['EmpNo']."");
}
?>