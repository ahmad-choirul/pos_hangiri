<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./phpspreadsheet/vendor/autoload.php'); 
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 

class Laporan extends CI_Controller {   
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != TRUE){    
            redirect(base_url('login'));
        }    
        $this->load->model('laporan_model');
        $this->load->library('form_validation');
        $this->load->helper(array('string','security','form'));
        $this->load->library('Ajax_pagination');
        $this->perPage = 100;
    } 
    public function index()
    {   
        level_user('laporan','index',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/laporan/beranda');
    }   
    public function po()
    {    
        level_user('laporan','po',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $data['supplier'] = $this->db->get('master_supplier')->result(); 
        $this->load->view('member/laporan/po',$data);
    }   
    public function laporanpo()
    {   
        $conditions = array(); 
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        $supplier = $this->input->get('supplier');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['supplier'] = $supplier;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        //total rows count
        $totalRec = count($this->laporan_model->getrowspo($conditions)); 
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'laporan/laporanpo';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->laporan_model->getrowspo($conditions);
        
        //load the view
        $this->load->view('member/laporan/po_view', $data, false);
    }   

    function excel_po(){       

        $spreadsheet = new Spreadsheet();
        $supplier = $this->input->get('supplier');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['supplier'] = $supplier;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $conditions['kategori']['excel'] = "excel"; 
        $postdata = $this->laporan_model->getrowspo($conditions); 

        $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
        ->setLastModifiedBy('Paber Panjaitan')
        ->setTitle('Laporan Format Excel')
        ->setSubject('Laporan Format Excel');

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nomor PO')
        ->setCellValue('B1', 'Tanggal PO')
        ->setCellValue('C1', 'Kode Supplier')
        ->setCellValue('D1', 'Nama Supplier')
        ->setCellValue('E1', 'Total')
        ->setCellValue('F1', 'Pembayaran')
        ->setCellValue('G1', 'Termin')
        ->setCellValue('H1', 'Keterangan')
        ;

        $i=2; 
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tgl_po']);
            $total = rupiah($post['total']);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $post['nomor_po'])
            ->setCellValue('B'.$i, $tgl)
            ->setCellValue('C'.$i, $post['supplier'])
            ->setCellValue('D'.$i, $post['nama_supplier'])
            ->setCellValue('E'.$i, $total)
            ->setCellValue('F'.$i, $post['pembayaran'])
            ->setCellValue('G'.$i, $post['termin']." Hari")
            ->setCellValue('H'.$i, $post['keterangan']);
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Purchase Order');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan PO.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;  
    }
    public function laba_rugi()
    {     
        level_user('laporan','penjualan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->model('Master_model');

        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $this->load->model('Keuangan_model');
        $data['data_hutang'] = $this->Keuangan_model->gethutangarray();
        $data['data_penjualan'] = $this->laporan_model->getrowspenjualan($conditions);
        $data['data_operasional'] = $this->Master_model->getoperasionalarray($conditions);
        $this->load->view('member/laporan/laba_rugi',$data);
    }   
    public function pembelian()
    {    
        level_user('laporan','pembelian',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $conditions['supplier'] = '*';
        $timestamp    = strtotime(date('F Y'));
        $conditions['search']['firstdate'] = date('Y-m-01', $timestamp);
        $conditions['search']['lastdate'] = date('Y-m-t', $timestamp);

        //set start and limit
        $conditions['limit'] = '10';
        
        //get posts data
        $data['posts'] = $this->laporan_model->getrowspembelian($conditions);
        $data['supplier'] = $this->db->get('master_supplier')->result(); 
        $this->load->view('member/laporan/pembelian',$data);
    }   
    public function laporanpembelian()
    {   
        $conditions = array(); 
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        $supplier = $this->input->get('supplier');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['supplier'] = $supplier;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        //total rows count
        $totalRec = count($this->laporan_model->getrowspembelian($conditions)); 
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'laporan/laporanpembelian';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->laporan_model->getrowspembelian($conditions);
        
        //load the view
        $this->load->view('member/laporan/pembelian_view', $data, false);
    }   
    
    function excel_pembelian(){       

        $spreadsheet = new Spreadsheet();
        $supplier = $this->input->get('supplier');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['supplier'] = $supplier;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $conditions['kategori']['excel'] = "excel"; 
        $postdata = $this->laporan_model->getrowspembelian($conditions); 

        $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
        ->setLastModifiedBy('Paber Panjaitan')
        ->setTitle('Laporan Format Excel')
        ->setSubject('Laporan Format Excel');

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nomor Faktur')
        ->setCellValue('B1', 'Tanggal Pembelian')
        ->setCellValue('C1', 'Kode Supplier')
        ->setCellValue('D1', 'Nama Supplier')
        ->setCellValue('E1', 'Total')
        ->setCellValue('F1', 'Pembayaran')
        ->setCellValue('G1', 'Termin')
        ->setCellValue('H1', 'Keterangan')
        ;

        $i=2; 
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tgl_pembelian']);
            $total = rupiah($post['total']);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $post['nomor_faktur'])
            ->setCellValue('B'.$i, $tgl)
            ->setCellValue('C'.$i, $post['supplier'])
            ->setCellValue('D'.$i, $post['nama_supplier'])
            ->setCellValue('E'.$i, $total)
            ->setCellValue('F'.$i, $post['pembayaran'])
            ->setCellValue('G'.$i, $post['termin']." Hari")
            ->setCellValue('H'.$i, $post['keterangan']);
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Pembelian');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Pembelian.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;  
    }

    public function penerimaan()
    {    
        $data['penerima'] = $this->db->select('penerima')->group_by('penerima')->from('penerimaan_barang')->get()->result(); 
        $this->load->view('member/laporan/penerimaan',$data);
    }   
    
    public function laporanpenerimaan()
    {   
        $conditions = array(); 
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        $penerima = $this->input->get('penerima');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['penerima'] = $penerima;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        //total rows count
        $totalRec = count($this->laporan_model->getrowspenerima($conditions)); 
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'laporan/laporanpenerimaan';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->laporan_model->getrowspenerima($conditions);
        
        //load the view
        $this->load->view('member/laporan/penerima_view', $data, false);
    }   
    
    function excel_penerimaan(){       

        $spreadsheet = new Spreadsheet();
        $penerima = $this->input->get('penerima');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['penerima'] = $penerima;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $conditions['kategori']['excel'] = "excel"; 
        $postdata = $this->laporan_model->getrowspenerima($conditions); 

        $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
        ->setLastModifiedBy('Paber Panjaitan')
        ->setTitle('Laporan Format Excel')
        ->setSubject('Laporan Format Excel');

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nomor Referensi')
        ->setCellValue('B1', 'Tanggal Penerimaan')
        ->setCellValue('C1', 'Nomor Faktur')
        ->setCellValue('D1', 'Nomor PO')
        ->setCellValue('E1', 'Penerima')
        ->setCellValue('F1', 'Keterangan') 
        ;

        $i=2; 
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tanggal_penerimaan']); 
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $post['nomor_rec'])
            ->setCellValue('B'.$i, $tgl)
            ->setCellValue('C'.$i, $post['nomor_faktur'])
            ->setCellValue('D'.$i, $post['nomor_po'])
            ->setCellValue('E'.$i, $post['penerima'])
            ->setCellValue('F'.$i, $post['keterangan']);
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Penerimaan');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Penerimaan.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;  
    }

    public function stok()
    {    
        level_user('laporan','stok',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        
        $conditions = array(); 
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        $timestamp    = strtotime(date('F Y'));
        $conditions['search']['firstdate'] = date('Y-m-01', $timestamp);
        $conditions['search']['lastdate'] = date('Y-m-t', $timestamp);
        //total rows count
        $totalRec = count($this->laporan_model->getrowsstok($conditions)); 
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'laporan/stok';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->laporan_model->getrowsstok($conditions);
        $this->load->view('member/laporan/stok', $data);
    }   
    
    public function laporanstok()
    {   
        $conditions = array(); 
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate');  
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        //total rows count
        $totalRec = count($this->laporan_model->getrowsstok($conditions)); 
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'laporan/laporanstok';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->laporan_model->getrowsstok($conditions);
        
        //load the view
        $this->load->view('member/laporan/stok_view', $data, false);
    }   
    
    function excel_stok(){       

        $spreadsheet = new Spreadsheet(); 
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate');  
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $conditions['kategori']['excel'] = "excel"; 
        $postdata = $this->laporan_model->getrowsstok($conditions); 

        $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
        ->setLastModifiedBy('Paber Panjaitan')
        ->setTitle('Laporan Format Excel')
        ->setSubject('Laporan Format Excel');

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Tanggal')
        ->setCellValue('B1', 'Kode Item')
        ->setCellValue('C1', 'Nama Item')
        ->setCellValue('D1', 'Tanggal Expired')
        ->setCellValue('E1', 'Transaksi')
        ->setCellValue('F1', 'Masuk')
        ->setCellValue('G1', 'Keluar')
        ;

        $i=2; 
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tanggal']);
            $expired = tgl_indo($post['tgl_expired']); 
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $tgl)
            ->setCellValue('B'.$i, $post['kode_item'])
            ->setCellValue('C'.$i, $post['nama_item'])
            ->setCellValue('D'.$i, $expired)
            ->setCellValue('E'.$i, $post['jenis_transaksi'])
            ->setCellValue('F'.$i, $post['jumlah_masuk']) 
            ->setCellValue('G'.$i, $post['jumlah_keluar']) ;
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Purchase Order');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Stok.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;  
    }
    
    public function penjualan()
    {     
        level_user('laporan','penjualan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $data['admin'] = $this->db->get('master_admin')->result(); 
        $data['costumer'] = $this->db->get('master_pembeli')->result(); 
        $data['obat'] = $this->db->get('master_item')->result();    
        $this->load->view('member/laporan/penjualan',$data);
    }   
    
    public function laporanpenjualan()
    {   
        $conditions = array(); 
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        $jenis_penjualan = $this->input->get('jenis_penjualan');
        $id_penjualan = $this->input->get('id_penjualan');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $kasir = $this->input->get('kasir');
        $resto = $this->input->get('resto');
        $jenis_pembayaran = $this->input->get('jenis_pembayaran');

        $conditions['search']['jenis_pembayaran'] = $jenis_pembayaran;
        $conditions['search']['kasir'] = $kasir;
        $conditions['search']['id_penjualan'] = $id_penjualan;
        $conditions['search']['jenis_penjualan'] = $jenis_penjualan;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $conditions['search']['resto'] = $resto;
        //total rows count
        $totalRec = count($this->laporan_model->getrowspenjualan($conditions)); 
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'laporan/laporanpenjualan';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->laporan_model->getrowspenjualan($conditions);
        
        //load the view
        $this->load->view('member/laporan/penjualan_view', $data, false);
    }   
    function excel_penjualan(){       
       $jenis_penjualan = $this->input->get('jenis_penjualan');
       $jenis_pembayaran = $this->input->get('jenis_pembayaran');
       $id_penjualan = $this->input->get('id_penjualan');
       $firstdate = $this->input->get('firstdate');
       $lastdate = $this->input->get('lastdate'); 
       $kasir = $this->input->get('kasir');
       $conditions['search']['jenis_pembayaran'] = $jenis_pembayaran;
       $conditions['search']['kasir'] = $kasir;
       $conditions['search']['id_penjualan'] = $id_penjualan;
       $conditions['search']['jenis_penjualan'] = $jenis_penjualan;
       $conditions['search']['firstdate'] = $firstdate;
       $conditions['search']['lastdate'] = $lastdate;

       $data['totalpenjualanhangiri']= $this->laporan_model->gettotalpenjualanexcel($conditions,'hangiri'); 
       $data['totalpenjualanbabeq']= $this->laporan_model->gettotalpenjualanexcel($conditions,'babe-q'); 
       $data['totaloperasionalhangiri']= $this->laporan_model->gettotaloperasionalexcel($conditions,'hangiri'); 
       $data['totaloperasionalbabeq']= $this->laporan_model->gettotaloperasionalexcel($conditions,'babe-q'); 

<<<<<<< HEAD
       $data['datapenjualanhangiri'] = $this->laporan_model->getrowspenjualanexcel($conditions,'hangiri'); 

       $data['datapenjualanbabeq'] = $this->laporan_model->getrowspenjualanexcel($conditions,'babe-q'); 

       $data['dataoperasionalhangiri'] = $this->laporan_model->getrowsoperasionalexcel($conditions,'hangiri'); 

=======
        $jenis_penjualan = $this->input->get('jenis_penjualan');
        $jenis_pembayaran = $this->input->get('jenis_pembayaran');
        $id_penjualan = $this->input->get('id_penjualan');
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $kasir = $this->input->get('kasir');
        $conditions['search']['jenis_pembayaran'] = $jenis_pembayaran;
        $conditions['search']['kasir'] = $kasir;
        $conditions['search']['id_penjualan'] = $id_penjualan;
        $conditions['search']['jenis_penjualan'] = $jenis_penjualan;
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $postdata = $this->laporan_model->getrowspenjualanexcel($conditions,'hangiri'); 

        $spreadsheet->getProperties()->setCreator('Hangiri')
        ->setLastModifiedBy('Hangiri')
        ->setTitle('Laporan Penjualan')
        ->setSubject('Laporan Penjualan');
        $totalpenjualanhangiri= $this->laporan_model->gettotalpenjualanexcel($conditions,'hangiri'); 
        $totalpenjualanbabeq= $this->laporan_model->gettotalpenjualanexcel($conditions,'babe-q'); 
        $totaloperasionalhangiri= $this->laporan_model->gettotaloperasionalexcel($conditions,'hangiri'); 
        $totaloperasionalbabeq= $this->laporan_model->gettotaloperasionalexcel($conditions,'babe-q'); 
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B3', 'Laporan Penjualan Hangiri / Babe-Q')
        ->setCellValue('B4', 'Periode '.tgl_indo($firstdate).' - '.tgl_indo($lastdate))
        ->setCellValue('B6', 'Total Penjualan')
        ->setCellValue('B7', '1') 
        ->setCellValue('B8', '2') 
        ->setCellValue('C7', 'Hangiri') 
        ->setCellValue('C8', 'Babe-Q') 
        ->setCellValue('D7', $totalpenjualanhangiri) 
        ->setCellValue('D8', $totalpenjualanbabeq) 
        ->setCellValue('B10', 'Biaya Operasional')
        ->setCellValue('B11', '1') 
        ->setCellValue('B12', '2') 
        ->setCellValue('C11', 'Hangiri') 
        ->setCellValue('C12', 'Babe-Q') 
        ->setCellValue('D11', $totaloperasionalhangiri) 
        ->setCellValue('D12', $totaloperasionalbabeq) 
        ;


        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B15', 'No')
        ->setCellValue('C15', 'Tanggal')
        ->setCellValue('D15', 'Jumlah Transaksi')
        ->setCellValue('E15', 'Total Diskon') 
        ->setCellValue('F15', 'Jenis Harga') 
        ->setCellValue('G15', 'Jenis Akhir') 
        ->setCellValue('H15', 'Jenis Penjualan') 
        ->setCellValue('I15', 'Jenis Pembayaran') 
        ;

        $i=16; 
        $no=1;
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tanggal']);
            $diskon = rupiah($post['diskon']);
            $harga = rupiah($post['harga']);
            $akhir = rupiah($post['akhir']);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, $no++)
            ->setCellValue('C'.$i, $tgl)
            ->setCellValue('D'.$i, $post['jumlah'])
            ->setCellValue('E'.$i, $diskon)
            ->setCellValue('F'.$i, $harga)
            ->setCellValue('G'.$i, $akhir)
            ->setCellValue('H'.$i, $post['jenis_penjualan'])
            ->setCellValue('I'.$i, $post['cara_bayar'])
            ;
            $i++;
        }
        $i+=2;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, 'Detail Penjualan Babe-Q')
        ;$i++;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, 'No')
        ->setCellValue('C'.$i, 'Tanggal')
        ->setCellValue('D'.$i, 'Jumlah Transaksi')
        ->setCellValue('E'.$i, 'Total Diskon') 
        ->setCellValue('F'.$i, 'Jenis Harga') 
        ->setCellValue('G'.$i, 'Jenis Akhir') 
        ->setCellValue('H'.$i, 'Jenis Penjualan') 
        ->setCellValue('I'.$i, 'Jenis Pembayaran') 
        ;
        $i++; 
        $postdata = $this->laporan_model->getrowspenjualanexcel($conditions,'babe-q'); 

        $no=1;
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tanggal']);
            $diskon = rupiah($post['diskon']);
            $harga = rupiah($post['harga']);
            $akhir = rupiah($post['akhir']);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, $no++)
            ->setCellValue('C'.$i, $tgl)
            ->setCellValue('D'.$i, $post['jumlah'])
            ->setCellValue('E'.$i, $diskon)
            ->setCellValue('F'.$i, $harga)
            ->setCellValue('G'.$i, $akhir)
            ->setCellValue('H'.$i, $post['jenis_penjualan'])
            ->setCellValue('I'.$i, $post['cara_bayar'])
            ;
            $i++;
        }
        $postdata = $this->laporan_model->getrowsoperasionalexcel($conditions,'hangiri'); 

        $i+=2;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, 'Biaya Operasional Hangiri')
        ;$i++;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, 'No')
        ->setCellValue('C'.$i, 'Tanggal')
        ->setCellValue('D'.$i, 'Total Pengeluaran')
        ;
        $i++; 
        $no=1;
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tgl_operasional']);
            $jumlah = rupiah($post['jumlah']);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, $no++)
            ->setCellValue('C'.$i, $tgl)
            ->setCellValue('D'.$i, $jumlah)
            ;
            $i++;
        }

        $i+=2;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, 'Biaya Operasional Babe-Q')
        ;$i++;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, 'No')
        ->setCellValue('C'.$i, 'Tanggal')
        ->setCellValue('D'.$i, 'Total Pengeluaran')
        ;
        $i++; 
        $no=1;
        $postdata = $this->laporan_model->getrowsoperasionalexcel($conditions,'babe-q'); 

        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tgl_operasional']);
            $jumlah = rupiah($post['jumlah']);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, $no++)
            ->setCellValue('C'.$i, $tgl)
            ->setCellValue('D'.$i, $jumlah)
            ;
            $i++;
        }
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Penjualan');
>>>>>>> 296eed5ac759b98d95ddda0b7cd0b7922a4b62c9

       $data['dataoperasionalbabeq'] = $this->laporan_model->getrowsoperasionalexcel($conditions,'babe-q'); 

       // if ($this->input->post('submit')=='excel') {

        $this->load->view('member/laporan/laporan_pdf', $data);
    // }else{
    //     ini_set('memory_limit', '32M');
    //     $this->load->library('pdf');
    //     $html = $this->load->view('member/laporan/laporan_pdf', $data);
        
    //     $pdf = $this->pdf->load();
    //     $pdf->WriteHTML($html);
    //     $pdf->Output('laporan penjualan.pdf', 'D'); 
    // }
}

