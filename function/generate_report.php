<?php
require('database_connection.php');

require('test_currency.php');
setlocale(LC_MONETARY, 'en_US');
 if(isset($_POST['data']) && $_POST['data'] != "")
   {
	   
	   
     $data=$_POST['data'];
	$s = "Select * from reference_letter where ref_letter_id = '$data'";
	$value = sprintf( '%06d', $data );
	
	if($run_sql = mysql_query($s))
	{
		$ref_user_id = mysql_result($run_sql,0,'ref_user_id');
		$Approver = mysql_result($run_sql,0,'ref_approver_EmpUserID');
	
		
		$sql1 = mysql_query("select * from reference_letter_details where reference_letter_id = '$data'");
		
		$ref_type_id = mysql_result($sql1,0,'ref_type_id');
		$bank_id = mysql_result($sql1,0,'bank_id');
		$ref_type_attn_to = mysql_result($sql1,0,'ref_type_attn_to');
		$ref_loc = mysql_result($sql1,0,'ref_loc');
		
		$sql10 = mysql_query("select * from users where EmpNo = '$Approver'");
		$approver_fullname = mysql_result($sql10,0,'FullName');
		$CorporateID = mysql_result($sql10,0,'CorporateTitle');
		
		
		
		$num = strlen($approver_fullname);
		
		$sql15 = mysql_query("select * from pos where EmpPosID = '$CorporateID'");
		$CorporateTitle = mysql_result($sql15,0,'EmpPos');
		
		
		
		
		$sql4 = mysql_query("select * from reference_type where reference_type_id = '$ref_type_id'");
		$ref_type = mysql_result($sql4,0,'reference_type_name');
		
		$sql3 = mysql_query("select * from bank where BankID = '$bank_id'");
		$bank_name = mysql_result($sql3,0,'BankName');
		$addr_1 = mysql_result($sql3,0,'addr_1');
		$addr_2 = mysql_result($sql3,0,'addr_2');
		$addr_3 = mysql_result($sql3,0,'addr_3');
		$addr_4 = mysql_result($sql3,0,'addr_4');
		
		
		
		$sql0 = mysql_query("select * from users where EmpNo = '$ref_user_id'");
		$fullname = mysql_result($sql0,0,'FullName');
		$title = mysql_result($sql0,0,'Title');
		$ic = mysql_result($sql0,0,'IcNumber');
		$select = mysql_result($sql0,0,'Gender');
		$join = mysql_result($sql0,0,'DOJ');
		$date_join = date("dS F Y",strtotime($join));
		$company = mysql_result($sql0,0,'Company');
		$ContractStartDate = mysql_result($sql0,0,'ContractStartDate');
		
		$sql2 = mysql_query("select * from usersallary where EmpNo = '$ref_user_id'");
		$basic = mysql_result($sql2,0,'BasicSallary');
		
		$allowance = mysql_result($sql2,0,'Allowance');
		$basic_word = numtowords($basic);
		$allowance_word = numtowords($allowance);
		
		$user_type = "";
		if($ContractStartDate != ""){
			$user_type = "an employee";
		}
		if($ContractStartDate == ""){
			$user_type = "an employee";
		}
		
		if($select == "MALE")
		{
		$gender = "He";
		}
		if($select == "FEMALE")
		{
		$gender = "She";
		}
		// let's print the international format for the en_US locale
		
		$cent = "¢";
		$wordcent = str_replace("¢","%A2",$cent);
		
		
		$basicpoint =  number_format($basic, 2);
		
		$end="";
		
		if($ref_type_id == "4" || $ref_type_id == "5" || $ref_type_id == "6" || $ref_type_id == "7" || $ref_type_id == "10" || $ref_type_id == "11" || $ref_type_id == "16")
		{
			
			$end = " from your esteemed bank";
		}
		if($ref_type_id == "1")
		{
			$ref_type = " for the purpose of applying credit card";
			$end = " only";
		}
		if($ref_type_id == "9")
		{
			$ref_type = " for the purpose of Home Improvement ";
			$end = " from your esteemed bank";
			
		}
		if($ref_type_id == "2")
		{
			$ref_type = " the purpose of the application for the Government Housing Scheme";
			$end = "";
			
		}
		if($ref_type_id == "13")
		{
			$ref_type = " the purpose of Changing Car Ownership from your esteemed bank";
			$end = "";
			
		}
		if($ref_type_id == "15")
		{
			$ref_type = " the purpose of Bank Transfer";
			$end = "";
			
		}
		
		
	}
   }
	else{
		header("location:../reference_admin.php");
	}   
	
	
	$p1 = "This is to certify that"; 
	$p1_1 = mysql_real_escape_string(strtoupper($title)." ".$fullname);
	$p1_2 = "I.C No.";
	$p1_3 = $ic;
	$p1_4 = "is ".$user_type." employee of";
	$p1_5 = $company;
	$p1_6 = "since";
	$p1_7  = $date_join.".";
	
	$p2 = $gender." is engaged to the company with a basic salary of";
	$p2_1 = "Brunei Dollars : ".$basic_word." ($".$basicpoint.") only";
	$p2_2 = " with fixed allowances of ";
	$p2_3 = "Brunei Dollars : ".$allowance_word." ($".number_format($allowance,2).") only.";
	$p3  = "We hope that the above statement would satisfy your requirement and further changes on the status of employment with the company would be furnished upon request.";

	if($ref_type_id != "12")
	{
		
		if($ref_type_id == "2")
			{
			$p4 = "";
			$p4 = "This reference letter is issued upon employee's request for";
			$p4_1 = $ref_type;
			$p4_3 = $end.".";
			}
			else{
				if($ref_type_id == "9"){
					$p4 = "This reference letter is issued upon management approval for employee's request ";
					$p4_1 = $ref_type;
					$p4_3 = $end.".";
				}
				else{
					$p4 = "This reference letter is issued upon management approval for employee's request to apply for";
					$p4_1 = $ref_type;
					$p4_3 = $end.".";
				}
			
			}
	}else{
		$p4 = "";
			$p4_1 = "";
			$p4_3 = "";
		
	}
	
	$sql = "UPDATE `test`.`reference_letter_details` SET
	`p1` = '$p1', 
	`p1_1` = '$p1_1', 
	`p1_2` = '$p1_2', 
	`p1_3` = '$p1_3', 
	`p1_4` = '$p1_4', 
	`p1_5` = '$p1_5', 
	`p1_6` = '$p1_6', 
	`p1_7` = '$p1_7', 
	`p2` = '$p2', 
	`p2_1` = '$p2_1', 
	`p2_2` = '$p2_2', 
	`p2_3` = '$p2_3',
	`p3` = '$p3', 
	`p4` = '".mysql_real_escape_string($p4)." ', 
	`p4_1` = '$p4_1', 
	`p4_3` = '$p4_3'

	WHERE 
	`reference_letter_details`.`reference_letter_id` = '$data'";
	
	mysql_query($sql) or die("Error Generate Report");
