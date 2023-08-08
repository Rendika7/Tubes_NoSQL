<?php
// Check if the user ID is passed in the URL
if (isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $userIdToUpdate = new MongoDB\BSON\ObjectId($_GET['user_id']);


// This pulls the MongoDB driver from the vendor folder
require_once 'vendor/autoload.php';

// Membuat koneksi ke server MongoDB
    $mongoClient = new MongoDB\Client;
    $database = $mongoClient->selectDatabase('rendika');
    $collection = $database->selectCollection('users');

    $userData = $collection->findOne(['_id' => $userIdToUpdate]);

    // Check if the form is submitted for updating the data
    if (isset($_POST['update'])) {
        // Get the updated data from the form
        $updatedUsername = $_POST['updated_username'];
        $updatedEmail = $_POST['updated_email'];
        $updatedPassword = sha1($_POST['updated_password']);

        // Perform the update in MongoDB
        $collection->updateOne(
            ['_id' => $userIdToUpdate],
            ['$set' => [
                'username' => $updatedUsername,
                'email' => $updatedEmail,
                'password' => $updatedPassword
            ]]
        );

        // Redirect back to dashboard.php after successful update
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="update_user.css">
</head>
<body>
    <h1>Update User</h1>

    <?php if ($userData): ?>
        <!-- Display the current user data in the form for updating -->
        <form action="update_user.php?user_id=<?php echo $userIdToUpdate; ?>" method="post">
            <label>Username:</label>
            <input type="text" name="updated_username" value="<?php echo $userData['username']; ?>"><br>

            <label>Email:</label>
            <input type="email" name="updated_email" value="<?php echo $userData['email']; ?>"><br>

            <label>Password:</label>
            <input type="password" name="updated_password" value=""><br>

            <input type="submit" name="update" value="Update">
        </form>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
</body>
</html>
