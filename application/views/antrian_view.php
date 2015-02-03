            <!-- DATA TABLES -->
            <link href="<?=base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Antrian
                        <small>Status, Kondisi, Perhitungan Antrian</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"> Report</a></li>
                        <li class="active">Antrian</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="alert alert-info alert-dismissable no-print" style="padding:5px 35px 5px 5px; margin: 0 0 5px 0">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Halaman ini menampilkan laporan dan grafik antrian pada hari ini (<?=  date("d/m/Y", now());?>)
                    </div>
                    <div class="row no-print">
                        <div class="col-xs-12">
                            
                            <div class="box">
                                <div class="box-header table-responsive">
                                    <h3 class="box-title">Opsi<small> Report</small></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-success pull-right" onclick="window.print();" data-toggle="tooltip" title="Cetak"><i class="fa fa-print"></i>  Cetak</button>
                                        <!-- <button class="btn btn-primary pull-right" style="margin-right: 3px;" data-toggle="tooltip" title="Buat PDF"><i class="fa fa-download"></i>  Buat PDF</button> -->
                                    </div><!-- /. tools -->
                                </div>
                                
                            </div><!-- /.box -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    
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
                                <div class="small-box-footer">&nbsp;
                                </div>
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
                                <div class="small-box-footer">&nbsp;
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3 id="boxantri">
                                        0
                                    </h3>
                                    <p>
                                        Total Antrian
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <div class="small-box-footer">&nbsp;
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3 id="boxpengunjung">
                                        0
                                    </h3>
                                    <p>
                                        Total Pengunjung
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <div class="small-box-footer">&nbsp;
                                </div>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="box box-primary no-print">
                                <div class="box-header">
                                    <h3 class="box-title">Status Counter</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nama</th>
                                            <th>IP Address</th>
                                            <th style="width: 40px">Status</th>
                                        </tr>
                                        <?php foreach ($counter->result() as $key ) { ?>
                                        <tr>
                                            <td><?=$key->counter_id;?>.</td>
                                            <td><?=$key->counter_name;?></td>
                                            <td><?=$key->counter_ip;?></td>
                                            <td><span class="badge bg-<?=$key->counter_status == 1 ? "green" : "red";?>"><?=$key->counter_status == 1 ? "ON" : "OFF";?></span></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <div class="col-md-8">
                            <!-- Bar chart -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Grafik Counter</h3>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="grafik-counter" style="height: 200px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Daftar Antrian</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="daftarantrian" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Counter</th>
                                                <th>Layanan</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Counter</th>
                                                <th>Layanan</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    
                    
                    
                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- Modal lihat -->
        <div class="modal fade" id="modal-lihat" data-backdrop="static">
          <div class="modal-dialog" style="width: 30%;">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-list"></i> Lihat Detail Antrian</h4>
                  </div>
                  <div class="modal-body">
                      <div class="box-body">
                          <dl>
                              <dt>Nomor</dt>
                              <dd><span id="lihat-nomor"></span></dd>
                              <dt>Counter</dt>
                              <dd><span id="lihat-counter"></span></dd>
                              <dt>Layanan</dt>
                              <dd><span id="lihat-layanan"></span></dd>
                              <dt>Status</dt>
                              <dd><span id="lihat-status"></span></dd>
                              <dt>Lama Pelayanan</dt>
                              <dd><span id="lihat-waktu"></span></dd>
                          </dl>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                  </div>
              </div>
          </div>
        </div> <!-- /.modal-lihat -->
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
	    <script src="<?= base_url() ;?>assets/js/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?= base_url() ;?>assets/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?=base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/datatables/dataTables.reload.js" type="text/javascript"></script>
        
        <!-- Page script -->
        <script type="text/javascript">
            function modaldetail(nomor, counter, layanan, status, waktu){
                $('#lihat-nomor').html(nomor);
                $('#lihat-counter').html(counter);
                $('#lihat-layanan').html(layanan);
                $('#lihat-status').html(status);
                $('#lihat-waktu').html(waktu);
                $('#modal-lihat').modal('show');
            }

            $(function() {

                /*
                 * BAR CHART
                 * ---------
                 */

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
                
                function update() {
                    counterchart.setData($.parseJSON(datacounter())); // redraw grafik
                }
                setInterval(update, 5000);
                /* END BAR CHART */
                
                /* DATA TABLE*/
                var oTable = $('#daftarantrian').dataTable({
                    "bProcessing": false,
                    "sPaginationType": "bootstrap",
                    "bJQueryUI": true,
                    "iDisplayStart ": 25,
                    "sAjaxSource": "<?=base_url();?>index.php/report/getantrian", //datasource
                    "bServerSide": true,
                    "aoColumns": [
                        {"bSearchable": false, "bSortable": true},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false}
                    ],
                });
                setInterval(function(){ 
                    $('#daftarantrian').dataTable().fnReloadAjax();
                }, 5000);
               

            });

            /*
             * Custom Label formatter
             * ----------------------
             */
            function labelFormatter(label, series) {
                return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>"
                        + label
                        + "<br/>"
                        + Math.round(series.percent) + "%</div>";
            }
        </script>
        
        <script type="text/javascript">
            function refresh_jumlah(){
                $.getJSON('<?=site_url();?>/report/get_jumlahdatabox/', function(obj) {
                    $('#boxlayani').html(obj.boxlayani);
                    $('#boxpengunjung').html(obj.boxpengunjung);
                    $('#boxantri').html(obj.boxantri);
                    $('#boxsurvei').html(obj.boxsurvei);
                });
            }

            $(document).ready(function() {
                refresh_jumlah();
                var auto_refresh = setInterval(
                    function(){
                        refresh_jumlah();
                    }, 3000
                );
            });
        </script>