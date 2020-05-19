<html moznomarginboxes mozdisallowselectionprint>
<head>
	<title>
		kode transaksi - <?php echo $no_transaksi;?>
	</title>
	<style type="text/css">
		html {
			font-family: "Verdana";
		}
		.content {
			width: 58mm;
			font-size: 8px;
			padding: 5px;
		}
		.content .title {
			text-align: center;
			font-size: 10px;
			line-height: 11px;
			text-decoration: bold;
			margin-left: -2%;
		}
		.content .subtitle {
			margin-left: -2%;
			text-align: center;
			font-size: 9px;
			line-height: 11px;
			text-decoration: bold;
		}
		.content .head-desc {
			margin-top: 10px;
			display: table;
			width: 100%;
		}
		.content .head-desc > div {
			display: table-cell;
		}
		.content .head-desc .user {
			text-align: right;
		}
		.content .nota {
			text-align: center;
			margin-top: 5px;
			margin-bottom: 5px;
			font-size: 8px;
			line-height: 8px;
		}
		.content .separate {
			margin-top: 10px;
			margin-bottom: 10px;
			border-top: 1px dashed #000;
		}
		.content .transaction-table {
			width: 100%;
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
		setTimeout(function () { window.close(); }, 3000);
	</script>

</head>
<body>
	<div class="content" >
		<div class="title">
			<?php 
			echo htmlspecialchars("
				Jl. Wijaya Kusuma No.50, Pagah, Jemberlor
				");
			echo "<br>";
			?>
		</div>
		<div class="subttitle">
			<?php
			echo htmlspecialchars("	Kec. Patrang, Kabupaten Jember, Jawa Timur 68118");
			?>
		</div>

		<div class="head-desc">
			<div class="date">
				<?=date('d M Y')?>
			</div>
			<div class="user">
				<?= $spg; ?>

			</div>
		</div>

		<div class="nota">
			<?=$penjualan?>
		</div>

		<div class="separate"></div>

		<div class="transaction">
			<table class="transaction-table" cellspacing="0" cellpadding="0">
				<table style="font-size:10px;line-height: 8px; width: 90%" border="0" >
					<!-- /.LOOPING DARI SINI-->
					<?php
					$ttl1 = 0;
					$ttl2 = 0;
					foreach ($keranjang as $key) : ?>
						<tr>
							<td colspan="2" style="text-transform: uppercase;">
								<?=$key['nama_item']?>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;" >
								<? echo setrupiah($key['harga']); ?> X <?=$key['kuantiti']?>
							</td style="text-align: right;" >
							<td style="text-align: right;"><?php echo setrupiah($key['harga']);?></td>
							<td style="text-align: right;"><?php echo setrupiah($key['total']);?></td>
						</tr>
						<!-- /.sampai SINI-->
						<?php 
						$ttl1 += $key['total'];
						$ttl2 += $key['total'];
						$ppn = $ttl1*10/100;
						$end = $ttl1+$ppn;
						?>
					<?php endforeach ?>
				</table>
			</table>

			<table style="font-size:8px;" border="0" width="90%">
				<tr>
					<td></td>
					<td style="text-align: left;"></td>
					<td></td>
					<td></td>
					<td style="text-align: left; width: 40%; font-size: 10px;">Jumlah <br>PPN (10%) <br> Bayar  <br>
					Kembali</td>

						<td style="text-align: right; width: 35%;"><?php echo setrupiah($end); ?><br><?php echo setrupiah($ppn); ?><br><?php echo setrupiah($totalbayar); ?> <br><?php echo setrupiah($totalbayar-$ttl1); ?></td>
					</tr>
				</table>

			</div>
		</div>
		<?php 
		function setrupiah($angka)
		{
			$hasil = "Rp. ".number_format($angka,2,',','.');
			return $hasil;
		} ?>
	</body>
	</html>