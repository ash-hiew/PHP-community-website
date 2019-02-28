<?php

function getCommID($db, $commName)
{
    $sql = "select * from community where commName = '$commName'";
    $result = $db->query($sql);
    $result = $result->fetch();
    $comm = $result['commID'];
    return $comm;
}

function getAUser($db, $userID, $commName)
{
   $sql = "select * from user 
           inner join community C on user.commID = C.commID
           where userID = '$userID'
           AND C.commName = '$commName'";
   $result = $db->query($sql);
   return $result; 
}

function getUserID($db, $theUsername, $thePassword, $commName)
   {
		$sql = "select * from user
                inner join community C on user.commID = C.commID
                where username = '$theUsername'
                AND password = '$thePassword' 
                AND C.commName = '$commName'";
        $result = $db->query($sql);
        $result = $result->fetch();
        $user = $result['userID'];
        return $user;
   }

function getUsername($db, $theUsername, $commName)
   {
		$sql = "select * from user
                inner join community C on user.commID = C.commID
                where username = '$theUsername'
                AND C.commName = '$commName'";
        $result = $db->query($sql);
        $result = $result->fetch();
        return $result;
   }   

function getPassword($db, $username)
	{
	    $sql = "SELECT password FROM user WHERE username = '$username'";
	    $result = $db->query($sql);
	    $row = $result->fetch();
	    return $row['password'];
	}   
    
function getUserType($db, $userID, $commName)
{
    $sql = "select * from user
           inner join community C on user.commID = C.commID
           where userID = '$userID'
           AND C.commName = '$commName'";    
    $result = $db->query($sql);
    $result = $result->fetch();
    $userType = $result['userType'];
    return $userType;
}

function getUsers($db, $commName)
{
    $sql = "select * from user 
           inner join community C on user.commID = C.commID
           where C.commName = '$commName'
           order by userID";
    $result = $db->query($sql);
    return $result;
}

function removeUser($db, $userID)
{
    $sql = "DELETE from user where userID = '$userID'";
    $db->query($sql);
}

function changeUsername($db, $newUsername, $userID)
	{
		$sql="UPDATE user SET username='$newUsername' WHERE userID = '$userID'";
		$result = $db->query($sql);
		//return $result;
		$sql=
			"delimiter$$

			drop trigger UsernameUpdade$$

			CREATE TRIGGER UsernameUpdade
			AFTER UPDATE ON user
			FOR EACH ROW
			BEGIN
	  		 IF (Old.username != New.username) THEN
	  		 INSERT INTO message (username)
	  		 VALUES (New.username);
	  		END IF;
			END;
			$$";
	}

?>