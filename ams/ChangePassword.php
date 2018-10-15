<?php
  ob_start();
  session_start();

  require "../ams/includes/users_class.php";
  include "../ams/includes/dbconfig.php";
  $oUsers = new Users($dbConn);

  if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {    
    $user = $_SESSION['user'];
  }else{
    // header('Location:login.php');
  }
  
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
	<link rel="stylesheet" href="css/dialog.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">

  	<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
  	<script type="text/javascript" src="js/jquery-ui.js"></script>
  	<script type="text/javascript" src="js/jquery.md5.js"></script>
  	<script type="text/javascript" src="js/validation.js"></script>
  	<script type="text/javascript" src="js/changepassword.js"></script>




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
						<h4>Change Password</h4>
						<br/>
						<div>
							New Password &nbsp;&nbsp;<input type="password" id="txtNewPassword"  size="25">&nbsp;&nbsp;<input type="button" class="btnSubmit" id="btnSubmit" value="Submit">
							<input type="hidden" id="hiduser" value="<?php echo $user;?>">
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
		<div id="dialog-notifier">
			<div class="dialog-form">
				Do you want to continue YES/NO?
			</div> <!-- dialog-form -->
		</div> <!-- roles-dialog -->
	</div> <!-- dialog-holder -->	

  	
</body>

</html>

				