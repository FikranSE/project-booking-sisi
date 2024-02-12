<?php

namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model
{
    protected $table            = 'driver';
    protected $primaryKey = 'id_driver';
    protected $allowedFields = ['nama', 'telp'];

   
}
