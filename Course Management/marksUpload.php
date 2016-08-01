<?php

    session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    require_once('db.php');
    // s_id r c_id ache kina verify korte hobe..
    
    $s_id = $_REQUEST['s_id'];
    $c_id = $_REQUEST['c_id'];
    $marks = $_REQUEST['marks'];
    $table = $_REQUEST['tableName'];
    
  // echo  " id :".$s_id ." course id :". $c_id . " marks: ".$marks . " table name: " .$table ;
  //UPDATE course_and_student SET attendance = attendance + 1 WHERE c_id =1 AND s_id = "12-22473-3"

    $sql= "INSERT INTO `$table` (`id`, `s_id`, `c_id`, `marks`) VALUES (null, '$s_id', $c_id, $marks)";
  //  $sql ="INSERT INTO '$table' ('id','s_id','c_id','marks')  VALUES (NULL,'$s_id','$c_id','$marks') ";
    //INSERT INTO `quiz_1` (`id`, `s_id`, `c_id`, `marks`) VALUES (NULL, '12-22473-3', '1', '20');
    mysql_query($sql);
   
   // INSERT INTO quiz_1 (s_id,c_id, marks) VALUES ( "12-22473-3", 1, 20)
    
    header('Location: uploadmarks.php?id='.$c_id.'&suc=1');

?>