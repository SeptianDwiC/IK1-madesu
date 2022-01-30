<?php
session_start();
//mendapatkan id produk
$id_produk = $_GET['id'];

if (isset($_SESSION['cart'][$id_produk])) {
    $_SESSION['cart'][$id_produk] += 1;
} else {
    $_SESSION['cart'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
echo "<script>alert('Produk Telah Masuk Ke keranjang');</script>";
echo "<script>location='halaman_keranjang.php';</script>";
