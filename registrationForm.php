		<!-- pages/registrationForm.php -->
		<?php

		session_start();
		include ("../common/document_head.html"); 
		?>

		<body>

		<main>
				<form id="registrationForm"
					  action="scripts/registrationFormResponse.php"
					  method="post">
				  <div class="imgcontainer">
					<img src="images/logo3.png" alt="login" class="login">
		  </div>

				  <div class="container">
					<label id="cred">Username</label>
					<input name="userName"
									type="text" placeholder="Enter Username" size="20"
									title="Must be at least 6 letters and or digits"
									pattern=".{6,}" required="">

					  <label id="cred">Password</label>
					  <input name="password"
									  type="password" placeholder="Enter Password" size="20"
									  title="Must be at least 6 letters and or digits"
									  pattern="^\w{6,}$" required="">
		  <label id="comfirmpassword">Confirm Password </label>
			 <input name="confirmpassword"
			 type="password" placeholder="Confirm Password" size="20"
									  title="Must be at least 6 letters and or digits"
									  pattern="^\w{6,}$" required="" >
						<label id="fName">First Name</label>
						<input name="fName"
										type="text" placeholder="Enter First Name" required="">

						  <label id="lName">Last Name</label>
						  <input name="lName"
										  type="text" placeholder="Enter Last Name" required="">

							<label id="em">Email</label>
							<label id="ph">Phone Number</label>
							<input name="email"
											type="email" placeholder="Enter Email"
								   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="">


							  <input name="phone" id="phone"
											  type="tel" placeholder="Enter phone ex. 555-555-5555"
									 pattern="\d{3}[\-]\d{3}[\-]\d{4}" required="">
		 
								<label id="question">Select your secret question:</label>
								<select name="quest">
								  <option value="Null"></option>
								  <option value="color">What is your favorite color?</option>
								  <option value="bestFriend">What is the first name of your best friend?</option>
								  <option value="firstCarMake">What was the Make of your first vehicle?</option>
								</select>
								<label id="answer">Answer</label>
								<input name="ans"
								   type="text" placeholder="Enter your answer" required="">
								</div>
								<button type="submit">Register</button>
								
								

				  <div class="containerBottom" >
					<button type="reset" class="cancelbtn">Reset</button>
					<span class="psw">
					  <a href="index.php">Home</a>
					</span>
				  </div>
				</form>
				<footer>Inventory Management Solutions, Inc. &copy;2018</footer>
		</body>
		</html>
			