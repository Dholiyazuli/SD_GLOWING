<?php

// DB connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "glowing";

$conn = mysqli_connect($host, $user, $pass, $dbname);

// connection check
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // get email from form (your input name)
    $email = trim($_POST['email_address']);

    // 1) Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid email format'); window.history.back();</script>";
        exit;
    }

    // 2) Check duplicate
    $check = "SELECT * FROM subscribers WHERE email = '$email'";
    $run = mysqli_query($conn, $check);

    if(mysqli_num_rows($run) > 0){
        echo "<script>alert('This email is already subscribed'); window.history.back();</script>";
        exit;
    }

    // 3) Insert with date & time
    $now = date('Y-m-d H:i:s');

    $insert = "INSERT INTO subscribers(email, created_at)
               VALUES('$email', '$now')";

    if(mysqli_query($conn, $insert)){
        echo "<script>alert('Thank you for subscribing!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Something went wrong, try again'); window.history.back();</script>";
    }
}
?>
