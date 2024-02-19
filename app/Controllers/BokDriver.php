<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DriverModel;
use App\Models\bokdriverModel;
use App\Models\UserModel;

class BokDriver extends BaseController
{

    protected $driverModel;
    protected $bookingDriverModel;

    public function __construct()
    {
        $this->driverModel = new DriverModel();
        $this->bookingDriverModel = new bokdriverModel();
    }

    public function booking_driver()
    {
        $bookingDriverModel = new bokdriverModel();

        // Ambil data booking driver yang tertunda
        $data['bookingDrivers'] = $bookingDriverModel->getPendingBookings();

        // Lewatkan data ke tampilan
        return view('admin/booking_driver', $data);
    }

    public function detail_booking_driver($bookingId)
    {
        $usersModel = new UserModel();
        $driverModel = new DriverModel();
        $bookingDriverModel = new bokdriverModel();

        $bookingDriver = $bookingDriverModel->find($bookingId);
        $picUser = $usersModel->getUserByName($bookingDriver['username']);

        $data['bookingDrivers'] = $bookingDriver;
        $data['drivers'] = $driverModel->findAll();
        $data['picName'] = $picUser ? $picUser['nama'] : 'Unknown';

        return view('admin/detail_booking_driver', $data);
    }


    public function process_approval($bookingId)
    {
        $postData = $this->request->getPost();
    
        // Cek apakah tombol "Tolak" diklik
        if (isset($postData['reject'])) {
            // Proses penolakan dan update status di database
            $this->bookingDriverModel->update($bookingId, ['status' => 'tolak']);
    
            // Anda dapat menambahkan langkah-langkah lain yang diperlukan di sini
        } elseif (isset($postData['approve'])) {
            // Validasi apakah driver telah dipilih
            if (empty($postData['nama'])) {
                // Handle jika driver tidak dipilih
                return redirect()->to("admin/detail_booking_driver/{$bookingId}")->with('error', 'Pilih driver terlebih dahulu.');
            }
    
            $driverId = $postData['nama'];
            $this->bookingDriverModel->update($bookingId, [
                'status' => 'setuju',
                'id_driver' => $driverId,
            ]);
        }
    
    }        


    public function delete_booking_driver($bookingId)
    {
        $this->bookingDriverModel->delete($bookingId);

        return redirect()->to('admin/booking_driver')->with('success', 'Data booking driver berhasil dihapus.');
    }
}
