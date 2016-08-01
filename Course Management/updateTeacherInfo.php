<?php
    session_start();//checks loggedin and this is student
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    
    require_once('db.php');
    
    $id=$_SESSION['id'];
    $name= $_REQUEST['name'];
    $email= $_REQUEST['email'];
    $contact= $_REQUEST['contact']; 
    
    if($name == '' ||  $email == '' ||  $contact == '')
	{
		header("Location:editTeacher.php?err=1");
		return;
	}
    
    $sql="update teacher set t_name='$name',t_email='$email',t_contact='$contact' where t_id='$id'";
	$result=mysql_query($sql);
    header('Location: teacherProfile.php');
   
    
 ?>   
 
 
 