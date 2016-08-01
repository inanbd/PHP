<?php
session_start();
require_once('../db.php');

$u_id = $_SESSION['userId'];//ekhon static
$product_id = $_POST['p_id'];
$product_quantity = trim($_POST['p_quantity']);
$p_price = $_POST['p_price'];




$valid_quantity = 1;
$string= "select p_amount from product where p_id=".$product_id." and p_amount<".$product_quantity;
//echo $string;
//echo json_encode(array("valid_quantity"=>$string,"total_price"=>0));
$query = mysql_query($string);

$row_returned = mysql_num_rows($query);
if($row_returned==1) {
    $valid_quantity = 0;

}
else{
  mysql_query("Update cart set p_amount=".$product_quantity.",price=".$product_quantity*$p_price." where p_id=".$product_id." and u_id=".$u_id);
}

$total_price=0;
$total_price_query = mysql_query("select SUM(price) as total_cart_price from cart where u_id=".$u_id);
while($row = mysql_fetch_array($total_price_query)){
    $total_price = $row['total_cart_price'];

}
echo json_encode(array("valid_quantity"=>$valid_quantity,"total_price"=>$total_price));

?>