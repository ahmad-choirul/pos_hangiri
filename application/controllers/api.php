<?php

class api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function promositambahweb(){ 
		do {
			$getkode_promosi = date("md").''.$this->create_random(4);
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
			$kode_promosi = $getkode_promosi;
		}else{
			return $kode_promosi = null;
		}   
		if($kode_promosi!=null){
			redirect("http://babe-q.com?kode=$kode_promosi");
		}else{
			redirect("http://babe-q.com?kode=gagal");

		}

	}
	function create_random($length)
	{
		$data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
		$string = '';
		for($i = 0; $i < $length; $i++) {
			$pos = rand(0, strlen($data)-1);
			$string .= $data{$pos};
		}
		return $string;
	}

}

/* End of file  */
/* Location: ./application/controllers/ */