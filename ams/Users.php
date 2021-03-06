<?php
  ob_start();
  session_start();

  require "../ams/includes/users_class.php";
  include "../ams/includes/dbconfig.php";
  $oUsers = new Users($dbConn);

  // if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {    
  //   $user = $_SESSION['user'];
  // }else{
  //   header('Location:login.php');
  // }
  
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
  	<link rel="stylesheet" href="css/jquery-ui.css">
  	<link rel="stylesheet" href="css/table.css">
	<link rel="stylesheet" href="css/dialog.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">

  	<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
  	<script type="text/javascript" src="js/jquery-ui.js"></script>
  	<script type="text/javascript" src="js/jquery.md5.js"></script>
  	<script type="text/javascript" src="js/validation.js"></script>
 	<script type="text/javascript" src="js/users.js"></script>



</head>




<!-- HTML BODY
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<body>

	<div class="container">
    	<div class="row">
      		<div class="tweleve column">

      			<div class="wrapper">
					<header>
						<?php include_once "header.php";?>
					</header>
					<article>
						<h4>Users</h4>

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
										</tr>
									</thead>
									<tbody>
										<?php echo $oUsers->View_Users(); ?>
									</tbody>  
								</table>
							</div>
						</div> <!-- table-wrapper  -->

						<br/>
						<div class='div-action-icon'>
                        	<img src='images/users_64x64.png' class='front'>
                        	<span id="add-new-user"><img src='images/users_white_64x64.png' class='front-effect'></span>
                        </div>
		        		

					</article>
					<footer>
						<?php include_once "footer.php";?>
					</footer>
				</div> <!-- wrapper -->

	            

      		</div> <!-- column -->
    	</div> <!-- row -->
  	</div> <!-- container -->

  	

  	<div class="dialog-holder">
		<div id="dialog-users">
			<div class="dialog-form">
				
				<h4>Users</h4>

		        <br/>

		        

						<div class="div-label">
							Firstname
						</div>
						<div class="div-input">
							<input type="text" id="txtFirstname"  size="25">           
						</div>		            		


						<div class="div-label">
					    	Lastname
					    </div>
					    <div class="div-input">
					    	<input type="text" id="txtLastname"  size="25">           
					    </div>

					    <div>
					        <div class="div-label" >
					          <span style="display: inline-block;">Username</span>&nbsp;
					          <span id="lblUsername" style="display: inline-block; color: #0FA900;"></span>
					        </div>
					        
					        <div class="div-label" style="display: inline-block;">
					          <span style="display: inline-block;">Password</span>&nbsp;
					          <span id="lblPassword" style="display: inline-block; color: #0FA900;"></span>
					        </div>
				        </div>

						<br/>
				        <input type="button" class="btnGenerate" id="btnGenerate" value="Generate" style="color: #000;">
		        <br/>

		        <div class="div-button" >
		         	<input type="button" class="btnSubmit" id="btnSubmit" value="Submit" style="color: #000;">
		        	<input type="button" class="btnClose" id="btnClose" value="Close" style="color: #000;">
		        </div>

			</div> <!-- dialog-form -->
		</div> <!-- dialog-users -->
	</div> <!-- dialog-holder -->

	<div class="dialog-holder">
		<div id="dialog-notifier">
			<div class="dialog-form">
				Do you want to continue YES/NO?
			</div> <!-- dialog-form -->
		</div> <!-- roles-dialog -->
	</div> <!-- dialog-holder -->

</body>

</html>

				