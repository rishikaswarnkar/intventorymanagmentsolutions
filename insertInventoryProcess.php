<?php
// scripts/insertInventoryProcess.php
session_start();
ob_start();
include("myDbConnect.php");  

$user=$_SESSION['userName'];
$AuthLevel=$_SESSION['AuthLevel'];

	
     	$query1 = "INSERT INTO Inventory(
		userName,
		itemName,
		price,
		itemDetails,
		stock,
		quantity)		

		VALUES(
		'$user',
		'$_POST[name]',
		'$_POST[price]',
		'$_POST[description]',
		'$_POST[numStock]',
		'$_POST[numQuantity]');";
		
		

   if(mysqli_query($db, $query1))
   {
		if($AuthLevel == 1)
		{	
			header('Location: ../pages/manageInventory.php');
			exit();
		}
        if($AuthLevel == 2)
		{
			header('Location: ../pages/IMSClerk.php');
			exit();
		}
	}

     else 
		{
        echo("Update Failed !");
		}

    mysqli_close($db);
?>