public function laporan_penjualan_pdf()
{
   
    
<<<<<<< HEAD
}

public function keuangan()
{    
    $this->load->view('member/laporan/keuangan');
}   

public function laporankeuangan()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate');  
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowskeuangan($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporankeuangan';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowskeuangan($conditions);

//load the view
    $this->load->view('member/laporan/keuangan_view', $data, false);
}   

function excel_keuangan(){       

    $spreadsheet = new Spreadsheet(); 
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate');  
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowskeuangan($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tanggal')
    ->setCellValue('B1', 'Kode Rekening')
    ->setCellValue('C1', 'Nama Rekening')
    ->setCellValue('D1', 'Masuk')
    ->setCellValue('E1', 'Keluar')
    ->setCellValue('F1', 'Keterangan') 
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tanggal']);
        $masuk = rupiah($post['masuk']); 
        $keluar = rupiah($post['keluar']); 
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $tgl)
        ->setCellValue('B'.$i, $post['kode_rekening'])
        ->setCellValue('C'.$i, $post['nama_rekening'])
        ->setCellValue('D'.$i, $masuk)
        ->setCellValue('E'.$i, $keluar)
        ->setCellValue('F'.$i, $post['keterangan']) ;
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Keuangan');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Keuangan.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
=======
    public function keuangan()
    {    
        $this->load->view('member/laporan/keuangan');
    }   
    
    public function laporankeuangan()
    {   
        $conditions = array(); 
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate');  
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
//total rows count
        $totalRec = count($this->laporan_model->getrowskeuangan($conditions)); 

//pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'laporan/laporankeuangan';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

//set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

//get posts data
        $data['posts'] = $this->laporan_model->getrowskeuangan($conditions);

//load the view
        $this->load->view('member/laporan/keuangan_view', $data, false);
    }   

    function excel_keuangan(){       

        $spreadsheet = new Spreadsheet(); 
        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate');  
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $conditions['kategori']['excel'] = "excel"; 
        $postdata = $this->laporan_model->getrowskeuangan($conditions); 

        $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
        ->setLastModifiedBy('Paber Panjaitan')
        ->setTitle('Laporan Format Excel')
        ->setSubject('Laporan Format Excel');

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Tanggal')
        ->setCellValue('B1', 'Kode Rekening')
        ->setCellValue('C1', 'Nama Rekening')
        ->setCellValue('D1', 'Masuk')
        ->setCellValue('E1', 'Keluar')
        ->setCellValue('F1', 'Keterangan') 
        ;

        $i=2; 
        foreach($postdata as $post) { 
            $tgl = tgl_indo($post['tanggal']);
            $masuk = rupiah($post['masuk']); 
            $keluar = rupiah($post['keluar']); 
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $tgl)
            ->setCellValue('B'.$i, $post['kode_rekening'])
            ->setCellValue('C'.$i, $post['nama_rekening'])
            ->setCellValue('D'.$i, $masuk)
            ->setCellValue('E'.$i, $keluar)
            ->setCellValue('F'.$i, $post['keterangan']) ;
            $i++;
        }

// Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Keuangan');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Keuangan.xlsx"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
>>>>>>> 296eed5ac759b98d95ddda0b7cd0b7922a4b62c9

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}

