
<?php
	//Start session
	session_start();	
    
    //initialise build database
    include('build.php');
    
    //redirect to main
    header("location: pick_community.php");
?>
