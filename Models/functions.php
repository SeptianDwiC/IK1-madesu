<?php
class operation
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

    // function login
    public function loginAdmin($user, $pass)
    {
        $sql = "SELECT * FROM admin WHERE username='$user' AND pass='$pass'";
        $result = $this->database->conn->query($sql);
        return $result;
    }
    public function loginUser($user, $pass)
    {
        $sql = "SELECT * FROM customer WHERE username='$user' AND pass='$pass'";
        $result = $this->database->conn->query($sql);
        return $result;
    }

    public function ubahHome($data)
    {
        $id_ubah = $data["id_ubah"];
        $jud = htmlspecialchars($data["judul"]);
        $subjud = htmlspecialchars($data["subjudul"]);
        $ket = htmlspecialchars($data["keterangan"]);
        $namaBaru = $_FILES["gambar"]["name"];
        if ($namaBaru == '') {
            $sql = "UPDATE home SET judul='$jud', subjudul='$subjud', keterangan='$ket' WHERE id='$id_ubah'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        } else {
            $ukuranFile = $_FILES["gambar"]['size'];
            $tmpName = $_FILES["gambar"]['tmp_name'];
            $ekstensiValid = ['png', 'jpg', 'jpeg'];
            $ektensiFoto = explode(".", $namaBaru);
            $ektensiFoto = strtolower(end($ektensiFoto));
            $sql_gambar = $this->database->conn->query("SELECT * FROM home WHERE id='$id_ubah'");
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
            move_uploaded_file($tmpName, '../img/tmp-home/' . $namaBaru);
            unlink("../img/tmp-home/" . $namaLama);
            $sql = "UPDATE home SET judul='$jud', subjudul='$subjud', keterangan='$ket', gambar='$namaBaru' WHERE id='$id_ubah'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        }
    }
    public function ubahAbout($id, $jud, $des, $misi, $visi, $foto)
    {
        if ($foto == '') {
            $sql = "UPDATE about SET judul='$jud', deskripsi='$des', misi='$misi', visi='$visi' WHERE id='$id'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        } else {
            $ukuranFile = $_FILES["foto"]['size'];
            $tmpName = $_FILES["foto"]['tmp_name'];
            $ekstensiValid = ['png', 'jpg', 'jpeg', 'svg'];
            $ektensiFoto = explode(".", $foto);
            $ektensiFoto = strtolower(end($ektensiFoto));
            $sql_gambar = $this->database->conn->query("SELECT * FROM about WHERE id='$id'");
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
            move_uploaded_file($tmpName, '../img/tmp-about/' . $foto);
            unlink("../img/tmp-about/" . $namaLama);
            $sql = "UPDATE about SET judul='$jud', deskripsi='$des', misi='$misi', visi='$visi', gambar='$foto' WHERE id='$id'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        }
    }
    public function ubahServices($id, $jud, $icon)
    {
        if ($icon == '') {
            $sql = "UPDATE services SET judul='$jud' WHERE id='$id'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        } else {
            $ukuranFile = $_FILES["icon"]['size'];
            $tmpName = $_FILES["icon"]['tmp_name'];
            $ekstensiValid = ['png', 'jpg', 'jpeg', 'svg'];
            $ektensiFoto = explode(".", $icon);
            $ektensiFoto = strtolower(end($ektensiFoto));
            $sql_gambar = $this->database->conn->query("SELECT * FROM services WHERE id='$id'");
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
            move_uploaded_file($tmpName, '../img/tmp-about/' . $icon);
            unlink("../img/tmp-about/" . $namaLama);
            $sql = "UPDATE services SET judul='$jud', gambar='$icon' WHERE id='$id'";
            $this->database->conn->query($sql);
            return mysqli_affected_rows($this->database->conn);
        }
    }
}
