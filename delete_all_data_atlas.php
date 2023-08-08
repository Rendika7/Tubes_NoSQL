<?php
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://rendikarendi96:LNgTWBsd2M5hVOx0@cluster0.ws9jbrl.mongodb.net/?retryWrites=true&w=majority");
$database = $mongoClient->selectDatabase("rendika"); // Ganti dengan nama database Anda
$collection = $database->selectCollection("keuangan"); // Ganti dengan nama koleksi Anda

// Delete all documents in the collection
$deleteResult = $collection->deleteMany([]);

if ($deleteResult->getDeletedCount() > 0) {
    echo "All data deleted successfully.";
    header("Location: dashboardmoney.php");
} else {
    echo "No data deleted.";
    header("Location: dashboardmoney.php");
}
?>
