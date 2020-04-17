<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Simple_login Class
* Class ini digunakan untuk fitur login, proteksi halaman dan
logout
*/
class Simple_login {
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
$query = $this->CI->db->get_where('users',array('email'=>$email,'password' =>
md5($password)));
if($query->num_rows() == 1) {
//ambil data user berdasar username
$row = $this->CI->db->query('SELECT id_user FROM
users where email = "'.$email.'"');
$admin = $row->row();
$id = $admin->id_user;
//set session user
$this->CI->session->set_userdata('email',
$email);
$this->CI->session->set_userdata('id_login',
uniqid(rand()));
$this->CI->session->set_userdata('id', $id);
//redirect ke halaman dashboard
redirect(base_url('dashboard'));}else{
//jika tidak ada, set notifikasi dalam flashdata.
$this->CI->session->set_flashdata('sukses','Email atau password anda salah,
silakan coba lagi.. ');
//redirect ke halaman login
redirect(base_url('login'));
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
redirect(base_url('login'));
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
$this->CI->session->set_flashdata('sukses','Anda
berhasil logout');
redirect(base_url('login'));
}
}
?>