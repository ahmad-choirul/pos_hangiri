<?php

require './mike42/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class Penjualan_model extends CI_Model
{

    public function get_pegawai()
    {
        $this->db->select('*');
        $this->db->from('master_pegawai');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_penjualan($idd){ 
        $this->db->select("a.*,b.nama_pembeli,d.nama_admin");
        $this->db->from("penjualan a");
        $this->db->join('master_pembeli b', 'b.id = a.id_pembeli', 'left');
        $this->db->join('master_admin d', 'd.id = a.id_admin', 'left');
        $this->db->where('a.id', $idd,'1'); 
        return $this->db->get()->result_array();
    } 
    public function data_diskon()
    {
        $this->db->select("a.id, a.kode_item, a.min_kuantiti,
         a.diskon, a.tanggal_berakhir, b.nama_item");
        $this->db->from("master_diskon_kelipatan a");
        $this->db->join('master_item b', 'b.kode_item = a.kode_item');
        return $this->db->get()->result_array();
    }

    public function rulesdiskon()
    {
        return [
            [
                'field' => 'kode_item',
                'label' => 'Kode Produk',
                'rules' => 'required',
            ],
            [
                'field' => 'min_kuantiti',
                'label' => 'Minimum kuantiti',
                'rules' => 'required',
            ],
            [
                'field' => 'min_kuantiti2',
                'label' => 'Minimum kuantiti ke-2',
                'rules' => 'greater_than[' . $this->input->post("min_kuantiti") . ']',
            ],
            [
                'field' => 'min_kuantiti3',
                'label' => 'Minimum kuantiti ke-3',
                'rules' => 'greater_than[' . $this->input->post("min_kuantiti2") . ']',
            ],
            [
                'field' => 'diskon',
                'label' => 'Diskon',
                'rules' => 'required',
            ]
        ];
    }

    function simpandatadiskon()
    {
        $post = $this->input->post();
        $kd = $post["kode_item"];
        $end = $post["tanggal_berakhir"];


        if (!empty($post['diskon'])) {
            $array = array(
                'kode_item' => $kd,
                'min_kuantiti' => $post["min_kuantiti"],
                'diskon' => bilanganbulat($post["diskon"]),
                'tanggal_berakhir' => $end
            );
            $this->db->insert("master_diskon_kelipatan", $array);
        }

        if (!empty($post['diskon2'])) {
            $array = array(
                'kode_item' => $kd,
                'min_kuantiti' => $post["min_kuantiti2"],
                'diskon' => bilanganbulat($post["diskon2"]),
                'tanggal_berakhir' => $end
            );
            $this->db->insert("master_diskon_kelipatan", $array);
        }
        if (!empty($post['diskon3'])) {
            $array = array(
                'kode_item' => $kd,
                'min_kuantiti' => $post["min_kuantiti3"],
                'diskon' => bilanganbulat($post["diskon3"]),
                'tanggal_berakhir' => $end
            );
            $this->db->insert("master_diskon_kelipatan", $array);
        }

        return TRUE;
    }

    public function hapusdatadiskon()
    {
        $post = $this->input->post();
        return $this->db->where('id', $post['idd'])->delete('master_diskon_kelipatan');
    }

    function getRows($params = array(),$kategori=null)
    {
        $this->db->select('*');
        $this->db->from('master_item');
        // if (isset($kategori)) {
        $this->db->where('jenis_item', 'jual');
        // }
        //filter data by searched keywords
        if (!empty($params['search']['keywords'])) {
            $this->db->like('nama_item', $params['search']['keywords']);
            $this->db->or_like('kode_item', $params['search']['keywords']);
        }
        //sort data by ascending or desceding order
        if (!empty($params['search']['sortBy'])) {
            // $this->db->order_by('nama_item', $params['search']['sortBy']);
            $this->db->where('resto', $params['search']['sortBy']);
        }
        if (!empty($params['search']['sortkategori'])) {
            $this->db->where('kategori', $params['search']['sortkategori']);
        }
        //set start and limit
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        return $query->result_array();
    }
    function getRows1($kategori, $params = null)
    {

        $keywords = isset($params['search']['keywords']) ? $params['search']['keywords'] : '';
        $sortBy = isset($params['search']['sortBy']) ? $params['search']['sortBy'] : '';

        $like = empty($keywords) ? "" : "AND nama_item LIKE '%$keywords%'";

        $order_by = empty($sortBy) ? "ORDER BY tgl_expired ASC" : "ORDER BY nama_item $sortBy";

        $start = isset($params['start']) ? $params['start'] : 0;
        $limit = isset($params['limit']) ? $params['limit'] : 12;

        $query = $this->db->query("SELECT 
                                        *
            FROM
            master_item
            WHERE
            kategori = '$kategori'
            $like
            $order_by
            LIMIT $start,$limit
            ");
        $result = null;
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }

        // $this->db->select('*')->from('master_item')->where('kategori', $kategori);
        // // $this->db->select('*');
        // // $this->db->from('master_item');
        // // $this->db->where('kategori',  $kategori);
        // //filter data by searched keywords
        // if(!empty($params['search']['keywords'])){
        //     $this->db->like('nama_item',$params['search']['keywords']);
        // }
        // //sort data by ascending or desceding order
        // if(!empty($params['search']['sortBy'])){
        //     $this->db->order_by('nama_item',$params['search']['sortBy']);
        // }else{
        //     $this->db->order_by('tgl_expired','asc');
        // }
        // //set start and limit
        // if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
        //     $this->db->limit($params['limit'],$params['start']);
        // }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
        //     $this->db->limit($params['limit']);
        // }
        // //get records
        // $query = $this->db->get();
        //return fetched data
        return $result;
    }
    function getRows2($where1, $params = array())
    {
        $this->db->select('*');
        $this->db->from('master_item');
        //filter data by searched keywords
        if (!empty($params['search']['keywords'])) {
            $this->db->like('nama_item', $params['search']['keywords']);
        }
        //sort data by ascending or desceding order
        if (!empty($params['search']['sortBy'])) {
            $this->db->order_by('nama_item', $params['search']['sortBy']);
        } else {
            $this->db->order_by('tgl_expired', 'asc');
        }
        //set start and limit
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        return $query->result_array($where1);
    }


    // datatable kode_promosi start
    var $column_search_kode_promosi = array('kode_promosi','nama', 'instagram', 'tanggal_lahir','hp','nama_promosi');
    var $column_order_kode_promosi = array(null,'kode_promosi','nama', 'instagram', 'tanggal_lahir','hp','nama_promosi');
    var $order_kode_promosi = array('id_kode_promosi' => 'DESC');
    private function _get_query_kode_promosi()
    {
        $get = $this->input->get();
        $this->db->select('master_kode_promosi.*,master_promosi.nama_promosi');
        $this->db->from('master_kode_promosi');
        $this->db->join('master_promosi', 'master_promosi.id_promosi = master_kode_promosi.id_promosi');
        $i = 0;
        foreach ($this->column_search_kode_promosi as $item) {
            if ($get['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $get['search']['value']);
                } else {
                    $this->db->or_like($item, $get['search']['value']);
                }

                if (count($this->column_search_kode_promosi) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($get['order'])) {
            $this->db->order_by($this->column_order_kode_promosi[$get['order']['0']['column']], $get['order']['0']['dir']);
        } else if (isset($this->order_kode_promosi)) {
            $order = $this->order_kode_promosi;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_kode_promosi_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_kode_promosi();
        if ($get['length'] != -1)
            $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_datatable_kode_promosi()
    {
        $this->_get_query_kode_promosi();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_datatable_kode_promosi()
    {
        $this->db->from('master_kode_promosi');
        return $this->db->count_all_results();
    }
    //datatable kode_promosi end

    // CRUD data promosi start
    public function rulespromosi()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required',
            ],
            [
                'field' => 'instagram',
                'label' => 'instagram',
                'rules' => 'required',
            ],
            [
                'field' => 'hp',
                'label' => 'hp',
                'rules' => 'required',
            ]
        ];
    }

    function simpandatapromosi()
    {
        $post = $this->input->post();
        do {
            $kode_promosi = date("md").''.$this->create_random(4);
            $this->db->where('kode_promosi', $kode_promosi);
            $hasil = $this->db->get('master_kode_promosi')->num_rows();
        } while ($hasil>0);
        $array = array(
            'kode_promosi' => $kode_promosi,
            'nama' => $post["nama"],
            'instagram' => $post["instagram"],
            'tanggal_lahir' => $post["tanggal_lahir"],
            'hp' => $post["hp"],
            'id_promosi' => $post["id_promosi"],
        );
        return $this->db->insert("master_kode_promosi", $array);
    }

    function simpandatapromosiweb()
    {
        $post = $this->input->post();
        do {
            $kode_promosi = date("md").''.$this->create_random(4);
            $this->db->where('kode_promosi', $kode_promosi);
            $hasil = $this->db->get('master_kode_promosi')->num_rows();
        } while ($hasil>0);
        $array = array(
            'kode_promosi' => $kode_promosi,
            'nama' => $post["nama"],
            'instagram' => $post["instagram"],
            'tanggal_lahir' => $post["tanggal_lahir"],
            'hp' => $post["hp"],
        );
        if ($this->db->insert("master_kode_promosi", $array)) {
            return $kode_promosi;
        }else{
            return null;
        }
    }

    function create_random($length)
    {
        $data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
        $string = '';
        for($i = 0; $i < $length; $i++) {
            $pos = rand(0, strlen($data)-1);
            $string .= $data[$pos];
        }
        return $string;
    }
    public function updatedatapromosi()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->instagram = $post["instagram"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->hp = $post["hp"];
        $this->id_promosi = $post["id_promosi"];
        return $this->db->update("master_kode_promosi", $this, array('id_kode_promosi' => $post['idd']));
    }

    public function hapuskode_promosi()
    {
        $post = $this->input->post();
        $this->db->where('id_kode_promosi', $post['idd']);
        return $this->db->update('master_kode_promosi',array('status' => '0' ));
    }
    // CRUD supplier end


    // datatable master_promosi start
    var $column_search_master_promosi = array('id_promosi','nama_promosi', 'tgl_awal', 'tgl_akhir','status');
    var $column_order_master_promosi = array(null,'id_promosi','nama_promosi', 'tgl_awal', 'tgl_akhir','status');
    var $order_master_promosi = array('id_promosi' => 'DESC');
    private function _get_query_master_promosi()
    {
        $get = $this->input->get();
        $this->db->from('master_promosi');
        $i = 0;
        foreach ($this->column_search_master_promosi as $item) {
            if ($get['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $get['search']['value']);
                } else {
                    $this->db->or_like($item, $get['search']['value']);
                }

                if (count($this->column_search_master_promosi) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($get['order'])) {
            $this->db->order_by($this->column_order_master_promosi[$get['order']['0']['column']], $get['order']['0']['dir']);
        } else if (isset($this->order_master_promosi)) {
            $order = $this->order_master_promosi;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_master_promosi_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_master_promosi();
        if ($get['length'] != -1)
            $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_datatable_master_promosi()
    {
        $this->_get_query_master_promosi();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_datatable_master_promosi()
    {
        $this->db->from('master_promosi');
        return $this->db->count_all_results();
    }
    //datatable master_promosi end

    // CRUD data kode_promosi start
    public function rulesmaster_promosi()
    {
        return [
            [
                'field' => 'nama_promosi',
                'label' => 'nama Promosi',
                'rules' => 'required',
            ],
            [
                'field' => 'tgl_awal',
                'label' => 'tanggal awal',
                'rules' => 'required',
            ],
            [
                'field' => 'tgl_akhir',
                'label' => 'tanggal akhir',
                'rules' => 'required',
            ]
        ];
    }
function get_master_promosi()
{
    // $this->db->select('*');$
    // $this->db->where('Field / comparison', $Value);
    $query = $this->db->query('SELECT * FROM `master_promosi` WHERE status = 1 ');
    return $query->result();
}
    function simpandatamaster_promosi()
    {
        $post = $this->input->post();
        $array = array(
            'nama_promosi' => $post["nama_promosi"],
            'tgl_awal' => $post["tgl_awal"],
            'tgl_akhir' => $post["tgl_akhir"],
        );
        return $this->db->insert("master_promosi", $array);
    }

    public function updatedatamaster_promosi()
    {
        $post = $this->input->post();
        $this->nama_promosi = $post["nama_promosi"];
        $this->tgl_awal = $post["tgl_awal"];
        $this->tgl_akhir = $post["tgl_akhir"];
        return $this->db->update("master_promosi", $this, array('id_promosi' => $post['idd']));
    }

    public function hapusmaster_promosi()
    {
        $post = $this->input->post();
        $this->db->where('id_promosi', $post['idd']);
        return $this->db->update('master_promosi',array('status' => '0' ));
    }
    // CRUD supplier end

    public function stokracikan($kode)
    {
        $this->db->select("a.kode_racikan, b.stok");
        $this->db->from("master_racikan a");
        $this->db->join('master_item b', 'a.kode_racikan = "' . $kode . '" AND b.kode_item = a.kode_obat AND b.stok < 1');
        if ($this->db->get()->num_rows() > 0) {
            return '0';
        } else {
            return '1';
        }
    }
    private function diskon_produk($kodeproduk, $kuantiti)
    {
        $datadiskon = $this->db->select('*')->from('master_diskon_kelipatan')->where('kode_item', $kodeproduk)->where('tanggal_berakhir >=', date('Y-m-d'))->get();
        if ($datadiskon->num_rows() < 1) {
            return '0';
        } else {
            if ($kuantiti >= $datadiskon->row()->min_kuantiti) {
                return $datadiskon->row()->diskon;
            } else {
                return '0';
            }
        }
    }
    private function updatekeranjang($idkeranjang)
    {
        $total_harga_item = $this->db->select('SUM((harga*kuantiti) -(diskon*kuantiti)) as total')->from('keranjang_detail')->where('id_keranjang ="' . $idkeranjang . '"')->get()->row();
        $total_semua = $this->db->select('SUM(total) as total')->from('keranjang_detail')->where('id_keranjang ="' . $idkeranjang . '"')->get()->row();
        $total = $total_semua->total;
        $array = array(
            'total_harga_item' => $total_harga_item->total,
            'total' => $total,
        );
        $this->db->update("keranjang", $array, array('id' => $idkeranjang));
    }
    private function simpan_keranjang($idkeranjang, $kodeproduk, $kuantiti, $racikan,$jenis_penjualan='')
    {
        $produk = $this->db->get_where('master_item', array('kode_item' => $kodeproduk), 1);
        $query = $this->db->get_where('keranjang_detail', array('id_keranjang' => $idkeranjang, 'kode_item' => $kodeproduk), 1);
        if ($query->num_rows() < 1) {
            $diskon =  $this->diskon_produk($kodeproduk, 1);
            if ($jenis_penjualan=='grab') {
             $harga = $produk->row()->harga_jual2;
         } elseif ($jenis_penjualan=='gojek') {
             $harga = $produk->row()->harga_jual2;
         }else{
             $harga = $produk->row()->harga_jual;
         }
         $harga_beli = $produk->row()->harga_beli;
         $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
         $array = array(
            'id_keranjang' => $idkeranjang,
            'kode_item' => $kodeproduk,
            'harga' => $harga,
            'harga_beli' => $harga_beli,
            'diskon' => $diskon,
            'kuantiti' => $kuantiti,
            'total' => $total,
        );
         $this->db->insert("keranjang_detail", $array);  
         $this->session->set_flashdata('query', $this->db->last_query());     
         // $this->updatekeranjang($idkeranjang);
         return TRUE;
     } else {
        $kuantiti = $query->row()->kuantiti + $kuantiti;
        $diskon =  $this->diskon_produk($kodeproduk, $kuantiti);
        if ($jenis_penjualan=='grab') {
         $harga = $produk->row()->harga_jual2;
     } elseif ($jenis_penjualan=='gojek') {
         $harga = $produk->row()->harga_jual2;
     }else{
         $harga = $produk->row()->harga_jual;
     }
     $harga_beli = $produk->row()->harga_beli;
     $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
     $this->harga = $harga;
     $this->harga_beli = $harga_beli;
     $this->diskon = $diskon;
     $this->kuantiti = $kuantiti;
     $this->total = $total;
     $this->db->update("keranjang_detail", $this, array('id_keranjang' => $idkeranjang, 'kode_item' => $kodeproduk));
     // $this->updatekeranjang($idkeranjang);
     return TRUE;
 }
}
public function tambahkeranjang($idd)
{
    $query = $this->db->get_where('keranjang_detail', array('id' => $idd), 1);
    $idkeranjang = $query->row()->id_keranjang;
    $produk = $this->db->get_where('master_item', array('kode_item' => $query->row()->kode_item), 1);
    $kuantiti = $query->row()->kuantiti + 1;
    $diskon =  $this->diskon_produk($query->row()->kode_item, $kuantiti);
    $harga = $query->row()->harga;
    $harga_beli = $produk->row()->harga_beli;
    $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
    $this->harga = $harga;
    $this->harga_beli = $harga_beli;
    $this->diskon = $diskon;
    $this->kuantiti = $kuantiti;
    $this->total = $total;
    $this->db->update("keranjang_detail", $this, array('id' => $idd, 'kode_item' => $query->row()->kode_item));
 // $this->updatekeranjang($idkeranjang);
    return TRUE;
}

public function kurangkeranjang($idd)
{
    $query = $this->db->get_where('keranjang_detail', array('id' => $idd), 1);
    $idkeranjang = $query->row()->id_keranjang;
    if ($query->row()->kuantiti > 1) {
        $produk = $this->db->get_where('master_item', array('kode_item' => $query->row()->kode_item), 1);
        $kuantiti = $query->row()->kuantiti - 1;
        $diskon =  $this->diskon_produk($query->row()->kode_item, $kuantiti);
        $harga = $query->row()->harga;
        $harga_beli = $produk->row()->harga_beli;
        $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
        $this->harga = $harga;
        $this->harga_beli = $harga_beli;
        $this->diskon = $diskon;
        $this->kuantiti = $kuantiti;
        $this->total = $total;
        $this->db->update("keranjang_detail", $this, array('id' => $idd, 'kode_item' => $query->row()->kode_item));
     // $this->updatekeranjang($idkeranjang);
    } else {
        $this->db->where('id', $idd)->delete('keranjang_detail');
    // $this->updatekeranjang($idkeranjang);
    }
    return TRUE;
}

public function hapuskeranjang($idd)
{
        // $query = $this->db->get_where('keranjang_detail', array('id' => $idd), 1);
        // $idkeranjang = $query->row()->id_keranjang;
    $this->db->where('id_keranjang', $idd)->delete('keranjang_detail');
    // $this->updatekeranjang($idd);
    return TRUE;
}

public function hapusbarangkeranjang($idd)
{
    $query = $this->db->get_where('keranjang_detail', array('id' => $idd), 1);
    $idkeranjang = $query->row()->id_keranjang;

    $this->db->where('id', $idd)->delete('keranjang_detail');
    // $this->updatekeranjang($idkeranjang);
    return TRUE;
}
public function cek_keranjang($kode, $pembeli, $racikan,$jenis_penjualan='')
{
    if ($pembeli == '') {
        $pembeli = NULL;
    }
    $query = $this->db->get_where('keranjang', array('hold' => '0','id_admin' => $this->session->userdata('idadmin')), 1);
    if ($query->num_rows() < 1) {
        $array = array(
            'tanggal_jam' => date('Y-m-d h:i:s'),
            'id_admin' => $this->session->userdata('idadmin'),
            'id_pembeli' => $pembeli,
            'total' => '0',
            'hold' => '0',
        );
        $this->db->insert("keranjang", $array);
        $idkeranjang = $this->db->insert_id();
        $this->simpan_keranjang($idkeranjang, $kode, 1, $racikan,$jenis_penjualan);
    } else {
        $idkeranjang = $query->row()->id;
        $this->simpan_keranjang($idkeranjang, $kode, 1, $racikan,$jenis_penjualan);
    }
}

public function get_keranjang()
{
    return $this->db->get_where('keranjang', array('hold' => '0', 'id_admin' => $this->session->userdata('idadmin')), 1);
}
public function ubahhargakeranjang($statppn,$idd)
{
   $this->db->trans_start();
   $this->db->select("a.nama_item,b.kode_item, b.id, b.kuantiti, b.diskon, b.harga, b.total, b.id_keranjang");
   $this->db->from("master_item a");
   $this->db->join('keranjang_detail b', 'b.kode_item = a.kode_item');
   $this->db->where('b.id_keranjang', $idd);
   $this->db->order_by('b.id', 'DESC');
   $keranjang = $this->db->get();
   if($keranjang->num_rows() > 0){      
    foreach($keranjang->result_array() as $r) {
        $this->db->select('*');
        $this->db->from('master_item');
        $this->db->where('kode_item', $r['kode_item']);
        $dataitem = $this->db->get()->result_array()[0];
        if ($statppn=='grab') {
         $harga =  $dataitem['harga_jual2'];
     } elseif ($statppn=='gojek') {
         $harga =  $dataitem['harga_jual2'];
     }else{
        $harga = $dataitem['harga_jual'];
    }
    $total = ($harga * $r['kuantiti']) - ($r['diskon'] * $r['kuantiti']);
    $this->db->where('id_keranjang', $idd);
    $this->db->where('kode_item', $r['kode_item']);
    $this->db->update('keranjang_detail',array('harga' => $harga,
        'total' => $total ));
}    
}
$this->db->where('id', $idd);
$this->db->update('keranjang',array('jenis_penjualan' => $statppn )); 
if($this->db->trans_status() === FALSE){
   $this->db->trans_rollback();
}else{
   $this->db->trans_complete();
}
}
public function detail_keranjang($idd)
{
    $this->db->select("a.nama_item,b.kode_item, b.id, b.kuantiti, b.diskon, b.harga, b.total, b.id_keranjang");
    $this->db->from("master_item a");
    $this->db->join('keranjang_detail b', 'b.kode_item = a.kode_item');
    $this->db->where('b.id_keranjang', $idd);
    $this->db->order_by('b.id', 'DESC');
    return $this->db->get();
}

public function rulesholdtransaksi()
{
    return [
        [
            'field' => 'keterangan_hold',
            'label' => 'Keterangan',
            'rules' => 'required',
        ]
    ];
}
public function holdtransaksi()
{
    $post = $this->input->post();
    $this->hold = '1';
    $this->keterangan_hold = $post['keterangan_hold'];
    $this->waktu_hold = time();
    return $this->db->update("keranjang", $this, array('hold' => '0', 'id_admin' => $this->session->userdata('idadmin')));
}

public function bukaholdtransaksi($idkeranjang)
{
    $this->hold = '0';
    return $this->db->update("keranjang", $this, array('id' => $idkeranjang, 'hold' => '1',  'id_admin' => $this->session->userdata('idadmin')));
}

public function promosijenis($jenis)
{
    return $this->db->get_where('master_kode_promosi', array('jenis' => $jenis));
}

public function rulestargetedit()
{
    return [
        [
            'field' => 'target1',
            'label' => 'Target Harian',
            'rules' => 'required',
        ],
        [
            'field' => 'target2',
            'label' => 'Target Mingguan',
            'rules' => 'required',
        ],
        [
            'field' => 'target3',
            'label' => 'Target Bulanan',
            'rules' => 'required',
        ],
    ];
}
public function updatedatatarget()
{
    $post = $this->input->post();
    $this->target_1 = bilanganbulat($post["target1"]);
    $this->target_2 = bilanganbulat($post["target2"]);
    $this->target_3 = bilanganbulat($post["target3"]);

    return $this->db->update("master_target", $this, array('id' => '1'));
}


public function _kode_penjualan()
{
    // $jumlah = $this->db->select('*')->from('penjualan')->where('tanggal',date('Y-m-d'))->get()->num_rows();
    // $jml_baru = $jumlah + 1;
    // $kode = sprintf("%06s", $jml_baru);
    // $kode = date('dmy') . $kode;
    // $cek_ada = $this->db->select('*')->from('penjualan')->where('id ="' . $kode . '"')->get()->num_rows();
    // if ($cek_ada > 0) {
    //     return $this->_kode_penjualan();
    // } else {
    //     return $kode;
    // }

    $jumlah = $this->db->query('SELECT id FROM `penjualan` WHERE tanggal = CURRENT_DATE() order by tanggal_jam desc limit 1 ');
    if ($jumlah->num_rows()>0) {
        $kode = $jumlah->result_array()[0]['id']+1;
    }else{
        $jml_baru = 1;
        $kode = sprintf("%06s", $jml_baru);
        $kode = date('dmy') . $kode;
    }   
    return $kode;
}

function submitpaymentv2($data)
{       
    $this->db->trans_begin();
       // $post = $this->input->post();
    $keranjang = $this->db->get_where('keranjang', array('hold' => '0','id_admin' => $this->session->userdata('idadmin')), 1);
    $kode_penjualan = $this->_kode_penjualan();

    $array = array(
        'id' => $kode_penjualan,
        'id_pembeli' => $keranjang->row()->id_pembeli,
        'id_admin' => $this->session->userdata('idadmin'),
        'total' => $keranjang->row()->total,
        'total_harga_item' => $keranjang->row()->total_harga_item,
        'diskon' => $keranjang->row()->diskon,
        'tanggal' => date('Y-m-d'),
        'id_admin' => $this->session->userdata('idadmin'),
        'tanggal_jam' => date('Y-m-d H:i:s'),
        'jenis_penjualan' => $data['statppn'],
        'resto' => $data['resto'],
        'retur' => '0'
    );

    $this->db->insert("penjualan", $array);
    $cashinout = array(
        'kode_rekening' => '10001',
        'tanggal' => date('Y-m-d'),
        'masuk' => $keranjang->row()->total,
        'id_penjualan' => $kode_penjualan,
    );
    $this->db->insert("cash_in_out", $cashinout);

    $cara_bayar_1 = $data['status'];

    if ($cara_bayar_1 == 'edc') {
        $pembayaran_1 = array(
            'id_penjualan' => $kode_penjualan,
            'nominal' => bilanganbulat($data['totalbayar']),
            'cara_bayar' => 'edc',
            'no_kartu' => $data['no_kartu'],
            'catatan' =>'',
        );
        $this->db->insert("penjualan_pembayaran", $pembayaran_1);
    }else {
        $pembayaran_1 = array(
            'id_penjualan' => $kode_penjualan,
            'nominal' => bilanganbulat($data['totalbayar']),
            'cara_bayar' => 'cash',
            'catatan' =>'',
        );
        $this->db->insert("penjualan_pembayaran", $pembayaran_1);
    }
    $items = [];
    $detailkeranjang = $data['keranjang'];
    foreach ($detailkeranjang as $r) {
        $nama_produk = $this->db->get_where('master_item', array('kode_item' => $r['kode_item']), 1)->row()->nama_item;
        $harga = rupiah($r['total']);
        $items[] = [
            'name' => $nama_produk,
            'total_price' => $harga,
        ];
        $keranjangdetail_input = array(
            'id_penjualan' => $kode_penjualan,
            'kode_item' => $r['kode_item'],
            'harga' => $r['harga'],
            'harga_beli' => $r['harga_beli'],
            'diskon' => $r['diskon'],
            'kuantiti' => $r['kuantiti'],
            'total' => $r['total'],
        );
        $this->db->insert("penjualan_detail", $keranjangdetail_input);
        $stok_input = array(
            'id_penjualan' => $kode_penjualan,
            'kode_item' => $r['kode_item'],
            'tanggal' => date('Y-m-d'),
            'jenis_transaksi' => 'penjualan',
            'jumlah_keluar' => $r['kuantiti'],
                // 'tgl_expired' => $stok->row()->tgl_expired,
        );
        $this->db->insert("kartu_stok", $stok_input);
    }

    $profil = $this->db->get_where('profil_apotek', array('id' => '1'));
    $date = tgl_indo(date('Y-m-d')) . " " . date('H:i:s');
    $this->db->where('id', $keranjang->row()->id)->delete('keranjang');
    if ($this->db->trans_status() === FALSE)
    {
     $this->db->trans_rollback();
     return false;
 }
 else
 {
    $this->db->trans_commit();
    return true;
}
}
}
