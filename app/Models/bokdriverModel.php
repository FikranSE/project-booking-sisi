<?php

namespace App\Models;

use CodeIgniter\Model;

class bokdriverModel extends Model
{
    protected $table            = 'booking_driver';
    protected $primaryKey = 'id_booking_driver';
    protected $allowedFields = ['pic', 'section', 'agenda', 'tanggal', 'jam_mulai', 'jam_selesai', 'destinasi', 'keterangan', 'status', 'username', 'id_driver'];

    protected $foreignKeys = [
        'fk_username' => [
            'table' => 'users',
            'field' => 'username',
            'foreignKey' => 'username',
            'references' => 'username',
            'update' => 'CASCADE',
            'delete' => 'CASCADE'
        ],
        'fk_id_driver' => [
            'table' => 'driver',
            'field' => 'id_driver',
            'foreignKey' => 'id_driver',
            'references' => 'id_driver',
            'update' => 'CASCADE',
            'delete' => 'CASCADE'
        ]
    ];
    
    public function getPendingBookings()
    {
        return $this->select('booking_driver.*, users.nama')
            ->join('users', 'users.username = booking_driver.username')
            ->where('booking_driver.status', 'pending')
            ->findAll();
    }  

}
