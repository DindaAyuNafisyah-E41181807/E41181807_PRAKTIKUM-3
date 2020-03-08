<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	// disini controller mengecek apakah status session user tidak sedang dalam keadaan login maka 
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));//diarahkan ke ke url untuk login  
		}
	}

	function index(){
		$this->load->view('v_admin');// function indexmenampilkan view admin 
	}
}