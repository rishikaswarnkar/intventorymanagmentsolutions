<?php
// scripts/deletItem.php
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

$sc=$_POST['stockNumber'];
$query = "DELETE FROM Inventory WHERE stockNum ='$sc'";

if(mysqli_query($db, $query))
		{
			header('Location: ../pages/manageInventory.php');
		}
		else
		{
			echo "<h2>Failed to delete item.";
		}

mysqli_close($db);

?>