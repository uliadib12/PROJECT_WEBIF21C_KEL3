<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSertifikat extends Model
{
    protected $table = 'tbl_sertifikat';
    protected $primaryKey = 'Id_Sertifikat';
    protected $allowedFields = ['No','Id_Sertifikat', 'Nama_Pemilik', 'Nomor_Sertifikat', 'Tanggal_Terbit', 'Deskripsi', 'Institusi_Penerbit'];

    

    
    public function getDataSertifikat()
    {
        return $this->findAll();
    }

    

}
