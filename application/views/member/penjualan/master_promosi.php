<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>  
  <meta charset="UTF-8"> 
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favi.png" type="image/ico">   
  <title>Babe'Q Resto</title>    
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
              <h2>Kode Promosi</h2>  
          </header>  
          <!-- start: page -->
          <section class="panel">
            <header class="panel-heading">    
                <div class="row show-grid">
                    <div class="col-md-6" align="left"><h2 class="panel-title">Data Kode Promosi</h2></div>
                     <?php  
                                echo level_user('penjualan','kode_promosi',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                                ?> 
                </div>
            </header>
            <div class="panel-body"> 
                <table class="table table-bordered table-hover table-striped" id="promosidata">
                    <thead>
                        <tr>
                            <th></th>
                            <th>nama Promosi</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th> 
                            <th>Status</th> 
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
    <div class="modal-dialog">
        <div class="modal-content">
            <section class="panel  panel-primary">
                <?php echo form_open('penjualan/master_promositambah',' id="FormulirTambah"');?>  
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Master Promosi</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group mt-lg nama_promosi">
                        <label class="col-sm-3 control-label">Nama Promosi<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_promosi" class="form-control" required/>
                        </div>
                    </div> 
                    <div class="form-group mt-lg tgl_awal">
                        <label class="col-sm-3 control-label">Tanggal Awal<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_awal" class="form-control tanggal" required/>
                        </div>
                    </div> 
                    <div class="form-group mt-lg tgl_akhir">
                        <label class="col-sm-3 control-label">Tanggal Akhir<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_akhir" class="form-control tanggal" required/>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <section class="panel  panel-primary">
                <?php echo form_open('penjualan/master_promosiedit',' id="FormulirEdit"');?>  
                <input type="hidden" name="idd" id="idd">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Promosi</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group mt-lg nama_promosi">
                        <label class="col-sm-3 control-label">Id Promosi<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" readonly id="id_promosi" name="id_promosi" class="form-control" required/>
                        </div>
                    </div> 
                    <div class="form-group mt-lg nama_promosi">
                        <label class="col-sm-3 control-label">Nama Promosi<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="nama_promosi" name="nama_promosi" class="form-control" required/>
                        </div>
                    </div> 
                    <div class="form-group mt-lg tgl_awal">
                        <label class="col-sm-3 control-label">Tanggal Awal<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="tgl_awal"  name="tgl_awal" class="form-control tanggal" required/>
                        </div>
                    </div> 
                    <div class="form-group mt-lg tgl_akhir">
                        <label class="col-sm-3 control-label">Tanggal Akhir<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="tgl_akhir"  name="tgl_akhir" class="form-control tanggal" required/>
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
                            <?php echo form_open('penjualan/master_promosihapus',' id="FormulirHapus"');?>  
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
    $('.tanggal').datepicker({
                format: 'yyyy-mm-dd' 
            }); 
    var tablepromosi = $('#promosidata').DataTable({  
        "serverSide": true, 
        "order": [], 
        "ajax": {
            "url": "<?php echo base_url()?>penjualan/data_master_promosi",
            "type": "GET"
        }, 
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false, 
        },
        ],  
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
            $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
            PNotify.removeAll(); 
            tablepromosi.ajax.reload();   
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
    
    function edit(elem){
      var dataId = $(elem).data("id");   
      document.getElementById("idd").setAttribute('value', dataId);
      $('#editData').modal();        
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>penjualan/master_promosidetail',
        data: 'id=' + dataId,
        dataType 	: 'json',
        success: function(response) {  
            $.each(response, function(i, item) { 
                document.getElementById("id_promosi").setAttribute('value', item.id_promosi); 
                document.getElementById("nama_promosi").setAttribute('value', item.nama_promosi); 
                document.getElementById("tgl_awal").setAttribute('value', item.tgl_awal);
                document.getElementById("tgl_akhir").setAttribute('value', item.tgl_akhir); 
                // $("#jenis").select2("val", item.jenis); 
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
            tablepromosi.ajax.reload();    
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
            tablepromosi.ajax.reload();
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
  
</script>
</body>
</html>