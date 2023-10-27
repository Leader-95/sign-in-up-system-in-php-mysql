<?php
session_start();

require_once 'db_connection.inc.php';

if (isset($_POST['submit'])) {
  // Verify the user's login credentials
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];

  // Check if the user exists
  $sql = "SELECT * FROM users WHERE email = :email";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':email' => $email
  ]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    // The user does not exist
    header('Location: ../login.php?error=usernotexists');
    exit();
  }

  // Verify the password
  $hash = $row['password'];
  if (!password_verify($pwd, $hash)) {
    // The password is incorrect
    header('Location: ../login.php?error=incorrectpassword');
    exit();
  }

  $_SESSION['user_id'] = $row['id'];
  $_SESSION['name'] = $row['name'];
  $_SESSION['email'] = $row['email'];


  // Redirect the user to the home page or another page where you want to give them access to logged-in users
  header('Location: ../index.php');
  exit();
}
?>
