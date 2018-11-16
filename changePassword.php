		<!-- pages/changePassword.php -->
		<?php include ("../common/document_head.html"); ?>
		<body>
		<form
			id="PasswordChange"
			action="scripts/changePasswordProcess.php"
			method="post"> 
		  <div class="imgcontainer">
			<img src="images/logo3.png" alt="login" class="login">
		  </div>
		  <div class="container">
			<label id="user">Username</label>
			<input name="user"
			type="text" placeholder="Enter Username" >
		  <div class="container">
			<label id="password">New Password</label>
			<input name="password"
			 type="password" placeholder="Enter Password" size="20"
									  title="Must be at least 6 letters and or digits"
									  pattern="^\w{6,}$" required="" >
			<label id="comfirmpassword">Confirm Password </label>
			 <input name="confirmpassword"
			 type="password" placeholder="Enter Password" size="20"
									  title="Must be at least 6 letters and or digits"
									  pattern="^\w{6,}$" required="" >
			<button type="submit">Change</button>
		  </div>
		  <div class="containerBottom" >
		   <span class="psw"> <a href="index.php">Home</a></span>
		  </div>
		</form>
		<footer>Inventory Management Solutions, Inc. &copy;2018</footer>
		</body>
		</html>