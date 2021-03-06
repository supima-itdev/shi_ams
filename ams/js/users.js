$(function(){
	
	var firstname = $('#txtFirstname');
	var lastname = $('#txtLastname');
	var label_username = $('#lblUsername');
	var label_password = $('#lblPassword');
	
	var firstname_val;
	var lastname_val;

	var label_username_val;
	var label_password_val;

	var stat_flag;

	var users_name;
	var new_password;


	function Validate(){
		
		firstname_val = Input_Validation(firstname,'Enter Firstname');	
		lastname_val = Input_Validation(lastname,'Enter Lastname');	

		Set_Focus(firstname);	
		Set_Focus(lastname);	

		if (firstname_val && lastname_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate

	function Clear(){
		firstname.val('');
	    lastname.val('');
	    label_username.text('');
		label_password.text('');
	} //Clear

	function ResetPassword(){

		var param = {
					"Action":"ResetPassword",
					"Username":users_name,
					"NewPassword":new_password
			};

		param = JSON.stringify(param);

		$.ajax({
			type: "POST",
	        url: "UsersAction.php",
	        data: {data:param} ,
	        success: function (result){
	        	// console.log("success: "+ result);

	        	if(result == 1){
	        		$('#dialog-notifier').dialog('close');
	        	}
	        },
	        error: function (result){
	            // console.log("error: "+ result);	
	        }

		});//ajax
	} //ResetPassword

	$('#btnGenerate').click(function(e){
		e.preventDefault();	
		
		stat_flag = Validate();

		if(stat_flag == true){

			initial_username = firstname_val.substring(0,1)+lastname_val.substring(0,4);

			var param = {
					"Action":"GetUsernameCount",
					"SysGen_Username":initial_username
				};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "UsersAction.php",
	            data: {data:param} ,
	            success: function (result){

	            	var ctr = result;
	            	var sysgen_username;

	            	sysgen_username = initial_username+ctr;
	            	sysgen_username = sysgen_username.replace(/\s/g,'');

	            	label_username.html(sysgen_username);
					label_password.html(sysgen_username);
	            },
	            error: function (result){
	                // console.log("error: "+ result);	
	            }

			});//ajax

		}else{
			alert('error');
		}
	}); //btnGenerate

	$(document).on('click','.btnEdit',function(e){
		e.preventDefault();

		users_name  = $(this).closest('tr').find('td:eq(0)').text();
		new_password =  $.md5(users_name);

		$('#dialog-notifier').dialog('open');
	}); //btnEdit

	$('#btnSubmit').click(function(e){
		e.preventDefault();

		stat_flag = Validate();

		if(stat_flag == true){

			label_username_val = label_username.text();
			label_password_val = $.md5(label_password.text());

			var param = {
					"Action":"AddUsers",
					"FistName":firstname_val,
					"LastName":lastname_val,
					"Username":label_username_val,
					"Password":label_password_val
				};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "UsersAction.php",
	            data: {data:param} ,
	            success: function (result){
	            	console.log("success: "+ result);

	            	if(result == 1){
	            		Clear();
	            		$('#dialog-users').dialog('close');
	            	} 
	            },
	            error: function (result){
	                // console.log("error: "+ result);	
	            }

			});//ajax
		} //if
	}); //btnSubmit0

	$('#add-new-user').click(function(e){
		e.preventDefault();	
		$('#dialog-users').dialog('open');
	});	//add-new-user	

	$('#btnClose').click(function(e){
		e.preventDefault();	
		$('#dialog-users').dialog('close');
	});	//btnClose

	$( "#dialog-users" ).dialog({
		dialogClass: 'no-close',
		modal: true,
		autoOpen:false,
		height: 460,
	  	width: 600,
	  	draggable:false, 
	  	resizable:false,
		close: function(event, ui) {
	      location.reload();
	 	}
	}); //dialog-users

	$( "#dialog-notifier" ).dialog({
		dialogClass: 'no-close',
		modal: true,
		autoOpen:false,
		height: 120,
      	width: 300,
      	draggable:false, 
      	resizable:false,
		buttons: {
            Yes: function () {
				ResetPassword();
            },
            No: function () {                                                                 
            	$(this).dialog("close");
            }
        },
		close: function(event, ui) {
          location.reload();
     	}
    }); //notifier



// console.log("success: "+ result);
// var errmsg = result;
// alert(errmsg);

// if(result == 1){
// $('#addtruck-dialog').dialog('close');
// }else{
// $('#errmsg').append(errmsg);
// }



});