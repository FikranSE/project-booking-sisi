<?php

namespace App\Models;

use CodeIgniter\Model;

class bokruanganModel extends Model
{
    protected $table            = 'booking_ruangan';
    protected $primaryKey = 'id_booking_ruangan';
    protected $allowedFields = ['pic', 'section', 'agenda', 'tanggal', 'jam_mulai', 'jam_selesai', 'keterangan', 'status', 'username', 'id_ruangan'];

    protected $foreignKeys = [
        'fk_username' => [
            'table' => 'users',
            'field' => 'username',
            'foreignKey' => 'username',
            'references' => 'username',
            'update' => 'CASCADE',
            'delete' => 'CASCADE'
        ],
        'fk_id_ruangan' => [
            'table' => 'ruangan',
            'field' => 'id_ruangan',
            'foreignKey' => 'id_ruangan',
            'references' => 'id_ruangan',
            'update' => 'CASCADE',
            'delete' => 'CASCADE'
        ]
    ];

    public function getPendingBookings()
    {
        return $this->select('booking_ruangan.*, users.nama')
            ->join('users', 'users.username = booking_ruangan.username')
            ->where('booking_ruangan.status', 'pending')
            ->findAll();
    }
}
