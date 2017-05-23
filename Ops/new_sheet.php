<?php

include("nav.php");
include("database_connection.php");
if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "create")
{
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $today = date("Y-m-d");
    $sql = "select * from attendance where EmpNo = '$user_id' and Month = '".sprintf("%'.02d\n", $month)."' and Year = '$year'";
	if($query_run = mysql_query($sql))
	{
		$num_row = mysql_num_rows($query_run);
		if($num_row == "0"){
			//echo $month."<br/>".$year."<br/>";
    
    $number = cal_days_in_month(CAL_GREGORIAN, $month, $year); 
    $x=1;
    mysql_query("INSERT INTO `test`.`attendance` (`attendance_id`, `EmpNo`, `Year`, `Month`, `Punch_card_upload`, `created`, `status`) VALUES ('', '$user_id', '$year', '".sprintf("%'.02d\n", $month)."', '', '$today', 'CREATED')");
    $attendance_id = mysql_insert_id();
    for($x;$x<=$number;$x++)
    {
        $real_date = $year."-".$month."-".$x;
        $date = $x."_".$month."_".$year;
        $am_in = $_POST['IN_AM_'.$date];
        $am_out = $_POST['OUT_AM_'.$date];
        $pm_in = $_POST['IN_PM_'.$date];
        $pm_out = $_POST['OUT_PM_'.$date];
        $ot_in = $_POST['IN_OT_'.$date];
        $ot_out = $_POST['OUT_OT_'.$date];
        $remarks=mysql_real_escape_string($_POST['remarks_'.$date]);
        
        
        
        $time_out = strtotime($pm_out);
        $time_in = strtotime($am_in);
        
        $ot_timein = strtotime($ot_in);
        $ot_timeout = strtotime($ot_out);
        
        if($am_in >=8)
        {
            $actual_hrs = ((($time_out - $time_in)/60)/60) - 1.5; // 25
            
        }
        if($am_in<8){
            $time_in = strtotime('08:00:00');
            $actual_hrs = ((($time_out - $time_in)/60)/60) - 1.5; // 25
    
        }


        if($actual_hrs <0)
        {
            $actual_hrs = 0;
        }
        
        $ot_hrs = ((($ot_timeout - $ot_timein)/60)/60);
        
			?>
			<script>
			$("#box-widget").activateBox();
		</script>  

		<?php	  
			mysql_query("INSERT INTO `test`.`attendance_details` (`attendance_details_id`, `attendance_id`, `date`, `AM_IN`, `AM_OUT`, `PM_IN`, `PM_OUT`, `OT_IN`, `OT_OUT`, `Norm_hrs`, `OT_hrs`, `late_hrs`, `Remarks`) 
				VALUES ('', '$attendance_id', '$real_date', '$am_in', '$am_out', '$pm_in', '$pm_out', '$ot_in', '$ot_out', '$actual_hrs', '$ot_hrs', '', '$remarks')"); 
			}
			
		}
		else{
		?>	
		<script>alert("Cannot Proceed, Already Exist");</script>
		<?php	
			
		}
	}
    
}


?>
    <style>
    .formlabel3 {
        width: 350px;
    }
    </style>
    <script>
 /*    function daysInMonth() {
        var today = new Date("2016", "9", "18", "0", "0", "0", "0").getDay();

        alert(today);
        var a = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursay", "Friday", "Saturday", ];

        var n = a[today];
        alert(n);

    } */


    function myFunction() {
        var table = document.getElementById("mytables");
        table.innerHTML = "";


        var month = document.getElementById("month").value;
        var year = document.getElementById("year").value;
        var noOFdays = new Date(year, month, 0).getDate();




        if (month == "0" || year == "0") {
            alert("Please Select Month and Year");
            return false;
        }

        document.getElementById('submit_sheet1').style.visibility = 'visible'
        document.getElementById('submit_sheet2').style.visibility = 'visible'
        document.getElementById('punch_form').style.visibility = 'visible'
        document.getElementById('table_sheet').style.visibility = 'visible'

        var today;
        var a = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursay", "Friday", "Saturday", ];
        var x;
        var newMonth = month - 1;

        for (x = 1; x <= noOFdays; x++) {
            var hari = new Date(year, newMonth, x, "0", "0", "0", "0").getDay();
            var row = table.insertRow(-1);


            var cell1 = row.insertCell(0);
            cell1.className = "formlabel";

            var cell2 = row.insertCell(1);
            cell2.className = "formlabels";

            var cell3 = row.insertCell(2);
            cell3.className = "formlabel2";

            var cell4 = row.insertCell(3);
            cell4.className = "formlabel2";

            var cell5 = row.insertCell(4);
            cell5.className = "formlabel2";

            var cell6 = row.insertCell(5);
            cell6.className = "formlabel2";

            var cell7 = row.insertCell(6);
            cell7.className = "formlabel2";

            var cell8 = row.insertCell(7);
            cell8.className = "formlabel2";

            var cell9 = row.insertCell(8);
            cell9.className = "formlabel3";

            cell1.innerHTML = x + "/" + month + "/" + year;
            cell2.innerHTML = a[hari];
            cell3.innerHTML = "<input type = 'time' class = 'form-control' name = 'IN_AM_" + x + "_" + month + "_" + year + "' >";
            cell4.innerHTML = "<input type = 'time' class = 'form-control' name = 'OUT_AM_" + x + "_" + month + "_" + year + "' >";
            cell5.innerHTML = "<input type = 'time' class = 'form-control' name = 'IN_PM_" + x + "_" + month + "_" + year + "'  >";
            cell6.innerHTML = "<input type = 'time' class = 'form-control' name = 'OUT_PM_" + x + "_" + month + "_" + year + "'  >";
            cell7.innerHTML = "<input type = 'time' class = 'form-control' name = 'IN_OT_" + x + "_" + month + "_" + year + "'  >";
            cell8.innerHTML = "<input type = 'time' class = 'form-control' name = 'OUT_OT_" + x + "_" + month + "_" + year + "'  >";
            cell9.innerHTML = "<input type = 'text' class = 'form-control'  name = 'remarks_" + x + "_" + month + "_" + year + "'></input>";

        }




    }

    function submitSheet() {
        var s = document.createForm;
        var c = confirm("Are you sure?")
        if (c == true) {
            s.cmd.value = "create";
            s.submit;
        } else {
            return false;
        }

    }
    </script>
    <form role="form" name="createForm" method="POST">
        <input type="hidden" name="cmd"></input>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
        New Sheet
        <small>Preview page</small>
      </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">New Sheet Form</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create New Sheet</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">For the Year</label>
                                    <select class="form-control" id="year" name="year" onchange="loadDiv()">
                                        <option value="0">--Please Select--</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Month</label>
                                    <select class="form-control" id="month" name="month" onchange="loadDiv()">
                                        <option value="0">--Please Select--</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="button" class="btn btn-success pull-right" onclick="myFunction()" value="Create Sheet"></input>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-md-12" id="table_sheet" style="visibility:hidden;">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">New Sheet</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-6" id="punch_form" style="margin-bottom:50px;overflow:hidden;visibility:hidden;">
                                <label>Upload Punch Card</label>
                                <input type="file" class="form-control"></input>
                            </div>
                            <table class="table table-hover">
                                <tr>
                                    <th style="overflow:hidden;min-width:100px;">Date</th>
                                    <th style="overflow:hidden;min-width:100px;">Day</th>
                                    <th class="text-center" style="overflow:hidden;min-width:50px;">AM IN</th>
                                    <th class="text-center" style="overflow:hidden;min-width:50px;">AM OUT</th>
                                    <th class="text-center" style="overflow:hidden;min-width:50px;">PM IN</th>
                                    <th class="text-center" style="overflow:hidden;min-width:50px;">PM OUT</th>
                                    <th class="text-center" style="overflow:hidden;min-width:50px;">OT In</th>
                                    <th class="text-center" style="overflow:hidden;min-width:50px;">OT Out</th>
                                    <th class="text-center" style="overflow:hidden;min-width:50px;">Remarks</th>
                                </tr>
                                <tbody id="mytables">
                                </tbody>
                            </table>
                            <hr/>
                            <div class="col-md-12">
                                <div class="margin pull-right">
                                    <button class="btn btn-info" id="submit_sheet2" style="visibility:hidden;">Clear</button>
                                    <button class="btn btn-success" id="submit_sheet1" style="visibility:hidden;" onclick="return submitSheet()">Save Sheet</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </section>
        </div>
    </form>
    <?php



include("footer.php");
?>
