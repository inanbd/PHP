<?php 
    session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    require_once('db.php');
    $s_id = $_REQUEST['s_id'];
    $c_id = $_REQUEST['c_id'];
    
    $sql = "Update course_and_student SET attendance = attendance + 1 WHERE c_id ='$c_id' AND s_id = '$s_id'";
     mysql_query($sql);
     header('Location: takeAttendance.php?id='.$c_id);

?>