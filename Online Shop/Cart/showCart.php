<?php
session_start();
?>
<script src="../js/jquery-2.1.4.js"></script>
<script>

    function check_quantity(product_id,product_price){
        // alert($("#quantity_"+product_id).val());

        var parameter = {
            "p_id": product_id,
            "p_quantity":$("#quantity_"+product_id).val(),
            "p_price":product_price
        };

        $.ajax({

            type:"POST",
            url:"validate_cart_entry.php",
            dataType:'json',
            data:parameter,
            success:function(res){
                //alert(res["valid_quantity"]);


               if(res["valid_quantity"]==0) {
                    $("#response_" + product_id).html("Quantity is not available in the stock");
                    $("#submit_order_button").attr('disabled','disabled');
                    $("#total_price_div").html("Total Price: "+res["total_price"]);
                }
                else {
                    $("#response_" + product_id).html("");
                    $("#submit_order_button").removeAttr('disabled');
                    $("#total_price_div").html("Total Price: "+res["total_price"]);
                }

            }
        });

    }
    function confirm_order(){
        $.ajax({

            type:"POST",
            url:"confirm_order.php",
            success:function(res){
                //alert(res);
                $("#response_order").html("Order placed successfully");

            }
        });
    }
</script>

<?php
     require_once('../db.php');
     $u_id = $_SESSION['userId'] ; //ekhon static .. pore login implement hoile session variable er data boshbe

     $query = "select * from cart where u_id='$u_id'";
     $user_cart = mysql_query($query);

    $total_price=0;
    $products="<div class=\"col-lg-4 col-md-4\">";
    while($row = mysql_fetch_array($user_cart)){

        $p_id = $row['p_id'];

        $query_p = "select p.p_name,p.p_image,p.p_price,p.p_catagory,p_cat.mc_id,p_cat.c_id,main_cat.mc_name from product as p inner join catagory as p_cat on (p_cat.c_name = p.p_catagory) inner join maincatagory as main_cat on (main_cat.mc_id = p_cat.mc_id) where p.p_id=$p_id";
       // echo $query_p;
        $product_query = mysql_query($query_p);

        while($row_product = mysql_fetch_array($product_query)){


        $products.="<table  border=\"1\" style=\"background-color:#cccccc;  \">";
        $products.="<tr style=\"margin-top:5px;\">";
        $products.="<td>Product Name</td>";
        $products.="<td>".$row_product['p_name']."</td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<tr>";
        $products.="<td>Product image</td>";
        $products.="<td><img src='../Catagory/".$row_product['mc_name']."/".$row_product['p_catagory']."/".$row_product['p_image']."'/></td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td>Quantity</td>";
        $products.="<td><input type='text' id='quantity_".$p_id."' value='".$row['p_amount']."' onkeyup='check_quantity($p_id,".$row_product['p_price'].")'/></td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td colspan='2' id='response_".$p_id."'></td>";
        $products.="</tr>";
        $products.="<tr>";
        $products.="<td>Price</td>";
        $products.="<td id='price_".$p_id."'>".$row_product['p_price']."</td>";
        //$products.="<td><a class='btn btn-info' href = '../../../Cart/index.php?id=".$row['p_id']."'>Add to cart</a></td>";
        $products.="</tr></table><br/>";
        $total_price+=$row['price'];

        }


    }

    $products.="<div id='total_price_div' style='float:left;'>";
    $products.="Total Price: ".$total_price;
    $products.="</div>";
    $products.="<div style='float:left;margin-left:10px;'>";
    $products.="<input type='button' id='submit_order_button' value='Confirm Order' class='myButton' onclick='confirm_order();'/>";
    $products.="</div>";
    $products.="<div style='clear:both'>";
    $products.="</div>";
    $products.="<div id='response_order'>";
    $products.="</div>";
    $products.="</div>";



?>

<html>
    <head>
        <title></title>
        <link href="css/boot.css" rel="stylesheet"/>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet"/>
    </head>

    <body>

    <?php echo $products;?>

    </body>

</html>
