<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DriverModel;

class Driver extends BaseController
{
    public function index()
    {
        $drivermodel = new DriverModel();
        $data['driver'] =  $drivermodel->findAll();

        return view('admin/Driver', $data);
    }

    public function tambah_driver()
    {
        return view('admin/tambah_driver');
    }

    public function simpan_driver()
    {
        // Validasi formulir
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'telp' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Formulir tidak valid, tampilkan pesan kesalahan
            return redirect()->to(site_url('admin/tambah_driver'))->withInput()->with('validation', $validation);
        }

        $driverModel = new DriverModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'telp' => $this->request->getPost('telp'),
        ];

        $driverModel->insert($data);

        return redirect()->to(site_url('admin/Driver'));
    }

    public function editDriver($driverId)
    {
        $drivermodel = new DriverModel();
        $data['driver'] = $drivermodel->find($driverId);

        if (empty($data['driver'])) {
            // Driver tidak ditemukan, redirect atau tampilkan pesan kesalahan
            return redirect()->to(site_url('admin/Driver'))->with('error', 'Driver tidak ditemukan');
        }

        return view('admin/edit_driver', $data);
    }



    public function updateDriver($driverId)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'telp' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Formulir tidak valid, tampilkan pesan kesalahan
            return redirect()->to("admin/edit_driver/$driverId")->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang di-post dari form edit
        $dataToUpdate = [
            'nama' => $this->request->getPost('nama'),
            'telp' => $this->request->getPost('telp'),
        ];

        $driverModel = new DriverModel();
        $driverModel->update($driverId, $dataToUpdate);

        return redirect()->to(site_url('admin/Driver'))->with('success', 'Data driver berhasil diubah');
    }

    public function deleteDriver($driverId)
    {
        $driverModel = new DriverModel();
        $driver = $driverModel->find($driverId);

        if (empty($driver)) {
            return redirect()->to(site_url('admin/Driver'))->with('error', 'Driver tidak ditemukan');
        }

        $driverModel->delete($driverId);

        return redirect()->to(site_url('admin/Driver'))->with('success', 'Data driver berhasil dihapus');
    }
}
