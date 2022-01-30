<?php
require '../Models/Customer/CustomerController.php';
$operasi = new Customer($conn);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">Data Customer</h3>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="#" class="tambah btn btn-outline-info ms-auto" data-toggle="modal" data-target="#modal-customer"><i class="fa fa-plus mx-1"></i>Tambah</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modal-customer">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Customer</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
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
                                                <textarea name="alamat" id="alamat" class="form-control" cols="2" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <span class="position-absolute" style="margin: 1% 90%; cursor: pointer;" onclick="myRegister()">
                                                    <i class="fas fa-eye" id="eye1"></i>
                                                    <i class="fas fa-eye-slash" id="eye2" style="display: none;"></i>
                                                </span>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="number" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="telp" id="telp" class="form-control" placeholder="Telepon" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- Tutup Modal Tambah -->

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modal-hapus">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Customer</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id">
                                        <p>Yakin Ingin Dihapus ?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- Tutup Modal Hapus -->

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">E-Mail</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Telepon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            // Proses Tambah
                            if (isset($_POST["simpan"])) {
                                if ($operasi->tambahUser($_POST) > 0) {
                                    echo "
                                        <script>
                                            alert('Data Customer Berhasil Ditambahkan !');
                                        </script>
                                        ";
                                } else {
                                    echo "
                                        <script>
                                            alert('Data Customer Gagal Ditambahkan !!!');
                                        </script>
                                        ";
                                }
                            }
                            // Proses Hapus
                            if (isset($_POST['delete'])) {
                                $id = $_POST['id'];
                                $hapus = $operasi->hapus($id);
                                if ($hapus > 0) {
                                    echo "<script> alert('Data Berhasil Dihapus !'); </script>";
                                } else {
                                    echo "<script> alert('Data Gagal Dihapus !!!'); </script>";
                                }
                            }
                            $no = 1;
                            $result = $operasi->tampil("SELECT * FROM customer");
                            while ($row = $result->fetch_object()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->alamat; ?></td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->username; ?></td>
                                        <td><?php echo $row->telepon; ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-danger mt-2" id="hapus" data-toggle="modal" data-target="#modal-hapus" data-id="<?php echo $row->id; ?>"><i class="fa fa-trash-alt"><span class="mx-1">Hapus</span></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- jQuery -->
<script src="Asset/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '#hapus', function() {
        var id = $(this).data('id');
        $('#modal-hapus #id').val(id);
    });

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