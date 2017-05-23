<?php 
$a = 1;
date_default_timezone_set("Asia/Brunei");
echo sprintf("%'.06d", $a)."<br/>";
$date = date("H:m:s");	

echo $date;
?>