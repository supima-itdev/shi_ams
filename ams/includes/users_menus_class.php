<?php


	Class UsersMenus{
		
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


		function GetUserMenus($usersname){

			$sql = "SELECT 
						username,
						CONCAT  (firstname, ', ', lastname) AS name,
						menu	
					FROM ams.users u
					LEFT JOIN ams.users_menus um ON um.userid = u.userid
					LEFT JOIN ams.menus m ON m.menuid = um.menuid
					WHERE u.username LIKE '%' || :usersname || '%'";
			$stmt = $this->_dsn->prepare($sql);
			$param = array(":usersname" => $usersname);
			$stmt->execute($param);

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td width='20%'>".$row['username']."</td>";
					$result.= "<td width='30%'>".$row['name']."</td>";
					$result.= "<td width='40%'>".$row['menu']."</td>";
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

	} //UsersMenus

?>