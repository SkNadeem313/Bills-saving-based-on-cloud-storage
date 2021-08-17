<?php
session_start();
if (empty($_POST['logout'])){
	echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SEPM</title>
	<link rel="stylesheet" type="text/css" href="css01.css">

</head>
<body>
	<div id="static_portion" style="width: 100%; height: 300px;">
	<h1>No active session found!</h1>
	</div>
</body>
</html>';
exit();
}
if (isset($_POST['logout'])) {
	session_unset($_SESSION['user']);
	session_destroy();

	header('Location: index.php');
	exit();
}
?>