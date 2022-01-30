<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:./#Login");
    exit;
}
require 'Models/database.php';
require 'Models/Transaksi/TransaksiController.php';
$conn = new database();
$operasi = new Transaksi($conn);

if (empty($_SESSION['cart']) or !isset($_SESSION["cart"])) {
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
                    <!-- <li class="nav-item">
                        <a class="nav-link ps-3 pe-3" href="#Profil" data-bs-toggle="modal" data-bs-target="#modal-profile">Profile</a>
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
    <div class="container-fluid" style="background-color: #d4d4d4; height:100vh;">
        <!-- Cards -->
        <div class="row position-relative mt-lg-5 p-lg-5 p-5">
            <h2 class="text-center mb-5" style="font-family: Viga;">CHECKOUT</h2>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah Beli</th>
                        <th>SubHarga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION["cart"] as $id_produk => $jumlah) : ?>
                        <?php
                        $sql = $operasi->tampil("SELECT * FROM produk WHERE id='$id_produk'");
                        $ambil = $sql->fetch_object();
                        $totalharga = $ambil->harga * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $ambil->nama; ?></td>
                            <td>Rp <?php echo number_format($ambil->harga); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp <?php echo number_format($totalharga); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php $totalbelanja += $totalharga; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                    </tr>
                </tfoot>
            </table>
            <form action="" method="POST">
                <button type="submit" class="btn btn-primary" name="checkout"><i class="far fa-money-bill-alt me-2"></i>Checkout</button>
                <button type="button" class="btn btn-danger" name="back" onclick="Previous()">Kembali</button>
            </form>
            <?php
            $id_customer = $_SESSION["id_customer"];
            $tgl = date("Y-m-d");
            $totalharga = $totalbelanja;
            if (isset($_POST['checkout'])) {
                $operasi->tambahTrans($id_customer, $tgl, $totalharga);
                $id_trans = $conn->conn->insert_id;

                foreach ($_SESSION['cart'] as $id_produk => $jumlah) {
                    //mendapatkan data produk
                    $ambil = $operasi->tampil("SELECT * FROM produk WHERE id='$id_produk'");
                    $perproduk = $ambil->fetch_object();

                    $subharga = $perproduk->harga * $jumlah;
                    $conn->conn->query("INSERT INTO detail_trans VALUES ('', '$id_trans', '$id_produk', '$jumlah', '$subharga')");

                    $conn->conn->query("UPDATE produk SET stok_akhir=stok_akhir-$jumlah WHERE id='$id_produk'");
                }

                unset($_SESSION["cart"]);

                echo "<script> alert('Transaksi Berhasil !!');</script>";
                echo "<script> location ='nota.php?id=$id_trans';</script>";
            }
            ?>
        </div>

        <!-- Profile -->
        <div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tutup Profile -->

        <!-- Tutup Cards -->
    </div>
    <!-- Tutup Content -->
    <script>
        function Previous() {
            window.history.back();
        }
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-5.15.4-web/js/all.min.js"></script>
</body>

</html>