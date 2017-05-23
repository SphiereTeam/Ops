<?php
include("nav.php");
   if(isset($_POST['data']) && $_POST['data'] != "")
   {
     $data=$_POST['data'];
	$s = "Select * from attendance where attendance_id = '$data'";
	
	if($run_sql = mysql_query($s))
	{
		$month = mysql_result($run_sql,0,'Month');
		$year = mysql_result($run_sql,0,'Year');
		$month_name =  date('F', mktime(0, 0, 0, $month, 10));
	}
   }
	else{
		?>
		<script>window.location.assign("sheet_submit.php")</script>
		<?php
	}   
?>
<script>
$(document).on('dblclick', '#li', function () {
    oriVal = $(this).text();
    $(this).text("");
    input = $("<input type='text'>");
    input.appendTo('#li').focus();

});

$(document).on('focusout', 'input', function () {
    if (input.val() != "") {
        newInput = input.val();
        $(this).hide();
        $('#li').text(newInput);
    } else {
        $('#li').text(oriVal);
    }

});


</script>

<style>
#input_disabled{
	background:transparent;
	border:1px solid transparent;
}
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
						Edit my <?php echo $month_name." ".$year;?> Sheet
						<small>page</small>
					  </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Sheet</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sheet Lists</h3>
                    <div class="pull-right">
					<a class = "btn btn-warning" type = "button"><i class = "fa fa-pencil"></i> Edit Sheet</a>
                    </div>
                </div>
                <div class="box-body" style="display: block;">
				<table class="table table-hover">
                                <thead><tr>
                                    <th style="overflow:hidden;min-width:100px;">Date</th>
                                    <th style="overflow:hidden;">Day</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">AM IN</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">AM OUT</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">PM IN</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">PM OUT</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">OT In</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">OT Out</th>
                                    <th class="td text-center" style="overflow:hidden;min-width:50px;">Total Hours</th>
                                    <th class="td" style="overflow:hidden;min-width:250px;">Remarks</th>
                                </tr>
								</thead>
								<tbody>
									<?php
									$sql = mysql_query("SELECT * FROM `attendance_details` where attendance_id = '$data'");
									while($row = mysql_fetch_array($sql)){
									$time_in = "08:00:00";
									
									$time_exceed = strtotime($row['AM_IN']) - strtotime($time_in);
									
									?>
										<tr>
											<td class="pull-left" ><?php echo Date("d/m/Y",strtotime($row['date']))?></td>
											<td class="text-left" ><?php echo date("l",strtotime($row['date'])); ?></td>
											<td class="text-center" style = "color:<?php if($time_exceed>0){echo "red;font-weight:700;";}if($time_exceed<0){echo "green";}if($time_exceed == "-28800"){echo "#000";}?>;" ><?php if($row['AM_IN'] == "00:00:00"){echo "";}else{echo "<input   id = 'input_disabled' disabled type = 'time' value = '".$row['AM_IN']."'/>" ;}?></td>
											<td class="text-center" ><?php if($row['AM_OUT'] == "00:00:00"){echo "";}else{echo "<input id = 'input_disabled' disabled type = 'time' value = '".$row['AM_OUT']."'/>";}?></td>
											<td class="text-center" ><?php if($row['PM_IN'] == "00:00:00"){echo "";}else{echo "<input  id = 'input_disabled'  disabled type = 'time' value = '".$row['PM_IN']."'/>";}?></td>
											<td class="text-center" ><?php if($row['PM_OUT'] == "00:00:00"){echo "";}else{echo "<input id = 'input_disabled'   disabled type = 'time' value = '".$row['PM_OUT']."'/>" ;}?></td>
											<td class="text-center" ><?php if($row['OT_IN'] == "00:00:00"){echo "";}else{echo "<input  id = 'input_disabled'  disabled type = 'time' value = '".$row['OT_IN']."'/>"  ;}?></td>
										
											<td id = "li" class="text-center" ><?php if($row['OT_OUT'] == "00:00:00"){echo "";}else{echo "<input  id = 'input_disabled'  disabled type = 'time' value = '".$row['OT_OUT']."'/>" ;}?></td>
												<td class="text-center" ><?php echo $row["Norm_hrs"]; ?></td>
											<td><?php echo $row['Remarks']?></td>
										
										</tr>
										
									<?php
									}
									
									?>
								</tbody>
				</table>
							
				
				
				
                </div>
			
			<div class="box-footer">
				<div class = "margin pull-right">
					<a class="btn btn-success" href = "sheet_submit.php"> <span><i class = "fa fa-arrow-left"></i></span> Back</a>
					<button type="submit" class="btn btn-primary"><span><i class = "fa fa-check"></i></span> Submit My Sheet</button>
					
				</div>
            </div>
			
			</div>
			
        </section>
    </div>
    <?php
	
	include("footer.php");
	?>
