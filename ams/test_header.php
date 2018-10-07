<?php
	include "../ams/includes/dbconfig.php";


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

		// while($ModuleItemsArr = $stmt_module->fetch()){

		
		// echo "					<li>
		// 							<a href='".$ModuleItemsArr['ModulePath']."' >".$ModuleItemsArr['Module']."</a>
		// 						</li>";
		// }//Module	


?>








<li><a href='' >MenuMenuMenu</a>
	<ul>
		<li>
			<a href='' >Module</a>
		</li>
	</ul>
</li>