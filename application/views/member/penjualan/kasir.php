<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>  
	<meta charset="UTF-8"> 
	<link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon.png" type="image/ico">   
	<title>Babe'Q Resto</title>    
	<meta name="author" content="Paber"> 
	<!-- Mobile Metas -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
	<meta name="viewport" content="width=1366,height=768">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme.css" /> 
	<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/skins/default.css" /> 
	<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme-custom.css"> 
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/isotope/jquery.isotope.css" />
	<script src="<?php echo base_url()?>assets/vendor/modernizr/modernizr.js"></script>  

	<!-- datepicer -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/javascripts/jquery-ui.css">
	<script src="<?php echo base_url()?>assets/javascripts/jquery-1.12.4.js"></script> 
	<script src="<?php echo base_url()?>assets/javascripts/jquery-ui.js"></script>
	<script>
		$( function() {
			$("#datepicker").datepicker({ dateFormat: "yyyy-mm-dd", changeMonth: true, changeYear: true });
		});
	</script>

	<style type="text/css">
		.nama_produk{
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			line-height: 18px;     /* fallback */
			height: 45px;      /* fallback */
			max-height: 39px;      /* fallback */
			-webkit-line-clamp: 2; /* number of lines to show */
			-webkit-box-orient: vertical;
		}
		.fit-image{
			width: 100%;
			object-fit: cover;
			height: 120px; /* only if you want fixed height */
		}
		.panel-featured-primary{
			margin-top:-15px;
		} 
	</style>
</head>
<?php 
if ($this->input->get('statppn')=='nonppn') {
	$statppn='nonppn';
}else if($this->input->get('statppn')=='grab') {
	$statppn='grab';
}else if($this->input->get('statppn')=='gojek') {
	$statppn='gojek';
}
else{
	$statppn='ppn';
}

if ($this->input->get('stattrans')=='dinein') {
	$stattrans='dinein';
}else{
	$stattrans='takeaway';
}

if ($this->input->get('resto')=='hangiri') {
	$resto='hangiri';
}else{
	$resto='babe-q';
}

if ($this->input->get('potongan')=='10') {
	$potongan='10';
}elseif($this->input->get('potongan')=='20') {
	$potongan='20';
}elseif($this->input->get('potongan')=='30') {
	$potongan='30';
}elseif($this->input->get('potongan')=='100') {
	$potongan='100';
}
else{
	$potongan='0';
}

