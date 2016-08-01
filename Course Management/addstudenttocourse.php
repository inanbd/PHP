<?php
    session_start();
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 2 ) ){
        header('Location: index.php?err=3' );
    }
    if(!isset($_REQUEST['id'])){
        header('Location: teacherHome.php');
    }
    $c_id = $_REQUEST['id'];
    //echo $c_id;
    require_once('db.php');
    
    $sql = "SELECT s_id , s_name, s_cgpa FROM student WHERE s_id <> ALL ( SELECT s_id FROM course_and_student WHERE c_id ='$c_id' )";
//    $sql = "select student.s_id  from student INNER JOIN course_and_student ON student.s_id <> course_and_student.s_id";
    $result = mysql_query($sql);
    $outputString = "";
    while($row = mysql_fetch_array($result)){
        //echo $row['s_id']." ".$row['s_name'];
        $outputString.='
            <tr>
                <td>'.$row['s_name'].'</td>
                <td>'.$row['s_id'].'</td>
                <td>'.$row['s_cgpa'].'</td>
                <td><a href= "studentadding.php?s_id='.$row['s_id'].'&c_id='.$c_id.'">add</a></td>
            </tr>
';
       
    }
    
    
?>

<html>
    <head>
        <title>Student Adding</title>
    </head>
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
        <table border="1">
            <tr> 
                <th>student Name</th>
                <th>student ID</th>
                <th>CGPA</th>
                <th >options</th>    
            </tr>
            <?php echo $outputString ?>
        </table>
    
        <label>
            <?php
                if(isset($_REQUEST['suc']) && $_REQUEST['suc'] == 1)
                {
				    echo 'Added Successfully';
                }
                if(isset($_REQUEST['err']) && $_REQUEST['err'] == 1)
                {
				    echo 'Section full';
                }
        
            ?>   
        
        </label>
    <form method="post" action="teacherHome.php"><input type="submit" value="back" /></form>
    </center>
    
    
        
    </body>
</html>