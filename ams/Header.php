<?php


	include("../ams/includes/dbconfig.php");

	// if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {    
 //    	$user = $_SESSION['user'];
 //    	// $role = $_SESSION['userrole'];
	// }else{
 //    	header('Location:login.php');
 //  	}




	echo "
	<div style='padding: 30px 0 10px 0;'>
		<div style= 'display: table; width: 100%; table-layout: fixed;'>";

	echo "	<div style='display: table-cell;'>
	    		<img src='images/logo-title.png' alt='TFILogo' style='padding-left:10px;'>
	    	</div> <!-- col -->";


	$sql_notify_display = "SELECT
							  RoleId,
							  ModuleId
						FROM tfi.ext_users_role
						WHERE UserId = :userid";

	$stmt_notify_display = $dbConn->prepare($sql_notify_display);
	$paramVal = array(":userid"	=> $user);
	$result  = $stmt_notify_display-> execute($paramVal);
	
	
	while($notify_displayArr = $stmt_notify_display->fetch()){
		
		if(($notify_displayArr['RoleId'] == '1')||($notify_displayArr['RoleId'] == '2')||($notify_displayArr['RoleId'] == '3')||($notify_displayArr['RoleId'] == '4')){
			if($notify_displayArr['ModuleId'] == '3'){

					echo"	<div style='display: table-cell; width: 25%;'>
					    		<div class='notification-holder'>";

					if($role == "1" || $role == "4"){
					echo "			<div class='num-marker' style='display: inline-block; float: right; position: absolute; margin-left: 20px;' >".$forVerification."</div>";
					}else if($role == "1" || $role == "2"|| $role == "3"){
					echo "			<div class='num-marker' style='display: inline-block; float: right; position: absolute; margin-left: 20px;'>".$forApproval."</div>";
					}

				    if($role == '1'||$role == '2'||$role == '3'||$role == '4'){
					echo "			<div style='display: inline-block;'>
					                	<img src='images/doc_black_32x32.png' alt='TFILogo' class='black'>
					                	<span class='ro-link'>
					                  		<img src='images/doc_red_32x32.png' alt='TFILogo'  class='red'>
					                	</span>
					              	</div> <!-- inline-block -->
					            </div> <!-- notification-holder -->";
				    }
					echo "	</div> <!-- col -->";
			}		
		}
	}


	echo "</div> <!-- row -->";


	



	echo"      
	    <div style='display: table; width: 100%; table-layout: fixed; background-color: #C0C0C0;'>
	    	<div style='display: table-cell; width: 50%;'>
	        	<nav>
	        		<ul>
	        			<li><a href='./index.php'>Home</a></li>";

	$sql_menu = "SELECT DISTINCT
				  (ext_users_menu_module.MenuId) AS MenuId,
				  Menu
				FROM ext_users_menu_module
				  LEFT JOIN ext_menu
				    ON ext_menu.MenuId = ext_users_menu_module.MenuId 
				WHERE UserId = :userid";

	$stmt_menu = $dbConn->prepare($sql_menu);
	$paramVal = array(":userid"	=> $user);
	$result  = $stmt_menu-> execute($paramVal);
	$MenuItemsArr = array();

	while($MenuItemsArr = $stmt_menu->fetch()){

		echo "			<li><a href='' >".$MenuItemsArr['Menu']."</a>
							<ul>";

		$sql_module = "	SELECT
						  Module,
						  ModulePath,
						  ext_users_menu_module.MenuId
						FROM ext_users_menu_module
						  LEFT JOIN ext_module
						    ON ext_module.ModuleId = ext_users_menu_module.ModuleId
						WHERE UserId = :userid
						AND ext_users_menu_module.MenuId = :menuid";

		$stmt_module = $dbConn->prepare($sql_module);
		$paramVal = array(":userid"	=> 'apagueligan',":menuid"	=> $MenuItemsArr['MenuId']);
		$result = $stmt_module->execute($paramVal);
		$ModuleItemsArr = array();

		while($ModuleItemsArr = $stmt_module->fetch()){

		
		echo "					<li>
									<a href='".$ModuleItemsArr['ModulePath']."' >".$ModuleItemsArr['Module']."</a>
								</li>";
		}//Module	

		echo "				</ul>";	

	}//Menu

	echo "					
						</li>
					</ul>
				</nav>
			</div><!-- col -->

			<div style='display: table-cell; text-align:right;'>
        		Welcome <b><a href='./usersbranch.php'>$user</a></b>
      		</div> <!-- col -->

      		<div style='display: table-cell; width:8%; text-align:right; padding-right:10px;'> 
        		<a href='./logout.php' ><b>Logout</b></a>         
      		</div><!-- col -->
      
		</div> <!-- row -->
	</div>";

?>