<?php 
if (!isset($_SESSION))
{
    session_start();
}
    // header('Location: index.php');

?>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='style1.css'>
    <script>
        function validateform()
        {
        var a = document.forms["Registration_form"]["uname"].value;
        var b = document.forms["Registration_form"]["password"].value;
        var c = document.forms["Registration_form"]["contact"].value;
        var d = document.forms["Registration_form"]["cpassword"].value;
        var e = document.forms["Registration_form"]["fname"].value;
        var f = document.forms["Registration_form"]["lname"].value;
        var g = document.forms["Registration_form"]["occupation"].value;
        var phoneno = /^\d{10}$/;
        var name = /^[a-zA-Z ]+$/;
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
        else if(b != d || d == "" || d == null)
        {
        alert("Please Enter Correct Password!");
        return false;
        }
        else if(c == "" || c == null)
        {
        alert("Please Enter Your Mobile Number!");
        return false;
        }
        else if(!c.match(phoneno))
        {
        alert("Please Enter Correct Mobile Number!");
        return false;
        }
        else if(!name.test(e) || !name.test(f) || !name.test(g))
        {
        alert("First_name, Last_name and Occupation should be in alphabetic letters");
        return false;
        }
        }
    </script>
</head>
<body style='background: url(im.png); background-repeat: no-repeat; background-size: cover;'>
    <div class='regbox' style="color: orange;">
                    <img src='download.png' class='avtar'>
                    <br>
                    <h1>Registration</h1>
        <form name="Registration_form" action="validation_new.php" method="post" onsubmit="return validateform()" enctype="multipart/form-data">
            <center>Username: <input type='text' text-align='center' name='uname' placeholder=' Username..' style='width: 120px; border-radius: 10%;' autocomplete="off"></center><br>
            <center>Password: <input type='password' name='password' placeholder=' Password..' style='width: 120px; border-radius: 10%;'></center><br>
            <center>Confirm Password: <input type='password' name='cpassword' placeholder=' Confirm Password..' style='width: 120px; border-radius: 10%;'></center><br>
            <center>Mobile No: <input type='text' name='contact' placeholder=' Contact..' style='width: 120px; border-radius: 10%;' autocomplete="off"></center><br>
            <center>First Name: <input type='text' name='fname' placeholder=' First Name..' style='width: 120px; border-radius: 10%;' autocomplete="off"></center><br>
            <center>Last Name: <input type='text' name='lname' placeholder=' Last Name..' style='width: 120px; border-radius: 10%;' autocomplete="off"></center><br>
            <center><input type='submit' style='width: 100px; height: 30px; border-radius: 20%; background-color: pink; color: red; font-weight: bold; font-size: 17px;' name='submit' value='Submit'></center>
            <br>
        </form>
        <center><a style="color: orange;text-decoration: none;" href="index.php"><b>Login?</b></a></center>
    </div>
                 
</body>
</html>