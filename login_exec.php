<?php
	//Start session
    require_once ('MySQLDB.php');
	session_start();
 
	//Include database connection details
	require_once('db.php');
    require_once('myFunctions.php');
    
    //selected community
    require('comm_selected.php');
    
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
    //validate username
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    if( !$username )
    {
      $errmsg_arr[] ='Username missing Please enter again';
      $errflag = true;
    }

    //validate password
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!$password)
    {
		$errmsg_arr[] = 'Password missing. Please enter again';
		$errflag = true;
    }
    
    $userPassword = getPassword($db, $username);
    if(password_verify($password, $userPassword) == false)
    {
      $errmsg_arr[] = 'Not a valid username, password combination';
      $errflag = true;
    }
    
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: main.php?comm=$commName");
		exit();
	}
    
	$theUserID = getUserID($db, $username, $userPassword, $commName);
    $theUserType = getUserType($db, $theUserID, $commName);
    
    
	if(!$theUserID) {		
        //Login failed
        $errmsg_arr[] = 'user name and password not found';
        $errflag = true;
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: main.php?comm=$commName");
            exit();
        }            
	}else {
			//Login Successful
            $_SESSION['theUserID'] = $theUserID;
            $_SESSION['theUserType'] = $theUserType;
            if($theUserType == 'admin'){
                header("location: admin_dashboard.php?comm=$commName");
                exit;
            }else{
                header("location: home.php?comm=$commName");
                exit();
            }
			
	}
}
?>