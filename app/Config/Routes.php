<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pelangganctrl/index', 'PelangganCtrl::index');
$routes->get('/pelangganctrl', 'PelangganCtrl::datadapur');
$routes->get('/pelangganctrl/coba', 'PelangganCtrl::coba');
$routes->get('/pelangganctrl/datadapur', 'PelangganCtrl::datadapur');
$routes->get('/pelangganctrl/kebersihan', 'PelangganCtrl::kebersihan');
$routes->get('/pelangganctrl/anak', 'PelangganCtrl::anak');
$routes->get('/pelangganctrl/furniture', 'PelangganCtrl::furniture');
$routes->get('/pelangganctrl/mandi', 'PelangganCtrl::mandi');
$routes->get('/pelangganctrl/kebun', 'PelangganCtrl::kebun');
$routes->get('/pelangganctrl/tempatmakan', 'PelangganCtrl::tempatmakan');
$routes->get('/pelangganctrl/box', 'PelangganCtrl::box');
$routes->post('/pelangganctrl/tambahkeranjang', 'PelangganCtrl::tambahkeranjang');
$routes->get('/pelangganctrl/tambahkeranjang', 'PelangganCtrl::tambahkeranjang');
$routes->get('/pelangganctrl/lihatkeranjang', 'PelangganCtrl::lihatkeranjang');
$routes->get('/pelangganctrl/hapus/(:segment)', 'PelangganCtrl::hapus/$1');
$routes->get('/pelangganctrl/update_quantity', 'PelangganCtrl::update_quantity');
$routes->post('/pelangganctrl/update_quantity', 'PelangganCtrl::update_quantity');
$routes->get('/pelangganctrl/bayar', 'PelangganCtrl::bayar');
$routes->get('/pelangganctrl/sukses', 'PelangganCtrl::sukses');
$routes->get('/pelangganctrl/pembayaran', 'PelangganCtrl::pembayaran');
$routes->get('/pelangganctrl/detail/(:segment)', 'PelangganCtrl::detail/$1');
$routes->post('/pelangganctrl/tampildetail', 'PelangganCtrl::tampildetail');
$routes->post('/pelangganctrl/tampildetail', 'PelangganCtrl::tampildetail');
$routes->post('/pelangganctrl/prosespembayaran', 'PelangganCtrl::prosespembayaran');

$routes->get('/adminctrl/index', 'Adminctrl::index');

$routes->get('/barangctrl/index', 'BarangCtrl::index');
$routes->get('/barangctrl/tambah', 'BarangCtrl::tambah');
$routes->get('/barangctrl/databarang', 'BarangCtrl::databarang');
$routes->post('/barangctrl/simpan', 'BarangCtrl::simpan');
$routes->post('/barangctrl/updatebarang', 'BarangCtrl::updatebarang');
$routes->get('/barangctrl/editbarang/(:any)', 'BarangCtrl::editbarang/$1');

$routes->post('/cekoutctrl/lihatcek', 'CekoutCtrl::lihatcek');

$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginSubmit', 'Auth::loginSubmit');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/auth/tambah', 'Auth::user');
$routes->post('/auth/tambah', 'Auth::tambah');

$routes->get('/pembayaranctrl/index', 'PembayaranCtrl::index');
$routes->get('/pembayaranctrl/simpandata', 'PembayaranCtrl::simpandata');
$routes->post('/pembayaranctrl/simpandata', 'PembayaranCtrl::simpandata');
$routes->get('/pembayaranctrl/datapembayaran', 'PembayaranCtrl::datapembayaran');
$routes->get('/pembayaranctrl/tambahdata', 'PembayaranCtrl::tambahdata');

$routes->get('/userctrl/index', 'UserCtrl::index');
$routes->get('/userctrl/tambah', 'UserCtrl::tambah');
$routes->get('/userctrl/datauser', 'UserCtrl::datauser');
$routes->post('/userctrl/simpan', 'UserCtrl::simpan');

$routes->get('/kasirctrl/index', 'KasirCtrl::index');
$routes->get('/kasirctrl/databarang', 'KasirCtrl::databarang');
$routes->get('/kasirctrl/tambahkeranjang', 'KasirCtrl::tambahkeranjang');
$routes->post('/kasirctrl/tambahkeranjang', 'KasirCtrl::tambahkeranjang');
$routes->get('/kasirctrl/bayar', 'KasirCtrl::bayar');
$routes->get('/kasirctrl/pembayaran', 'KasirCtrl::pembayaran');
$routes->get('/kasirctrl/update_quantity', 'KasirCtrl::update_quantity');
$routes->post('/kasirctrl/update_quantity', 'KasirCtrl::update_quantity');
$routes->get('/kasirctrl/lihatkeranjang', 'KasirCtrl::lihatkeranjang');
$routes->get('/kasirctrl/prosespembayaran', 'KasirCtrl::prosespembayaran');
$routes->post('/kasirctrl/prosespembayaran', 'KasirCtrl::prosespembayaran');
$routes->get('/kasirctrl/sukses', 'KasirCtrl::sukses');


$routes->get('/historictrl/index', 'HistoriCtrl::index');
$routes->get('/historictrl/datapelanggan', 'HistoriCtrl::datapelanggan');
$routes->get('/historictrl/databarang', 'HistoriCtrl::databarang');


