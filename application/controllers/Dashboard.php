<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != TRUE){    
            redirect(base_url('login'));
        }    
        $this->load->model('dashboard_model'); 
        $this->load->helper(array('string','security','form'));
    } 
    public function index()
    {  
        level_user('dashboard','index',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/beranda/beranda');  
    }
    public function logout()
    { 
        $this->session->sess_destroy();  
        redirect(base_url());
    } 
    public function cek()
    {
       echo "<pre>";
       print_r ($this->session->flashdata('cek'));
       echo "</pre>";
    }
    public function penjualan_2_minggu(){ 
        cekajax(); 
        $now = new DateTime('12 days ago');
        $interval = new DateInterval( 'P1D');
        $period = new DatePeriod( $now, $interval, 13); 
        foreach( $period as $day) {
            $tgl = $day->format( 'Y-m-d');  
            $data['jumlah'] = $this->dashboard_model->penjualan($tgl); 
            $data['tanggal'] = $tgl;
            $data_array[] = $data;
        } 
        echo json_encode($data_array);
    }
    public function cash_2_minggu(){ 
        cekajax();
        $now = new DateTime('12 days ago');
        $interval = new DateInterval( 'P1D');
        $period = new DatePeriod( $now, $interval, 13); 
        foreach( $period as $day) {
            $tgl = $day->format( 'Y-m-d');   
            $masuk = $this->dashboard_model->cash_masuk($tgl); 
            $data['masuk'] = $masuk->total == null ? 0 : $masuk->total;
            $keluar = $this->dashboard_model->cash_keluar($tgl); 
            $data['keluar'] = $keluar->total == null ? 0 : $keluar->total;
            $data['tanggal'] = $tgl;
            $data_array[] = $data;
        } 
        echo json_encode($data_array);
    }

    public function laporan_ringkas(){ 
        cekajax();    
        $total_penjualan_hari_ini = $this->dashboard_model->total_penjualan_hari_ini();
        $total_penjualan_minggu_ini = $this->dashboard_model->total_penjualan_minggu_ini(); 
        $total_penjualan_bulan_ini = $this->dashboard_model->total_penjualan_bulan_ini();  
        $akan_jatuh_tempo = $this->dashboard_model->akan_jatuh_tempo();  
        $sudah_jatuh_tempo = $this->dashboard_model->sudah_jatuh_tempo();  
        $dibayar_minggu = $this->dashboard_model->dibayar_minggu();  
        $total_hutang_belum_bayar = $this->dashboard_model->total_hutang_belum_bayar();  
        $total_piutang_belum_bayar = $this->dashboard_model->total_piutang_belum_bayar();   
        $total_po = $this->db->count_all('purchase_order');
        $total_pembelian = $this->db->count_all('pembelian_langsung');  
        $total_penerimaan = $this->db->count_all('penerimaan_barang'); 
        // $total_retur = $this->db->count_all('retur_pembelian');  
        $total_jual_1 = $total_penjualan_hari_ini->total;//total jualn harian
        $total_jual_2 =$total_penjualan_minggu_ini->total;//total jual mingguan
        $total_jual_3 = $total_penjualan_bulan_ini->total;//total jual bulanana

        // $total_jual_ppn = 0;
        // $total_jual_nonppn = 0;
        // $total_jual_prekusor = 0;
        // $total_jual_oot = 0;
        $stattarget1=false;
        $stattarget2=false;
        $stattarget3=false;
        // $trgt= $this->db->get_where('master_target', array('id' => '1'));
        // $target1=$trgt->row()->target_1-$total_jual_1;
        // if ($target1<0) {
        //     $target1=0;
        //     $stattarget1=true;
        // }
        // $target2=$trgt->row()->target_2-$total_jual_2;
        // if ($target2<0) {
        //     $target2=0;
        //     $stattarget2=true;
        // }
        // $target3=$trgt->row()->target_3-$total_jual_3;  
        // if ($target3<0) {
        //     $target3=0;
        //     $stattarget3=true;
        // }
       
        // $total_target=$target1+$target2+$target3;

        $result = array(   
            "total_po" => $this->security->xss_clean($total_po." Transaksi"),
            "total_pembelian" => $this->security->xss_clean($total_pembelian." Transaksi"),
            "total_penerimaan" => $this->security->xss_clean($total_penerimaan." Transaksi"),
            // "total_retur" => $this->security->xss_clean($total_retur." Transaksi"),  
            "akan_jatuh_tempo" => $this->security->xss_clean($akan_jatuh_tempo." Transaksi"),
            "sudah_jatuh_tempo" => $this->security->xss_clean($sudah_jatuh_tempo." Transaksi"),
            "total_hutang_belum_bayar" => $this->security->xss_clean(rupiah($total_hutang_belum_bayar->total)),
            "total_penjualan_minggu_ini" => $this->security->xss_clean(rupiah($total_penjualan_hari_ini->total)),
            "total_piutang_belum_bayar" => $this->security->xss_clean(rupiah($total_piutang_belum_bayar->total)),
            "total_penjualan_hari_ini" => $this->security->xss_clean(rupiah($total_penjualan_minggu_ini->total)),
            "total_penjualan_bulan_ini" => $this->security->xss_clean(rupiah($total_penjualan_bulan_ini->total)),
            "dibayar_minggu" => $this->security->xss_clean(rupiah($dibayar_minggu->total)),
            // "target1" => $this->security->xss_clean(rupiah($target1)),
            // "target2" => $this->security->xss_clean(rupiah($target2)),
            // "target3" => $this->security->xss_clean(rupiah($target3)),
            // "stattarget1" => $this->security->xss_clean($stattarget1),
            // "stattarget2" => $this->security->xss_clean($stattarget2),
            // "stattarget3" => $this->security->xss_clean($stattarget3),
            // "total_jual_1" => $this->security->xss_clean(rupiah($total_jual_1)),
            // "total_jual_2" => $this->security->xss_clean(rupiah($total_jual_2)),
            // "total_jual_3" => $this->security->xss_clean(rupiah($total_jual_3)),
            // "total_target" => $this->security->xss_clean(rupiah($total_target)),
        );    
        echo'['.json_encode($result).']';
    }

    

    public function produk_kadaluarsa(){     
        cekajax();    
        $subitem= $this->dashboard_model->get_produk_kadaluarsa(); 
        $arraysub =[];
        foreach($subitem as $r) {   
         $subArray['kode_item']=$r->kode_item;
         $subArray['nama_item']=$r->nama_item;  
         $subArray['tgl_expired']= tgl_indo($r->tgl_expired);       
         $arraysub[] =  $subArray ; 
     }   
     echo'{"datasub":'.json_encode($arraysub).'}';
 }

 public function produk_terlaris(){     
    cekajax();    
    $subitem= $this->dashboard_model->get_produk_terlaris(); 
    $arraysub =[];
    foreach($subitem as $r) {   
     $subArray['kode_item']=$r->kode_item;
     $subArray['nama_item']=$r->nama_item;   
     $subArray['total']=$r->total;   
     $arraysub[] =  $subArray ; 
 }   
 echo'{"datasub":'.json_encode($arraysub).'}';
}

public function komisi(){
    cekajax();
    // $this->db->select("b.nama_pegawai, sum(a.total) as total");
    // $this->db->from("master_komisi a");
    // $this->db->join('master_pegawai b','a.id_pegawai = b.id', 'left');
    // MONTH(a.tgl_transaksi) = MONTH(NOW()) and YEAR(a.tgl_transaksi) = YEAR(NOW())
    // $this->db->order_by('total', 'DESC');
    $query = $this->db->query("SELECT `b`.`nama_pegawai`, sum(a.total) as total FROM `master_komisi` `a` LEFT JOIN `master_pegawai` `b` ON `a`.`id_pegawai` = `b`.`id` WHERE MONTH(a.tgl_transaksi) = MONTH(NOW()) AND YEAR(a.tgl_transaksi) = YEAR(NOW()) ORDER BY `total` DESC ");
    $subitem= $query->result();
    $arraysub =[];
    foreach($subitem as $r) {
     $subArray['nama_pegawai']=$r->nama_pegawai;
     $subArray['total']=rupiah($r->total);
     $arraysub[] =  $subArray ;
 }
 echo'{"datasub":'.json_encode($arraysub).'}';
}

public function catatan(){
    cekajax();
    $subitem= $this->db->get('notes')->result();
    $arraysub =[];
    foreach($subitem as $r) {
       $subArray['isi']=$r->isi;
       $arraysub[] =  $subArray ;
   }
   echo'{"datasub":'.json_encode($arraysub).'}';
}

public function catatantambah(){
    cekajax();
    $post = $this->input->post();
    $simpan = $this->dashboard_model;
    $validation = $this->form_validation;
    $validation->set_rules($simpan->rulesoperasional());
    if ($this->form_validation->run() != FALSE){
     $errors = $this->form_validation->error_array();
     $data['errors'] = $errors;
 }else{
    $insert_id = $simpan->updatedataoperasional();
    if($insert_id > 0) {
        $data['success']= true;
        $data['pegawai']= $post["nama_pegawai"];
        $data['id_pegawai']= $insert_id;
        $data['message']="Berhasil menyimpan data";
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data);
}
    // public function catatantambah(){
    //     cekajax();
    //     $simpan = $this->dashboard_model;
    //         $simpan->updatedataoperasional();
    //         $data['success']= true;
    //         $data['message']="Berhasil menyimpan data";
    //     $data['token'] = $this->security->get_csrf_hash();
    //     echo json_encode($data);
    // }
}
