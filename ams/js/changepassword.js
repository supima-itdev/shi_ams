$(function(){
	
	var newpassword = $('#txtNewPassword');
	
	var newpassword_val;
	

	function Validate(){
		
		newpassword_val = Input_Validation(newpassword,'Enter New Password');
		newpassword_val = $.md5(newpassword_val);

		Set_Focus(newpassword);	

		if (newpassword_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate


	function ChangePassword(){

		stat_flag = Validate();

		if(stat_flag == true){

			var user = $('#hiduser').val();

			var param = {
					"Action":"ChangePassword",
					"NewPassword":newpassword_val,
					"Username":user
				};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "ChangePasswordAction.php",
	            data: {data:param} ,
	            success: function (result){
	            	// console.log("success: "+ result);	
	            	$('#dialog-notifier').dialog('close');
	            },
	            error: function (result){
	                console.log("error: "+ result);	
	            }

			});//ajax
			
		} //if

	} //ResetPassword





	$('#btnSubmit').click(function(e){
		e.preventDefault();
		$('#dialog-notifier').dialog('open');
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
                ChangePassword();
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