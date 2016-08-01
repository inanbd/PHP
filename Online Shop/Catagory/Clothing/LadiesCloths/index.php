<?php
require_once('../../../db.php');
$sql="SELECT * FROM `product` WHERE `p_catagory` = 'LadiesCloths'";
$result = mysql_query($sql);
$products ="<div class=\"container\" >
               <div class=\"row\" >
                 <div class><div class=\"col-lg-2 col-md-2\" style='float:left;'>";

while($row = mysql_fetch_array($result)){

    $products.=" <div class=\"thumbnail\" >";

    $products.="<img src=".$row['p_image']."/>";

    $products.="<table border='1px solid'>";
    $products.="<tr>";
    $products.="<td>Product Name</td>";
    $products.="<td>".$row['p_name']."</td>";
    $products.="</tr>";

    $products.="<tr>";
    $products.="<td>Brand Name</td>";
    $products.="<td>".$row['b_name']."</td>";
    $products.="</tr>";


    $products.="<tr>";
    $products.="<td></td>";
    $products.="</tr></table>";
    //$products.="<td><a class=\"btn btn-info\" href = \"../../Cart/index.php?id='$row['p_name']'\">Add to cart</a></td>";
    //$products.="<td><a class='btn btn-info' href = '../../../Cart/index.php?id=".$row['p_id']."&p_price=".$row['p_price']."'>Add to cart</a></td>";
    $products.="<a href=desc.php?id=".$row['p_id']." class='btn btn-info'>Details</a>";


    $products.="</div><br/>";
}
$products.="</div></div></div>";

?>
<html>
<head>
    <title>Ladies Cloths</title>

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