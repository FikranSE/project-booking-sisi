<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\bokruanganModel;
use App\Models\RuanganModel;
use CodeIgniter\HTTP\Response;

class BokRoomController extends BaseController
{
    protected $ruanganModel;
    protected $bookingRuanganModel;

    public function __construct()
    {
        $this->ruanganModel = new ruanganModel;
        $this->bookingRuanganModel = new bokruanganModel;
    }

    public function booking_room()
    {
        $data['bookingRuangan'] = $this->bookingRuanganModel->getPendingBookings();
        return view("admin/BookRoom", $data);
    }

    public function request_detail($id)
    {
        $data['room'] = $this->ruanganModel->findAll();
        $data['bookingRuangan'] = $this->bookingRuanganModel->find($id);

        return view("admin/detail_booking_room", $data);
    }

    public function proses($id)
    {
        $postData = $this->request->getPost();

        // Cek apakah tombol "Tolak" diklik
        if (isset($postData['reject'])) {
            $this->bookingRuanganModel->update($id, ['status' => 'tolak']);
        } elseif (isset($postData['approve'])) {
            if (empty($postData['nama'])) {
                return redirect()->to("admin/detail_booking_room/{$id}")->with('error', 'Pilih ruangan terlebih dahulu.');
            }

            $ruanganId = $postData['nama'];
            $this->bookingRuanganModel->update($id, [
                'status' => 'setuju',
                'id_ruangan' => $ruanganId,
            ]);
        } else {
            return redirect()->to("admin/detail_booking_room/{$id}");
        }

        return redirect()->to("admin/BookRoom");
    }

    public function delete_booking($id)
    {
        $this->bookingRuanganModel->delete($id);

        return redirect()->to('admin/BookRoom')->with('success', 'Data booking ruangan berhasil dihapus.');
    }
}
