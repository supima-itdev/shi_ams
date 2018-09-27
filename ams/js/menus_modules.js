$(function(){
	
	var menu = $('#txtMenu');
	var modules = $('#txtModule');
	var modulepath = $('#txtModulePath');

	var menu_val;
	var module_val;
	var modulepath_val;

	function Validate_Menu(){
		
		menu_val = Input_Validation(menu,'Enter Role');	

		Set_Focus(menu);	

		if (menu_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate

	function Validate_Module(){
		
		module_val = Input_Validation(modules,'Enter Module');	
		modulepath_val = Input_Validation(modulepath,'Enter Module');

		Set_Focus(modules);	
		Set_Focus(modulepath);
		

		if (module_val && modulepath_val){	
			return true;	
		}else{	
			return false;	
		}	
	} //Validate


	$('#add-new-menu').click(function(e){
		e.preventDefault();	
		$('#dialog-menus').dialog('open');
	}); //add-new-menu

	$('#btnClose_Menu').click(function(e){
		e.preventDefault();	
		$('#dialog-menus').dialog('close');
	}); //btnClose_Menu

	$('#btnSubmit_Menu').click(function(e){
		e.preventDefault();	
		
		stat_flag = Validate_Menu();

			if(stat_flag == true){

				var param = {"Action":"AddMenus","Menu":menu_val};

				param = JSON.stringify(param);

				$.ajax({
					type: "POST",
		            url: "Menus-ModulesAction.php",
		            data: {data:param} ,
		            success: function (result){
		            	// console.log("success: "+ result);

		            	if(result == 1){
		            		menu.val('');
		            	} 
		            },
		            error: function (result){
		                // console.log("error: "+ result);	
		            }

				});//ajax
			} //if
	}); //btnSubmit_Menu

	$('#add-new-module').click(function(e){
		e.preventDefault();
		$('#dialog-modules').dialog('open');
	}); //add-new-module

	$('#btnClose_Module').click(function(e){
		e.preventDefault();	
		$('#dialog-modules').dialog('close');
	}); //btnClose_Module

	$('#btnSubmit_Module').click(function(e){
		e.preventDefault();	
		
		stat_flag = Validate_Module();

			if(stat_flag == true){

				var param = {"Action":"AddModules",
							 "Modules":module_val,
							 "ModulesPath":modulepath_val
							};

				param = JSON.stringify(param);

				$.ajax({
					type: "POST",
		            url: "Menus-ModulesAction.php",
		            data: {data:param} ,
		            success: function (result){
		            	// console.log("success: "+ result);

		            	if(result == 1){
		            		modules.val('');
		            		modulepath.val('');
		            	} 
		            },
		            error: function (result){
		                // console.log("error: "+ result);	
		            }

				});//ajax
			} //if
	}); //btnSubmit_Module

	$( "#dialog-menus" ).dialog({
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
	}); //dialog-menus

	$( "#dialog-modules" ).dialog({
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
	}); //dialog-modules

});