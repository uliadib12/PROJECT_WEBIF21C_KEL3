<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSignup extends Model
{
    protected $table      = 'login_user';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'email', 'password'];

    public function getUser(){
        return $this->findAll();
    }
}
