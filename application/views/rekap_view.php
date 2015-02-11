            <!-- DATA TABLES -->
            <link href="<?=base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Rekap Antrian
                        <small>Berisi Rekapitulasi Layanan, Counter, Pengunjung</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"> Report</a></li>
                        <li class="active">Rekap Antrian</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- info selamat datang -->
                    <div class="alert alert-info alert-dismissable no-print" style="padding:5px 35px 5px 5px; margin: 0 0 5px 0">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Anda dapat memilih tampilan grafik dan data berdasarkan tanggal, bulan ataupun tahun
                    </div>
                    
                    <div class="row no-print">
                        <div class="col-xs-12">
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Opsi<small> Report</small></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <!-- Date range -->
                                            <!--  <button class="btn btn-info daterange" data-toggle="tooltip" title="Pilih Tanggal"><i class="fa fa-calendar"></i> Tanggal</button> -->
<!--                                             <button class="btn btn-success" onclick="cetak()" data-toggle="tooltip" title="Cetak Semua"><i class="fa fa-print"></i>  Cetak</button> -->
                                            <!-- <button class="btn btn-primary" style="margin-right: 3px;" data-toggle="tooltip" title="Buat PDF"><i class="fa fa-download"></i>  Buat PDF</button> -->
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
                                        Total Terlayani
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
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3 id="boxbatal">
                                        0
                                    </h3>
                                    <p>
                                        Total Batal
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
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3 id="boxsurvei">
                                        0
                                    </h3>
                                    <p>
                                        Total Survei
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
                    
                    <!-- main row -->
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="box">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Daftar Antrian</h3>
                                    <div class="pull-right box-tools">
                                        <!-- Date range -->

                                            <button class="btn btn-success" onclick="cetak(0)" title="Cetak"><i class="fa fa-print"></i>  Cetak</button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i> Tanggal: </span>
                                                <input type="text" class="input-sm form-control" name="start" id="filter-start" placeholder="Filter Tanggal">
                                            </div>
                                        </div>
                                        </div><div>&nbsp;</div>
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
        <script src="<?= base_url() ;?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url() ;?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- date-picker -->
        <script src="<?= base_url() ;?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- FLOT CHARTS -->
        <script src="<?=base_url();?>assets/js/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="<?=base_url();?>assets/js/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="<?=base_url();?>assets/js/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="<?=base_url();?>assets/js/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?=base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/plugins/datatables/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

        
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

            function cetak(ID){
                newWindow('<?=site_url()?>/report/cetak/'+ID,'Cetak Data Antrian');
            }

            function refresh_jumlah(){
                $.getJSON('<?=site_url();?>/report/get_totaldatabox/', function(obj) {
                    $('#boxlayani').html(obj.boxlayani);
                    $('#boxpengunjung').html(obj.boxpengunjung);
                    $('#boxbatal').html(obj.boxbatal);
                    $('#boxsurvei').html(obj.boxsurvei);
                });
            }

            $(document).ready(function() {
                refresh_jumlah();
                var auto_refresh = setInterval(
                    function(){
                        refresh_jumlah();
                    }, 5000
                );
                
                /* DATA TABLE*/
                var oTable = $('#daftarantrian').dataTable({
                    "bProcessing": false,
                    "sPaginationType": "bootstrap",
                    "bJQueryUI": true,
                    "iDisplayStart ": 25,
                    "sAjaxSource": "<?=base_url();?>index.php/report/getfullantrian", //datasource
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
                //var currentDate = $(".datepick").datepicker("getDate");
                //oTable.fnFilter(currentDate);
                setInterval(function(){ 
                    $('#daftarantrian').dataTable().fnReloadAjax();
                }, 5000);

                $("#filter-start").datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
                    todayHighlight: true,
                }).on('changeDate', function(ev){
                    
                    $("#daftarantrian_filter input").val(ev.format());
                    $("#daftarantrian_filter input").trigger("keyup.DT");
                    //min = new Date(ev.format()).getTime();
                    //alert(min);
                    //oTable.fnDraw();
                });

                /*$("#filter-end").datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
                    todayHighlight: true,
                }).on('changeDate', function(ev){
                    //alert(ev.format());
                    //$("#daftarantrian_filter input").val(ev.format());
                    max = new Date(ev.format()).getTime();
                    oTable.fnDraw();
                });*/

                /*$('.datepick').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
                });*/
               

            });

            /* Custom filtering function which will search data in column four between two values */
            $.fn.dataTableExt.afnFiltering.push(
                function( settings, data, dataIndex ) {
                    var min = "";
                    var max = "";
             
                    // if (typeof data._date == 'undefined') {
                        var iDate = new Date(data[4]).getTime() | "";
                    // }

                    if (min && !isNaN(min)) {
                        if (iDate < min) {
                            return false;
                        }
                    }

                    if (max && !isNaN(max)) {
                        if (iDate > max) {
                            return false;
                        }
                    }

                    return true;
                }
            );

            // Date range filter
            /*DateFilter = "";

            $.fn.dataTableExt.afnFiltering.push(
              function(oSettings, aData, iDataIndex) {
                if (typeof aData._date == 'undefined') {
                  aData._date = new Date(aData[0]).getTime();
                }

                if (DateFilter && !isNaN(DateFilter)) {
                  if (aData._date < DateFilter) {
                    return false;
                  }
                }

                return true;
              }
            );*/

        </script>