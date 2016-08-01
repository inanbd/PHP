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
    $row = mysql_fetch_array($result);
		
?>

<html>
    <head>
        <title>Edit Profile</title>
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
        
       	<form action="updateTeacherInfo.php" method="post">
        <center>
			<table border="0">
				<tr>
					<td>ID:</td>
					<td><?php echo $row['t_id']; ?></td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" value="<?php echo $row['t_name']; ?>" /></td>
				</tr>
						
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $row['t_email']; ?>"/></td>
				</tr>
                
   	            <tr>
					<td>Contact</td>
					<td><input type="text" name="contact" value="<?php echo $row['t_contact']; ?>" /></td>
				</tr>
				<tr>
				  
					<td><input type="submit" name="btnUpdate" value="Update" /></td>
                    <td> 
                        <form action="teacherProfile.php" method="post">      
                             <input style="float: right;" type="submit" name="btnUpdateBack" value="Back" />
                         </form>
                    </td>
				</tr>
			</table>
            <label>
			<?php
				if(isset($_REQUEST['err']) && $_REQUEST['err'] == 1)
				{
					echo 'All the fields are required';
				}				
			?>
		  </label>
        </center>		
		</form>	     
    
    </body>

</html>