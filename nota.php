<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:./#Login");
    exit;
}
require 'Models/database.php';
require 'Models/functions.php';
$conn = new database();
$operasi = new operation($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="E-POTEK Web Apps">
    <meta name="keywords" content="index, e-potek, Apps">
    <meta name="author" content="Septian Dwi Cahya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/UserPage.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <script src="Jquery/jquery.js"></script>
    <title>E-POTEK</title>
</head>

<body>
    <!-- Navbar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-0 position-fixed d-block">
        <div class="container-fluid">
            <div class="judulNav position-relative"><img src="img/Logo.png" alt="" width="60px" height="56px" class="image ms-3 me-1"><a class="navbar-brand position-absolute mt-1" href="#">E-POTEK</a></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3" href="Dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3" href="#Profil">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
    <!-- Tutup Navbar -->

    <!-- Content -->
    <div class="container-fluid" style="min-height:100vh;">
        <!-- Cards -->
        <div class="row position-relative mt-lg-5 p-lg-5 p-5">
            <h2 class="text-center mb-5" style="font-family: Viga;">BUKTI TRANSAKSI</h2>
            <table class="table table-bordered table-success">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NOTA</th>
                        <th>Nama Produk</th>
                        <th>QTY</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $conn->conn->query("SELECT * FROM detail_trans WHERE nota='$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_object()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah->nota; ?></td>
                            <td>
                                <?php
                                $id_prod = $pecah->produk_id;
                                $produk = $operasi->tampil("SELECT * FROM produk WHERE id='$id_prod'");
                                $ambil_prod = $produk->fetch_object()->nama;
                                echo $ambil_prod;
                                ?>
                            </td>
                            <td><?php echo $pecah->qty; ?></td>
                            <td>Rp. <?php echo number_format($pecah->subtotal); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="col-3 col-md-6 col-lg-12">
                <a href="#" class="btn btn-warning" onclick="cetak()"><i class="fa fa-print me-2"></i>Cetak</a>
                <a href="Dashboard.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
        <!-- Tutup Cards -->
    </div>
    <!-- Tutup Content -->
    <script src="js/bootstrap.min.js"></script>
    <script src="fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <script type="text/javascript">
        function cetak() {
            window.print();
        }
    </script>
</body>

</html>