if ($this->input->get('potonganrp')!='') {
	$potonganrp=$this->input->get('potonganrp');
}
else{
	$potonganrp='0';
}
?>
}
<body class="bgbody">
	<section class="body">
		<!-- start: header -->

		<header class="header">
			<div class="logo-container">
				<a href="<?php echo base_url()?>" class="logo">
					<img src="<?php echo base_url()?>assets/images/logo.png" height="35" alt="Logo" />
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<div class="header-right">    
				<ul class="notifications">
			<!--
		        <li>
		        <a href="#" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
		        	<i class="fa  fa-list"></i> Retur</a>
		        </li> 
		    -->
		    <?php if( $this->session->userdata('kategori')==31){?>
		    	<li>
		    		<a href="<?php echo base_url()?>dashboard" type="button" class="mb-xs mt-xs mr-xs btn btn-success">
		    			<i class="fa  fa-home"></i> Halaman Utama</a>
		    		</li>
		    		<?php
		    	}?>
		    	<li>
		    		<a href="<?php echo site_url('laporan/penjualan') ?>" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
		    			<i class="fa  fa-list"></i> Laporan Penjualan</a>
		    		</li> 
		    		<li>
		    		<a href="#" data-toggle="modal" data-target="#modal-hold" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
		    			<i class="fa  fa-list"></i> Data Hold</a>
		    		</li> 
		    	</ul>


		    	<span class="separator"></span> 
		    	<div id="userbox" class="userbox">
		    		<a href="#" data-toggle="dropdown"> 
		    			<div class="profile-info">
		    				<span class="name"><?php echo $this->session->userdata('nama_admin');?></span>
		    				<span class="role"><?php echo $this->session->userdata('nama_kategori');?></span>
		    			</div>
		    			<i class="fa custom-caret"></i>
		    		</a> 
		    		<div class="dropdown-menu">
		    			<ul class="list-unstyled">
		    				<li class="divider"></li>
		    				<li>
		    					<a role="menuitem" tabindex="-1" href="<?php echo base_url()?>password"><i class="fa fa-lock"></i> Ganti Password</a>
		    				</li>
		    				<li>
		    					<a role="menuitem" href="<?php echo base_url()?>dashboard/logout"><i class="fa fa-power-off"></i> Logout</a>
		    				</li>
		    			</ul>
		    		</div>
		    	</div>
		    </div>
		    <!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">  
			<!-- start: page -->
			<div class="row">
				<div class="col-md-12  col-xl-5 col-lg-5"> 
					<section class="panel-featured-left panel-featured-primary">
						<div class="panel-body">   
							<div class="input-group mb-md">
								<!-- <input type="text" class="form-control" value="Walk in Customer" readonly="" id="customer"> -->
								<input type="hidden" name="customer" id="customer_dipilih">
								<form>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Jenis Penjualan</label>
												<select class="form-control cara_bayar" name="statppn" id="statppn" onchange='this.form.submit()'>
													<option value="ppn">PPN</option>
													<option <?php if ($statppn == 'nonppn' ) echo 'selected' ; ?> value="nonppn">NonPPN</option>
													<option <?php if ($statppn == 'grab' ) echo 'selected' ; ?> value="grab">Grab</option>
													<option <?php if ($statppn == 'gojek' ) echo 'selected' ; ?> value="gojek">Gojek</option>
												</select> 
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Jenis Transaksi</label>
												<select class="form-control cara_bayar" name="stattrans" id="stattrans" onchange='this.form.submit()'>
													<option value="dinein">Dine In</option>
													<option <?php if ($stattrans == 'takeaway' ) echo 'selected' ; ?> value="takeaway">Take Away</option>
												</select> 
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Diskon</label>
												<select class="form-control potongan" name="potongan" id="potongan" onchange='this.form.submit()'>
													<option value="0">Tanpa Diskon</option>
													<option <?php if ($potongan == '10' ) echo 'selected' ; ?> value="10">Disc 10%</option>
													<option <?php if ($potongan == '20' ) echo 'selected' ; ?> value="20">Disc 20%</option>
													<option <?php if ($potongan == '30' ) echo 'selected' ; ?> value="30">Disc 30%</option>
													<option <?php if ($potongan == '100' ) echo 'selected' ; ?> value="100">Disc 100% maks 50k</option>
												</select> 
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="form-control">Potongan</label>
												
											</div>
										</div><div class="col-md-3">
											<div class="form-group">
												<input type="text" placeholder="Nominal Potongan" id="potonganrp" name="potonganrp" value="<?php echo $potonganrp ?>" class="form-control mask_price">
											</div></div>
											<div class="col-md-4">
											<div class="form-group">
												<select class="form-control resto" name="resto" id="resto" onchange='this.form.submit()'>
													<option <?php if ($resto == 'hangiri' ) echo 'selected' ; ?> value="hangiri">Hangiri</option>
													<option <?php if ($resto == 'babe-q' ) echo 'selected' ; ?> value="babe-q">Babe-q</option>
												</select> 
											</div>
										</div>
										</div>


									</form>
							<!-- 	<div class="input-group-btn">
									<button tabindex="-1" class="btn btn-primary" type="button">Pembeli</button>
									<button tabindex="-1" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button" aria-expanded="false">
										<span class="caret"></span>
									</button>
									<ul role="menu" class="dropdown-menu pull-right">
										<li><a href="#" data-toggle="modal" data-target="#tambahData">Customer Baru</a></li>
										<li><a href="#" data-toggle="modal" data-target="#modal-pembeli">Data Customer</a></li>
									</ul>
								</div> -->
							</div>
							<!-- <div class="input-group mb-md">
								<span class="input-group-addon btn-primary"><i class="fa fa-barcode"></i></span>
								<input type="text" class="form-control"  onkeyup="barcode(this)" id="barcode" placeholder="Barcode Scan">
							</div>   -->
						</div>
					</section>
					<br/>
					<section class="panel-featured-left panel-featured-primary">
						<div class="panel-body  table-responsive"   style="max-height:300px;" id="Keranjang">   
							<table class="table table-responsive table-bordered table-hover table-striped dataTable no-footer">
								<thead>
									<tr>
										<th>Produk</th>
										<th>Kuantiti</th>
										<th>Harga</th>
										<th>Diskon</th> 
										<th>Total</th> 
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="6" align="center"> Belum ada produk dipilih</td> 
									</tr>   
								</tbody>		 
							</table> 
						</div>
					</section> 
					<section class="panel-featured-left panel-featured-primary">

						<div class="panel-body" id="TotalBiaya"> 
							<table class="table table-striped"> 
								<tr>
									<th style="text-align: left;">Sub Total</th>
									<th style="text-align: right;">Rp 0</th>
								</tr> 
								<tr  class="primary">
									<th style="text-align: left;">Total</th>
									<th style="text-align: right;">Rp 0</th>
								</tr> 
							</table>
						</div>
					</section>
					<section class="panel-featured-left panel-featured-primary">  
						<div class="panel-body"> 
							<div class="row">
								<div class="col-md-12"> 
									<button type="button" data-toggle="modal" data-target="#modal-payment" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block" id="paymenttransaksi" disabled="disabled">Bayar</button>
								</div>
							</div>
						</div>
					</section>
				</div> 
				<div class="col-md-12 col-lg-7 col-xl-7"> 
					<section class="panel-featured-right panel-featured-primary">
						<div class="panel-body"> 
							<div class="input-group mb-md">
								<input type="text" class="form-control" id="keywords" placeholder="Search Product Keyword" onkeyup="searchFilter()">
								<a class="input-group-addon btn-success btn"><i class="fa fa-search"></i></a>
								<select id="sortkategori" onchange="searchFilter()" class="form-control">
									<option value="">Semua</option>
									<option value="1">Makanan</option>
									<option value="2">Minuman</option>
								</select>
								
								
							</div>

							<div class="row mg-files" id="HalamanProduk" style="max-height: 500px;overflow-y: scroll;">

								<?php if($loop): foreach($loop as $key): ?>
									
									<div class="col-sm-12 col-md-3 col-lg-3">

										<div class="thumbnail">
											<div class="thumb-preview"> 
												<img src="<?php echo base_url()?>/images/<?php echo $key['gambar']; ?>" class="img-responsive fit-image" alt="Foto Produk"> 
											</div>
											<span class="mg-title nama_produk">
												<?php echo $key['nama_item']; ?>
											</span>
											<div class="row">
												<div class="col-md-12"> 
													<span class="text-bold">
														<?php echo rupiah($key['harga_jual']); ?> /
														<?php echo rupiah($key['harga_jual2']); ?>
													</span>
												</div> 
											</div>
											<div class="row">
												<div class="col-md-12">  
													<a id="beli-item<?php echo $key['kode_item']; ?>" class="btn btn-lg btn-success btn-block"  onclick="beli(this)" data-barcode="<?php echo $key['kode_item']; ?>"><i class="fa fa-shopping-cart"></i> Beli Produk</a> 
												</div> 
											</div>  
										</div>

									</div> 
								<?php endforeach; else: ?>

								<div class="col-sm-12 col-md-12 col-lg-12">
									<p>Product not available.</p>
								</div>
							<?php endif; ?>

							<div class="col-sm-12 col-md-12 col-lg-12">
								<ul class="pagination">
									<?php echo $this->ajax_pagination->create_links(); ?>
								</ul>
							</div>
							<!-- END PRoduct-->

						</div> 
					</div>
				</section> 
			</div>  
		</div> 
		<!-- end: page --> 
	</div>
</section>

