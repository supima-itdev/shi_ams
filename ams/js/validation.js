
function Input_Validation(varObject,infoMsg){

	if(isNaN(varObject.val()) == true){
		return varObject.val();
	}else{
		if(varObject.val() == ''){
			varObject.attr('placeholder',infoMsg).addClass('validate-error');
		}else{
			return varObject.val();
		}
	}

} //Input_Validation


function Set_Focus(varObject){

	varObject.focus(function(){

		varObject.removeClass('validate-error');

	});//focus

} //Set_Focus



