<?php
// scripts/manageUserProcess.php
session_start();
ob_start();
include("myDbConnect.php");

if(!session_id() || !isset($_SESSION) || empty($_SESSION['userID']))
{
  header('Location: ../index.php');
  die("Redirecting to Login screen.");
  }
if ($_SESSION['AuthLevel']==1)
{
  }
  else{
		echo "You are not authorized for this page.<br>";
		die('<a href="../index.php">Log in with your credentials</a>');
	}

$email = $_POST['email'];
echo $email;
if (isset($_POST['promote_button'])) {
    $query = "UPDATE Authentication SET authLevel = '1' WHERE email = '$email' ";
} elseif (isset($_POST['demote_button'])) {
    $query = "UPDATE Authentication SET authLevel = '2' WHERE email = '$email' "; 
}elseif (isset($_POST['delete_button'])) {
    $query = "DELETE FROM Authentication WHERE email = '$email' ";
} else {
    echo "No button was pressed";
}

if(mysqli_query($db, $query))
		{
			header('Location: ../pages/manageUser.php');
		}
		else
		{
			echo "<h2>Failed to update user.";
		}
	



mysqli_close($db);

?>