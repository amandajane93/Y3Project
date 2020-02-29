<?php

//variables for errors 

$fname =""; //First Name
$lname =""; //Last Name
$age =""; //Age
$city =""; //City
$country =""; //Country
$email =""; //Email
$email2 =""; //Email 2
$password =""; //Password
$password2 =""; //Password 2
$date =""; //Sign up date
$error_array= array(); //Error Messages

if (isset($_POST['register_button'])){

    //Registration form values
    $fname = strip_tags($_POST['reg_fname']); // remove html tags 
    $fname = str_replace(' ', '', $fname); //removes spaces
    $fname = ucfirst(strtolower($fname)); //capatilize first letter
    $_SESSION['reg_fname'] = $fname; //stores first name in sessions
    
    $lname = strip_tags($_POST['reg_lname']); // remove html tags 
    $lname = str_replace(' ', '', $lname); //removes spaces
    $lname = ucfirst(strtolower($lname)); //capatilize first letter
    $_SESSION['reg_lname'] = $lname; //stores last name in sessions

    $age = strip_tags($_POST['reg_age']); // remove html tags 
    $age = str_replace(' ', '', $age); //removes spaces
    $_SESSION['reg_age'] = $age; //stores age in sessions

    $city = strip_tags($_POST['reg_city']); // remove html tags 
    $city = str_replace(' ', '', $city); //removes spaces
    $city = ucfirst(strtolower($city)); //capatilize first letter
    $_SESSION['reg_city'] = $city; //stores city in sessions

    $country = strip_tags($_POST['reg_country']); // remove html tags 
    $country = str_replace(' ', '', $country); //removes spaces
    $country  = ucfirst(strtolower($country)); //capatilize first letter
    $_SESSION['reg_country'] = $country; //stores country in sessions

    $email = strip_tags($_POST['reg_email']); // remove html tags 
    $email = str_replace(' ', '', $email); //removes spaces
    $_SESSION['reg_email'] = $email; //stores email in sessions

    $email2 = strip_tags($_POST['reg_email2']); // remove html tags 
    $email2 = str_replace(' ', '', $email2); //removes spaces
    $_SESSION['reg_email2'] = $email2; //stores email2 in sessions

    $password = strip_tags($_POST['reg_password']); // remove html tags 

    $password2 = strip_tags($_POST['reg_password2']); // remove html tags 

    $date= date("Y-m-d");

    //Matching Emails 
    if($email == $email2){ 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $email=filter_var($email, FILTER_VALIDATE_EMAIL);

            //Check email exists
            $email_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");

            $num_rows = mysqli_num_rows($email_check); 

             if($num_rows > 0) { 
                array_push($error_array, "Email Already in Use <br>");
            }

        }
        else {
            array_push($error_array,"Invalid Format <br>");
        }
    }
    else  { 
        array_push($error_array, "Your emails do not match <br>");
    }

    if(strlen($fname) > 25 || strlen($fname) < 2) { 
        array_push($error_array, "Your first name must be between 2 and 25 characters. <br>"); 
    }

    if(strlen($lname) > 25 || strlen($lname) < 2) { 
        array_push($error_array, "Your last name must be between 2 and 25 characters. <br>"); 
    }

    if($password != $password2) { 
        array_push($error_array, "Your passwords do not match <br>");
    }
    else { 
        if(preg_match('/[^A-Za-z0-9]/', $password)){
        array_push($error_array,  "Your password can only contain english characters or numbers <br>");
        }
    }

    if(strlen($password) >30 || strlen($password) <8 ) { 
        array_push($error_array, "Your password must be between 8 and 30 characters <br>");
    }

    if(empty($error_array)) { 
        $password = md5($password); //encrypts password for database

        //create username for users 

        $username = strtolower($fname."_".$lname);
        $check_username = mysqli_query ($con, "SELECT username from users where username = '$username' ");

        //making username unique if username already exists 

        $i = 0; 
        while(mysqli_num_rows($check_username) !=0 ){ 
            $i++; 
            $username=$username."_".$i; 
            $check_username = mysqli_query ($con, "SELECT username from users where username = '$username' ");
        }

        //give user profile picture 
        $rand = rand(1, 2);
        if ($rand == 1) 
        $profile_pic = "assets/images/profile_pictures/default1.png"; 
        else if ($rand ==2)
        $profile_pic = "assets/images/profile_pictures/default2.png";

        $query = mysqli_query($con, "insert into users VALUES ('','$fname','$lname', '$username', '$city', '$country', '$email', '$password', '$age', '$date', '$profile_pic', '0','0', 'no', ',') ");

        array_push($error_array, "<span style='color:#7CFC00;'> You are registered ! You can now log in! </span><br>");

        //clearing variables once registered 

        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = ""; 
        $_SESSION['reg_age'] = ""; 
        $_SESSION['reg_city'] = ""; 
        $_SESSION['reg_country'] = ""; 
        $_SESSION['reg_email'] = ""; 
        $_SESSION['reg_email2'] = ""; 

    }
}

?>