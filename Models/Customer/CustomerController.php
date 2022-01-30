<?php
class Customer
{

    public $database;

    public function __construct($conn)
    {
        $this->database = $conn;
    }

    //Function Tampil
    public function tampil($query)
    {
        $result = $this->database->conn->query($query);
        return $result;
    }

    // function Tambah Customer
    public function tambahUser($data)
    {
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $email = htmlspecialchars($data["email"]);
        $username = htmlspecialchars($data["username"]);
        $pass = md5(htmlspecialchars($data["password"]));
        $telp = htmlspecialchars($data["telp"]);

        $sql = "INSERT INTO customer VALUES ('', '$nama', '$alamat', '$email', '$username', '$pass', '$telp')";
        $this->database->conn->query($sql);
        return mysqli_affected_rows($this->database->conn);
    }

    //function Hapus Customer
    public function hapus($id)
    {
        $sql = "DELETE FROM customer WHERE id='$id'";
        $this->database->conn->query($sql);
        return mysqli_affected_rows($this->database->conn);
    }
}
