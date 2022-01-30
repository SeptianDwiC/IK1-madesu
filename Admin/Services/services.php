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
                                <h3 class="card-title">Data Services</h3>
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
                                            <label for="icon" class="col-form-label">Icon Services</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 d-flex justify-content-center align-items-center">
                                            <input type="file" name="icon" id="icon" class="form-control">
                                        </div>
                                        <div class="col-4 d-flex justify-content-center align-items-center">
                                            <img src="" alt="" id="gambar" style="width: 70%; height: 70%;">
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
                    
                    <?php
                        if(isset($_POST["ubah_produk"])) {
                            $id = $_POST["id_ubah"];
                            $judul = $conn->conn->real_escape_string($_POST["judul"]);
                            $icon = $_FILES["icon"]["name"];
                            $update = $operasi->ubahServices($id, $judul, $icon);
                            if($update) {
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table id="example2" class="table table-bordered table-hover">
                                <tr>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Icon Judul</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                <?php
                                    $query2 = $operasi->tampil("SELECT * FROM services");
                                    while($row2 = $query2->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $row2->judul; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><img src="../img/tmp-about/<?php echo $row2->gambar; ?>" alt="" style="width: 30%; height: 30%;"></td>                                 
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="#" class="btn btn-primary" id="ubah" data-toggle="modal" data-target="#modal-ubah" data-id="<?php echo $row2->id;?>" data-jud="<?php echo $row2->judul;?>" data-gbr="<?php echo $row2->gambar;?>"><i class="fa fa-pencil-alt"><span class="mx-1">Ubah</span></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
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
    $(document).on('click', '#ubah', function(){
            var id = $(this).data('id');
            var jud = $(this).data('jud');
            var gbr = $(this).data('gbr');

            $('#modal-ubah #id_ubah').val(id);
            $('#modal-ubah #judul').val(jud);
            $('#modal-ubah #gambar').attr("src","../img/tmp-about/" + gbr);
    });
</script>