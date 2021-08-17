<?php
$conn = new mysqli("localhost","root","","sepm");
session_start();
?>

<?php

if (empty($_POST['upload_image'])){
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
  <h1>Please Login First!</h1>
  </div>
</body>
</html>';
exit();
}

if(isset($_POST['upload_image'])){

  $user = $_SESSION['user'];

 	$image = $_FILES['image']['name'];

 	$name = $_POST['image_name'];

 	$date = $_POST['date'];

  $category = $_POST['category'];

  $q1 = "INSERT INTO images(username, upload_date, name, image, category) VALUES ('$user', '$date', '$name', '$image', '$category')";

  if ($conn->query($q1) == TRUE)
  {	

  		// $temp = explode(".", $image);

  		// $q2 = "SELECT id FROM images";

  		// $result = $conn->query($q2);

  		// if ($result->num_rows > 0)
  		// {
  		// 	while($new_name = mysqli_fetch_array($result)){

				// $newfilename = $new_name['id'] . '.' . end($temp);

				// }

		$target = "images/" . strval($user) . "/" . strval($image);

		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target) == TRUE){

			echo "<script language='javascript'type='text/javascript'> alert('Image Uploaded Successfully');
      window.location = 'mainpage.php';</script>";

		}
		else{
		 		echo "<script language='javascript'type='text/javascript'> alert('Image Upload Error!!');</script>";
		}
	}
  		
}
else{
  		echo "Error: ".$conn->error;
}


?>