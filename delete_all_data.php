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
    // Menghapus semua data dari koleksi MongoDB
    $collection->deleteMany([]);

    // Redirect kembali ke halaman dashboard setelah penghapusan selesai
    header("Location: dashboard.php");
    exit();
}
?>