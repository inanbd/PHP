<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <title>Main</title>

  <script src="js/jquery-2.1.4.js"></script>
  <script src="js/bootstrap.js"></script>
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

  <link href="css/bootstrap.css" rel="stylesheet"/>
  <link href="css/bootstrap-theme.css" rel="stylesheet"/>
  <link href="css/boot.css" rel="stylesheet"/>

<?php 
    //require_once('head.php');
?>

</head>
<body>

<?php
    //printing navigation bar
    require_once('navigation.php');
?>

<br/><br/>
<div class="bs-example">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/1.jpg" alt="First Slide">
      </div>
      <div class="item">
        <img src="img/2.png" alt="Second Slide">
      </div>
      <div class="item">
        <img src="img/4.jpg" alt="Third Slide">
      </div>

      <div class="item">
        <img src="img/7.jpg" alt="Third Slide">
      </div>
    </div>
    <!-- Carousel controls -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
</div>
<footer>
    <div class="container">
        <br/><br/><br/><br>
        <br><br>
        <a href="contactUs.php" class="text-muted">Contact us.</a>
        <a href="aboutUs.php" class="text-muted">About us.</a>
    </div>
</footer>


</body>
</html>