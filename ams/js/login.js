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
	        	console.log("success: "+ result);	

	        	if(result == 1){
	        		window.location.href="index.php";	
	        	}
				
	        },
	        error: function (result){
	        	// console.log("error: "+ result);	
	        }

			});//ajax
			
		} //if

	});

});