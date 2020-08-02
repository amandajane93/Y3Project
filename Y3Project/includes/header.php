<?php

require 'config/config.php';

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
    <script src="https://kit.fontawesome.com/4366d5c727.js" crossorigin="anonymous"></script>
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
    <a href="#">
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
