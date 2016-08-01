<?php 

     // check if user clicked the save button or not
     session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    require_once('db.php');
    $id= $_SESSION['id'];
    //echo $id;
    $sql = "SELECT title,c_id FROM course WHERE t_id = '$id'";
    $result = mysql_query($sql);
    $outputString= "";
    while($row = mysql_fetch_array($result)){
        $outputString .= 
        '<tr>
            <td>'.$row['title'].'</td>
                <td><a href="addstudenttocourse.php?id='.$row['c_id'].'">add student</a></td>
                <td><a href="uploadmarks.php?id='.$row['c_id'].'">upload marks </a></td>
                <td><a href="removeStudentFromCourse.php?id='.$row['c_id'].'">Remove Student</a></td>
                <td><a href="showStudentMarks.php?id='.$row['c_id'].'">Show marks</a></td>
                <td><a href="takeAttendance.php?id='.$row['c_id'].'">Take attendance</a></td>
            </tr>';
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
                <th>Course Name</th>
                <th colspan="5">Option</th>
            </tr>
            <?php echo $outputString?>
            
        </table>
        
        
    </center>
    
</body>
</html>    
    