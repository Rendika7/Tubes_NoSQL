<?php
require 'vendor/autoload.php'; // Pastikan Anda telah memuat autoloader

$mongoClient = new MongoDB\Client("mongodb+srv://rendikarendi96:LNgTWBsd2M5hVOx0@cluster0.ws9jbrl.mongodb.net/?retryWrites=true&w=majority");
$database = $mongoClient->selectDatabase("rendika"); // Ganti dengan nama database Anda
$collection = $database->selectCollection("keuangan"); // Ganti dengan nama koleksi Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    $data = [
        'tanggal' => $tanggal,
        'kategori' => $kategori,
        'jumlah' => $jumlah,
        'keterangan' => $keterangan
    ];

    $insertResult = $collection->insertOne($data);

    if ($insertResult->getInsertedCount() === 1) {
        echo "Data berhasil disimpan ke MongoDB Atlas.";
        header("Location: dashboardmoney.php");
    } else {
        echo "Gagal menyimpan data ke MongoDB Atlas.";
        header("Location: dashboardmoney.php");
    }
}
?>