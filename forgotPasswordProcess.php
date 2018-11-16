<?php

// scripts/forgotPasswordProcess.php
session_start();
ob_start();
include("myDbConnect.php");	
echo("Db connected!");
$username = mysqli_real_escape_string($db, trim($_POST[user]));
//$question = mysqli_real_escape_string($db, trim($_POST[question]));
$answer = mysqli_real_escape_string($db, trim($_POST[ans]));
//Authenticate user
$query = "SELECT userName, question , answer FROM Authentication WHERE userName = '$username' and answer= '$answer'  ";
$sql = mysqli_query($db, $query);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$result = $db->query($query);
	if($result->num_rows == 1)
	{
		//echo("New Password Page in Process!!");
		header('Location: ../pages/changePassword.php');
			exit();
		}
    
	else{
		echo "The username or answer does not exist. Please try again.<br>";
		echo '<a href="#" onclick="history.go(-1)">Go Back</a>';
	}
mysqli_close($db);
?>