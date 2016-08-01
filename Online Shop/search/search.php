<?php

require_once('../db.php');

if(isset($_POST['search'])&&$_POST['search']!=""){

    $search=$_POST['search'];

    $sql="select * from product where p_name LIKE '$search%'";
    $result = mysql_query($sql);

    $rowcount=mysql_num_rows($result);


    if($rowcount==0){

        echo 'No product was found';
    }
    else{

        echo '<datalist>';
        while($row = mysql_fetch_array($result)){
            echo '<option value = "'.$row['p_name'].'"><a href=info.php?id='.$row['p_name']. '>'
                .$row['p_name'].'</a></option>';
        }
        echo '</datalist>';
    }
}

else{

    echo '';

}




?>