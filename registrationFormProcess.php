<?php
// scripts/registrationFormProcess.php
$password=$_POST[password];
$authLevel = noUserExists($db,$_POST['email']);
$confirmpassword = mysqli_real_escape_string($db, trim($_POST[confirmpassword]));
//Authenticate user
if ($password !== $confirmpassword) {
    echo("Passwords dont match");
echo"<br>";
echo '<a href="javascript:history.go(-1)">Try again</a>';
    exit ();
 }
if (emailAlreadyExists($db,$_POST['email']))
{
	$email = $_POST['email'];
	echo '<h3>Sorry, but the e-mail address ' . $email . ' is already registered.</h3>';
	echo '<a href="javascript:history.go(-1)">Try again</a>';
}
elseif(userAlreadyExists($db, $_POST['userName']))
{
	$user= $_POST['userName'];
	echo '<h3>Sorry, but the User Name ' . $user . ' is already registered.</h3>';
	echo '<a href="javascript:history.go(-1)">Try again</a>';
}
else
{
	$query = "INSERT INTO Authentication(
		userName,
		password,
		fName,
		lName,
		email,
		authLevel,
		phone,
		authNum,
		question,
		answer)		

		VALUES(
		'$_POST[userName]',
		'$_POST[password]',
		'$_POST[fName]',
		'$_POST[lName]',
		'$_POST[email]',
		'$authLevel',
		'$_POST[phone]',
		NULL,
		'$_POST[quest]',
		'$_POST[ans]');";
		
		if(mysqli_query($db, $query))
		{
			echo "<h3>IMS user has been created.</h3>";
			echo "<h3><a href='index.php' class='NoDecoration'>Log In</a>.</h3>";
		}
		else
		{
			echo "<h2>Failed to create user.";
		}
	

}

mysqli_close($db);

/*emailAlreadyExists()
Determines if the e-mail address supplied by the customer
upon registration is already in the database.
*/
function emailAlreadyExists($db, $email)
{
    $query =
      "SELECT *
      FROM Authentication 
      WHERE email = '$email'";
    $user = mysqli_query($db, $query);
    $numRecords = mysqli_num_rows($user);
    return ($numRecords > 0) ? true : false;
}

function userAlreadyExists($db, $userName)
{
    $query =
      "SELECT *
      FROM Authentication 
      WHERE userName = '$userName'";
    $user = mysqli_query($db, $query);
    $numRecords = mysqli_num_rows($user);
    return ($numRecords > 0) ? true : false;
}

function noUserExists($db, $email)
{
    $query =
      "SELECT *
      FROM Authentication";
    $user = mysqli_query($db, $query);
    $numRecords = mysqli_num_rows($user);
	if($numRecords <1)
	{
	$num="1";
	}
	else
	{
	$num="2";
	}
		
    return ($num);
}


?>