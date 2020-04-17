<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Add_Kategori extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();	
		$this->simple_login->cek_login();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('m_account');
	}

	public function index(){
		$data['kategori'] = $this->m_account->tampilkategori()->result();
		$this->load->view('tambahkategori',$data);
	}

	 function tambah(){
			
                $id= $this->input->post('id');
            	$nama_kategori = $this->input->post('nama_kategori');

                $this->m_account->tambahkategori(array(
			        'id' => $id,
			        'nama_kategori' => $nama_kategori
				));  
                redirect(base_url('dashboard/kategori'));
		}
}


 ?>