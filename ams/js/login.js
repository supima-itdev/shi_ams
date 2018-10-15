$(function(){


	var username = $('#txtUsername');
	var password = $('#txtPassword');

	var username_val;
	var password_val;

	

	function Validate(){
		
		username_val 	= Input_Validation(username,'Enter Firstname');	
		$rawPassword 	= Input_Validation(password,'Enter Password');
		password_val 	= $.md5($rawPassword);


		Set_Focus(username);		
		Set_Focus(password);	

		if (username_val && password_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate


	$('#btnSubmit').click(function(e){
		e.preventDefault();

		

		stat_flag = Validate();

		if(stat_flag == true){


			var param = {
					"Action":"CheckCredentials",
					"Username":username_val,
					"Password":password_val
			};

			param = JSON.stringify(param);

			$.ajax({
			type: "POST",
	        url: "LoginAction.php",
	        data: {data:param} ,
	        success: function (result){
	        	// console.log("success: "+ result);	

	        	if(result == 10){
	        		window.location.href="index.php";	
	        	}else if(result == 11){
	        		window.location.href="changepassword.php";	
	        	}else{
	        		$('#err-msg').append('Username or Password Mismatch!');
	        	}
				
	        },
	        error: function (result){
	        	// console.log("error: "+ result);	
	        }

			});//ajax
			
		} //if

	});

});