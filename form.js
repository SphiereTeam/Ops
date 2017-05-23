<script language = "text/javascript" type="text/javascript">

function update_application(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}
function update_application_for(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}
function update_employment(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}
function update_renewal(key){
	var x = document.application_form;
	
	 var dataStr = '';
        dataStr += key.value;
		x.submit();	

	
}

function next_app(nomber){
	var x = document.application_form;
	
	alert(nomber);
	if(nomber == "2"){
		x.cmd.value = "insert";
		x.action = '<?php echo $current_file;?>';
	}
	if(nomber != "2"){
		x.new_id.value = nomber;
		x.action='tes_page.php';
	}
	x.submit();
}
function go_next_app(nomber){
	var x = document.application_form_2;
		x.submit();
}
</script>