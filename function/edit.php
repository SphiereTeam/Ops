<?php
require('database_connection.php');


 if(isset($_POST['id']) && $_POST['id'] != "")
   {
	   

     $id=$_POST['id']; 
	 
	$s = "Select * from reference_letter where ref_letter_id = '$id'";
	$value = sprintf( '%06d', $id );
	
	if($run_sql = mysql_query($s))
	{
		$ref_user_id = mysql_result($run_sql,0,'ref_user_id');
		$Approver = mysql_result($run_sql,0,'ref_approver_EmpUserID');
	
		
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
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
		font-size:14px;
    }
	input{
		width:100%;
	}

</style>
<?php

		if(isset($_REQUEST['order']) && $_REQUEST['order'] == "save"){
			
			$cmd = $_REQUEST['cmd'];
			$p1 = mysql_real_escape_string($_POST["p1"]);
			$p1_1 = mysql_real_escape_string($_POST["p1_1"]); 
			$p1_2 = mysql_real_escape_string($_POST["p1_2"]); 
			$p1_3 = mysql_real_escape_string($_POST["p1_3"]); 
			$p1_4 = mysql_real_escape_string($_POST["p1_4"]); 
			$p1_5 = mysql_real_escape_string($_POST["p1_5"]); 
			$p1_6 = mysql_real_escape_string($_POST["p1_6"]); 
			$p1_7 = mysql_real_escape_string($_POST["p1_7"]); 
			$p2 = $_POST["p2"]; 
			$p2_1 = $_POST["p2_1"]; 
			$p2_2 = $_POST["p2_2"]; 
			$p2_3 = $_POST["p2_3"];
			$p3 = $_POST["p3"]; 
			$p4 = mysql_real_escape_string($_POST["p4"]); 
			$p4_1 = $_POST["p4_1"]; 
			$p4_3 = $_POST["p4_3"];
			
			
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
			`p4` = '$p4', 
			`p4_1` = '$p4_1', 
			`p4_3` = '$p4_3'

			WHERE 
			`reference_letter_details`.`reference_letter_id` = '$id'";
			mysql_query($sql) or die("Error Saving Report");
			echo "Successfully Updated";
		}
?>
 <script type='text/javascript'>
    function save_data(id) {
       document.getElementById('cmd').value = id;
       document.getElementById('order').value = "save";
	   document.myform.submit;
    }
    function back(id) {
		var form = document.myform;
		document.getElementById('data').value = id;
		form.setAttribute("method", "POST");
		form.setAttribute("action", "view_report.php");
		
       
    }
    </script>

<body>
<div>
<form name = "myform" action="edit.php" method="POST">
 <input type="hidden" id='id' name="id" value="<?php echo $id;?>" />
 <input type="hidden" id='data' name="data" value="<?php echo $id;?>" />
 <input type="hidden" id='cmd' name="cmd" value="" />
 <input type="hidden" id='order' name="order" value="" />




<div>
<div>
<p style = "margin-top:225px;">Our ref: 10006 / <?php echo $value;?></p>

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
<p><strong>Attn : <font style = "text-decoration:underline;"><?php echo ucfirst($ref_type_attn_to);?></font></strong></p>
<p>Dear Sir / Madam</p>
<p><strong>Re: <font style = "text-decoration: underline;">REFERENCE ON EMPLOYMENT</font></strong></p>
<input type = "text" value = "<?php if(isset($_POST['p1'])){echo $_POST["p1"];}else{echo $p1;}?>"  name = "p1" /><br/>
<input type = "text" value = "<?php echo $p1_1 ;?>"  name = "p1_1" /><br/>
<input type = "text" value = "<?php echo $p1_2;?>"  name = "p1_2" /><br/>
<input type = "text" value = "<?php echo $p1_3;?>" name = "p1_3" /><br/>
<input type = "text" value = "<?php echo $p1_4;?>"  name = "p1_4" /><br/>
<input type = "text" value = "<?php echo $p1_5;?>" name = "p1_5" /><br/>
<input type = "text" value = "<?php echo $p1_6 ;?>" name = "p1_6" /><br/>
<input type = "text" value = "<?php echo $p1_7;?>" name = "p1_7" /></p>

<p>
<input type = "text" value = "<?php echo $p2;?>"  name = "p2" />
<input type = "text" value = "<?php echo $p2_1;?>" name = "p2_1" />
<input type = "text" value = "<?php echo $p2_2;?>" name = "p2_2" />
<input type = "text" value = "<?php echo $p2_3;?>" name = "p2_3" />

</p>

<p>
<input type = "text" value = "<?php echo $p3;?>"  name = "p3" />
</p>

<p>
<input type = "text" value = "<?php echo $p4;?>" name = "p4" />
<input type = "text" value = "<?php echo $p4_1;?>"  name = "p4_1" />
<input type = "text" value = "<?php echo $p4_3;?>"  name = "p4_3" />

<p>Thank you</p>
<p style = "margin-top:25px;">Yours sincerely,</p>

<p style = "margin-top:100px;">
	<?php
	if($approver_fullname=="RAMLAH HJ RABAHA @ BAHA"){
	?>
	_____________________________<br style = "margin-bottom:10px;"/>
	<?php
	}
	if($approver_fullname=="HJH SITI SOHANAH HJ METUSSIN"){
	?>
	_______________________________<br style = "margin-bottom:10px;"/>
	<?php
	}
	?>
	<?php echo $approver_fullname?><br/>
	<?php echo $CorporateTitle?><br/>
	DST Group Human Resources </p>
	</div>
</div>
<button type="submit" onclick="save_data('<?php echo $id;?>')" name="<?php echo $id;?>">Save</button>
<button type="submit" onclick="back('<?php echo $id;?>')" name="<?php echo $id;?>">Back</button>
</form>
</body>