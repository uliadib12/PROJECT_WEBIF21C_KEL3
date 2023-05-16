<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table      = 'tb_login';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password'];

    public function getUser(){
        return $this->findAll();
    }
}
