<?php
     session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    require_once('db.php');
    
    $c_id = $_REQUEST['id'];
    $sql = "SELECT s_id , s_name FROM student WHERE s_id = ANY ( SELECT s_id FROM course_and_student WHERE c_id ='$c_id' )";
    $result = mysql_query($sql);
    $outputString = "";
    while($row = mysql_fetch_array($result)){
        $s_id=$row['s_id'];
        $s_name = $row['s_name'];
        //echo $row['s_id']." ".$row['s_name'];
        $sql = "SELECT marks FROM quiz_1 WHERE id = (SELECT MAX(id) FROM `quiz_1` WHERE s_id = '$s_id' AND c_id = $c_id)";
        $quiz = mysql_query($sql);
        $quiz_row = mysql_fetch_array($quiz);
    //    echo $quiz_row['marks'];
        
        $sql = "SELECT marks FROM quiz_2 WHERE id = (SELECT MAX(id) FROM `quiz_2` WHERE s_id = '$s_id' AND c_id = $c_id)";
        $quiz = mysql_query($sql);
        $quiz2_row = mysql_fetch_array($quiz);
    //    echo $quiz_row['marks'];
    
    
    $sql = "SELECT marks FROM quiz_3 WHERE id = (SELECT MAX(id) FROM `quiz_3` WHERE s_id = '$s_id' AND c_id = $c_id)";
        $quiz = mysql_query($sql);
        $quiz3_row = mysql_fetch_array($quiz);
    //    echo $quiz_row['marks'];
    
    $sql = "SELECT marks FROM term WHERE id = (SELECT MAX(id) FROM `term` WHERE s_id = '$s_id' AND c_id = $c_id)";
        $quiz = mysql_query($sql);
        $term_row = mysql_fetch_array($quiz);
    //    echo $quiz_row['marks'];
    $sql ="SELECT attendance FROM course_and_student WHERE c_id = '$c_id' AND s_id = '$s_id'";    
        $quiz = mysql_query($sql);
        $att_row = mysql_fetch_array($quiz);
        
        $totalMarks = 0;
        
        $quiz1Marks =$quiz_row['marks'];
        $quiz2Marks =$quiz2_row['marks'];
        $quiz3Marks =$quiz3_row['marks'];
        
        if($quiz1Marks>$quiz2Marks){
            if($quiz2Marks>$quiz3Marks){
                $totalMarks = $quiz1Marks+ $quiz2Marks;
            }
            else{
                $totalMarks = $quiz1Marks+ $quiz3Marks;
            }
        }
        else {
            if($quiz1Marks>$quiz3Marks){
                 $totalMarks = $quiz1Marks+ $quiz2Marks;
            }
            else{
                $totalMarks = $quiz2Marks+ $quiz3Marks;
            }
        }
        
        $totalMarks += $term_row['marks'];
        $outputString.='
            <tr>
                <td>'.$s_id.'</td>
                <td>'.$s_name.'</td>
                <td>'.$quiz_row['marks'].'<a href="showHistory.php?c_id='.$c_id.'&s_id='.$s_id.'&table=quiz_1">(history)</a></td>
                <td>'.$quiz2_row['marks'].'<a href="showHistory.php?c_id='.$c_id.'&s_id='.$s_id.'&table=quiz_2">(history)</a></td>
                <td>'.$quiz3_row['marks'].'<a href="showHistory.php?c_id='.$c_id.'&s_id='.$s_id.'&table=quiz_3">(history)</a></td>
                <td>'.$term_row['marks'].'<a href="showHistory.php?c_id='.$c_id.'&s_id='.$s_id.'&table=term">(history)</a></td>
                <td>'.$totalMarks.'</td>
                <td>'.$att_row['attendance'].'</td>             
                
            </tr>
';
      
    }
?>
<html>
<head><title>Home sweet home</title></head>
<body>
    <form action="logout.php" method="post">
        <input style="float: right;" type="submit" value="Logout" name="btnLogout"/>
    </form>
    <form action="teacherProfile.php" method="post">
        <input style="float: right;" type="submit" value="Profile" name="btnProfile"/>
    </form>
    <form action="teacherHome.php" method="post">
        <input style="float: right;" type="submit" value="Home" name="btnHome"/>
    </form>
    <br />
    <hr />
    <center>
        <table border="1" >
            <tr>
                <th>Id</th> 
                <th>Name</th>
                <th>Quiz_1</th>
                <th>Quiz_2</th>
                <th>Quiz_3</th>
                <th>Term</th>
                <th>Total</th>
                <th>Attendance</th>   
            </tr>
            <?php echo $outputString?>
        </table>
        <form method="post" action="teacherHome.php"><input type="submit" value="back" /></form>
    </center>
    
</body>
</html>    
    