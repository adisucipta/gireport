        <!-- <link href="<?=base_url();?>assets/image_crud/css/fineuploader.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/image_crud/css/photogallery.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/image_crud/css/colorbox.css" rel="stylesheet" type="text/css" /> -->
        <?php foreach($imgcrud->css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>

        <?php //foreach($imgcrud->js_files as $file): ?>
            <!-- <script src="<?php //echo $file; ?>"></script> -->
        <?php //endforeach; ?>


        <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        GUI Layanan
                        <small>Untuk Konfigurasi GUI Layanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_url();?>index.php/pengaturan">Pengaturan</a></li>
                        <li class="active">GUI Layanan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Gambar</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab">Teks</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab">Layanan</a></li>
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <?=$imgcrud->output;?>
                                        <?php // print_r($imgcrud);?>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <span id="form-pesan-edit">
                                        </span>
                                        <?php echo form_open('pengaturan/updategui', 'id="form-gui"') ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <input type="text" class="form-control" id="judul-gui" name="judul-gui" placeholder="Judul GUI" value="<?=$datagui->gui_judul?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Running Text</label>
                                            <input type="text" class="form-control" id="run-gui" name="run-gui" placeholder="Running Text" value="<?=$datagui->gui_running?>">
                                        </div>
                                        <div class="form-group">
                                            <button id="btn-simpan" type="button" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <span id="form-pesan-layanan">
                                        </span>
                                        <table class="table table-bordered">
                                            <tbody><tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nama Layanan</th>
                                                <th style="width: 100px">Kode Huruf</th>
                                                <th style="width: 60px">Status</th>
                                                <th style="width: 40px">Opsi</th>
                                            </tr>
                                            <?php 
                                            if(!empty($datalayanan)) { $no = 0;
                                                foreach ($datalayanan->result() as $key ) { ?>
                                            <tr>
                                                <td><?=$no++?>.</td>
                                                <td><?=$key->layanan_name?></td>
                                                <td><?=$key->layanan_huruf?></td>
                                                <td><span class="label label-<?=$key->layanan_enable == 1 ? "success" : "danger";?>"><?=$key->layanan_enable == 1 ? "Aktif" : "Nonaktif";?></span></td>
                                                <td><a onclick="modaledit('<?=$key->layanan_id?>', '<?=$key->layanan_name?>', '<?=$key->layanan_huruf?>','<?=$key->layanan_enable?>')" class="btn btn-info btn-xs">Edit</a></td>
                                            </tr>
                                            <?php } } else {  ?>
                                                <tr>Belum ada layanan yang ditambahkan.</tr>
                                            <?php } ?>
                                            
                                        </tbody></table>
                                        <?php echo form_close(); ?>
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div>

                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->


                <!-- Modal Edit Utama -->
                <div class="modal fade" id="modal-edit" tabindex="-999" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog" style="width: 350px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit Layanan</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-edit">
                                    </span>
                                    <?php echo form_open('pengaturan/updatelayanan', 'id="form-edit"') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama :</label>
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
        
        
        <!-- jQuery 2.0.2  -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?= base_url() ;?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ;?>assets/image_crud/js/fineuploader-3.2.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ;?>assets/image_crud/js/jquery.colorbox-min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
	    <script src="<?= base_url() ;?>assets/js/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?= base_url() ;?>assets/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?= base_url() ;?>assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?= base_url() ;?>assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?= base_url() ;?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?= base_url() ;?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?= base_url() ;?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <script type='text/javascript'>
/*$(document).ready(function(){
        createUploader();
        loadColorbox();
});*/
function modaledit(id, nama, huruf, status){
    $('#form-pesan-layanan').html('');
    $('#edit-id').val(id);
    $('#edit-huruf').val(huruf);
    $('#edit-nama').val(nama);
    //$('#edit-role').val(role);
    $("#edit-status option").filter(function(){
        return ( ($(this).val() == status) || ($(this).text() == status) );
    }).prop('selected', true);
    $('#modal-edit').modal('show');
}

function loadColorbox()
{
    $('.color-box').colorbox({
        rel: 'color-box'
    });
}
function loadPhotoGallery(){
    $.ajax({
        url: '<?=site_url();?>/pengaturan/gui/ajax_list',
        cache: false,
        dataType: 'text',
        beforeSend: function()
        {
            $('.file-upload-messages-container:first').show();
            $('.file-upload-message').html("Loading, please wait...");
        },
        complete: function()
        {
            $('.file-upload-messages-container').hide();
            $('.file-upload-message').html('');
        },
        success: function(data){
            $('#ajax-list').html(data);
            loadColorbox();
        }
    });
}

function createUploader() {
    var uploader = new qq.FineUploader({
        element: document.getElementById('fine-uploader'),
        request: {
             endpoint: '<?=site_url();?>/pengaturan/gui/upload_file'
        },
        validation: {
             allowedExtensions: ['jpeg', 'jpg']
        },      
        callbacks: {
             onComplete: function(id, fileName, responseJSON) {
                 loadPhotoGallery();
             }
        },
        debug: true,
        template: '<div class="qq-uploader">' +
            //'<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>' +
            '<div class="qq-upload-button">Upload files here</div>' +
            '<ul class="qq-upload-list"></ul>' +
            '</div>',
        fileTemplate: '<li>' +
            '<span class="qq-upload-file"></span>' +
            '<span class="qq-upload-spinner"></span>' +
            '<span class="qq-upload-size"></span>' +
            '<a class="qq-upload-cancel" href="#">Cancel</a>' +
            '<span class="qq-upload-failed-text">Failed</span>' +
            '</li>',

    });
}

function saveTitle(data_id, data_title)
{
        $.ajax({
            url: '<?=site_url();?>/pengaturan/gui/insert_title',
            type: 'post',
            data: {primary_key: data_id, value: data_title},
            beforeSend: function()
            {
                $('.file-upload-messages-container:first').show();
                $('.file-upload-message').html("Saving title...");
            },
            complete: function()
            {
                $('.file-upload-messages-container').hide();
                $('.file-upload-message').html('');
            }
            });
}

window.onload = createUploader;
$(document).ready(function() {
                // edit
                $('#btn-simpan').click(function(){
                    $('#form-gui').submit();
                    $('#btn-simpan').addClass('disabled');
                });
                $('#form-gui').submit(function(){        
                    $.ajax({
                        url:"<?=site_url()?>/pengaturan/updategui",
                        type:"POST",
                        data:$('#form-gui').serialize(),
                        cache: false,
                        success:function(respon){
                            var obj = $.parseJSON(respon);
                            if(obj.status==1){
                                $('#form-pesan-edit').html(pesan_succ('Data berhasil disimpan !'));
                                setTimeout(function(){$('#form-pesan-edit').html('')}, 2000);
                            }else{
                                $('#form-pesan-edit').html(pesan_err(obj.error));
                                setTimeout(function(){$('#form-pesan-edit').html('')}, 5000);
                            }

                            $('#btn-simpan').removeClass('disabled');
                        }
                    });
                    return false;
                });
                
             
            });
</script>