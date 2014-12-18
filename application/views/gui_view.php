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
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <?=$imgcrud->output;?>
                                        <?php // print_r($imgcrud);?>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        The European languages are members of the same family. Their separate existence is a myth.
                                        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                        in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                        new common language would be desirable: one could refuse to pay expensive translators. To
                                        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                                        words. If several languages coalesce, the grammar of the resulting language is more simple
                                        and regular than that of the individual languages.
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
                                <h4 class="modal-title">Edit GUI</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body table-responsive">
                                    <span id="form-pesan-edit">
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

</script>