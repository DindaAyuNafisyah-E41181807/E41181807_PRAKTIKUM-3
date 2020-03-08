<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');//controller memangguil database dari model m_data 
                $this->load->helper('url');// menggunakan helper url 
	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();// pada function index dibuat variabel $data yang menampilkan data tabel user vyang diambil dari model m_data
		$this->load->view('v_tampil',$data);// kemudian variabel $data ditampilkan pada view v_tampil
    }
    
    function tambah(){
		$this->load->view('v_input');// apabila fuction tamvbah yang dieksekusi maka akan menampilkan view v_input untuk mengimputkan data
    }
    
    function tambah_aksi(){//function tambah aksi dibuat untuk menghandle inputan yang masuk 
		$nama = $this->input->post('nama');//dengan function tambah aksi kita menamngkap input dari form 
		$alamat = $this->input->post('alamat');//dengan function tambah aksi kita menamngkap input dari form
		$pekerjaan = $this->input->post('pekerjaan');//dengan function tambah aksi kita menamngkap input dari form
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);//kemudian merubahnya dalam bentuk array
		$this->m_data->input_data($data,'user');// dan barulah kemdian diarahkan ke m_data untuk mengimputkan data baru yang berupa array tersebut ke database tabel user
		redirect('crud/index');// setelah itu langsung diarah kan ke function index yang menampilkan v_tampil
    }
    function hapus($id){
		//function hapus menangkap id dari pengiriman id yang ditampilkan di view tampil
		$where = array('id' => $id);// kemudian diubah menjadi array
		$this->m_data->hapus_data($where,'user');//dan barulah kita kirim data array hapus tersebut pada m_data 
		redirect('crud/index');// setelah itu langsung diarah kan ke function index yang menampilkan v_tampil
    }
    }
    function edit($id){
		//function edit menangkap id dari pengiriman id yang ditampilkan di view tampil
        $where = array('id' => $id);// kemudian diubah menjadi array
        $data['user'] = $this->m_data->edit_data($where,'user')->result();//dan barulah kita kirim data array edit tersebut pada m_data 
        $this->load->view('v_edit',$data);// kemudian ditrampilkan view v_edit untuk mengubah data
	}
	function update(){
		$id = $this->input->post('id');// menangkap data id dari form update
		$nama = $this->input->post('nama');//menangkap data nama dari form update
		$alamat = $this->input->post('alamat');//menangkap data alamat dari form update
		$pekerjaan = $this->input->post('pekerjaan');//menangkap data pekerjaan dari form update
	
		$data = array(
			//kemudian menjadikan data tersebut dalam bentuk array
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
	
		$where = array(
			'id' => $id//variabel penentu id mana yang telah diupdate
		);
	
		$this->m_data->update_data($where,$data,'user');//SELANJUTNYA KITA KIRIMKAN KE M_DATA UPDATED DATA UNTUK MENGNGUBAH DATABASE  
		redirect('crud/index');// setelah itu langsung diarah kan ke function index yang menampilkan v_tampil
	}
	
}