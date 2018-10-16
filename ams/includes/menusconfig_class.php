<?php


	Class MenuConfig{
		
		private $elementname;

		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct

		function SetElementName($elementname){
			$this-> elementname = $elementname;
		}

		function GetElementName(){
			return $this -> elementname;
		}

		function GetUserMenus($data){

			$sql = "SELECT 
						u.username,
						CONCAT  (firstname, ', ', lastname) AS name,
						menu	
					FROM ams.users u
					LEFT JOIN ams.menus_config um ON um.username = u.username
					LEFT JOIN ams.menus me ON me.menuid = um.menuid
					WHERE u.username LIKE '%' || :usersname || '%'";
			$stmt = $this->_dsn->prepare($sql);
			$param = array(":usersname" => $data);
			$stmt->execute($param);

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td width='20%'>".$row['username']."</td>";
					$result.= "<td width='30%'>".$row['name']."</td>";
					$result.= "<td width='40%'>".$row['menu']."</td>";
					$result.= "<td width='10%'>
									<div class='action-icon'>
                                  		<img src='images/edit_16x16.png' class='black'>
                                		<span class='btnOpen'><img src='images/edit_red_16x16.png' class='red'></span>
                                	</div>
                                </td>";

					$result.= "</tr>";


				} while ($row = $stmt->fetch()); 	
			}
	    	return $result;
		} //GetUserMenus		

		function List_Menus(){
		    $sql = "SELECT menuid, menu FROM ams.menus";
		    $stmt = $this->_dsn->prepare($sql);
		    $stmt->execute();
		    
		    $result = "";

		    $result .= "<select class='select-option' id='".$this->GetElementName()."' >";
		    $result .= "<option value=></option>";
		    while($row = $stmt->fetch()){
		      $result .="<option value=".$row['menuid'].">".$row['menu']."</option>";
		    }
		    $result .= "</select>";
		    return $result;
		}//List_Measures

		function List_Modules(){
		    $sql = "SELECT moduleid, module FROM ams.modules";
		    $stmt = $this->_dsn->prepare($sql);
		    $stmt->execute();
		    
		    $result = "";

		    $result .= "<select class='select-option' id='".$this->GetElementName()."' >";
		    $result .= "<option value=></option>";
		    while($row = $stmt->fetch()){
		      $result .="<option value=".$row['moduleid'].">".$row['module']."</option>";
		    }
		    $result .= "</select>";
		    return $result;
		}//List_Measures

		function AddUserMenus($username,$menu,$module){

			try{

				$sql = " SELECT ams.func_mc_addmenuconfig(:username,:menuid,:moduleid)";

				$stmt = $this->_dsn->prepare($sql);

				$param = array(":username" 		=> $username,
							   ":menuid" 		=> $menu,
							   ":moduleid" 		=> $module);

				$result = $stmt->execute($param);

				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
		} //AddUsersMenu


	} //UsersMenus



		// function Check_Input($data) {
		//   $data = trim($data);
		//   $data = stripslashes($data);
		//   $data = htmlspecialchars($data);
		//   return $data;
		// }

?>