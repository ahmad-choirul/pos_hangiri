<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>  
		<meta charset="UTF-8"> 
		<link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favi.png" type="image/ico">   
		<title>Hangiri Resto</title>    
		<meta name="author" content="Paber">   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/skins/default.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme-custom.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.css" />
		

		<!-- Head Libs -->
		<script src="<?php echo base_url()?>/assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body class="bgbody">
		<section class="body">

			<?php $this->load->view("komponen/header.php") ?>
			<div class="inner-wrapper"> 
				<?php $this->load->view("komponen/sidebar.php") ?>
				<section role="main" class="content-body">
					<header class="page-header">  
						<h2>Kategori User</h2>  
					</header>  
					<!-- start: page -->
                    <section class="panel">
                        <header class="panel-heading">    
                            <div class="row show-grid">
                                <div class="col-md-6" align="left"><h2 class="panel-title">Data Kategori User</h2></div>
                                <?php  
                                echo level_user('user','kategori',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                                ?> 
							</div>
                        </header>
                        <div class="panel-body"> 
                                <table class="table table-bordered table-hover table-striped" id="kategoridata">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Kategori User</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table> 
                        </div>
                    </section>
					<!-- end: page -->
				</section>
			</div>
		</section>
		
        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('user/kategoritambah',' id="FormulirTambah" enctype="multipart/form-data"');?>  
                    <header class="panel-heading">
                        <h2 class="panel-title">Tambah Kategori User</h2>
                    </header>
                    <div class="panel-body"> 
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group kategori_user">
									Kategori User <br/>
									<input type="text" name="kategori_user"  placeholder="Kategori User" class="form-control" required/>
								</div>
							</div> 
							<div class="col-sm-6">
								<div class="form-group kategori"> 
									Pilih Beranda <br/>
									<select data-plugin-selectTwo class="form-control" name="beranda" required>  
										<?php foreach ($beranda as $kat): ?>
										<option value="<?php echo $kat->id;?>"><?php echo $kat->label;?></option>
										<?php endforeach; ?>
									</select> 
								</div>
							</div> 
						</div>
						<div class="row  mt-lg "> 
							<div class="col-sm-12">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
											<th>Nama Modul</th>
											<th> 
												<div class="checkbox-custom checkbox-primary">
													<input type="checkbox" id="view0">
													<label for="view0">
													 <b>Akses View</b>
													</label>
												</div> 
											</th>  
											<th> 
												<div class="checkbox-custom checkbox-success">
													<input type="checkbox"  id="tambah0">
													<label for="tambah0">
													<b>Akses Tambah</b>
													</label>
												</div> 
											</th>  
											<th> 
												<div class="checkbox-custom checkbox-warning">
													<input type="checkbox" id="edit0">
													<label for="edit0">
													<b>Akses Edit</b>
													</label>
												</div> 
											</th>  
											<th> 
												<div class="checkbox-custom checkbox-danger">
													<input type="checkbox" id="hapus0">
													<label for="hapus0">
													<b>Akses Hapus</b>
													</label>
												</div> 
											</th>  
										</tr>
									</thead>
									<tbody>
									<?php foreach ($modul as $r): ?> 
										<tr>
											<td><?php echo $r->label;?></td>
											<td>
												<div class="checkbox-custom checkbox-primary">
													<input type="checkbox" name="view[]" value="<?php echo $r->id;?>" id="view<?php echo $r->id;?>">
													<label for="view<?php echo $r->id;?>">
													Akses View
													</label>
												</div> 
											</td>
											<td>
												<?php 
												if($r->aksi_tambah == '1'){
												?>
												<div class="checkbox-custom checkbox-success">
													<input type="checkbox" name="add[]" value="<?php echo $r->id;?>" id="tambah<?php echo $r->id;?>">
													<label for="tambah<?php echo $r->id;?>">
													Akses Tambah
													</label>
												</div> 
												<?php } ?>
											</td>
											<td> 
												<?php 
												if($r->aksi_edit == '1'){
												?>
												<div class="checkbox-custom checkbox-warning">
													<input type="checkbox" name="edit[]" value="<?php echo $r->id;?>" id="edit<?php echo $r->id;?>">
													<label for="edit<?php echo $r->id;?>">
													Akses Edit
													</label>
												</div> 
												<?php } ?>
											</td>
											<td>  
												<?php 
												if($r->aksi_hapus == '1'){
												?>
												<div class="checkbox-custom checkbox-danger">
													<input type="checkbox" name="delete[]" value="<?php echo $r->id;?>" id="hapus<?php echo $r->id;?>">
													<label for="hapus<?php echo $r->id;?>">
													Akses Hapus
													</label>
												</div> 
												<?php } ?>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table> 
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
        </div> 

		<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('user/kategoriedit',' id="FormulirEdit" enctype="multipart/form-data"');?>  
                    <input type="hidden" name="idd" id="idd"> 
					<header class="panel-heading">
                        <h2 class="panel-title">Edit Kategori User</h2>
                    </header>
                    <div class="panel-body"> 
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group kategori_useredit">
									Kategori User <br/>
									<input type="text" name="kategori_useredit" id="kategori_useredit" placeholder="Kategori User" class="form-control" required/>
								</div>
							</div> 
							<div class="col-sm-6">
								<div class="form-group kategori"> 
									Pilih Beranda <br/>
									<select data-plugin-selectTwo class="form-control" name="beranda" id="beranda" required>  
										<?php foreach ($beranda as $kat): ?>
										<option value="<?php echo $kat->id;?>"><?php echo $kat->label;?></option>
										<?php endforeach; ?>
									</select> 
								</div>
							</div> 
						</div>
						<div class="row  mt-lg "> 
							<div class="col-sm-12">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
											<th>Nama Modul</th>
											<th> 
												<div class="checkbox-custom checkbox-primary">
													<input type="checkbox" id="editview0">
													<label for="editview0">
													 <b>Akses View</b>
													</label>
												</div> 
											</th>  
											<th> 
												<div class="checkbox-custom checkbox-success">
													<input type="checkbox"  id="edittambah0">
													<label for="edittambah0">
													<b>Akses Tambah</b>
													</label>
												</div> 
											</th>  
											<th> 
												<div class="checkbox-custom checkbox-warning">
													<input type="checkbox" id="editedit0">
													<label for="editedit0">
													<b>Akses Edit</b>
													</label>
												</div> 
											</th>  
											<th> 
												<div class="checkbox-custom checkbox-danger">
													<input type="checkbox" id="edithapus0">
													<label for="edithapus0">
													<b>Akses Hapus</b>
													</label>
												</div> 
											</th>  
										</tr>
									</thead>
									<tbody>
									<?php foreach ($modul as $r): ?> 
										<tr>
											<td><?php echo $r->label;?></td>
											<td>
												<div class="checkbox-custom checkbox-primary">
													<input type="checkbox" name="editview[]" value="<?php echo $r->id;?>" id="editview<?php echo $r->id;?>">
													<label for="editview<?php echo $r->id;?>">
													Akses View
													</label>
												</div> 
											</td>
											<td>
												<?php 
												if($r->aksi_tambah == '1'){
												?>
												<div class="checkbox-custom checkbox-success">
													<input type="checkbox" name="editadd[]" value="<?php echo $r->id;?>" id="edittambah<?php echo $r->id;?>">
													<label for="edittambah<?php echo $r->id;?>">
													Akses Tambah
													</label>
												</div> 
												<?php } ?>
											</td>
											<td> 
												<?php 
												if($r->aksi_edit == '1'){
												?>
												<div class="checkbox-custom checkbox-warning">
													<input type="checkbox" name="editedit[]" value="<?php echo $r->id;?>" id="editedit<?php echo $r->id;?>">
													<label for="editedit<?php echo $r->id;?>">
													Akses Edit
													</label>
												</div> 
												<?php } ?>
											</td>
											<td>  
												<?php 
												if($r->aksi_hapus == '1'){
												?>
												<div class="checkbox-custom checkbox-danger">
													<input type="checkbox" name="editdelete[]" value="<?php echo $r->id;?>" id="edithapus<?php echo $r->id;?>">
													<label for="edithapus<?php echo $r->id;?>">
													Akses Hapus
													</label>
												</div> 
												<?php } ?>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table> 
							</div>
						</div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm" type="submit" id="submitformEdit">Submit</button>
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer>
                    </form>
                </section>
                </div>
            </div>
        </div>
													
        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <section class="panel  panel-danger">
                    <header class="panel-heading">
                        <h2 class="panel-title">Konfirmasi Hapus Data</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-icon">
                                <i class="fa fa-question-circle"></i>
                            </div>
                            <div class="modal-text">
                                <h4>Yakin ingin menghapus data ini ?</h4> 
                            </div>
                        </div>
					</div>
                    <footer class="panel-footer"> 
                        <div class="row">
                            <div class="col-md-12 text-right"> 
                                <?php echo form_open('user/hapuskategori',' id="FormulirHapus"');?>   
                                <input type="hidden" name="idd" id="idddelete">
                                <button type="submit" class="btn btn-danger" id="submitformHapus">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </footer>
                    </section>
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
		<script src="<?php echo base_url()?>assets/vendor/select2/select2.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script> 
		<script type="text/javascript"> 
            var tablekategori = $('#kategoridata').DataTable({  
                "serverSide": true, 
                "order": [], 
                "ajax": {
                    "url": "<?php echo base_url()?>user/datakategori",
                    "type": "GET"
                }, 
                "columnDefs": [
                    { 
                        "targets": [ 0 ], 
                        "orderable": false, 
                    },
                ],  
            });   
			$("#view0").click(function () {
            	$('input[name="view[]"]').not(this).prop('checked', this.checked);
        	});
			$("#tambah0").click(function () {
            	$('input[name="add[]"]').not(this).prop('checked', this.checked);
        	});
			$("#edit0").click(function () {
            	$('input[name="edit[]"]').not(this).prop('checked', this.checked);
        	});
			$("#hapus0").click(function () {
            	$('input[name="delete[]"]').not(this).prop('checked', this.checked);
        	}); 
			document.getElementById("FormulirTambah").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitform").setAttribute('disabled','disabled');
			$('#submitform').html('Loading ...');
			var form = $('#FormulirTambah')[0];
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
                    document.getElementById("submitform").removeAttribute('disabled');  
                    $('#submitform').html('Submit');    
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) { 
                            var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                            $('.'+key).addClass('has-error');
                            $('input[name="' + key + '"]').after(msg);     
                            $('input[name="' + key + '"]').focus();     
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
					$('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll(); 
                    tablekategori.ajax.reload();   
                    document.getElementById("submitform").removeAttribute('disabled'); 
                    $('#tambahData').modal('hide'); 
                    document.getElementById("FormulirTambah").reset();  
                    $('#submitform').html('Submit');   
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
                  	window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            }); 
 
            function hapus(elem){ 
		        var dataId = $(elem).data("id");
                document.getElementById("idddelete").setAttribute('value', dataId);
        		$('#modalHapus').modal();        
            }
			document.getElementById("FormulirHapus").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformHapus").setAttribute('disabled','disabled');
			$('#submitformHapus').html('Loading ...');
			var form = $('#FormulirHapus')[0];
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
                    document.getElementById("submitformHapus").removeAttribute('disabled');  
                    $('#submitformHapus').html('Delete');     
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
                    tablekategori.ajax.reload();
                    document.getElementById("submitformHapus").removeAttribute('disabled'); 
                    $('#modalHapus').modal('hide');        
                    document.getElementById("FormulirHapus").reset();    
                    $('#submitformHapus').html('Delete'); 
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
                    window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            }); 
 
			      
			$("#editview0").click(function () {
            	$('input[name="editview[]"]').not(this).prop('checked', this.checked);
        	});
			$("#edittambah0").click(function () {
            	$('input[name="editadd[]"]').not(this).prop('checked', this.checked);
        	});
			$("#editedit0").click(function () {
            	$('input[name="editedit[]"]').not(this).prop('checked', this.checked);
        	});
			$("#edithapus0").click(function () {
            	$('input[name="editdelete[]"]').not(this).prop('checked', this.checked);
        	}); 
            function edit(elem){
				document.getElementById("FormulirEdit").reset();  
		        var dataId = $(elem).data("id");  
                document.getElementById("idd").setAttribute('value', dataId); 
        		$('#editData').modal();     
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>user/kategoridetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) {  
                        $.each(response.datarows, function(i, item) { 
                            document.getElementById("kategori_useredit").value = item.kategori_user;     
                            $("#beranda").select2("val", item.beranda); 
                        }); 
                       
                        $.each(response.datasub, function(i, itemsub) { 
							var aksi; 
							if(itemsub.akses == 'read'){
								aksi ='view';
							}
							else if(itemsub.akses == 'add'){
								aksi ='tambah';
							}
							else if(itemsub.akses == 'edit'){
								aksi ='edit';
							}
							else{
								aksi ='hapus';
							} 
							document.getElementById("edit"+aksi+itemsub.modul).checked = true;
                        });   
                    }
                });  
                return false;
            } 
			document.getElementById("FormulirEdit").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformEdit").setAttribute('disabled','disabled');
			$('#submitformEdit').html('Loading ...');
			var form = $('#FormulirEdit')[0];
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
                    document.getElementById("submitformEdit").removeAttribute('disabled');  
                    $('#submitformEdit').html('Submit');    
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) { 
                            var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                            $('.'+key).addClass('has-error');
                            $('input[name="' + key + '"]').after(msg);  
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
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll();
                    tablekategori.ajax.reload();    
                    document.getElementById("submitformEdit").removeAttribute('disabled'); 
                    $('#editData').modal('hide');        
                    document.getElementById("FormulirEdit").reset();    
                    $('#submitformEdit').html('Submit');   
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
                   window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            }); 
        </script>
	</body>
</html>