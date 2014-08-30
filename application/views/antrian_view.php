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
                    <div class="row">
                        <div class="col-xs-12">
                            

                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-primary">
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

                        <div class="col-md-6">
                            <!-- Bar chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Grafik Counter</h3>
                                </div>
                                <div class="box-body">
                                    <div id="bar-chart" style="height: 200px;"></div>
                                </div><!-- /.box-body-->
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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Counter</th>
                                                <th>Layanan</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A0001</td>
                                                <td>Internet
                                                    Explorer 4.0</td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>A0002</td>
                                                <td>Internet
                                                    Explorer 5.0</td>
                                                <td>Win 95+</td>
                                                <td>5</td>
                                                <td>C</td>
                                            </tr>
                                            <tr>
                                                <td>A0003</td>
                                                <td>Internet
                                                    Explorer 5.5</td>
                                                <td>Win 95+</td>
                                                <td>5.5</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>B0004</td>
                                                <td>Internet
                                                    Explorer 6</td>
                                                <td>Win 98+</td>
                                                <td>6</td>
                                                <td>A</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Counter</th>
                                                <th>Layanan</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
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
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url() ;?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
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
        
        <!-- Page script -->
        <script type="text/javascript">

            $(function() {

                /*
                 * BAR CHART
                 * ---------
                 */

                var bar_data = {
                    data: [["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
                    color: "#3c8dbc"
                };
                $.plot("#bar-chart", [bar_data], {
                    grid: {
                        borderWidth: 1,
                        borderColor: "#f3f3f3",
                        tickColor: "#f3f3f3"
                    },
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: "center"
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
                });
                /* END BAR CHART */
                
                /* DATA TABLE*/
                $('#example1').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": true,
                    "bProcessing": true
                });

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
        