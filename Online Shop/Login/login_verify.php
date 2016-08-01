<?php
    session_start();
    if(!isset($_REQUEST['btnLogin']))
    {
     header('Location:../index.php');
     return;
    }
   // require_once('../db.php');

    $userName = $_REQUEST['userName'];
    $userPassword = $_REQUEST['userPassword'];

    /*$sql_id="Select u_id from user where u_name='$userName'";
    $userId = mysql_query($sql_id);
    */
    $sql = "SELECT u_type,u_id FROM user WHERE u_name='$userName' AND u_password='$userPassword'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    if($row) // $row is NOT null means there is a user with this username
    {



        $_SESSION['loggedin'] = true;
        $_SESSION['userName'] = $userName;
        $_SESSION['userId'] = $row['u_id'];
$row[0]=="1";
         if($row[0]=="1"){
            $_SESSION['u_type']="1";
            header('Location:../AdminTools/addproduct.php');
        }
        else if($row[0]=="2"){
            $_SESSION['u_type']="2";
            header('Location:../index.php');
        }
    }
    else // $row is null means there is no user with this username
    {

        header('Location:login.php');
    }

?>