<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_mod extends CI_Model {

	public function login_cek($username,$password){
		$data = array('username'=>$username, 'password' => $password);
		$query = $this->db->select('*')
		->from('admin')
		->where($data)
		->get()
		->num_rows();
		if($query>0){
			return true;
		} else {
			return false;
		}
//		return $query;
	}


	public function data_siswa()
	{
		$this->db->select('*')
		->from('siswa')
		->join('siswa_kelas', 'siswa_nis = sk_siswa_nis','left')
		->join('kelas','sk_kelas_id = kelas_id','left')
		->order_by('siswa_nis');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function cek_kelas($siswa_nis){
		$this->db->select('kelas_nama')
		->from('kelas')
		->join('siswa_kelas','kelas_id=sk_kelas_id')
		->where('sk_siswa_nis',$siswa_nis);
		$query=$this->db->get();
		return $query->result_array();
	}

	public function siswa_delete($siswa_nis){
		$this->db->where('siswa_nis',$siswa_nis)
		->delete('siswa');
	}

	public function siswa_insert($siswa_nis,$siswa_nama,$siswa_alamat){
		$data = array('siswa_nis' => $siswa_nis,
					'siswa_nama' => $siswa_nama,
					'siswa_alamat' => $siswa_alamat );
		$this->db->insert('siswa',$data);
	}

//	21.51 PM
	public function siswa_view($siswa_nis){
		$this->db->select('*')
		->from('siswa')
		->join('siswa_kelas', 'siswa_nis = sk_siswa_nis','left')
		->join('kelas','sk_kelas_id = kelas_id','left')
		->order_by('siswa_nama')
		->where('siswa_nis',$siswa_nis);
		$query = $this->db->get();
		return $query->row();
	}

	public function siswa_update($siswa_nis,$siswa_nama,$siswa_alamat){
		$data = array(	'siswa_nama' => $siswa_nama,
						'siswa_alamat' => $siswa_alamat);
		$this->db->where('siswa_nis',$siswa_nis);
		$this->db->update('siswa',$data);	

	}

	public function update_kelas($kelas_id,$siswa_nis){
		$query = $this->db->select('*')
		->from('siswa_kelas')
		->where('sk_siswa_nis',$siswa_nis)
		->get()
		->num_rows();
		if($query>0){
			$data = array('sk_kelas_id' => $kelas_id);
			$this->db->where('sk_siswa_nis',$siswa_nis);	
			$this->db->update('siswa_kelas',$data);
		} else {
			$data = array(
			'sk_kelas_id' => $kelas_id,
			'sk_siswa_nis' => $siswa_nis
			);
			$this->db->insert('siswa_kelas',$data);
		}

	}

	public function siswa_search($siswa_cari){
		// $this->db->like('siswa_nama', $siswa_cari);
		// $query=$this->db->get('siswa');
		// return $query->result_array();

		$query = $this->db->select('*')
		->from('siswa')
		->like('siswa_nama',$siswa_cari)
		->or_like('siswa_nis',$siswa_cari)
		->or_like('siswa_alamat',$siswa_cari)
		->get()
		->result_array();

		return $query;
	}
	public function get_kelas(){
		$query = $this->db->select('*')
		->from('kelas')
		->get()
		->result_array();
		return $query;
	}


	public function save_kelas($kelas_id, $siswa_nis){
		$data = array(
			'sk_kelas_id' => $kelas_id,
			'sk_siswa_nis' => $siswa_nis
			);

		$this->db->insert('siswa_kelas',$data);
	}


}

