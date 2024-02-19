<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RuanganModel;

class RuanganControllers extends BaseController
{


    public function index()
    {
        $ruanganmodel = new RuanganModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $data['room'] = $ruanganmodel->search($keyword);
        } else {
            $data['room'] = $ruanganmodel->findAll();
        }
        $data['keyword'] = $keyword;

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

    public function list_ruangan()
    {
        $roomModel = new RuanganModel();

        $data['room'] = $roomModel->findAll();

        // Cek apakah form pencarian dikirimkan
        $searchKeyword = $this->request->getPost('search');

        if (!empty($searchKeyword)) {
            $data['room'] = $this->filterRooms($data['room'], $searchKeyword);
        }

        return view('admin/list_ruangan', $data);
    }

    private function filterRooms($rooms, $searchKeyword)
    {
        // Filter data berdasarkan kata kunci pencarian
        return array_filter($rooms, function ($R) use ($searchKeyword) {
            return stripos($R['nama'], $searchKeyword) !== false ||
                stripos($R['kapasitas'], $searchKeyword) !== false ||
                stripos($R['fasilitas'], $searchKeyword) !== false;
        });
    }


    // public function booking_ruangan()
    // {
    //     return view('user/dashboard');
    // }
}
