<?php

    
    session_start();//checks loggedin and this is student
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 1 ) ){
        header('Location: index.php?err=3' );
    }
    
    
    require_once('db.php');
    $id= $_SESSION['id']; 
    
    $sql="select * from student where s_id='$id'";
	$result=mysql_query($sql);
   	$outputStr = '';
		
	//$row = mysql_fetch_array($result);
	while($row = mysql_fetch_array($result))
    	{
			$outputStr .= '<tr><td>'.$row['s_id'].'</td><td>'.$row['s_name'].'</td><td>'.$row['s_cgpa'].'</td><td>'.$row['s_address'].'</td><td>'.$row['s_email'].'</td><td>'.$row['s_contact'].'</td><td>'.$row['s_dept'].'</td><tr>';
		}
	//	mysql_close($conn);

?>

<html>
	<head><title>Student Profile</title></head>
	
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
			<h1>PROFILE</h1>
			<table border="1">
			<tr>
				<th>Student ID</th>
				<th>Name</th>
               	<th>CGPA</th>								
				<th>Address</th>
				<th>Email</th>
				<th>Contact</th>
			    <th>Dept</th>
				
			</tr>
			<?php echo $outputStr; ?>
                       
		</table> 
        
        <br />
        <br />
        
        
       	<table>
			<tr>
				<td> <form action="edit.php" method="post">
                        <input type="submit" value="Edit" name="btnEdit"/>       
                    </form> 
               </td>
               
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               
               <td> <form action="studentHome.php" method="post">      
                             <input  type="submit" name="btnUpdateBack" value="Back" />
                    </form>
               </td>
				
			</tr>
		
                       
		</table> 
        
              
		</center>
	</body>
</html>