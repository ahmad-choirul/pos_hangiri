<table class="table table-bordered table-striped table-condensed mb-none">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Kode Item</th>
            <th>Nama Item</th>
            <th>Transaksi</th> 
            <th>Keluar</th>  
        </tr>
    </thead>
    <tbody> 
<?php foreach($posts as $post): ?> 
<tr> 
    <td><?php echo tgl_indo($post['tanggal']); ?></td> 
    <td><?php echo $post['kode_item']; ?></td> 
    <td><?php echo $post['nama_item']; ?></td> 
    <td><?php echo $post['jenis_transaksi']; ?></td> 
    <td><?php echo $post['jumlah_keluar']; ?></td> 
</tr> 
<?php endforeach;?>  
</tbody>
</table>
<ul class="pagination">
<?php echo $this->ajax_pagination->create_links(); ?>
</ul> 