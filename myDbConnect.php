<?php
// scripts/myDbConnect.php
include ("../private/myDbConnect.inc");//Establishing connection with our database

if (!isset($dbLocation))
{
	echo "Database location is missing.<br>
			Connection script now terminating.";
	exit(0);
}
if (!isset($dbUsername))
{
	echo "Database username is missing.<br>
			Connection script now terminating.";
	exit(0);
}
if (!isset($dbPassword))
{
	echo "Database password is missing.<br>
			Connection script now terminating.";
	exit(0);
}
if (!isset($dbName))
{
	echo "Database name is missing.<br>
			Connection script now terminating.";
	exit(0);
}

$db = mysqli_connect($dbLocation,
					$dbUsername,
					$dbPassword,
					$dbName);
						
if (mysqli_connect_errno() || ($db == null ))
{
	printf("Database connection failed: %s<br>
			Connection script now terminating.",
			mysqli_connect_error());
	exit(0);
}?>
