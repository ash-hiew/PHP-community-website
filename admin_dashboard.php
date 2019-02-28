<?php
    session_start();

    
    require_once('auth.php');
    require_once ('MySQLDB.php');
    include_once ('myFunctions.php');
    include_once ('db.php');
    require('comm_selected.php');
    
    $userID = $_SESSION['theUserID'];
    $user = getAUser($db, $userID, $commName);
    $row = $user->fetch();
    $fullName = $row['fName'] . " " . $row['lName'];
    
?> 
    
?>
<html>
<head>
    <title>Home - Administrator</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />
    <link rel="stylesheet" href="css/admin-style.css" />
</head>
 <header>
    <img src="<?php echo $comm_banner; ?>" id="banner">
</header>
<div class="topnav">
  <a class="active" href="admin_dashboard.php">Dashboard</a>

  <a href="admin_polls.php">Polls</a>
</div>
<body>
<div class="pollform">
<p align="center" class="style1">Login successfully! </p>
<h2>Admin Dashboard</h2>
<b id="welcome">Welcome : <i><?php echo $fullName; ?></i></b>
<br><br>
<div>
<?php     
    require('displayTables.php');

?>
</div>

<p align="center"><a href="logout.php">logout</a></p>
</div>
</body>
</html>
