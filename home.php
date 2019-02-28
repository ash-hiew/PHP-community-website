<?php
    session_start();

    //selected community
    require('comm_selected.php');
    
    require_once('auth.php');
    require_once ('MySQLDB.php');
    include_once ('myFunctions.php');
    //include_once ('user.php');
    include_once ('db.php');

    $userID = $_SESSION['theUserID'];
    $user = getAUser($db, $userID, $commName);
    $row = $user->fetch();
    $fullName = $row['fName'] . " " . $row['lName'];

?>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />
</head>
 <header>
    <img src="<?php echo $comm_banner; ?>" id="banner">
</header>
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="registration.php">Register</a>
  <a href="polls.php">Polls</a>
  <div class="topnav-right">
    <a href="pick_community.php">Go back to Pick Community</a>
  </div>
</div>
<body>
<div class="pollform">
<p align="center" class="style1">Login successfully </p>
<b id="welcome">Welcome : <i><?php echo $fullName; ?></i></b>
<p>Check out the Polls section to vote!</p>
<p align="center"><a href="logout.php">logout</a></p>
</div>
</body>
</html>
