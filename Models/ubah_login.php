<?php
require 'database.php';
require 'functions.php';
$conn = new database();
$operasi = new operation($conn);

    $id = $_POST["id_ubah"];
    $icon = $_FILES["icon"]["name"];
    $ukuranFile = $_FILES["icon"]['size'];
    $tmpName = $_FILES["icon"]['tmp_name'];
    $ekstensiValid = ['png', 'jpg', 'jpeg', 'svg'];
    $ektensiFoto = explode(".", $icon);
    $ektensiFoto = strtolower(end($ektensiFoto));
    $sql_gambar = $conn->conn->query("SELECT * FROM login WHERE id='$id'");
    $namaLama = $sql_gambar->fetch_object()->icon;

    // Cek Extensi
    if(!in_array($ektensiFoto, $ekstensiValid)) {
        echo "
        <script>
            alert('File yang anda upload bukan gambar !!!');
            window.location = '?page=login';
        </script>
        ";
    }

    // Cek Ukuran
    if($ukuranFile > 1000000) {
        echo "
        <script>
            alert('Ukuran File terlalu besar !!!');
            window.location = '?page=login';
        </script>
        ";
    }
    // Upload berhasil
    // Generate Nama Baru
    $namaBaru2 = uniqid();
    $namaBaru2 .= '.';
    $namaBaru2 .= $ektensiFoto;
    move_uploaded_file($tmpName,'../img/tmp-login/'.$namaBaru2);
    unlink("../img/tmp-login/".$namaLama);
    $sql = "UPDATE login SET icon='$namaBaru2' WHERE id='$id'";
    $conn->conn->query($sql);
    echo "
    <script>
        alert('Gambar Telah Diupload !');
        window.location = '?page=login';
    </script>
    ";
?>