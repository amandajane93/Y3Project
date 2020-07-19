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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
    <script src="https://kit.fontawesome.com/4366d5c727.js" crossorigin="anonymous"></script>
</head>

<body>

<!–– Dropdown ––>
<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

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
