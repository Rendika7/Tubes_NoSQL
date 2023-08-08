<?php

// This pulls the MongoDB driver from the vendor folder
require_once 'vendor/autoload.php';

// Membuat koneksi ke server MongoDB
$mongoClient = new MongoDB\Client;

// Menggunakan basis data yang diinginkan
$database = $mongoClient->selectDatabase('rendika');

// Menggunakan koleksi yang diinginkan
$collection = $database->selectCollection('users');

// Handle search query
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    // Filter data based on search query
    $users = $collection->find([
        '$or' => [
            ['username' => new MongoDB\BSON\Regex($searchQuery, 'i')],
            ['email' => new MongoDB\BSON\Regex($searchQuery, 'i')],
            ['password' => new MongoDB\BSON\Regex($searchQuery, 'i')]
        ]
    ]);
} else {
    // Jika tidak ada query pencarian, tampilkan semua data
    $users = $collection->find([]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <h1>Search Results</h1>
    
    <form action="" method="get">
        <input type="text" name="search" placeholder="Search">
        <input type="submit" value="Search">
    </form>
    
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['password']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <!-- Back button -->
    <!-- Back button -->
    <div class="back-button-container">
        <a href="dashboard.php" class="back-button">Back to Dashboard</a>
    </div>
</body>
</html>