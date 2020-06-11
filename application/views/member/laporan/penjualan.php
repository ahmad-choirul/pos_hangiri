<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>  
  <meta charset="UTF-8"> 
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon.png" type="image/ico">   
  <title>PT Airlangga sentral internasional</title>    
  <meta name="author" content="Paber">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/select2/select2.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/skins/default.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme-custom.css">
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
      <h2>Laporan Penjualan</h2>
    </header>  
    <form id="Formulir" method="GET" action="<?php echo base_url();?>laporan/excel_penjualan/" target="_blank">
     <!-- start: page --> 
     <section class="panel"> 
      <div class="panel-body">  
        <div class="row">
          <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label">Tanggal Awal</label>
              <input type="text" id="firstdate"  name="firstdate" class="form-control tanggal">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label">Tanggal Akhir</label>
              <input type="text" id="lastdate" name="lastdate" class="form-control tanggal">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Kasir</label>
              <select data-plugin-selectTwo class="form-control" name="id_admin" id="id_admin">                    
                <option value="">Pilih semua</option>
                <?php foreach ($admin as $key => $value): ?>
                  <option value="<?php echo $value->id?>"><?php echo $value->nama_admin ?></option>
                <?php endforeach ?>
              </select> 
            </div>
          </div>

            <div class="col-sm-2">
            <div class="form-group">
              <label>Jenis Penjualan</label>
              <select data-plugin-selectTwo class="form-control" name="jenis_penjualan" id="jenis_penjualan">                    
                <option value="">Pilih semua</option>
                  <option value="ppn" >PPN</option>
                  <option value="nonppn" >Non PPN</option>
                  <option value="ppn" >Grab</option>
                  <option value="gojek" >Gojek</option>
              </select> 
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label">No Transaksi</label>
              <input type="text" name="id_penjualan" id="id_penjualan" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <footer class="panel-footer">
        <span onclick="searchFilter()" class="btn btn-primary" id="TampilkanHTML">
          <i class="fa fa-search"></i> Tampilkan Data
        </span>
        <button type="submit"  class="btn btn-primary" id="ExportKeExcel">
          <i class="fa fa-file-excel-o"></i> Export Excel
        </button>
        <button type="reset" class="btn btn-danger" id="ResetBtn">
          <i class="fa fa-history"></i> Reset
        </button>
      </footer>
    </section>
  </form>
  <section class="panel" id="KontenHTML" style="display:none;"> 
    <div class="panel-body"> 
      <div class="table-responsive"  id="postList"> 
      </div>
    </div>
  </section>
  <!-- end: page -->
</section>
</div>
</section>


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
  $(document).ready(function() {
    searchFilter();
  });
</script>


<script type="text/javascript">
  $('.tanggal').datepicker({
    format: 'yyyy-mm-dd' 
  });    
  function searchFilter(page_num) { 
   page_num = page_num?page_num:0;
   var id_admin = $('#id_admin').val();
   var firstdate = $('#firstdate').val();
   var lastdate = $('#lastdate').val();
   var jenis_penjualan = $('#jenis_penjualan').val();
   var id_penjualan = $('#id_penjualan').val();
   $.ajax({
    type: 'GET',
    url: '<?php echo base_url(); ?>laporan/laporanpenjualan/'+page_num,
    data: 'page='+page_num+'&kasir='+id_admin+'&id_penjualan='+id_penjualan+'&firstdate='+firstdate+'&jenis_penjualan='+jenis_penjualan+'&lastdate='+lastdate,success: function (html) { 
     $('#postList').html(html);
     document.getElementById("KontenHTML").style.display = "block";  
   }
 }); 
 }

 document.getElementById("ResetBtn").addEventListener("click", function (e) {  
  document.getElementById("Formulir").reset();  
  document.getElementById("KontenHTML").style.display = "none";       
  $("#kasir").select2("val",''); 
});


</script>
<script type="text/javascript">
 function detail(elem){
  var dataId = $(elem).data("id");   
  $('#detailData').modal();    
  $('#showdetail').html('Loading...'); 
  $.ajax({
    type: 'GET',
    url: '<?php echo base_url()?>penjualan/penjualandetail',
    data: 'id=' + dataId,
    dataType    : 'json',
    success: function(response) { 
      var datarow='<div class="row">';
      $.each(response.datarows, function(i, item) {
        document.getElementById('linkprint').setAttribute('href', '<?php echo base_url()?>pembelian/printpenerimaan/'+item.nomor_rec);
        document.getElementById('linkpdf').setAttribute('href', '<?php echo base_url()?>pembelian/pdfpenerimaan/'+item.nomor_rec);

        datarow+='<div class="col-md-6">';
        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
        datarow+="<tr><td>ID Penjualan</td><td>: "+item.id+"</td></tr>";
        datarow+="<tr><td>ID Pembeli</td><td>: "+item.id_pembeli+"</td></tr>"; 
        datarow+="<tr><td>ID Admin</td><td>: "+item.id_admin+"</td></tr>";
        datarow+="</table>";
        datarow+='</div>';
        datarow+='<div class="col-md-6">';
        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
        
        datarow+="<tr><td>Total Harga Item</td><td>: "+item.total_harga_item+"</td></tr>";
        datarow+="<tr><td>Jenis Penjualan</td><td>: "+item.jenis_penjualan+"</td></tr>"; 
        datarow+="</table>";
        datarow+='</div>';
      });
      datarow+='</div>';
      datarow+='<div class="row"><div class="col-md-12">';
      datarow+='<h3>Rincian</h3>';
      datarow+='<div class="table-responsive" style="max-height:420px;">';  
      datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
      datarow+="<thead><tr>";
      datarow+="<th>Kode Item</th>";
      datarow+="<th>Harga Beli</th>";
      datarow+="<th>Harga Jual</th>";
      datarow+="<th>Total</th>"; 
      datarow+="</tr></thead>";
      datarow+="<tbody>";

      $.each(response.datasub, function(i, itemsub) {
        datarow+="<tr>";
        datarow+="<td>"+itemsub.kode_item+"</td>"; 
        datarow+="<td>"+itemsub.harga_beli+"</td>"; 
        datarow+="<td>"+itemsub.harga_jual+"</td>"; 
        datarow+="<td>"+itemsub.total+"</td>"; 
        datarow+="</tr>"; 
      });  
      datarow+="</tbody>";
      datarow+="</table>";
      datarow+="</div>";
      datarow+='</div></div>';
      $('#showdetail').html(datarow);
    }
  });  
  return false;
}
</script>
</body>
</html>