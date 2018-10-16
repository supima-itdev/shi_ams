<?php
  ob_start();
  session_start();

  require "../ams/includes/menusconfig_class.php";
  include "../ams/includes/dbconfig.php";
  $oMenuConfig = new MenuConfig($dbConn);

?>

<!DOCTYPE html>
<html lang="en">

<!-- HTML HEAD
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<head>

<!-- META
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">


<!-- TITLE
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <title>AMS</title>


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


  	<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
  	<script type="text/javascript" src="js/jquery-ui.js"></script>
  	<script type="text/javascript" src="js/validation.js"></script>
 	<script type="text/javascript" src="js/menusconfig.js"></script>


</head>

<!-- HTML BODY
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<body>

	<div class="container">
		<div class="row">
	  		<div class="tweleve column" > <!-- style="margin-top: 15%" -->
	  			<div class="wrapper">
					<header>
						<?php include_once "header.php";?>
					</header>
					<article>
						<h4>Users Menu Setup</h4>

				        <br/>

				        <input type="text" name="txtUsersname" id="txtUsersname" size="25">&nbsp;&nbsp;
				        <input type="submit" class="btnFind" id="btnFind" value="Find" >

						<br/>

				        <div class="table-wrapper">
							<div class="table-content" style="height: 340px !important">
								<table>
									<thead>
										<tr>
											<th>
												<div class="col-header">Username</div>
											</th>
											<th>
												<div class="col-header">Name</div>
											</th>
											<th>
												<div class="col-header">Menu</div>
											</th>
										</tr>
									</thead>
									<tbody id="list_usersnames">
									</tbody>  
								</table>
							</div>
						</div> <!-- table-wrapper  -->

					</article>
					<footer>
						<?php include_once "footer.php";?>
					</footer>
				</div> <!-- wrapper -->
	      	</div> <!-- column -->
	    </div> <!-- row -->
	</div> <!-- container -->

  	<div class="dialog-holder">
		<div id="dialog-users-menus">
			<div class="dialog-form">
				
				<h4>Users Menu Setup</h4>

		        <br/>

		        Username:&nbsp;&nbsp;<span class="users_name"></span>

		        <div style='display: table; width: 100%; table-layout: fixed;'>

		            <div style='display: table-cell;'> 
				        <div class="div-label">
			          		Menu
			        	</div>
			        	<div class="div-option">
        					<?php $oMenuConfig->SetElementName("ddlMenu"); echo $oMenuConfig->List_Menus();?>  
    					</div>

    					<div class="div-label">
			          		Modules
			        	</div>
			        	<div class="div-option">
        					<?php $oMenuConfig->SetElementName("ddlModule"); echo $oMenuConfig->List_Modules();?>  
    					</div>

	                </div> <!-- col --> 
		            
              	</div> <!-- row --> 
              	

		        <br/>

		        <div class="div-button" >
		         	<input type="button" class="btnSubmit" id="btnSubmit" value="Submit" style="color: #000;">
		        	<input type="button" class="btnClose" id="btnClose" value="Close" style="color: #000;">
		        </div> <!-- div-button -->

			</div> <!-- dialog-form -->
		</div> <!-- dialog-users-menus -->
	</div> <!-- dialog-holder -->

	

</body>

</html>

				

