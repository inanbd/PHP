
<h1>welcome</h1>

<?php

     // check if user clicked the Register button or not
    if(!isset($_REQUEST['btnRegister']))
	{
		header('Location: ../index.html');
		return;
	}
    // connect to DB
	require_once('../db.php');
    
    $userName = $_REQUEST['userName'];
	$fullName = $_REQUEST['fullName'];
	$password = $_REQUEST['password'];
	$email =    $_REQUEST['email'];
    $contact =  $_REQUEST['contact'];
    $address=   $_REQUEST['address'];
    $type ="2";

	// Check if customer already exist or not
	$sql1 = "SELECT * FROM user WHERE u_name='$userName' AND u_email='$email'";
	$result = mysql_query($sql1);
	$row = mysql_fetch_array($result);
	if(!$row) // $row is null means there is no customer with this username and email
	{
		// Now insert the information
		$sql2 = "INSERT INTO user VALUES ('','$userName','$password ','$type','$email','$fullName','$address','$contact')";
		mysql_query($sql2);
		print '<script type="text/javascript">';
		print 'alert("Registration successfull")';
		print '</script>';

	}
	else{

		header('Location: regCustomer.php?err=1');

		return;
	}



?>