		<!-- pages/resetPassword.php -->
		<?php include ("../common/document_head.html"); ?>

		<h1>Change Password</h1>

		<form method="post" action="">
		 <div class="imgcontainer">
			<img src="images/logo3.png" alt="login" class="login">
		  </div>
		<label for="newPassword">New Password:</label> 
		<input type="password" id="newPassword" name="newPassword" title="New password" />

		<label for="confirmPassword">Confirm Password:</label> 
		<input type="password" id="confirmPassword" name="confirmPassword" title="Confirm new password" />

		<button type="submit">Change Password</button>
		</div>
		  <div class="containerBottom" >
		   <span class="psw"> <a href="index.php">Home</a></span>
		  </div>
		</form>