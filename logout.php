<?php
session_start();

// Destroying All Sessions
if(session_destroy())
{
// Redirecting To main Page
header("Location: pick_community.php");
}
?>