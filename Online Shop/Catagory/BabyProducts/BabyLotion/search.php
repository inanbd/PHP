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






            <form action="searchresult.php" method="post" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" name="search" id="search_box"  class="form-control search_box" placeholder="Search by catagory" list="search_list" autocomplete="off" >
                    <datalist id="search_list"></datalist>
                </div>
                <input type="submit" class="btn btn-default" value="Submit"/>
            </form>

            <ul class="nav navbar-nav navbar-right">
            <!-- user profile dropdown -->
                <li class="menu-item dropdown">
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                