<?php
require_once ('MySQLDB.php');
include_once ('myFunctions.php');
include_once ('db.php');
require('comm_selected.php');

 
//---- Display The User Table
$users = getUsers($db, $commName);
echo '<h3>Member List</h3>';
echo '<form name="userForm" method="POST" action="">';
echo ("<table><tr><th>User ID</th><th>Username</th><th>Full Name</th><th>Gender</th><th>Country</th><th>Member Type</th><th>Remove User</th></tr>") ;
while ( $aRow = $users->fetch( ) )
{
	$outputLine = "<tr><td>$aRow[userID]</td>";
    $outputLine .= "<td>$aRow[username]</td>";
	$outputLine .= "<td>$aRow[fName] $aRow[lName]</td>";
	$outputLine .= "<td>$aRow[gender]</td>";
	$outputLine .= "<td>$aRow[country]</td>";
    $outputLine .= "<td>$aRow[userType]</td>";
    $outputLine .= "<td><input name='userCheckbox[]' type='checkbox' value='$aRow[userID]'></td></tr>";
	echo $outputLine;
}    
echo '</table>';
echo "<input type='submit' name='delete' value='Delete' id='delete'></form>";

    if(isset($_POST['delete']))
{
    $aUser = $_POST['userCheckbox'];
    $N = count($aUser);    
    for($i=0; $i < $N; $i++)
    {        
    removeUser($db, $aUser[$i]);
    }
    echo("You selected $N user(s): ");

    unset($_POST['delete']);
}

?>

<br><br>

