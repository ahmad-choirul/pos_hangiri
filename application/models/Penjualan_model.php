<?php

require './mike42/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class Penjualan_model extends CI_Model
{

    public function get_spg()
    {
        $this->db->select('*');
        $this->db->from('master_spg');
        $query = $this->db->get();
        return $query->result_array();
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
        //     $this->db->where('kategori', $kategori);
        // }
        //filter data by searched keywords
        if (!empty($params['search']['keywords'])) {
            $this->db->like('nama_item', $params['search']['keywords']);
        }
        //sort data by ascending or desceding order
        if (!empty($params['search']['sortBy'])) {
            $this->db->order_by('nama_item', $params['search']['sortBy']);
        } else {
            $this->db->order_by('tgl_expired', 'desc');
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


    // datatable databank start
    var $column_search_databank = array('jenis', 'singkatan', 'nama_bank');
    var $column_order_databank = array(null, 'jenis', 'singkatan', 'nama_bank');
    var $order_databank = array('waktu_update' => 'DESC');
    private function _get_query_databank()
    {
        $get = $this->input->get();
        $this->db->from('master_bank');
        $i = 0;
        foreach ($this->column_search_databank as $item) {
            if ($get['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $get['search']['value']);
                } else {
                    $this->db->or_like($item, $get['search']['value']);
                }

                if (count($this->column_search_databank) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($get['order'])) {
            $this->db->order_by($this->column_order_databank[$get['order']['0']['column']], $get['order']['0']['dir']);
        } else if (isset($this->order_databank)) {
            $order = $this->order_databank;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_databank_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_databank();
        if ($get['length'] != -1)
            $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_datatable_databank()
    {
        $this->_get_query_databank();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_datatable_databank()
    {
        $this->db->from('master_bank');
        return $this->db->count_all_results();
    }
    //datatable databank end

    // CRUD data bank start
    public function rulesbank()
    {
        return [
            [
                'field' => 'singkatan',
                'label' => 'singkatan bank',
                'rules' => 'required',
            ],
            [
                'field' => 'nama_bank',
                'label' => 'nama bank',
                'rules' => 'required',
            ]
        ];
    }
    function simpandatabank()
    {
        $post = $this->input->post();
        $array = array(
            'singkatan' => $post["singkatan"],
            'nama_bank' => $post["nama_bank"],
            'jenis' => $post["jenis"],
        );
        return $this->db->insert("master_bank", $array);
    }

    public function updatedatabank()
    {
        $post = $this->input->post();
        $this->singkatan = $post["singkatan"];
        $this->nama_bank = $post["nama_bank"];
        $this->jenis = $post["jenis"];
        return $this->db->update("master_bank", $this, array('singkatan' => $post['idd']));
    }

    public function hapusdatabank()
    {
        $post = $this->input->post();
        $this->db->where('singkatan', $post['idd']);
        return $this->db->delete('master_bank');
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
        $total_upah_peracik = $this->db->select('SUM(upah_peracik) as total')->from('keranjang_detail')->where('id_keranjang ="' . $idkeranjang . '"')->get()->row();
        $total_harga_item = $this->db->select('SUM((harga*kuantiti) -(diskon*kuantiti)) as total')->from('keranjang_detail')->where('id_keranjang ="' . $idkeranjang . '"')->get()->row();
        $total_semua = $this->db->select('SUM(total) as total')->from('keranjang_detail')->where('id_keranjang ="' . $idkeranjang . '"')->get()->row();
        $total = $total_semua->total +  $total_upah_peracik->total;
        $array = array(
            'total_upah_peracik' => $total_upah_peracik->total,
            'total_harga_item' => $total_harga_item->total,
            'total' => $total,
        );
        $this->db->update("keranjang", $array, array('id' => $idkeranjang));
    }
    private function simpan_keranjang($idkeranjang, $kodeproduk, $kuantiti, $racikan)
    {
        $produk = $this->db->get_where('master_item', array('kode_item' => $kodeproduk), 1);
        $query = $this->db->get_where('keranjang_detail', array('id_keranjang' => $idkeranjang, 'kode_item' => $kodeproduk), 1);
        if ($query->num_rows() < 1) {
            $diskon =  $this->diskon_produk($kodeproduk, 1);
            $harga = $produk->row()->harga_jual;
            $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
            $array = array(
                'id_keranjang' => $idkeranjang,
                'kode_item' => $kodeproduk,
                'harga' => $harga,
                'diskon' => $diskon,
                'kuantiti' => $kuantiti,
                'total' => $total,
            );
            $this->db->insert("keranjang_detail", $array);
            $this->updatekeranjang($idkeranjang);
            return TRUE;
        } else {
            $kuantiti = $query->row()->kuantiti + $kuantiti;
            $diskon =  $this->diskon_produk($kodeproduk, $kuantiti);
            $harga = $produk->row()->harga_jual;
            $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
            $this->harga = $harga;
            $this->diskon = $diskon;
            $this->kuantiti = $kuantiti;
            $this->total = $total;
            $this->db->update("keranjang_detail", $this, array('id_keranjang' => $idkeranjang, 'kode_item' => $kodeproduk));
            $this->updatekeranjang($idkeranjang);
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
        $harga = $produk->row()->harga_jual;
        $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
        $this->harga = $harga;
        $this->diskon = $diskon;
        $this->kuantiti = $kuantiti;
        $this->total = $total;
        $this->db->update("keranjang_detail", $this, array('id' => $idd, 'kode_item' => $query->row()->kode_item));
        $this->updatekeranjang($idkeranjang);
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
            $harga = $produk->row()->harga_jual;
            $total = ($harga * $kuantiti) - ($diskon * $kuantiti);
            $this->harga = $harga;
            $this->diskon = $diskon;
            $this->kuantiti = $kuantiti;
            $this->total = $total;
            $this->db->update("keranjang_detail", $this, array('id' => $idd, 'kode_item' => $query->row()->kode_item));
            $this->updatekeranjang($idkeranjang);
        } else {
            $this->db->where('id', $idd)->delete('keranjang_detail');
            $this->updatekeranjang($idkeranjang);
        }
        return TRUE;
    }

    public function hapuskeranjang($idd)
    {
        // $query = $this->db->get_where('keranjang_detail', array('id' => $idd), 1);
        // $idkeranjang = $query->row()->id_keranjang;
        $this->db->where('id_keranjang', $idd)->delete('keranjang_detail');
        $this->updatekeranjang($idd);
        return TRUE;
    }
    public function cek_keranjang($kode, $pembeli, $racikan)
    {
        if ($pembeli == '') {
            $pembeli = NULL;
        }
        $query = $this->db->get_where('keranjang', array('hold' => '0', 'token' => $this->security->get_csrf_hash(), 'id_admin' => $this->session->userdata('idadmin')), 1);
        if ($query->num_rows() < 1) {
            $array = array(
                'token' => $this->security->get_csrf_hash(),
                'tanggal_jam' => date('Y-m-d h:i:s'),
                'id_admin' => $this->session->userdata('idadmin'),
                'id_pembeli' => $pembeli,
                'total' => '0',
                'hold' => '0',
            );
            $this->db->insert("keranjang", $array);
            $idkeranjang = $this->db->insert_id();
            $this->simpan_keranjang($idkeranjang, $kode, 1, $racikan);
        } else {
            $idkeranjang = $query->row()->id;
            $this->simpan_keranjang($idkeranjang, $kode, 1, $racikan);
        }
    }

    public function get_keranjang()
    {
        return $this->db->get_where('keranjang', array('hold' => '0', 'token' => $this->security->get_csrf_hash(), 'id_admin' => $this->session->userdata('idadmin')), 1);
    }
    public function detail_keranjang($idd)
    {
        $this->db->select("a.nama_item, a.satuan, b.kode_item, b.id, b.kuantiti, b.diskon, b.harga, b.total, b.id_keranjang");
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
        return $this->db->update("keranjang", $this, array('hold' => '0', 'token' => $this->security->get_csrf_hash(), 'id_admin' => $this->session->userdata('idadmin')));
    }

    public function bukaholdtransaksi($idkeranjang)
    {
        $this->hold = '0';
        return $this->db->update("keranjang", $this, array('id' => $idkeranjang, 'hold' => '1', 'token' => $this->security->get_csrf_hash(), 'id_admin' => $this->session->userdata('idadmin')));
    }

    public function bankjenis($jenis)
    {
        return $this->db->get_where('master_bank', array('jenis' => $jenis));
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


    private function _kode_penjualan()
    {
        $jumlah = $this->db->select('*')->from('penjualan')->get()->num_rows();
        $jml_baru = $jumlah + 1;
        $kode = sprintf("%06s", $jml_baru);
        $kode = date('dmy') . $kode;
        $cek_ada = $this->db->select('*')->from('penjualan')->where('id ="' . $kode . '"')->get()->num_rows();
        if ($cek_ada > 0) {
            return $this->_kode_penjualan();
        } else {
            return $kode;
        }
    }
    
    function submitpaymentv2($data)
    {       
        $this->db->trans_begin();
       // $post = $this->input->post();
        $keranjang = $this->db->get_where('keranjang', array('hold' => '0', 'token' => $this->security->get_csrf_hash(), 'id_admin' => $this->session->userdata('idadmin')), 1);
        $kode_penjualan = $this->_kode_penjualan();
        $array = array(
            'id' => $kode_penjualan,
            'id_pembeli' => $keranjang->row()->id_pembeli,
            'id_admin' => $this->session->userdata('idadmin'),
            'total' => $keranjang->row()->total,
            'tanggal' => date('Y-m-d'),
            'jenis_penjualan' => $data['jns_penjualan'],
            'tanggal_jam' => date('Y-m-d H:i:s'),
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
        if ($cara_bayar_1 == 'cash') {
            $pembayaran_1 = array(
                'id_penjualan' => $kode_penjualan,
                'nominal' => bilanganbulat($data['totalbayar']),
                'cara_bayar' => 'cash',
                'catatan' =>'',
            );
            $this->db->insert("penjualan_pembayaran", $pembayaran_1);

    } else {//kredit
        $pembayaran_1 = array(
            'id_penjualan' => $kode_penjualan,
            'nominal' => bilanganbulat($data['totalbayar']),
            'cara_bayar' => 'kredit',
            'catatan' => $this->input->post('catatan')[0],
        );
        $this->db->insert("penjualan_pembayaran", $pembayaran_1);

        $piutang = array(
            'id_penjualan' => $kode_penjualan,
            'id_pembeli' =>  $keranjang->row()->id_pembeli,
            'judul' => 'kredit pembelian',
            'tanggal_jatuh_tempo' => $data['tempo'],
            'nominal' => bilanganbulat($keranjang->row()->total_harga_item),
            'nominal_dibayar' => bilanganbulat($data['totalbayar']),
            'sudah_lunas' => '0',
            'keterangan' => $this->input->post('catatan')[0],
        );
        $this->db->insert("piutang_history", $piutang);
    }


    $items = [];
    $detailkeranjang = $data['keranjang'];
    $totalkomisi=0;
    foreach ($detailkeranjang as $r) {
        $stok = $this->db->order_by('tgl_expired', 'ASC')->get_where('kartu_stok', array('kode_item' => $r['kode_item']), 1);
        $stoks = $this->db->get_where('master_item', array('kode_item' => $r['kode_item']), 1)->row()->stok;
        $nilai_komisi = $this->db->get_where('master_item', array('kode_item' => $r['kode_item']), 1)->row()->komisi;
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
            'diskon' => $r['diskon'],
            'kuantiti' => $r['kuantiti'],
            'total' => $r['total'],
            'stok_sisa' => $stoks - $r['kuantiti'],
        );
        $this->db->insert("penjualan_detail", $keranjangdetail_input);
        if ($r['jenis'] != 'racikan') {
            $stok_input = array(
                'id_penjualan' => $kode_penjualan,
                'kode_item' => $r['kode_item'],
                'tanggal' => date('Y-m-d'),
                'jenis_transaksi' => 'penjualan',
                'jumlah_keluar' => $r['kuantiti'],
                'satuan_kecil' => $r['satuan'],
                'tgl_expired' => $stok->row()->tgl_expired,
            );
            if ($nilai_komisi!=null) {
                $totalkomisi+=($nilai_komisi*$r['kuantiti']);
            }
            $this->db->insert("kartu_stok", $stok_input);
            $this->db->set('stok', 'stok - ' . (int) $r['kuantiti'], FALSE)->where('kode_item', $r['kode_item'])->update('master_item');
        } else {
            $racikan = $this->db->get_where('master_racikan', array('kode_racikan' => $r['kode_item']));
            foreach ($racikan->result_array() as $racik) {
                $stok = $this->db->order_by('tgl_expired', 'ASC')->get_where('kartu_stok', array('kode_item' => $racik['kode_obat']), 1);
                $jumlah = $r['kuantiti'] * $racik['jumlah_obat_dipakai'];
                $stok_input = array(
                    'id_penjualan' => $kode_penjualan,
                    'kode_item' => $racik['kode_obat'],
                    'tanggal' => date('Y-m-d'),
                    'jenis_transaksi' => 'penjualan',
                    'jumlah_keluar' => $jumlah,
                    'satuan_kecil' => $r['satuan'],
                    'tgl_expired' => $stok->row()->tgl_expired,
                );

                $this->db->insert("kartu_stok", $stok_input);
                $this->db->set('stok', 'stok - ' . (int) $jumlah, FALSE)->where('kode_item', $racik['kode_obat'])->update('master_item');
            }
        }
    }
    if ($totalkomisi>0) {
        $komisi = array('id_penjualan' =>  $data['penjualan'],
            'tgl_transaksi' => date('Y-m-d'),
            'id_spg' =>  $data['id_spg'],
            'total' =>  $totalkomisi);
        $this->db->insert("master_komisi", $komisi);

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
