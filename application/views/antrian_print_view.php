<html>
    <head>
        <meta charset="UTF-8">
        <title>Cetak Data Antrian</title>
        <link rel="shortcut icon" href="<?=base_url();?>assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?=base_url();?>assets/img/favicon.ico" type="image/x-icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?=base_url()?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url()?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <!-- jQuery 2.0.2 -->
        <script src="<?=base_url()?>assets/js/jquery.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/js/gireport/misc.js" type="text/javascript"></script>
        <!-- AdminLTE App -->

    </head>
    <body>
    	<div class="wrapper">
            <section class="invoice">
                <!-- title row -->
                    <div class="row">
						<div class="col-xs-12 text-center">
							<img src="<?=base_url()?>assets/img/logo.png" height="100" />
							<h3 style="margin: -1px">LAPORAN ANTRIAN HARIAN</h3>
							<h3 style="margin: -1px">GARUDA INDONESIA SALES OFFICE GRAHA BUMI SURABAYA</h3>
							<h3 style="margin: -1px"><?=mdate("%d/%m/%Y", now());?></h3>
							<p>Jl. Basuki Rahmat 106-128 Surabaya</p>
						</div>
                    </div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<img width="100%" height="1.5px" src="<?php echo base_url()?>assets/img/line.jpg" />
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<h4><strong>DATA ANTRIAN</strong></h4>
						</div>
					</div>
                    <div class="row">
                        <div class="col-xs-3">
							<h5 style="margin: 0px"><strong>Total Survei</strong></h5>
							<h5 style="margin: 0px"><strong>Total Pengunjung</strong></h5>
                        </div><!-- /.col -->
						<div class="col-xs-3">
                            <h5 style="margin: 0px">: <?=$survei?></h5>
							<h5 style="margin: 0px">: <?=$pengunjung?></h5>
							<br />
                        </div><!-- /.col -->
                        <div class="col-xs-3">
							<h5 style="margin: 0px"><strong>Total Terlayani</strong></h5>
							<h5 style="margin: 0px"><strong>Total Batal</strong></h5>
                        </div><!-- /.col -->
						<div class="col-xs-3">
                            <h5 style="margin: 0px">: <?=$layani?></h5>
							<h5 style="margin: 0px">: <?=$batal?></h5>
							<br />
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
						<div class="col-xs-12 text-center">
							<h4><strong>LAYANAN</strong></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="table table-bordered table-condensed differentTable">
								<tr>
									<th style="width: 15px">No</th>
                                    <th>Nama Layanan</th>
                                    <th style="text-align: center">Selesai</th>
                                    <th style="text-align: center">Batal</th>
                                    <th style="text-align: center">Spesial</th>
                                    <th style="text-align: center">Total</th>
                                </tr>
                                <?php $no = 1; foreach ($datalayanan->result() as $key ) { ?>
								<tr>
									<td><?=$no++?>.</td>
									<td><?=$key->Layanan?></td>
									<td style="text-align: center"><?=$key->Selesai?></td>
									<td style="text-align: center"><?=$key->Batal?></td>
									<td style="text-align: center"><?=$key->Spesial?></td>
									<td style="text-align: center"><?=$key->Total?></td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<h4><strong>COUNTER & USER</strong></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="table table-bordered table-condensed differentTable">
								<tr>
									<th style="width: 15px">No</th>
                                    <th>Nama Counter</th>
                                    <th style="text-align: center">Nama User</th>
                                    <th style="text-align: center">Total Pelanggan</th>
                                    <th style="text-align: center">Total Durasi Pelayanan</th>
                                    <th style="text-align: center">Rata-Rata Durasi</th>
                                </tr>
                                <?php if(!empty($datacounter)) { $no = 1; foreach ($datacounter->result() as $key ) { ?>
								<tr>
									<td><?=$no++?>.</td>
									<td><?=$key->Counter?></td>
									<td style="text-align: center"><?=$key->User?></td>
									<td style="text-align: center"><?=$key->Total?></td>
									<td style="text-align: center"><?="10 Menit"?></td>
									<td style="text-align: center"><?="2 Menit"?></td>
								</tr>
								<?php } } else { ?>
									<td style="text-align: center"><?="Tidak ada data"?></td>
								<?php } ?>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<img width="100%" height="1.5px" src="<?php echo base_url()?>assets/img/line.jpg" />
						</div>
					</div>
					<div class="row">
						<br />
						<div class="col-xs-2">
							<p><strong>Catatan :</strong></p>
						</div>
						<div class="col-xs-6">
							<ol>
								<li>Dokumen ini hanya diperuntukkan untuk Pegawai Garuda Indonesia</li>
								<li>Untuk penggunaan diluar korporasi harus dengan ijin tertulis</li>
							</ol>
						</div>
						<div class="col-xs-4 text-center">
							Dicetak pada<br/>
							<?=mdate("%d/%m/%Y %H:%i:%s", now());?>
							<br />
							<br />
							<br />
							<br />
							<strong><?=$this->access->get_username()?></strong>	
						</div>
					</div>
            </section>
        </div>
            
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
            setTimeout(function(){window.close()}, 3000);
        });
    </script>
    </body>
</html>