<?php
    session_start();

    require_once ('MySQLDB.php');
    include_once ('myFunctions.php');
    include_once ('db.php');
    include ('tam_poll.php');
    
    //selected community
    require('comm_selected.php');

    if ( !isset( $_SESSION[ 'theUserID' ] ) )
    {
        header("Location: error.php?comm=$commName");
        exit; 
    }



?>
<html>
<head>
<meta charset="utf-8">
<title>Polls</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />
    <link rel="stylesheet" href="css/poll-tab-style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/tab-function.js"></script>
</head>
<body>
 <header>
    <img src="<?php echo $comm_banner; ?>" id="banner">
</header>
<div class="topnav">
  <a href="home.php?comm=<?php echo $commName; ?>">Home</a>
  <a href="registration.php">Register</a>
  <a class="active" href="polls.php">Polls</a>
  <div class="topnav-right">
    <a href="pick_community.php">Go back to Pick Community</a>
  </div>  
</div>
<div class="pollsform">
<h2>Polls</h2>
<div class='container'>
    <!-- Tab links -->
   <div class="tab">
      <button class="tablinks" onclick="openTab(event, 'poll-listings')" id="defaultOpen">Current Polls</button>
      <button class="tablinks" onclick="openTab(event, 'poll-create')">Create</button>
  </div>
  
  <!-- Tab content-->
  <div id='poll-listings' class="tabcontent">
    <ul>
        <li style="list-style-type: none">
        <p><?php echo $poll; ?></p>
        </li>
    </ul>
  </div>
  <div id='poll-create' class="tabcontent">
    <form method="post" action="create_poll.php">
    <h3>Enter your question:</h3>
    <input name="poll_question" type="text" /><br/>
    <h3>Enter the poll options:</h3>
    <input name="poll_option1" type="text"><br/>
    <input name="poll_option2" type="text"><br/>
    <input name="poll_option3" type="text"><br/>
    <input name="poll_option4" type="text"><br/>
    <input name="submit" type="submit" />
    <input type ="reset" value ="Cancel">
    </form>
  </div>
  
    <script>
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
</div>
<a href="logout.php">Logout</a>
</div>
</body>
</html>