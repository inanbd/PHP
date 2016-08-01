<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../cart.png">

    <title>Login</title>
       <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">

    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/bootstrap-theme.css" rel="stylesheet"/>

</head>

<body>


        <div class="container">
            <center>
            <div class="row">
                <div class="col-md-offset-5 col-md-3">
                    <div class="form-login">
                        <h2>Welcome </h2>
                        <form action="login_verify.php" method="post">

                            <input type="text" name="userName" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                            </br></br>
                            <input type="password" name="userPassword" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                            </br></br>
                            <div class="wrapper">
                            <span class="group-btn">
                                <input type="submit" name="btnLogin" value="Login" class="myButton" > </input>
                            </span>


                        </form>

                        </div>
                    </div>

                </div>
            </div>
            </center>
        </div>



</body>
</html>
