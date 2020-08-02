<?php

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Hospitality World </title>
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

    <?php 

    if(isset($_POST['register_button'])) { 
        echo '
        <script> 

        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();

        });
        
        </script>

    ';
}

    ?>


    <div class="wrapper">
        <div class="login_box">
        <div class="login_header">
            <h1>Hospitality World</h1>
            <br>
            Login or Register Below ! 
            <br>
        </div>

        <div id="first">
            <form action="register.php" method="POST">
                <input type="email" name="log_email" placeholder="Email Address" value="<?php 
            if(isset($_SESSION['log_email'])) { 
                echo $_SESSION['log_email'];
            }
            ?>" required>
                <br>     
                <input type="password" name="log_password" placeholder="Password">   
                <br>     
                <?php if(in_array("Incorrect Credentials<br>", $error_array)) echo "Incorrect Credentials<br>";?>
                <input type="submit" name="login_button" value="Login">   
                <br>     
                <a href="#" id="signup" class="signup">Need An Account ? Register Here ! </a>
            </form>
        </div>

        <div id="second">

            <form action="register.php" method="POST">
            <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
            if(isset($_SESSION['reg_fname'])) { 
                echo $_SESSION['reg_fname'];
            }
            ?>"required>
            <br>
            <?php if(in_array("Your first name must be between 2 and 25 characters. <br>", $error_array)) echo "Your first name must be between 2 and 25 characters. <br>"; ?>

            <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
            if(isset($_SESSION['reg_lname'])) { 
                echo $_SESSION['reg_lname'];
            }
            ?>"required>
            <br> 
            <?php if(in_array("Your last name must be between 2 and 25 characters. <br>", $error_array)) echo "Your last name must be between 2 and 25 characters. <br>"; ?>


            <input type="age" name="reg_age" placeholder="Age" value="<?php 
            if(isset($_SESSION['reg_age'])) { 
                echo $_SESSION['reg_age'];
            }
            ?>"required>
            <br>
            
            <input type="city" name="reg_city" placeholder="City" value="<?php 
            if(isset($_SESSION['reg_city'])) { 
                echo $_SESSION['reg_city'];
            }
            ?>"required>
            <br>

            <input type="country" name="reg_country" placeholder="Country" value="<?php 
            if(isset($_SESSION['reg_country'])) { 
                echo $_SESSION['reg_country'];
            }
            ?>"required>
            <br>

            <input type="email" name="reg_email" placeholder="Email" value="<?php 
            if(isset($_SESSION['reg_email'])) { 
                echo $_SESSION['reg_email'];
            }
            ?>"required>
            <br>

            <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
            if(isset($_SESSION['reg_email2'])) { 
                echo $_SESSION['reg_email2'];
            }
            ?>"required>
            <br>
            <?php if(in_array("Email Already in Use <br>", $error_array)) echo "Email Already in Use <br>"; 
                else if(in_array("Invalid Format <br>", $error_array)) echo "Invalid Format <br>"; 
                else if(in_array("Your emails do not match <br>", $error_array)) echo "Your emails do not match <br>"; ?>

            <input type="password" name="reg_password" placeholder="Password" required>
            <br> 
            <input type="password" name="reg_password2" placeholder="Confirm Password" required>
            <br>
            <?php if(in_array("Your passwords do not match <br>", $error_array)) echo "Your passwords do not match <br>"; 
                else if(in_array("Your password can only contain english characters or numbers <br>", $error_array)) echo "Your password can only contain english characters or numbers <br>"; 
                else if(in_array("Your password must be between 8 and 30 characters <br>", $error_array)) echo "Your password must be between 8 and 30 characters <br>"; ?> 


            <input type="submit" name="register_button" value="Register">
					<br>

					<?php if(in_array("<span style='color: #14C800;'>You are registered ! You can now log in! </span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
					<a href="#" id="signin" class="signin">Already Registered ? Sign in here!</a>
            
            </form>
        </div>

        </div>

    </div> 

</body>
</html>