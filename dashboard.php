<?php
session_start(); // Start PHP session

// Check if the user is logged in, redirect to the login page if not
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php"); // Redirect back to the login page
    exit();
}

// This pulls the MongoDB driver from the vendor folder
require_once 'vendor/autoload.php';

// Connect to MongoDB Database
$databaseConnection = new MongoDB\Client;

// Connecting to a specific database in MongoDB
$myDatabase = $databaseConnection->rendika;

// Connecting to our MongoDB Collection
$userCollection = $myDatabase->users;

// Ambil semua data dari koleksi MongoDB
$users = $userCollection->find([]);


// Handle data updates when the form is submitted
if (isset($_POST['update'])) {
    // Mengambil data dari $_POST dan menyimpannya dalam variabel

    $updatedUser = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        // Add more fields as needed based on your data structure
    ];

    // Update the user data in MongoDB
    $userCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($_POST['user_id'])],
        ['$set' => $updatedUser]
    );

    // Redirect back to the dashboard after updating
    header("Location: dashboard.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

<link rel="stylesheet" href="dashboard.css">
</head>
<body>
        <!-- Search form -->
        <form action="search.php" method="get">
        <input type="text" name="search" placeholder="Search...">
        <input type="submit" value="Search">
    </form>
<form action="delete_all_data.php" method="post">
        <input type="submit" name="delete" value="Delete All Data">
    </form>
    <form action="options.php" method="get">
    <input type="submit" name="menu" value="Back to Menu">
</form>

<h1>WELCOME TO DASHBOARD</h1>
<h2>AUTHENTICATION DATA</h2>
<div class="table-responsive">
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
            <!-- Tambahkan kolom lain sesuai dengan struktur data Anda -->
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <!-- Tambahkan data lain sesuai dengan struktur data Anda -->
                <td class="table_action_button">
                        <!-- Membuat form untuk menghapus data -->
                        <form action="delete_user.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['_id']; ?>">
                            <input type="submit" name="delete" value="Delete" class="update-btn">
                        </form>
                        <form action="update_user.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['_id']; ?>">
                            <a class="update-btn" href="update_user.php?user_id=<?php echo $user['_id']; ?>">Update</a>
                        </form>
                    </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

    <button type="button" id="logoutButton"><a href="index.php">Logout</a></button>


<script>
document.getElementById("logoutButton").addEventListener("click", function() {
    window.location.href = "index.php";
});
</script>


</body>
</html>
