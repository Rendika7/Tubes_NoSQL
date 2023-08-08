<?php

// This pulls the MongoDB driver from the vendor folder
require_once 'vendor/autoload.php';

// Membuat koneksi ke server MongoDB
$mongoClient = new MongoDB\Client;

// Menggunakan basis data yang diinginkan
$database = $mongoClient->selectDatabase('rendika');

// Menggunakan koleksi yang diinginkan
$collection = $database->selectCollection('users');



if (isset($_POST['delete'])) {
    // Mengambil ID dokumen yang akan dihapus
    $userIdToDelete = new MongoDB\BSON\ObjectId($_POST['user_id']);

    // Menghapus data pengguna dari koleksi MongoDB berdasarkan ID
    $collection->deleteOne(['_id' => $userIdToDelete]);

    // Redirect kembali ke halaman dashboard setelah penghapusan selesai
    header("Location: dashboard.php");
    exit();
}
?>