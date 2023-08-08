<?php
include 'connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // Find the user with the provided email and password in MongoDB
    $user = $userCollection->findOne(['email' => $email, 'password' => $password]);

    if ($user) {
        // Login successful, set a session variable to indicate the user is logged in
        session_start();
        $_SESSION['logged_in'] = true;

        // Redirect to the dashboard page
        header("Location: options.php");
        exit();
    } else {
        // Login failed, show an error message and provide a link to try again
        header("Location: index.php?login_failed=true");
        exit();
    }
}

?>