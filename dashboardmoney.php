<?php
require 'vendor/autoload.php'; // Pastikan Anda telah memuat autoloader

$mongoClient = new MongoDB\Client("mongodb+srv://rendikarendi96:LNgTWBsd2M5hVOx0@cluster0.ws9jbrl.mongodb.net/?retryWrites=true&w=majority");
$database = $mongoClient->selectDatabase("rendika"); // Ganti dengan nama database Anda
$collection = $database->selectCollection("keuangan"); // Ganti dengan nama koleksi Anda

$cursor = $collection->find();
$chartLabels = [];
$chartData = [];

foreach ($cursor as $document) {
    $chartLabels[] = $document['kategori'];
    $chartData[] = $document['jumlah'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas Neue:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="dashboardmoney.css">
</head>
<body>
<h1>Dashboard Money Management</h1>
<form action="money_manager.php" method="get">
    <input type="submit" name="menu" value="Back to Money Manager">
</form>

<form action="delete_all_data_atlas.php" method="post">
        <input type="submit" name="delete" value="Delete All Data">
    </form>

    <canvas id="myChart"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($chartLabels); ?>,
                datasets: [{
                    label: 'Jumlah',
                    data: <?php echo json_encode($chartData); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                // Customize chart options here
            }
        });
    </script>
</body>
</html>
