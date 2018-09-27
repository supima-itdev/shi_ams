$(function(){
	

	var firstname = $('#txtFirstname');
	var lastname = $('#txtLastname');
	var label_username = $('#lblUsername');
	var label_password = $('#lblPassword');
	
	var firstname_val;
	var lastname_val;

	var stat_flag;


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

	$('#btnSubmit').click(function(e){
		e.preventDefault();

		stat_flag = Validate();

		if(stat_flag == true){

			var param = {
					"Action":"AddUsers",
					"FistName":firstname_val,
					"LastName":lastname_val,
					"Username":label_username.text(),
					"Password":label_password.text()};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "UsersAction.php",
	            data: {data:param} ,
	            success: function (result){
	            	// console.log("success: "+ result);

	            	if(result == 1){
	            		Clear();
	            	} 
	            },
	            error: function (result){
	                // console.log("error: "+ result);	
	            }

			});//ajax
		} //if
	}); //btnSubmit

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
		height: 400,
	  	width: 600,
	  	draggable:false, 
	  	resizable:false,
		close: function(event, ui) {
	      location.reload();
	 	}
	}); //dialog-users



// console.log("success: "+ result);
// var errmsg = result;
// alert(errmsg);

// if(result == 1){
// $('#addtruck-dialog').dialog('close');
// }else{
// $('#errmsg').append(errmsg);
// }



});