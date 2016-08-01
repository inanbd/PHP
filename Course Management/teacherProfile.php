<?php 

    session_start();
	if(!isset($_SESSION['loggedin'])==true && $_SESSION['type']=="2")
	{
        header('Location: index.php?err=3' );
	}
    
    
    require_once('db.php');
    $id= $_SESSION['id']; 
    
    $sql="select * from teacher where t_id='$id'";
	$result=mysql_query($sql);
   	$outputStr = '';
   	while($row = mysql_fetch_array($result))
   	{
	   $outputStr .= '<tr><td>'.$row['t_id'].'</td><td>'.$row['t_name'].'</td><td>'.$row['t_email'].'</td><td>'.$row['t_contact'].'</td><tr>';
	}
		
?>

<html>
	<head><title>Teacher Profile</title></head>
	
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
			<h1>PROFILE</h1>
			<table border="1">
			<tr>
				<th>Faculty ID</th>
				<th>Name</th>
               	<th>Email</th>								
				<th>Contact</th>
			</tr>
			<?php echo $outputStr; ?>
                       
		</table> 
        
        <br />
        <br />
        
        
       	<table>
			<tr>
				<td> <form action="editTeacher.php" method="post">
                        <input type="submit" value="Edit" name="btnEdit"/>       
                    </form> 
               </td>
               
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               
               <td> <form action="teacherHome.php" method="post">      
                             <input  type="submit" name="btnUpdateBack" value="Back" />
                    </form>
               </td>
				
			</tr>
		
                       
		</table> 
        
              
		</center>
	</body>
</html>