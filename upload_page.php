<?php
session_start();
?>
<?php
if (empty($_POST['upload'])){
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
if (isset($_POST['upload']) && isset($_SESSION['user'])){
	include 'upload1.html';	
	echo "<script>
    	var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0');
		var yyyy = today.getFullYear();

		today = dd + '-' + mm + '-' + yyyy;
   		document.getElementById('date').value = String(today);
   		</script>";
}
if (!isset($_SESSION['user'])){
	header('Location: logout.php');
	exit();
}
?>
