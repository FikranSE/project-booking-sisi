<?php

namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model
{
    protected $table            = 'driver';
    protected $primaryKey = 'id_driver';
    protected $allowedFields = ['nama_driver', 'telp'];

    public function search($keyword)
    {
        $this->groupStart()
            ->like('nama_driver', $keyword)
            ->orLike('telp', $keyword)
            ->groupEnd();

        return $this->get()->getResultArray();
    }
}
