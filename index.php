<?php
session_start();
require 'Models/database.php';
require 'Models/functions.php';
$conn = new database();
$operasi = new operation($conn);
$data = $operasi->tampil("SELECT * FROM home");
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
  <link rel="stylesheet" href="css/cadangan.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
  <title>Landing Page</title>
</head>

<body>
  <!--Navigasi Bar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-0 position-fixed d-block">
    <div class="container-fluid">
      <div class="judulNav position-relative"><img src="img/Logo.png" alt="" width="60px" height="56px" class="image ms-3 me-1"><a class="navbar-brand position-absolute mt-1" href="#">E-POTEK</a></div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-lg-auto">
          <li class="nav-item">
            <a class="nav-link ps-3 pe-3" aria-current="page" href="#Home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-3 pe-3" href="#About">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-3 pe-3" href="#Login">Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Tutup Navigasi-->
  <div class="section-home container-fluid p-lg-0 d-block mt-0 d-flex justify-content-center align-items-center" id="Home">
    <img src="img/Ellipse 1.png" alt="" class="ellipse1" height="94%">
    <img src="img/Ellipse 2.png" alt="" class="ellipse2">
    <img src="img/Ellipse 3.png" alt="" class="ellipse3">
    <img src="img/Ellipse 4.png" alt="" class="ellipse4">
    <img src="img/Ellipse 5.png" alt="" class="ellipse5">
    <div class="container">
      <?php
      while ($dt = $data->fetch_object()) {
      ?>
        <img src="img/tmp-home/<?= $dt->gambar; ?>" alt="" class="icon position-absolute" width="40%" height="110%">
        <div class="card-home">
          <h3><?= $dt->judul; ?></h3>
          <h3><?= $dt->subjudul; ?></h3><br>
          <div class="container-description">
            <p><?= $dt->keterangan; ?></p>
          </div>
        <?php
      }
        ?>
        <div class="btn btn-danger"><a href="#Login" class="GetStarted">Get Started</a></div>
        </div>
    </div>
  </div>
  <div class="section-about container-fluid" id="About">
    <img src="img/Ellipse 1.png" alt="" class="ellipse1" height="94%" ;>
    <img src="img/Ellipse 2.png" alt="" class="ellipse2">
    <img src="img/Ellipse 3.png" alt="" class="ellipse3">
    <img src="img/Ellipse 4.png" alt="" class="ellipse4">
    <img src="img/Ellipse 5.png" alt="" class="ellipse5">
    <div class="about container">
      <?php
      $data2 = $operasi->tampil("SELECT * FROM about");
      $dt2 = $data2->fetch_object();
      ?>
      <div class="judul">
        <h3><?php echo $dt2->judul; ?></h3>
      </div>
      <p class="describe-about"><?php echo $dt2->deskripsi; ?></p>
      <img src="img/tmp-about/<?php echo $dt2->gambar; ?>" alt="" id="icon-about">
      <div class="card-about">
        <div class="row">
          <div class="misi col-6">
            <h4>Misi</h4>
            <p><?php echo $dt2->misi; ?></p>
          </div>
          <div class="visi col-6">
            <h4>Visi</h4>
            <p><?php echo $dt2->visi; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="services container">
      <h3>Services</h3>
      <div class="row">
        <?php
        $data3 = $operasi->tampil("SELECT * FROM  services");
        while ($dt3 = $data3->fetch_object()) {
        ?>
          <div class="services1 col-4 d-flex flex-column align-items-center">
            <img src="img/<?php echo $dt3->gambar; ?>" alt="" width="30%" height="80%"><label for=""><?php echo $dt3->judul; ?></label>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <?php
  $data4 = $operasi->tampil("SELECT * FROM login");
  ?>
  <div class="section-login container-fluid" id="Login">
    <img src="img/Ellipse 1.png" alt="" class="ellipse1" height="94%" ;>
    <img src="img/Ellipse 2.png" alt="" class="ellipse2">
    <img src="img/Ellipse 3.png" alt="" class="ellipse3">
    <img src="img/Ellipse 4.png" alt="" class="ellipse4">
    <img src="img/Ellipse 5.png" alt="" class="ellipse5">
    <img src="img/tmp-login/<?= $data4->fetch_object()->icon; ?>" alt="" class="icon-login">
    <div class="card-login d-flex flex-column bg-white">
      <div class="header d-flex flex-column align-items-center py-3">
        <img src="img/tmp-login/<?= $data4->fetch_object()->icon; ?>" alt="" class="d-block w-100">
        <h3>LOGIN</h3>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="username">
          <div class="label-username d-flex align-items-center">
            <img src="img/tmp-login/<?= $data4->fetch_object()->icon; ?>" alt="">
            <label for="" class="ms-2 mt-3">Username</label>
          </div>
          <div class="inputs d-flex">
            <input type="text" class="w-100" name="user">
          </div>
        </div>
        <div class="username mt-2">
          <div class="label-username d-flex align-items-center">
            <img src="img/tmp-login/<?= $data4->fetch_object()->icon; ?>" alt="">
            <label for="" class="ms-2 mt-3">Password</label>
          </div>
          <div class="inputs">
            <input type="password" class="w-100" name="pass" id="pass">
            <span class="position-absolute" onclick="myFunction()">
              <i id="hide1" class="fas fa-eye"></i>
              <i id="hide2" class="fas fa-eye-slash" style="display: none;"></i>
            </span>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success d-flex align-items-center justify-content-center"><label for="">Login</label></button>
        <label for="" class="account-quest d-flex justify-content-center">Not have any account?<a href="#" data-bs-toggle="modal" data-bs-target="#modal-register" class="ms-1">Register</a></label>
    </div>
    </form>
  </div>
  <?php
  if (isset($_POST["submit"])) {
    $username = $conn->conn->real_escape_string($_POST["user"]);
    $pass = md5($conn->conn->real_escape_string($_POST["pass"]));
    $login = $operasi->loginUser($username, $pass);

    if ($row = $login->fetch_object() != null) {
      $login = $operasi->loginUser($username, $pass);
      $data = $login->fetch_object();
      $_SESSION["login"] = true;
      $_SESSION["id_customer"] =  $data->id;
      echo "<script>window.location.href='Dashboard.php';</script>";
      exit;
    } else {
      echo "<script>alert('Username/Password Salah !!!');</script>";
    }
  }
  ?>
  <!-- Modal Register -->
  <div class="modal-register modal fade" id="modal-register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Register</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row my-2">
              <div class="col-12">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
              </div>
            </div>
            <div class="row my-2">
              <div class="col-12">
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required>
              </div>
            </div>
            <div class="row my-2">
              <div class="col-12">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
              </div>
            </div>
            <div class="row my-2">
              <div class="col-12">
                <input type="username" name="username" id="username" class="form-control" placeholder="Username" required>
              </div>
            </div>
            <div class="row my-2">
              <div class="col-12">
                <span class="position-absolute" style="margin: 1% 88%;" onclick="myRegister()">
                  <i class="fas fa-eye" id="eye1"></i>
                  <i class="fas fa-eye-slash" id="eye2" style="display: none;"></i>
                </span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="row my-2">
              <div class="col-12">
                <input type="number" name="telp" id="telp" class="form-control" placeholder="Telepon" required>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
        <?php
        if (isset($_POST["simpan"])) {
          $tambah = $operasi->tambahUser($_POST);
          if ($tambah) {
            echo "<script>alert('Registrasi Berhasil !')</script>";
            echo "<script>window.location.href='#Login';</script>";
          } else {
            echo "<script>alert('Registrasi Gagal !!!')</script>";
            echo "<script>window.location.href='#Login';</script>";
          }
        }
        ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- Tutup Modal Register -->

  <script src="js/bootstrap.min.js"></script>
  <script>
    function myFunction() {
      var x = document.getElementById("pass");
      var y = document.getElementById("hide1");
      var z = document.getElementById("hide2");

      if (x.type === 'password') {
        x.type = "text";
        y.style.display = "none";
        z.style.display = "inline-block";
      } else {
        x.type = "password";
        y.style.display = "inline-block";
        z.style.display = "none";
      }
    }

    function myRegister() {
      var x = document.getElementById("password");
      var y = document.getElementById("eye1");
      var z = document.getElementById("eye2");

      if (x.type === 'password') {
        x.type = "text";
        y.style.display = "none";
        z.style.display = "inline-block";
      } else {
        x.type = "password";
        y.style.display = "inline-block";
        z.style.display = "none";
      }
    }
  </script>
</body>

</html>