<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//controller method
$routes->get('/', 'Auth::login');
$routes->post('auth/processLogin', 'Auth::processLogin');
// $routes->get('user/dashboard', 'UserBookRuangan::booking_ruangan');
$routes->get('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');


//bookingruangan
$routes->post('dashboard/bookRoom', 'UserBRController::bookRoom'); // Untuk mengirim data form ke method bookRoom
$routes->get('user/dashboard', 'UserBRController::showBookings');

//bookingdriver
$routes->post('user/bookingdriver', 'UserBDController::bookDriver'); // Untuk mengirim data form ke method bookRoom
$routes->get('user/bookingdriver', 'UserBDController::showBookings');
//$routes->get('bokdriver/booking_driver', 'bokdriverController::booking_driver');


//history user
$routes->get('user/historyRuangan', 'HistoryController::historyRuangan');
$routes->get('user/historyDriver', 'HistoryController::historyDriver');
$routes->get('user/batalkanBookingRuangan/(:segment)', 'HistoryController::batalkanBookingRuangan/$1');
$routes->get('user/batalkanBookingDriver/(:segment)', 'HistoryController::batalkanBookingDriver/$1');

//monitoring ruangan
$routes->get('admin/monruangan', 'MonitoringControllers::monruangan');
$routes->get('admin/detail_monruangan', 'MonitoringControllers::detail_monruangan');

//monitoring driver
$routes->get('admin/mondriver', 'MonitoringControllers::mondriver');
$routes->get('admin/detail_mondriver/(:segment)', 'MonitoringControllers::detail_mondriver/$1');

//booking request
// $routes->get('admin/BookingRequest', 'MonitoringControllers::BookingRequest');
$routes->get('admin/dashboard_admin', 'HistoryController::dashboard');


//crud user
$routes->get('admin/User', 'Auth::index');
$routes->get('admin/halaman_tambah_akun', 'Auth::tambah_akun');
$routes->post('admin/simpanAkun', 'Auth::simpanAkun');
$routes->get('admin/edit_akun/(:segment)', 'Auth::editusers/$1');
$routes->post('admin/update_akun/(:segment)', 'Auth::updateusers/$1');
$routes->get('admin/delete_akun/(:segment)', 'Auth::deleteusers/$1');
$routes->get('admin/update_password/(:any)', 'Auth::update_password/$1');
$routes->post('admin/save_password/(:any)', 'Auth::save_password/$1');


//crud driver
$routes->get('admin/Driver', 'Driver::index');
$routes->get('admin/tambah_driver', 'Driver::tambah_driver');
$routes->post('admin/simpan_driver', 'Driver::simpan_driver');
$routes->get('admin/edit_driver/(:segment)', 'Driver::editDriver/$1');
$routes->post('admin/update_driver/(:segment)', 'Driver::updateDriver/$1');
$routes->get('admin/delete_driver/(:segment)', 'Driver::deleteDriver/$1');

//crud ruangan
$routes->get('admin/ruangan', 'RuanganControllers::index');
$routes->get('admin/tambah_ruangan', 'RuanganControllers::tambah_ruangan');
$routes->post('admin/simpan_ruangan', 'RuanganControllers::simpan_ruangan');
$routes->get('admin/edit_ruangan/(:segment)', 'RuanganControllers::editRuangan/$1');
$routes->post('admin/updateRuangan/(:segment)', 'RuanganControllers::updateRuangan/$1');
$routes->get('admin/deleteRuangan/(:segment)', 'RuanganControllers::deleteRuangan/$1');

$routes->get('user/dashboard', 'BookingRuangan::index');


$routes->get('admin/BookRoom', 'BokRoomController::booking_room');
$routes->get('admin/booking_driver', 'BokDriver::booking_driver');

$routes->get('admin/detail_booking_driver/(:segment)', 'BokDriver::detail_booking_driver/$1');
$routes->post('process_approval/(:segment)', 'BokDriver::process_approval/$1');
$routes->get('admin/booking_driver', 'BokDriver::process_approval');
$routes->get('admin/deleteBookDriver/(:segment)', 'BokDriver::delete_booking_driver/$1');


$routes->get('admin/detail_booking_room/(:segment)', 'BokRoomController::request_detail/$1');
$routes->post('proses/(:segment)', 'BokRoomController::proses/$1');
$routes->get('admin/BookRoom', 'proses::process_approval');
$routes->get('admin/delete_booking/(:segment)', 'BokRoomController::delete_booking/$1');

