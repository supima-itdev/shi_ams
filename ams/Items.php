<?php

	ob_start();
  	session_start();

	require "../ams/includes/items_class.php";
	include "../ams/includes/dbconfig.php";
	$oItems = new Items($dbConn);

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title>AMS</title>
  <meta name="description" content="">
  <meta name="author" content="">

  	<link rel="stylesheet" href="css/normalize.css">
  	<link rel="stylesheet" href="css/skeleton.css">
  	<link rel="stylesheet" href="css/custom.css">
  	<link rel="stylesheet" href="css/jquery-ui.css">
  	<link rel="stylesheet" href="css/table.css">
	<link rel="stylesheet" href="css/dialog.css">


  	<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
  	<script type="text/javascript" src="js/jquery-ui.js"></script>
  	<script type="text/javascript" src="js/validation.js"></script>
 	<script type="text/javascript" src="js/items.js"></script>


</head>
<body>

	<div class="container">
    	<div class="row">
      		<div class="tweleve column" style="margin-top: 15%">
      			<h4>Items</h4>
		        <br/>
				<div class="table-wrapper">
					<div class="table-content" style="height: 340px !important">
						<table>
							<thead>
								<tr>
									<th>
										<div class="col-header">Item ID</div>
									</th>
									<th>
										<div class="col-header">Item</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $oItems->View_Items(); ?>
							</tbody>  
						</table>
					</div>
				</div> <!-- table-wrapper  -->
				
				<span id="add-new-item" class="dialog-btn">Add Item</span>
				
      		</div>
		</div>
	</div> <!-- container -->

	<div class="dialog-holder">
		<div id="dialog-items">
			<div class="dialog-form">
				
				<h4>Items</h4>

		        <br/>

				<div class="div-label">
		          Item
		        </div>
		        <div class="div-input">
		          <input type="text" id="txtItem">           
		        </div>

		        <div class="div-input">
        			<?php $oItems->element_name = "ddlMeasures"; echo $oItems->List_Measures();?>  
    			</div>

		        <div class="div-button">
		          <input type="button" class="btnSubmit" id="btnSubmit" value="Submit" style="color: #000;">
		          <input type="button" class="btnClose" id="btnClose" value="Close" style="color: #000;">
		        </div>


			</div> <!-- dialog-form -->
		</div> <!-- dialog-items -->
	</div> <!-- dialog-holder -->



</body>
</html>

