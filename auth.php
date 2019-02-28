<?php
    //selected community
    require('comm_selected.php');
    
	//Check whether the session variable USER_ID is present or not
	if(!isset($_SESSION['theUserID']) || (trim($_SESSION['theUserID']) == '')) {
		header("location: main.php?comm=$commName");
		exit();
	}
?>