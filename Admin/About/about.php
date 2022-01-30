<?php
    require '../Models/functions.php';
    $operasi = new operation($conn);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="card-title">Data About Page</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Ubah1 -->
                    <div class="modal fade" id="modal-ubah1">
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
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="id_ubah" id="id_ubah">
                                            <label for="judul" class="col-form-label">Judul</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" name="judul" id="judul" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="misi" class="col-form-label">Misi</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="misi" id="misi" class="form-control" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="visi" class="col-form-label">Visi</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="visi" id="visi" class="form-control" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="foto" class="col-form-label">Icon</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="file" name="foto" id="foto" class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <img src="" alt="" class="gambar" id="gambar" style="width: 50%; height: 50%;">
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
                    <!-- Tutup Modal Ubah1 -->
                    
                    <?php
                        if(isset($_POST["ubah_produk"])) {
                            $id = $_POST["id_ubah"];
                            $judul = $conn->conn->real_escape_string($_POST["judul"]);
                            $deskripsi = $conn->conn->real_escape_string($_POST["deskripsi"]);
                            $misi = $conn->conn->real_escape_string($_POST["misi"]);
                            $visi = $conn->conn->real_escape_string($_POST["visi"]);
                            $foto = $_FILES["foto"]["name"];
                            $ubah = $operasi->ubahAbout($id, $judul, $deskripsi, $misi, $visi, $foto);
                            if($ubah) {
                                echo "<script>alert('Data Berhasil Update !')</script>";
                            }
                            else{
                                echo "<script>alert('Data Gagal Update !!!')</script>";
                            }
                        }
                    ?>

                    <!-- /.card-header -->
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                            $query = $operasi->tampil("SELECT * FROM about");
                            $row = $query->fetch_object();
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table id="example2" class="table table-bordered table-hover">
                                <tr>
                                    <th class="text-center">Judul</thc>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Misi</th>
                                    <th class="text-center">Visi</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                <tr>
                                    <td><?= $row->judul; ?></td>
                                    <td><?= $row->deskripsi; ?></td>
                                    <td><?= $row->misi; ?></td>
                                    <td><?= $row->visi; ?></td>
                                    <td class="d-flex justify-content-center"><img src="../img/tmp-about/<?= $row->gambar; ?>" alt="" style="width:50%;height:50%;"></td>
                                    <td style="vertical-align: middle;">
                                        <a href="#" class="btn btn-primary" id="ubah1" data-toggle="modal" data-target="#modal-ubah1" data-id="<?php echo $row->id;?>" data-jud="<?php echo $row->judul;?>" data-des="<?php echo $row->deskripsi;?>" data-misi="<?php echo $row->misi;?>" data-visi="<?php echo $row->visi;?>" data-gbr="<?php echo $row->gambar;?>"><i class="fa fa-pencil-alt"><span class="mx-1">Ubah</span></i></a>
                                    </td>
                                </tr>
                            </table>
                        </form>
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
    $(document).on('click', '#ubah1', function(){
            var id = $(this).data('id');
            var jud = $(this).data('jud');
            var des = $(this).data('des');
            var misi = $(this).data('misi');
            var visi = $(this).data('visi');
            var gbr = $(this).data('gbr');

            $('#modal-ubah1 #id_ubah').val(id);
            $('#modal-ubah1 #judul').val(jud);
            $('#modal-ubah1 #deskripsi').val(des);
            $('#modal-ubah1 #misi').val(misi);
            $('#modal-ubah1 #visi').val(visi);
            $('#modal-ubah1 #gambar').attr("src","../img/tmp-about/" + gbr);
    });
</script>