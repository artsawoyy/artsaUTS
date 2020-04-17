<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller {
 public function __construct()
 {
 parent::__construct();
 $this->load->library('cart');
 $this->load->model('keranjang_model');
 $this->login_member->cek_login();
 }
 public function index()
 {
 $data['produk'] = $this->keranjang_model->get_produk_all();
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/list_produk',$data);
 $this->load->view('member/themes/footer');
 }
  public function tentang()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/tentang',$data);
 $this->load->view('member/themes/footer');
 }
 public function cara_bayar()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/cara_bayar',$data);
 $this->load->view('member/themes/footer');
 }
}
