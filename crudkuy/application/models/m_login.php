<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){	
		//function cek_login untuk memeriksa apakah data ada di database admin untuk bisa login	
		return $this->db->get_where($table,$where);
	}	
}