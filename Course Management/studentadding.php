<?php
    session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    if(($_REQUEST['c_id']==null || $_REQUEST['s_id']==null) ){
        header('Location: teacherHome.php');
    }
    $c_id = $_REQUEST['c_id'];
    $s_id = $_REQUEST['s_id'];
    
   // echo $c_id;
    //echo $s_id;
    require_once('db.php');
    $sql = "SELECT COUNT(s_id) as count FROM course_and_student";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    if($row['count']>39){
        header('Location: addstudenttocourse.php?id='.$c_id.'&err=1');
    }
    
    $sql = "INSERT INTO course_and_student (c_id, s_id , attendance ) VALUES ('$c_id','$s_id',0)";
    $result=mysql_query($sql);
    header('Location: addstudenttocourse.php?id='.$c_id.'&suc=1');
    
?>