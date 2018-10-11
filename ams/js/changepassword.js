$(function(){
	
	var newpassword = $('#txtNewPassword');
	var newpassword_val;

	function Validate(){
		
		newpassword_val = Input_Validation(newpassword,'Enter New Password');

		Set_Focus(newpassword);	

		if (newpassword_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate


	function ResetPassword(){

			var user = $('#hiduser').val();
			var param = {
					"Action":"ResetPassword",
					"NewPassword":newpassword_val,
					"Username":user
				};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "ChangePasswordAction.php",
	            data: {data:param} ,
	            success: function (result){
	            	console.log("success: "+ result);	
	            },
	            error: function (result){
	                console.log("error: "+ result);	
	            }

			});//ajax
	}





	$('#btnSubmit').click(function(e){
		e.preventDefault();

		stat_flag = Validate();

		if(stat_flag == true){
			$('#dialog-notifier').dialog('open');
		}

	});

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
                
            },
            No: function () {                                                                 
            	$(this).dialog("close");
            }
        },
		close: function(event, ui) {
          location.reload();
     	}
    }); //notifier
});