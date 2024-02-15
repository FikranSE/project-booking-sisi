<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'username';

    protected $allowedFields = ['username', 'email', 'nama', 'telp', 'password', 'role'];
    
    public function getUserByName($username)
    {
        return $this->where('username', $username)->first();
    }

    public function search($keyword)
    {
        $this->groupStart()
            ->like('username', $keyword)
            ->orLike('email', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('telp', $keyword)
            ->groupEnd();

        return $this->get()->getResultArray();
    }
}
