<?php
   // require_once('admintest.php'); //checking if the user is admin or not
    session_start();
	
    require_once('..\db.php'); //connecting to db
    
    $sql="SELECT c_name ,c_id FROM `catagory` ";
    $result = mysql_query($sql);
    $catagory = "";
    while($row = mysql_fetch_array($result)){
        $catagory .= "
            <option>".$row['c_name']."</option>
        ";
    }
    $sql="SELECT b_name ,b_id FROM `brand` ";
    $result = mysql_query($sql);
    $brand = "";
    while($row = mysql_fetch_array($result)){
        $brand .= "
            <option>".$row['b_name']."</option>
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
    ?>
    
    <div class="container" ">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="wrapper">
            <a href="index.php">Home</a>
           <form class="form-login" role="form" action="adding.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td >Product name:</td>
                        <td ><input type="text" id="p_name" name="p_name " class="form-control input-sm chat-input" /></td>
                    </tr>
                    <tr>
                        <td>Product desc:</td>
                        <td><input type="text" id="p_desc" name="p_desc" class="form-control input-sm chat-input"/></td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td><input type="text"id="p_price" name="p_price" class="form-control input-sm chat-input""/></td>
                    </tr>
                    <tr>
                        <td>Quantity available:</td>
                        <td><input type="text"id="p_quantity" name="p_quantity" class="form-control input-sm chat-input" /></td>
                    </tr>
                    <tr>
                        <td>Catagory:</td>
                        <td>
                            <select name="p_catagory"class="form-control input-sm chat-input">
                                <option></option>
                                <?php
                                    echo $catagory;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Brand:</td>
                        <td>
                            <select name="p_brand" class="form-control input-sm chat-input">
                                <option></option>
                                <?php
                                    echo $brand;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Image:</td>
                        <td><input type="file" name="image" id="image" class="myButton" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Add Product" name="submit" class="myButton"></td>
                    </tr>
                </table>
           </form>
        </div>
        </div>
    </div>
    </div>
    </body>
</html>