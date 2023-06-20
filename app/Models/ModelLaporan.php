<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    protected $table = 'tb_laporan';
    protected $primaryKey = 'No';
    protected $allowedFields = ['No','gambar','Judul', 'Keterangan'];

    public function getLaporan()
    {
        return $this->findAll();
    }
}
