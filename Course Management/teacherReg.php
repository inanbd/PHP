<html>
    <head><title>Registration</title></head>
    <body>
        <center>
            <p><ul><b>Teacher Registration</b></ul></p>
            <hr />
            <form method="post" action="addTeacher.php">
                <table>
                    <tr>
                        <td>ID:</td>
                        <td><input type="text" name="id" /></td>
                    </tr>
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="name" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email"/></td>
                    </tr>
                     <tr>
                        <td>Contact:</td>
                        <td><input type="text" name="contact"/></td>
                    </tr>  
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btnRegister" value="Register" /></td>
                    </tr>
                </table>
            </form> 
            <?php
				if(isset($_REQUEST['err']) && $_REQUEST['err'] == 1)
				{
					echo 'All the fields are required';
				}
				else if(isset($_REQUEST['err']) && $_REQUEST['err'] == 2)
				{
					echo 'ID already exists';
				}
			?> 
            <p>Already have an acount? Login <a href="index.php">here</a></p>
        </center>
    </body>
</html>