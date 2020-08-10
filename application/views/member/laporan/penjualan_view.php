<table class="table table-bordered table-striped table-condensed mb-none">
    <thead>
        <tr>
            <th>aksi</th>
            <th>ID Penjualan</th>
            <th>Tanggal</th>
            <th>Total Diskon</th>
            <th>Total Harga Item</th>
            <th>Total Harga Item + ppn </th>
            <th>Total Akhir</th>
            <th>Jenis Penjualan</th>
            <th>Jenis Pembayaran</th>
            <th>No Kartu</th>
            <th>Nama Admin</th> 
            <th>Resto</th> 
        </tr>
    </thead>
    <tbody> 
        <?php 
        $total = 0;
        $total_item = 0;
        $total_itemppn = 0;
        $diskon = 0;
        foreach($posts as $post): 
            $itemppn=0;

            $tombolhapus =  '<li><a href="#" onclick="hapus(this)" data-id="'.$post['id'].'">Hapus</a></li>';

            $tombolaksi = ' 
            <div class="btn-group dropup">
            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
            <li><a href="#" onclick="detail(this)"  data-id="'.$this->security->xss_clean($post['id']).'">Detail</a></li> 
            '.$tombolhapus.'
            </ul>
            </div>
            ';
            ?> 
            <tr>
                <td><?php echo $tombolaksi; ?></td>
                <td><?php echo $post['id_penjualan']; ?></td>
                <td><?php echo tgl_indo($post['tanggal']); ?></td>
                <td class="text-right"><?php echo rupiah($post['diskon']); ?></td>
                <td class="text-right"><?php echo rupiah($post['total_harga_item']); ?></td>
                <td class="text-right"><?php 
                if ($post['jenis_penjualan']=='ppn') {
                    $itemppn=$post['total_harga_item']*1.1;
                   echo rupiah($itemppn);
               }else{
                 $itemppn=$post['total_harga_item'];
                   echo rupiah($itemppn);
            }
            ?></td>
            <td class="text-right"><?php echo rupiah($post['total']); ?></td>
            <td class="text-right"><?php echo $post['jenis_penjualan']; ?></td>
            <td class="text-right"><?php echo $post['cara_bayar']; ?></td>
            <td class="text-right"><?php echo $post['no_kartu']; ?></td>
            <td class="text-right"><?php echo $post['nama_admin']; ?></td>
            <td class="text-right"><?php echo $post['resto']; ?></td>
        </tr>  
        <?php 
        $total += $post['total'];
        $total_item += $post['total_harga_item'];
        $total_itemppn += $itemppn;
        $diskon += $post['diskon'];
        ?>
    <?php endforeach;?>  
    <tr>
        <td colspan="2"></td>
        <td><b>Total</b></td>
        <td class="text-right"><b> <?=rupiah($diskon)?></b></td>
        <td class="text-right"><b> <?=rupiah($total_item)?></b></td>
        <td class="text-right"><b> <?=rupiah($total_itemppn)?></b></td>
        <td class="text-right"><b> <?=rupiah($total)?></b></td>
    </tr>
</tbody>
</table>
<ul class="pagination">
    <?php echo $this->ajax_pagination->create_links(); ?>
</ul> 
<div class="modal fade bd-example-modal-lg" id="detailData"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:90%">
        <div class="modal-content">
            <section class="panel panel-primary">   
                <header class="panel-heading">
                    <div class="row">
                        <div class="col-md-3 text-left"> 
                            <h2 class="panel-title">Detail Penjuaalan</h2>  
                        </div>
                        <div class="col-md-9 text-right">
                            <a class="btn btn-success" id="linkprint" target="_blank"><i class="fa fa-print"></i> Print</a>
                            <a class="btn btn-success" id="linkpdf" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                        </div>
                    </div>
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

