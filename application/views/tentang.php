            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Tentang
                        <small>Aplikasi</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Tentang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- tentang -->
                            <div class="box box-danger">
                                <div class="box-header">
                                    <i class="fa fa-info-circle"></i>
                                    <h3 class="box-title">Tentang</h3>
                                </div>
                                <div class="box-body">
                                    <dl>
                                        <dt>Deskripsi</dt>
                                        <dd>Aplikasi ini digunakan untuk melihat <em>report</em> dan konfigurasi layanan yang ada pada Sistem Antrian di Sales Office Garuda Indonesia - Basuki Rahmat Surabaya.</dd>
                                        <dt>Dikembangkan oleh</dt>
                                        <dd>Tim Kaworu Mono dari B3IBS // Politeknik Elektronika Negeri Surabaya</dd>
                                        <dd>yaitu : Safrizal, Yufi, Retno</dd>
                                        <dt>Copyright</dt>
                                        <dd>MIT License 2014 - Kaworu Mono</dd>
                                    </dl>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-user"></i>
                                    <h3 class="box-title">Kontak</h3>
                                </div>
                                <div class="box-body">
                                    <blockquote>
                                        <p>Anda dapat menghubungi Developer di <a href="mailto:emailnyab3ibs@gmail.com" title="Emailnya B3IBS">emailnyab3ibs@gmail.com</a> dengan subjek "Kaworu Mono"</p>
                                        <small>Tim Kaworu Mono dari <cite title="B3IBS">B3IBS</cite></small>
                                    </blockquote>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col (left) -->
                        <div class="col-md-6"> <!-- col (right) -->
                            <!-- quick email widget -->
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Email Developer</h3>
                                </div>
                                <div class="box-body">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="emailto" placeholder="Email ke: emailnyab3ibs@gmail.com"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" placeholder="Subjek"/>
                                        </div>
                                        <div>
                                            <textarea class="textarea" placeholder="Pesan Anda di sini" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer clearfix">
                                    <button class="pull-right btn btn-default" id="sendEmail">Kirim <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?= base_url() ;?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>