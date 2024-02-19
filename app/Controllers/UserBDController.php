<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserBookDriver;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;



class UserBDController extends BaseController
{   
    public function showBookings()
    {
        $model = new UserBookDriver();
        $data['bookings'] = $model->getAccBooking(); // Mengambil data bookings
         return view('user/bookingdriver', $data); 
    }
    
    public function bookDriver()
    {
        $session = session();
        $username = $session->get('username');
        
        $UserModel = new UserModel();
        $user = $UserModel->where('username', $username)->first();
        $fullName = $user['nama']; // Anggap 'full_name' adalah kolom yang menyimpan nama lengkap pengguna

        $model = new UserBookDriver();
        
        $data = [
            'pic' => $fullName,
            'section' => $this->request->getVar('section'),
            'agenda' => $this->request->getVar('agenda'),
            'destinasi' => $this->request->getVar('destinasi'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam_mulai' => $this->request->getVar('jam_mulai'),
            'jam_selesai' => $this->request->getVar('jam_selesai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => 'pending', // asumsi status awal adalah pending
            'username' => $username,
            'id_driver' => $this->request->getVar('id_driver'),
        ];

        $model->save($data);

        return redirect()->to('user/bookingdriver');
       
    }


    public function booking_driver()
    {
        return view('user/bookingdriver');
    }


}
