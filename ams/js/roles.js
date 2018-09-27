$(function(){
	
var role = $('#txtRole');
var role_val;

	function Validate(){
		
		role_val = Input_Validation(role,'Enter Role');	

		Set_Focus(role);	

		if (role_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate



	$('#add-new-role').click(function(e){
			e.preventDefault();	
			$('#dialog-roles').dialog('open');
	});	//AddNewTruck	

	$('#btnClose').click(function(e){
			e.preventDefault();	
			$('#dialog-roles').dialog('close');
	});	//AddNewTruck	



	$('#btnSubmit').click(function(e){
		e.preventDefault();

		stat_flag = Validate();

		if(stat_flag == true){

			var param = {"Action":"AddRoles","Role":role_val};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "RolesAction.php",
	            data: {data:param} ,
	            success: function (result){
	            	console.log("success: "+ result);

	            	if(result == 1){
	            		role.val('');
	            	} 
	            },
	            error: function (result){
	                console.log("error: "+ result);	
	            }

			});//ajax
		} //if
	});


	$( "#dialog-roles" ).dialog({
		dialogClass: 'no-close',
		modal: true,
		autoOpen:false,
		height: 400,
	  	width: 600,
	  	draggable:false, 
	  	resizable:false,
		close: function(event, ui) {
	      location.reload();
	 	}
	});

});