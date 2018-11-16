<?php
// scripts/changeQuantityProcess.php
session_start();
ob_start();
include("myDbConnect.php");    
$quan=$_POST['quantity']; 
$sc=$_POST['stockNumber'];
$user=$_SESSION['userName'];
$AuthLevel=$_SESSION['AuthLevel'];

$sql = "SELECT stockNum, itemName, stock from Inventory WHERE stockNum ='$sc'";
$query = mysqli_query($db, $sql);
$row = mysql_fetch_array($query);
$result = $db->query($sql);
if($result->num_rows == 1) //Check to ensure the product # exists
{
	$qryUpdate = "UPDATE Inventory SET quantity='$quan' where stockNum ='$sc'";
		if(mysqli_query($db, $qryUpdate))
		 {
		$date = "SELECT MAX(updatedDate) AS lastUpdate, updatedByID FROM Audit WHERE stockNum ='$sc'";
		$queryUpdateDate = mysqli_query($db, $date);
		while ($update = $queryUpdateDate->fetch_assoc())
		{
			$prevUpdatedDate = $update['lastUpdate'];
			$prevUpdatedBy = $update['updatedByID'];
		}
     	$query1 = "INSERT INTO Audit(
		stockNum,
		updatedByID,
		previousUpdatedByID,
		previousUpdatedDate,
		quanity)		

		VALUES(
		'$sc',
		'$user',
		'$prevUpdatedBy',
		'$prevUpdatedDate',
		'$quan')";
            
		mysqli_query($db, $query1);
		$sql2 = "SELECT stockNum, itemName, stock, quantity from Inventory WHERE stockNum ='$sc'";
		$query2 = mysqli_query($db, $sql2);
		while ($row2 = $query2->fetch_assoc())
		{
		$minQty = $row2['stock'];
		$currentQty = $row2['quantity'];
		$itemName = $row2['itemName'];

		if($quan <= $minQty)
			{
			
			$qry = "SELECT email FROM Authentication WHERE authLevel = 1";
			$messageToManager = "$itemName has reached, or is below, the minimum stock level.\r\n";
			$messageToManager .="The minimum quantity is $minQty and the current quantity is $currentQty.\r\n";
			$subject = "Low Inventory Alert";

			$headers = "From: DoNotReply@IMS.com";
			$mgrEmail = mysqli_query($db, $qry);
	
			while ($to = $mgrEmail->fetch_assoc())
			{
				mail($to['email'], $subject, $messageToManager, $headers);
			}
			}
		}

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
	

     else 
		{
        echo("Update Failed !");
		}
	}
	else
	{
	   echo( "No such stock number exists!");
     }
}


    mysqli_close($db);
?>