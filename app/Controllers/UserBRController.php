<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserBookRuangan;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;


class UserBRController extends BaseController
{   
    public function showBookings()
    {
        $model = new UserBookRuangan();
    
        // Tentukan jumlah data per halaman
        $perPage = 10; // Atau jumlah lain yang Anda inginkan
        
        // Menggunakan method baru untuk mendapatkan data dengan pagination
        $data['bookings'] = $model->getAccBooking($perPage);
        
        // Dapatkan pager dari model untuk digunakan di view
        $data['pager'] = $model->pager;
        
        return view('user/dashboard', $data); 
    }
    

    
    public function bookRoom()
    {
        $session = session();
        $username = $session->get('username');
        
        $UserModel = new UserModel();
        $user = $UserModel->where('username', $username)->first();
        $fullName = $user['nama']; // Anggap 'full_name' adalah kolom yang menyimpan nama lengkap pengguna

        $model = new UserBookRuangan();
        
        $data = [
            'pic' => $fullName,
            'section' => $this->request->getVar('section'),
            'agenda' => $this->request->getVar('agenda'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam_mulai' => $this->request->getVar('jam_mulai'),
            'jam_selesai' => $this->request->getVar('jam_selesai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => 'pending', // asumsi status awal adalah pending
            'username' => $username,
            'id_ruangan' => $this->request->getVar('id_ruangan'),
        ];

        $model->save($data);

        return redirect()->to('user/dashboard');
    }

    
    // public function booking_ruangan()
    // {
    //     return view('user/dashboard');
    // }

    

}
