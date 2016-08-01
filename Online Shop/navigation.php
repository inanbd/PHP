<?php

session_start();
if(! isset($_SESSION['loggedin'])==true )
{
    noUser();
}
else if(isset($_SESSION['loggedin'])==true && $_SESSION['u_type']=="1"){
   customer();
}
else if(isset($_SESSION['loggedin'])==true && $_SESSION['u_type']=="2"){
    admin();
}
function admin(){
    customer();
}
function customer(){
    
    $navigationbar ="<nav class=\"navbar navbar-default\">
    <div class=\"container-fluid\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">

                <li class=\"menu-item dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><b>Catagory</b><b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">

                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Eletronics</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Computer\">Computer</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Mobile\">Mobile</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Camera\">Camera</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Tv\">Tv</a>
                                </li>

                            </ul>
                        </li>

                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Cloting & Shoes</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Clothing/MensCloths\">Men</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Clothing/LadiesCloths\">Women</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Clothing/BabyCloths\">Baby</a>
                                </li>

                            </ul>
                        </li>

                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Kitchen Appliences</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/Cooker\">Cooker</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/Mixer\">Mixer</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/Blender\">Blender</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/SandwitchToster\">Sandwitch toster</a>
                                </li>
                            </ul>
                        </li>


                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Kids & Baby</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/Cot\">Cot</a>
                                </li>

                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabySoap\">Baby soap</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabyPowder\">Baby powder</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabyLotion\">Baby lotion</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabyShampoo\">Baby shampoo</a>
                                </li>

                            </ul>
                        </li>



                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Body & Sports</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Cricket\">Cricket</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Football\">Football</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Tennis\">Tennis</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Exercise\">Exercise equipment</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul><!-- code for submenu ends here -->

            <form action=\"searchresult.php\" method=\"post\" class=\"navbar-form navbar-left\" role=\"search\">
                <div class=\"form-group\">
                    <input type=\"text\" name=\"search\" id=\"search_box\"  class=\"form-control search_box\" placeholder=\"Search by catagory\" list=\"search_list\" autocomplete=\"off\" >
                    <datalist id=\"search_list\"></datalist>
                </div>
                <input type=\"submit\" class=\"btn btn-default\" value=\"Submit\"/>
            </form>

            <ul class=\"nav navbar-nav navbar-right\">
            <!-- user profile dropdown -->
                <li class=\"menu-item dropdown\">

                    <a  class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><b>Welcome ".$_SESSION['userName']."</b><b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"menu-item \">
                                    <a href=Customer/profile.php?id=".$_SESSION['userId'].">Your Profile</a>
                        </li>

                    </ul>
                </li>



                <li><a href=\"Cart/showCart.php\"><b><span class=\"glyphicon glyphicon-shopping-cart\" aria-hidden=\"true\"></span>Cart</b></a></li>
                <li><a href=\"./Login/logout.php\"><b>Logout</b></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>";
echo $navigationbar;
}

function noUser(){
    $navigationbar=" <nav class=\"navbar navbar-default\">
  <div class=\"container-fluid\">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">

                <li class=\"menu-item dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><b>Catagory</b><b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">

                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Eletronics</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Computer/\">Computer</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Mobile/\">Mobile</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Camera/\">Camera</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Electronics/Tv/\">Tv</a>
                                </li>

                            </ul>
                        </li>

                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Cloting & Shoes</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Clothing/MensCloths\">Men</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Clothing/LadiesCloths\">Women</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Clothing/BabyCloths\">Baby</a>
                                </li>

                            </ul>
                        </li>

                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Kitchen Appliences</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/Cooker\">Cooker</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/Mixer\">Mixer</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/Blender\">Blender</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/Kitchen/SandwitchToster\">Sandwitch toster</a>
                                </li>
                            </ul>
                        </li>


                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Kids & Baby</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/Cot\">Cot</a>
                                </li>

                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabySoap\">Baby soap</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabyPowder\">Baby powder</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabyLotion\">Baby lotion</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/BabyProducts/BabyShampoo\">Baby shampoo</a>
                                </li>
                              
                            </ul>
                        </li>



                        <li class=\"menu-item dropdown dropdown-submenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Body & Sports</a>
                            <ul class=\"dropdown-menu\">
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Cricket\">Cricket</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Football\">Football</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Tennis\">Tennis</a>
                                </li>
                                <li class=\"menu-item \">
                                    <a href=\"./Catagory/SportsAndFitness/Exercise\">Exercise equipment</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul><!-- code for submenu ends here -->
      <form action=\"searchresult.php\" method=\"post\" class=\"navbar-form navbar-left\" role=\"search\">
                <div class=\"form-group\">
                    <input type=\"text\" name=\"search\" id=\"search_box\"  class=\"form-control search_box\" placeholder=\"Search\" list=\"search_list\" autocomplete=\"off\" >
                    <datalist id=\"search_list\"></datalist>
                </div>
                <input type=\"submit\" class=\"btn btn-default\" value=\"Submit\"/>
            </form>
      <ul class=\"nav navbar-nav navbar-right\">
        <li><a href=\"Login/login.php\"><b>Login</b></a></li>
        <li><a href=\"Registration/regCustomer.php\"><b>Registration</b></a></li>
        <li><a href=\"#\"><b><span class=\"glyphicon glyphicon-shopping-cart\" aria-hidden=\"true\"></span>Cart</b></a></li>
        <li class=\"dropdown\">

        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>";
echo $navigationbar;


}

?>