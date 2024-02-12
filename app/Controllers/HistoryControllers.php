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
        $data['active_tab'] = 'dashboard_admin';

        return view('admin/dashboard_admin', $data);
    }
}