<!-- <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<section class="panel panel-primary">
				<?php echo form_open('master/pembelitambah',' id="FormulirTambah"');?>  
				<header class="panel-heading">
					<h2 class="panel-title">Tambah pembeli</h2>
				</header>
				<div class="panel-body">
					<div class="form-group mt-lg nama_pembeli">
						<label class="col-sm-3 control-label">Nama Apotek<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="nama_pembeli" class="form-control" required/>
						</div>
					</div>

					<div class="form-group alamat">
						<label class="col-sm-3 control-label">Alamat Apotek<span class="required">*</span></label>
						<div class="col-sm-9">
							<textarea rows="2" class="form-control" name="alamat" required></textarea>
						</div>
					</div>
					<div class="form-group mt-lg nama_pembeli">
						<label class="col-sm-3 control-label">Kontak Apotek<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="hp" class="form-control" required/>
						</div>
					</div>
					<div class="form-group mt-lg ">
						<label class="col-sm-3 control-label">Nomor NPWP<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="no_npwp" class="form-control" required/>
						</div>
					</div>
					<div class="form-group mt-lg ">
						<label class="col-sm-3 control-label">Nama NPWP<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="nama_npwp" class="form-control" required/>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Alamat NPWP<span class="required">*</span></label>
						<div class="col-sm-9">
							<textarea rows="2" class="form-control" name="alamat_npwp" required></textarea>
						</div>
					</div>
					<div class="form-group mt-lg nama_pembeli">
						<label class="col-sm-3 control-label">Nama Bank<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="bank" class="form-control" required/>
						</div>
					</div>
					<div class="form-group mt-lg nama_pembeli">
						<label class="col-sm-3 control-label">No Rekening<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="rekening" class="form-control" required/>
						</div>
					</div>
					<div class="form-group mt-lg nama_pembeli">
						<label class="col-sm-3 control-label">Rekening Atas Nama<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="an" class="form-control" required/>
						</div>
					</div>
					<div class="form-group no_apoteker">
						<label class="col-sm-3 control-label">No Ijin Apoteker<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="no_apoteker" class="form-control" required/>
						</div>
					</div>
					<div class="form-group masa_apoteker">
						<label class="col-sm-3 control-label">Masa Berlaku<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="masa_apoteker" class="form-control tanggal_masa" data-plugin-datepicker required/>
						</div>
					</div>
					<div class="form-group apoteker">
						<label class="col-sm-3 control-label">Apoteker<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="apoteker" class="form-control" required/>
						</div>
					</div>
					<div class="form-group alamat_apoteker">
						<label class="col-sm-3 control-label">Alamat KTP Apoteker<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="alamat1_apoteker" class="form-control" required/>
						</div>
					</div>
					<div class="form-group alamat_apoteker">
						<label class="col-sm-3 control-label">Alamat Tinggal Apoteker<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="alamat2_apoteker" class="form-control" required/>
						</div>
					</div>

					<div class="form-group telepon">
						<label class="col-sm-3 control-label">Kontak Apoteker<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="telepon" class="form-control" required />
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">No SIPA/SIKA<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="no_sipa" class="form-control" required/>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Masa Berlaku SIPA/SIKA<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="tanggal_sipa" class="form-control tanggal_sipa" data-plugin-datepicker required/>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Nama TTK yang didelegasikan<span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="nama_ttk" class="form-control" required/>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary modal-confirm" type="submit" id="submitform">Submit</button>
							<button class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</footer>
			</form>
		</section>
	</div>
</div>
</div> -->

<div class="modal fade" id="modal-pembeli"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<section class="panel panel-primary">   
				<header class="panel-heading">
					<h2 class="panel-title">Data Customer</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-striped" id="pembelidata">
						<thead>
							<tr>
								<th>Nama Apotek</th>
								<th>No HP</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
							</tr>  
						</tbody>
					</table> 
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</footer> 
			</section>
		</div>
	</div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<section class="panel  panel-danger">
				<header class="panel-heading">
					<h2 class="panel-title">Konfirmasi Pembatalan</h2>
				</header>
				<div class="panel-body">
					<div class="modal-wrapper">
						<div class="modal-icon">
							<i class="fa fa-question-circle"></i>
						</div>
						<div class="modal-text">
							<h4>Yakin ingin membatalkan transaksi ?</h4> 
						</div>
					</div>
				</div>
				<footer class="panel-footer"> 
					<div class="row">
						<div class="col-md-12 text-right"> 
							<button type="submit" class="btn btn-danger" id="Batalkan">Ya, Saya Yakin</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</footer>
			</section>  
		</div>
	</div>
</div>
<div class="modal fade" id="modalHold" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content"> 
			<?php echo form_open('penjualan/holdtransaksi',' id="FormulirHold"');?>  
			<section class="panel  panel-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Konfirmasi Hold Transaksi </h2>
				</header>
				<div class="panel-body">
					<div class="modal-wrapper">
						<div class="modal-icon">
							<i class="fa fa-question-circle"></i>
						</div>
						<div class="modal-text">
							<h4>Yakin ingin hold transaksi ini ?</h4> 
						</div>
						<div class="form-group keterangan_hold">
							<div class="col-sm-12">
								<textarea rows="2" placeholder="Tambahkan Keterangan" maxlength="100" class="form-control" name="keterangan_hold"></textarea>
							</div>
						</div>
					</div>
				</div> 
				<footer class="panel-footer"> 
					<div class="row">
						<div class="col-md-12 text-right"> 
							<input type="hidden" name="idd" id="idddelete">
							<button type="submit" class="btn btn-danger" id="submitformHold">Ya, Saya Yakin</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>							   
						</div>
					</div>
				</footer>
			</section>     
		</form>  
	</div>
</div>
</div>

<div class="modal fade" id="modal-hold"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<section class="panel panel-primary">   
				<header class="panel-heading">
					<h2 class="panel-title">Data Hold</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-striped" id="listhold">
						<thead>
							<tr>
								<th>No</th>
								<th>Keterangan</th>
								<th>Waktu</th> 
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table> 
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</footer> 
			</section>
		</div>
	</div>
</div>


