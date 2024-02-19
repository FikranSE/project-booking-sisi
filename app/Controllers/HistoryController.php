<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserBookRuangan;
use App\Models\UserBookDriver;
use App\Models\bokruanganModel;
use App\Models\bokdriverModel;

class HistoryController extends BaseController
{
    public function historyRuangan(){
        $UserBookRuangan = new UserBookRuangan();
        $session = session();
        $username = $session->get('username');
        $data['history'] =  $UserBookRuangan->getBookingByUser($username);
        return view('user/historyRuangan',$data);
        
        
    }
    public function historyDriver(){
        $UserBookDriver = new UserBookDriver();
        $session = session();
        $username = $session->get('username');
        $data['historyDriver'] =  $UserBookDriver->getBookingByUser($username);

        return view('user/historyDriver',$data);
    }

    public function batalkanBookingRuangan($id_booking_ruangan)
    {
        $UserBookRuangan = new UserBookRuangan();
    
        if ($UserBookRuangan->delete($id_booking_ruangan)) {
            session()->setFlashdata('message', 'Booking ruangan berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus booking ruangan.');
        }
    
        return redirect()->to('user/historyRuangan');
    }

    public function batalkanBookingDriver($id_booking_driver)
    {
        $UserBookDriver = new UserBookDriver();
    
        if ($UserBookDriver->delete($id_booking_driver)) {
            session()->setFlashdata('message', 'Booking driver berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus booking driver.');
        }
    
        return redirect()->to('user/historyDriver');
    }

    public function index()
    {
        $bokruanganModel = new bokruanganModel();
        $data['bookRoom'] =  $bokruanganModel->findAll();

        $bokDriverModel = new bokdriverModel();
        $data['bookdriver'] =  $bokDriverModel->findAll();

        $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
        return view('admin/History', ['rekapData' => $mergedData]);
    }

    // public function BookingRequest()
    // {
    //     $bokruanganModel = new bokruanganModel();
    //     $data['bookRoom'] =  $bokruanganModel->findAll();

    //     $bokDriverModel = new bokdriverModel();
    //     $data['bookdriver'] =  $bokDriverModel->findAll();

    //     $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
    //     return view('admin/BookingRequest', ['rekapData' => $mergedData]);
    // }

    // public function dashboard()
    // {
    //     $bokruanganModel = new bokruanganModel();
    //     $data['bookRoom'] =  $bokruanganModel->findAll();

    //     $bokDriverModel = new bokdriverModel();
    //     $data['bookdriver'] =  $bokDriverModel->findAll();

    //     $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
    //     return view('admin/dashboard_admin', ['rekapData' => $mergedData]);
    // }

    public function dashboard()
    {
        $bokruanganModel = new bokruanganModel();
        $bokDriverModel = new bokdriverModel();
        

        $data['active_tab'] = 'dashboard_admin';
        $data['totalBookingRuangan'] = $bokruanganModel->getTotalBookingCount();
        $data['totalBookingdriver'] =   $bokDriverModel->getTotalBookingCount();
        $data['totalActivities'] = $data['totalBookingdriver'] + $data['totalBookingRuangan'];


        $todayDate = date('Y-m-d');
        $data['roomBookings'] = $bokruanganModel->getBookingsForToday($todayDate, 'pending');
        $data['driverBookings'] = $bokDriverModel->getBookingsForToday($todayDate, 'pending');

        return view('admin/dashboard_admin', $data);
    }

   
}
