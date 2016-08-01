<?php
session_start();
require_once('../db.php');
$u_id = $_SESSION['userId'];//ekhon static pore session value

$from_cart = "select * from cart where u_id=".$u_id;
$from_cart_query = mysql_query($from_cart);

while($row = mysql_fetch_array($from_cart_query)){

    mysql_query("Insert into orders VALUES ('',$u_id,".$row['p_id'].",".$row['p_amount'].",".$row['price'].",'','')");
    mysql_query("Update product set p_amount=p_amount-".$row['p_amount']." where p_id=".$row['p_id']);
    mysql_query("Update product set p_sold=p_sold + ".$row['p_amount']." where p_id=".$row['p_id']);
}
mysql_query("Delete from cart where u_id=".$u_id);
echo 1;
?>