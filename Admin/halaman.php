<?php

if (@$_GET['page'] == 'produk') {
    include "Produk/produk.php";
} elseif (@$_GET['page'] == 'customer') {
    include "Customer/customer.php";
} elseif (@$_GET['page'] == 'home') {
    include "Home/home.php";
} elseif (@$_GET['page'] == 'about') {
    include "About/about.php";
} elseif (@$_GET['page'] == 'login') {
    include "LoginCustomer/login.php";
} elseif (@$_GET['page'] == 'services') {
    include "Services/services.php";
} elseif (@$_GET['page'] == 'transaksi') {
    include "Transaksi/transaksi.php";
} elseif (@$_GET['page'] == 'detail') {
    include "Detail_Trans/detail.php";
}
