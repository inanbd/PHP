<?php

require_once('../db.php');

$use = $_REQUEST['id'];

$sql = "SELECT * FROM `product` WHERE p_name = '".$use."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    echo " Name: ". $row['p_name']." Desc: ".$row['p_desc']." Price: ".$row['p_price']." Quantity: ".$row['p_amount']." Look ".$row['p_image'];

}


?>