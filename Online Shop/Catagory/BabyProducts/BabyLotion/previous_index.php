<script>

    function add_to_cart(p_id,p_price){
        var parameter = {
            "p_id": p_id,
            "p_price":p_price
        };

        $.ajax({

            type:"POST",
            url:"../../../Cart/index.php",
            data:parameter,
            success:function(res){
                //alert(res);

                if(res==0) {
                    $("#response_" + p_id).html("Product is alreay in the cart");

                }
                else {
                    $("#response_" + p_id).html("Product added to cart");

                }
            }
        });
    }
</script>

<?php
    require_once('../../../db.php');
    $sql="SELECT * FROM `product` WHERE `p_catagory` = 'BabyLotion'";
    $result = mysql_query($sql);
    $products ="<div class=\"col-lg-4 col-md-4\" >";

    while($row = mysql_fetch_array($result)){
        $products.="<table  border=\"1\" style=\"background-color:#cccccc;  \">";
        $products.="<tr style=\"margin-top:5px;\">";
        $products.="<td>Product Name</td>";
        $products.="<td>".$row['p_name']."</td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td>Product Price</td>";
        $products.="<td>".$row['p_price']."</td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td>Brand Name</td>";
        $products.="<td>".$row['b_name']."</td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td>Product Desc</td>";
        $products.="<td>".$row['p_desc']."</td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td>Product image</td>";
        $products.="<td><img src=".$row['p_image']."/></td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td></td>";
        //$products.="<td><a class=\"btn btn-info\" href = \"../../Cart/index.php?id='$row['p_name']'\">Add to cart</a></td>";
        //$products.="<td><a class='btn btn-info' href = '../../../Cart/index.php?id=".$row['p_id']."&p_price=".$row['p_price']."'>Add to cart</a></td>";
        $products.="<td><a class='btn btn-info' onclick='add_to_cart(".$row['p_id'].",".$row['p_price'].")'>Add to cart</a></td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td colspan='2' id='response_".$row['p_id']."'></td>";
        $products.="</tr>";
        $products.="</table><br/>";
    }
    $products.="</div>";

?>
<html>
    <head>
        <title>Baby Lotion</title>

        <script src="../../../js/jquery-2.1.4.js"></script>
        <script src="../../../js/bootstrap.js"></script>

        <link href="../../../css/bootstrap.css" rel="stylesheet"/>
        <link href="../../../css/bootstrap-theme.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            echo $products;
        ?>

        
    </body>
</html>