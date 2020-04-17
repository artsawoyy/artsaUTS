<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Simple_login Class
* Class ini digunakan untuk fitur login, proteksi halaman dan
logout
*/
class Login_member {
// SET SUPER GLOBAL
var $CI = NULL;
/**
* Class constructor
*
* @return void
*/
public function __construct() {
$this->CI =& get_instance();
}
/*cek username dan password pada table users, jika ada set
session berdasar data user daritable users.
* @param string username dari input form
* @param string password dari input form*/
public function login($email, $password) {
//cek username dan password
$query = $this->CI->db->get_where('member',array('email'=>$email,'password' =>
md5($password)));
if($query->num_rows() == 1) {
//ambil data user berdasar username
$row = $this->CI->db->query('SELECT * FROM
member where email = "'.$email.'"');
$admin = $row->row();
$id = $admin->id_member;
$nama = $admin->nama_member;
$telp = $admin->telp;
$alamat = $admin->alamat;
$point = $admin->point;
//set session user
$this->CI->session->set_userdata('email',
$email);
$this->CI->session->set_userdata('id_login',
uniqid(rand()));
$this->CI->session->set_userdata('id', $id);
$this->CI->session->set_userdata('nama_member', $nama);
$this->CI->session->set_userdata('telp', $telp);
$this->CI->session->set_userdata('alamat', $alamat);
$this->CI->session->set_userdata('point', $point);
//redirect ke halaman dashboard
redirect(base_url('member'));}else{
//jika tidak ada, set notifikasi dalam flashdata.
$this->CI->session->set_flashdata('sukses','Email atau password anda salah,
silakan coba lagi.. ');
//redirect ke halaman login
redirect(base_url('member/login'));
}return false;
}
/**
* Cek session login, jika tidak ada, set notifikasi dalam
flashdata, lalu dialihkan ke halaman
* login
*/
public function cek_login() {
//cek session username
if($this->CI->session->userdata('email') == '') {
//set notifikasi
$this->CI->session->set_flashdata('sukses','Anda
belum login');
//alihkan ke halaman login
redirect(base_url('member/login'));
}
}
/**
* Hapus session, lalu set notifikasi kemudian di alihkan
* ke halaman login
*/
public function logout() {
$this->CI->session->unset_userdata('email');
$this->CI->session->unset_userdata('id_login');
$this->CI->session->unset_userdata('id');
$this->CI->session->unset_userdata('telp');
$this->CI->session->unset_userdata('point');
$this->CI->session->set_flashdata('sukses','Anda
berhasil logout');
redirect(base_url('shopping'));
}
}
?>