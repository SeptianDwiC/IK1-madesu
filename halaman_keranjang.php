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

if (empty($_SESSION['cart']) or !isset($_SESSION["cart"])) {
    echo "<script> alert('Keranjang Kosong');</script>";
    echo "<script> location ='Dashboard.php';</script>";
}
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-0 position-fixed d-block">
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
                    <!-- <li class="nav-item">
                        <a class="nav-link ps-3 pe-3" href="#Profil">Profile</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup Navbar -->

    <!-- Content -->
    <div class="container-fluid" style="background-color: #d4d4d4; min-height:100vh;">
        <!-- Cards -->
        <div class="row position-relative mt-lg-5 p-lg-5 p-5">
            <h2 class="text-center mb-5" style="font-family: Viga;">KERANJANG PRODUK</h2>
            <div class="col-3 col-md-6 col-lg-12 mb-3 mx-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah Beli</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($_SESSION["cart"] as $id_produk => $jumlah) : ?>
                            <?php
                            $sql = $operasi->tampil("SELECT * FROM produk WHERE id='$id_produk'");
                            $ambil = $sql->fetch_object();
                            $totalharga = $ambil->harga * $jumlah;
                            ?>
                            <tr>
                                <td class="text-end"><?php echo $nomor; ?></td>
                                <td><?php echo $ambil->nama; ?></td>
                                <td class="text-end">Rp <?php echo number_format($ambil->harga); ?></td>
                                <td class="text-end"><?php echo $jumlah; ?></td>
                                <td class="text-end">Rp <?php echo number_format($totalharga); ?></td>
                                <td class="text-center">
                                    <a href="hapus_keranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="opsi ms-5">
            <a href="Dashboard.php" class="btn btn-secondary"><i class="fa fa-cart-plus me-2"></i>Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-primary"><i class="far fa-money-bill-alt me-2"></i>Checkout</a>
        </div>
        <!-- Tutup Cards -->
    </div>
    <!-- Tutup Content -->
    <script src="js/bootstrap.min.js"></script>
    <script src="fontawesome-free-5.15.4-web/js/all.min.js"></script>
</body>

</html>