<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RuanganModel;

class RuanganControllers extends BaseController
{

    public function booking_ruangan()
    {
        return view('user/dashboard');
    }

    public function index()
    {
        $ruanganmodel = new RuanganModel();
        $data['room'] =  $ruanganmodel->findAll();

        return view('admin/ruangan', $data);
    }

    public function tambah_ruangan()
    {
        return view('admin/tambah_ruangan');
    }

    public function simpan_ruangan()
    {
        $ruanganmodel = new RuanganModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'fasilitas' => $this->request->getPost('fasilitas'),
        ];

        $ruanganmodel->insert($data);

        return redirect()->to(site_url('admin/ruangan'));
    }


    public function editRuangan($ruanganId)
    {
        $ruanganmodel = new RuanganModel();
        $data['room'] =  $ruanganmodel->find($ruanganId);

        if (empty($data['room'])) {
            return redirect()->to(site_url('admin/ruangan'))->with('error', 'Ruangan tidak ditemukan');
        }

        return view('admin/edit_ruangan', $data);
    }

    public function updateRuangan($ruanganId)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'kapasitas' => 'required',
            'fasilitas' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to("admin/edit_Ruangan/$ruanganId")->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang di-post dari form edit
        $dataToUpdate = [
            'nama' => $this->request->getPost('nama'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'fasilitas' => $this->request->getPost('fasilitas'),
        ];

        $ruanganmodel = new RuanganModel();
        $ruanganmodel->update($ruanganId, $dataToUpdate);

        return redirect()->to(site_url('admin/ruangan'))->with('success', 'Data Ruangan berhasil diubah');
    }

    public function deleteRuangan($ruanganId)
    {
        $ruanganmodel = new RuanganModel();
        $Ruangan =  $ruanganmodel->find($ruanganId);

        if (empty($Ruangan)) {
            return redirect()->to(site_url('admin/ruangan'))->with('error', 'Ruangan tidak ditemukan');
        }

        $ruanganmodel->delete($ruanganId);

        return redirect()->to(site_url('admin/ruangan'))->with('success', 'Data Ruangan berhasil dihapus');
    }

    
}
