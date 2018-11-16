		<!-- pages/inventoryAudit.php -->
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
				<a href="pages/manageInventory.php">Inventory Update</a>
				<a  class="active" href="pages/inventoryAudit.php">Inventory Audit</a>
			  </div>
			  <div class= "containerMid">
			
				<?php
					session_start();
					include("../scripts/myDbConnect.php");
					$sql = "SELECT * from Audit";
					$result = mysqli_query($db,$sql) or die(mysqli_error());
					echo "<table cellpadding='10'>	
					<tr>
					<th>Stock Number</th>
					<th>Date Updated</th>
					<th>Updated by ID</th>
					<th>Previous Updated ID</th>
					<th>Previous Updated Date</th>
		<th>Quantity</th>
					</tr>";
					
					while($row = $result->fetch_assoc())
					{	
						$stockNum = $row['stockNum'];
						$updateDate = $row['updatedDate'] ;
						$updateID= $row['updatedByID'];
						$prevID = $row['previousUpdatedByID'];
						$prevDate = $row['previousUpdatedDate'] ;
						$quantity = $row['quanity'] ;
					echo "<tr>";
					
					echo "<td>" . $stockNum. "</td>";
					echo "<td>" . $updateDate. "</td>";
					echo "<td>" . $updateID. "</td>";
					echo "<td>" . $prevID. "</td>";
					echo "<td>" . $prevDate. "</td>";
					echo "<td>" . $quantity. "</td>";
					echo "</tr>";
					}
					echo "</table>";
					mysqli_close($db);	
				?>
			</div>
			  <div class="containerBottom" >
				<a href ="scripts/logout.php">
				  <input type="button" class="cancelbtn" value="Log out" />
				</a>
			  </div>
		  </div>
		<footer>Inventory Management Solutions, Inc. &copy;2018</footer>
		</body>
		</html>
