<?php
$conn = new mysqli("localhost","root","","sepm");

if(isset($_POST["submit"]))
{

$sql = "SELECT username FROM login";
$a = $_POST["uname"];
$b = $_POST["password"];
$c = $_POST["contact"];
$d = $_POST["fname"];
$e = $_POST["lname"];
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0)
{
	while($z = mysqli_fetch_array($result))
	{
		$flag = 0;
		if($a == $z["username"])
		{
			$flag++;
		}
	}
}
if($flag == 0)
{
	// no matching username
	$q = "INSERT INTO login(username, password, first_name, last_name, mobile) VALUES ('$a', '$b', '$d', '$e', '$c')";
	if ($conn->query($q) == TRUE)
  	{	
  		mkdir("images/" . strval($a));
		echo "<script language='javascript'type='text/javascript'> alert('Details uploaded successfully!');
		window.location = 'index.php';
		</script>";
		// include'index.php';
		// header('Location: index.php');
	}
	else
	{
		echo "<script language='javascript'type='text/javascript'> alert('Database Error!!');
		window.location = 'register.php';
		</script>";
	}
}
else
{
	echo "<script language='javascript'type='text/javascript'> alert('Username already exists!!');
	window.location = 'register.php';
	</script>";
	// include'register.php';
	// header('Location: register.php');
}
}
?>