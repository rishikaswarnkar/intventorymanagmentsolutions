<?php include ("common/document_head.html"); ?>
<!--index.php -->
<body>

<form
	id="loginForm"
    action="scripts/loginFormProcess.php"
    method="post"> 
  <div class="imgcontainer">
    <img src="images/logo3.png" alt="login" class="login">
  </div>

  <div class="container">
    <label id="cred">Username</label>
	<input name="loginName"
                  type="text" placeholder="Enter Username" size="20"
                  title="Must be at least 6 letters and or digits"
                  pattern=".{6,}" required>

    <label id="cred">Password</label>
	<input name="loginPassword"
                  type="password" placeholder="Enter Password" size="20"
                  title="Must be at least 6 letters and or digits"
                  pattern="^\w{6,}$" required>

    <button type="submit">Login</button>
    <label id="remember">
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
	<a id="reg" href="pages/registrationForm.php">Register new account</a>
  </div>

  <div class="containerBottom" >
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="pages/forgotPasswordPage.php">password?</a></span>
  </div>
</form>
<footer>Inventory Management Solutions, Inc. &copy;2018</footer>

</body>
</html>