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
	$email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $contact = $_REQUEST['contact'];
    $type ="2";
    
   	// check the values that user sent. if any one is empty then we show error message
	// department cannot be empty because it is always selected
    
    if($id == '' || $name == '' ||  $email == ''|| $password == '')
	{
		header('Location: reg.php?err=1');
		return;
	}
    // Check if Student ID already exist or not
	$sql = "SELECT * FROM user WHERE id='$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
    if(!$row) // $row is null means there is no student with this ID
	{
		// Now insert the information
		$sql = "INSERT INTO teacher VALUES ('$id', '$name','$email','$contact')";
		mysql_query($sql);
        $sql = "INSERT INTO user VALUES ('$id','$password','$type')";
        mysql_query($sql);
		header('Location: index.php?suc=1');
	}
    else{
        header('Location: teacherReg.php?err=2');
        return;
    }

    

?>