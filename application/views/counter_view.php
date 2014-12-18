            <!-- DATA TABLES -->
            <link href="<?=base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Counter
                        <small>Daftar Counter</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_url();?>index.php/pengaturan">Pengaturan</a></li>
                        <li class="active">Counter</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="pull-right box-tools">   
                                        <button class="btn btn-success" id="btn-tambah-counter"><i class="fa fa-plus">&nbsp;</i> Tambah Counter</button>                                                         
                                    </div>
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="table-counter" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>IP Address</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>IP Address</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section>

                <!-- Modal Tambah Counter -->
                <div class="modal fade" id="modal-tambah" tabindex="-999" role="dialog" aria-labelledby="btn-tambah-counter" aria-hidden="true">
                    <div class="modal-dialog" style="width: 350px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Tambah Counter</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-tambah">
                                    </span>
                                    <?php echo form_open('counter/tambahcounter', 'id="form-tambah"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Counter</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            &nbsp;<i class="fa fa-user"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="tambah-nama" name="tambah-nama" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>IP Address :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-laptop"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="tambah-ip" name="tambah-ip" data-inputmask="'alias': 'ip'" data-mask/>
                                                    </div><!-- /.input group -->
                                                </div>                         
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div><!-- /.box-body -->          
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button id="btn-simpan" type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Hapus Counter -->
                <div class="modal fade" id="modal-hapus" tabindex="-999" role="dialog" aria-labelledby="btn-hapus-counter" aria-hidden="true">
                    <div class="modal-dialog" style="width: 350px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Hapus Counter</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-hapus">
                                    </span>
                                    <?php echo form_open('counter/hapuscounter', 'id="form-hapus"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <input type="hidden" id="hapus-id" name="hapus-id" />
                                                    <p>Apakah Anda yakin ingin menghapus Counter berikut ?</p>
                                                    <div class="callout callout-info">
                                                        <p>Nama Counter : <span id="hapus-nama"> </span></p>
                                                        <p>IP Address : <span id="hapus-ip"> </span></p>
                                                    </div>
                                                       
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div><!-- /.box-body -->          
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button id="btn-hapus" type="button" class="btn btn-primary">Iya, Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Counter -->
                <div class="modal fade" id="modal-edit" tabindex="-999" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog" style="width: 350px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit Counter</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-edit">
                                    </span>
                                    <?php echo form_open('counter/editcounter', 'id="form-edit"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" id="edit-id" name="edit-id" />
                                                <input type="hidden" id="edit-tempnama" name="edit-tempnama" />
                                                <input type="hidden" id="edit-tempip" name="edit-tempip" />
                                                <div class="form-group">
                                                    <label>Nama Counter</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            &nbsp;<i class="fa fa-user"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="edit-nama" name="edit-nama" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>IP Address :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-laptop"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="edit-ip" name="edit-ip" data-inputmask="'alias': 'ip'" data-mask/>
                                                    </div><!-- /.input group -->
                                                </div>                                        
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div><!-- /.box-body -->          
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button id="btn-edit" type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                
                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?=base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/datatables/dataTables.reload.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="<?=base_url();?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            function modaledit(id, nama, ipaddress){
                // untuk edit, 1=edit, 2=hapus
                $('#form-pesan-edit').html('');
                $('#edit-id').val('');
                $('#edit-nama').val('');
                $('#edit-ip').val('');
                $('#modal-edit').modal('show');
                $('#edit-id').val(id);
                $('#edit-nama').val(nama);
                $('#edit-tempnama').val(nama);
                $('#edit-ip').val(ipaddress);
                $('#edit-tempip').val(ipaddress);
            }
            
            function modalhapus(id, nama, ipaddress){
                $('#form-pesan-hapus').html('');
                $('#hapus-id').val('');
                $('#hapus-nama').val('');
                $('#hapus-ip').val('');
                $('#modal-hapus').modal('show');
                $('#hapus-id').val(id);
                $('#hapus-nama').html(nama);
                $('#hapus-ip').html(ipaddress);
            }

            $(document).ready(function() {
                $("[data-mask]").inputmask();
                $('#modal-tambah').on('shown.bs.modal', function (e) {
                    $('#tambah-nama').focus();
                });
                
                $('#modal-hapus').on('shown.bs.modal', function (e) {
                    $('#btn-hapus').focus();
                });

                $('#modal-edit').on('shown.bs.modal', function (e) {
                    $('#edit-nama').focus();
                });

                $('#btn-tambah-counter').click(function(){
                    $('#form-pesan-tambah').html('');
                    $('#tambah-nama').val('');
                    $('#tambah-ip').val('');
                    $('#modal-tambah').modal('show');
                });

                $('#table-counter').dataTable({
                    "sPaginationType": "bootstrap",
                    "bProcessing": false,
                    "bServerSide": true,
                    "bJQueryUI": true,
                    "iDisplayLength":10,
                    "sAjaxSource": "<?=site_url()?>/counter/getcounter",
                    "aoColumns": [
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false,}
                    ],
                    
                });

                //$('div.dataTables_filter input').focus();

                //Tambah User
                $('#btn-simpan').click(function(){
                    $('#form-tambah').submit();
                    $('#btn-simpan').addClass('disabled');
                });
                $('#form-tambah').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/counter/tambahcounter",
                        type:"POST",
                        data:$('#form-tambah').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-tambah').html(pesan_succ('Data counter berhasil disimpan !'));
                                setTimeout(function(){$('#form-pesan-tambah').html('')}, 2000);
                                setTimeout(function(){$('#modal-tambah').modal('hide')}, 2500);
                                setTimeout(function(){ $('#table-counter').dataTable().fnReloadAjax() }, 2500);
                            }else{
                                $('#form-pesan-tambah').html(pesan_err(obj.error));
                                setTimeout(function(){$('#form-pesan-tambah').html('')}, 5000);
                            }

                            $('#btn-simpan').removeClass('disabled');
                        }
                    });
                    return false;
                });
                
                // Hapus counter
                $('#btn-hapus').click(function(){
                    $('#form-hapus').submit();
                    $('#btn-hapus').addClass('disabled');
                });
                $('#form-hapus').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/counter/hapuscounter",
                        type:"POST",
                        data:$('#form-hapus').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-hapus').html(pesan_succ('Data counter berhasil dihapus !'));
                                setTimeout(function(){$('#form-pesan-hapus').html('')}, 2000);
                                setTimeout(function(){$('#modal-hapus').modal('hide')}, 2500);
                                setTimeout(function(){ $('#table-counter').dataTable().fnReloadAjax() }, 2500);
                            }else{
                                $('#form-pesan-hapus').html(pesan_err(obj.error));
                                setTimeout(function(){$('#form-pesan-hapus').html('')}, 5000);
                            }

                            $('#btn-hapus').removeClass('disabled');
                        }
                    });
                    return false;
                });

                // Edit counter
                $('#btn-edit').click(function(){
                    $('#form-edit').submit();
                });
                /** 
                    $('#btn-hapus').click(function(){
                    $('#edit-tipe').val('2');
                    $('#form-edit').submit();
                });
                **/
                $('#form-edit').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/counter/editcounter",
                        type:"POST",
                        data:$('#form-edit').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-edit').html(pesan_succ('Data berhasil diupdate !'));
                                setTimeout(function(){$('#form-pesan-edit').html('')}, 2000);
                                setTimeout(function(){$('#modal-edit').modal('hide')}, 2500);
                                setTimeout(function(){ $('#table-counter').dataTable().fnReloadAjax() }, 2500);
                            }else{
                                $('#form-pesan-edit').html(pesan_err(obj.error));
                                setTimeout(function(){$('#form-pesan-edit').html('')}, 2000);
                            }
                        }
                    });
                    return false;
                });
             
            });
        </script>