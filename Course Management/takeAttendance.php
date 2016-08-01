<?php
     session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    
    if(!isset($_REQUEST['id'])){
        header('Location: teacherHome.php');
    }
    require_once('db.php');
    $c_id = $_REQUEST['id'];
    $outputString = "";
    $sql = "SELECT s_id , s_name FROM student WHERE s_id = ANY ( SELECT s_id FROM course_and_student WHERE c_id ='$c_id' )";
    $result = mysql_query($sql);
    // echo $row['s_id']."  ".$row['s_name'];
     while($row = mysql_fetch_array($result)){
        
        $s_id = $row['s_id'];
        $sql =" SELECT attendance FROM course_and_student WHERE c_id = $c_id AND s_id = '$s_id'" ;
        $result2 = mysql_query($sql);
        $row2 = mysql_fetch_array($result2);
        
        $outputString.='
            <form method="post" action="giveAttendance.php">
            <tr>
                <td><label >'.$row['s_id'].'</label></td>
                <td><label >'.$row['s_name'].'</label></td>
                <td><label >'.$row2['attendance'].'</label></td>
                
                <td><input type = "submit" name = "attendance" value = "give attendance" />
            </tr>
             <input type="hidden" name="s_id" value="'.$row['s_id'].'"> 
             <input type="hidden" name="c_id" value="'.$c_id.'"> 
            </form>
';
     
     }
    
    
    

?>
<html>
<head><title>Attendance</title></head>
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
                <th colspan="2">Attendance</th>                
            </tr>
            <?php echo $outputString ?>
        </table>
        <form method="post" action="teacherHome.php"><input type="submit" value="back" /></form>
    </center>
    
</body>
</html>    
    