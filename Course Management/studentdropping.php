<?php
    session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }

    require_once('db.php');
    
    $c_id = $_REQUEST['c_id'];
    $s_id = $_REQUEST['s_id'];
    
    require_once('db.php');
    $sql = "DELETE FROM course_and_student WHERE c_id = '$c_id' AND s_id = '$s_id' ";
    $result = mysql_query($sql);
    $sql = "DELETE FROM quiz_1 WHERE c_id = '$c_id' AND s_id = '$s_id' ";
    $result = mysql_query($sql);
    $sql = "DELETE FROM quiz_2 WHERE c_id = '$c_id' AND s_id = '$s_id' ";
    $result = mysql_query($sql);
    $sql = "DELETE FROM quiz_3 WHERE c_id = '$c_id' AND s_id = '$s_id' ";
    $result = mysql_query($sql);
    $sql = "DELETE FROM term WHERE c_id = '$c_id' AND s_id = '$s_id' ";
    $result = mysql_query($sql);
    
    header('Location: removeStudentFromCourse.php?id='.$c_id.'&suc=1');
?>