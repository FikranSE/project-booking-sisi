<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DriverModel;
use App\Models\bokdriverModel;

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
        $driverModel = new DriverModel();
        $bookingDriverModel = new bokdriverModel();

        $data['bookingDrivers'] = $bookingDriverModel->find($bookingId);


        $data['drivers'] = $driverModel->findAll();

        return view('admin/detail_booking_driver', $data);
    }

    public function process_approval($bookingId)
    {

        $postData = $this->request->getPost();

        // Cek apakah tombol "Tolak" diklik
        if (isset($postData['reject'])) {
            // Proses penolakan dan update status di database
            $this->bookingDriverModel->update($bookingId, ['status' => 'tolak']);
        } elseif (isset($postData['approve'])) {
            // Validasi apakah driver telah dipilih
            if (empty($postData['nama'])) {
                // Handle jika driver tidak dipilih
                return redirect()->to("admin/detail_booking_driver/" . implode("/", (array) $bookingId))->with('error', 'Pilih driver terlebih dahulu.');
            }

            $driverId = $postData['nama'];
            $this->bookingDriverModel->update($bookingId, [
                'status' => 'setuju',
                'id_driver' => $driverId,
            ]);
        } else {
            return redirect()->to('admin/detail_booking_driver/{$bookingId}');
        }
        return redirect()->to("admin/booking_driver");
    }

    public function delete_booking_driver($bookingId)
    {
        $this->bookingDriverModel->delete($bookingId);

        return redirect()->to('admin/booking_driver')->with('success', 'Data booking driver berhasil dihapus.');
    }
}
