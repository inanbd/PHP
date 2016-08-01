<?php
    
    //check korte hobe... //
     session_start();
	if(!isset($_SESSION['loggedin'])==true )
	{
        header('Location: ../index.php' );   
	}
    if($_SESSION['u_type']!="1"){
        header('Location: ../index.php' ); 
    }

    require_once('..\db.php');
    $name = $_REQUEST['p_name'];
    $price = $_REQUEST['p_price'];
    $desc = $_REQUEST['p_desc'];
    $brand = $_REQUEST['p_brand'];
    $catagory = $_REQUEST['p_catagory'];
    $quantity = $_REQUEST['p_quantity'];
    $brand = $_REQUEST['p_brand'];
    
    //image handling start
    if(isset($_FILES['image'])){
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];   
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		
		$expensions= array("jpeg","jpg","png"); 		
		if(in_array($file_ext,$expensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size > 2097152){
		  $errors[]='File size must be excately 2 MB';
		}
        //change file name
        
        $sql = "SELECT MAX(p_id) FROM `product`";
        $result = mysql_query($sql);
         while($row = mysql_fetch_array($result)){
            $file_name = $row['MAX(p_id)'];           
         }
         $file_name++;
         $file_name.= ".jpg";
        //change location
        $location = "..\Catagory".DIRECTORY_SEPARATOR;
        $sql="SELECT mc_name FROM `maincatagory` WHERE mc_id = (SELECT mc_id FROM `catagory` WHERE c_name = '$catagory')";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)){
            $location.= $row['mc_name'];    
        }
        
        $location.= DIRECTORY_SEPARATOR;
        
        $location.= $catagory;
        $location.= "\img".DIRECTORY_SEPARATOR;				
		if(empty($errors)==true){
			move_uploaded_file($file_tmp,$location.$file_name);
			//echo "Success";
		}else{
			print_r($errors);
		}
	}
    $imagefile= "img/".$file_name;
    //image handling end
     $sql ="INSERT INTO `product` (`p_id`, `p_name`, `p_desc`, `p_image`, `p_price`, `p_amount`, `p_catagory` , `b_name` , `p_hits` , `p_sold`) 
                            VALUES (NULL, '$name', '$desc', '".mysql_real_escape_string($imagefile)." ' , '$price', '$quantity', '$catagory','$brand',0,0)";
     mysql_query($sql);
    
?> 
alert('product added successfully');


</script>