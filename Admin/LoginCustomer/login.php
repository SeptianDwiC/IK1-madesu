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
                                <h3 class="card-title">Data Login Page</h3>
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
                                <form action="" id="form" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="icon" id="judul"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="id_ubah" id="id_ubah">
                                            <input type="file" name="icon" id="icon" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <img src="" alt="" id="gbr" style="width: 30%; height: 90%;">
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

                    <!-- /.card-header -->
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table id="example2" class="table table-bordered table-hover">
                                <tr>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Icon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                <?php
                                    $query2 = $operasi->tampil("SELECT * FROM login");
                                    while($row2 = $query2->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?= $row2->judul; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><img src="../img/tmp-login/<?php echo $row2->icon; ?>" alt="" style="width: 10%; height: 10%;"></td>                                 
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="#" class="btn btn-primary" id="ubah" data-toggle="modal" data-target="#modal-ubah" data-id="<?php echo $row2->id;?>" data-jud="<?php echo $row2->judul;?>" data-icon="<?php echo $row2->icon;?>"><i class="fa fa-pencil-alt"><span class="mx-1">Ubah</span></i></a>
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
            var icon = $(this).data('icon');

            $('#modal-ubah #id_ubah').val(id);
            $('#modal-ubah #judul').text(jud);
            $('#modal-ubah #gbr').attr("src","../img/tmp-login/" + icon);
    });
    
    $(document).ready(function(e){
        $('#form').on('submit', (function(e){
            e.preventDefault();
            $.ajax({
                url:'../Models/ubah_login.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(pesan){
                    $('.table').html(pesan);
                }
            })
        })
        )
    });
</script>