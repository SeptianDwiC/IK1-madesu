<?php
class Produk
{

    public $database;

    function __construct($conn)
    {
        $this->database = $conn;
    }

    // function tampil Data
    public function tampil($query)
    {
        $result = $this->database->conn->query($query);
        return $result;
    }

    // function Upload Gambar
    public function uploadTambah()
    {
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        if ($error === 4) {
            echo "
            <script>
                alert('Pilih Gambar Terlebih Dahulu !!!');
            </script>
            ";
            return false;
        }

        $ekstensiValid = ['png', 'jpg', 'jpeg'];
        $ektensiFoto = explode(".", $namaFile);
        $ektensiFoto = strtolower(end($ektensiFoto));
        // Cek Gambar
        if (!in_array($ektensiFoto, $ekstensiValid)) {
            echo "
            <script>
                alert('File yang anda upload bukan gambar !!!');
            </script>
            ";
            return false;
        }
        // Cek Ukuran
        if ($ukuranFile > 1000000) {
            echo "
            <script>
                alert('Ukuran File terlalu besar !!!');
            </script>
            ";
            return false;
        }
        // Upload berhasil
        // Generate Nama Baru]
        $namaBaru = uniqid();
        $namaBaru .= '.';
        $namaBaru .= $ektensiFoto;
        move_uploaded_file($tmpName, '../img/tmp-img/' . $namaBaru);
        return $namaBaru;
    }

    // function Tambah Data
    public function tambahProduk($data)
    {
        $nm = htmlspecialchars($data["nm_prod"]);
        $jenis = htmlspecialchars($data["jenis"]);
        $des = htmlspecialchars($data["deskripsi"]);
        $kat = htmlspecialchars($data["kategori"]);
        $har = htmlspecialchars($data["harga"]);
        $stk_awal = htmlspecialchars($data["stok_awal"]);
        $stk_min = htmlspecialchars($data["stok_min"]);
        $stk_akhir = htmlspecialchars($data["stok_akhir"]);

        // Upload Gambar
        $foto = $this->uploadTambah();
        if (!$foto) {
            return false;
        }
        $kategori = "SELECT * FROM kategori WHERE nama_kategori='$kat'";
        $ambil = $this->database->conn->query($kategori);
        $kategori2 = $ambil->fetch_object();
        $id_kat = $kategori2->id_kategori;
        $sql = "INSERT INTO produk VALUES('', '$nm', '$jenis', '$des', '$id_kat', '$har', '$stk_awal', '$stk_min', '$stk_akhir', '$foto')";
        $this->database->conn->query($sql);
        return mysqli_affected_rows($this->database->conn);
    }

    public function ubahData($data)
    {
        $id_ubah = $data["id_ubah"];
        $nama = htmlspecialchars($data["nm_ubah"]);
        $jenis = htmlspecialchars($data["jenis_ubah"]);
        $des = htmlspecialchars($data["deskripsi_ubah"]);
        $kat = $data["kategori_ubah"];
        $harga = htmlspecialchars($data["harga_ubah"]);
        $stok_awal = htmlspecialchars($data["stokawal_ubah"]);
        $stok_min = htmlspecialchars($data["stokmin_ubah"]);
        $stok_akhir = htmlspecialchars($data["stokakhir_ubah"]);
        $namaBaru = $_FILES['foto_ubah']['name'];
        $sql_kat = "SELECT * FROM kategori WHERE nama_kategori='$kat'";
        $query_kat = $this->database->conn->query($sql_kat);
        $ambil_kat = $query_kat->fetch_object();
        $id_kat = $ambil_kat->id_kategori;
        if ($namaBaru == '') {
            $sql = "UPDATE produk SET nama='$nama', jenis='$jenis', deskripsi='$des', kategori='$id_kat', harga='$harga', stok_awal='$stok_awal', stok_min='$stok_min', stok_akhir='$stok_akhir' WHERE id='$id_ubah'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        } else {
            $ukuranFile = $_FILES['foto_ubah']['size'];
            $tmpName = $_FILES['foto_ubah']['tmp_name'];
            $ekstensiValid = ['png', 'jpg', 'jpeg'];
            $ektensiFoto = explode(".", $namaBaru);
            $ektensiFoto = strtolower(end($ektensiFoto));
            $sql_gambar = $this->database->conn->query("SELECT * FROM produk WHERE id='$id_ubah'");
            $namaLama = $sql_gambar->fetch_object()->gambar;

            if (!in_array($ektensiFoto, $ekstensiValid)) {
                echo "
                <script>
                    alert('File yang anda upload bukan gambar !!!');
                </script>
                ";
                return false;
            }
            // Cek Ukuran
            if ($ukuranFile > 1000000) {
                echo "
                <script>
                    alert('Ukuran File terlalu besar !!!');
                </script>
                ";
                return false;
            }
            // Upload berhasil
            // Generate Nama Baru]
            $namaBaru2 = uniqid();
            $namaBaru2 .= '.';
            $namaBaru2 .= $ektensiFoto;
            unlink("../img/tmp-img/" . $namaLama);
            move_uploaded_file($tmpName, '../img/tmp-img/' . $namaBaru2);
            $sql = "UPDATE produk SET nama='$nama', jenis='$jenis', deskripsi='$des', kategori='$id_kat', harga='$harga', stok_awal='$stok_awal', stok_min='$stok_min', stok_akhir='$stok_akhir', gambar='$namaBaru2' WHERE id='$id_ubah'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        }
    }

    public function hapus($id)
    {
        $gambar = "SELECT * FROM produk WHERE id='$id'";
        $query = $this->database->conn->query($gambar);
        $ambil = $query->fetch_object();
        $fileGambar = $ambil->gambar;
        $sql = "DELETE FROM produk WHERE id='$id'";
        $this->database->conn->query($sql);
        unlink("../img/tmp-img/" . $fileGambar);
        return mysqli_affected_rows($this->database->conn);
    }
}
