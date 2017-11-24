<?php 

class Admin_con extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status')!='login'){
			redirect(base_url());
		}
	}
	function index(){
//		redirect(base_url('index.php/siswa_con/siswa_data'));
//		$this->load->view('siswa');
		redirect(base_url('index.php/siswa_con'));
	}

	function siswa_data(){
		$this->load->model('siswa_mod');
		$data['kelas'] = $this->siswa_mod->get_kelas();
		$data['siswa1'] = $this->siswa_mod->data_siswa();
		$this->load->view('siswa',$data);
	}
}

 ?>