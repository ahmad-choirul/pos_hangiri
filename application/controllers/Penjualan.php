<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends CI_Controller {   
	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') != TRUE){    
			redirect(base_url('login'));
		}    
		$this->load->model('penjualan_model');
		$this->load->library('form_validation');
		$this->load->helper(array('string','security','form'));
		$this->load->library('Ajax_pagination');
		$this->perPage = 12;
	} 
	public function index()
	{    
		level_user('penjualan','index',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
		$data['total_po'] = $this->db->count_all('purchase_order'); 
		$data['total_pembelian'] = $this->db->count_all('pembelian_langsung'); 
		$data['total_penerimaan'] = $this->db->count_all('penerimaan_barang'); 
		$this->load->view('member/penjualan/beranda',$data);
	}   

	public function diskon()
	{    
        // level_user('penjualan','diskon',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
		$this->load->view('member/penjualan/diskon'); 
	}  

	public function hapusbarangkeranjang()
	{
		cekajax();   
		$simpan = $this->penjualan_model;
		$get = $this->input->get();    
		$stok = $simpan->hapusbarangkeranjang($get['idd']);
		$data['response'] = "berhasil";
		echo json_encode($data);
	}
	public function datadiskon()
	{   
		cekajax(); 
		$draw = intval($this->input->get("draw")); 
		$start = intval($this->input->get("start")); 
		$length = intval($this->input->get("length")); 
		$query = $this->penjualan_model->data_diskon();  
		$totalrows = $this->db->count_all_results();
		$data = []; 
		foreach($query as $r) {  
			$tombolhapus = level_user('penjualan','diskon',$this->session->userdata('kategori'),'delete') > 0 ? '<a class="mt-xs mr-xs btn btn-danger" onclick="hapus(this)"  data-id="'.$this->security->xss_clean($r['id']).'" role="button"><i class="fa  fa-trash-o"></i></a>':'';
			$data[] = array(   
				'  
				'.$tombolhapus.'
				',
				$this->security->xss_clean(tgl_indo($r['tanggal_berakhir'])), 
				$this->security->xss_clean($r['min_kuantiti']),   
				$this->security->xss_clean($r['kode_item']), 
				$this->security->xss_clean($r['nama_item']), 
				$this->security->xss_clean(rupiah($r['diskon'])), 
			); 
		}  
		$result = array( 
			"draw" => $draw, 
			"recordsTotal" => $totalrows, 
			"recordsFiltered" => $totalrows, 
			"data" => $data 
		);  
		echo json_encode($result);  
	}  


	public function penjualandetail(){  
		cekajax(); 
		$idd = $this->input->get("id");  
		$query = $this->penjualan_model->get_penjualan($idd); 
		foreach ($query as $po_data) {
			$result = array(  
				"id" => $this->security->xss_clean($po_data['id']),
				"id_pembeli" => $this->security->xss_clean($po_data['nama_pembeli']),
				"id_admin" => $this->security->xss_clean($po_data['nama_admin']),
				"tanggal_jam" => $this->security->xss_clean(tgl_indo($po_data['tanggal_jam'])),
				"total_harga_item" => $this->security->xss_clean($po_data['total_harga_item']),
				"jenis_penjualan" => $this->security->xss_clean($po_data['jenis_penjualan']),
			);     
		}

        // $this->db->join('penjualan_detail b', 'a.id = b.id_penjualan');
        // $detailpo = $this->db->get_where('penjualan_detail a', array('id_penjualan' => $idd)); 
		$this->db->select('a.*,b.nama_item');
		$this->db->from('penjualan_detail a');
		$this->db->join('master_item b', 'a.kode_item = b.kode_item');
		$this->db->where('a.id_penjualan', $idd);
		$detailpo = $this->db->get();

		foreach($detailpo->result() as $r) {
			$subArray['kode_item']=$this->security->xss_clean($r->kode_item);
			$subArray['harga_beli']=$this->security->xss_clean(rupiah($r->harga_beli));
			$subArray['nama_item']=$this->security->xss_clean($r->nama_item);
			$subArray['kuantiti']=$this->security->xss_clean($r->kuantiti);
			$subArray['harga_jual']=$this->security->xss_clean(rupiah($r->harga));
			$subArray['total']=$this->security->xss_clean(rupiah($r->total));

			$arraysub[] =  $subArray ; 
		}  
		$datasub = $arraysub;
		$array[] =  $result ; 
		echo'{"datarows":'.json_encode($array).',"datasub":'.json_encode($datasub).'}';
	}   

	public function diskontambah(){ 
		cekajax(); 
		$simpan = $this->penjualan_model;
		$validation = $this->form_validation; 
		$validation->set_rules($simpan->rulesdiskon());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{  
			if($simpan->simpandatadiskon()){ 
				$data['success']= true;
				$data['message']="Berhasil menyimpan data";  
			}else{
				$errors['fail'] = "gagal melakukan update data";
				$data['errors'] = $errors;
			}					
		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}

	public function hapusdiskon(){ 
		cekajax(); 
		$hapus = $this->penjualan_model;
		if($hapus->hapusdatadiskon()){ 
			$data['success']= true;
			$data['message']="Berhasil menghapus data"; 
		}else{    
			$errors['fail'] = "gagal menghapus data";
			$data['errors'] = $errors;
		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	} 

	public function kode_promosi()
	{    
    // level_user('penjualan','kode_promosi',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
		$data['id_promosi'] = $this->penjualan_model->get_master_promosi();
		$this->load->view('member/penjualan/kode_promosi',$data); 
	}  
	public function data_kode_promosi()
	{   
		cekajax(); 
		$get = $this->input->get();
		$list = $this->penjualan_model->get_kode_promosi_datatable();
		$data = array(); 
		foreach ($list as $r) { 
			$row = array(); 
			$tombolhapus = '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id_kode_promosi).'">Hapus</a></li>';
			$tomboledit = level_user('penjualan','kode_promosi',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id_kode_promosi).'">Edit</a></li>':'';
			$row[] = ' 
			<div class="btn-group dropup">
			<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
			'.$tomboledit.' 
			'.$tombolhapus.' 
			</ul>
			</div>
			';
			$status='';
			if ($r->status=='1') {
				$status = '<a class="btn btn-primary">Aktif</a>';
			}else{
				$status='<a class="btn btn-danger">Non Aktif</a>';
			}
			$row[] = $this->security->xss_clean($r->kode_promosi); 
			$row[] = $this->security->xss_clean($r->nama); 
			$row[] = $this->security->xss_clean($r->instagram);
			$row[] = $this->security->xss_clean($r->tanggal_lahir);
			$row[] = $this->security->xss_clean($r->hp);
			$row[] = $this->security->xss_clean($r->nama_promosi);
			$row[] = $status;
			$data[] = $row;
		} 
		$result = array(
			"draw" => $get['draw'],
			"recordsTotal" => $this->penjualan_model->count_all_datatable_kode_promosi(),
			"recordsFiltered" => $this->penjualan_model->count_filtered_datatable_kode_promosi(),
			"data" => $data,
		); 
		echo json_encode($result); 
	}


	public function promosidetail(){  
		cekajax(); 
		$idd = $this->input->get("id");
		$query = $this->db->get_where('master_kode_promosi', array('id_kode_promosi' => $idd),1);
		$result = array(  
			"id_kode_promosi" => $this->security->xss_clean($query->row()->id_kode_promosi),
			"kode_promosi" => $this->security->xss_clean($query->row()->kode_promosi),
			"nama" => $this->security->xss_clean($query->row()->nama),
			"instagram" => $this->security->xss_clean($query->row()->instagram),
			"tanggal_lahir" => $this->security->xss_clean($query->row()->tanggal_lahir), 
			"hp" => $this->security->xss_clean($query->row()->hp), 
		);    
		echo'['.json_encode($result).']';
	}


	public function promositambah(){ 
		cekajax(); 
        $post = $this->input->post();
		$simpan = $this->penjualan_model;
		$validation = $this->form_validation; 
		$validation->set_rules($simpan->rulespromosi());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{    
			$this->db->select('*');
			$this->db->where('instagram', $post["instagram"]);
			$this->db->where('id_promosi', $post["id_promosi"]);
			$this->db->from('master_kode_promosi');
			$hasil = $this->db->get();
			if ($hasil->num_rows()>0) {
				$data['success']= true;	
				$data['message'] = "Instagram Telah di Daftarkan Pada Masa Promo Ini";
			}else{
				if($simpan->simpandatapromosi()){
					$data['success']= true;
					$data['message']="Berhasil menyimpan data";  
				}else{
					$errors['fail'] = "gagal melakukan update data";
					$data['errors'] = $errors;
				}
			}

		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}


	public function promositambahweb(){ 
		$simpan = $this->penjualan_model;
		$validation = $this->form_validation; 
		$validation->set_rules($simpan->rulespromosi());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{    
			$kode_promosi = $simpan->simpandatapromosi();
			if($kode_promosi!=null){
				redirect("http://babe-q.com?kode=$kode_promosi");
			}else{
				redirect("http://babe-q.com?kode=gagal");

			}

		}
	}

	public function promosiedit(){ 
		cekajax(); 
		$simpan = $this->penjualan_model;
		$validation = $this->form_validation; 
		$validation->set_rules($simpan->rulespromosi());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{    
			if($simpan->updatedatapromosi()){
				$data['success']= true;
				$data['message']="Berhasil menyimpan data";
			}else{
				$errors['fail'] = "gagal melakukan update data";
				$data['errors'] = $errors;
			}

		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}

	public function promosihapus(){ 
		cekajax(); 
		$hapus = $this->penjualan_model;
		if($hapus->hapuskode_promosi()){ 
			$data['success']= true;
			$data['message']="Berhasil menghapus data"; 
		}else{    
			$errors['fail'] = "gagal menghapus data";
			$data['errors'] = $errors;
		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}

	public function master_promosi()
	{    
		$this->load->view('member/penjualan/master_promosi'); 
	}  
	public function data_master_promosi()
	{   
		cekajax(); 
		$get = $this->input->get();
		$list = $this->penjualan_model->get_master_promosi_datatable();
		$data = array(); 
		foreach ($list as $r) { 
			$row = array(); 
			$tombolhapus = '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id_promosi).'">Hapus</a></li>';
			$tomboledit = level_user('penjualan','kode_promosi',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id_promosi).'">Edit</a></li>':'';
			$row[] = ' 
			<div class="btn-group dropup">
			<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
			'.$tomboledit.' 
			'.$tombolhapus.' 
			</ul>
			</div>
			';
			$status='';
			if ($r->status=='1') {
				$status = '<a class="btn btn-primary">Aktif</a>';
			}else{
				$status='<a class="btn btn-danger">Non Aktif</a>';
			}
			$row[] = $this->security->xss_clean($r->nama_promosi); 
			$row[] = $this->security->xss_clean($r->tgl_awal);
			$row[] = $this->security->xss_clean($r->tgl_akhir);
			$row[] = $status;
			$data[] = $row;
		} 
		$result = array(
			"draw" => $get['draw'],
			"recordsTotal" => $this->penjualan_model->count_all_datatable_master_promosi(),
			"recordsFiltered" => $this->penjualan_model->count_filtered_datatable_master_promosi(),
			"data" => $data,
		); 
		echo json_encode($result); 
	}


	public function master_promosidetail(){  
		cekajax(); 
		$idd = $this->input->get("id");
		$query = $this->db->get_where('master_promosi', array('id_promosi' => $idd),1);
		$result = array(  
			"id_promosi" => $this->security->xss_clean($query->row()->id_promosi),
			"nama_promosi" => $this->security->xss_clean($query->row()->nama_promosi),
			"tgl_awal" => $this->security->xss_clean($query->row()->tgl_awal),
			"tgl_akhir" => $this->security->xss_clean($query->row()->tgl_akhir)
		);    
		echo'['.json_encode($result).']';
	}


	public function master_promositambah(){ 
		cekajax(); 
		$simpan = $this->penjualan_model;
		$validation = $this->form_validation; 
		$validation->set_rules($simpan->rulesmaster_promosi());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{    
			if($simpan->simpandatamaster_promosi()){
				$data['success']= true;
				$data['message']="Berhasil menyimpan data";  
			}else{
				$errors['fail'] = "gagal melakukan update data";
				$data['errors'] = $errors;
			}

		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}

	public function master_promosiedit(){ 
		cekajax(); 
		$simpan = $this->penjualan_model;
		$validation = $this->form_validation; 
		$validation->set_rules($simpan->rulesmaster_promosi());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{    
			if($simpan->updatedatamaster_promosi()){
				$data['success']= true;
				$data['message']="Berhasil menyimpan data";
			}else{
				$errors['fail'] = "gagal melakukan update data";
				$data['errors'] = $errors;
			}

		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}

	public function master_promosihapus(){ 
		cekajax(); 
		$hapus = $this->penjualan_model;
		if($hapus->hapusmaster_promosi()){ 
			$data['success']= true;
			$data['message']="Berhasil menghapus data"; 
		}else{    
			$errors['fail'] = "gagal menghapus data";
			$data['errors'] = $errors;
		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}


	public function ajaxPaginationDataKasir($kode)
	{
		$page = $this->input->get('page');
		if(!$page){
			$offset = 0;
		}else{
			$offset = $page;
		}

        //set conditions for search
		$keywords = $this->input->get('keywords');
		$sortBy = $this->input->get('sortBy');
		if(!empty($keywords)){
			$conditions['search']['keywords'] = $keywords;
		}
		if(!empty($sortBy)){
			$conditions['search']['sortBy'] = $sortBy;
		}

		level_user('penjualan','kasir',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();

		$data = array();

        //total rows count
        // $totalRec = count($this->penjualan_model->getRows()); 
		$totalRec = 0;


        // $kategori = 'Prekursor';
        // $kategori1 = 'Prekursor';
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;

    // $data['post1'] = $this->penjualan_model->getRows1($kategori,$conditions);

        //get the posts data
		$data['post'] = $this->penjualan_model->getRows($conditions);
        // echo json_encode($data['post1']);die;
        // $data['post2'] = $this->penjualan_model->getRows2(array($where1, $kategori, 'limit'=>$this->perPage));
		$data['dokter'] = $this->db->get('master_dokter')->result();
		$data['pegawai'] = $this->penjualan_model->get_pegawai();

		$data['loop'] = $kode <= 2? $data['post'] : $data['post1'];

		$totalRec = count($data['loop']);
		$config['target']      = '#HalamanProduk';
		$config['base_url']    = base_url().'posts/ajaxPaginationDataKasir/'.$kode;
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
	}

	public function kasir()
	{    
		level_user('penjualan','kasir',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();

		$data = array();
		$totalRec = 0;

		$data['pegawai'] = $this->penjualan_model->get_pegawai();

		$data['loop'] =$this->penjualan_model->getRows(array());
		$totalRec = count($data['loop']);
		$config['target']      = '#postList';
		$config['base_url']    = base_url().'posts/ajaxPaginationDataKasir';
        // $config['base_url']    = base_url().'posts/ajaxPaginationDataKasir?kode='.$kode;
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';

		$this->ajax_pagination->initialize($config);

		$this->load->view('member/penjualan/kasir',$data); 
	}  
	public function cekquery($value='')
	{
		echo "<pre>";
		print_r ($this->session->flashdata('query'));
		echo "</pre>";
	}

	public function tambahkeranjangbarcode(){
		cekajax();   
		$simpan = $this->penjualan_model;
		$get = $this->input->get();   
		$query = $this->db->select('*')->from('master_item')->where('kode_item ="'.$get['barcode'].'"')->get();
		if($query->num_rows() > 0 ){
			if($query->row()->stok > 0){ 
				$simpankeranjang = $simpan->cek_keranjang($get['barcode'],$get['pembeli'],'0',$get['statppn']);
				$data['response'] = "tersedia";
			}else{ 
				$data['response'] = "stok kosong";
			}
		} else{
			$data['response'] = '0';   
		} 
		echo json_encode($data);
	} 

	public function keranjangtambah(){  
		cekajax();   
		$simpan = $this->penjualan_model;
		$get = $this->input->get();    
		$stok = $simpan->tambahkeranjang($get['idd']);
		$data['response'] = "berhasil";
		echo json_encode($data);
	} 
	public function update_pembeli(){  
		$get = $this->input->get();   
		$pembeli = $get['pembeli'];
		if($pembeli==''){
			$pembeli = NULL;
		}
		$query = $this->db->get_where('keranjang', array('hold' => '0','id_admin' => $this->session->userdata('idadmin')),1);
		$idkeranjang = $query->row()->id;
		if($query->num_rows() < 1){
			$array = array( 
				'tanggal_jam'=>date('Y-m-d h:i:s'), 
				'id_admin'=>$this->session->userdata('idadmin'),  
				'id_pembeli'=>$pembeli, 
				'total'=>'0', 
				'hold'=>'0', 
			);
			$this->db->insert("keranjang", $array);   
		}else{ 
			$array = array( 
				'tanggal_jam'=>date('Y-m-d h:i:s'),  
				'id_pembeli'=>$pembeli,
			);
			$this->db->update("keranjang", $array,array('id' => $idkeranjang ));
		} 
	}
	public function keranjangkurang(){  
		cekajax();   
		$simpan = $this->penjualan_model;
		$get = $this->input->get();    
		$stok = $simpan->kurangkeranjang($get['idd']);
		$data['response'] = "berhasil";
		echo json_encode($data);
	} 
	public function keranjanghapus(){  
		cekajax();   
		$simpan = $this->penjualan_model;
		$get = $this->input->get();    
		$stok = $simpan->hapuskeranjang($get['idd']);
		$data['response'] = "berhasil";
		echo json_encode($data);
	} 
	public function canceltransaksi(){ 
		cekajax();    
		$hapus = $this->db->where(array('hold' => '0','id_admin' => $this->session->userdata('idadmin')))->delete('keranjang'); 
		if($hapus == TRUE){ 
			$data['response'] = "berhasil";
		}else{
			$data['response'] = "gagal"; 
		}
		echo json_encode($data);
	}

	public function tampilkanhold(){  
		cekajax();    
		$hold = $this->penjualan_model;
		$get = $this->input->get(); 
		$hapus = $this->db->where(array('hold' => '0','id_admin' => $this->session->userdata('idadmin')))->delete('keranjang'); 
		if($hapus == TRUE){ 
			$hold->bukaholdtransaksi($get['idkeranjang']); 
			$query = $this->db->get_where('keranjang', array('id' => $get['idkeranjang'],'id_admin' => $this->session->userdata('idadmin')),1); 
			if(empty($query->row()->id_pembeli)){  
				$nama_pembeli ="Walk in Customer";
				$id_pembeli ="";
			}else{
				$pembeli = $this->db->get_where('master_pembeli', array('id' => $query->row()->id_pembeli),1); 
				$nama_pembeli = $pembeli->row()->nama_pembeli;
				$id_pembeli = $pembeli->row()->id;
			} 
			$data['nama_pembeli'] = $nama_pembeli;
			$data['id_pembeli'] = $id_pembeli;
		}else{
			$data['response'] = "gagal"; 
		} 
		echo json_encode($data);
	} 

	public function holdtransaksi(){ 
		cekajax();       
		$hold = $this->penjualan_model; 
		$validation = $this->form_validation; 
		$validation->set_rules($hold->rulesholdtransaksi());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{    
			if($hold->holdtransaksi() == TRUE){ 
				$data['success']= true;
				$data['message']="Berhasil hold transaksi";     
			}else{ 
				$errors="fail";
				$data['errors'] = $errors;
			}
		} 
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}


	function ajaxPaginationData(){
		$conditions = array();
        //calc offset number
		$page = $this->input->get('page');
		if(!$page){
			$offset = 0;
		}else{
			$offset = $page;
		}

        //set conditions for search
		$keywords = $this->input->get('keywords');
		$sortBy = $this->input->get('sortBy');
		$sortkategori = $this->input->get('sortkategori');
		if(!empty($keywords)){
			$conditions['search']['keywords'] = $keywords;
		}
		if(!empty($sortBy)){
			$conditions['search']['sortBy'] = $sortBy;
		}
		if(!empty($sortkategori)){
			$conditions['search']['sortkategori'] = $sortkategori;
		}
        //total rows count
		$totalRec = count($this->penjualan_model->getRows($conditions)); 

        //pagination configuration
		$config['target']      = '#postList';
		$config['base_url']    = base_url().'penjualan/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);

        //set start and limit
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;

        //get posts data
		$data['posts'] = $this->penjualan_model->getRows($conditions);

        //load the view
		$this->load->view('member/penjualan/ajax-pagination-data', $data, false);

	}
	public function datapembeli()
	{   
		cekajax(); 
		$draw = intval($this->input->get("draw")); 
		$start = intval($this->input->get("start")); 
		$length = intval($this->input->get("length"));
		$query = $this->db->get("master_pembeli");
		$data = []; 
		foreach($query->result() as $r) { 
			$data[] = array(   
				$this->security->xss_clean($r->nama_pembeli), 
				$this->security->xss_clean($r->hp),
				'    <a onclick="pilihpembeli(this)" data-namapembeli="'.$r->nama_pembeli.'" data-id="'.$r->id.'" class="mt-xs mr-xs btn btn-info" role="button"><i class="fa fa-check-square-o"></i></a>
				'
			); 
		}  
		$result = array( 
			"draw" => $draw, 
			"recordsTotal" => $query->num_rows(), 
			"recordsFiltered" => $query->num_rows(), 
			"data" => $data 
		);  
		echo json_encode($result);  
	}

	public function datahold()
	{   
		cekajax(); 
		$draw = intval($this->input->get("draw")); 
		$start = intval($this->input->get("start")); 
		$length = intval($this->input->get("length"));
		$query = $this->db->order_by("id","ASC")->where(array('hold' => '1','id_admin' => $this->session->userdata('idadmin')))->get("keranjang");
		$data = []; 
		$no = 0;
		foreach($query->result() as $r) { 
			$no = $no + 1;
			$tgl = date('Y-m-d', $r->waktu_hold);
			$jam = date('H:i:s', $r->waktu_hold);
			$waktu = tgl_indo($tgl)." ".$jam;
			$data[] = array(   
				$no, 
				$this->security->xss_clean($r->keterangan_hold), 
				$this->security->xss_clean($waktu),  
				'    <a onclick="pilihhold(this)" data-id="'.$r->id.'" class="mt-xs mr-xs btn btn-info" role="button"><i class="fa fa-check-square-o"></i></a>

				'
			); 
		}  
		$result = array( 
			"draw" => $draw, 
			"recordsTotal" => $query->num_rows(), 
			"recordsFiltered" => $query->num_rows(), 
			"data" => $data 
		);  
		echo json_encode($result);  
	}
	public function keranjangdetail($statppn='',$potongan=0,$potonganrp=0){  
		cekajax();
		$result =  array();   
		$arraysub=   array();  
		$id_keranjang='';
		$query = $this->penjualan_model->get_keranjang();   
		if($query->num_rows() > 0){ 
			$id_keranjang=$query->row()->id;
			if ($query->row()->jenis_penjualan!=$statppn) {
				$this->penjualan_model->ubahhargakeranjang($statppn,$query->row()->id);
			}
			$kuantiti = 0;
			$total_harga_item=0;
			$detailkeranjang = $this->penjualan_model->detail_keranjang($query->row()->id); 
			if($detailkeranjang->num_rows() > 0){      
				foreach($detailkeranjang->result_array() as $r) {   
					$kuantiti = $kuantiti + $r['kuantiti'];
					$nama_item = $r['nama_item'];
					$subArray['nama_item']=$this->security->xss_clean($nama_item); 
					$subArray['id']=$this->security->xss_clean($r['id']); 
					$subArray['harga']=$this->security->xss_clean(rupiah($r['harga'])); 
					$subArray['diskon']=$this->security->xss_clean(rupiah($r['diskon']));
					$subArray['kuantiti']=$this->security->xss_clean($r['kuantiti']);
					$subArray['total']=$this->security->xss_clean(rupiah($r['harga']*$r['kuantiti'])); 
					$subArray['id_keranjang']=$this->security->xss_clean($r['id_keranjang']);
					$arraysub[] =  $subArray ;  
					$total_harga_item+=$r['harga']*$r['kuantiti'];
				}    
			} 
			$totalbayar = $total_harga_item;
			if ($statppn=='ppn') {
				$tambah_ppn = 0.1*$total_harga_item;
			}else{
				$tambah_ppn=0;
			}
			$totalbayar+=$tambah_ppn;
			if ($potongan=='100') {
				if ($totalbayar>50000) {
					$besar_potongan=50000;
				}else{
					$besar_potongan=$totalbayar;
				}
			}else{
				$besar_potongan = ($potongan/100)*$totalbayar;
			}
			$besar_potongan+=$potonganrp;
			$totalbayar-=$besar_potongan;
			$result = array(  
				"total_harga_item" => $this->security->xss_clean(rupiah($total_harga_item)),
				"total" => $this->security->xss_clean(rupiah($totalbayar)), 
				"besar_potongan" => $this->security->xss_clean(rupiah($besar_potongan)),
				"besar_potonganint" => $this->security->xss_clean($besar_potongan),
				"tambah_ppn" => $this->security->xss_clean(rupiah($tambah_ppn)),
				"tambah_ppnint" => $this->security->xss_clean($tambah_ppn), 
				"totalInt" => $this->security->xss_clean($totalbayar), 
				"totalKuantiti" => $this->security->xss_clean($kuantiti), 
			);
			$dataupdatekeranjang = array('total_harga_item' => $total_harga_item,
				'total' => $totalbayar,
				'diskon' => $besar_potongan, );
			$this->db->where('id', $id_keranjang);
			$this->db->update('keranjang', $dataupdatekeranjang);
		} 
		$datasub = $arraysub;

		$array[] =  $result ; 
		echo'{"datarows":'.json_encode($array).',"datasub":'.json_encode($datasub).'}';
	}

	public function promosijenis(){  
		cekajax();       
		$get = $this->input->get();    
		$promosi = $this->penjualan_model->promosijenis($get['jenis']);  
		foreach($promosi->result_array() as $r) {    
			$subArray['singkatan']=$this->security->xss_clean($r['singkatan']);  
			$arraysub[] =  $subArray ;  
		}   
		$datasub = $arraysub; 
		echo'{"datasub":'.json_encode($datasub).'}';
	}

	public function target()
	{   
		level_user('penjualan','target',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
		$data['target'] = $this->db->get_where('master_target', array('id' => '1'),1); 
		$this->load->view('member/penjualan/target',$data);
	}   

	public function edittarget(){ 
		cekajax(); 
		$simpan = $this->penjualan_model; 
		$post = $this->input->post();
		$validation = $this->form_validation; 
		$validation->set_rules($simpan->rulestargetedit());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
		}else{       
			if($simpan->updatedatatarget()){
				$data['success']= true;
				$data['message']="Berhasil menyimpan data";   
			}else{
				$errors['fail'] = "gagal melakukan update data";
				$data['errors'] = $errors;
			}  				
		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}


	public function submitpayment(){ 
		cekajax(); 
		$simpan = $this->penjualan_model; 
		$post = $this->input->post();
		$total_pembayaran = bilanganbulat($post['totaldibayar'][0]) + bilanganbulat($post['totaldibayar'][1]);
		if( bilanganbulat($post['post_totalbelanja']) > 0 && $total_pembayaran >= bilanganbulat($post['post_totalbelanja'])){ 
			if($simpan->submitpayment()){
				$data['success']= true;
				$data['message']="Transaksi berhasil";  
			}else{
				$errors['fail'] = "gagal melakukan checkout";
				$data['errors'] = $errors;
			}
		}else{
			$errors['fail'] = "mohon isi form pembayaran dengan benar";
			$data['errors'] = $errors; 
		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data); 
	}

	function struk()
	{   $keranjang = $this->db->get_where('keranjang', array('hold' => '0', 'id_admin' => $this->session->userdata('idadmin')), 1);

	$data['id_pembeli'] =  $keranjang->row()->id_pembeli;
	$date = $this->input->get('tmp');
	$data['tempo'] = date("yyyy-mm-dd",strtotime($date)) ;


        //pembeli
	if ($data['id_pembeli']!='') {
		$this->db->where('id',  $data['id_pembeli']);
	}
	$this->db->limit(1);
	$pembeli = $this->db->get('master_pembeli');
        //apotek
	$this->db->order_by('id', 'DESC'); 
	$this->db->limit(1);
	$toko = $this->db->get('profil_apotek');
        //keranjang
	$id = $this->input->get('t');
	$this->db->select("*");
	$this->db->from("keranjang_detail a");
	$this->db->join('master_item b', 'a.kode_item = b.kode_item');  
        // $this->db->join('keranjang c', 'a.id_keranjang = c.id'); 
	$this->db->where('a.id_keranjang', $id);
        // $this->db->group_by('a.id');
	$this->db->order_by('a.id', 'DESC'); 
	$detail = $this->db->get();
        // 
	$ids = $this->input->get('pegawai');
	$this->db->select("*");
	$this->db->from("master_admin ");
	$this->db->where('master_admin.id', $ids);
	$pegawai = $this->db->get();
        // 

        // data
	$data['keranjang'] =  $detail->result_array();
	$data['penjualan'] =  $this->penjualan_model->_kode_penjualan();
	$data['pegawai'] =  $this->session->userdata('nama_admin');;
	$data['id_pegawai'] =  $ids;
	$data['kode'] =  $this->input->get('tp');
	$data['apoteker'] =  $pembeli->result_array();
	$data['toko'] =  $toko->result_array();
	$data['status'] =  "cash";
	$data['kepada'] =  "Costumer Toko";
	$data['pelanggan'] =  $this->input->get('pelanggan');
	$data['totalbayar'] =  $this->input->get('bayar');
	$data['catatan'] =  $this->input->get('catatan');
	$data['statppn'] =  $this->input->get('statppn');
	$data['stattrans'] =  $this->input->get('stattrans');
	$data['potongan'] =  $this->input->get('potongan');
	$data['resto'] =  $this->input->get('resto');
	$data['potonganrp'] =  $this->input->get('potonganrp');
	if ($data['potonganrp']==''||$data['potonganrp']==null) {
		$data['potonganrp']=0;
	}
	$status = $this->penjualan_model->submitpaymentv2($data);
	if ($status) {
		$this->load->view('member/penjualan/struk58mm', $data); 
	}else{
		redirect('penjualan/kasir','refresh');
	}
}
function strukedc()
{   $keranjang = $this->db->get_where('keranjang', array('hold' => '0', 'id_admin' => $this->session->userdata('idadmin')), 1);

$data['id_pembeli'] =  $keranjang->row()->id_pembeli;
$date = $this->input->get('tmp');
$data['tempo'] = date("yyyy-mm-dd",strtotime($date)) ;


        //pembeli
if ($data['id_pembeli']!='') {
	$this->db->where('id',  $data['id_pembeli']);
}
$this->db->limit(1);
$pembeli = $this->db->get('master_pembeli');
        //apotek
$this->db->order_by('id', 'DESC'); 
$this->db->limit(1);
$toko = $this->db->get('profil_apotek');
        //keranjang
$id = $this->input->get('t');
$this->db->select("*");
$this->db->from("keranjang_detail a");
$this->db->join('master_item b', 'a.kode_item = b.kode_item');  
        // $this->db->join('keranjang c', 'a.id_keranjang = c.id'); 
$this->db->where('a.id_keranjang', $id);
        // $this->db->group_by('a.id');
$this->db->order_by('a.id', 'DESC'); 
$detail = $this->db->get();
        // 
$ids = $this->input->get('pegawai');
$this->db->select("*");
$this->db->from("master_admin ");
$this->db->where('master_admin.id', $ids);
$pegawai = $this->db->get();
        // 

        // data
$data['keranjang'] =  $detail->result_array();
$data['penjualan'] =  $this->penjualan_model->_kode_penjualan();
$data['pegawai'] =  $this->session->userdata('nama_admin');;
$data['id_pegawai'] =  $ids;
$data['kode'] =  $this->input->get('tp');
$data['apoteker'] =  $pembeli->result_array();
$data['toko'] =  $toko->result_array();
$data['status'] =  "edc";
$data['kepada'] =  "Costumer Toko";
$data['pelanggan'] =  $this->input->get('pelanggan');
$data['totalbayar'] =  $this->input->get('bayar');
$data['catatan'] =  $this->input->get('catatan');
$data['statppn'] =  $this->input->get('statppn');
$data['stattrans'] =  $this->input->get('stattrans');
$data['potongan'] =  $this->input->get('potongan');
$data['resto'] =  $this->input->get('resto');
$data['potonganrp'] =  $this->input->get('potonganrp');
if ($data['potonganrp']==''||$data['potonganrp']==null) {
	$data['potonganrp']=0;
}
$data['no_kartu'] =  $this->input->get('no_kartu');
$status = $this->penjualan_model->submitpaymentv2($data);
if ($status) {
	$this->load->view('member/penjualan/struk58mm', $data); 
}else{
	redirect('penjualan/kasir','refresh');
}
}

public function tes_kode_penjualan()
{
	$jumlah = $this->db->query('SELECT id FROM `penjualan` WHERE tanggal = CURRENT_DATE() order by tanggal_jam desc limit 1 ');
	if ($jumlah->num_rows()>0) {
		$kode = $jumlah->result_array()[0]['id']+1;
	}else{
		$jml_baru = 1;
		$kode = sprintf("%06s", $jml_baru);
		$kode = date('dmy') . $kode;
	}	
}
}