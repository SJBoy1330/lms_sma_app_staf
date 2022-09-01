<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Sekolah_m extends MY_Model{

  	protected $_table_name = 'sekolah';
    protected $_primary_key = 'id_sekolah';
    
    public function __construct() 
	{
		parent::__construct();
	}

	public function get_single_sekolah($array=NULL){
		$query = parent::get_single($array);
		return $query;
	}

	public function get_sekolah($array=NULL, $limit=20, $start=0){
		$query = parent::get_order_by($array, $limit, $start);
		return $query;
	}
	public function get_id_sekolah($kode_sekolah)
	{
		$query = $this->db->get_where('sekolah',['kode' => $kode_sekolah])->row();
		return $query->id_sekolah;
	}
	public function get_sekolah_all($array=NULL){
		$query = parent::get_all($array);
		return $query;
	}

	public function insert_sekolah($array){
		$id=parent::insert($array);
		return $id;
	}

	public function update_sekolah($data, $id=NULL){
		$res = parent::update($data, $id);
		return $res;

	}

	public function delete_sekolah($id){
		return parent::delete($id);
	}

}