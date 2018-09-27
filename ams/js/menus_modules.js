$(function(){
	
var menu = $('#txtMenu');


$('#add-new-menu').click(function(e){
	e.preventDefault();	
	$('#dialog-menus').dialog('open');
});

$('#btnClose').click(function(e){
	e.preventDefault();	
	$('#dialog-menus').dialog('close');
});


$('#btnSubmit').click(function(e){
	e.preventDefault();	
	
});


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
	});

});