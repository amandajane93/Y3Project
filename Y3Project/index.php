<?php

$con = mysqli_connect("localhost", "root", "", "social");

if(mysqli_connect_errno()) {
    echo "Failed to connect to database" . mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES ('', 'test')");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HospitalityWorld</title>
</head>
<body>
    Hospitality World
</body>
</html>