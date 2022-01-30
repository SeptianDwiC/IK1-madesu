<?php
class Detail
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

    // function Ubah Data
    public function ubahData($data)
    {
        $id_ubah = $data["id_ubah"];
        $nota = $data["nota"];
        $produk = $data["produk"];
        $qty = $data["qty"];
        $subtotal = $data["subtotal"];
        $sql = "UPDATE detail_trans SET nota='$nota', produk_id='$produk', qty='$qty' WHERE id='$id_ubah'";
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
