<?php
    session_start();

    //selected community
    require('comm_selected.php');
?>
<html>
<head>
    <title>Error</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />
</head>
 <header>
    <img src="<?php echo $comm_banner; ?>" id="banner">
</header>
<div class="topnav">
  <a href="main.php?comm=<?php echo $commName; ?>">Home</a>
  <a href="registration.php">Register</a>
  <a class="active" href="polls.php">Polls</a>
</div>
<body>
<div class="pollform">
<p align="center" class="style1">Error </p>
<b id="error">User must be logged in to vote or view polls</b>
<p align="center">
<a href="main.php?comm=<?php echo $commName; ?>">Return to Home page</a>
</p>
</div>
</body>
</html>