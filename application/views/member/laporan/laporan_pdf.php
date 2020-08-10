<!DOCTYPE html>
<html>
<head>
	<title>laporan penjualan</title>
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			
			font: 12pt "Tahoma";
		}

		* {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		.page {

			width: 21cm;
			min-height: 29.7cm;
			padding: 2cm;
			margin: 1cm auto;
			border: 1px #D3D3D3 solid;
			border-radius: 5px;
			background: white;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}

		.subpage {
			margin-top: 40px;
			padding: 1cm;
			border: 5px red solid;
			height: 256mm;
			outline: 2cm #FFEAEA solid;
		}

		@page {
			size: A4;
			margin: 0;
		}

		@media print {
			.page {
				margin: 0;
				border: initial;
				border-radius: initial;
				width: initial;
				min-height: initial;
				box-shadow: initial;
				background: initial;
				page-break-after: always;
			}
		}
		@page { size: A4 }

		h1 {
			font-weight: bold;
			font-size: 20pt;
			text-align: center;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		.table th {
			padding: 8px 8px;
			border:1px solid #000000;
			text-align: center;
		}

		.table td {
			padding: 3px 3px;
			border:1px solid #000000;
		}

		.text-center {
			text-align: center;
		}
	</style>
</head>
<body >
	<div class="book">
		<div class="page" style="background-image: url(<?php echo base_url();?>assets/images/bgpdf.png);">
			
<!-- 			<?php echo $totalpenjualanbabeq ?>
			<?php echo $totaloperasionalhangiri ?>
			<?php echo $totaloperasionalbabeq ?> -->
			<table style="white-space: nowrap; max-width: 1200px; width: 100%;" class="table table-bordered">
				<tr  style="background-color: white;">
					<td style="background-color: #004a9e;color: white;text-align: center;" colspan="5"><b>LAPORAN LABA RUGI</b></td>
				</tr>
				<tr align="center"  style="background-color: white;">
					<td>NO</td>
					<td>RESTO</td>
					<td>PENDAPATAN</td>
					<td>PENGELUARAN</td>
					<td>LABA/RUGI</td>

				</tr>
				<tr  style="background-color: white;">
					<td>1</td>
					<td style="background-color: #570119;color: white;">HANGIRI</td>
					<td align="right"><?php echo rupiah($totalpenjualanhangiri);  ?> </td>
					<td align="right"><?php echo rupiah($totaloperasionalhangiri);  ?> </td>
					<td align="right"><?php echo rupiah($totalpenjualanhangiri-$totaloperasionalhangiri);  ?> </td>
				</tr>
				<tr  style="background-color: white;">
					<td>2</td>
					<td style="background-color:#002038;color: white;">BABE-Q</td>
					<td align="right"><?php echo rupiah($totalpenjualanbabeq);  ?> </td>
					<td align="right"><?php echo rupiah($totaloperasionalbabeq);  ?> </td>
					<td align="right"><?php echo rupiah($totalpenjualanbabeq-$totaloperasionalbabeq);  ?> </td>
				</tr>
			</table>
			<br>

			<table style="white-space: nowrap; max-width: 1200px; width: 100%;" class="table table-bordered">
				<td colspan="8" style="background-color: #570119; text-align: center;color: white;">	<h2> LAPORAN PENJUALAN HANGIRI</h2></td>
				<tr  style="background-color: white;">
					<th align="center">NO</th>
					<th>TGL</th>
					<th>PPN/NON</th>
					<th>CASH/EDC</th>
					<th>JML</th>
					<th>DISC</th>
					<th>TOTAL</th>
					<th>AKHIR</th>
					
				</tr>
				<?php
				$no=1;
				foreach ($datapenjualanhangiri as $post):
					$tgl = tgl_indo($post['tanggal']);
					$diskon = rupiah($post['diskon']);
					$harga = rupiah($post['harga']);
					$akhir = rupiah($post['akhir']);
					?>
					<tr  style="background-color: white;">
						<td align="center"><?php echo $no++; ?></td>
						<td><?php echo  $tgl?></td>
						<td><?php echo $post['jenis_penjualan']?></td>
						<td><?php echo $post['cara_bayar']?></td>
						<td align="center"><?php echo $post['jumlah'] ?></td>
						<td align="right"><?php echo $diskon?></td>
						<td align="right"><?php echo $harga?></td>
						<td align="right"><?php echo $akhir?></td>
						

					</tr>	
				<?php endforeach ?>
				<tr style=" background-color:#002038;color: white;  ">
					<td colspan="7">JUMLAH</td>
					<td colspan="1" align="right"><b><?php echo rupiah($totalpenjualanhangiri);  ?> </b></td>
				</tr>

			</table>
			<br>
			
			<table style="white-space: nowrap; max-width: 1000px; width: 100%;" class="table table-bordered">
				<tr><td colspan="8" style="background-color: #570119; text-align: center;color: white;">	<h2> LAPORAN PENJUALAN BABEQ</h2></td></tr>

				<tr  style="background-color: white;">
					<th align="center">NO</th>
					<th>TGL</th>
					<th>PPN/NON</th>
					<th>CASH/EDC</th>
					<th>JML</th>
					<th>DISC</th>
					<th>TOTAL</th>
					<th>AKHIR</th>
				</tr>
				<?php
				$no=1;
				foreach ($datapenjualanbabeq as $post):
					$tgl = tgl_indo($post['tanggal']);
					$diskon = rupiah($post['diskon']);
					$harga = rupiah($post['harga']);
					$akhir = rupiah($post['akhir']);
					?>
					<tr  style="background-color: white;">
						<td align="center"><?php echo $no++; ?></td>
						<td><?php echo  $tgl?></td>
						<td><?php echo $post['jenis_penjualan']?></td>
						<td><?php echo $post['cara_bayar']?></td>
						<td align="center"><?php echo $post['jumlah'] ?></td>
						<td align="right"><?php echo $diskon?></td>
						<td align="right"><?php echo $harga?></td>
						<td align="right"><?php echo $akhir?></td>

					</tr>	
				<?php endforeach ?>
				<tr style=" background-color:#002038;color: white;  ">
					<td colspan="7">JUMLAH</td>
					<td colspan="1" align="right"><b><?php echo rupiah($totalpenjualanbabeq);  ?> </b></td>
				</tr>
			</table>
			<br>

			
		</div>
	</div>
		<div class="book">
		<div class="page" style="background-image: url(<?php echo base_url();?>assets/images/bgpdf.png);">
			
			<!-- 			book2 -->
			

			<table style="white-space: nowrap; max-width: 1200px; width: 100%;" class="table table-bordered">
				<tr  style="background-color: white;"><td colspan="8" style="background-color: #570119; text-align: center;color: white;">	<h2> LAPORAN OPERASIONAL HANGIRI</h2></td></tr>
				<tr  style="background-color: white;">
					<th>NO</th>
					<th>Tanggal Pengeluaran</th>
					<th>Keterangan</th>
					<th>Jumlah</th>

				</tr>
				<?php
				$no=1;
				foreach ($dataoperasionalhangiri as $post):
					$tgl = tgl_indo($post['tgl_operasional']);
					$jumlah = rupiah($post['jumlah']);

					?>
					<tr  style="background-color: white;">
						<td><?php echo $no++; ?></td>
						<td><?php echo  $tgl?></td>
						<td><?php echo $post['keterangan']; ?></td>
						<td><?php echo $jumlah ?></td>

					</tr>	
				<?php endforeach ?>
				<tr style=" background-color:#002038;color: white;  ">
					<td colspan="3">JUMLAH</td>
					<td colspan="1" align="right"><b><?php echo rupiah($totaloperasionalhangiri);  ?> </b></td>
				</tr>
			</table>
			<br>
			
		</div>
	</div>
	<div class="book">
		<div class="page" style="background-image: url(<?php echo base_url();?>assets/images/bgpdf.png);">
			
			<!-- 			book2 -->
			

			<table style="white-space: nowrap; max-width: 1200px; width: 100%;" class="table table-bordered">
				<tr  style="background-color: white;">
					<td colspan="8" style="background-color: #570119; text-align: center;color: white;">	<h2> LAPORAN OPERASIONAL BABEQ</h2></td>
				</tr>
				<tr  style="background-color: white;">
					<th>NO</th>
					<th>Tanggal Pengeluaran</th>
					<th>Keterangan</th>
					<th>Jumlah</th>

				</tr>
				<?php
				$no=1;
				foreach ($dataoperasionalbabeq as $post):
					$tgl = tgl_indo($post['tgl_operasional']);
					$jumlah = rupiah($post['jumlah']);

					?>
					<tr  style="background-color: white;">
						<td><?php echo $no++; ?></td>
						<td><?php echo  $tgl?></td>
						<td><?php echo $post['keterangan']; ?></td>
						<td><?php echo $jumlah ?></td>

					</tr>	
				<?php endforeach ?>
				<tr style=" background-color:#002038;color: white;  ">
					<td colspan="3">JUMLAH</td>
					<td colspan="1" align="right"><b><?php echo rupiah($totaloperasionalbabeq);  ?> </b></td>
				</tr>
			</table>
			
		</div>
	</div>
	
</body>
</html>