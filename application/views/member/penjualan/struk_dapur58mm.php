<html moznomarginboxes mozdisallowselectionprint>
<head>
	<title>
		kode transaksi - <?php echo $no_transaksi;?>
	</title>
	<style type="text/css">
		html {
			font-family: "Arial Narrow";
		}
		.content {
			width: 50mm;
			font-size: 8px;
			padding: 5px;
		}
		.content .title {
			text-align: left;
			font-size: 10px;
			line-height: 11px;
			text-decoration: bold;
			margin-left: -2%;
		}
		.content .subtitle {
			margin-left: -2%;
			text-align: center;
			font-size: 10px;
			line-height: 11px;
			text-decoration: bold;
		}
		.content .head-desc {
			margin-top: 10px;
			display: table;
			width: 100%;
		}
		.date{
			font-size: 10px;
		}
		.user{
			font-size: 10px;
		}
		.content .head-desc > div {
			display: table-cell;
		}
		.content .head-desc .user {
			text-align: right;
		}
		.content .nota {
			text-align: left;
			margin-top: 5px;
			margin-bottom: 5px;
			font-size: 10px;
			line-height: 9px;
		}
		.content .separate {
			margin-top: 10px;
			margin-bottom: 10px;
			border-top: 1px dashed #000;
		}
		.content .transaction-table {
			width: 90%;
			font-size: 10px;
		}
		.content .transaction-table .name {
			width: 185px;
		}
		.content .transaction-table .qty {
			text-align: center;
		}
		.content .transaction-table .sell-price, .content .transaction-table .final-price {
			text-align: right;
			width: 65px;
		}
		.content .transaction-table tr td {
			vertical-align: top;
		}
		.content .transaction-table .price-tr td {
			padding-top: 7px;
			padding-bottom: 7px;
		}
		.content .transaction-table .discount-tr td {
			padding-top: 7px;
			padding-bottom: 7px;
		}
		.content .transaction-table .separate-line {
			height: 1px;
			border-top: 1px dashed #000;
		}
		.content .thanks {
			margin-top: 15px;
			text-align: center;
		}
		.content .azost {
			margin-top:5px;
			text-align: center;
			font-size:10px;
		}
		@media print {
			@page  { 
				width: 80mm;
				margin: 0mm;
			}
		}

	</style>
	<script type="text/javascript">
		window.print();
		window.location('<?php echo site_url('penjualan/kasir?statppn=ppn&stattrans=dinein') ?>') 

	</script>

</head>
<body>
	<div class="content" >
		<div class="title">
			<?php 
			echo htmlspecialchars("
				Jl. Wijaya Kusuma No.50
				");
			echo "<br>";
			?>
		</div>
		<div class="subttitle">
			<?php
			echo htmlspecialchars("Kec. Patrang, Kabupaten Jember,68118");
			?>
		</div>

		<div class="head-desc">
			<div class="date">
				<?=date('d M Y')?> | <?= $pegawai; ?>
			</div>
		</div>

		<div class="nota">
			<?=$penjualan?> | <?= $pelanggan; ?>
		</div>

		<div class="separate"></div>

		<div class="transaction">
					<h3>STRUK PENJUALAN UNTUK DAPUR</h3>
					<hr>
					<table  border="0" width="100%" >
						<?php
						foreach ($keranjang as $key) : ?>
							<tr>

								<td style="font-size:9px;text-align:left;  " >
									<?=$key['nama_item']?>   x <?=$key['kuantiti']?>
								</td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td style="font-size:9px;text-align:left;  " ><b>Catatan : </b></td>
						</tr>
						<tr>
							<td style="font-size:9px;text-align:left; "> ~ <?php echo $catatan; ?> ~</td>
						</tr>
					</table>
		</div>
	</div>
</body>
</html>