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
}
