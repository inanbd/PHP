
<?php
    session_start();//checks loggedin and this is student
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 1 ) ){
        header('Location: index.php?err=3' );
    }
    
    
    require_once('db.php');
    $id= $_SESSION['id']; 
    
    $sql="select * from student where s_id='$id'";
	$result=mysql_query($sql);
   	$row = mysql_fetch_array($result);
    
 ?>   
<html>
	<head>
		<title>Edit</title>
	</head>
	<body>
    
    <form action="studentHome.php" method="post" >
        <input style="float: left;" type="submit" value="Home" name="btnHome"/>
        
    </form>
    
      <form action="logout.php" method="post" >
        <input style="float: right;" type="submit" value="Logout" name="btnLogout"/>
        
    </form>
    
    <br /><br />
     
    
    <hr/>
    
    <center>
                     
        <h2>Edit Personal Information</h2>
		<br/><br/>
		<form action="update.php" method="post">
			<table border="0">
				<tr>
					<td>Student ID</td>
					<td><?php echo $row['s_id']; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $row['s_name']; ?>" /></td>
				</tr>
                
   	            <tr>
					<td>CGPA</td>
				    <td><?php echo $row['s_cgpa']; ?></td>
				</tr>
                
               	<tr>
					<td>Address</td>
				    <td><input type="text" name="address"  value="<?php echo $row['s_address']; ?>"/></td>
				</tr>
						
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $row['s_email']; ?>"/></td>
				</tr>
                
   	            <tr>
					<td>Contact</td>
					<td><input type="text" name="contact" value="<?php echo $row['s_contact']; ?>" /></td>
				</tr>
               	<tr>
					<td>Department</td>
					<td><?php echo $row['s_dept']; ?></td>
				</tr>
				<tr>
				  
					<td><input type="submit" name="btnUpdate" value="Update" /></td>
                    <td> <form action="profile.php" method="post">      
                             <input style="float: right;" type="submit" name="btnUpdateBack" value="Back" />
                         </form>
                    </td>
				</tr>
			</table>		
		</form>	       
       	<label>
			<?php
				if(isset($_REQUEST['err']) && $_REQUEST['err'] == 1)
				{
					echo 'All the fields are required';
				}				
			?>
		</label>
    </center>
	
	</body>
</html>