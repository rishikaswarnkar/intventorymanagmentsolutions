		<!-- pages/IMSClerk.php -->
		<?php
		session_start();
		if(!session_id() || !isset($_SESSION) || empty($_SESSION['userID']))
		{
		  header('Location: ../index.php');
		  die("Redirecting to Login screen.");
		  }
		if ($_SESSION['AuthLevel']==1 || $_SESSION['AuthLevel']==2)
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
			<label id ="clerk">IMS Clerk</label>
		  </div>

		  <div class="containerMid">
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
				<label id="stockN">Enter the stock Number to update</label>
				<label id="qty">Enter quantity </label>
				<input type="text" placeholder="Enter Stock Number" name="stockNumber">
				<input type="text" placeholder="Enter Quantity" name="quantity">
				<input type="submit" name="update_Quantity" value="Update" >
			  </form>
		</div>
		  <div class="containerBottom" >
			<a href ="scripts/logout.php">
			  <input type="button" class="cancelbtn" value="Log out" />
			</a>
			
		  </div>
		</form>
		<footer>Inventory Management Solutions, Inc. &copy;2018</footer>

		</body>
		</html>