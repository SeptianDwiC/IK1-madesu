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
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-0 position-fixed d-block">
        <div class="container-fluid">
            <div class="judulNav position-relative"><img src="img/Logo.png" alt="" width="60px" height="56px" class="image ms-3 me-1"><a class="navbar-brand position-absolute mt-1" href="#">E-POTEK</a></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3" href="halaman_keranjang.php"><i class="fas fa-cart-plus me-2"></i>Chart</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Obat Batuk</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Obat Demam</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Obat Flu</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Obat Sakit Kepala</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Obat Maag</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Obat Mulut</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Obat Nyeri</a></li>
                        </ul>
                    </li> -->
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
    <div class="container-fluid" style="background-color: #d4d4d4;">
        <!-- Carousel -->
        <div id="carouselExampleControls" class="carousel slide p-xl-5 mt-lg-5 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner p-xl-4">
                <div class="carousel-item p-xl-3 active">
                    <img src="img/medical1.png" class="d-block w-100 shadow-lg" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h1 class="text-light">Selamat Datang</h1>
                        <p class="text-light fs-5">Di website ini anda dapat berbelanja obat sesuai kebutuhan anda</p>
                    </div>
                </div>
                <div class="carousel-item p-xl-3">
                    <img src="img/medical2.jpg" class="d-block w-100 shadow-lg" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h1 class="text-dark">Dokter Pribadi Anda</h1>
                        <p class="text-dark fs-5">Kami memiliki beberapa produk yang dapat menjawab masalah kesehatan anda</p>
                    </div>
                </div>
                <div class="carousel-item p-xl-3">
                    <img src="img/medical3.jpg" class="d-block w-100 shadow-lg" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h1 class="text-light">Mudah Di Akses</h1>
                        <p class="text-light fs-5">Website yang kami sediakan dapat diakses kapan saja</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev ms-2" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next me-2" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Tutup Carousel -->
        <!-- Cards -->
        <div class="row position-relative mt-lg-5 p-lg-5 p-5">
            <h2 class="text-center mb-5" style="font-family: Viga;">DAFTAR PRODUK</h2>
            <?php
            $data = $operasi->tampil("SELECT * FROM produk");
            while ($dt = $data->fetch_object()) {
            ?>
                <div class="col-12 col-md-6 col-lg-3 mb-3 mx-0">
                    <div class="card mx-auto" style="width: 15rem;height:100%;">
                        <img src="img/tmp-img/<?= $dt->gambar; ?>" class="card-img-top mx-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: roboto;"><?= $dt->nama; ?></h5>
                            <p class="card-text" style="font-family: sans-serif;">Rp.<?= $dt->harga; ?></p>
                            <div class="row">
                                <?php
                                $id = $dt->kategori;
                                $kategori = $operasi->tampil("SELECT * FROM kategori LEFT JOIN produk ON kategori.nama_kategori = produk.kategori WHERE id_kategori='$id'");
                                $ambil_kat = $kategori->fetch_object();
                                ?>
                                <div class="col-12 col-lg-12">
                                    <a id="detail" href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?php echo $dt->id; ?>" data-nm="<?php echo $dt->nama; ?>" data-des="<?php echo $dt->deskripsi; ?>" data-kat="<?php echo $ambil_kat->nama_kategori; ?>" data-har="<?php echo $dt->harga; ?>" data-stk="<?php echo $dt->stok; ?>" data-gbr="<?php echo $dt->gambar; ?>">Detail</a>
                                    <a href="keranjang.php?id=<?php echo $dt->id; ?>" id="cart" class="btn btn-outline-warning mt-2 w-100"><i class="fas fa-cart-plus me-2"></i>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detail Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                <img src="" alt="" id="gambar" style="width: 70%; height: 70%;">
                            </div>
                            <div class="produk col-lg-6 mt-lg-5">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="hidden" name="id_prod" id="id_prod">
                                            <p id="nm_prod" style="font-size: 2em; font-family:roboto; letter-spacing: 1px;"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p id="des" style="font-size: 1.2em; font-family:roboto; font-style:italic;"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p id="harga"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="qty">Quantity</label><br>
                                            <input type="number" min="1" max="10" name="qty" id="qty" class="qty text-center" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-12">
                                            <button type="submit" name="keranjang" id="keranjang" class="btn btn-warning"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="beli" id="beli">Beli</button>
                    </div>
                    </form>
                    <?php
                    $id = @$_POST['id_prod'];
                    // Keranjang
                    if (isset($_POST["keranjang"])) {
                        $jumlah = $_POST["qty"];
                        $_SESSION["cart"][$id] = $jumlah;
                        echo "<script> alert('Produk Masuk Ke Keranjang');</script>";
                        echo "<script> location ='halaman_keranjang.php';</script>";
                    }
                    // CheckOut
                    if (isset($_POST["beli"])) {
                        $jumlah = $_POST["qty"];
                        $_SESSION["cart"][$id] = $jumlah;
                        echo "<script> location ='checkout.php';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Tutup Modal -->

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
        $(document).on('click', '#detail', function() {
            var id = $(this).data('id');
            var nm = $(this).data('nm');
            var deskrip = $(this).data('des');
            var kategori = $(this).data('kat');
            var harga = $(this).data('har');
            var stok = $(this).data('stk');
            var gbr = $(this).data('gbr');

            $('#staticBackdrop #id_prod').val(id);
            $('#staticBackdrop #nm_prod').text(nm);
            $('#staticBackdrop #des').text(deskrip);
            $('#staticBackdrop #kategori').text(kategori);
            $('#staticBackdrop #harga').text("Rp." + harga);
            $('#staticBackdrop #stok').text(stok + " PCS");
            $('#staticBackdrop #gambar').attr("src", "img/tmp-img/" + gbr);
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-5.15.4-web/js/all.min.js"></script>
</body>

</html>