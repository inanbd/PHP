<?php 

     
    session_start();//checks loggedin and this is student
     if(!($_SESSION['loggedin'] == true && $_SESSION['type'] == 1 ) ){
        header('Location: index.php?err=3' );
    }
    
      
    require_once('db.php');
    $id= $_SESSION['id']; 
    
    
    $outputStrQ1 = '';
    $outputStrQ2 = '';
    $outputStrQ3 = '';
    $outputStrTerm = '';
    
     $sqlQ1="select distinct c_id from quiz_1 
                        where s_id='$id'";
                        
   // echo $sqlQ1;
                                                              
    $resultQ1=mysql_query($sqlQ1);
    
    $course_ids = array();
    $course_id_marks_quiz_1 = array();
     
     while($rowQ1 = mysql_fetch_array($resultQ1) ){
        array_push($course_ids,$rowQ1['c_id']);
        }
    
    $length = count($course_ids);
    for($i=0;$i<$length;$i++){
       $query_marks = "select marks from quiz_1 where c_id='$course_ids[$i]' and s_id='$id' order by id desc limit 1";
       //echo $query_marks;
       $result_marks = mysql_query($query_marks);
       $marks = mysql_fetch_array($result_marks);
       $marks = $marks['marks'];
      
       
       $course_id_marks_quiz_1[$course_ids[$i]] = $marks;
         
    }
  
  
  
     $sqlQ2="select distinct c_id from quiz_2 
                        where s_id='$id'";                                                                
    $resultQ2=mysql_query($sqlQ2);
    
    $course_ids2 = array();
    $course_id_marks_quiz_2 = array();
     
     while($rowQ2 = mysql_fetch_array($resultQ2) ){
        array_push($course_ids2,$rowQ2['c_id']);
        }
    
    $length2 = count($course_ids2);
    for($i=0;$i<$length2;$i++){
       $query_marks2 = "select marks from quiz_2 where c_id='$course_ids2[$i]' and s_id='$id' order by id desc limit 1";
       //echo $query_marks;
       $result_marks2 = mysql_query($query_marks2);
       $marks2 = mysql_fetch_array($result_marks2);
       $marks2 = $marks2['marks'];
      
         
       $course_id_marks_quiz_2[$course_ids2[$i]] = $marks2;
         
    }
    
    $sqlQ3="select distinct c_id from quiz_3 
                        where s_id='$id'";                                                                
    $resultQ3=mysql_query($sqlQ3);
    
    $course_ids3 = array();
    $course_id_marks_quiz_3 = array();
     
     while($rowQ3 = mysql_fetch_array($resultQ3) ){
        array_push($course_ids3,$rowQ3['c_id']);
        }
    
    $length3 = count($course_ids3);
    for($i=0;$i<$length3;$i++){
       $query_marks3 = "select marks from quiz_3 where c_id='$course_ids3[$i]' and s_id='$id' order by id desc limit 1";
       //echo $query_marks;
       $result_marks3 = mysql_query($query_marks3);
       $marks3 = mysql_fetch_array($result_marks3);
       $marks3 = $marks3['marks'];
      
         
       $course_id_marks_quiz_3[$course_ids3[$i]] = $marks3;
         
    }
    
    $sqlterm="select distinct c_id from term 
                        where s_id='$id'";                                                                
    $result_term=mysql_query($sqlterm);
    
    $course_ids_term = array();
    $course_id_marks_term = array();
     
     while($row_term = mysql_fetch_array($result_term) ){
        array_push($course_ids_term,$row_term['c_id']);
        }
    
    $length_term = count($course_ids_term);
    for($i=0;$i<$length_term;$i++){
       $query_marks_terms = "select marks from term where c_id='$course_ids_term[$i]' and s_id='$id' order by id desc limit 1";
       //echo $query_marks;
       $result_marks_term = mysql_query($query_marks_terms);
       $marks_term = mysql_fetch_array($result_marks_term);
       $marks_term = $marks_term['marks'];
      
         
       $course_id_marks_term[$course_ids_term[$i]] = $marks_term;
         
    }
    
      $course_looper = "select c_id,title from course";
      $result_course_looper=mysql_query($course_looper);
      
      $output="";
      while($row = mysql_fetch_array($result_course_looper) ){
        
        $output.="<tr>";
        $output.="<td>".$row['title']."</td>";
        $output.= "<td>";
        $quiz_1_marks=0;
        if(array_key_exists($row['c_id'],$course_id_marks_quiz_1))
            $quiz_1_marks = $course_id_marks_quiz_1[$row['c_id']];
        $output.= $quiz_1_marks."</td>";
        $output.= "<td>";
        $quiz_2_marks=0;
        if(array_key_exists($row['c_id'],$course_id_marks_quiz_2))
            $quiz_2_marks = $course_id_marks_quiz_2[$row['c_id']];
            
        $output.= $quiz_2_marks."</td>";
        
        $output.= "<td>";
        $quiz_3_marks=0;
        if(array_key_exists($row['c_id'],$course_id_marks_quiz_3))
            $quiz_3_marks = $course_id_marks_quiz_3[$row['c_id']];
            
        $output.= $quiz_3_marks."</td>";     
        
        
        $output.= "<td>";
        $term_marks="0";
        if(array_key_exists($row['c_id'],$course_id_marks_term))
            $term_marks = $course_id_marks_term[$row['c_id']];
            
        $output.= $term_marks."</td>"; 
        
        $all_quiz_marks = array();   
        $all_quiz_marks[] = $quiz_1_marks;
        $all_quiz_marks[] = $quiz_2_marks;
        $all_quiz_marks[] = $quiz_3_marks; 
         
        rsort($all_quiz_marks);
        
        $total = $all_quiz_marks[0]+$all_quiz_marks[1]+$term_marks; 
        
        $output.= "<td>";                
        $output.= $total."</td>"; 
        
        $output.="</tr>";
        
         
        
        
        }
      
         
    
    
    
?>


<html>
<head><title>Home sweet home</title></head>
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
					<th>Q1 <a href="Q1_history.php">History</a></th>								
					<th>Q2 <a href="Q2_history.php">History</a></th>
					<th>Q3 <a href="Q3_history.php">History</a></th>
					<th>Term</th>
                    <th>Total</th>
				</tr>
                
                <?php echo  $output; ?>
                
                 
			</table> 
		
		</center>
			
               
    
</body>
</html>    
    