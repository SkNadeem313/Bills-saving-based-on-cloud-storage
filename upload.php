<?php
// if (!isset($_SESSION))
// {
// 	session_start();
// }
session_start();
?>
<?php
// if (isset($_SESSION['user'])) {
// 	include 'upload1.html';
// 	echo $_SESSION['user'];
// }
if (!isset($_SESSION['user']))
{
	echo 'Error';
}
elseif(isset($_POST['upload'])){
	// include 'upload1.html';
	// echo $_POST['upload'];
	$_SESSION['upload'] = $_POST['upload'];
	header('Location: upload_page.php');
	exit();
}
?>