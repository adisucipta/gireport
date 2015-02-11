        <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- info selamat datang -->
                    <div class="alert alert-info alert-dismissable" style="padding:5px 35px 5px 5px; margin: 0 0 5px 0">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Hai!</b> <?=$welcome_message;?>
                    </div>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3 id="boxlayani">
                                        0
                                    </h3>
                                    <p>
                                        Orang Terlayani
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-briefcase"></i>
                                </div>
                                <a href="<?=base_url();?>index.php/report/pengunjung" class="small-box-footer">
                                    Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3 id="boxsurvei">
                                        0
                                    </h3>
                                    <p>
                                        Survei
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?=base_url();?>index.php/report/survei" class="small-box-footer">
                                    Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3 id="boxcounter">
                                        0
                                    </h3>
                                    <p>
                                        Counter Online
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="<?=base_url();?>index.php/report/queue" class="small-box-footer">
                                    Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3 id="boxantri">
                                        0
                                    </h3>
                                    <p>
                                        Antrian
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?=base_url();?>index.php/report/pengunjung" class="small-box-footer">
                                    Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-9">                            


                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active"><a href="#grafik-layanan" data-toggle="tab">Layanan</a></li>
                                    <li><a href="#grafik-counter" data-toggle="tab">Counter</a></li>
                                    <li class="pull-left header"><i class="fa fa-inbox"></i> Grafik Layanan <?=mdate("%d-%m-%Y", now());?></li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="grafik-layanan" style="position: relative; height: 260px;"></div>
                                    <div class="chart tab-pane" id="grafik-counter" style="position: relative; height: 270px;"></div>
                                </div>
                            </div><!-- /.nav-tabs-custom -->

                            
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-3"> 

                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-text-width"></i>
                                    <h3 class="box-title">Informasi</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <dl> 
                                        <dt>Rendered in</dt>
                                        <dd>{elapsed_time} sec</dd>
                                        <dt>Memory Usage</dt>
                                        <dd>{memory_usage}</dd>
                                        <dt>User Agent</dt>
                                        <dd><?=$this->input->ip_address();?></dd>
                                        <dd><?=$this->input->user_agent();?></dd>
                                    </dl>
                                </div><!-- /.box-body -->
                            </div>                       

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?= base_url() ;?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
	<script src="<?= base_url() ;?>assets/js/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?= base_url() ;?>assets/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?= base_url() ;?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?= base_url() ;?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?= base_url() ;?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            $(function() {
                "use strict";
                //getting JSON data from external sources
                function datacounter() {
                    var json;
                    $.ajax({
                        url: '<?=site_url();?>/home/get_jumlahdatacounter/',
                        async: false,
                        global: false,
                        success: function(data) {
                            json = data;
                        }, 
                        error:function(){
                            //alert("Error loading chart");
                        }
                    });
                    return json;
                }
                
                function datalayanan() {
                    var json;
                    $.ajax({
                        url: '<?=site_url();?>/home/get_jumlahdatalayanan/',
                        async: false,
                        global: false,
                        success: function(data) {
                            json = data;
                        }, 
                        error:function(){
                            //alert("Error loading chart");
                        }
                    });
                    return json;
                }

                //alert(datacounter());
                
                var counterchart = new Morris.Bar({
                    element: 'grafik-counter',
                    resize: true,
                    data: $.parseJSON(datacounter()),
                    barColors: ['#00a65a', '#f56954', '#33B6EA'],
                    xkey: 'counter',
                    ykeys: ['a', 'b', 'c'],
                    labels: ['GFF P/G', 'RESERVASI', 'CITY CHECK'],
                    smooth: true,
                    hideHover: 'auto'
                });
                
                var layananchart = new Morris.Bar({
                    element: 'grafik-layanan',
                    resize: true,
                    data: $.parseJSON(datalayanan()),
                    barColors: ['#00a65a', '#f56954', '#33B6EA','#F39C12','#DF2826'],
                    xkey: 'layanan',
                    ykeys: ['a', 'b', 'c', 'd', 'e'],
                    labels: ['SELESAI', 'ANTRI', 'DILAYANI', 'BATAL', 'SPESIAL'],
                    smooth: true,
                    hideHover: 'auto'
                });
                
                function update() {
                    counterchart.setData($.parseJSON(datacounter())); // redraw grafik
                    layananchart.setData($.parseJSON(datalayanan()));
                }
                setInterval(update, 10000);
                
                //Fix for charts under tabs
                $('.box ul.nav a').on('shown.bs.tab', function(e) {
                    layananchart.redraw();
                    counterchart.redraw();
                });
            });
        </script>
        <script type="text/javascript">
            function refresh_jumlah(){
                $.getJSON('<?=site_url();?>/home/get_jumlahdatabox/', function(obj) {
                    $('#boxlayani').html(obj.boxlayani);
                    $('#boxcounter').html(obj.boxcounter);
                    $('#boxantri').html(obj.boxantri);
                    $('#boxsurvei').html(obj.boxsurvei);
                });
            }

            $(document).ready(function() {
                refresh_jumlah();
                var auto_refresh = setInterval(
                    function(){
                        refresh_jumlah();
                    }, 10000
                )
            });
        </script>