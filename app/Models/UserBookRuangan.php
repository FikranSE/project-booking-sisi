<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBookRuangan extends Model
{
    protected $table      = 'booking_ruangan';
    protected $primaryKey = 'id_booking_ruangan';

    protected $allowedFields = ['pic', 'section', 'agenda', 'tanggal', 'jam_mulai', 'jam_selesai', 'keterangan', 'status', 'username', 'id_ruangan'];

	public function getAccBooking($perPage = 10){
        return $this->select('booking_ruangan.*, users.nama, ruangan.nama_ruangan')
                ->join('users', 'users.username = booking_ruangan.username')
                ->join('ruangan', 'ruangan.id_ruangan = booking_ruangan.id_ruangan')
                ->where('booking_ruangan.status', 'setuju')
                ->paginate($perPage);
    }
    // public function getHistory($username){
    //     return $this->select('booking_ruangan.*, users.nama')
    //                 ->join('users', 'users.username = booking_ruangan.username')
    //                 ->where('booking_ruangan.username', $username)
    //                 ->findAll();
    // }

    public function getBookingByUser($username) {
        $builder = $this->db->table('booking_ruangan');
        $builder->select('booking_ruangan.*, ruangan.nama_ruangan, users.nama');
        $builder->join('ruangan', 'ruangan.id_ruangan = booking_ruangan.id_ruangan', 'left');
        $builder->join('users', 'users.username = booking_ruangan.username', 'left');
    
        // Filter the results by the username to get bookings made by this user.
        $builder->where('booking_ruangan.username', $username);
    
        // Execute the query and return the result.
        $query = $builder->get();
        return $query->getResultArray();
    }

    
    
    
    


                    
}

