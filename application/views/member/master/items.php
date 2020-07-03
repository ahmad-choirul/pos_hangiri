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
      <h2>Master Data Makanan dan Minuman</h2>
  </header>  
  <!-- start: page -->
  <section class="panel">
    <header class="panel-heading">    
        <div class="row show-grid">
            <div class="col-md-6" align="left"><h2 class="panel-title">Data Makanan </h2></div>
            <?php  
            echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
            ?> 
        </div>
    </header>
    <div class="panel-body"> 
        <table class="table table-bordered table-hover table-striped" id="itemsdata">
            <thead>
                <tr>
                    <th></th>
                    <th>Kode Item (Barcode)</th>
                    <th>Nama Item</th>
                    <th>Kategori</th>
                    <th>Harga beli</th>
                    <th>Harga Jual</th>
                    <th>Harga Jual 2</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Resto</th>
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
            <section class="panel panel-primary">
                <?php echo form_open('master/itemstambah',' id="FormulirTambah" enctype="multipart/form-data"');?>  
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Makanan / Minuman</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group mt-lg kategori">
                        <label class="col-sm-3 control-label">Pilih Kategori<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" name="kategori" required>  
                             <?php foreach ($kategori as $kat): ?>
                                <option value="<?php echo $kat->id;?>"><?php echo $kat->nama_kategori;?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div>
                </div>
                <div class="form-group mt-lg kode_item">
                    <label class="col-sm-3 control-label">Kode Item (Barcode)<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="hidden" name="jenis_item" value="jual">
                        <input type="text" name="kode_item" class="form-control" required/>
                    </div>
                </div>

                <div class="form-group mt-lg nama_item">
                    <label class="col-sm-3 control-label">Nama Item<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_item" class="form-control" required/>
                    </div>
                </div>

                <div class="form-group harga_jual">
                    <label class="col-sm-3 control-label">Harga Jual<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="harga_jual" class="form-control mask_price" required />
                    </div>
                </div> 

                 <div class="form-group harga_jual2">
                    <label class="col-sm-3 control-label">Harga Jual 2<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="harga_jual2" class="form-control mask_price" required />
                    </div>
                </div> 
                <div class="form-group harga_jual">
                    <label class="col-sm-3 control-label">Harga Beli<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="harga_beli" class="form-control mask_price" required />
                    </div>
                </div> 

                <div class="form-group mt-lg nama_item">
                    <label class="col-sm-3 control-label">Netto<span >*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="netto" class="form-control"/>
                        <small>dalam satuan gram/ml</small>
                    </div>
                </div>
                <div class="form-group mt-lg nama_item">
                    <label class="col-sm-3 control-label">Stok<span >*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="stok" class="form-control"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-3 control-label">Tanggal Kadaluarsa<span>*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="tanggal_expired" class="form-control tanggal_expired" data-plugin-datepicker/>
                    </div>
                </div>
                <div class="form-group mt-lg resto">
                        <label class="col-sm-3 control-label">Pilih Resto<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" name="resto" required>  
                                <option value="babe-q">Babe-Q</option>
                                <option value="hangiri">Hangiri</option>
                        </select> 
                    </div>
                </div>
                <div class="form-group gambar">
                    <label class="col-sm-3 control-label">Gambar</label>
                    <div class="col-sm-9">
                        <input type="file" name="gambar" class="form-control"/>
                    </div>
                </div>
                <div class="form-group keterangan">
                    <label class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea rows="2" class="form-control" name="keterangan"></textarea>
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

<div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <section class="panel panel-primary">   
                <header class="panel-heading">
                    <h2 class="panel-title">Detail Makanan / Minuman</h2>
                </header>
                <div class="panel-body" id="showdetail"> 
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

