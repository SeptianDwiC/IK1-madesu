<?php
require '../Models/Produk/ProdukController.php';
$operasi = new Produk($conn);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">Data Produk</h3>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="#" class="tambah btn btn-outline-info ms-auto" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus mx-1"></i>Tambah</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Produk</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="text" name="nm_prod" id="nm_prod" class="form-control" placeholder="Nama Produk" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <select name="jenis" id="jenis" class="form-control">
                                                    <option value="" disabled selected>Pilih Jenis</option>
                                                    <option value="Pil">Pil</option>
                                                    <option value="Cair">Cair</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" cols="2" placeholder="Deskripsi" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <select name="kategori" id="kategori" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Kategori</option>
                                                    <?php
                                                    $kategori2 = $operasi->tampil("SELECT * FROM kategori");
                                                    while ($row2 = $kategori2->fetch_object()) {
                                                    ?>
                                                        <option value="<?php echo $row2->nama_kategori; ?>"><?php echo $row2->nama_kategori; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="number" name="stok_awal" id="stok_awal" class="form-control" placeholder="Stok Awal" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="number" name="stok_min" id="stok_min" class="form-control" placeholder="Stok Minimal" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="number" name="stok_akhir" id="stok_akhir" class="form-control" placeholder="Stok Akhir" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <input type="file" name="foto" id="foto" class="form-control" required>
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

                    <!-- Modal Ubah -->
                    <div class="modal fade" id="modal-ubah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data Produk</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <input type="hidden" name="id_ubah" id="id_ubah">
                                                <label for="nm_ubah" class="col-form-label">Nama Produk</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" name="nm_ubah" id="nm_ubah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="jenis_ubah" class="col-form-label">Jenis</label>
                                            </div>
                                            <div class="col-9">
                                                <select name="jenis_ubah" id="jenis_ubah" class="form-control">
                                                    <option value="" disabled selected>Pilih Jenis</option>
                                                    <option value="Pil">Pil</option>
                                                    <option value="Cair">Cair</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="deskripsi_ubah" class="col-form-label">Deskripsi</label>
                                            </div>
                                            <div class="col-9">
                                                <textarea name="deskripsi_ubah" id="deskripsi_ubah" class="form-control" cols="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="kategori_ubah" class="col-form-label">Kategori</label>
                                            </div>
                                            <div class="col-9">
                                                <select name="kategori_ubah" id="kategori_ubah" class="form-control">
                                                    <option value="" disabled selected>Pilih Kategori</option>
                                                    <?php
                                                    $kategori2 = $operasi->tampil("SELECT * FROM kategori");
                                                    while ($row2 = $kategori2->fetch_object()) {
                                                    ?>
                                                        <option value="<?php echo $row2->nama_kategori; ?>"><?php echo $row2->nama_kategori; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="harga_ubah" class="col-form-label">Harga</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="number" name="harga_ubah" id="harga_ubah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="stokawal_ubah" class="col-form-label">Stok Awal</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="number" name="stokawal_ubah" id="stokawal_ubah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="stokmin_ubah" class="col-form-label">Stok</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="number" name="stokmin_ubah" id="stokmin_ubah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="stokakhir_ubah" class="col-form-label">Stok</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="number" name="stokakhir_ubah" id="stokakhir_ubah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-3">
                                                <label for="foto" class="col-form-label">Foto Produk</label>
                                            </div>
                                            <div class="col-9">
                                                <input type="file" name="foto_ubah" id="foto_ubah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <img src="" alt="" class="gambar_ubah" id="gambar_ubah" style="width: 20%; height: 20%;">
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
                                        <h4 class="modal-title">Hapus Produk</h4>
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
                                    <th class="text-center">Jenis</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Stok Awal</th>
                                    <th class="text-center">Stok Min</th>
                                    <th class="text-center">Stok Akhir</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            // Proses Tambah
                            if (isset($_POST["simpan"])) {
                                if ($operasi->tambahProduk($_POST) > 0) {
                                    echo "
                                        <script>
                                            alert('Data Produk Berhasil Ditambahkan !');
                                        </script>
                                        ";
                                } else {
                                    echo "
                                        <script>
                                            alert('Data Produk Gagal Ditambahkan !!!');
                                        </script>
                                        ";
                                }
                            }
                            // Proses Ubah
                            if (isset($_POST["ubah_produk"])) {
                                if ($operasi->ubahData($_POST) > 0) {
                                    echo "<script>alert('Data Berhasil Update !')</script>";
                                } else {
                                    echo "<script>alert('Data Gagal Update !!!')</script>";
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
                            ?>
                            <tbody>
                                <?php
                                $no = 1;
                                $result = $operasi->tampil("SELECT * FROM produk");
                                while ($row = $result->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->jenis; ?></td>
                                        <td><?php echo $row->deskripsi; ?></td>
                                        <td>
                                            <?php
                                            $id = $row->kategori;
                                            $kategori = $operasi->tampil("SELECT * FROM kategori LEFT JOIN produk ON kategori.nama_kategori = produk.kategori WHERE id_kategori='$id'");
                                            $ambil_kat = $kategori->fetch_object();
                                            echo $ambil_kat->nama_kategori;
                                            ?>
                                        </td>
                                        <td><?php echo $row->harga; ?></td>
                                        <td><?php echo $row->stok_awal; ?></td>
                                        <td><?php echo $row->stok_min; ?></td>
                                        <td><?php echo $row->stok_akhir; ?></td>
                                        <td class="d-flex justify-content-center"><img src="../img/tmp-img/<?php echo $row->gambar; ?>" style="width: 50%; height:50%;" alt=""></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary" id="ubah" data-toggle="modal" data-target="#modal-ubah" data-id_prod="<?php echo $row->id; ?>" data-nm="<?php echo $row->nama; ?>" data-jenis="<?php echo $row->jenis; ?>" data-des="<?php echo $row->deskripsi; ?>" data-kat="<?php echo $ambil_kat->nama_kategori; ?>" data-har="<?php echo $row->harga; ?>" data-stkawal="<?php echo $row->stok_awal; ?>" data-stkmin="<?php echo $row->stok_min; ?>" data-stkakhir="<?php echo $row->stok_akhir; ?>" data-gbr="<?php echo $row->gambar; ?>"><i class="fa fa-pencil-alt"><span class="mx-1">Ubah</span></i></a>
                                            <a href="#" class="btn btn-danger mt-2" id="hapus" data-id="<?php echo $row->id; ?>" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-trash-alt"><span class="mx-1">Hapus</span></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
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
    $(document).on('click', '#ubah', function() {
        var id = $(this).data('id_prod');
        var nm = $(this).data('nm');
        var jenis = $(this).data('jenis');
        var deskrip = $(this).data('des');
        var kategori = $(this).data('kat');
        var harga = $(this).data('har');
        var stokawal = $(this).data('stkawal');
        var stokmin = $(this).data('stkmin');
        var stokakhir = $(this).data('stkakhir');
        var gbr = $(this).data('gbr');

        $('#modal-ubah #id_ubah').val(id);
        $('#modal-ubah #nm_ubah').val(nm);
        $('#modal-ubah #jenis_ubah').val(jenis);
        $('#modal-ubah #deskripsi_ubah').val(deskrip);
        $('#modal-ubah #kategori_ubah').val(kategori);
        $('#modal-ubah #harga_ubah').val(harga);
        $('#modal-ubah #stokawal_ubah').val(stokawal);
        $('#modal-ubah #stokmin_ubah').val(stokmin);
        $('#modal-ubah #stokakhir_ubah').val(stokakhir);
        $('#modal-ubah #gambar_ubah').attr("src", "../img/tmp-img/" + gbr);
    });

    $(document).on('click', '#hapus', function() {
        var id = $(this).data('id');
        $('#modal-hapus #id').val(id);
    });
</script>