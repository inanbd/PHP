<?php
 session_start();
	if(!isset($_SESSION['loggedin'])==true )
	{
        header('Location: ../index.php' );   
	}
    if($_SESSION['u_type']!="1"){
        header('Location: ../index.php' ); 
    }
    
    require_once('db.php');
    $sql ="SELECT * FROM `product` ORDER BY `product`.`p_hits` DESC LIMIT 5 ";
    $result = mysql_query($sql);
    $topHittedProducts ="";
    while($row= mysql_fetch_array($result)){
        $p_id = $row['p_id'];
        $sql2 ="SELECT p_catagory FROM `product` WHERE p_id = '$p_id'";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_array($result2);
        $catagory = $row2['p_catagory'];
        
        $sql2 ="SELECT mc_name FROM `maincatagory` WHERE mc_id = (SELECT mc_id FROM `catagory` WHERE c_name = (SELECT p_catagory FROM `product` WHERE p_id = '$p_id'))";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_array($result2);
        $mainCatagory = $row2['mc_name'];
        $imagepath = "../Catagory/".$mainCatagory."/".$catagory."/".$row['p_image'];

        
        $topHittedProducts.="
        <div class=\"thumbnail\" >
        <table>
            <tr>
                <td>name:</td>
                <td>".$row['p_name']."</td>
            </tr>
            <tr>
                <td>product Description:</td>
                <td>".$row['p_desc']."</td>
            </tr>
            <tr>
                <td>image:</td>
                <td><img src=\"".$imagepath."\"/></td>
            </tr>
            
        </table>
        </div>
        <br/>
        ";
        
    }
    
     $sql ="SELECT * FROM `product` ORDER BY `product`.`p_sold` DESC LIMIT 5 ";
    $result = mysql_query($sql);
    $topSoldProducts ="";
    while($row= mysql_fetch_array($result)){
        $p_id = $row['p_id'];
        $sql2 ="SELECT p_catagory FROM `product` WHERE p_id = '$p_id'";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_array($result2);
        $catagory = $row2['p_catagory'];
        
        $sql2 ="SELECT mc_name FROM `maincatagory` WHERE mc_id = (SELECT mc_id FROM `catagory` WHERE c_name = (SELECT p_catagory FROM `product` WHERE p_id = '$p_id'))";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_array($result2);
        $mainCatagory = $row2['mc_name'];
        $imagepath = "../Catagory/".$mainCatagory."/".$catagory."/".$row['p_image'];
        
        $topSoldProducts.="
        <table>
            <tr>
                <td>name:</td>
                <td>".$row['p_name']."</td>
            </tr>
            <tr>
                <td>product Description:</td>
                <td>".$row['p_desc']."</td>
            </tr>
            <tr>
                <td>image:</td>
                <td><img src=\"".$imagepath."\"/></td>
            </tr>
            
        </table>
        <br/>
        ";
    }

?>
<html>
    <head>
        <title>Add New Product</title>
        <script src="../js/jquery-2.1.4.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $("#search_box").keyup(function(){

                var search=$("#search_box").val();
                $.ajax({
                    type:"POST",
                    url:"search.php",
                    data:{search:search},
                    success:function(res){
                        $("#search_list").html(res);
                    }
                });
            });
        });
    </script>

    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/bootstrap-theme.css" rel="stylesheet"/>
        <link href="css/boot.css" rel="stylesheet"/>

    </head>
    <body>
    <?php
        require_once('navigation.php');
        //echo $topHittedProducts;
    ?>
    <h3>Top viewed product</h3>
    <?php
        echo $topHittedProducts;
    
    ?>
    <h3>Top Sold product</h3>
    <?php
        echo $topSoldProducts;
    
    ?>
    
    
    </body>
</html>