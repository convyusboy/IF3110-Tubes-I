<?php
include('database_connection.php');
//Include The Database Connection File 

if(isset($_POST['username']))//If a username has been submitted 
{
	$username = mysql_real_escape_string($_POST['username']);//Some clean up :)

	$check_for_username = mysql_query("SELECT userid FROM account_customer WHERE username='$username'");
	//Query to check if username is available or not 

	if(mysql_num_rows($check_for_username))
	{
		echo '1';//If there is a  record match in the Database - Not Available
	}
	else
	{
		echo '0';//No Record Found - Username is available 
	}
} else if(isset($_POST['password']))//If a password has been submitted 
{
	$password = mysql_real_escape_string($_POST['password']);//Some clean up :)

	if($password == $username)
	{
		echo '1';//If there is a  record match in the Database - Not Available
	}
	else
	{
		echo '0';//No Record Found - Username is available 
	}
} else if(isset($_POST['email']))//If a username has been submitted 
{
	$email = mysql_real_escape_string($_POST['email']);//Some clean up :)

	$check_for_email = mysql_query("SELECT userid FROM account_customer WHERE email='$email'");
	//Query to check if email is available or not 

	if(mysql_num_rows($check_for_email))
	{
		echo '1';//If there is a  record match in the Database - Not Available
	}
	else
	{
		echo '0';//No Record Found - Username is available 
	}
} 

?>