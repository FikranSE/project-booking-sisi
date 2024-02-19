<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table            = 'ruangan';
    protected $primaryKey = 'id_ruangan';
    protected $allowedFields = ['nama_ruangan', 'kapasitas', 'fasilitas'];

    public function search($keyword)
    {
        $this->groupStart()
            ->like('nama_ruangan', $keyword)
            ->orLike('kapasitas', $keyword)
            ->orLike('fasilitas', $keyword)
            ->groupEnd();

        return $this->get()->getResultArray();
    }
}
