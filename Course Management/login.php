<?php 
     // check if user clicked the login button or not
	if(!isset($_REQUEST['btnLogin']))
	{
		header('Location: index.php');
		return;
	}
    require_once('db.php');
    
    $id = $_REQUEST['id'];
    $password = $_REQUEST['password'];
   	
    $sql = "SELECT type FROM user WHERE id='$id' AND password='$password'";
    
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
    if($row) // $row is null means there is no student with this ID
	{
	
        
        session_start(); 
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
                
		if($row[0]=="1"){
		  $_SESSION['type']="1";
            header('Location:studentHome.php');
		}
        else if($row[0]=="2"){
            $_SESSION['type']="2";
            header('Location:teacherHome.php');
        }
	}
	else // $row is NOT null means there is a student/faculty with this ID
	{
		// now show error message
		header('Location: index.php?err=1');
	}
    

?>