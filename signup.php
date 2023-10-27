<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name='name' placeholder="Enter username"><br>
        <input type="email" name='email' placeholder="Enter email"><br>
        <input type="password" name='pwd' placeholder="Enter password"><br>
        <input type="password" name='pwdRepeat' placeholder="Enter password"><br>
        <input type="submit" name='submit' value="Register">
    </form>
    <a href="login.php">LOGIN</a> <br>
    <a href="index.php">HOME</a>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinputs') {
            echo '<p>Fill in all fields!</p>';
        } else if ($_GET['error'] == 'invalidname') {
            echo '<p>Choose a proper username!</p>';
        } else if ($_GET['error'] == 'invalidemail') {
            echo '<p>Choose a proper email!</p>';
        } else if ($_GET['error'] == 'passwordmatch') {
            echo '<p>Passwords do not match!</p>';
        } else if ($_GET['error'] == 'stmtfailed') {
            echo '<p>Something went wrong, please try again!</p>';
        } else if ($_GET['error'] == 'none') {
            echo '<p>You have successfully signed up!</p>';
        }
    }
    if (isset($_GET['signup'])) {
        if ($_GET['signup'] == 'success') {
            echo '<p>You have successfully signed up!</p>';
        }
    }
    ?>
</body>

</html>
