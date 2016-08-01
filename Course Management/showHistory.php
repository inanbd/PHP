<?php
     session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    require_once('db.php');
    
    $s_id= $_REQUEST['s_id'];
    $c_id= $_REQUEST['c_id'];
    $table = $_REQUEST['table'];
    
    //echo $s_id." ".$c_id." ".$table;
    
    $sql="SELECT marks from `$table` WHERE c_id = '$c_id' AND s_id ='$s_id' ";
    //SELECT marks FROM `quiz_1` WHERE c_id = 1 AND s_id = "12-22473-3"
    
    
    $outputString = '<tr><th>'.$table.'</th></tr>';
    
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)){
      // echo $row['marks'];
        $outputString .= '
            <tr>
                <td>'.$row['marks'].'</td>
            </tr>
        
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
            <?php echo $outputString ?>
        </table>
        <form method="post" action="showStudentMarks.php">
            <input type="hidden" name="id" value="<?php echo $c_id ?>"/>
            <input type="submit" value="back" />
        
        </form>
    </center>
    
</body>
</html>    
    