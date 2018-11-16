		<!-- pages/manageUser.php -->
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
				<a class="active" href="pages/manageUser.php">Manage Users</a>
				<a href="pages/reports.php">Reports</a>
				<a href="pages/manageInventory.php">Inventory Update</a>
				<a href="pages/inventoryAudit.php">Inventory Audit</a>
			  </div>
			  <div class= "containerMid">
				<?php
					session_start();
					include("../scripts/myDbConnect.php");
					
						
					$sql = "SELECT fName, lName, email, authLevel from Authentication";
					$result = mysqli_query($db,$sql) or die(mysqli_error());  
					
					echo "<table cellpadding='10'>
					<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Authorization Level (Manager =1 / Clerk = 2)</th>
					</tr>";
					
					while($row = $result->fetch_assoc())
					{
					echo "<tr>";
					echo "<td>" . $row['fName']. "</td>";
					echo "<td>" . $row['lName'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['authLevel'] . "</td>";
					echo "</tr>";
					}
					echo "</table>";

					mysqli_close($db);	
				?>
				<hr>
				<label id="userEmail">Please enter the email of the user you want to update.</label>
			  <form id ="manageUserForm" action="scripts/manageUserProcess.php" method="post">
				<input type="text" placeholder="Enter Email" name="email" >
				<input type="submit" name="promote_button" value="Promote to Manager" >
				<input type="submit" name="demote_button" value="Demote to Clerk" >
				<input type="submit" name="delete_button" value="Delete User" >
			  </form>
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
