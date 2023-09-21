<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/testing', 'Pembayaran::test');


//Penyewa
$routes->get('/', 'Penyewa::index');
$routes->get('/login/penyewa', 'Login::penyewa');
$routes->get('/registrasi/penyewa', 'Registrasi::penyewa');
$routes->get('/login/logout', 'Login::logout', ['filter' => 'auth']);
$routes->get('/login/infoLogout', 'Login::infoLogout');
// $routes->get('/login/info_pemesanan', 'Login::info_pemesanan');
$routes->get('/hasil_pencarian', 'Penyewa::hasil_pencarian_belum_login');
$routes->get('/radius', 'Radius::navbar');
$routes->get('/radius/(:any)', 'Radius::jarak_radius/$1');
$routes->get('/wilayah', 'Wilayah::navbar');
$routes->get('/wilayah/(:any)', 'Wilayah::nama_wilayah/$1');
$routes->get('/detail-kos/(:any)', 'DataKos::detail_belum_login/$1');
$routes->get('/lihat-kamar/(:any)', 'DataKamar::lihat_belum_login/$1');
$routes->get('/detail-kamar/(:any)', 'DataKamar::detail_belum_login/$1');
$routes->get('/form-pembayaran/(:any)', 'Pembayaran::tambah/$1');
$routes->get('/penyewa', 'Penyewa::sudah_login', ['filter' => 'auth']);
$routes->get('/penyewa/riwayat', 'Riwayat::lihat', ['filter' => 'auth']);
$routes->get('/penyewa/riwayat-pembayaran', 'Riwayat::riwayat_pembayaran', ['filter' => 'auth']);
$routes->get('/penyewa/riwayat-pembayaran/cetak-nota/(:any)', 'Riwayat::cetak_nota/$1', ['filter' => 'auth']);
$routes->get('/penyewa/radius', 'Radius::navbar2', ['filter' => 'auth']);
$routes->get('/penyewa/radius/(:any)', 'Radius::jarak_radius2/$1', ['filter' => 'auth']);
$routes->get('/penyewa/wilayah', 'Wilayah::navbar2', ['filter' => 'auth']);
$routes->get('/penyewa/wilayah/(:any)', 'Wilayah::nama_wilayah2/$1', ['filter' => 'auth']);
$routes->get('/penyewa/detail-kos/(:any)', 'DataKos::detail_sudah_login/$1', ['filter' => 'auth']);
$routes->get('/penyewa/lihat-kamar/(:any)', 'DataKamar::lihat_sudah_login/$1', ['filter' => 'auth']);
$routes->get('/penyewa/detail-kamar/(:any)', 'DataKamar::detail_sudah_login/$1', ['filter' => 'auth']);
$routes->post('/pemesanan', 'Pemesanan::lihat', ['filter' => 'auth']);
$routes->post('/pembayaran', 'Pembayaran::pembayaran', ['filter' => 'auth']);
$routes->post('/simpan-pembayaran', 'Pembayaran::simpan_pembayaran', ['filter' => 'auth']);
$routes->get('/penyewa/profil', 'Profil::penyewa', ['filter' => 'auth']);
$routes->get('/penyewa/ubah-profil', 'Profil::ubah_profil_penyewa', ['filter' => 'auth']);
$routes->post('/penyewa/ubah-profil', 'Profil::simpan_ubah_profil_penyewa', ['filter' => 'auth']);
$routes->get('/penyewa/ubah-password', 'UbahPassword::penyewa', ['filter' => 'auth']);
$routes->post('/penyewa/ubah-password', 'UbahPassword::saveUbahPenyewa', ['filter' => 'auth']);
$routes->get('/penyewa/hasil_pencarian', 'Penyewa::hasil_pencarian_sudah_login', ['filter' => 'auth']);

