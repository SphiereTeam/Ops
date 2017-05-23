<?php
require('database_connection.php');

 if(isset($_POST['data']) && $_POST['data'] != "")
   {
	   

     $id=$_POST['data']; 
	 
	$s = "Select * from reference_letter where ref_letter_id = '$id'";
	$value = sprintf( '%06d', $id );
	
	if($run_sql = mysql_query($s))
	{
		$ref_user_id = mysql_result($run_sql,0,'ref_user_id');
		$Approver = mysql_result($run_sql,0,'ref_approver_EmpUserID');
		$date_letter = mysql_result($run_sql,0,'date');
		
		$sql1 = mysql_query("select * from reference_letter_details where reference_letter_id = '$id'");
		
		$ref_type_id = mysql_result($sql1,0,'ref_type_id');
		$bank_id = mysql_result($sql1,0,'bank_id');
		$ref_type_attn_to = mysql_result($sql1,0,'ref_type_attn_to');
		$ref_loc = mysql_result($sql1,0,'ref_loc');
		
		$p1 = mysql_result($sql1,0,'p1');
		$p1_1 = mysql_result($sql1,0,'p1_1');
		$p1_2 = mysql_result($sql1,0,'p1_2');
		$p1_3 = mysql_result($sql1,0,'p1_3'); 
		$p1_4 = mysql_result($sql1,0,'p1_4'); 
		$p1_5 = mysql_result($sql1,0,'p1_5'); 
		$p1_6 = mysql_result($sql1,0,'p1_6'); 
		$p1_7 = mysql_result($sql1,0,'p1_7'); 
		$p2 = mysql_result($sql1,0,'p2'); 
		$p2_1 = mysql_result($sql1,0,'p2_1'); 
		$p2_2 = mysql_result($sql1,0,'p2_2'); 
		$p2_3 = mysql_result($sql1,0,'p2_3');
		$p3 = mysql_result($sql1,0,'p3'); 
		$p4= mysql_result($sql1,0,'p4');
		$p4_1 = mysql_result($sql1,0,'p4_1'); 
		$p4_3 = mysql_result($sql1,0,'p4_3');
		
		
		
		
		
		
		
		$sql10 = mysql_query("select * from users where EmpNo = '$Approver'");
		$approver_fullname = mysql_result($sql10,0,'FullName');
		$CorporateID = mysql_result($sql10,0,'CorporateTitle');
		
		
		$num = strlen($approver_fullname);
		
		$sql15 = mysql_query("select * from pos where EmpPosID = '$CorporateID'");
		$CorporateTitle = mysql_result($sql15,0,'EmpPos');
		
		
		$user_type = "";
		
		
		
		$sql4 = mysql_query("select * from reference_type where reference_type_id = '$ref_type_id'");
		$ref_type = mysql_result($sql4,0,'reference_type_name');
		
		$sql3 = mysql_query("select * from bank where BankID = '$bank_id'");
		$bank_name = mysql_result($sql3,0,'BankName');
		$addr_1 = mysql_result($sql3,0,'addr_1');
		$addr_2 = mysql_result($sql3,0,'addr_2');
		$addr_3 = mysql_result($sql3,0,'addr_3');
		$addr_4 = mysql_result($sql3,0,'addr_4');
		
		

	
		
		
		
	}
   }
	else{
		header("location:../reference_admin.php");
	}

?>
<style>
body {
		font-family:Calibri;
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

<button  type="submit" onclick='setHidden(this)' name="<?php echo $id;?>">Edit</button>
<button   type="submit" onclick='window.print()' name="<?php echo $id;?>">Print</button>
</form>
</div>

<div>
<div>
<p style = "margin-top:190px;">Our ref: 10006 / <?php echo $value;?></p>

<p><?php echo date('dS F Y',strtotime($date_letter));?></p>
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
<p style = "margin-top:30px;"><?php echo $p1." <strong style = 'text-decoration:underline;'>".$p1_1."</strong>, ".$p1_2." <strong style = 'text-decoration:underline;'>".$p1_3."</strong> ".$p1_4." <strong style = 'text-decoration:underline;'>".$p1_5."</strong> ".$p1_6." <strong style = 'text-decoration:underline;'>".$p1_7."</strong>";?></p>
<p><?php echo $p2." <strong style = 'text-decoration:underline;'>".$p2_1."</strong> ".$p2_2." <strong  style = 'text-decoration:underline;'>".$p2_3."</strong>";?></p>
<p><?php echo $p3;?></p>
<p><?php echo $p4." ".$p4_1." ".$p4_3;?></p>
<p>Thank you.</p>
<p style = "margin-top:25px;">Yours sincerely,</p>

<p style = "margin-top:100px; font-weight:500;">
	<?php
	if($approver_fullname=="RAMLAH HJ RABAHA @ BAHA"){
	?>
	_________________________<br style = "margin-bottom:10px;"/>
	<?php
	}
	if($approver_fullname=="HJH SITI SOHANAH HJ METUSSIN"){
	?>
	____________________________<br style = "margin-bottom:10px;"/>
	<?php
	}
	?>
	<?php echo "<strong>".$approver_fullname."</strong>";?><br/>
	<?php echo "<strong>".$CorporateTitle."</strong>"?><br/>
	<strong>DST Group Human Resources </strong></p>
	</div>
</div>
</body>