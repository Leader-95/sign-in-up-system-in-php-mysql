<?php
if (isset($_POST['submit'])) {
    try {
        // Create a new user account
        createUser($_POST['name'], $_POST['email'], $_POST['pwd'], $_POST['pwdRepeat']);

        header('Location: signup.php?signup=success');
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        header('Location: signup.php?error=databaseerror');
        exit();
    } catch (Exception $e) {
        // Handle other exceptions
        header('Location: signup.php?error=othererror');
        exit();
    }
}

function createUser($name, $email, $pwd, $pwdRepeat)
{
    require_once 'db_connection.inc.php'; // Include the database connection

    // Validate inputs
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        header('Location: signup.php?error=emptyinputs');
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: signup.php?error=invalidemail');
        exit();
    }
    if ($pwd !== $pwdRepeat) {
        header('Location: signup.php?error=passwordmatch');
        exit();
    }

    // Check if the username or email already exists
    $sql = "SELECT * FROM users WHERE name = :name OR email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email
    ]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        header('Location: signup.php?error=userexists');
        exit();
    }

    // Insert the new user into the database
    $sql = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);

    $hash = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt->execute([$name, $email, $hash]);
}
?>