//Pemilik Kos
$routes->get('/pemilik-kos', 'PemilikKos::index', ['filter' => 'auth2']);
$routes->get('/login/pemilik-kos', 'Login::pemilik_kos');
$routes->get('/registrasi/pemilik-kos', 'Registrasi::pemilik_kos');
$routes->get('/login/logout2', 'Login::logout2', ['filter' => 'auth2']);
$routes->get('/login/infoLogout2', 'Login::infoLogout2');
$routes->get('/hasil_pencarian', 'PemilikKos::hasil_pencarian');
$routes->get('/data-kos', 'DataKos::lihat_by_pemilik_kos', ['filter' => 'auth2']);
$routes->get('/data-kos/detail/(:any)', 'DataKos::detail_by_pemilik_kos/$1', ['filter' => 'auth2']);
$routes->get('/data-kos/tambah', 'DataKos::tambah', ['filter' => 'auth2']);
$routes->post('/data-kos/tambah', 'DataKos::simpan_tambah', ['filter' => 'auth2']);
$routes->get('/data-kos/ubah/(:any)', 'DataKos::ubah/$1', ['filter' => 'auth2']);
$routes->post('/data-kos/simpan-ubah/(:any)', 'DataKos::simpan_ubah/$1', ['filter' => 'auth2']);
$routes->get('/data-kamar', 'DataKamar::lihat_by_pemilik_kos', ['filter' => 'auth2']);
$routes->get('/data-kamar/detail/(:any)', 'DataKamar::detail_by_pemilik_kos/$1', ['filter' => 'auth2']);
$routes->get('/data-kamar/tambah', 'DataKamar::tambah', ['filter' => 'auth2']);
$routes->post('/data-kamar/tambah', 'DataKamar::simpan_tambah', ['filter' => 'auth2']);
$routes->get('/data-kamar/ubah/(:any)', 'DataKamar::ubah/$1', ['filter' => 'auth2']);
$routes->post('/data-kamar/simpan-ubah/(:any)', 'DataKamar::simpan_ubah/$1', ['filter' => 'auth2']);
$routes->get('/data-kamar/hapus/(:num)', 'DataKamar::hapus/$1', ['filter' => 'auth2']);
$routes->get('/data-penyewa', 'DataPenyewa::lihat', ['filter' => 'auth2']);
$routes->get('/data-penyewa/form-lanjut-kos/(:num)', 'DataPenyewa::lanjutKos/$1', ['filter' => 'auth2']);
$routes->post('/data-penyewa/simpan-lanjut-kos', 'DataPenyewa::simpanLanjutKos', ['filter' => 'auth2']);
$routes->get('/data-penyewa/berhenti-kos/(:any)', 'DataPenyewa::berhentiKos/$1', ['filter' => 'auth2']);
$routes->get('/saldo', 'Saldo::lihat', ['filter' => 'auth2']);
$routes->get('/saldo/riwayat', 'Saldo::riwayat', ['filter' => 'auth2']);
$routes->get('/saldo/pengajuan', 'Saldo::pengajuan', ['filter' => 'auth2']);
$routes->post('/saldo/pengajuan', 'Saldo::savePengajuan', ['filter' => 'auth2']);
$routes->get('/saldo/savePengajuan', 'Saldo::savePengajuan', ['filter' => 'auth2']);
$routes->get('/pemilik-kos/ubah-profil', 'Profil::pemilik_kos', ['filter' => 'auth2']);
$routes->post('/pemilik-kos/ubah-profil', 'Profil::ubah_profil_pemilik_kos', ['filter' => 'auth2']);
$routes->get('/pemilik-kos/ubah-password', 'UbahPassword::pemilik_kos', ['filter' => 'auth2']);
$routes->post('/pemilik-kos/ubah-password', 'UbahPassword::saveUbahPemilikKos', ['filter' => 'auth2']);

//Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'auth3']);
$routes->get('/login/admin', 'Login::admin');
$routes->get('/registrasi/admin', 'Registrasi::admin');
$routes->get('/login/logout3', 'Login::logout3', ['filter' => 'auth3']);
$routes->get('/login/infoLogout3', 'Login::infoLogout3');
$routes->get('/data-pemilik-kos', 'DataPemilikKos::lihat', ['filter' => 'auth3']);
$routes->get('/data-pemilik-kos/detail/(:num)', 'DataPemilikKos::detail/$1', ['filter' => 'auth3']);
$routes->get('/pembayaran', 'Pembayaran::lihat', ['filter' => 'auth3']);
$routes->get('/pembayaran/detail/(:num)', 'Pembayaran::detail/$1', ['filter' => 'auth3']);
$routes->get('/pembayaran/konfirmasi/(:num)', 'Pembayaran::konfirmasi/$1', ['filter' => 'auth3']);
$routes->get('/penarikan-saldo', 'PenarikanSaldo::lihat', ['filter' => 'auth3']);
$routes->get('/penarikan-saldo/konfirmasi/(:num)', 'PenarikanSaldo::konfirmasi/$1', ['filter' => 'auth3']);
$routes->post('/penarikan-saldo/simpan-konfirmasi', 'PenarikanSaldo::simpan_konfirmasi', ['filter' => 'auth3']);
$routes->get('/admin/ubah-password', 'UbahPassword::admin', ['filter' => 'auth2']);
$routes->post('/admin/ubah-password', 'UbahPassword::saveUbahAdmin', ['filter' => 'auth2']);

//OTP
$routes->get('/otp', 'OtpController::otpRequest');
$routes->post('/otp', 'OtpController::otpRequest');
$routes->post('/otp/verify', 'OtpController::otpVerify');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
