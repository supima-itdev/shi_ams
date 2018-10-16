$(function(){

	var param;
	var usersname = $('#txtUsersname');
	var lblusersname = $('.users_name');
	var ddlMenu = $('#ddlMenu');
	var ddlModule = $('#ddlModule');
	var lblusersname_val; 
	var ddlMenu_val;
	var ddlModule_val;
	
	
	function Validate(){
		
		ddlMenu_val = Input_Validation(ddlMenu,'Enter Firstname');	
		ddlModule_val = Input_Validation(ddlModule,'Enter Firstname');	

		Set_Focus(ddlMenu);
		Set_Focus(ddlModule);	

		if (ddlMenu_val && ddlModule_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate



	$('#btnFind').click(function(e){
		e.preventDefault();	
		
			param = {
				"Action":"GetUserMenus",
				"Usersname":usersname.val()
			};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
		        url: "MenusConfigAction.php",
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

	$('#btnSubmit').click(function(e){
		e.preventDefault();

		stat_flag = Validate();

		if(stat_flag == true){

			lblusersname_val = lblusersname.text();

			param = {
				"Action":"AddUserMenus",
				"Username":lblusersname_val,
				"Menu":ddlMenu_val,
				"Module":ddlModule_val
			};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
		        url: "MenusConfigAction.php",
		        data: {data:param} ,
		        success: function (result){
		        	// console.log("success: "+ result);
		        	$('#dialog-users-menus').dialog('close');
		        },
		        error: function (result){
		            // console.log("error: "+ result);	
		        }
			});//ajax

		} //if
	});	

	
	$(document).on('click','.btnOpen',function(e){
		e.preventDefault();
		var users_name = $(this).closest('tr').find('td:eq(0)').text();
		$('.users_name').html('');
		$('.users_name').append(users_name);
		$('#dialog-users-menus').dialog('open');
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