?>
<style>
body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
		font-size:14px;
    }
	div.chapter, div.appendix {
    page-break-after: always;
	}
	p{
		text-align:justify;
	}
	
	@media print {
  @page {   height: 842px;
        width: 595px; }
  body { size: auto; }
  .print{display:none;}
}
</style>
 <script type='text/javascript'>
    function setHidden(key) {
        var dataStr = '';
        dataStr += key.name;

        document.getElementById('id').value = dataStr;
		document.myForm.submit;
    }
    </script>

<body>
<div class = "print">
<form name = "myForm" action="edit.php" method="POST">
 <input type="hidden" id='id' name="id" value="" />

<button  type="submit" onclick='setHidden(this)' name="<?php echo $data;?>">Edit</button>
<button   type="submit" onclick='window.print()' name="<?php echo $data;?>">Print</button>
<button href = "reference_admin.php" name="<?php echo $data;?>">back</button>
</form>
</div>

<div>
<div>
<p style = "margin-top:190px;">Our ref: 10006 / <?php echo $value;?></p>

<p><?php echo date('dS F Y');?></p>
<p><strong><?php echo strtoupper($bank_name)."<br>";?>
<?php echo strtoupper($addr_1)."<br>";?>
<?php echo strtoupper($addr_2)."<br>";?>
<?php
if($addr_3 != "")
{
?>
  <?php echo strtoupper($addr_3)."<br>";?>
<?php
}

if($addr_4 != "")
{
?>
   <?php echo strtoupper($addr_4)."<br>";?>
<?php
}
?>
</strong></p>
<?php
if($ref_type_id == "12" || $ref_type_id == "15"){
	
}
Else{
?>
<p style = "margin-top:30px;"><strong>Attn : <font style = "text-decoration:underline;"><?php echo ucfirst($ref_type_attn_to);?></font></strong></p>

<?php	
}
?>
<p>Dear Sir / Madam</p>
<p><strong>Re: <font style = "text-decoration: underline;">REFERENCE ON EMPLOYMENT</font></strong></p>
<p style = "margin-top:30px;"><?php echo $p1." <strong style = 'text-decoration:underline;'>".$p1_1."</strong>, ".$p1_2."<strong style = 'text-decoration:underline;'>".$p1_3."</strong> ".$p1_4." <strong style = 'text-decoration:underline;'>".$p1_5."</strong> ".$p1_6." <strong style = 'text-decoration:underline;'>".$p1_7."</strong>";?></p>
<p><?php echo $p2." <strong style = 'text-decoration:underline;'>".$p2_1."</strong> ".$p2_2." <strong  style = 'text-decoration:underline;'>".$p2_3."</strong>";?></p>
<p><?php echo $p3;?></p>
<p><?php echo $p4." ".$p4_1." ".$p4_3;?></p>
<p>Thank you</p>
<p style = "margin-top:25px;">Yours sincerely,</p>

<p style = "margin-top:100px; font-weight:500;">
	<?php
	if($approver_fullname=="RAMLAH HJ RABAHA @ BAHA"){
	?>
	_____________________________<br style = "margin-bottom:10px;"/>
	<?php
	}
	if($approver_fullname=="HJH SITI SOHANAH HJ METUSSIN"){
	?>
	__________________________________<br style = "margin-bottom:10px;"/>
	<?php
	}
	?>
	<?php echo "<strong>".$approver_fullname."</strong>";?><br/>
	<?php echo "<strong>".$CorporateTitle."</strong>"?><br/>
	<strong>DST Group Human Resources </strong></p>
	</div>
</div>
</body>