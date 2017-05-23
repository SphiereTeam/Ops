<?php
 function convert_hr_hrs($date1,$date2){
	 
$datetime1 = new DateTime($date1);
$datetime2 = new DateTime($date2);
$interval = $datetime1->diff($datetime2);
$hrs = $interval->format('%h');
$min = $interval->format('%i');
	if($min>=53 && $min <=60){
		$min = 00;
		$hrs +=1; 
	}else{
		if($min>=38 && $min <=52){
		
		$min = 75;
		}
		else{
			if($min>22 && $min <=37){
				
				$min = 50;
			}
			else{
				if($min>=8 && $min <=22){
						
						$min = 25;
					}
					else{
						if($min>=0 && $min <=7){
							
							$min = 0;
							
						}
						else{
							
						}
					}
			}
		}
	}
	 
	return $hrs.".".$min;
}
 function convert_hr_hrs_only($date1){
	 
$datetime1 = date("H:i:s",strtotime($date1));
$interval = $datetime1;
$hrs = date('H',strtotime($datetime1));
$min = date('i',strtotime($datetime1));
	if($min>=53 && $min <=60){
		$min = 00;
		$hrs +=1; 
	}else{
		if($min>=38 && $min <=52){
		
		$min = 75;
		}
		else{
			if($min>22 && $min <=37){
				
				$min = 50;
			}
			else{
				if($min>=8 && $min <=22){
						
						$min = 25;
					}
					else{
						if($min>=0 && $min <=7){
							
							$min = 0;
							
						}
						else{
							
						}
					}
			}
		}
	}
	 
	return $hrs.".".$min;
}


 function convert_hr_hrs_ori($date1,$date2){
	 
$datetime1 = new DateTime($date1);
$datetime2 = new DateTime($date2);
$interval = $datetime1->diff($datetime2);
$hrs = $interval->format('%h');
$min = $interval->format('%i');


	 
	return $hrs.".".$min;
}
?>
