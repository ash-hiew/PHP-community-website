<!DOCTYPE html>
<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['theUserID']);
    
    $selected_comm = $_GET['comm'];
    $_SESSION['selected_comm'] = $selected_comm;
    
    require('comm_selected.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>Welcome</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/navbar-style.css" />
</head>
<body>
<header>
    <img src="<?php echo $comm_banner; ?>" id="banner">
</header>
<div class="topnav">
  <a class="active" href="main.php?comm=<?php echo $selected_comm; ?>">Home</a>
  <a href="registration.php">Register</a>
  <a href="polls.php">Polls</a>
  <div class="topnav-right">
    <a href="pick_community.php">Go back to Pick Community</a>
  </div>
</div>  
<div class="logform">
<h3>Welcome</h3>
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
<form class="logform-border" action="login_exec.php" method="post" name="login">
    <label for ="username">Username :</label>
    <input type="text" name="username" placeholder="Enter Username..." size='15' />
    <br>
    <label for ="password">Password :</label>
    <input type="password" name="password" placeholder="Enter Password..." size='15' />
    <br>
    <input name="submit" type="submit" value="Login" />
    <p>Not a Member yet? <a href='registration.php'>Register Here</a></p>
</form>
	<br><br>
	<hr>
<h2><?php echo $comm_heading?></h2>
<img src="<?php echo $comm_image?>" id="intro-image">
<p>
<?php echo $comm_quote?>
</p><br>
<p>
<?php echo $comm_quote_two?></p>
</div>
</body>
</html>