<?php

	ob_start();
  	session_start();

	require "../ams/includes/roles_class.php";
  	include "../ams/includes/dbconfig.php";
  	$oRoles = new Roles($dbConn);

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
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">


  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  	<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
  	<script type="text/javascript" src="js/jquery-ui.js"></script>
  	<script type="text/javascript" src="js/validation.js"></script>
 	<script type="text/javascript" src="js/roles.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 
	<div class="container">
    	<div class="row">
      		<div class="tweleve column">

      			<div class="wrapper">
					<header>
						<?php include_once "header.php";?>
					</header>
					<article>

						<h4>Roles</h4>
				        <br/>
						<div class="table-wrapper">
							<div class="table-content" style="height: 340px !important">
								<table>
									<thead>
										<tr>
											<th>
												<div class="col-header">Role ID</div>
											</th>
											<th>
												<div class="col-header">Role</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php echo $oRoles->View_Roles(); ?>
									</tbody>  
								</table>
							</div>
						</div> <!-- table-wrapper  -->
				
				<span id="add-new-role" class="dialog-btn">Add Role</span>
					</article>
					<footer>
						<?php include_once "footer.php";?>
					</footer>
				</div> <!-- wrapper -->

      			
				
      		</div>
		</div>
	</div> <!-- container -->

	<div class="dialog-holder">
		<div id="dialog-roles">
			<div class="dialog-form">
				
				<h4>Roles</h4>

		        <br/>

				<div class="div-label">
		          Role
		        </div>
		        <div class="div-input">
		          <input type="text" id="txtRole">           
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

