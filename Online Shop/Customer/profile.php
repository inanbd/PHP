<?php
    session_start();
    if(! isset($_SESSION['loggedin'])==true){
        header('Location: ./../index.php');
    }

    require_once('../db.php');

    $id=$_GET['id'];

    $sql="SELECT * FROM `user` WHERE `u_id` = '$id'";
    $result = mysql_query($sql);
    $info ="<div class=\"col-lg-4 col-md-4\" >";

    while($row = mysql_fetch_array($result)){
        $info.="<table  border=\"1\" style=\"background-color:#cccccc;  \">";
        $info.="<tr style=\"margin-top:5px;\">";
        $info.="<td>Your Name</td>";
        $info.="<td>".$row['u_fullname']."</td>";
        $info.="</tr>";
        $info.="<tr>";
        $info.="<td>Your Address</td>";
        $info.="<td>".$row['u_address']."</td>";
        $info.="</tr>";
        $info.="<tr>";
        $info.="<td>Your Contact Number</td>";
        $info.="<td>".$row['u_contact']."</td>";
        $info.="</tr>";
        $info.="<tr>";
        $info.="<tr>";
        $info.="<td>Your image</td>";
        $info.="<td><img src=\"".$row['u_image']."\"/></td>";
        $info.="</tr>";
        $info.="</table><br/>";
    }
    $info.="</div>";

?>
<html>
<head>
    <title>Profile</title>

    <script src="../../../js/jquery-2.1.4.js"></script>
    <script src="../../../js/bootstrap.js"></script>

    <link href="../../../css/bootstrap.css" rel="stylesheet"/>
    <link href="../../../css/bootstrap-theme.css" rel="stylesheet"/>
</head>
<body>
<?php
echo $info;
?>


</body>
</html>
    

