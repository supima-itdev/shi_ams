$(function(){

	var param;
	var usersname = $('#txtUsersname');

	// function Validate(){
		
	// 	usersname_val = Input_Validation(usersname,'Enter Firstname');	

	// 	Set_Focus(usersname);	

	// 	if (usersname_val){	
	// 		return true;	
	// 	}else{	
	// 		return false;	
	// 	}	
	// } //Validate



	$('#btnFind').click(function(e){
		e.preventDefault();	
		
		// stat_flag = Validate();
		// if(stat_flag == true){
		// } //if
		
			param = {
				"Action":"GetUserMenus",
				"Usersname":usersname.val()
			};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
		        url: "Users-MenusAction.php",
		        data: {data:param} ,
		        success: function (result){
		        	// console.log("success: "+ result);
		        	$('#list_usersnames').html('');
					$('#list_usersnames').append(result);
		        	
		        },
		        error: function (result){
		            // console.log("error: "+ result);	
		        }
			});//ajax
	}); //btnFind

	
	$('#btnClose').click(function(e){
		e.preventDefault();
		$('#dialog-users-menus').dialog('close');
	});


	$('#add-new-user').click(function(e){
		e.preventDefault();
		$('#dialog-users-menus').dialog('open');
	});

	$('.btnOpen').click(function(e){
		e.preventDefault();
		// $('#dialog-users-menus').dialog('open');

		alert('');
	});

	$( "#dialog-users-menus" ).dialog({
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
	}); //dialog-users

});