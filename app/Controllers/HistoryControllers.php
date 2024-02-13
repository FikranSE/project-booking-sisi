<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\bokruanganModel;
use App\Models\bokdriverModel;

class HistoryControllers extends BaseController
{
    public function index()
    {
        $bokruanganModel = new bokruanganModel();
        $data['bookRoom'] =  $bokruanganModel->findAll();

        $bokDriverModel = new bokdriverModel();
        $data['bookdriver'] =  $bokDriverModel->findAll();

        $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
        return view('admin/History', ['rekapData' => $mergedData]);
    }
    
    public function detail_monruangan()
    {
        // $bokruanganModel = new bokruanganModel();
        // $data['bookRoom'] =  $bokruanganModel->findAll();

        // $mergedData = array_merge($data['bookRoom'], $data['bookRoom']);
        return view('admin/detail_monruangan');
    }

    public function mondriver()
    {
        
        $data['active_tab'] = 'dashboard_admin';
        return view('admin/BookingRequest', $data);
    }

    public function detail_mondriver()
    {

        // $bokDriverModel = new bokdriverModel();
        // $data['bookdriver'] =  $bokDriverModel->findAll();

        // $mergedData = array_merge($data['bookdriver'], $data['bookdriver']);
        return view('admin/detail_mondriver');
    }

    public function detail_mondriver()
    {

        // $bokDriverModel = new bokdriverModel();
        // $data['bookdriver'] =  $bokDriverModel->findAll();

        // $mergedData = array_merge($data['bookdriver'], $data['bookdriver']);
        return view('admin/detail_mondriver');
    }

    public function dashboard()
    {
        $data['active_tab'] = 'dashboard_admin';

        return view('admin/dashboard_admin', $data);
    }
}
