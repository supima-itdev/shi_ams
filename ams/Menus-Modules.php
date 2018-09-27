<?php

	ob_start();
  	session_start();

	require "../ams/includes/menus_modules_class.php";
  	include "../ams/includes/dbconfig.php";
  	$oMenusModules = new MenusModules($dbConn);

?>


<!DOCTYPE html>
<html lang="en">



<!-- HTML HEAD
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<head>

  <!-- META
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>AMS</title>
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css"> -->


  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  	<link rel="stylesheet" href="css/normalize.css">
  	<link rel="stylesheet" href="css/skeleton.css">
  	<link rel="stylesheet" href="css/custom.css">
  	<link rel="stylesheet" href="css/jquery-ui.css">
  	<link rel="stylesheet" href="css/table.css">
	<link rel="stylesheet" href="css/dialog.css">


  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  	<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
  	<script type="text/javascript" src="js/jquery-ui.js"></script>
  	<script type="text/javascript" src="js/validation.js"></script>
 	<script type="text/javascript" src="js/menus_modules.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 
	<div class="container">
    	<div class="row">
      		<div class="tweleve column" style="margin-top: 15%">
      			<h4>Menus and Modules</h4>
		        <br/>
				<div class="table-wrapper">
					<div class="table-content" style="height: 340px !important">
						<table>
							<thead>
								<tr>
									<th>
										<div class="col-header">Menu ID</div>
									</th>
									<th>
										<div class="col-header">Menus</div>
									</th>
								</tr>
							</thead>s
							<tbody>
								<?php echo $oMenusModules->View_Menu(); ?>
							</tbody>  
						</table>
					</div>
				</div> <!-- table-wrapper  -->
				
				<span id="add-new-menu" class="dialog-btn">Add Menu</span>
				
      		</div>
		</div>
	</div> <!-- container -->

	<div class="dialog-holder">
		<div id="dialog-menus">
			<div class="dialog-form">
				
				<h4>Menus</h4>

		        <br/>

				<div class="div-label">
		          Menu
		        </div>
		        <div class="div-input">
		          <input type="text" id="txtMenu">           
		        </div>
		        <div class="div-button">
		          <input type="button" class="btnSubmit" id="btnSubmit" value="Submit" style="color: #000;">
		          <input type="button" class="btnClose" id="btnClose" value="Close" style="color: #000;">
		        </div>


			</div> <!-- dialog-form -->
		</div> <!-- roles-dialog -->
	</div> <!-- dialog-holder -->










<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

