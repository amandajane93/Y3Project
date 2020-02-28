<?php

$con = mysqli_connect("localhost", "root", "", "social");

if(mysqli_connect_errno()) {
    echo "Failed to connect to database" . mysqli_connect_errno();
}

//variables for errors 

$fname =""; //First Name
$lname =""; //Last Name
$age =""; //Age
$address =""; //City
$address =""; //Country
$email =""; //Email
$email2 =""; //Email 2
$password =""; //Password
$password2 =""; //Password 2
$date =""; //Sign up date
$error_array=""; //Error Messages

if (isset($_POST['register_button'])){

    //Registration form values
    $fname = strip_tags($_POST['reg_fname']); // remove html tags 
    $fname = str_replace(' ', '', $fname); //removes spaces
    $fname = ucfirst(strtolower($fname)); //capatilize first letter
    
    $lname = strip_tags($_POST['reg_lname']); // remove html tags 
    $lname = str_replace(' ', '', $lname); //removes spaces
    $lname = ucfirst(strtolower($lname)); //capatilize first letter

    $age = strip_tags($_POST['reg_age']); // remove html tags 
    $age = str_replace(' ', '', $age); //removes spaces

    $address = strip_tags($_POST['reg_address']); // remove html tags 
    $address  = str_replace(' ', '', $address); //removes spaces
    $address = ucfirst(strtolower($address)); //capatilize first letter

    $address2 = strip_tags($_POST['reg_address2']); // remove html tags 
    $address2 = str_replace(' ', '', $address2); //removes spaces
    $address2  = ucfirst(strtolower($address2)); //capatilize first letter

    $email = strip_tags($_POST['reg_email']); // remove html tags 
    $email = str_replace(' ', '', $email); //removes spaces

    $email2 = strip_tags($_POST['reg_email2']); // remove html tags 
    $email2 = str_replace(' ', '', $email2); //removes spaces

    $password = strip_tags($_POST['reg_password']); // remove html tags 

    $password2 = strip_tags($_POST['reg_password2']); // remove html tags 

    $date= date("Y-m-d");

    //Matching Emails 
    if($email == $email2){ 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $email=filter_var($email, FILTER_VALIDATE_EMAIL);

            //Check email exists
            $email_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email");

            $num_rows = mysqli_num_rows($email_check); 

            if($num_rows > 0) { 
                echo "Email Already in Use";
            }

        }
        else{
            echo "Invalid Format";
        }
    }
    else  { 
        echo "Emails Don't Match";
    }

    if(strlen($fname) > 25 || strlen($fname) < 2) { 
        echo "Your first name must be between 2 and 25 characters."; 
    }

    if(strlen($lname) > 25 || strlen($lname) < 2) { 
        echo "Your last name must be between 2 and 25 characters."; 
    }

    if($password != $password2) { 
        echo "Your passwords do not match";
    }
    else { 
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            echo "Your password can only contain english characters or numbers";
        }
    }

    if(strlen($password) >30 || strlen($password) <8 ) { 
        echo"Your password must be between 8 and 30 characters";
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Hospitality World </title>
</head>
<body>
    <form action="register.php" method="POST">
    <input type="text" name="reg_fname" placeholder="First Name" required>
    <br>
    <input type="text" name="reg_lname" placeholder="Last Name" required>
    <br> 
    <input type="age" name="reg_age" placeholder="Age" required>
    <br>
    <input type="address" name="reg_address" placeholder="City" required>
    <br>
    <input type="address" name="reg_address2" placeholder="Country" required>
    <br>
    <input type="email" name="reg_email" placeholder="Email" required>
    <br>
    <input type="email" name="reg_email2" placeholder="Confirm Email" required>
    <br>
    <input type="password" name="reg_password" placeholder="Password" required>
    <br> 
    <input type="password" name="reg_password2" placeholder="Confrim Password" required>
    <br> 
    <input type="submit" name="register_button" value="Register">
    
    </form>
</body>
</html>