<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // The user is not logged in, redirect them to the login page
  header('Location: ../login.php');
  exit();
}

// Get the user's email address from the session
$email = $_SESSION['email'];
$name = $_SESSION['name'];

// Display the user's email address
echo 'Welcome, ' . $email . '!','<br>';
echo 'Welcome, ' . $name . '!','<br>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="signup.php">go to signup</a> <br>
    <a href="login.php">go to login</a>
</body>

</html>
