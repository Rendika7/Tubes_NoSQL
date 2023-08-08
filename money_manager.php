<!DOCTYPE html>
<html>
<head>
    <title>Input Keuangan Harian</title>
    <link rel="stylesheet" href="money_manager.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">
    <div class="row justify-content-between">
        <div class="col">
            <form action="options.php" method="get">
                <button type="submit" class="btn btn-primary" name="menu">Back to Menu</button>
            </form>
        </div>
        <div class="col">
            <form action="dashboardmoney.php" method="get">
                <button type="submit" class="btn btn-primary" name="money_dashboard">Money Dashboard</button>
            </form>
        </div>
    </div>
</div>

    <div class="form-area">
        <div class="container">
            <div class="row single-form g-0">
                <div class="col-sm-12 col-lg-6">
                    <div class="left">
                        <h2><span>Silahkan Mengisi</span> <br>Pengeluaran Anda</h2>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="right">
                        <i class="fa fa-caret-left"></i>
                        <form action="addDataToAtlas.php" method="post">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal:</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori Pengeluaran:</label>
                                <select id="kategori" name="kategori" class="form-select" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Transportasi">Transportasi</option>
                                    <option value="Belanja">Belanja</option>
                                    <option value="Edukasi">Edukasi</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <!-- Tambahkan kategori lainnya sesuai kebutuhan -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah:</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan:</label>
                                <textarea id="keterangan" name="keterangan" class="form-control" rows="1" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <script>
        // Function untuk memberikan format rupiah pada input jumlah
        function formatRupiah(angka) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   	 = number_string.split(','),
                sisa     	 = split[0].length % 3,
                rupiah    	 = split[0].substr(0, sisa),
                ribuan    	 = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        // Function untuk mengubah input jumlah ke format rupiah saat diketik
        document.getElementById('jumlah').addEventListener('keyup', function() {
            this.value = formatRupiah(this.value);
        });

    </script>
</body>
</html>
