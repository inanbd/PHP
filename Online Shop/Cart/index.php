<?php
    session_start();
    require_once('../db.php');
    $u_id = $_SESSION['userId'];//ekhon static pore session er value
    $p_id=$_POST['p_id'];
    $p_price=$_POST['p_price'];

   // echo $id;
    $query=mysql_query("select cart_id from cart where u_id=".$u_id." and p_id=".$p_id);
    if(mysql_num_rows($query)>0)
        echo 0;
    else{
        $sql = "INSERT INTO cart VALUES ('','$u_id','$p_id ','1',$p_price)";
        mysql_query($sql);
        echo 1;
    }


?>