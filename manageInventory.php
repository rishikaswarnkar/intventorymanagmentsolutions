				<!-- pages/manageInventory.php -->
				<?php

				session_start();
				if(!session_id() || !isset($_SESSION) || empty($_SESSION['userID']))
				{
				  header('Location: ../index.php');
				  die("Redirecting to Login screen.");
				  }
				if ($_SESSION['AuthLevel']==1)
				{
				  include ("../common/document_head.html");
				  }
				  else{
						echo "You are not authorized for this page.<br>";
						die('<a href="../index.php">Log in with your credentials</a>');
					}
				?>


				<body>

				 
				  <div class="imgcontainer">
					<img src="images/logo3.png" alt="login" class="login">
					  <label id ="manager">IMS Manager</label>
					  <div class="topnav">
						<a href="pages/manageUser.php">Manage Users</a>
						<a href="pages/reports.php">Reports</a>
						<a class="active" href="pages/manageInventory.php">Inventory Update</a>
						<a href="pages/inventoryAudit.php">Inventory Audit</a>
					  </div>
					  </div>
					  <div class= "containerMid">
						 <?php
				session_start();

				include("../scripts/myDbConnect.php");	
				$query = "SELECT * FROM Inventory ";
				$sql = mysqli_query($db, $query);

				echo "<table cellpadding='10'>
					<tr>
					<th>Stock Number</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Item Details</th>
					<th>Minimum Stock Qty</th>
					<th>Quantity</th>
					<tr>";

				   // while($item = mysql_fetch_assoc($records))
					while ($item = $sql->fetch_assoc())
					{
					echo"<tr>";
					echo"<td>".$item['stockNum']."</td>";
					echo"<td>".$item['itemName']."</td>";
					echo"<td>".$item['price']."</td>";
					echo"<td>".$item['itemDetails']."</td>";
					echo"<td>".$item['stock']."</td>";
					echo"<td>".$item['quantity']."</td>";
					echo"</tr>";
					}
					echo "</table>";
					mysqli_close($db);
					?>
				 <hr>
						<form id ="changeQuantityForm"
						 action="scripts/changeQuantityProcess.php"
						  method="post">
						<label id="stockN">Enter the stock Number to update:</label>
						<label id="qty">Enter quantity: </label>
						<input type="text" placeholder="Enter Stock Number" name="stockNumber">
						<input type="text" placeholder="Enter Quantity" name="quantity">
						<input type="submit" name="update_Quantity" value="Update" >
					  </form>
					<hr>
				<label id="newItemForm">Add New Item to Inventory</label>
					<hr>
					  <form id ="insertInventoryForm"
						 action="scripts/insertInventoryProcess.php"
						  method="post">
						  <label id="newName">Enter the name:</label>
						<label id="newPrice">Enter price: </label>
						<input type="text" placeholder="Item Name" name="name">
						<input type="text" placeholder="Enter Price" name="price">
						<label id="newDesc">Enter item description: </label>
						<label id="newStock">Enter minimum stock quantity:</label>
						<input type="text" placeholder="Item Discription" name="description">
						<input type="text" placeholder="Enter Stock" name="numStock">
						<label id="newQty">Enter quantity on hand:</label>
						<input type="text" placeholder="Enter Quantity" name="numQuantity">
						<input type="submit" name="update_Inventory" value="Insert into Inventory" >
						</form>
					<hr>
						<label id="deleteItem">Remove Item from Inventory</label>
					<hr>
						<form id ="deleteItemForm" action="scripts/deletItem.php" method="post">
				<label id="deleteStock">Enter the stock number to delete:</label>
						<input type="text" placeholder="Enter Stock Number" name="stockNumber" >
						<input type="submit" name="delete_button" value="Delete Stock Item" >
						 </form>
						
						</div>
					  <div class="containerBottom" >
						<a href ="scripts/logout.php">
						  <input type="button" class="cancelbtn" value="Log out" />
						</a>
					  </div>

				<footer>Inventory Management Solutions, Inc. &copy;2018</footer>

				</body>
				</html>
