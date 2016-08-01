<html>
    <head><title>Login</title></head>
    <body>
        <center>
            <p><ul><b>Student Login</b></ul></p>
            <hr />
            <form action="login.php"method="post">
                <table>
                    <tr>
                        <td>ID:</td>
                        <td><input type="text"name="id" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password"name="password" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btnLogin" value="Login" /></td>
                    </tr>
                </table>
            </form>  
            <?php
				if(isset($_REQUEST['err']) && $_REQUEST['err'] == 1)
				{
					echo 'Invalid Username/Password';
				}
                if(isset($_REQUEST['err']) && $_REQUEST['err'] == 3)
				{
					echo 'you must login first';
				}
                if(isset($_REQUEST['suc']) && $_REQUEST['suc'] == 1)
				{
					echo 'Registration successful';
				}
			?>
            <p>Don't have any account? Register <a href="reg.php">here</a></p>
        </center>
    </body>
</html>