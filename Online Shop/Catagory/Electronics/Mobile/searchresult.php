<?php
require_once('db.php');


if(isset($_POST['search'])&&$_POST['search']!=""){

    $search=$_POST['search'];

    $sql="select * from product where p_name LIKE '$search%'";
    $result = mysql_query($sql);

    $rowcount=mysql_num_rows($result);

    if($rowcount==0){

        echo 'No product was found';
    }
    else{

        echo '<ul>';
        while($row = mysql_fetch_array($result)){
            $catagory = $row['p_catagory'];
            $sql2 ="SELECT mc_name FROM `maincatagory` WHERE mc_id = (SELECT mc_id FROM `catagory` WHERE c_name = '$catagory')";
            $result2= mysql_query($sql2);
            $row2 = mysql_fetch_array($result2);
            $mainCatagory=$row2['mc_name'];
          //  echo "Catagory/".$mainCatagory."/".$catagory."/"."desc.php?id=".$row['p_id'];
            echo '<li ><a href= Catagory/'.$mainCatagory.'/'.$catagory.'/'.'desc.php?id='.$row['p_id']. '>'
                .$row['p_name'].'</a></li>';
        }
        echo '</ul>';
    }
}

else{

    echo '';

}

?>