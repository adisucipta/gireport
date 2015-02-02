            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Notifikasi
                        <small>Status Aplikasi</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Notifikasi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php if($this->session->userdata('pesannotif') != NULL) { ?>
                    <!-- info notifikasi -->
                    <div class="alert alert-success alert-dismissable" style="padding:5px 35px 5px 5px; margin: 0 0 5px 0">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>OK!</b> <?=$this->session->userdata('pesannotif');?>
                    </div>
                    <?php $this->session->unset_userdata('pesannotif'); } ?>

                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Daftar Notifikasi</h3>
                                    <!-- tools -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-sm btn-info" id="btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                                        <button class="btn btn-success btn-sm" id="btn-baca-notif" name="btn-baca-notif"><i class="fa fa-check"></i> Baca Semua</button>
                                        <button class="btn btn-danger btn-sm" id="btn-hapus-notif" name="btn-hapus-notif"><i class="fa fa-times"></i> Hapus Semua Notif</button>
                                    </div>
                                    <!-- /.tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                    <?php 
                                    if(!empty($notif)) {
                                        foreach ($notif as $key ) { ?>
                                    <div class="alert alert-<?=$key->tipe_nama;?>" style="padding:5px 35px 8px 5px; margin: 0 0 5px 0; background:<?=$key->notif_baca == 1 ? "#f5f5f5" : "";?>; border:<?=$key->notif_baca == 1 ? "0px" : "";?>; color:<?=$key->notif_baca == 1 ? "#000000" : "";?>">
                                        <span class="label label-<?=$key->tipe_nama;?>"> <?=$key->notif_tanggal;?> </span> &nbsp;<?=$key->notif_teks;?>
                                    </div>
                                    <?php } } else {  ?>
                                        <p>Tidak ada notifikasi.</p>
                                    <?php } ?>
                                </div>
                            </div><!-- /.box -->

                        </div><!-- /.col-->
                    </div><!-- ./row -->
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- Modal Hapus notif -->
        <div class="modal fade" id="modal-hapus" data-backdrop="static">
          <div class="modal-dialog" style="width: 26%;">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-warning"></i> Hapus Notifikasi</h4>
                  </div>
                  <div class="modal-body">
                      <div class="box-body table-responsive">
                          <span id="form-pesan-hapus">
                          </span>
                          <?php echo form_open('notifikasi/hapusnotif', 'id="form-hapus"') ?>
                          <div class="box-body">
                              <div class="row">
                                  <div class="col-md-12">
                                          <p>Apakah Anda yakin ingin menghapus semua Notifikasi ?</p>
                                  </div>
                              </div>
                          </div>
                          <input type="hidden" name="hapus-id" value="<?=$this->access->get_roleid();?>" />
                          <?php echo form_close(); ?>
                      </div><!-- /.box-body -->
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                      <button id="btn-hapus" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Iya, Hapus</button>
                  </div>
              </div>
          </div>
        </div>

        <!-- Modal baca semua notif -->
        <div class="modal fade" id="modal-baca" data-backdrop="static">
          <div class="modal-dialog" style="width: 26%;">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-warning"></i> Baca Notifikasi</h4>
                  </div>
                  <div class="modal-body">
                      <div class="box-body table-responsive">
                          <span id="form-pesan-baca">
                          </span>
                          <?php echo form_open('notifikasi/bacasemua', 'id="form-baca"') ?>
                          <div class="box-body">
                              <div class="row">
                                  <div class="col-md-12">
                                          <p>Apakah Anda yakin ingin menandai semua notifikasi telah dibaca ?</p>
                                  </div>
                              </div>
                          </div>
                          <input type="hidden" name="baca-id" value="<?=$this->access->get_roleid();?>" />
                          <?php echo form_close(); ?>
                      </div><!-- /.box-body -->
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                      <button id="btn-baca" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Iya, Tandai Semua</button>
                  </div>
              </div>
          </div>
        </div>
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?= base_url() ;?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#btn-hapus-notif').click(function(){
                    $('#form-pesan-hapus').html('');
                    $('#modal-hapus').modal('show');
                });

                $('#btn-baca-notif').click(function(){
                    $('#form-pesan-baca').html('');
                    $('#modal-baca').modal('show');
                });

                $('#btn-refresh').click(function(){
                    location.reload();
                });
                
                // Hapus notif
                $('#btn-hapus').click(function(){
                    $('#form-hapus').submit();
                    $('#btn-hapus').addClass('disabled');
                });
                $('#form-hapus').submit(function(){
                    $.ajax({
                        url:"<?=base_url();?>index.php/notifikasi/hapusnotif",
                        type:"POST",
                        data:$('#form-hapus').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-hapus').html(pesan_succ(obj.pesan));
                                setTimeout(function(){$('#form-pesan-hapus').html('')}, 2000);
                                setTimeout(function(){$('#modal-hapus').modal('hide')}, 2500);
                                setTimeout(function(){ location.reload(); }, 2500);
                            }else{
                                $('#form-pesan-hapus').html(pesan_err(obj.pesan));
                                setTimeout(function(){$('#form-pesan-hapus').html('')}, 5000);
                            }

                            $('#btn-hapus').removeClass('disabled');
                        }
                    });
                    return false;
                });

                // baca semua notif
                $('#btn-baca').click(function(){
                    $('#form-baca').submit();
                    $('#btn-baca').addClass('disabled');
                });
                $('#form-baca').submit(function(){
                    $.ajax({
                        url:"<?=base_url();?>index.php/notifikasi/bacasemua",
                        type:"POST",
                        data:$('#form-baca').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-baca').html(pesan_succ(obj.pesan));
                                setTimeout(function(){$('#form-pesan-baca').html('')}, 2000);
                                setTimeout(function(){$('#modal-baca').modal('hide')}, 2500);
                                setTimeout(function(){ location.reload(); }, 2500);
                            }else{
                                $('#form-pesan-baca').html(pesan_err(obj.pesan));
                                setTimeout(function(){$('#form-pesan-baca').html('')}, 5000);
                            }

                            $('#btn-baca').removeClass('disabled');
                        }
                    });
                    return false;
                });

            });
        </script>