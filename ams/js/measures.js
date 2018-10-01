$(function(){
	
	var measure = $('#txtMeasure');
	var measure_val;

	function Validate(){
		
		measure_val = Input_Validation(measure,'Enter Measure');	

		Set_Focus(measure);	

		if (measure_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate



	$('#add-new-measure').click(function(e){
			e.preventDefault();	
			$('#dialog-measures').dialog('open');
	});	//add-new-measure

	$('#btnClose').click(function(e){
			e.preventDefault();	
			$('#dialog-measures').dialog('close');
	});	//btnClose	



	$('#btnSubmit').click(function(e){
		e.preventDefault();

		stat_flag = Validate();

		if(stat_flag == true){

			var param = {"Action":"AddMeasures","Measures":measure_val};

			param = JSON.stringify(param);

			$.ajax({
				type: "POST",
	            url: "MeasuresAction.php",
	            data: {data:param} ,
	            success: function (result){
	            	console.log("success: "+ result);

	            	if(result == 1){
	            		measure.val('');
	            		$('#dialog-measures').dialog('close');
	            	} 
	            },
	            error: function (result){
	                console.log("error: "+ result);	
	            }

			});//ajax
		} //if
	}); //btnSubmit


	$( "#dialog-measures" ).dialog({
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
	});


});