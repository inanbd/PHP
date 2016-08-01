<?php
    // check if user clicked the Register button or not
    if(!isset($_REQUEST['btnRegister']))
	{
		header('Location: index.php');
		return;
	}
    // connect to DB
	require_once('db.php');
	
	// receive data that the user posted
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$dept = $_REQUEST['dept'];
	$cgpa = $_REQUEST['cgpa'];
	$email = $_REQUEST['email'];
    $contact = $_REQUEST['contact'];
    $password = $_REQUEST['password'];
    $address= $_REQUEST['address'];
    $type ="1";
    
   	// check the values that user sent. if any one is empty then we show error message
	// department cannot be empty because it is always selected
    
    if($id == '' || $name == '' || $dept == ''|| $cgpa == '' || $email == ''|| $contact == ''|| $password== ''|| $address == '')
	{
		header('Location: reg.php?err=1');
		return;
	}
    // Check if Student ID already exist or not
	$sql1 = "SELECT * FROM user WHERE id='$id'";
	$result = mysql_query($sql1);
	$row = mysql_fetch_array($result);
    if(!$row) // $row is null means there is no student with this ID
	{
		// Now insert the information
        $sql2 = "INSERT INTO student VALUES ('$id','$name','$cgpa','$address','$email','$contact','$dept')";
		mysql_query($sql2);
        $sql3 = "INSERT INTO user VALUES ('$id','$password','$type')";
        mysql_query($sql3);
		header('Location: index.php?suc=1');
	}
    else{
        header('Location: reg.php?err=2');
        return;
    }
    

?>