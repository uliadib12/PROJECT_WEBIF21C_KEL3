<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDatamitra extends Model
{
    protected $table = 'tb_mitra';
    protected $primaryKey = 'No';
    protected $allowedFields = ['No', 'Nama_Mitra', 'Kontak', 'Kategori_Mitra', 'Deskripsi', 'Dokumen_Terkait'];

    public function getDataMitra()
    {
        return $this->findAll();
    }
}

