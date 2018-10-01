$(function(){
	
	var item = $('#txtItem');
	var list_measure = $('#ddlMeasures');

	var item_val;
	var list_measure_val;

	function Validate(){
		
		item_val = Input_Validation(item,'Enter Item');	
		list_measure_val = Input_Validation(list_measure,'Select Measure');	

		Set_Focus(item);	
		Set_Focus(list_measure);	

		if (item_val && list_measure_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate

	$('#add-new-item').click(function(e){
			e.preventDefault();	
			$('#dialog-items').dialog('open');
	});	//

	$('#btnClose').click(function(e){
			e.preventDefault();	
			$('#dialog-items').dialog('close');
	});	//

	$('#btnSubmit').click(function(e){
		e.preventDefault();

		stat_flag = Validate();

		if(stat_flag == true){

			var param = {"Action":"AddItems",
						 "Items":item_val,
						 "List_Measure":list_measure_val
						};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "ItemsAction.php",
	            data: {data:param} ,
	            success: function (result){
	            	console.log("success: "+ result);

	            	if(result == 1){
	            		item.val('');
	            		list_measure.val('');
	            	} 
	            },
	            error: function (result){
	                console.log("error: "+ result);	
	            }

			});//ajax
		} //if
	}); //btnSubmit

	$( "#dialog-items" ).dialog({
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
	}); //dialog

});