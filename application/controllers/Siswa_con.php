<?php



class Siswa_con extends CI_Controller {

	

	public function index(){
		redirect(base_url('index.php/login_con'));
	}

	// public function login(){
	// 	$this->load->view('login');
	// }

	// public function logout(){
	// 	// $data = array('username','password');
	// 	// $this->session->unset_userdata($data);
	// 	unset(
	// 		$_SESSION['username'],
	// 		$_SESSION['logged_in']
	// 		);
	// 	redirect(base_url());
	// }

	// public function login_cek(){
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	$this->load->model('siswa_mod');
	// 	$status = $this->siswa_mod->login_cek($username,$password);
	// 	if($status){
	// 		$data = array(
	// 			'username'  => $username,
	// 			'logged_in' => TRUE);
	// 		$this->session->set_userdata($data);
	// 		redirect(base_url('index.php/siswa_con/siswa_data'));
	// 	} else {
	// 		redirect(base_url('index.php/siswa_con/siswa_data'));
	// 	}
	// }


	public function siswa_data()
	{
		$this->load->model('siswa_mod');
		$data['kelas'] = $this->siswa_mod->get_kelas();
		$data['siswa1'] = $this->siswa_mod->data_siswa();
		$this->load->view('siswa',$data);
	}



	public function siswa_delete(){
		$siswa_nis = $this->input->get('siswa_nis');
		$this->load->model('siswa_mod');
		$this->siswa_mod->siswa_delete($siswa_nis);
		redirect(base_url('index.php/admin_con/siswa_data'));
	}

	public function siswa_insert(){
		//ambil variabel
		$siswa_nis = $this->input->post('siswa_nis');
		$siswa_nama = $this->input->post('siswa_nama');
		$siswa_alamat = $this->input->post('siswa_alamat');
		$kelas_id = $this->input->post('kelas_id');
		//simpan
		$this->load->model('siswa_mod');
		$this->siswa_mod->save_kelas($kelas_id,$siswa_nis);
		$this->siswa_mod->siswa_insert($siswa_nis,$siswa_nama,$siswa_alamat);
		redirect(base_url('index.php/admin_con/siswa_data'));
	}

//	21.54 PM
	public function siswa_edit(){
		$siswa_nis = $this->input->get('siswa_nis');
		$this->load->model('siswa_mod');
		$data['kelas'] = $this->siswa_mod->get_kelas($siswa_nis);
		$data['siswa2'] = $this->siswa_mod->siswa_view($siswa_nis);
		$this->load->view('siswa_form_edit',$data);
	}

	public function siswa_update(){
		$siswa_nis = $this->input->post('siswa_nis');
		$siswa_nama = $this->input->post('siswa_nama');
		$siswa_alamat = $this->input->post('siswa_alamat');
		$kelas_id = $this->input->post('kelas_id');
		$this->load->model('siswa_mod');
		$this->siswa_mod->siswa_update($siswa_nis,$siswa_nama,$siswa_alamat);
		$this->siswa_mod->update_kelas($kelas_id,$siswa_nis);
		redirect(base_url('index.php/admin_con/siswa_data'));	

	}
	public function siswa_search(){
		$siswa_cari = $this->input->post('siswa_cari');
		$this->load->model('siswa_mod');
		$data['siswa1']=$this->siswa_mod->siswa_search($siswa_cari);
		$this->load->view('siswa',$data);

	}


}
