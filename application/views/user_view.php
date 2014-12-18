            <!-- DATA TABLES -->
            <link href="<?=base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        User
                        <small>Daftar User</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_url();?>index.php/pengaturan">Pengaturan</a></li>
                        <li class="active">User</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="pull-right box-tools">   
                                        <button class="btn btn-success" id="btn-tambah-user"><i class="fa fa-plus">&nbsp;</i> Tambah User</button>                                                         
                                    </div>
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="table-user" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Dibuat</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Dibuat</th>
                                                <th>Role</th>
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

                <!-- Modal Tambah User -->
                <div class="modal fade" id="modal-tambah" tabindex="-999" role="dialog" aria-labelledby="btn-tambah-user" aria-hidden="true">
                    <div class="modal-dialog" style="width: 700px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Tambah User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-tambah">
                                    </span>
                                    <?php echo form_open('user/tambahuser', 'id="form-tambah"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="tambah-username" name="tambah-username" placeholder="Username min. 3 Karakter" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-font"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="tambah-nama" name="tambah-nama" placeholder="Nama user" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Role :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-gear"></i>
                                                        </div>
                                                        <select class="form-control" id="tambah-role" name="tambah-role">
                                                            <?php foreach ($opsirole->result() as $key ) { ?>
                                                                <option value="<?=$key->role_id;?>"><?=$key->role_name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                        
                                                    </div><!-- /.input group -->
                                                </div>                         
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                        <input type="password" class="form-control" id="tambah-pass" name="tambah-pass" placeholder="Password Min. 5 Karakter" />
                                                    </div><!-- /.input group -->
                                                    
                                                    <br>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                        <input type="password" class="form-control" id="tambah-passconf" name="tambah-passconf" placeholder="Konfirmasi Password" />
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
                
                <!-- Modal Hapus User -->
                <div class="modal fade" id="modal-hapus" tabindex="-999" role="dialog" aria-labelledby="btn-hapus-user" aria-hidden="true">
                    <div class="modal-dialog" style="width: 350px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Hapus User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-hapus">
                                    </span>
                                    <?php echo form_open('user/hapususer', 'id="form-hapus"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <input type="hidden" id="hapus-id" name="hapus-id" />
                                                    <p>Apakah Anda yakin ingin menghapus User berikut ?</p>
                                                    <div class="callout callout-info">
                                                        <p>Username : <span id="hapus-username"> </span></p>
                                                        <p>Role : <span id="hapus-role"> </span></p>
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

                <!-- Modal Edit User -->
                <div class="modal fade" id="modal-edit" tabindex="-999" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog" style="width: 700px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-edit">
                                    </span>
                                    <?php echo form_open('user/edituser', 'id="form-edit"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" id="edit-id" name="edit-id" />
                                                <div class="form-group">
                                                    <label>Username :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="edit-username" name="edit-username" placeholder="Username min. 3 Karakter" readonly="" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-font"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="edit-nama" name="edit-nama" placeholder="Nama user" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Role :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-gear"></i>
                                                        </div>
                                                        <select class="form-control" id="edit-role" name="edit-role">
                                                            <?php foreach ($opsirole->result() as $key ) { ?>
                                                                <option value="<?=$key->role_id;?>"><?=$key->role_name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                        
                                                    </div><!-- /.input group -->
                                                </div>                         
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Dibuat :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="edit-tgl" name="edit-tgl" readonly="" />
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
                </div> <!-- /.modal-edit -->
                
                <!-- Modal Password -->
                <div class="modal fade" id="modal-password" tabindex="-999" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog" style="width: 350px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Ganti Password</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-password">
                                    </span>
                                    <?php echo form_open('user/gantipassword', 'id="form-password"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Username :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <input type="text" id="pass-name" name="pass-name" readonly="" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Password Lama :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                        <input type="hidden" id="pass-id" name="pass-id" />
                                                        <input type="password" class="form-control" id="pass-lama" name="pass-lama" placeholder="Password Lama Anda" />
                                                    </div><!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Password Baru :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                        <input type="password" class="form-control" id="pass-baru" name="pass-baru" placeholder="Password Baru" />
                                                    </div><!-- /.input group -->
                                                    <br>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                        <input type="password" class="form-control" id="pass-conf" name="pass-conf" placeholder="Konfirmasi Password Baru" />
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
                                <button id="btn-simpanpass" type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.modal-password-->
                
                
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
            function modaledit(id, username, nama, role, tgl){
                $('#form-pesan-edit').html('');
                $('#edit-id').val('');
                $('#edit-username').val('');
                $('#edit-nama').val('');
                $('#edit-role').val('');
                $('#edit-tgl').val('');
                $('#modal-edit').modal('show');
                $('#edit-id').val(id);
                $('#edit-username').val(username);
                $('#edit-nama').val(nama);
                //$('#edit-role').val(role);
                $("#edit-role option").filter(function(){
                    return ( ($(this).val() == role) || ($(this).text() == role) );
                }).prop('selected', true);
                $('#edit-tgl').val(tgl);
            }
            
            function modalhapus(id, username, role){
                $('#form-pesan-hapus').html('');
                $('#hapus-id').val('');
                $('#hapus-username').val('');
                $('#hapus-role').val('');
                $('#modal-hapus').modal('show');
                $('#hapus-id').val(id);
                $('#hapus-username').html(username);
                $('#hapus-role').html(role);
            }
            
            function modalpassword(id, username){
                $('#form-pesan-password').html('');
                $('#pass-id').val('');
                $('#pass-name').val('');
                $('#pass-lama').val('');
                $('#pass-baru').val('');
                $('#pass-conf').val('');
                $('#modal-password').modal('show');
                $('#pass-id').val(id);
                $('#pass-name').val(username);
                
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
                
                $('#modal-password').on('shown.bs.modal', function (e) {
                    $('#pass-lama').focus();
                });

                $('#btn-tambah-user').click(function(){
                    $('#form-pesan-tambah').html('');
                    $('#modal-tambah').modal('show');
                });

                $('#table-user').dataTable({
                    "sPaginationType": "bootstrap",
                    "bProcessing": false,
                    "bServerSide": true,
                    "bJQueryUI": true,
                    "iDisplayLength":10,
                    "sAjaxSource": "<?=site_url()?>/user/getuser",
                    "aoColumns": [
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false},
                            {"bSearchable": false, "bSortable": false}
                    ],
                    
                });

                //$('div.dataTables_filter input').focus();

                // Edit password
                $('#btn-simpanpass').click(function(){
                    $('#form-password').submit();
                });

                $('#form-password').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/user/gantipassword",
                        type:"POST",
                        data:$('#form-password').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-password').html(pesan_succ('Password berhasil diganti !'));
                                setTimeout(function(){$('#form-pesan-password').html('')}, 2000);
                                setTimeout(function(){$('#modal-password').modal('hide')}, 2500);
                            }else{
                                $('#form-pesan-password').html(pesan_err(obj.error));
                                setTimeout(function(){$('#form-pesan-password').html('')}, 3000);
                            }
                        }
                    });
                    return false;
                });

                //Tambah User
                $('#btn-simpan').click(function(){
                    $('#form-tambah').submit();
                    $('#btn-simpan').addClass('disabled');
                });
                $('#form-tambah').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/user/tambahuser",
                        type:"POST",
                        data:$('#form-tambah').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-tambah').html(pesan_succ('User berhasil dibuat !'));
                                setTimeout(function(){$('#form-pesan-tambah').html('')}, 2000);
                                setTimeout(function(){$('#modal-tambah').modal('hide')}, 2500);
                                setTimeout(function(){ $('#table-user').dataTable().fnReloadAjax() }, 2500);
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
                        url:"<?=site_url()?>/user/hapususer",
                        type:"POST",
                        data:$('#form-hapus').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-hapus').html(pesan_succ('User berhasil dihapus !'));
                                setTimeout(function(){$('#form-pesan-hapus').html('')}, 2000);
                                setTimeout(function(){$('#modal-hapus').modal('hide')}, 2500);
                                setTimeout(function(){ $('#table-user').dataTable().fnReloadAjax() }, 2500);
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

                $('#form-edit').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/user/edituser",
                        type:"POST",
                        data:$('#form-edit').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-edit').html(pesan_succ('Data user berhasil diupdate !'));
                                setTimeout(function(){$('#form-pesan-edit').html('')}, 2000);
                                setTimeout(function(){$('#modal-edit').modal('hide')}, 2500);
                                setTimeout(function(){ $('#table-user').dataTable().fnReloadAjax() }, 2500);
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