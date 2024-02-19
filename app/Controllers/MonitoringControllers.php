<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\bokruanganModel;
use App\Models\bokdriverModel;

class MonitoringControllers extends BaseController
{
    public function monruangan()
    {
        $bokruanganModel = new bokruanganModel();
        $data['bookRoom'] =  $bokruanganModel->findAll();

        $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
        return view('admin/monruangan', ['rekapData' => $mergedData]);
    }

    public function detail_monruangan()
    {
        $bokruanganModel = new bokruanganModel();
        $data['bookRoom'] =  $bokruanganModel->findAll();

        $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
        return view('admin/detail_monruangan');
    }

    public function mondriver()
    {
        $bokDriverModel = new bokdriverModel();
        $data['bookdriver'] =  $bokDriverModel->findAll();
    
        return view('admin/mondriver', $data); 
    }
    
    public function detail_mondriver($id_booking_driver)
    {
        $bokDriverModel = new bokdriverModel();
        $data['bookingDetail'] =  $bokDriverModel->find($id_booking_driver);
    
        return view('admin/detail_mondriver', $data);
    }
    
}
