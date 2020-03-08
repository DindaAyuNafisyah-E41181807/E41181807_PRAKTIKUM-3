<?php 

class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');//function tampil_data di model menampilkan data tabel user yang ada di data base
		// yang nantinya function tampil_data akan diopanggil controller
	}
	function input_data($data,$table){
		// function input data menerima data inputan dari data arrayb yang di tangkap controller
		$this->db->insert($table,$data);// dan data input tersebut ditambahkan ke dalam tabel user 
	}
	function hapus_data($where,$table){
		// function hapus_data menerima data array dari contrroler yang berupa variabel $where
		$this->db->where($where);//meneyesuaikan id dari data array
		$this->db->delete($table);// kemudian menghapus data pada tabel tersebut
	}
	function edit_data($where,$table){
		// kemudian function edit data memberitahukan ke database bahwa ada tabel yang akan di edit		
		return $this->db->get_where($table,$where);// data yang diesit akan sesuai dengan id yang dikirim controller
	}
	function update_data($where,$data,$table){
		$this->db->where($where);//KEMUDIAN FUNCTION update data menerima id dalam variabel where dari controller
		$this->db->update($table,$data);//kemudian mengupadte table pada database sesuai id 
	}	
}