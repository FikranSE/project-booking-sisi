<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBookDriver extends Model
{
    protected $table            = 'booking_driver';
    protected $primaryKey = 'id_booking_driver';

    protected $allowedFields = ['pic', 'section', 'agenda', 'tanggal', 'jam_mulai', 'jam_selesai','destinasi', 'keterangan', 'status', 'username', 'id_driver'];

	public function getAccBooking(){
        return $this->select('booking_driver.*, users.nama')
                    ->join('users', 'users.username = booking_driver.username')
                    ->where('booking_driver.status', 'setuju') // Corrected table name
                    ->findAll();
    }

    public function getBookingByUser($username) {
        $builder = $this->db->table('booking_driver');
        $builder->select('booking_driver.*, driver.nama_driver, users.nama');
        $builder->join('driver', 'driver.id_driver = booking_driver.id_driver', 'left');
        $builder->join('users', 'users.username = booking_driver.username', 'left');
        $builder->where('booking_driver.username', $username); 
        $query = $builder->get();
        return $query->getResultArray(); 
    }

    // public function getBookingsByDate($date) {
    //     return $this->where('tanggal', $date)
    //                 ->findAll();
    // }

    
}

