<?php
	session_start();
    //selected community
    require('comm_selected.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/dob-function.js"></script>
</head>
<body>
<header>
    <img src="<?php echo $comm_banner; ?>" id="banner">
</header>
<div class="topnav">
  <a href="main.php?comm=<?php echo $commName; ?>">Home</a>
  <a class="active" href="registration.php">Register</a>
  <a href="polls.php">Polls</a>
</div>
<div class="regform">
<h3>Registration</h3>
<!--the code bellow is used to display the message of the input validation-->
 <?php
    if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
    echo '<ul class="err" style="list-style-type: none; color:#8B0000;">';
    foreach($_SESSION['ERRMSG_ARR'] as $msg) {
        echo '<li>',$msg,'</li>'; 
        }
    echo '</ul>';
    unset($_SESSION['ERRMSG_ARR']);
    }
?>
<div class="regform-border">
    <form name="registration" action="reg_exec.php"  method="POST">
    <label for ="fName"><span>*</span>First Name:</label>
    <input type = "text" name ="fName" placeholder="Enter First Name.." size='15'/><br/>
    
    <label for= "lName"><span>*</span>Last Name:</label>
    <input type = "text" name ="lName" placeholder="Enter Last Name.." size='15'/><br/>
    
    <label for ="username"><span>*</span>Username:</label>
    <input type = "text" name ="username"  placeholder="Enter a username.." size='15'/><br/>        
   
    <label for ="password"><span>*</span>Password:</label>
    <input type = "password" name ="password"  placeholder="Enter password.." size='15'/><br/>    
    
    <label for ="email"><span>*</span>E-mail Address:</label>
    <input type = "email" name ="email" placeholder="Enter Email.." /><br/>
    
    <div>
    <label for ="gender" style="padding-left:1.6em"> Gender: </label>
    <label class="radvalue">
    <input type="radio" name="gender" class ="radvalue" value="Male" checked > Male</label>
    <label class="radvalue">
    <input type="radio" name="gender" class ="radvalue" value="Female">Female</label>
    <label class="radvalue">
    <input type="radio" name="gender" class ="radvalue" value="Other">Other</label>
    </div>
    
    <br>
    <div class="select-options">
    <label for ="country">Country:</label>
    <select name ="country">
      <option value="nz" selected>New Zealand</option>
      <option value="aus">Australia</option>
      <option value="ger">Germany</option>
      <option value="ind">India</option>
      <option value="mal">Malaysia</option>
      <option value="uk">United Kingdom</option>
      <option value="can">Canada</option>
    </select>
    </div>
    
    <input type="submit" name="submit" value="Register" />
    <input type ="reset"  value ="Cancel">
    </form>
</div>
</div>
</body>
</html>