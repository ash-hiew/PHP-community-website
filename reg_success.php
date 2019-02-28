<?php
    session_start();
    //selected community
    require('comm_selected.php');
?>

<head>
    <title>Registration Successful</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />
</head>
 <header>
    <img src="images/tam-banner.png" alt="TaM-banner" id="banner">
</header>
<div class="topnav">
  <a href="main.php?comm=<?php echo $commName; ?>">Home</a>
  <a class="active" href="registration.php">Register</a>
  <a href="polls.php">Polls</a>
</div>
<body>
<div class="pollform">
<p align="center" class="style1">Registration Successful! </p>
<b id="error">Thank you for registering! You can now log in.</b>
<p align="center"><a href="main.php?comm=<?php echo $commName; ?>">Return to Home page</a></p>
</div>
</body>
</html>