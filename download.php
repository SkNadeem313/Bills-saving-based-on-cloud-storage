<?php
session_start();
?>

<!-- <html>
<head>
<title> New page</title>
</head>
<body>
<h1>WELCOME IN TO NEW PAGE<?php

// echo $_SESSION['arr'];
// print_r($_SESSION['arr']);
// echo $_GET['id'];
?></h1>
</body>
</html> -->
<?php
if (isset($_SESSION['user'])){
$image = str_replace('%20', ' ', $_GET['image']);
$name = str_replace('%20', ' ', $_GET['name']);
$date = str_replace('%20', ' ', $_GET['date']);
$category = str_replace('%20', ' ', $_GET['category']);
echo "<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

    <title>Detail</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
  
<!--------------------------here code starts    ------------------------------>







<div class='container-fluid'>
    
    <div class='row'>


      <div class='col-sm-9 col-md-6 col-lg-8' >
        <img src=$image width= 100% height=100%>
      </div>


      <div class='col-sm-3 col-md-6 col-lg-4 border-left border-dark' style='font-size: 25px'>
      	<a href=$image download>
        <button type='button' class='btn btn-dark'>Download</button>
        </a>
        <div style='margin-right: 30px; margin-top: 80px;'><h4>Name: $name</h4></div><br>
        <div style='margin-right: 30px; margin-top: 20px;'><h4>Category: $category</h4></div><br>
        <div style='margin-right: 30px; margin-top: 20px;'><h4>Date: $date</h4></div><br>
      </div>
</div>
      


</body>
</html>";
}