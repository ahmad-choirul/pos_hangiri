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

</head>
<body>
	<div id="strukkasir">
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
					<?=date('d M Y')?> | <?= $pegawai; ?> | <?php echo $statppn ?>
				</div>
			</div>

			<div class="nota">
				<?=$penjualan?> | <?= $pelanggan; ?>
			</div>

			<div class="separate"></div>

			<div class="transaction">
				<table class="transaction-table" cellspacing="0" cellpadding="0">
					<table style="font-size:10px;line-height: 8px; width: 90%" border="0" >
						<!-- /.LOOPING DARI SINI-->
						<?php
						$total = 0;
						foreach ($keranjang as $key) : ?>
							<tr>
								<td colspan="2" style="text-transform: uppercase;">
									<?=$key['nama_item']?>
								</td>
							</tr>
							<tr>
								<td style="font-size: 9px; line-height: 7px;" >
									<?=$key['kuantiti']?>x	<? echo setrupiah($key['harga']); ?></td>
									<td style="font-size: 9px;line-height: 7px; text-align: left; "><?php echo setrupiah($key['harga']);?></td>
									<td style="font-size: 9px;line-height: 7px; text-align: right; "><?php echo setrupiah($key['total']);?></td>
								</tr>
								<!-- /.sampai SINI-->
								<?php 
								$total += $key['total'];
								$ppn = $total*10/100;
								?>
							<?php endforeach ?>
						</table>
					</table>
<!-- 
			<table style="font-size:8px;" border="0" width="90%">
				<tr>
					<td></td>
					<td style="text-align: left;"></td>
					<td></td>
					<td></td> -->

					<table  border="0" width="95%" >
						<tr>
							<td style="font-size:9px;text-align: right; margin-right: 5px;text-transform: uppercase; ">Jumlah</td>
							<td style="font-size:9px;text-align: left; margin-right: 10px;float: right; "><?php echo setrupiah($total); ?></td>
							<td style="font-size:8px;text-align: right; margin-right: 10px;float: right; "> </td>
						</tr>
						<?php if ($statppn=='ppn'): ?>
							<tr>
								<td style="font-size:9px;text-align: right; margin-right: 5px;text-transform: uppercase; ">PPN (10%)</td>
								<td style="font-size:9px;text-align: left; margin-right: 10px;float: right; "><?php echo setrupiah($ppn); ?></td>
								<td style="font-size:9px;text-align: right; margin-right: 10px;float: right; color: white; "> </td>
							</tr>
							<tr>
								<td style="font-size:9px;text-align: right; margin-right: 5px;text-transform: uppercase; ">Total</td>
								<td style="font-size:9px;text-align: left; margin-right: 10px; float: right;"><?php $total=$total+$ppn; echo setrupiah($total); ?></td>

								<td style="font-size:8px;text-align: right; margin-right: 10px;float: right; color: white; "> </td>
							</tr>
						<?php endif ?>
						<?php 
						$hasil_potongan=0;
						if ($potongan!=0): ?>
							<tr>
								<td style="font-size:9px;text-align: right; margin-right: 5px;text-transform: uppercase; ">Diskon <?php echo $potongan; ?> %</td>
								<td style="font-size:9px;text-align: left; margin-right: 10px; float: right;"><?php $hasil_potongan=($potongan/100)*$total; echo setrupiah($hasil_potongan); ?></td>

								<td style="font-size:8px;text-align: right; margin-right: 10px;float: right; color: white; "> </td>
							</tr>
						<?php endif ?>
						<tr>
							<td style="font-size:9px;text-align: right; margin-right: 5px;text-transform: uppercase; ">Bayar</td>
							<td style="font-size:9px;text-align: left; margin-right: 10px; float: right;"><?php echo setrupiah($totalbayar); ?></td>
							<td style="font-size:8px;text-align: right; margin-right: 10px;float: right; color: white; "> </td>
						</tr>
						<tr>
							<td style="font-size:9px;text-align: right; margin-right: 5px;text-transform: uppercase; ">Kembali</td>
							<td style="font-size:9px;text-align: left; margin-right: 10px;float: right; "><?php echo setrupiah($totalbayar-($total-$hasil_potongan)); ?></td>
							<td style="font-size:8px;text-align: right; margin-right: 10px;float: right; color: white; "> </td>
						</tr>
						<tr>
							<td style="font-size:9px;text-align:left;  " ><b>Catatan : </b></td>
						</tr>
						<tr>
							<td colspan="3" style="font-size:9px;"> ---  <?php echo $catatan; ?> -----</td>

						</tr>

					</table>
					<br>
				</div>
			</div>
		</div>



		<div id="strukdapur"> 
			<div class="content" >
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
		</div>
		<script type="text/javascript">

			function printDiv(divName) {
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;

				document.body.innerHTML = printContents;

				window.print();

				document.body.innerHTML = originalContents;
			}

			printDiv('strukkasir');

setTimeout(function(){
			printDiv('strukdapur');  
},3000);

setTimeout(function(){
			self.close();  
},5000);

</script>
<?php 
function setrupiah($angka)
{
	$hasil = "Rp. ".number_format($angka,2,',','.');
	return $hasil;
} ?>
</body>
</html>