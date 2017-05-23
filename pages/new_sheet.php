<?php

if(isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == "create")
{
	$month = $_REQUEST['month'];
	$year = $_REQUEST['year'];
	
	echo $month." ".$year;
	
	$number = cal_days_in_month(CAL_GREGORIAN, $month, $year); 
	$x=1;
	?>
	<script>

	</script>
	<?php
	for($x;$x<=$number;$x++)
	{
	?>
	<script>
	var table = document.getElementById("mytables");
	var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";
    cell3.innerHTML = "NEW CELL2";
    cell4.innerHTML = "NEW CELL2";
    cell5.innerHTML = "NEW CELL2";
    cell6.innerHTML = "NEW CELL2";
	
	</script>

	<?php
	}
}

include("nav.php");

?>	  
<style>
.formlabels{
	text-align:center;
	width:100px;
	oveflow=hidden;
	
}
.formlabels{
	text-align:center;
	width:100px;
	oveflow=hidden;
	
}
.formlabel2{
	width:100px;
	
}
.formlabel3{
	width:200px;
	
}

</style>

<script>

function daysInMonth() {
    var today = new Date("2016","9","18","0","0","0","0").getDay();

	alert(today);
	var a =["Sunday","Monday","Tuesday","Wednesday","Thursay","Friday","Saturday",];

	var n = a[today];
	alert(n);
		
}


function myFunction(){

	 var table = document.getElementById("mytables");
	 table.innerHTML = "";
	 document.getElementById('submit_sheet1').style.visibility='visible'
	 document.getElementById('submit_sheet2').style.visibility='visible'
	 document.getElementById('punch_form').style.visibility='visible'
	 
	 var month = document.getElementById("month").value;
	 var year = document.getElementById("year").value;
	 var noOFdays = new Date(year, month, 0).getDate();
	
	
	
	
	if(month == "0" || year == "0")
	{
		alert("Please Select Month and Year");
		return false;
	}
	
	var today;
	var a =["Sunday","Monday","Tuesday","Wednesday","Thursay","Friday","Saturday",];
	var x;
	var newMonth = month - 1;
	
	for(x=1;x<=noOFdays;x++)
	{
	var hari = new Date(year, newMonth, x,"0","0","0","0").getDay();
    var row = table.insertRow(-1);
	
	
    var cell1 = row.insertCell(0);
	cell1.className = "formlabel";
	
    var cell2 = row.insertCell(1);
	cell1.className = "formlabels";
	
    var cell3 = row.insertCell(2);
	cell2.className = "formlabel2";
	
    var cell4 = row.insertCell(3);
	cell3.className = "formlabel2";
	
    var cell5 = row.insertCell(4);
	cell4.className = "formlabel2";
	
    var cell6 = row.insertCell(5);
	cell5.className = "formlabel2";
	
    var cell7 = row.insertCell(6);
	cell6.className = "formlabel2";
	
    var cell8 = row.insertCell(7);
	cell7.className = "formlabel3";
  
	cell1.innerHTML = x+"/"+month+"/"+year;
	cell2.innerHTML = a[hari];
    cell3.innerHTML = "<input type = 'time' class = 'form-control'>";
    cell4.innerHTML = "<input type = 'time' class = 'form-control'>";
    cell5.innerHTML = "<input type = 'time' class = 'form-control'>";
    cell6.innerHTML = "<input type = 'time' class = 'form-control'>";
    cell7.innerHTML = "<input type = 'time' class = 'form-control'>"; 
    cell8.innerHTML = "<input type = 'text' class = 'form-control'></input>"; 

	}
}


function loadDiv()
{
	 var table = document.getElementById("mytables");
	 table.innerhtml = "";
}
</script>



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
	
	
	<div class = "col-md-12">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Sheet</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name = "createForm" method = "POST">
			<input type = "hidden" name = "cmd"></input>
              <div class="box-body">
		<div class = "col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">For the Year</label>
                 <select class="form-control" id = "year" name = "year" onchange = "loadDiv()">
					<option value = "0">--Please Select--</option>
					<option>2016</option>
					<option>2017</option>
				 </select>
                </div>
	</div>
	<div class = "col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Month</label>
                     <select class="form-control" id = "month" name = "month" onchange = "loadDiv()">
					<option value = "0">--Please Select--</option>
					<option value = "1">January</option>
					<option value = "2">February</option>
					<option value = "3">March</option>
					<option value = "4">April</option>
					<option value = "5">May</option>
					<option value = "6">June</option>
					<option value = "7">July</option>
					<option value = "8">August</option>
					<option value = "9">September</option>
					<option value = "10">October</option>
					<option value = "11">November</option>
					<option value = "12">December</option>
					
				 </select>
                </div>
        
              </div>
			  <div class = "col-md-12">
				<input type = "button"class = "btn btn-success pull-right" onclick = "myFunction()" value = "Create Sheet"></input>
			  </div>
			  
              </div>
              <!-- /.box-body -->
            </form>
          </div>
	</div>	
	
	
	<div class = "col-md-12">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Sheet</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
			
              <div class="box-body">
			    <div class = "col-md-6" id ="punch_form" style = "margin-bottom:50px;overflow:hidden;visibility:hidden;">
				  <label>Upload Punch Card</label>
				  <input type = "file" class = "form-control" ></input>
				  </div>
			
			  
				<table class="table table-hover">
                <tr>
					<th style = "overflow:hidden;min-width:100px;">Date</th>
					<th style = "overflow:hidden;min-width:100px;">Day</th>
					<th class = "text-center"  style = "overflow:hidden;min-width:50px;">AM IN</th>
					<th class = "text-center" style = "overflow:hidden;min-width:50px;">AM OUT</th>
					<th class = "text-center" style = "overflow:hidden;min-width:50px;">PM IN</th>
					<th class = "text-center" style = "overflow:hidden;min-width:50px;">PM OUT</th>
					<th class = "text-center" style = "overflow:hidden;min-width:50px;">Overtime</th>
					<th class = "text-center" style = "overflow:hidden;min-width:50px;">Remarks</th>
				</tr>
				
				<tbody id = "mytables">
              </tbody>
			  
			  
			  </table>
		<hr/>
				   <div class = "col-md-12">
				   <div class = "margin pull-right">
				   	<button class = "btn btn-info" id = "submit_sheet2" style = "visibility:hidden;">Clear</button>
					<button class = "btn btn-success" id = "submit_sheet1" style = "visibility:hidden;">Save Sheet</button>
				
				   </div>
				  </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
	</div>
	</section>
</div>


<?php



include("footer.php");
?>