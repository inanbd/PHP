<html>
<head>
    <title>Registration</title>

    <script type="text/javascript" src="jquery-2.1.4.js"></script>
    <script type="text/javascript" src="verify.js"></script>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="regAdmin.css" rel="stylesheet">



</head>
<body>
<center>

    <div class="form-reg">
        <p><ul><b>New Customer Registration</b></ul></p>
        <hr />

        <form method="post" action="addCustomer.php" onsubmit="return checkUserName() && checkFullName() && checkPassword() &&
                                                           checkConfirmPassword() && checkEmail() && checkContact() && checkAddress();">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="userName" id="userName" autocomplete="off"  onblur="return checkUserName();"/></td>
                    <td><label id="lblUserName"></label></td>
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="fullName" id="fullName" autocomplete="off" onblur="return checkFullName();"/></td>
                    <td><label id="lblFullName"></label></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="password" autocomplete="off" onblur="return checkPassword();"/></td>
                    <td><label id="lblPassword"></label></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="password2" id="password2" autocomplete="off" onblur="return checkConfirmPassword();"/></td>
                    <td><label id="lblConfirmPassword"></label></td>

                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" id="email" autocomplete="off" onblur="return checkEmail();"/></td>
                    <td><label id="lblEmail"></label></td>
                </tr>
                <tr>
                    <td>Contact No:</td>
                    <td><input type="text" name="contact" id="contact" autocomplete="off" onblur="return checkContact();"/></td>
                    <td><label id="lblContact"></label></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" id="address" autocomplete="off" onblur="return checkAddress();"/></td>
                    <td><label id="lblAddress"></label></td>
                </tr>



                <tr>
                    <td></td>
                    <td> <input type="submit" name="btnRegister" value="Register" class="myButton" > </input></td>
                </tr>
            </table>
        </form>

        <p>Already have an acount? Login <a href="../Login/login.php">here</a></p>




    </div>
</center>
</body>
</html>