
<?php

//this pulls the MongoDB driver from vendor folder
require_once  'vendor/autoload.php';

//connect to MongoDB Database
$mongoClient = new MongoDB\Client;
$database = $mongoClient->selectDatabase('rendika');
$collection = $database->selectCollection('keuangan');

// Ambil data dari form
$tanggal = $_POST['tanggal'];
$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];

// Simpan data ke MongoDB
$document = [
    'tanggal' => $tanggal,
    'kategori' => $kategori,
    'keterangan' => $keterangan,
    'jumlah' => $jumlah
];

$result = $collection->insertOne($document);

// Cek apakah data berhasil disimpan atau tidak
if ($result->getInsertedCount() > 0) {
    echo "Data berhasil disimpan.";
    header("Location: money_manager.php");
} else {
    echo "Data gagal disimpan.";
}

?>