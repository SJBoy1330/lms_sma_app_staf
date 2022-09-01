<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class siswa_m extends MY_Model{

  	protected $_table_name = 'siswa';
    protected $_primary_key = 'id_siswa';
    
    public function __construct() 
	{
		parent::__construct();
	}

	public function get_single_siswa($array=NULL){
		$query = parent::get_single($array);
		return $query;
	}
	public function hash_my_password($nis,$password)
	{
		$data = hash('sha256', $nis.$password);
		return $data;
	}
	public function get_siswa($array=NULL, $limit=20, $start=0){
		$query = parent::get_order_by($array, $limit, $start);
		return $query;
	}

	public function get_siswa_all($array=NULL){
		$query = parent::get_all($array);
		return $query;
	}

	public function insert_siswa($array){
		$id=parent::insert($array);
		return $id;
	}

	public function update_siswa($data, $id=NULL){
		$res = parent::update($data, $id);
		return $res;

	}

	public function delete_siswa($id){
		return parent::delete($id);
	}

}