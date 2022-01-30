<div class="content">
    <?php
    require '../Models/Transaksi/TransaksiController.php';
    $operasi = new Transaksi($conn);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">Data Transaksi</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah -->
                    <!-- <div class="modal fade" id="modal-customer">
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
                        </div>
                    </div> -->
                    <!-- Tutup Modal Tambah -->

                    <!-- Modal Ubah -->
                    <div class="modal fade" id="modal-ubah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="customer">Customer</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="hidden" name="id_ubah" id="id_ubah">
                                                <input type="text" name="customer" id="customer" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="tgl">Tanggal</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="date" name="tgl" id="tgl" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="total_ubah">Total Harga</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="number" name="total_ubah" id="total_ubah" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="ubah_produk" id="ubah_produk">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- Tutup Modal Ubah -->

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
                                        <button type="submit" name="delete" id="delete" class="btn btn-danger">Hapus</button>
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
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            // Proses Tambah
                            // if (isset($_POST["simpan"])) {
                            //     if ($operasi->tambahUser($_POST) > 0) {
                            //         echo "
                            //             <script>
                            //                 alert('Data Customer Berhasil Ditambahkan !');
                            //             </script>
                            //             ";
                            //     } else {
                            //         echo "
                            //             <script>
                            //                 alert('Data Customer Gagal Ditambahkan !!!');
                            //             </script>
                            //             ";
                            //     }
                            // }

                            //Proses Ubah 
                            if (isset($_POST["ubah_produk"])) {
                                if ($operasi->ubahData($_POST) > 0) {
                                    echo "<script> alert('Data Berhasil Diupdate !'); </script>";
                                } else {
                                    echo "<script> alert('Data Gagal Diupdate !!!'); </script>";
                                }
                            }
                            // Proses Hapus
                            if (isset($_POST["delete"])) {
                                $id = $_POST["id"];
                                $hapus = $operasi->hapus($id);
                                if ($hapus > 0) {
                                    echo "<script> alert('Data Berhasil Dihapus !'); </script>";
                                } else {
                                    echo "<script> alert('Data Gagal Dihapus !!!'); </script>";
                                }
                            }
                            $no = 1;
                            $result = $operasi->tampil("SELECT * FROM transaksi");
                            while ($row = $result->fetch_object()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <?php
                                            $id = $row->customer_id;
                                            $sql = $operasi->tampil("SELECT * FROM customer WHERE id='$id'");
                                            $ambil = $sql->fetch_object()->nama;
                                            echo $ambil;
                                            ?>
                                        </td>
                                        <td><?php echo $row->tgl_trans; ?></td>
                                        <td><?php echo $row->total_harga; ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary mt-2" id="ubah" data-toggle="modal" data-target="#modal-ubah" data-id_trans="<?php echo $row->nota; ?>" data-cust="<?php echo $ambil; ?>" data-tgl="<?php echo $row->tgl_trans; ?>" data-total="<?php echo $row->total_harga; ?>"><i class="fa fa-pencil-alt"><span class="mx-1">Edit</span></i></a>
                                            <a href="#" class="btn btn-danger mt-2" id="hapus" data-toggle="modal" data-target="#modal-hapus" data-id="<?php echo $row->nota; ?>"><i class="fa fa-trash-alt"><span class="mx-1">Hapus</span></i></a>
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

    $(document).on('click', '#ubah', function() {
        var id = $(this).data('id_trans');
        var cust = $(this).data('cust');
        var tgl = $(this).data('tgl');
        var total = $(this).data('total');

        $('#modal-ubah #id_ubah').val(id);
        $('#modal-ubah #customer').val(cust);
        $('#modal-ubah #tgl').val(tgl);
        $('#modal-ubah #total_ubah').val(total);
    });
</script>