<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');//CONTROLLER TERHUBUNG DENGAN MODEL M_LOGIN

	}

	function index(){
		$this->load->view('v_login');//function index menampilkan view dari v_login
	}

	function aksi_login(){
		$username = $this->input->post('username');// function aksi_login menerima username dari input username di view login
		$password = $this->input->post('password');// function aksi_login menerima password dari input passwrod di view login
		$where = array(
			// data dijadiakn array dalamvariabel where
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			// mengecek apabila username ada di data admin
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);// masukke data session 

			redirect(base_url("admin"));// masuk ke halaman admin

		}else{
			echo "Username dan password salah !";//jika tidaksesuai dengan data admin maka user dan password salah
		}
	}

	function logout(){
		$this->session->sess_destroy();// berguna untuk mengahpus status sessioin login yang kita puynya 
		redirect(base_url('login'));
	}
}