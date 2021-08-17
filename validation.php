<?php 
session_start();

?>
<?php
$conn = new mysqli("localhost","root","","sepm");

if(isset($_POST["submit"]))
{
$d=0;
$sql="SELECT username,password,first_name,last_name FROM login";
$a=$_POST["uname"];
$b=$_POST["password"];
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	while($c=mysqli_fetch_array($result))
	{
		if($a==$c["username"] && $b==$c["password"])
		{
			$d++;
			$fname = $c["first_name"];
			$lname = $c["last_name"];
		}
	}
}
if($d==0)
{
	echo "<script language='javascript'type='text/javascript'> alert('Username & Password are Incorrect');
	window.location = 'index.php';
	</script>";
	//session_destroy();
	// include'index.php';
	// header('Location: index.php');
}
else
{
// include'mainpage.html';
$_SESSION['user'] = $a;
$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
// echo $a;
// echo $_SESSION['user'];
header('Location: mainpage_new.php');

}
}
?>