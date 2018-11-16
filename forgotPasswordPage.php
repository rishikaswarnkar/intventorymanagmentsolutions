		<!-- pages/forgotPasswordPage.php -->
		<?php include ("../common/document_head.html"); ?>

		<body>
		<form
			id="forgotPasswordForm"
			action="scripts/forgotPasswordProcess.php"
			method="post"> 
		  <div class="imgcontainer">
			<img src="images/logo3.png" alt="login" class="login">
		  </div>
		  <div class="container">
			<label id="anything">Username</label>
			<input name="user"
							type="text" placeholder="Enter Username"
				   >
			<label id="question">Select your secret question:</label>
				  <select id="QSelection">
								  <option value="Null"></option>
								  <option value="color">What is your favorite color?</option>
								  <option value="bestFriend">What is the first name of your best friend?</option>
								  <option value="firstCarMake">What was the Make of your first vehicle?</option>
								</select>
				
								<label id="anything">Answer</label>
								<input name="ans"
								   type="text" placeholder="Enter your answer" required="">
						
			<button type="submit">Get New Password</button>
		  </div>
		  <div class="containerBottom" >
		   <span class="psw"> <a href="index.php">Home</a></span>
		  </div>
		</form>
		<footer>Inventory Management Solutions, Inc. &copy;2018</footer>
		</body>
		</html>