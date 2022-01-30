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
                                <h3 class="card-title">Data Home Page</h3>
                            </div>
                        </div>
                    </div>

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
                                        <div class="col-6">
                                            <input type="hidden" name="id_ubah" id="id_ubah">
                                            <label for="judul" class="col-form-label">Judul</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="judul" id="judul" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">
                                            <label for="subjudul" class="col-form-label">SubJudul</label>
                                        </div>
                                        <div class="col-6">
                                            <textarea name="subjudul" id="subjudul" class="form-control" cols="2" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">
                                            <label for="keterangan" class="col-form-label">Keterangan</label>
                                        </div>
                                        <div class="col-6">
                                            <textarea name="keterangan" id="keterangan" class="form-control" cols="2" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">
                                            <label for="gambar" class="col-form-label">Gambar Icon</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="gambar" id="gambar" class="form-control">
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
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Subjudul</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Gambar Icon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                                if(isset($_POST["ubah_produk"])) {
                                    $update = $operasi->ubahHome($_POST);
                                    if($update) {
                                        echo "<script>alert('Data Berhasil Update !')</script>";
                                    }
                                    else{
                                        echo "<script>alert('Data Gagal Update !!!')</script>";
                                    }
                                }
                                $result = $operasi->tampil("SELECT * FROM home");
                                while($row = $result->fetch_object()) {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row->judul; ?></td>
                                    <td><?php echo $row->subjudul; ?></td>
                                    <td><?php echo $row->keterangan; ?></td>
                                    <td class="d-flex justify-content-center"><img src="../img/tmp-home/<?php echo $row->gambar; ?>" style="width: 50%; height:50%;" alt=""></td>
                                    <td style="vertical-align: middle;">
                                        <a href="#" class="btn btn-primary" id="ubah" data-toggle="modal" data-target="#modal-ubah" data-id="<?php echo $row->id;?>" data-jud="<?php echo $row->judul;?>" data-subjud="<?php echo $row->subjudul;?>" data-ket="<?php echo $row->keterangan;?>" data-gbr="<?php echo $row->gambar;?>"><i class="fa fa-pencil-alt"><span class="mx-1">Ubah</span></i></a>
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
    $(document).on('click', '#ubah', function(){
            var id = $(this).data('id');
            var jud = $(this).data('jud');
            var subjud = $(this).data('subjud');
            var ket = $(this).data('ket');
            var gbr = $(this).data('gbr');

            $('#modal-ubah #id_ubah').val(id);
            $('#modal-ubah #judul').val(jud);
            $('#modal-ubah #subjudul').val(subjud);
            $('#modal-ubah #keterangan').val(ket);
            $('#modal-ubah #gambar_ubah').attr("src","../img/tmp-home/" + gbr);
    });
</script>