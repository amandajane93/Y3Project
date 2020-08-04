<?php

require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");

if (isset($_SESSION['username'])) { 
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else{ 
    header("Location:register.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HospitalityWorld</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <script src="assets/js/hospitalityworld.js"></script>


	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

<!-- Top Bar --> 
<div class="top_bar">

  <div class="logo">
    <a href="index.php">Hospitality World</a>
  </div> 

  <nav>
  <a href="<?php echo $userLoggedIn; ?>">
      <?php echo $user['first_name']; ?>
    </a>
    <a href="index.php">
      <i class="fa fa-home fa-lg"></i>
    </a>
    <a href="#">
      <i class="fa fa-bell fa-lg"></i>
    </a>
    <a href="requests.php">
      <i class="fa fa-user-circle fa-lg"></i>
      </a>
    <a href="#">
      <i class="fa fa-envelope fa-lg"></i>
      </a>
      <a href="includes/handlers/logout.php">
      <i class="fa fa-sign-out fa-lg"></i>
      </a>
  </nav>

</div> 

<div class="wrapper">
