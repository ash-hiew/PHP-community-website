<?php

require_once ('MySQLDB.php');
include_once ('myFunctions.php');
require ('db.php');

session_start();
require('comm_selected.php'); 

//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
// validate fName
$fName=filter_input(INPUT_POST, 'fName', FILTER_SANITIZE_SPECIAL_CHARS);
if (!$fName)
{
    $errmsg_arr[]='First name required';
    $errflag = true;
}

// validate lName
$lName=filter_input(INPUT_POST, 'lName', FILTER_SANITIZE_SPECIAL_CHARS);
if (!$lName)
{
    $errmsg_arr[]='Last name required';
    $errflag = true;
}

// Validate username
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$usernameCheck = getUsername($db, $username, $commName);
if (!$username)
{
    $errmsg_arr[]='Username required';
}
if ($usernameCheck)
{
    $errmsg_arr[]="Username '$username' already exists! Choose a different username";
    $errflag = true;
}

 // Validate password
 $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
 if (!$password || strlen($password) < 4) 
 {
    $errmsg_arr[]="Password must contain 4+ characters";
    $errflag = true;
 }
 
 // Create password hash
 $passwordHash = password_hash($password, PASSWORD_BCRYPT);

 
 // validate email
$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
if (!$email) {
    $errmsg_arr[]='Invalid email address';
    $errflag = true;
}

$gender=trim($_POST['gender']);
$gender=strip_tags($gender);
$gender=htmlspecialchars($gender);

$country=trim($_POST['country']);
$country=strip_tags($country);
$country=htmlspecialchars($country);

$commID = getCommID($db, $commName);


// if errflag is true, redirect page to registration.php
if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: registration.php");
    exit();
}else{
    $sql = "INSERT INTO user (fName, lName, username, password, email, gender, country, userType, commID) VALUES('$fName', '$lName', '$username', '$passwordHash', '$email', '$gender', '$country', 'user', '$commID')";
    $db->insertRow($sql);

    header("location: reg_success.php");
    exit();
}



}
?>