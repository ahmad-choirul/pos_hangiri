<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">

<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="<?php echo base_url() ?>/assets/images/favicon.png" type="image/ico">
	<title>Hangiri Resto</title>
	<meta name="author" content="Paber">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/select2/select2.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/skins/default.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme-custom.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/pnotify/pnotify.custom.css" />
	

	<!-- Head Libs -->
	<script src="<?php echo base_url() ?>/assets/vendor/modernizr/modernizr.js"></script>
</head>

<body class="bgbody">
	<section class="body">

		<?php $this->load->view("komponen/header.php") ?>
		<div class="inner-wrapper">
			<?php $this->load->view("komponen/sidebar.php") ?>
			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Target Penjualan</h2>
				</header>
				<!-- start: page -->

				<div class="row">
					<div class="col-md-8 col-lg-12">
						<section class="panel panel-primary">
							<header class="panel-heading">
								<h4 class="panel-title">Form Edit Target</h4>
							</header>
							<div class="panel-body">

								<?php
								if (level_user('penjualan', 'target', $this->session->userdata('kategori'), 'edit') > 0) {
									?>
									<?php echo form_open('penjualan/edittarget', ' id="FormulirEdit" class="form-horizontal" enctype="multipart/form-data"'); ?>
								<?php } ?>
								<fieldset>
									<div class="form-group target1">
										<label class="col-md-3 control-label" for="target1">Target Obat PPN</label>
										<div class="col-md-8">
											<input type="text" name="target1" class="form-control mask_price" required value="<?php echo $this->security->xss_clean($target->row()->target_1); ?>"/>
										</div>
									</div>
									<div class="form-group target2">
										<label class="col-md-3 control-label" for="target2">Target Obat Tanpa PPN</label>
										<div class="col-md-8">
											<input type="text" name="target2" class="form-control mask_price" required value="<?php echo $this->security->xss_clean($target->row()->target_2); ?>"/>
										</div>
									</div>
									<div class="form-group target3">
										<label class="col-md-3 control-label" for="target3">Target Obat Prekusor</label>
										<div class="col-md-8">
											<input type="text" name="target3" class="form-control mask_price" required value="<?php echo $this->security->xss_clean($target->row()->target_3); ?>"/>
										</div>
									</div>
									<div class="form-group target4">
										<label class="col-md-3 control-label" for="target4">Target Obat OOT</label>
										<div class="col-md-8">
											<input type="text" name="target4" class="form-control mask_price" required value="<?php echo $this->security->xss_clean($target->row()->target_4); ?>"/>
										</div>
									</div>
									<div class="form-group target5">
										<label class="col-md-3 control-label" for="target5">Komisi</label>
										<div class="col-md-8">
											<input type="text" name="target5" class="form-control mask_price" required value="<?php echo $this->security->xss_clean($target->row()->target_5); ?>"/>
										</div>
									</div>
									
								</fieldset>
								<hr class="dotted">

								<?php
								if (level_user('penjualan', 'target', $this->session->userdata('kategori'), 'edit') > 0) {
									?>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-9 col-md-offset-3">
												<button type="submit" class="btn btn-primary" id="submitformEdit">Submit</button>
											</div>
										</div>
									</div>
								<?php } ?>
							</form>

						</div>
					</section>

				</div>

			</div>
			<!-- end: page -->

			<!-- end: page -->
		</section>
	</div>
</section>


<!-- Vendor -->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/select2/select2.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?php echo base_url() ?>assets/javascripts/theme.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="<?php echo base_url() ?>assets/javascripts/theme.init.js"></script>

<?php
if (level_user('penjualan', 'target', $this->session->userdata('kategori'), 'edit') > 0) {
	?>
	<script type="text/javascript">
		$('.tanggal_masa').datepicker({
			format: 'yyyy-mm-dd' 
		});
		$('.tanggal_sipa').datepicker({
			format: 'yyyy-mm-dd' 
		});
		document.getElementById("FormulirEdit").addEventListener("submit", function(e) {
			blurForm();
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformEdit").setAttribute('disabled', 'disabled');
			$('#submitformEdit').html('Loading ...');
			var form = $('#FormulirEdit')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'json'
			}).done(function(data) {
				if (!data.success) {
					$('input[name=<?php echo $this->security->get_csrf_token_name(); ?>]').val(data.token);
					document.getElementById("submitformEdit").removeAttribute('disabled');
					$('#submitformEdit').html('Submit');
					var objek = Object.keys(data.errors);
					for (var key in data.errors) {
						if (data.errors.hasOwnProperty(key)) {
							var msg = '<div class="help-block" for="' + key + '">' + data.errors[key] + '</span>';
							$('.' + key).addClass('has-error');
							$('input[name="' + key + '"]').after(msg);
							$('textarea[name="' + key + '"]').after(msg);
						}
						if (key == 'fail') {
							new PNotify({
								title: 'Notifikasi',
								text: data.errors[key],
								type: 'danger'
							});
						}
					}
				} else {
					window.setTimeout(function() {
						location.reload();
					}, 1000);
					new PNotify({
						title: 'Notifikasi',
						text: data.message,
						type: 'success'
					});
				}
			}).fail(function(data) {
				new PNotify({
					title: 'Notifikasi',
					text: "Request gagal, browser akan direload",
					type: 'danger'
				});
				window.setTimeout(function() {
					location.reload();
				}, 2000);
			});
			e.preventDefault();
		});
	</script>
<?php } ?>
</body>

</html>