<div class="modal fade bd-example-modal-lg" id="modal-payment"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:60%">
		<div class="modal-content">
			<?php echo form_open('penjualan/submitpayment',' id="FormulirPayment"');?> 
			<input type="hidden" name="post_totalbelanja" id="post_totalbelanja" value="0">
			<section class="panel panel-primary">   
				<header class="panel-heading">	
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					<h2 class="panel-title">Checkout dan Pembayaran</h2>
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3"> 
							<div class="row">
								<div class="col-md-12"><br>
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-danger btn-lg btn-block" data-toggle="modal" data-dismiss="modal" data-target="#modalHapus" id="canceltransaksi">Cancel</button>
								</div>
								<div class="col-md-12"> 
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-warning btn-lg btn-block"  data-toggle="modal" data-dismiss="modal" data-target="#modalHold" id="holdtransaksi">Hold</button>
								</div>
							</div>
						</div> 
						<div class="col-md-9"> 
							<section class="panel"> 
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nama Kasir</label>
											<input type="hidden" name="nama_pegawai" id="nama_pegawai" value="<?php echo $this->session->userdata('idadmin'); ?>">
											<input type="text" class="form-control" readonly="readonly" value="<?php echo $this->session->userdata('nama_admin'); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">No Kartu</label>
											<input type="text" class="form-control" id="no_kartu" name="no_kartu">
										</div>
									</div>


								</div>

								<div class="row my-4">
									<div class="col-md-12">

									</div> 
								</div> 
								<div class="row my-5" id="tambah1">
									<div class="col-md-12">
										<div class="row form-group">

										</div>
									</div> 
								</div>
							</section>


							<section class="panel" id="formbayar2" >
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Total Dibayar</label>
											<input type="text" name="totalbayar" id="totalbayar" value="0" class="form-control mask_price" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group"> 
											<label class="control-label">Nama Pelanggan</label>
											<input type="text" autocomplete="off" name="nama_pelanggan" id="nama_pelanggan" class="form-control	">
										</div>
									</div> 
									<!-- <div class="col-md-6">
										<div class="form-group"> 
											<label class="control-label">Cara Bayar</label>
											<select class="form-control cara_bayar" name="cara_bayar[]" id="cara_bayar2">  
												<option value="cash">cash</option>
												<option value="credit card">credit card</option>
												<option value="debet">debet</option>
											</select> 
										</div>
									</div>  -->
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label"></label>
											<textarea rows="2" placeholder="Catatan Pembayaran" class="form-control" name="catatan[]" id="catatan"></textarea>
										</div>
									</div> 
								</div>  
							</section>
						</div> 
					</div> 
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover mb-none">
								<tr>
									<th>
										<?php if ($statppn=='ppn'): ?>
											<h4>Total Belanja + PPN </h4></th>
											<?php else: ?>
												<h4>Total Belanja</h4></th>
											<?php endif ?>
											<th>
												<h4 class="text-dark" id="TotalBelanja"></h4>
												<input type="hidden" id="TotalBelanjaInt">
											</th>
											<th><h4>Total Item</h4></th>
											<th><h4 class="text-dark" id="TotalKuantiti"></h4></th>
										</tr>
									</table>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12 text-right"> 
									<div class="row">
										<div class="col-md-6"> 	
											<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" id="paymenttransaksi">Bayar <small>(Tunai)</small></button>
										</div>
										<div class="col-md-6"> 	
											<button type="button" class="mb-xs mt-xs mr-xs btn btn-warning btn-lg btn-block" id="paymenttransaksiedc">Bayar <small>(EDC)</small></button>
										</div> 

									</div>
								</div>
							</div>
						</footer> 
					</section>
				</form>
			</div>
		</div>
	</div>


	<!-- Vendor -->
	<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>  
	<script src="<?php echo base_url()?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/isotope/jquery.isotope.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.js"></script>
	<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script> 
	<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script>  
	<script type="text/javascript">
		$(document).ready(function() {
			keranjang();
			searchFilter();
		});
	</script>
