<?php
// scripts/changePasswordProcess.php
session_start();
ob_start();
include("myDbConnect.php");	
echo("Connected to db");

$username= mysqli_real_escape_string($db, trim($_POST[user]));
$password = mysqli_real_escape_string($db, trim($_POST[password]));
$confirmpassword = mysqli_real_escape_string($db, trim($_POST[confirmpassword]));
//Authenticate user
if ($password !== $confirmpassword) {
    echo("Passwords dont match");
    exit ();
 }
$query = "SELECT userName FROM Authentication WHERE userName = '$username' ";
$sql = mysqli_query($db, $query);
$numRecords = mysqli_num_rows($sql);
	if($numRecords == 1)
	{
       //$sql1 = mysql_query("SELECT password FROM Authentication WHERE  userName ='$username'");
       $sql2=   "UPDATE Authentication SET password='$password' where 
         userName ='$username'";
$update = mysqli_query($db,$sql2);
	}
	else{
		echo("Couldnt find the user");
    }
    if($sql2)
    {
       
 echo("<script>alert('password Updated!')</script>");
 echo("<script>window.location = '/IMS/index.php';</script>");
       

    }
    else
    {
        echo("Try again !");
    }
mysqli_close($db);
?>