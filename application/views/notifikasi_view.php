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
                                        <!-- button with a dropdown -->
                                        <div class="btn-group">
                                            <button class="btn btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li><a href="<?=current_url()."/bacasmua";?>">Tandai Semua telah Dibaca</a></li>
                                                <li><a href="<?=current_url()."/hapusmua";?>">Hapus Semua Notifikasi</a></li>
                                            </ul>
                                        </div>
                                                                             
                                    </div>
                                    <!-- /.tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                    <?php foreach ($notif->result() as $key ) { ?>
                                    <div class="alert alert-<?=$key->tipe_nama;?>" style="padding:5px 35px 5px 5px; margin: 0 0 5px 0">
                                        <b>(<?=$key->notif_tanggal;?>)</b> <?=$key->notif_teks;?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div><!-- /.box -->

                        </div><!-- /.col-->
                    </div><!-- ./row -->
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?= base_url() ;?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>