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
    
    $sql = "SELECT s_id , s_name FROM student WHERE s_id = ANY ( SELECT s_id FROM course_and_student WHERE c_id ='$c_id' )";
    $result = mysql_query($sql);
    $outputString = "";
    while($row = mysql_fetch_array($result)){
        
        $outputString.='
            <form method="post" action="marksUpload.php">
            <tr>
                <td><label >'.$row['s_id'].'</label></td>
                <td><label >'.$row['s_name'].'</label></td>
                <td><select name="tableName">
							<option>quiz_1</option>
							<option>quiz_2</option>
							<option>quiz_3</option>
							<option>term</option>
						</select></td>
                <td><input type = "text" name = "marks" /></td>
                <td><input type = "submit" name = "btnSubmitMarks" value = "upload marks" />
            </tr>
             <input type="hidden" name="s_id" value="'.$row['s_id'].'"> 
             <input type="hidden" name="c_id" value="'.$c_id.'"> 
            </form>
';
      
    }
    //<td><a href= "studentdropping.php?s_id='.$row['s_id'].'&c_id='.$c_id.'">remove</a></td>
    
    
    
    
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
                <th>student ID</th>
                <th>student Name</th>
                <th>Marks To upload</th>
                <th>Marks</th>
                <th>Option</th>  
            </tr>
            <?php echo $outputString ?>
        </table>
        <label>
            <?php
                 if(isset($_REQUEST['suc']) && $_REQUEST['suc'] == 1)
                {
				    echo 'Marks Uploaded Successfully';
                }
            ?>
        </label>
    
    <form method="post" action="teacherHome.php"><input type="submit" value="back" /></form>
    </center>
    
        
    </body>
</html>