<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <section class="panel panel-primary">
                <?php echo form_open('master/itemsedit',' id="FormulirEdit"  enctype="multipart/form-data"');?>  
                <input type="hidden" name="idd" id="idd">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Data Makanan/Minuman</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group mt-lg kategori">
                        <label class="col-sm-3 control-label">Pilih Kategori<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" name="kategori" id="kategori" required>  
                             <?php foreach ($kategori as $kat): ?>
                                <option value="<?php echo $kat->id;?>"><?php echo $kat->nama_kategori;?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div>
                </div>
                <div class="form-group mt-lg kode_item">
                    <label class="col-sm-3 control-label">Kode Item (Barcode)<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="kode_item" id="kode_item" class="form-control" required/>
                    </div>
                </div>

                <div class="form-group mt-lg nama_item">
                    <label class="col-sm-3 control-label">Nama Item<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_item" id="nama_item" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group harga_jual">
                    <label class="col-sm-3 control-label">Harga Beli<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="harga_beli"   id="harga_beli" class="form-control mask_price" required />
                    </div>
                </div> 
                <div class="form-group harga_jual">
                    <label class="col-sm-3 control-label">Harga Jual<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="harga_jual"   id="harga_jual" class="form-control mask_price" required />
                    </div>
                </div> 

                 <div class="form-group harga_jual">
                    <label class="col-sm-3 control-label">Harga Jual 2<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="harga_jual2"   id="harga_jual2" class="form-control mask_price" required />
                    </div>
                </div> 

                <div class="form-group mt-lg nama_item">
                    <label class="col-sm-3 control-label">Netto<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="netto" id="netto" class="form-control" required/>
                        <small>dalam satuan gram/ml</small>
                    </div>
                </div>
                <div class="form-group mt-lg nama_item">
                    <label class="col-sm-3 control-label">Stok<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="stok" id="stok" class="form-control" required/>
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-sm-3 control-label">Tanggal Kadaluarsa<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="tanggal_expired" id="tanggal_expired" class="form-control tanggal_expired" data-plugin-datepicker required/>
                    </div>
                </div>
                <div class="form-group mt-lg resto">
                        <label class="col-sm-3 control-label">Pilih Resto<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" name="resto" id="resto" required>  
                                <option value="babe-q">Babe-Q</option>
                                <option value="hangiri">Hangiri</option>
                        </select> 
                    </div>
                </div>
                <div class="form-group gambar">
                    <label class="col-sm-3 control-label">Gambar</label>
                    <div class="col-sm-9">
                        <input type="file" name="gambar"   class="form-control"/><br>
                        <img id="gambar" width="200" alt="gambar produk">
                    </div>
                </div>
                <div class="form-group keterangan">
                    <label class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea rows="2" class="form-control"  id="keterangan"   name="keterangan"></textarea>
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
                            <?php echo form_open('master/itemshapus',' id="FormulirHapus"');?>  
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
  $('.tanggal_expired').datepicker({
    format: 'yyyy-mm-dd' 
});
  var tableitems = $('#itemsdata').DataTable({  
    "serverSide": true, 
    "order": [], 
    "ajax": {
        "url": "<?php echo base_url()?>master/dataitems",
        "type": "GET",
        "data": function ( data ) {
            data.jenis = 'jual';
        }
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
     tableitems.ajax.reload();   
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
                    // window.setTimeout(function() {  location.reload();}, 2000);
                }); 
e.preventDefault(); 
}); 
  function detail(elem){
      var dataId = $(elem).data("id");   
      $('#detailData').modal();    
      $('#showdetail').html('Loading...'); 
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>master/itemdetail',
        data: 'id=' + dataId,
        dataType 	: 'json',
        success: function(response) { 
            var datarow='';
            $.each(response, function(i, item) {
                datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                datarow+="<tr><td>Kode Item (Barcode)</td><td>: "+item.kode_item+"</td></tr>";
                datarow+="<tr><td>Kategori</td><td>: "+item.nama_kategori+"</td></tr>";
                datarow+="<tr><td>Nama Item</td><td>: "+item.nama_item+"</td></tr>";
                datarow+="<tr><td>Harga Beli</td><td>: "+item.harga_beli+"</td></tr>";
                datarow+="<tr><td>Harga Jual</td><td>: "+item.harga_jual+"</td></tr>";
                datarow+="<tr><td>Harga Jual 2</td><td>: "+item.harga_jual2+"</td></tr>";
                datarow+="<tr><td>Netto</td><td>: "+item.netto+"</td></tr>";
                datarow+="<tr><td>Stok</td><td>: "+item.stok+"</td></tr>";
                datarow+="<tr><td>Tanggal Kadaluarsa</td><td>: "+item.tanggal_expired+"</td></tr>";
                datarow+="<tr><td>Gambar</td><td> <img src='<?php echo base_url()?>images/"+item.gambar+"' width='200' ></td></tr>";
                datarow+="<tr><td>Keterangan</td><td>: "+item.keterangan+"</td></tr>";
                datarow+="</table>";
            });
            $('#showdetail').html(datarow);
        }
    });  
      return false;
  }
  function edit(elem){
      var dataId = $(elem).data("id");   
      document.getElementById("idd").setAttribute('value', dataId);
      $('#editData').modal();        
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>master/itemdetail',
        data: 'id=' + dataId,
        dataType 	: 'json',
        success: function(response) {  
            $.each(response, function(i, item) { 
                document.getElementById("kode_item").setAttribute('value', item.kode_item);
                document.getElementById("kategori").setAttribute('value', item.kategori);
                document.getElementById("nama_item").setAttribute('value', item.nama_item);
                document.getElementById("netto").setAttribute('value', item.netto); 
                document.getElementById("stok").setAttribute('value', item.stok); 
                document.getElementById("keterangan").value = item.keterangan;
                document.getElementById("harga_beli").value = item.harga_beliedit;
                document.getElementById("harga_jual").value = item.harga_jualedit;
                document.getElementById("harga_jual2").value = item.harga_jualedit2;
                document.getElementById("tanggal_expired").value = item.tanggal_expireds;
                document.getElementById("gambar").src = '<?php echo base_url()?>images/'+item.gambar; 
                $("#kategori").select2("val", item.kategori);
                $("#resto").select2("val", item.resto);
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
        tableitems.ajax.reload();    
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
        tableitems.ajax.reload();
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
                    // window.setTimeout(function() {  location.reload();}, 2000);
                }); 
e.preventDefault(); 
}); 

</script>
</body>
</html>