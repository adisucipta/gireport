            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Profil
                        <small>Ubah Profil Anda</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_url();?>index.php/pengaturan">Pengaturan</a></li>
                        <li class="active">Profil</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-lg-7">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Profil Anda</h3>
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-primary" id="btn-nama"><i class="fa fa-user">&nbsp;</i> Ganti Nama</button>
                                        <button class="btn btn-success" id="btn-password"><i class="fa fa-lock">&nbsp;</i> Ganti Password</button>                                                         
                                    </div>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo form_open('user/profilupdate','role="form-profil"')?>
                                    <div class="box-body">
                                        <span id="form-pesan-profil">
                                        </span>
                                        <div class="form-group">
                                            <label for="inputUsername">Username</label>
                                            <input type="text" class="form-control" readonly="" name="inputUsername" id="inputUsername" placeholder="Masukkan username" data-toggle="tooltip" title="Username Anda: <?=$profil_user;?>" value="<?=$profil_user;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-control" id="inputRole" name="inputRole" data-toggle="tooltip" title="Role Anda: Administrator" disabled>
                                                <option>Administrator</option>
                                                <option>Counter</option>
                                            </select>
                                        </div>
                                       
                                    </div><!-- /.box-body -->

                                    
                                <?php echo form_close(); ?>
                            </div><!-- /.box -->

                            

                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-lg-5">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Informasi Akun</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <blockquote>
                                        <p>Akun anda dibuat pada <?=$tanggalbuat;?> dengan role sebagai <?=$this->access->get_role();?></p>
                                    </blockquote>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                    
                    <!-- Modal Password -->
                    <div class="modal fade" id="modal-password" tabindex="-999" role="dialog" aria-labelledby="btn-password" aria-hidden="true">
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
                                                        <label>Password Lama :</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-lock"></i>
                                                            </div>
                                                            <input type="hidden" id="pass-id" name="pass-id" value="<?=$this->access->get_userid();?>" />
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
                                    <button id="btn-simpan" type="button" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.modal-password-->
                    
                    <!-- Modal Nama -->
                    <div class="modal fade" id="modal-nama" tabindex="-999" role="dialog" aria-labelledby="btn-nama" aria-hidden="true">
                        <div class="modal-dialog" style="width: 350px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Ganti Nama</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body table-responsive">
                                        <span id="form-pesan-nama">
                                        </span>
                                        <?php echo form_open('user/gantinama', 'id="form-nama"') ?>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Anda :</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                            <input type="hidden" id="nama-id" name="nama-id" value="<?=$this->access->get_userid();?>" />
                                                            <input type="text" class="form-control" id="nama-lama" name="nama-lama" placeholder="Nama Anda" value="<?=$profil_nama;?>" />
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
                                    <button id="btn-simpannama" type="button" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-nama -->
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#modal-password').on('shown.bs.modal', function (e) {
                    $('#pass-lama').focus();
                });
                
                $('#modal-nama').on('shown.bs.modal', function (e) {
                    $('#nama-lama').focus();
                });

                $('#btn-password').click(function(){
                    $('#form-pesan-password').html('');
                    $('#pass-lama').val('');
                    $('#pass-baru').val('');
                    $('#pass-conf').val('');
                    $('#modal-password').modal('show');
                });
                
                $('#btn-nama').click(function(){
                    $('#form-pesan-nama').html('');
                    $('#modal-nama').modal('show');
                });

                // Edit password
                $('#btn-simpan').click(function(){
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
                
                $('#btn-simpannama').click(function(){
                    $('#form-nama').submit();
                });
                
                $('#form-nama').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/user/gantinama",
                        type:"POST",
                        data:$('#form-nama').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-nama').html(pesan_succ('Nama Anda berhasil diperbarui !'));
                                setTimeout(function(){$('#form-pesan-nama').html('')}, 2000);
                                setTimeout(function(){$('#modal-nama').modal('hide')}, 2500);
                                window.location.reload();
                            }else{
                                $('#form-pesan-nama').html(pesan_err(obj.error));
                                setTimeout(function(){$('#form-pesan-nama').html('')}, 3000);
                            }
                        }
                    });
                    return false;
                });
             
            });
        </script>