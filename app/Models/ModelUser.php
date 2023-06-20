<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table      = 'login_user';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password'];

    public function getUser(){
        return $this->findAll();
    }
}
