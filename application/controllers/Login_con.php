<?php 


class Login_con extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_mod');
	}

	function index(){
		$this->load->view('login');
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = array(
				'username' => $username,
				'password' => $password
			);
		$status = $this->login_mod->cek_login('admin',$cek)->num_rows();
		if ($status > 0){
			$data_session = array(
					'username' => $username,
					'status' => 'login'
				);		
		
		$this->session->set_userdata($data_session);
		redirect(base_url('index.php/admin_con/siswa_data'));
		} else {
			echo "Username or Password is wrong"; ?>
			<br><br><br><br>
			<a href="<?php echo base_url() ?>">Return to home</a>
	<?php 
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
 ?>