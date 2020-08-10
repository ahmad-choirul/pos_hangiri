<!DOCTYPE html>
<html>
<head>
	<title>laporan Operasional</title>
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
			<table style="white-space: nowrap; max-width: 1200px; width: 100%;" class="table table-bordered">
				<tr  style="background-color: white;"><td colspan="8" style="background-color: #570119; text-align: center;color: white;">	<h2> LAPORAN OPERASIONAL HANGIRI</h2></td></tr>
				<tr  style="background-color: white;">
					<th>NO</th>
					<th>Tanggal Pengeluaran</th>
					<th>Total Pengeluaran</th>

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
						<td><?php echo $jumlah ?></td>

					</tr>	
				<?php endforeach ?>
				<tr style=" background-color:#002038;color: white;  ">
					<td colspan="2">JUMLAH</td>
					<td colspan="1" align="right"><b><?php echo rupiah($totaloperasionalhangiri);  ?> </b></td>
				</tr>
			</table>
			<br>
			<table style="white-space: nowrap; max-width: 1200px; width: 100%;" class="table table-bordered">
				<tr  style="background-color: white;">
					<td colspan="8" style="background-color: #570119; text-align: center;color: white;">	<h2> LAPORAN OPERASIONAL BABEQ</h2></td>
				</tr>
				<tr  style="background-color: white;">
					<th>NO</th>
					<th>Tanggal Pengeluaran</th>
					<th>Total Pengeluaran</th>

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
						<td><?php echo $jumlah ?></td>

					</tr>	
				<?php endforeach ?>
				<tr style=" background-color:#002038;color: white;  ">
					<td colspan="2">JUMLAH</td>
					<td colspan="1" align="right"><b><?php echo rupiah($totaloperasionalbabeq);  ?> </b></td>
				</tr>
			</table>
			
		</div>
	</div>
	
</body>
</html>