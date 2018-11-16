<?php

// scripts/loginFormProcess.php
session_start();
ob_start();
include("myDbConnect.php");
		

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($db, trim($_POST[loginName]));
$password = mysqli_real_escape_string($db, trim($_POST[loginPassword]));


//Authenticate user
$query = "SELECT authNum, authLevel, userName FROM Authentication WHERE userName = '$username' AND password = '$password' ";
$sql = mysqli_query($db, $query);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$AuthLevel = $row['authLevel'];

$result = $db->query($query);
	if($result->num_rows == 1)
	{
		$_SESSION['userID'] = $row['authNum'];
		$_SESSION['userName'] = $row['userName'];
    $_SESSION['AuthLevel'] = $row['authLevel'];
    
		if($AuthLevel == 1)
		{	
			header('Location: ../pages/IMSManager.php');
			exit();
		}
        if($AuthLevel == 2)
		{
			header('Location: ../pages/IMSClerk.php');
			exit();
		}

    }
	else{
		echo "The username or password does not exist. Please try again.<br>";
		echo '<a href="#" onclick="history.go(-1)">Go Back</a>';
	}

mysqli_close($db);
?>
