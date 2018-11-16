		<!-- pages/IMSManager.php -->
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
				<a href="pages/inventoryAudit.php">Inventory Audit</a>
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