// pegawai
public function pegawai()
{    
    level_user('laporan','pegawai',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $conditions['pegawai'] = '*';
    $timestamp    = strtotime(date('F Y'));
    $conditions['search']['firstdate'] = date('Y-m-01', $timestamp);
    $conditions['search']['lastdate'] = date('Y-m-t', $timestamp);

    //set start and limit
    $conditions['limit'] = '10';

    //get posts data
    $data['posts'] = $this->laporan_model->getrowpegawai($conditions);
    $data['pegawai'] = $this->db->get('master_pegawai a')->result(); 
    $this->load->view('member/laporan/pegawai',$data);
}   
public function laporanpegawai()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $pegawai = $this->input->get('pegawai');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['pegawai'] = $pegawai;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowpegawai($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanpegawai';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowpegawai($conditions);

//load the view
    $this->load->view('member/laporan/pegawai_view', $data, false);
}   

function excel_pegawai(){       

    $spreadsheet = new Spreadsheet();
    $supplier = $this->input->get('supplier');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['supplier'] = $supplier;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowspembelian($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nomor Faktur')
    ->setCellValue('B1', 'Tanggal Pembelian')
    ->setCellValue('C1', 'Kode Supplier')
    ->setCellValue('D1', 'Nama Supplier')
    ->setCellValue('E1', 'Total')
    ->setCellValue('F1', 'Pembayaran')
    ->setCellValue('G1', 'Termin')
    ->setCellValue('H1', 'Keterangan')
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tgl_pembelian']);
        $total = rupiah($post['total']);
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $post['nomor_faktur'])
        ->setCellValue('B'.$i, $tgl)
        ->setCellValue('C'.$i, $post['supplier'])
        ->setCellValue('D'.$i, $post['nama_supplier'])
        ->setCellValue('E'.$i, $total)
        ->setCellValue('F'.$i, $post['pembayaran'])
        ->setCellValue('G'.$i, $post['termin']." Hari")
        ->setCellValue('H'.$i, $post['keterangan']);
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Pembelian');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Pembelian.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}
} 