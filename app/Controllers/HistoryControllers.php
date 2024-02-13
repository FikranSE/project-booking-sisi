<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\bokruanganModel;
use App\Models\bokdriverModel;

class HistoryControllers extends BaseController
{
    public function monruangan()
    {
        $bokruanganModel = new bokruanganModel();
        $data['bookRoom'] =  $bokruanganModel->findAll();

        $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
        return view('admin/monruangan', ['rekapData' => $mergedData]);
    }

    public function mondriver()
    {

        $bokDriverModel = new bokdriverModel();
        $data['bookdriver'] =  $bokDriverModel->findAll();

        $mergedData = array_merge($data['bookdriver'], $data['bookdriver']);
        return view('admin/mondriver', ['rekapData' => $mergedData]);
    }

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
