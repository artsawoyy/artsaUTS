<?php
if (!defined('BASEPATH')) exit('No direct script access
allowed');
class Member extends CI_Controller {
 public function __construct()
 {
 parent::__construct();
 $this->load->library('cart');
 $this->load->model('keranjang_model');
 $this->login_member->cek_login();
 }
 public function index()
 {
 $kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
 $data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/list_produk',$data);
 $this->load->view('member/themes/footer');
 }
 public function tampil_cart()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/tampil_cart',$data);
 $this->load->view('member/themes/footer');
 }
 public function check_out()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/check_out',$data);
 $this->load->view('member/themes/footer');
 }
 public function detail_produk()
 {
 $id=($this->uri->segment(3))?$this->uri->segment(3):0;
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $data['detail'] = $this->keranjang_model->get_produk_id($id)->row_array();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/detail_produk',$data);
 $this->load->view('member/themes/footer');
 }
 function tambah()
 {
 $data_produk= array('id' => $this->input->post('id'),
 'name' => $this->input->post('nama'),
 'price' => $this->input->post('harga'),
 'gambar' => $this->input->post('gambar'),
 'qty' =>$this->input->post('qty')
 );
 $this->cart->insert($data_produk);
 redirect('member');
 }
 function hapus($rowid)
 {
 if ($rowid=="all")
 {
 $this->cart->destroy();
 }
 else
 {
 $data = array('rowid' => $rowid,
 'qty' =>0);
 $this->cart->update($data);
 }
 redirect('member/tampil_cart');
 }
 function ubah_cart()
 {
 $cart_info = $_POST['cart'] ;
 foreach( $cart_info as $id => $cart)
 {
 $rowid = $cart['rowid'];
 $price = $cart['price'];
 $gambar = $cart['gambar'];
 $amount = $price * $cart['qty'];
 $qty = $cart['qty'];
 $data = array('rowid' => $rowid,
 'price' => $price,
 'gambar' => $gambar,
 'amount' => $amount,
 'qty' => $qty);
 $this->cart->update($data);
 }
 redirect('member/tampil_cart');
 }
 public function proses_order()
 {
 //-------------------------Input data pelanggan--------------------------
 $data_pelanggan = array('nama' => $this->session->userdata('nama_member'),
 'email' => $this->session->userdata('email'),
 'alamat' => $this->session->userdata('alamat'),
 'telp' => $this->session->userdata('telp'));
 $id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);
 //-------------------------Input data order------------------------------
 $data_order = array('tanggal' => date('Y-m-d'),
 'pelanggan' => $id_pelanggan);
 $id_order = $this->keranjang_model->tambah_order($data_order);
 //-------------------------Input data detail order-----------------------
 if ($cart = $this->cart->contents())
 {
 foreach ($cart as $item)
 {
 $data_detail = array('order_id'=>$id_order,
 'produk' => $item['id'],
 'qty' => $item['qty'],
 'harga' =>$item['price']);
 $proses = $this->keranjang_model->tambah_detail_order($data_detail);
 }
 }
 //-------------------------Hapus shopping cart--------------------------
 $this->cart->destroy();
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $this->load->view('member/themes/header',$data);
 $this->load->view('member/sukses',$data);
 $this->load->view('member/themes/footer');
 }
}
?>