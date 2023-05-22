<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenjadwalan extends Model
{
    protected $table = 'tb_penjadwalan';
    protected $primaryKey = 'No';
    protected $allowedFields = ['No','gambar','Nama_Event', 'Tanggal', 'Jam', 'Tempat'];

    public function getPenjadwalan()
    {
        return $this->findAll();
    }
}