</script>
<script>   
	function paymentsubmit(total,dibayar){
		if(total <= dibayar){
			document.getElementById("submitPayment").removeAttribute('disabled'); 
		}else{
			document.getElementById("submitPayment").setAttribute('disabled','disabled');  
		}
	}
	$('#totaldibayar1').keyup(function(){  
		var totalbelanja = document.getElementById("TotalBelanjaInt").value; 
		var nilai_1 = $(this).val();    
		nilai_1 = nilai_1.replace(/\./g,'');
		var nilai_2 = document.getElementById("totaldibayar2").value; 
		nilai_2 = nilai_2.replace(/\./g,'');
		var nilaibayar = Number(nilai_1) + Number(nilai_2) ;
		var kembalian = (nilaibayar - totalbelanja) < 1 ? '0' : (nilaibayar - totalbelanja) ;
		$('#GrandTotalDibayar').html(formatNumber(nilaibayar)); 
		$('#Kembalian').html(formatNumber(kembalian)); 
		paymentsubmit(totalbelanja,nilaibayar);
	});  
	$('#totaldibayar2').keyup(function(){  
		var totalbelanja = document.getElementById("TotalBelanjaInt").value; 
		var nilai_2 = $(this).val();    
		nilai_2 = nilai_2.replace(/\./g,'');
		var nilai_1 = document.getElementById("totaldibayar1").value; 
		nilai_1 = nilai_1.replace(/\./g,'');
		var nilaibayar = Number(nilai_1) + Number(nilai_2) ; 
		var kembalian = (nilaibayar - totalbelanja) < 1 ? '0' : (nilaibayar - totalbelanja) ;
		$('#GrandTotalDibayar').html(formatNumber(nilaibayar)); 
		$('#Kembalian').html(formatNumber(kembalian)); 
		paymentsubmit(totalbelanja,nilaibayar);
	}); 
	
	$('#btntambah1').click(function(){  
		document.getElementById("tambah1").style.display = "none";  
		// document.getElementById("formbayar2").style.display = "block";  
	});
	$('#tutup1').click(function(){  
		document.getElementById("tambah1").style.display = "block";  
		// document.getElementById("formbayar2").style.display = "none";  
		$('#totaldibayar2').val('0'); 
		var totalbelanja = document.getElementById("TotalBelanjaInt").value; 
		var nilai_2 = 0;     
		var nilai_1 = document.getElementById("totaldibayar1").value; 
		nilai_1 = nilai_1.replace(/\./g,'');
		var nilaibayar = Number(nilai_1) + Number(nilai_2) ; 
		var kembalian = (nilaibayar - totalbelanja) < 1 ? '0' : (nilaibayar - totalbelanja) ;
		$('#GrandTotalDibayar').html(formatNumber(nilaibayar)); 
		$('#Kembalian').html(formatNumber(kembalian)); 
		paymentsubmit(totalbelanja,nilaibayar);
	});
	function cash(elem){ 
		var totalbelanja = document.getElementById("TotalBelanjaInt").value; 
		var nilai_1 = document.getElementById("totaldibayar1").value; 
		nilai_1 = nilai_1.replace(/\./g,'');
		var nilai_2 = document.getElementById("totaldibayar2").value; 
		nilai_2 = nilai_2.replace(/\./g,'');
		var nilaibayar = Number(nilai_1) + Number(nilai_2) ;
		var nominal = $(elem).data("nominal"); 
		nominal = nominal + Number(nilaibayar); 
		paymentsubmit(totalbelanja,nominal);
		var kembalian = (nominal - totalbelanja) < 1 ? '0' : (nominal - totalbelanja) ;
		nominal = formatNumber(nominal);
		$('#totaldibayar1').val(nominal); 
		$('#GrandTotalDibayar').html(formatNumber(nominal)); 
		$('#Kembalian').html(formatNumber(kembalian)); 
	}
	$('#totalharusdibayar').on("click", function (e) { 
		var totalbelanja = document.getElementById("TotalBelanjaInt").value; 
		var nilai_1 = document.getElementById("totaldibayar1").value; 
		nilai_1 = nilai_1.replace(/\./g,'');
		var nilai_2 = document.getElementById("totaldibayar2").value; 
		nilai_2 = nilai_2.replace(/\./g,'');
		var nilaibayar = Number(nilai_1) + Number(nilai_2) ;
		var nominal =document.getElementById("Valtotalharusdibayar").value; 
		nominal = Number(nominal) + Number(nilaibayar); 
		paymentsubmit(totalbelanja,nominal);
		var kembalian = (nominal - totalbelanja) < 1 ? '0' : (nominal - totalbelanja) ;
		nominal = formatNumber(nominal);
		$('#totaldibayar1').val(nominal); 
		$('#GrandTotalDibayar').html(formatNumber(nominal)); 
		$('#Kembalian').html(formatNumber(kembalian)); 
	});
	function formatNumber(num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
	}
	function clearcash(){  
		var totalbelanja = document.getElementById("TotalBelanjaInt").value;  
		var kembalian = 0 ;
		$('#totaldibayar1').val('0'); 
		$('#totaldibayar2').val('0'); 
		$('#GrandTotalDibayar').html(formatNumber(0)); 
		$('#Kembalian').html(formatNumber(kembalian)); 
		document.getElementById("tambah1").style.display = "block";  
			// document.getElementById("formbayar2").style.display = "none";  
			paymentsubmit(totalbelanja,0);
		}
		var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
		function pilihhold(elem){ 
			var idkeranjang = $(elem).data("id");  
			PNotify.removeAll();
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>penjualan/tampilkanhold',
				data: 'idkeranjang=' + idkeranjang,
				dataType 	: 'json',
				success: function(response) {           			
					$('#customer').val(response.nama_pembeli);      
					$('#customer_dipilih').val(response.id_pembeli); 
					keranjang(); 
					tablehold.ajax.reload();  
					$('#modal-hold').modal('hide');         
				}
			});    
		}  
		
		function beli(elem){            	 
			var kodebarcode = $(elem).data("barcode");   
			var statppn = '<?php echo $statppn; ?>';
			var stattrans = '<?php echo $stattrans; ?>';
			document.getElementById("beli-item"+kodebarcode).setAttribute('disabled','disabled'); 
			var pembeli = document.getElementById("customer_dipilih").value; 
			if(kodebarcode != ''){  
				$.ajax({
					type: 'GET',
					url: '<?php echo base_url()?>penjualan/tambahkeranjangbarcode',
					data: 'barcode=' + kodebarcode +'&pembeli='+pembeli+'&statppn='+statppn,
					dataType 	: 'json',
					success: function(response) {  
						if(response.response == '0'){
							new PNotify({
								title: 'Notifikasi',
								text: 'Kode Barcode Tidak Ditemukan',
								type: 'warning'
							}); 
						}else if(response.response == 'stok kosong'){
							new PNotify({
								title: 'Notifikasi',
								text: 'Stok Kosong',
								type: 'warning'
							});
						}else{
							keranjang()						 	  
							document.getElementById("beli-item"+kodebarcode).removeAttribute('disabled'); 
						}
					}
				});   
			}
		}
		function tambah(elem){      
			var idd = $(elem).data("kode");    
			document.getElementById("tambah"+idd).setAttribute('disabled','disabled'); 
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>penjualan/keranjangtambah',
				data: 'idd=' + idd,
				dataType 	: 'json',
				success: function(response) {    
					keranjang()
				}
			});   
		} 
		function kurang(elem){     
			var idd = $(elem).data("kode");   
			document.getElementById("kurang"+idd).setAttribute('disabled','disabled'); 
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>penjualan/keranjangkurang',
				data: 'idd=' + idd,
				dataType 	: 'json',
				success: function(response) {    
					keranjang()
				}
			});   
		}
		function hapus(elem){   
			var idd = $(elem).data("kode");   
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>penjualan/hapusbarangkeranjang',
				data: 'idd=' + idd,
				dataType 	: 'json',
				success: function(response) {    
					keranjang()
				}
			});   
		}

		function update_pembeli(){     
			var pembeli = document.getElementById("customer_dipilih").value; 
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>penjualan/update_pembeli',
				data: 'pembeli=' + pembeli,
				dataType 	: 'json',
				success: function(response) {   
					keranjang()
				}
			});    
		}
		function barcode(){   
			blurForm();  
			PNotify.removeAll();
			var kodebarcode = document.getElementById("barcode").value;
			var pembeli = document.getElementById("customer_dipilih").value;
			if(kodebarcode != ''){ 
				$.ajax({
					type: 'GET',
					url: '<?php echo base_url()?>penjualan/tambahkeranjangbarcode',
					data: 'barcode=' + kodebarcode +'&pembeli='+pembeli,
					dataType 	: 'json',
					success: function(response) {  
						if(response.response == '0'){
							new PNotify({
								title: 'Notifikasi',
								text: 'Kode Barcode Tidak Ditemukan',
								type: 'warning'
							}); 
						}else if(response.response == 'stok kosong'){
							new PNotify({
								title: 'Notifikasi',
								text: 'Stok Kosong',
								type: 'warning'
							});
						}else{
							keranjang(); 
						}
						$('#barcode').val('');$('#barcode').focus();
					}
				});   
			}
		}
        // document.getElementById("onwalkcustomer").addEventListener("click", function (e) {   
        //     $('#customer').val('Walk in Customer');      
        //     $('#customer_dipilih').val('');    
        //     update_pembeli();
        // });
        function pilihpembeli(elem){  
        	var namapembeli = $(elem).data("namapembeli"); 
        	var idpembeli = $(elem).data("id");
        	$('#customer').val(namapembeli);      
        	$('#customer_dipilih').val(idpembeli);    
        	$('#modal-pembeli').modal('hide');  
        	update_pembeli();
        }

        var tablepembeli = $('#pembelidata').DataTable({ 
        	"ajax": { 
        		url : "<?php echo base_url()?>penjualan/datapembeli", 
        		type : 'GET'
        	}, 
        });


        var tablehold = $('#listhold').DataTable({ 
        	"ajax": { 
        		url : "<?php echo base_url()?>penjualan/datahold", 
        		type : 'GET' 
        	}, 
        });	  
         function searchFilter(page_num) {
        	page_num = page_num?page_num:0;
        	var keywords = $('#keywords').val();
        	var sortkategori = $('#sortkategori').val();
        	$.ajax({
        		type: 'GET',
        		url: '<?php echo base_url(); ?>penjualan/ajaxPaginationData/',
        		data:'page='+page_num+'&keywords='+keywords+'&sortkategori='+sortkategori+'&sortBy='+'<?php echo $resto ?>',
        		beforeSend: function () {
        			$('.loading').show();
        		},
        		success: function (html) { 
        			$('#HalamanProduk').html(html);
        		}
        	});
        }
        // document.getElementById("FormulirTambah").addEventListener("submit", function (e) {  
        // 	blurForm();       
        // 	$('.help-block').hide();
        // 	$('.form-group').removeClass('has-error');
        // 	document.getElementById("submitform").setAttribute('disabled','disabled');
        // 	$('#submitform').html('Loading ...');
        // 	var form = $('#FormulirTambah')[0];
        // 	var formData = new FormData(form);
        // 	var xhrAjax = $.ajax({
        // 		type 		: 'POST',
        // 		url 		: $(this).attr('action'),
        // 		data 		: formData, 
        // 		processData: false,
        // 		contentType: false,
        // 		cache: false, 
        // 		dataType 	: 'json'
        // 	}).done(function(data) { 
        // 		if ( ! data.success) {	 
        // 			$('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
        // 			document.getElementById("submitform").removeAttribute('disabled');  
        // 			$('#submitform').html('Submit');    
        // 			var objek = Object.keys(data.errors);  
        // 			for (var key in data.errors) {
        // 				if (data.errors.hasOwnProperty(key)) { 
        // 					var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
        // 					$('.'+key).addClass('has-error');
        // 					$('input[name="' + key + '"]').after(msg);  
        // 					$('textarea[name="' + key + '"]').after(msg);  
        // 				}
        // 				if (key == 'fail') {   
        // 					new PNotify({
        // 						title: 'Notifikasi',
        // 						text: data.errors[key],
        // 						type: 'danger'
        // 					}); 
        // 				}
        // 			}
        // 		} else { 
        // 			$('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
        // 			PNotify.removeAll(); 
        // 			tablepembeli.ajax.reload();   
        // 			document.getElementById("submitform").removeAttribute('disabled'); 
        // 			$('#tambahData').modal('hide'); 
        // 			document.getElementById("FormulirTambah").reset();  
        // 			$('#submitform').html('Submit');   
        // 			new PNotify({
        // 				title: 'Notifikasi',
        // 				text: data.message,
        // 				type: 'success'
        // 			});    
        // 			$('#customer').val(data.pembeli);      
        // 			$('#customer_dipilih').val(data.id_pembeli);  
        // 			update_pembeli();
        // 			$('#tambahData').modal('hide');  
        // 		}
        // 	}).fail(function(data) {   
        // 		new PNotify({
        // 			title: 'Notifikasi',
        // 			text: "Request gagal, browser akan direload",
        // 			type: 'danger'
        // 		}); 
        // 		window.setTimeout(function() {  location.reload();}, 2000);
        // 	}); 
        // 	e.preventDefault(); 
        // }); 


        var idk;
        var idkd;

        var pegawai;
        pegawai = $("#nama_pegawai").val(); 

        function keranjang(){   
        	$('#cara_bayar1').val('cash'); 
        	$('#cara_bayar2').val('cash'); 
        	$('#totaldibayar1').val('0'); 
        	$('#totaldibayar2').val('0'); 
        	$('#GrandTotalDibayar').html('0');
        	var potonganrp=$("#potonganrp").val().replace(/\./g, "");

        	var jenis_penjualan = $('#jenis_penjualan').find(":selected").text();
        	var statppn = '<?php echo $statppn ?>';
			// document.getElementById("formbayar2").style.display = "";  
			$('#Kembalian').html('0'); 
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>penjualan/keranjangdetail/<?php echo $statppn ?>/<?php echo $potongan ?>/'+potonganrp, 
				dataType 	: 'json',
				success: function(response) { 

					if(response.datarows !=''){          
						var viewtotal='<table class="table table-striped">';
						var totalharusdibayar,totalharusdibayarInt,TotalKuantiti,TotalBelanja;
						$.each(response.datarows, function(i, item) { 
							
							viewtotal+='<tr>';
							viewtotal+='<th style="text-align: left;">Sub Total</th>';
							viewtotal+='<th style="text-align: right;">'+item.total_harga_item+'</th>';
							viewtotal+='</tr>'; 
							if (item.tambah_ppnint!='0') {
								viewtotal+='<tr>';
								viewtotal+='<th style="text-align: left;">PPN 10%</th>';
								viewtotal+='<th style="text-align: right;">'+item.tambah_ppn+'</th>';
								viewtotal+='</tr>'; 
							}
							if (item.besar_potonganint!='0') {
								viewtotal+='<tr>';
								viewtotal+='<th style="text-align: left;">potongan</th>';
								viewtotal+='<th style="text-align: right;">'+item.besar_potongan+'</th>';
								viewtotal+='</tr>'; 
							}
							viewtotal+='<tr  class="primary">';
							viewtotal+='<th style="text-align: left;">Total</th>';
							viewtotal+='<th style="text-align: right;">'+item.total+'</th>';
							viewtotal+='</tr> ';  
							totalharusdibayar = item.total;
							totalharusdibayarInt = item.totalInt;
							TotalKuantiti = item.totalKuantiti;
							TotalBelanja = item.total;
						}); 
						viewtotal+='</table>';
						$('#TotalBiaya').html(viewtotal);
						$('#TotalBelanja').html(TotalBelanja);
						
						$('#TotalBelanjaInt').val(totalharusdibayarInt);
						$('#post_totalbelanja').val(totalharusdibayarInt);
						$('#totalharusdibayar').html(totalharusdibayar);
						$('#TotalKuantiti').html(TotalKuantiti);
						$('#Valtotalharusdibayar').val(totalharusdibayarInt); 
					} else{ 
						var viewtotal ='<table class="table table-striped">'; 
						viewtotal+='<tr><th style="text-align: left;">Sub Total</th>';
						viewtotal+='<th style="text-align: right;">Rp 0</th>';
						viewtotal+='</tr>'; 
						viewtotal+='<tr  class="primary">';
						viewtotal+='<th style="text-align: left;">Total</th>';
						viewtotal+='<th style="text-align: right;">Rp 0</th>';
						viewtotal+='</tr></table>';
						$('#TotalBiaya').html(viewtotal);
						$('#totalharusdibayar').html('Rp 0');
					}
					if(response.datasub !=''){          
						var datarow='<table class="table table-responsive table-bordered table-hover table-striped dataTable no-footer" style="font-size:11px;">';
						datarow+='<thead>';
						datarow+='<tr><th>Produk</th><th>Kuantiti</th><th style="min-width:70px;">Harga</th><th style="min-width:70px;">Diskon</th><th style="min-width:90px;">Total</th><th></th></tr></thead><tbody>';            
						$.each(response.datasub, function(i, itemsub) {                         	
							datarow+='<tr>';
							datarow+='<td>'+itemsub.nama_item+'</td>';
							datarow+='<td>';
							datarow+='<div>';
							datarow+='<div class="input-group" style="width:110px;">';
							datarow+='<input type="text" readonly style="background-color:#fff;" value="'+itemsub.kuantiti+'" data-kode="'+itemsub.id+'"  class="spinner-input form-control" maxlength="3">';
							datarow+='<div class="spinner-buttons input-group-btn">';
							datarow+='<button type="button"   id="tambah'+itemsub.id+'" onclick="tambah(this)" data-kode="'+itemsub.id+'" class="btn btn-sm spinner-up">';
							datarow+='<i class="fa fa-angle-up"></i>';
							datarow+='</button>';
							datarow+='<button type="button" id="kurang'+itemsub.id+'" onclick="kurang(this)" data-kode="'+itemsub.id+'" class="btn btn-sm spinner-down">';
							datarow+='<i class="fa fa-angle-down"></i>';
							datarow+='</button>';
							datarow+='</div>';
							datarow+='</div>';
							datarow+='</div>';
							datarow+='</td>';
							datarow+='<td>'+itemsub.harga+'</td>';
							datarow+='<td>'+itemsub.diskon+'</td>';
							datarow+='<td>'+itemsub.total+'</td>';
							datarow+='<td><a class="btn btn-danger btn-xs"  onclick="hapus(this)" data-kode="'+itemsub.id+'" ><i class="fa fa-trash-o"></i></a></td>';
							datarow+='</tr>';   
							idk = itemsub.id_keranjang;
							idkd = itemsub.id;
						});
						datarow+='</tbody></table>';     
						$('#Keranjang').html(datarow);	                        	
						document.getElementById("canceltransaksi").removeAttribute('disabled');
						document.getElementById("holdtransaksi").removeAttribute('disabled');
						document.getElementById("paymenttransaksi").removeAttribute('disabled');
						// document.getElementById("paymenttransaksikredit").removeAttribute('disabled');	
					}else{

						var datarow='<table class="table table-responsive table-bordered table-hover table-striped dataTable no-footer" style="font-size:11px;">';
						datarow+='<thead>';
						datarow+='<tr><th>Produk</th><th>Kuantiti</th><th style="min-width:70px;">Harga</th><th style="min-width:70px;">Diskon</th><th style="min-width:90px;">Total</th><th></th></tr></thead><tbody>';
						datarow+='<tr><td colspan="6"align="center" >Belum ada produk dipilih</td></tr>'; 
						datarow+='</tbody></table>';    
						$('#Keranjang').html(datarow);	  
						document.getElementById("canceltransaksi").setAttribute('disabled','disabled');
						document.getElementById("holdtransaksi").setAttribute('disabled','disabled');
						document.getElementById("paymenttransaksi").setAttribute('disabled','disabled');
						// document.getElementById("paymenttransaksikredit").setAttribute('disabled','disabled');
					}
				}
			});  
} 
            //keranjang();
            /*paymenttransaksi
            paymenttransaksikredit*/
            $(document).on('click','#modal-payment #paymenttransaksi',function(e) { // tombol paymenttransaksi sg ono ng modal payment
            	// e.preventDefault()
            	var totalbayar=$("#totalbayar").val().replace(/\./g, "");
            	var potonganrp=$("#potonganrp").val().replace(/\./g, "");
            	var totalbelanja = document.getElementById("TotalBelanjaInt").value; 
            	var pelanggan = document.getElementById("nama_pelanggan").value; 
            	var catatan = document.getElementById("catatan").value; 
            	var statppn = '<?php echo $statppn; ?>'; 
            	var stattrans = '<?php echo $stattrans; ?>'; 
            	var potongan = '<?php echo $potongan ?>';
            	var resto = '<?php echo $resto ?>';
            	// var catatan = "catatan"; 
            	if (Number(totalbayar)>=Number(totalbelanja)) {
            		var pegawai;
            		pegawai = $("#nama_pegawai").val(); 
            		
            		// $('#modal-payment form').attr('action','<?=base_url()?>penjualan/struk?t='+idk+'&pegawai='+pegawai+'&pelanggan='+pelanggan+'&idd='+idkd+'&bayar='+totalbayar+'&catatan='+catatan+'&statppn='+statppn)
            		// .submit()
            		window.open('<?=base_url()?>penjualan/struk?t='+idk+'&pegawai='+pegawai+'&resto='+resto+'&pelanggan='+pelanggan+'&idd='+idkd+'&bayar='+totalbayar+'&catatan='+catatan+'&statppn='+statppn+'&stattrans='+stattrans+'&potongan='+potongan+'&potonganrp='+potonganrp,'_blank');
            		window.setTimeout(function() {  location.reload();}, 2000);
            		
            	}else{
            		window.setTimeout(function() {  
            			new PNotify({
            				title: 'Notifikasi',
            				text: 	'Maaf, periksa inputan total bayar anda (total bayar kurang dari total pesanan)',
            				type: 'warning',
            				addclass: 'stack-bottomright',
            				stack: stack_bottomright
            			}); 
            		}, 500); 

            	}          	
            })
            
             $(document).on('click','#modal-payment #paymenttransaksiedc',function(e) { // tombol paymenttransaksi sg ono ng modal payment
            	// e.preventDefault()
            	var totalbayar=$("#totalbayar").val().replace(/\./g, "");
            	var potonganrp=$("#potonganrp").val().replace(/\./g, "");
            	var totalbelanja = document.getElementById("TotalBelanjaInt").value; 
            	var pelanggan = document.getElementById("nama_pelanggan").value; 
            	var catatan = document.getElementById("catatan").value; 
            	var no_kartu = document.getElementById("no_kartu").value; 
            	var statppn = '<?php echo $statppn; ?>'; 
            	var stattrans = '<?php echo $stattrans; ?>'; 
            	var potongan = '<?php echo $potongan ?>';
            	var resto = '<?php echo $resto ?>'; 
            	// var catatan = "catatan"; 
            	if (no_kartu!='') {
            		if (Number(totalbayar)==Number(totalbelanja)) {
            			var pegawai;
            			pegawai = $("#nama_pegawai").val(); 
            		window.open('<?=base_url()?>penjualan/strukedc?t='+idk+'&pegawai='+pegawai+'&resto='+resto+'&pelanggan='+pelanggan+'&idd='+idkd+'&bayar='+totalbayar+'&catatan='+catatan+'&statppn='+statppn+'&stattrans='+stattrans+'&potongan='+potongan+'&no_kartu='+no_kartu+'&potonganrp='+potonganrp,'_blank');
            		window.setTimeout(function() {  location.reload();}, 2000);
            		
            	}else{
            		window.setTimeout(function() {  
            			new PNotify({
            				title: 'Notifikasi',
            				text: 	'Maaf, periksa inputan total bayar anda (total bayar harus sama dengan total pesanan)',
            				type: 'warning',
            				addclass: 'stack-bottomright',
            				stack: stack_bottomright
            			}); 
            		}, 500); 

            	}   
            }else{
            	window.setTimeout(function() {  
            		new PNotify({
            			title: 'Notifikasi',
            			text: 	'Maaf, No Kartu belum di isi',
            			type: 'warning',
            			addclass: 'stack-bottomright',
            			stack: stack_bottomright
            		}); 
            	}, 500); 

            }      	
        })

             document.getElementById("Batalkan").addEventListener("click", function (e) { 
             	PNotify.removeAll();
             	$.ajax({
             		type: 'GET',
             		url: '<?php echo base_url()?>penjualan/canceltransaksi', 
             		dataType 	: 'json',
             		success: function(response) {   
             			window.setTimeout(function() {  
             				new PNotify({
             					title: 'Notifikasi',
             					text: 	'Berhasil mereset transaksi',
             					type: 'success',
             					addclass: 'stack-bottomright',
             					stack: stack_bottomright
             				}); 
             				keranjang()				  
             				$('#customer').val('Walk in Customer');
             				$('#customer_dipilih').val('');
             				$('#modalHapus').modal('hide');
             			}, 500); 
             		}
             	});
             });

             document.getElementById("FormulirHold").addEventListener("submit", function (e) {  
             	blurForm();        
             	$('.help-block').hide();
             	$('.form-group').removeClass('has-error');
             	document.getElementById("submitformHold").setAttribute('disabled','disabled');
             	$('#submitformHold').html('Loading ...');
             	var form = $('#FormulirHold')[0];
             	var formData = new FormData(form);
             	var xhrAjax = $.ajax({
             		type 		: 'POST',
             		url 		: $(this).attr('action'),
             		data 		: formData, 
             		processData: false,
             		contentType: false,
             		cache: false, 
             		dataType 	: 'json'
             	}).done(function(data) { 
             		if ( ! data.success) {		 
             			$('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
             			window.setTimeout(function() {  
             				document.getElementById("submitformHold").removeAttribute('disabled');  
             				$('#submitformHold').html('Ya, Saya Yakin');     
             				var objek = Object.keys(data.errors);  
             				for (var key in data.errors) {
             					if (data.errors.hasOwnProperty(key)) { 
             						var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
             						$('.'+key).addClass('has-error');
             						$('textarea[name="' + key + '"]').after(msg);  
             					}
             				}
             			}, 500);
             			return false;
             		} else { 
             			$('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
             			PNotify.removeAll();  
             			keranjang()	;  
             			tablehold.ajax.reload();  
             			document.getElementById("submitformHold").removeAttribute('disabled'); 
             			$('#modalHold').modal('hide');        
             			document.getElementById("FormulirHold").reset();    
             			$('#submitformHold').html('Ya, Saya Yakin'); 
             			window.setTimeout(function() {  
             				new PNotify({
             					title: 'Notifikasi',
             					text: 	'Berhasil hold transaksi',
             					type: 'success',
             					addclass: 'stack-bottomright',
             					stack: stack_bottomright
             				}); 			  
             				$('#customer').val('Walk in Customer');
             				$('#customer_dipilih').val('');
             				$('#modalHold').modal('hide');
             			}, 500); 
             		}
             	}).fail(function(data) {   
             		alert('request gagal');
             		location.reload();
             	}); 
             	e.preventDefault(); 
             }); 


             document.getElementById("FormulirPayment").addEventListener("submit", function (e) {  
             	blurForm();        
             	document.getElementById("submitPayment").setAttribute('disabled','disabled');
             	$('#submitPayment').html('Loading ...');
             	var form = $('#FormulirPayment')[0];
             	var formData = new FormData(form);
             	var xhrAjax = $.ajax({
             		type 		: 'POST',
             		url 		: $(this).attr('action'),
             		data 		: formData, 
             		processData: false,
             		contentType: false,
             		cache: false, 
             		dataType 	: 'json'
             	}).done(function(data) { 
             		if ( ! data.success) {	 
             			$('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
             			$('#submitPayment').html('Submit Payment');    
             			var objek = Object.keys(data.errors);  
             			for (var key in data.errors) { 
             				if (key == 'fail') {   
             					new PNotify({
             						title: 'Notifikasi',
             						text: data.errors[key],
             						type: 'danger'
             					}); 
             				}
             			}
             		} else {   
             			$('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
             			PNotify.removeAll();    
             			document.getElementById("FormulirPayment").reset();  
             			$('#submitPayment').html('Submit Payment');   
             			new PNotify({
             				title: 'Notifikasi',
             				text: data.message,
             				type: 'success'
             			});     
             			keranjang()				  
             			$('#customer').val('Walk in Customer');
             			$('#customer_dipilih').val(''); 
             			$('#modal-payment').modal('hide'); 
             		}
             	}).fail(function(data) {   
             		new PNotify({
             			title: 'Notifikasi',
             			text: "Request gagal, browser akan direload",
             			type: 'danger'
             		}); 
             		window.setTimeout(function() {  location.reload();}, 2000);
             	}); 
             	e.preventDefault(); 
             }); 

         </script>

     </body>
     </html>