<?php

$host = 'localhost' ;
  $dbUser = 'root' ;
  $dbPass = '' ;
  $dbName = 'php_community' ;
  
 
$db = new MySQL( $host, $dbUser, $dbPass, $dbName ) ;
$db->selectDatabase();


?>