		<!-- pages/reports.php -->
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
				<a class="active"  href="pages/reports.php">Reports</a>
				<a href="pages/manageInventory.php">Inventory Update</a>
				<a  href="pages/inventoryAudit.php">Inventory Audit</a>
			  </div>
			</div>	
		  <div class="containerMid" >
		<label id="lowInventory">Items Running Low in the Inventory</label>
				<?php
					session_start();
					include("../scripts/myDbConnect.php");
					$sql = "SELECT * from Inventory where quantity < stock ";
					$result = $db->query($sql);
				 if($result->num_rows > 0)
				 {
					echo "<table cellpadding='10'>
					<tr>
					<th>Stock Number</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Item Details</th>
					<th>Minimum Stock Qty</th>
					<th>Quantity</th>
					</tr>";
					while ($item = $result->fetch_assoc())
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
				 }   
				 else  
				 {
					 echo "<br>";
				   echo("Every Item has atleast 10 quanity !");
				 }        
				  mysqli_close($db);
					?>
		 </div>
			  <div class="containerBottom" >
				<a href ="scripts/logout.php">
				  <input type="button" class="cancelbtn" value="Log out" />
				</a>
			  </div>

		<footer>Inventory Management Solutions, Inc. &copy;2018</footer>
		</body>
		</html>
