<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller {   
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != TRUE){    
            redirect(base_url('login'));
        }    
        $this->load->model('master_model');
        $this->load->library('form_validation');
        $this->load->helper(array('string','security','form'));
    }  
    
	public function index()
	{    
        level_user('master','index',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $data['total_pembeli'] = $this->db->count_all('master_pembeli'); 
        $data['total_supplier'] = $this->db->count_all('master_supplier'); 
        $data['total_kategori'] = $this->db->count_all('master_kategori'); 
        $data['total_item'] = $this->db->get('master_item')->num_rows(); 
        $this->load->view('member/master/beranda',$data);
    }  
	  
	
	public function supplier()
	{   
        level_user('master','supplier',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/master/supplier');
    }  
    public function datasupplier()
	{   
        cekajax(); 
        $get = $this->input->get();
        $list = $this->master_model->get_supplier_datatable();
        $data = array(); 
        foreach ($list as $r) { 
            $row = array(); 
            $tombolhapus = level_user('master','supplier',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
            $tomboledit = level_user('master','supplier',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
            $row[] = ' 
                    <div class="btn-group dropup">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">   
                            '.$tomboledit.'
                            '.$tombolhapus.'
                        </ul>
                    </div>
                    ';
            $row[] = $this->security->xss_clean($r->nama_supplier);
            $row[] = $this->security->xss_clean($r->telepon);
            $row[] = $this->security->xss_clean($r->alamat);
            $row[] = $this->security->xss_clean($r->keterangan);  
            $data[] = $row;
        } 
        $result = array(
            "draw" => $get['draw'],
            "recordsTotal" => $this->master_model->count_all_datatable_supplier(),
            "recordsFiltered" => $this->master_model->count_filtered_datatable_supplier(),
            "data" => $data,
        ); 
        echo json_encode($result); 
    }
    public function suppliertambah(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulessupplier());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{    
            if($simpan->simpandatasupplier()){
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
    public function supplierdetail(){  
        cekajax(); 
        $idd = intval($this->input->get("id")); 
        $query = $this->db->get_where('master_supplier', array('id' => $idd),1);
        $result = array(  
            "nama_supplier" => $this->security->xss_clean($query->row()->nama_supplier),
            "alamat" => $this->security->xss_clean($query->row()->alamat),
            "telepon" => $this->security->xss_clean($query->row()->telepon),
            "keterangan" => $this->security->xss_clean($query->row()->keterangan),
        );    
    	echo'['.json_encode($result).']';
    }
    public function supplieredit(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulessupplier());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{    
            if($simpan->updatedatasupplier()){
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
    public function supplierhapus(){ 
        cekajax(); 
        $hapus = $this->master_model;
        if($hapus->hapusdatasupplier()){ 
            $data['success']= true;
            $data['message']="Berhasil menghapus data"; 
        }else{    
            $errors['fail'] = "gagal menghapus data";
			$data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
    
	public function pembeli()
	{     
        level_user('master','pembeli',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/master/pembeli'); 
    }  
    
    public function datapembeli()
	{   
        cekajax(); 
        $get = $this->input->get();
        $list = $this->master_model->get_pembeli_datatable();
        $data = array(); 
        foreach ($list as $r) { 
            $row = array(); 
            $tombolhapus = level_user('master','pembeli',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
            $tomboledit = level_user('master','pembeli',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
            $row[] = ' 
                    <div class="btn-group dropup">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->id).'">Detail</a></li>
                            '.$tomboledit.'
                            '.$tombolhapus.'
                        </ul>
                    </div>
                    ';
            $row[] = $this->security->xss_clean($r->nama_pembeli);
            $row[] = $this->security->xss_clean($r->alamat);
            $row[] = $this->security->xss_clean($r->hp);
            $data[] = $row;
        } 
        $result = array( 
            "draw" => $get['draw'],
            "recordsTotal" => $this->master_model->count_all_datatable_pembeli(),
            "recordsFiltered" => $this->master_model->count_filtered_datatable_pembeli(),
            "data" => $data,
        ); 
        echo json_encode($result); 
    }

    public function pembelitambah(){ 
        cekajax(); 
        $post = $this->input->post();
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulespembeli());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{    
            $insert_id = $simpan->simpandatapembeli();
            if($insert_id > 0) { 
                $data['success']= true;
                $data['pembeli']= $post["nama_pembeli"];
                $data['id_pembeli']= $insert_id;
                $data['message']="Berhasil menyimpan data";
            }else{
                $errors['fail'] = "gagal melakukan update data";
			    $data['errors'] = $errors;
            }  
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    } 
    public function pembelidetail(){  
        cekajax(); 
       $idd = intval($this->input->get("id")); 
       $nama_dokter ="";
       $query = $this->db->select("nama_pembeli,hp,alamat")->get_where('master_pembeli', array('id' => $idd),1);
       if(!empty($query->row()->kode_dokter)){    
           $dokter = $this->db->select("nama_dokter")->get_where('master_dokter', array('kode_dokter' => $query->row()->kode_dokter),1);
           $nama_dokter = $dokter->row()->nama_dokter;
       }

        $result = array(  
            "nama_pembeli" => $this->security->xss_clean($query->row()->nama_pembeli),
            "alamat" => $this->security->xss_clean($query->row()->alamat),
            "hp" => $this->security->xss_clean($query->row()->hp),
			
        );    
    	echo'['.json_encode($result).']';
    }
    public function pembeliedit(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulespembeli());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{    
            $simpan->updatedatapembeli();
            $data['success']= true;
            $data['message']="Berhasil menyimpan data";
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
    public function pembelihapus(){ 
        cekajax(); 
        $hapus = $this->master_model;
        if($hapus->hapusdatapembeli()){ 
            $data['success']= true;
            $data['message']="Berhasil menghapus data"; 
        }else{    
            $errors="fail";
			$data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
    
	public function itemkategori()
	{   
        level_user('master','itemkategori',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/master/itemkategori');
    }  
    public function datakategori()
	{   
        cekajax(); 
        $get = $this->input->get();
        $list = $this->master_model->get_kategori_datatable();
        $data = array(); 
        foreach ($list as $r) { 
            $row = array(); 
            $tombolhapus = level_user('master','itemkategori',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
            $tomboledit = level_user('master','itemkategori',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
            $row[] = ' 
                    <div class="btn-group dropup">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu"> 
                        '.$tomboledit.'
                        '.$tombolhapus.'
                        </ul>
                    </div>
                    ';
            $row[] = $this->security->xss_clean($r->nama_kategori); 
            $data[] = $row;
        } 
        $result = array(
            "draw" => $get['draw'],
            "recordsTotal" => $this->master_model->count_all_datatable_kategori(),
            "recordsFiltered" => $this->master_model->count_filtered_datatable_kategori(),
            "data" => $data,
        ); 
        echo json_encode($result); 
    }
    public function kategoritambah(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->ruleskategori());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{     
            if($simpan->simpandatakategori()){
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
    
    public function kategoridetail(){  
        cekajax(); 
        $query = $this->db->get_where('master_kategori', array('id' => $this->input->get("id")),1);
        $result = array(  
            "id" => $this->security->xss_clean($query->row()->id), 
            "nama_kategori" => $this->security->xss_clean($query->row()->nama_kategori), 
        );    
    	echo'['.json_encode($result).']';
    } 
    public function kategoriedit(){ 
        cekajax(); 
        $simpan = $this->master_model;
        $post = $this->input->post();    
            $validation = $this->form_validation; 
            $validation->set_rules($simpan->ruleskategori());
            if ($this->form_validation->run() == FALSE){
                $errors = $this->form_validation->error_array();
                $data['errors'] = $errors;
            }else{    
                if($simpan->updatedatakategori()){
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
    
    public function kategorihapus(){ 
        cekajax(); 
        $hapus = $this->master_model;
        if($hapus->hapusdatakategori()){ 
            $data['success']= true;
            $data['message']="Berhasil menghapus data"; 
        }else{    
            $errors['fail'] = "gagal menghapus data";
			$data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }  
	public function satuan() 
	{   
        level_user('master','satuan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/master/satuan');
    }  
    public function datasatuan()
	{   
        cekajax(); 
        $get = $this->input->get();
        $list = $this->master_model->get_satuan_datatable();
        $data = array(); 
        foreach ($list as $r) { 
            $row = array(); 
            $tombolhapus = level_user('master','satuan',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
            $tomboledit = level_user('master','satuan',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
            $row[] = ' 
                    <div class="btn-group dropup">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu"> 
                        '.$tomboledit.'
                        '.$tombolhapus.'
                        </ul>
                    </div>
                    ';
            $row[] = $this->security->xss_clean($r->id);
            $row[] = $this->security->xss_clean($r->isi_persatuan);
            $row[] = $this->security->xss_clean($r->satuan_besar); 
            $data[] = $row;
        } 
        $result = array(
            "draw" => $get['draw'],
            "recordsTotal" => $this->master_model->count_all_datatable_satuan(),
            "recordsFiltered" => $this->master_model->count_filtered_datatable_satuan(),
            "data" => $data,
        ); 
        echo json_encode($result);  
    }
    public function satuantambah(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulessatuan());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{     
			if($simpan->simpandatasatuan()){
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
    
   
	
	public function items()
	{  
        level_user('master','items',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $data['kategori'] = $this->db->get('master_kategori')->result(); 
        $this->load->view('member/master/items',$data);
    }  


    public function items_bahanbaku()
    {  
        level_user('master','items',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $data['kategori'] = $this->db->get('master_kategori')->result(); 
        $this->load->view('member/master/items_bahanbaku',$data);
    }  
    public function dataitems()
	{   
        cekajax(); 
        $get = $this->input->get();
        $list = $this->master_model->get_item_datatable();
        $data = array(); 
        foreach ($list as $r) { 
            $row = array(); 
            $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Hapus</a></li>':'';
            $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Edit</a></li>':'';
            $row[] = ' 
                    <div class="btn-group dropup">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Detail</a></li> 
                            '.$tomboledit.'
                            '.$tombolhapus.' 
                        </ul>
                    </div>
                    ';
                    
            $row[] = $this->security->xss_clean($r->kode_item); 
            $row[] = $this->security->xss_clean($r->nama_item); 
            $row[] = $this->security->xss_clean($r->nama_kategori);    
            $row[] = $this->security->xss_clean(rupiah($r->harga_beli)); 
            $row[] = $this->security->xss_clean(rupiah($r->harga_jual));
            $row[] = $this->security->xss_clean(rupiah($r->harga_jual2));
            $row[] = $this->security->xss_clean(date('d M Y',strtotime($r->tgl_expired)));
            $data[] = $row;
        } 
        $result = array(
            "draw" => $get['draw'],
            "recordsTotal" => $this->master_model->count_all_datatable_item(),
            "recordsFiltered" => $this->master_model->count_filtered_datatable_item(),
            "data" => $data,
        ); 
        echo json_encode($result);  
    }  
    public function itemstambah(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulesitems());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{      			
			if($simpan->simpandataitems()){
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
    
    public function itemdetail(){  
        cekajax(); 
        $idd = $this->input->get("id"); 
        $this->db->select('a.*,b.nama_kategori');
        $this->db->join('master_kategori b', 'a.kategori = b.id');
        $query = $this->db->get_where('master_item a', array('kode_item' => $idd),1);
        $result = array(  
            "kode_item" => $this->security->xss_clean($query->row()->kode_item),
            "nama_kategori" => $this->security->xss_clean($query->row()->nama_kategori),
            "kategori" => $this->security->xss_clean($query->row()->kategori),
            "nama_item" => $this->security->xss_clean($query->row()->nama_item),
            "keterangan" => $this->security->xss_clean($query->row()->keterangan),
            "netto" => $this->security->xss_clean($query->row()->netto), 
            "harga_jualedit" => $this->security->xss_clean($query->row()->harga_jual),
            "harga_jualedit2" => $this->security->xss_clean($query->row()->harga_jual2),
            "harga_jual" => $this->security->xss_clean(rupiah($query->row()->harga_jual)),
            "harga_jual2" => $this->security->xss_clean(rupiah($query->row()->harga_jual2)),
            "harga_beliedit" => $this->security->xss_clean($query->row()->harga_beli),
            "harga_beli" => $this->security->xss_clean(rupiah($query->row()->harga_beli)),
            "stok" => $this->security->xss_clean($query->row()->stok),
            "tanggal_expired" => $this->security->xss_clean(date('d M Y',strtotime($query->row()->tgl_expired))),
            "tanggal_expireds" => $this->security->xss_clean($query->row()->tgl_expired),
            "gambar" => $this->security->xss_clean($query->row()->gambar), 
        );    
    	echo'['.json_encode($result).']';
    }
    
    public function itemsedit(){ 
        cekajax(); 
        $simpan = $this->master_model; 
        $post = $this->input->post();
        if($post["kode_item"] == $post["idd"]){  
            $validation = $this->form_validation; 
            $validation->set_rules($simpan->rulesitemsedit());
            if ($this->form_validation->run() == FALSE){
                $errors = $this->form_validation->error_array();
                $data['errors'] = $errors;
            }else{       
                if($simpan->updatedataitems()){
                    $data['success']= true;
                    $data['message']="Berhasil menyimpan data";   
                }else{
                    $errors['fail'] = "gagal melakukan update data";
                    $data['errors'] = $errors;
                }  				
            }
        }else{          
            $validation = $this->form_validation; 
            $validation->set_rules($simpan->rulesitems());
            if ($this->form_validation->run() == FALSE){
                $errors = $this->form_validation->error_array();
                $data['errors'] = $errors;
            }else{          
                if($simpan->updatedataitems()){
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
    
    public function itemshapus(){ 
        cekajax(); 
        $hapus = $this->master_model;
        if($hapus->hapusdataitem()){ 
            $data['success']= true;
            $data['message']="Berhasil menghapus data"; 
        }else{    
            $errors['fail'] = "gagal menghapus data";
			$data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
    
    
    public function pilihanobat()
	{   
        cekajax(); 
        $get = $this->input->get();
        $list = $this->master_model->get_pilihanobat_datatable();
        $data = array(); 
        foreach ($list as $r) { 
            $row = array(); 
            $row[] = $this->security->xss_clean($r->kode_item); 
            $row[] = $this->security->xss_clean($r->nama_item); 
            $row[] = $this->security->xss_clean($r->kategori);   
            $row[] = ' 
            <a onclick="pilihobat(this)"  data-namaitem="'.$r->nama_item.'" data-id="'.$r->kode_item.'" class="mt-xs mr-xs btn btn-info datarowobat" role="button"><i class="fa fa-check-square-o"></i></a>
            '; 
            $data[] = $row;
        } 
        $result = array(
            "draw" => $get['draw'],
            "recordsTotal" => $this->master_model->count_all_datatable_pilihanobat(),
            "recordsFiltered" => $this->master_model->count_filtered_datatable_pilihanobat(),
            "data" => $data,
        ); 
        echo json_encode($result);  
    }  
    public function racikantambah(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulesitems());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{            
            $kode_obat = $this->input->post("kode_obat");   
            if(isset($kode_obat) === TRUE AND $kode_obat[0]!='')
            {  
                if($simpan->simpandataracikan()){
                    $data['success']= true;
                    $data['message']="Berhasil menyimpan data";   
                }else{
                    $errors['fail'] = "gagal melakukan update data";
                    $data['errors'] = $errors;
                } 
            }
            else{ 
                $errors['jumlah_obat'] = "Mohon pilih obat yang ingin diracik";
                $data['errors'] = $errors;
            }
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
    public function racikanhapus(){ 
        cekajax(); 
        $hapus = $this->master_model;
        if($hapus->hapusdataracikan()){ 
            $data['success']= true;
            $data['message']="Berhasil menghapus data"; 
        }else{    
            $errors['fail'] = "gagal menghapus data";
            $data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    } 
    public function racikanedit(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulesitemsedit());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{            
            $kode_obat = $this->input->post("kode_obat");   
            if(isset($kode_obat) === TRUE AND $kode_obat[0]!='')
            {  
                if($simpan->updatedataracikan()){
                    $data['success']= true;
                    $data['message']="Berhasil menyimpan data";   
                }else{
                    $errors['fail'] = "gagal melakukan update data";
                    $data['errors'] = $errors;
                } 
            }
            else{ 
                $errors['jumlah_obat'] = "Mohon pilih obat yang ingin diracik";
                $data['errors'] = $errors;
            }
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }

    // pegawai
    public function pegawai()
	{     
        level_user('master','pegawai',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/master/pegawai'); 
    }  
    
    public function datapegawai()
	{   
        cekajax(); 
        $get = $this->input->get();
        $list = $this->master_model->get_pegawai_datatable();
        $data = array(); 
        foreach ($list as $r) { 
            $row = array(); 
              $tomboldaftar='';
        if ($r->id_admin=='0') {
            $tomboldaftar = 
            ' 
            <div class="btn-group dropup">
            <a class="mb-xs mt-xs mr-xs btn btn-primary href="#" onclick="daftar_akun(this)" data-id_pegawai="'.$this->security->xss_clean($r->id).'" data-nama_pegawai="'.$this->security->xss_clean($r->nama_pegawai).'">Daftar</a>
            </div>
            ';
        }
            $tombolhapus = level_user('master','pegawai',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
            $tomboledit = level_user('master','pegawai',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
            $row[] = ' 
                    <div class="btn-group dropup">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->id).'">Detail</a></li>
                            '.$tomboledit.'
                            '.$tombolhapus.'
                        </ul>
                    </div>
                    ';
            $row[] = $this->security->xss_clean($r->nama_pegawai);
            $row[] = $this->security->xss_clean($r->kontak);
            $row[] = $this->security->xss_clean($r->nik);
            $row[] = $this->security->xss_clean($r->alamat);
            $row[] = $this->security->xss_clean($r->kontak);
        $row[] = $tomboldaftar;
            $data[] = $row;
        } 
        $result = array( 
            "draw" => $get['draw'],
            "recordsTotal" => $this->master_model->count_all_datatable_pegawai(),
            "recordsFiltered" => $this->master_model->count_filtered_datatable_pegawai(),
            "data" => $data,
        ); 
        echo json_encode($result); 
    }

    public function pegawaitambah(){ 
        // cekajax(); 
        $post = $this->input->post();
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulespegawai());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{    
            $insert_id = $simpan->simpandatapegawai();
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
        // $data['token'] = $this->security->get_csrf_hash();
        // echo json_encode($data); 
        redirect('master/pegawai','refresh');
    } 
    public function pegawaidetail(){  
        cekajax(); 
       $idd = intval($this->input->get("id")); 
       $query = $this->db->select("no_ijin, nama_pegawai, kontak, alamat, nik")->get_where('master_pegawai', array('id' => $idd),1);
       
        $result = array(  
            "nama_pegawai" => $this->security->xss_clean($query->row()->nama_pegawai),
            "alamat" => $this->security->xss_clean($query->row()->alamat),
            "kontak" => $this->security->xss_clean($query->row()->kontak),
			"nik" => $this->security->xss_clean($query->row()->nik),
			"kotak" => $this->security->xss_clean($query->row()->kontak),
        );    
    	echo'['.json_encode($result).']';
    }
    public function pegawaiedit(){ 
        cekajax(); 
        $simpan = $this->master_model;
		$validation = $this->form_validation; 
        $validation->set_rules($simpan->rulespegawai());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{    
            $simpan->updatedatapegawai();
            $data['success']= true;
            $data['message']="Berhasil menyimpan data";
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
    public function pegawaihapus(){ 
        cekajax(); 
        $hapus = $this->master_model;
        if($hapus->hapusdatapegawai()){ 
            $data['success']= true;
            $data['message']="Berhasil menghapus data"; 
        }else{    
            $errors="fail";
			$data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
// Operasional
public function operasional()
{
    level_user('master','operasional',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $this->load->view('member/master/operasional');
}

public function dataoperasional()
{
    cekajax();
    $get = $this->input->get();
    $list = $this->master_model->get_operasional_datatable();
    $data = array();
    foreach ($list as $r) {
        $row = array();
        $tombolhapus = level_user('master','operasional',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','operasional',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = '
                <div class="btn-group dropup">
                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->id).'">Detail</a></li>
                        '.$tomboledit.'
                        '.$tombolhapus.'
                    </ul>
                </div>
                ';
        $row[] = $this->security->xss_clean(tgl_indo($r->tgl_operasional));
        $row[] = $this->security->xss_clean($r->keterangan);
        $row[] = $this->security->xss_clean(rupiah($r->jumlah));
        $data[] = $row;
    }
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_operasional(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_operasional(),
        "data" => $data,
    );
    echo json_encode($result);
}

public function operasionaltambah(){
    cekajax();
    $post = $this->input->post();
    $simpan = $this->master_model;
        $validation = $this->form_validation;
    $validation->set_rules($simpan->rulesoperasional());
    if ($this->form_validation->run() == FALSE){
        $errors = $this->form_validation->error_array();
        $data['errors'] = $errors;
    }else{
        $insert_id = $simpan->simpandataoperasional();
        if($insert_id > 0) {
            $data['success']= true;
            $data['operasional']= $post["keterangan"];
            $data['id_operasional']= $insert_id;
            $data['message']="Berhasil menyimpan data";
        }else{
            $errors['fail'] = "gagal melakukan update data";
            $data['errors'] = $errors;
        }
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data);
}
public function operasionaldetail(){
    cekajax();
   $idd = intval($this->input->get("id"));
   $query = $this->db->select("tgl_operasional, keterangan, jumlah, editor")->get_where('master_operasional', array('id' => $idd),1);

    $result = array(
        "idd" => $this->security->xss_clean($idd),
        "tgl_operasional" => $this->security->xss_clean($query->row()->tgl_operasional),
        "tgl_operasional_indo" => $this->security->xss_clean(tgl_indo($query->row()->tgl_operasional)),
        "keterangan" => $this->security->xss_clean($query->row()->keterangan),
        "jumlah" => $this->security->xss_clean($query->row()->jumlah),
              "jumlahrp" => $this->security->xss_clean(rupiah($query->row()->jumlah)),
              "editor" => $this->security->xss_clean($query->row()->editor),
    );
    echo'['.json_encode($result).']';
}
public function operasionaledit(){
    cekajax();
    $simpan = $this->master_model;
        $validation = $this->form_validation;
    $validation->set_rules($simpan->rulesoperasional());
        if ($this->form_validation->run() == FALSE){
              $errors = $this->form_validation->error_array();
              $data['errors'] = $errors;
    }else{
        $simpan->updatedataoperasional();
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data);
}
public function operasionalhapus(){
    cekajax();
    $hapus = $this->master_model;
    if($hapus->hapusdataoperasional()){
        $data['success']= true;
        $data['message']="Berhasil menghapus data";
    }else{
        $errors="fail";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data);
}
}
