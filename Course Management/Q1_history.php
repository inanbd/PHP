<?php 

     
    session_start();//checks loggedin and this is student
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 1 ) ){
        header('Location: index.php?err=3' );
    }
    
      
    require_once('db.php');
    $id= $_SESSION['id']; 
    
    $outputStr = '';
  
    $sqlQ1="select c_id,marks from quiz_1 
                        where s_id='$id' order by c_id desc";
                        
    $resultQ1=mysql_query($sqlQ1);
    
    while($rowQ1 = mysql_fetch_array($resultQ1) ){
        
        $cid = $rowQ1['c_id'];
        
        $sqlQ1_course_name="select title from course 
                        where c_id='$cid'";
        $result_course_name=mysql_query($sqlQ1_course_name);
        
        
         $row_course_name = mysql_fetch_array($result_course_name);
         
         $cname = $row_course_name['title'];
            
          
         $outputStr .='<tr><td>'.$cname.'</td><td>'.$rowQ1['marks'].'</td></tr>';   
         //echo  $cid." --- ".$cname;                   
        
    }
?>

<html>
<head><title>Q1 history</title></head>
<body>
    <form action="studentHome.php" method="post" >
        <input style="float: left;" type="submit" value="Home" name="btnHome"/>
        
    </form>
    
      <form action="logout.php" method="post" >
        <input style="float: right;" type="submit" value="Logout" name="btnLogout"/>
        
    </form>
    
     <form action="profile.php" method="post" style="text-align: center;">
        <input  type="submit" value="Profile" name="btnProfile"/>
        
    </form>
    
    
   <hr />
	<br /> <br /><br /> <br />
    
		<center>
		
			<table border="1">
				<tr>
					<th>Course</th>					
					<th>Q1 History</a></th>								
					
				</tr>
                
                <?php echo $outputStr; ?>
              
                 
			</table> 
		
		</center>
			
               
    
</body>
</html>    