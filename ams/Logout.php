<?php 

		session_start();

		// unset($GLOBALS[_SESSION]["role"]);
		// unset($GLOBALS[_SESSION]["user"]);
		session_unset(); 
		session_destroy(); 
		header('Location:index.php');

?>