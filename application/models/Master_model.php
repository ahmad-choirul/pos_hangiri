<?php
class Master_model extends CI_Model{   
      
    // datatable dokter start
    var $column_search_dokter = array('kode_dokter','nama_dokter','jenis_kelamin','handphone','telepon'); 
    var $column_order_dokter = array(null,'kode_dokter', 'nama_dokter','jenis_kelamin','handphone','telepon');
    var $order_dokter = array('waktu_update' => 'DESC');
    private function _get_query_dokter()
    { 
        $get = $this->input->get();
        $this->db->from('master_dokter'); 
        $i = 0; 
        foreach ($this->column_search_dokter as $item)
        {
            if($get['search']['value'])
            {  
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($this->column_search_dokter) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($this->column_order_dokter[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if(isset($this->order_dokter))
        {
            $order = $this->order_dokter;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_dokter_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_dokter();
        if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_datatable_dokter()
    {
        $this->_get_query_dokter();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_datatable_dokter()
    {
        $this->db->from('master_dokter');
        return $this->db->count_all_results();
    } 
    //datatable dokter end
	
	// CRUD dokter start
    public function rulesdokter()
    {
        return [
            [
            'field' => 'nama_dokter',
            'label' => 'Nama Dokter',
            'rules' => 'required',
            ] ,
            [
            'field' => 'kode_dokter',
            'label' => 'Kode Dokter',
            'rules' => 'is_unique[master_dokter.kode_dokter]|required',
            ] 
        ];
    } 
    public function rulesdokteredit()
    {
        return [
            [
            'field' => 'nama_dokter',
            'label' => 'Nama Dokter',
            'rules' => 'required',
            ] ,
            [
            'field' => 'kode_dokter',
            'label' => 'Kode Dokter',
            'rules' => 'required',
            ] 
        ];
    } 
    function simpandatadokter(){   
        $post = $this->input->post();   
        $array = array(
            'nama_dokter'=>$post["nama_dokter"], 
            'jenis_kelamin'=>$post["jenis_kelamin"], 
            'alamat'=>$post["alamat"],  
            'telepon'=>$post["telepon"], 
            'handphone'=>$post["handphone"], 
            'kode_dokter'=>$post["kode_dokter"], 
        );
        return $this->db->insert("master_dokter", $array);
    }   
    public function updatedatadokter()
    {
        $post = $this->input->post();
        $this->nama_dokter = $post["nama_dokter"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat = $post["alamat"];
        $this->telepon = $post["telepon"]; 
        $this->kode_dokter = $post["kode_dokter"]; 
        $this->handphone = $post["handphone"];   
        return $this->db->where('kode_dokter',$post['idd'])->update("master_dokter", $this);
    }
    public function hapusdatadokter()
    {
        $post = $this->input->post(); 
        $this->db->where('kode_dokter', $post['idd']);
        return $this->db->delete('master_dokter');  
    } 
	// CRUD dokter end
    
    

    // datatable supplier start
    var $column_search_supplier = array('nama_supplier','kontak_person','telepon','alamat'); 
    var $column_order_supplier = array(null, 'nama_supplier','kontak_person','telepon','alamat');
    var $order_supplier = array('waktu_update' => 'DESC');
    private function _get_query_supplier()
    { 
        $get = $this->input->get();
        $this->db->from('master_supplier'); 
        $i = 0; 
        foreach ($this->column_search_supplier as $item)
        {
            if($get['search']['value'])
            { 
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($this->column_search_supplier) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($this->column_order_supplier[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if(isset($this->order_supplier))
        {
            $order = $this->order_supplier;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_supplier_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_supplier();
        if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_datatable_supplier()
    {
        $this->_get_query_supplier();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_datatable_supplier()
    {
        $this->db->from('master_supplier');
        return $this->db->count_all_results();
    } 
    //datatable supplier end

		// CRUD supplier start
    public function rulessupplier()
    {
        return [
            [
            'field' => 'nama_supplier',
            'label' => 'Nama supplier',
            'rules' => 'required',
            ] 
        ];
    } 
    function simpandatasupplier(){   
        $post = $this->input->post();   
        $array = array(
            'nama_supplier' =>$post["nama_supplier"],
            'alamat'        =>$post["alamat"], 
            'telepon'       =>$post["telepon"], 
            'keterangan'      =>$post["keterangan"], 
        );
        return $this->db->insert("master_supplier", $array);   
    } 
    public function updatedatasupplier()
    {
        $post = $this->input->post();
        $this->nama_supplier    = $post["nama_supplier"];
        $this->alamat           = $post["alamat"];
        $this->telepon          = $post["telepon"];
        $this->keterangan         = $post["keterangan"];
        return $this->db->update("master_supplier", $this, array('id' => $post['idd']));
    }
    public function hapusdatasupplier()
    {
        $post = $this->input->post();
        $this->db->where('id', $post['idd']);
        return $this->db->delete('master_supplier');
    }
        // CRUD supplier end
         
    // datatable pembeli start
    var $column_search_pembeli = array('nama_pembeli','hp','alamat'); 
    var $column_order_pembeli = array(null, 'nama_pembeli','hp','alamat');
    var $order_pembeli = array('waktu_update' => 'DESC');
    private function _get_query_pembeli()
    { 
        $get = $this->input->get();
        $this->db->from('master_pembeli'); 
        $i = 0; 
        foreach ($this->column_search_pembeli as $item)
        {
            if($get['search']['value'])
            { 
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($this->column_search_pembeli) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($this->column_order_pembeli[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if(isset($this->order_pembeli))
        {
            $order = $this->order_pembeli;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_pembeli_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_pembeli();
        if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_datatable_pembeli()
    {
        $this->_get_query_pembeli();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_datatable_pembeli()
    {
        $this->db->from('master_pembeli');
        return $this->db->count_all_results();
    } 
    //datatable pembeli end

    //CRUD pembeli start 
    public function rulespembeli()
    {
        return [
            [
            'field' => 'nama_pembeli',
            'label' => 'Nama pembeli',
            'rules' => 'required',
            ] 
        ];
    } 
    function simpandatapembeli(){   
        $post = $this->input->post();   
       
        $array = array(
            'nama_pembeli'=>$post["nama_pembeli"],
            'alamat'=>$post["alamat"],  
            'hp'=>$post["hp"], 
			
        );
        $this->db->insert("master_pembeli", $array);  
        return $this->db->insert_id();
    } 
    public function updatedatapembeli()
    {
        $post = $this->input->post();
        $this->nama_pembeli = $post["nama_pembeli"];
        $this->alamat = $post["alamat"];
        $this->hp = $post["hp"];
		
        return $this->db->update("master_pembeli", $this, array('id' => $post['idd']));
    } 
    public function hapusdatapembeli()
    {
        $post = $this->input->post(); 
        $this->db->where('id', $post['idd']);
        return $this->db->delete('master_pembeli');  
    }
    //CRUD pembeli end 
    

    // datatable kategori start
    var $column_search_kategori = array('nama_kategori'); 
    var $column_order_kategori = array(null, 'nama_kategori');
    var $order_kategori = array('waktu_update' => 'DESC');
    private function _get_query_kategori()
    { 
        $get = $this->input->get();
        $this->db->from('master_kategori'); 
        $i = 0; 
        foreach ($this->column_search_kategori as $item)
        {
            if($get['search']['value'])
            { 
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($this->column_search_kategori) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($this->column_order_kategori[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if(isset($this->order_kategori))
        {
            $order = $this->order_kategori;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_kategori_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_kategori();
        if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_datatable_kategori()
    {
        $this->_get_query_kategori();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_datatable_kategori()
    {
        $this->db->from('master_kategori');
        return $this->db->count_all_results();
    } 
    //datatable kategori end

    //CRUD kategori start
    public function ruleskategori()
    {
        return [
            [
            'field' => 'nama_kategori',
            'label' => 'Nama kategori',
            'rules' => 'required',
            ] 
        ];
    } 
    function simpandatakategori(){   
        $post = $this->input->post();   
        $array = array(
            'nama_kategori'=>$post["nama_kategori"], 
        );
        return $this->db->insert("master_kategori", $array);   
    } 
    public function updatedatakategori()
    {
        $post = $this->input->post();
        $this->nama_kategori = $post["nama_kategori"]; 
        return $this->db->update("master_kategori", $this, array('id' => $post['idd']));
    } 
    public function hapusdatakategori()
    {
        $post = $this->input->post(); 
        $this->db->where('id', $post['idd']);
        return $this->db->delete('master_kategori');  
    }
    //CRUD kategori end
 
   
	
	// datatable item start
    var $column_search_item = array('kode_item','nama_item','harga_beli','nama_kategori','harga_jual','lokasi'); 
    var $column_order_item = array(null, 'kode_item','nama_item','harga_beli','nama_kategori','harga_jual','lokasi');
    var $order_item = array('waktu_update' => 'DESC');
    private function _get_query_item()
    { 
        $get = $this->input->get();
        $this->db->select('a.*,b.nama_kategori');
        $this->db->from('master_item a'); 
        $this->db->join('master_kategori b', 'a.kategori = b.id');
        $this->db->where('a.jenis_item', $get['jenis']);
        $i = 0; 
        foreach ($this->column_search_item as $item)
        {
            if($get['search']['value'])
            { 
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($this->column_search_item) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($this->column_order_item[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if(isset($this->order_item))
        {
            $order = $this->order_item;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_item_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_item();
        if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_datatable_item()
    {
        $this->_get_query_item();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_datatable_item()
    {
        $this->db->from('master_item');
        return $this->db->count_all_results();
    } 
    //datatable item end
	
	//CRUD item start
    public function rulesitems()
    {
        return [
            [
            'field' => 'kode_item',
            'label' => 'Kode Item',
            'rules' => 'is_unique[master_item.kode_item]|required',
            ] ,
            [
            'field' => 'nama_item',
            'label' => 'Nama Item',
            'rules' => 'required',
            ], 
        ];
    } 
    public function rulesitemsedit()
    {
        return [
            [
            'field' => 'kode_item',
            'label' => 'Kode Item',
            'rules' => 'required',
            ],
            [
            'field' => 'nama_item',
            'label' => 'Nama Item',
            'rules' => 'required',
            ], 
        ];
    } 
    function simpandataitems(){   
        $post = $this->input->post();   
        $array = array(
            'kode_item'=>$post["kode_item"], 
            'kategori'=>$post["kategori"],  
            'nama_item'=>$post["nama_item"], 
            'keterangan'=>$post["keterangan"], 
            'harga_jual'=>bilanganbulat($post["harga_jual"]),
            'harga_beli'=>bilanganbulat($post["harga_beli"]),
            'netto'=>$post["netto"],  
            'stok'=>$post["stok"],  
            'tgl_expired'=>$post["tanggal_expired"],
            'jenis_item'=>$post["jenis_item"],
            'gambar'=>$this->_uploadGambarProduk(),  
        );
        return $this->db->insert("master_item", $array);  
    }    
     
    public function updatedataitems()
    {
        $post = $this->input->post();
        $this->kode_item = $post["kode_item"];
        $this->kategori = $post["kategori"];
        $this->nama_item = $post["nama_item"]; 
        $this->keterangan = $post["keterangan"];  
        $this->netto = $post["netto"];  
        $this->stok = $post["stok"];  
        $this->tgl_expired = $post["tanggal_expired"];
        $this->harga_jual = bilanganbulat($post["harga_jual"]); 
        $this->harga_beli = bilanganbulat($post["harga_beli"]); 
        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadGambarProduk();
        }   
        return $this->db->update("master_item", $this, array('kode_item' => $post['idd']));
    }
    private function _uploadGambarProduk()
    {
        $post = $this->input->post();
        $config['upload_path']          = './images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $post["kode_item"];
        $config['overwrite']			= true;
        $config['max_size']             = 1024;  
        $this->load->library('upload', $config); 
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        } 
        return "default.jpg";
    } 
    private function _hapusGambarProduk($id)
    {
        $product = $this->_namagambar($id);
        if ($product->gambar != "default.jpg") {
            $filename = explode(".", $product->gambar)[0];
            return array_map('unlink', glob(FCPATH."images/$filename.*"));
        }
    }
    private function _namagambar($id)
    {
        return $this->db->get_where('master_item', ["kode_item" => $id])->row();
    }
    public function hapusdataitem()
    {
        $post = $this->input->post(); 
        $this->_hapusGambarProduk($post['idd']);
        $this->db->where('kode_item', $post['idd']);
        return $this->db->delete('master_item');  
    } 
    //CRUD item end
     // datatable pilihan obat start
     var $column_search_pilihanobat = array('kode_item','nama_item','kategori'); 
     var $column_order_pilihanobat = array(null, 'kode_item','nama_item','kategori');
     var $order_pilihanobat = array('waktu_update' => 'DESC');
     private function _get_query_pilihanobat()
     { 
         $get = $this->input->get();
         $this->db->where('jenis = "obat"')->from('master_item');
         $i = 0; 
         foreach ($this->column_search_pilihanobat as $item)
         {
             if($get['search']['value'])
             { 
                 if($i===0) 
                 {
                     $this->db->group_start(); 
                     $this->db->like($item, $get['search']['value']);
                 }
                 else
                 {
                     $this->db->or_like($item, $get['search']['value']);
                 }
  
                 if(count($this->column_search_pilihanobat) - 1 == $i) 
                     $this->db->group_end(); 
             }
             $i++;
         } 
         if(isset($get['order'])) 
         {
             $this->db->order_by($this->column_order_pilihanobat[$get['order']['0']['column']], $get['order']['0']['dir']);
         } 
         else if(isset($this->order_pilihanobat))
         {
             $order = $this->order_pilihanobat;
             $this->db->order_by(key($order), $order[key($order)]);
         }
     }
  
     function get_pilihanobat_datatable()
     {
         $get = $this->input->get();
         $this->_get_query_pilihanobat();
         if($get['length'] != -1)
         $this->db->limit($get['length'], $get['start']);
         $query = $this->db->get();
         return $query->result();
     }
  
     function count_filtered_datatable_pilihanobat()
     {
         $this->_get_query_pilihanobat();
         $query = $this->db->get();
         return $query->num_rows();
     }
  
     public function count_all_datatable_pilihanobat()
     {
         $this->db->where('jenis = "obat"')->from('master_item');
         return $this->db->count_all_results();
     } 
     //datatable pilihan obat end

    // datatable spg start
    var $column_search_spg = array('nama_spg','no_ijin','kontak','alamat'); 
    var $column_order_spg = array(null, 'nama_spg','no_ijin','kontak','alamat');
    var $order_spg = array('waktu_update' => 'DESC');
    private function _get_query_spg()
    { 
        $get = $this->input->get();
        $this->db->from('master_spg'); 
        $i = 0; 
        foreach ($this->column_search_spg as $item)
        {
            if($get['search']['value'])
            { 
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($this->column_search_spg) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($this->column_order_spg[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if(isset($this->order_spg))
        {
            $order = $this->order_spg;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_spg_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_spg();
        // $this->db->where('jenis_pembeli','2');
        if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_datatable_spg()
    {
        $this->_get_query_spg();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_datatable_spg()
    {
        $this->db->from('master_spg');
        return $this->db->count_all_results();
    } 
    //datatable spg end

    //CRUD spg start 
    public function rulesspg()
    {
        return [
            [
            'field' => 'nama_spg',
            'label' => 'Nama SPG',
            'rules' => 'required',
            ] 
        ];
    } 
    function simpandataspg(){   
        $post = $this->input->post();   
        $array = array(
            'kontak'=>$post["kontak"],
            'alamat'=>$post["alamat"],  
            'nama_spg'=>$post["nama_spg"], 
			'kontak'=>$post["kontak"], 
			'nik'=>$post["nik"], 
        );
        $this->db->insert("master_spg", $array);  
        return $this->db->insert_id();
    } 
    public function updatedataspg()
    {
        $post = $this->input->post();
        $this->nama_spg = $post["nama_spg"];
        $this->alamat = $post["alamat"];
		$this->kontak = $post["kontak"];
		$this->nik = $post["nik"];
        return $this->db->update("master_spg", $this, array('id' => $post['idd']));
    } 
    public function hapusdataspg()
    {
        $post = $this->input->post(); 
        $this->db->where('id', $post['idd']);
        return $this->db->delete('master_spg');  
    }
    //CRUD spg end 
    
// datatable operasional start
var $column_search_operasional = array('tgl_operasional','keterangan','jumlah','editor');
var $column_order_operasional = array(null, 'tgl_operasional','keterangan','jumlah','editor');
var $order_operasional = array('waktu_update' => 'DESC');
private function _get_query_operasional()
{
    $get = $this->input->get();
    $this->db->from('master_operasional');
    $i = 0;
    foreach ($this->column_search_operasional as $item)
    {
        if($get['search']['value'])
        {
            if($i===0)
            {
                $this->db->group_start();
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_operasional) - 1 == $i)
                $this->db->group_end();
        }
        $i++;
    }
    if(isset($get['order']))
    {
        $this->db->order_by($this->column_order_operasional[$get['order']['0']['column']], $get['order']['0']['dir']);
    }
    else if(isset($this->order_operasional))
    {
        $order = $this->order_operasional;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_operasional_datatable()
{
    $get = $this->input->get();
    $this->_get_query_operasional();
    // $this->db->where('jenis_pembeli','2');
    if($get['length'] != -1)
    $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_operasional()
{
    $this->_get_query_operasional();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_operasional()
{
    $this->db->from('master_operasional');
    return $this->db->count_all_results();
}
//datatable operasional end

//CRUD operasional start
public function rulesoperasional()
{
    return [
        [
        'field' => 'tgl_operasional',
        'label' => 'Tanggal Operasional',
        'rules' => 'required',
        ]
    ];
}
function simpandataoperasional(){
    $post = $this->input->post();
    $array = array(
        'tgl_operasional'=>$post["tgl_operasional"],
        'keterangan'=>$post["keterangan"],
        'jumlah'=>bilanganbulat($post["jumlah"]),
              'editor'=>$this->session->userdata('nama_admin'),
    );
    $this->db->insert("master_operasional", $array);
    return $this->db->insert_id();
}
public function updatedataoperasional()
{
    $post = $this->input->post();
    $this->tgl_operasional = $post["tgl_operasional"];
    $this->keterangan = $post["keterangan"];
    $this->jumlah = bilanganbulat($post["jumlah"]);
        $this->editor = $this->session->userdata('nama_admin');
    return $this->db->update("master_operasional", $this, array('id' => $post['idd']));
}
public function hapusdataoperasional()
{
    $post = $this->input->post();
    $this->db->where('id', $post['idd']);
    return $this->db->delete('master_operasional');
}
//CRUD operasional end

}
