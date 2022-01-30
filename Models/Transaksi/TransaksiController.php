<?php
class Transaksi
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

    // function Tambah Data
    public function tambahTrans($id_customer, $tgl, $totalharga)
    {
        $sql = "INSERT INTO transaksi VALUES ('', '$id_customer', '$tgl', '$totalharga')";
        $result = $this->database->conn->query($sql);
        return $result;
    }

    // function Ubah Data
    public function ubahData($data)
    {
        $id_ubah = $data["id_ubah"];
        $tgl = $data["tgl"];
        $sql = "UPDATE transaksi SET tgl_trans='$tgl' WHERE nota='$id_ubah'";
        $this->database->conn->query($sql);
        return mysqli_affected_rows($this->database->conn);
    }

    public function hapus($id)
    {
        $hapus_detail = "DELETE FROM detail_trans WHERE nota='$id'";
        $hapus_trans = "DELETE FROM transaksi WHERE nota='$id'";
        $this->database->conn->query($hapus_detail);
        $this->database->conn->query($hapus_trans);
        return mysqli_affected_rows($this->database->conn);
    }
}
