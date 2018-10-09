<?php

	include "../ams/includes/dbconfig.php";

	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {    
    	$user = $_SESSION['user'];
    	// $role = $_SESSION['userrole'];
	}else{
    	header('Location:login.php');
  	}


	echo "
		<div style= 'display: table; width: 100%; table-layout: fixed;'>
            <div style='display: table-cell;'>
                  <!-- <img src='images/logo-title.png' alt='TFILogo' style='padding-left:10px;'> -->
            </div>
        </div>";

    echo "
    	<div style='display: table; width: 100%; table-layout: fixed;'>
            <div style='display: table-cell; text-align:right;'>
            	Welcome <b><a href=''>User</a></b>
            </div> <!-- col -->
            <div style='display: table-cell; width:8%; text-align:right; padding-right:5px;'> 
            	<a href='./logout.php' ><b>Logout</b></a>         
            </div><!-- col -->
        </div>";   
              
    echo "
    	<div style='display: table; width: 100%; table-layout: fixed; background-color: #C0C0C0;'>
        	<div style='display: table-cell; width: 50%;'>
            	<nav>
                    <ul>
                    	<li><a href='./index.php'>Home</a></li>";

		    			$sql_menu = "SELECT 
							DISTINCT(me.menuid) menuid,
							me.menu 
						FROM ams.users_menus um
						LEFT JOIN ams.menus me 
							ON me.menuid = um.menuid 
						WHERE um.username = :username";

						$stmt_menu = $dbConn->prepare($sql_menu);
						$paramVal = array(":username"	=> $user);
						$stmt_menu-> execute($paramVal);
						$MenuArr = array();

						while($MenuArr = $stmt_menu->fetch()){

	echo "				<li><a href='' >".$MenuArr['menu']."</a>
							<ul>";

								$sql_module = "	SELECT 
									module,
									modulepath
								FROM ams.users_menus um
								LEFT JOIN ams.modules mo 
									ON mo.menuid = um.menuid 
								WHERE um.username =:username AND mo.menuid = :menuid";

								$stmt_module = $dbConn->prepare($sql_module);
								$paramVal = array(":username"	=> $user,":menuid"	=> $MenuArr['menuid']);
								$stmt_module->execute($paramVal);
								$ModuleArr = array();

								while($ModuleArr = $stmt_module->fetch()){
									echo "<li><a href='".$ModuleArr['modulepath']."' >".$ModuleArr['module']."</a></li>";
								}//Module	
	echo "					</ul>";	
						}//Menu

echo "					</li>
					</ul>
				</nav>
			</div> <!-- col -->
		</div> <!-- row -->";




?>