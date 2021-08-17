<?php 
session_start();
session_destroy();
session_start();
	// header('Location: index.php');

?>
<html>
    <head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SEPM</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
        <script>
		function validateform()
		{
		var a = document.forms["Login_form"]["uname"].value;
		var b = document.forms["Login_form"]["password"].value;
		if(a == "" || a == null)
		{
		alert("Please Enter Your Username!");
		return false;
		}
		else if(b == "" || b == null)
		{
		alert("Please Enter Your Password!");
		return false;
		}
		}
		</script>
    </head>
            <body style="background: url(im.png); background-repeat: no-repeat; background-size: cover;">
                <div class="loginbox" style="color: orange;">
                    <img src="download.png" class="avtar">
					<br>
                    <h1>Login</h1>
                    <form name="Login_form" action="validation.php" method="post" onsubmit="return validateform()" enctype="multipart/form-data">
                        <center><div><b>Username: </b><input type="text" name="uname" placeholder=" Enter Username.." style="width: 120px; border-radius: 10%;" autocomplete="off"></div></center><br>
                        <center><div><b>Password: </b><input type="password" name="password" placeholder=" Enter Password.." style="width: 120px; border-radius: 10%;"></div></center><br>
                        <center><input type="submit" style="width: 100px; height: 30px; border-radius: 20%; background-color: pink; color: red; font-weight: bold; font-size: 17px;" name="submit" value="Login"></center><br>
                    </form>
						<center><a style="color: orange;text-decoration: none;" href="register.php"><b>Don't have an account?</b></a></center>
                            
                </div>

            </body>
</html>