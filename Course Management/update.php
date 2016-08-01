<?php
    session_start();//checks loggedin and this is student
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 1 ) ){
        header('Location: index.php?err=3' );
    }
    
    require_once('db.php');
    
    $id=$_SESSION['id'];
    $name= $_REQUEST['name'];
    $address= $_REQUEST['address'];
    $email= $_REQUEST['email'];
    $contact= $_REQUEST['contact']; 
    
    if($name == '' ||  $address == '' ||  $email == '' ||  $contact == '')
	{
		header("Location:edit.php?err=1");
		return;
	}
    
    $sql="update student set s_name='$name',s_address='$address',s_email='$email',s_contact='$contact' where s_id='$id'";
	$result=mysql_query($sql);
    header('Location: profile.php');
   
    
 ?>   
 
 
 