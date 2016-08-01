<?php
require_once('../../../db.php');
$sql="SELECT * FROM `product` WHERE `p_catagory` = 'FeedingBottle'";
$result = mysql_query($sql);
$products ="<div class=\"col-lg-4 col-md-4\" >";

while($row = mysql_fetch_array($result)){
    $products.="<table  border=\"1\" style=\"background-color:#cccccc\">";
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
    $products.="</tr></table><br/>";
}
$products.="</div>";

?>
<html>
<head>
    <title>Feeding Bottle</title>

    <script src="../../../js/jquery-2.1.4.js"></script>
    <script src="../../../js/bootstrap.js"></script>
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

    <link href="../../../css/bootstrap.css" rel="stylesheet"/>
    <link href="../../../css/bootstrap-theme.css" rel="stylesheet"/>
    <link href="../../../css/boot.css" rel="stylesheet"/>
</head>
<body>
<?php
require_once('navigation.php');
echo $products;
?>


</body>
</html>