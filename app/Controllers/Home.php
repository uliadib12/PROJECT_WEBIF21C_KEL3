<?php

namespace App\Controllers;
use App\Models\ModelLogin;
use App\Models\ModelPenjadwalan;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }


    public function dashboard()
    {
        $model = new ModelPenjadwalan();
        $data['penjadwalan'] = $model->getPenjadwalan();
        return view('dashboard',$data);
    }

    public function penjadwalan()
    {
        $model = new ModelPenjadwalan();
        $data['penjadwalan'] = $model->getPenjadwalan();

        return view('penjadwalan', $data);
    }
    
    public function laporan()
    {
        return view('laporan');
    }
    public function pengingat()
    {
        return view('pengingat');
        
    }
    public function data_mitra()
    {
        return view('data_mitra');
    }
    public function sertifikat()
    {
        return view('sertifikat');
    }
    public function duser()
    {
        return view('dashboard-user');
    }
    public function portfolio()
    {
        return view('portfolio-details');
    }
    public function innerpage()
    {
        return view('inner-page');
    }

    public function login()
    {
        $username=$this->request->getPost("username");
        $password=$this->request->getPost("password");

        $model = new ModelLogin();
        $user=$model->where("username",$username)->first();
        $pass=$model->where("password",$password)->first();
        if($user && $pass ){
            $_SESSION['user']=$user;
            session()->remove("error");
            return redirect()->to('dashboard');
        }else{
            session()->setFlashdata('error','Username atau Password Salah');
            return redirect()->to('/');
        }
        
    }


    public function tambahData(){
        $model = new ModelPenjadwalan();
        $lastNo = $model->selectMax('No')->get()->getRow()->No;

        // Menambahkan 1 ke nomor data terakhir
        $newNo = $lastNo + 1;
        // Mengambil data dari form
        $gambar = $this->request->getFile('gambar');
        $namaEvent = $this->request->getPost('nama_event');
        $tanggal = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');
        $tempat = $this->request->getPost('tempat');
        
        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $newName);
    
            // Simpan nama file yang baru ke dalam kolom gambar di tabel database
            $data = [
                'No' => $newNo,
                'gambar' => $newName,
                'Nama_Event' => $namaEvent,
                'Tanggal' => $tanggal,
                'Jam' => $jam,
                'Tempat' => $tempat
            ];
    
            // Memasukkan data ke dalam model
            $model->insert($data);
    
            // Redirect atau lakukan operasi lain setelah penyimpanan berhasil
            // return redirect()->to('/penjadwalan');
        } else {
            // Jika file gambar tidak valid
            return redirect()->back()->withInput()->with('error', 'Gambar tidak valid');
        }
    }

    public function updateData()
{
    $data = $this->request->getPost(); // Mendapatkan semua data dari AJAX

    // Dapatkan nomor (No) dari data
    $no = $data['no'];

    // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
    $model = new ModelPenjadwalan();
    $existingData = $model->where('No', $no)->first();

    if ($existingData) {
        // Update nilai-nilai yang diubah dari data ke existingData
        $existingData['Nama_Event'] = $data['nama_event'];
        $existingData['Tanggal'] = $data['tanggal'];
        $existingData['Jam'] = $data['jam'];
        $existingData['Tempat'] = $data['tempat'];

        // Periksa apakah ada file gambar yang diunggah
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $newName);

            // Simpan nama file yang baru ke dalam kolom gambar di tabel database
            $existingData['gambar'] = $newName;
        }

        // Simpan perubahan ke database
        $model->update($no, $existingData, 'No');

        // Response JSON sukses
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil diupdate',
        ]);
    } else {
        // Response JSON error jika data dengan nomor (No) yang diberikan tidak ditemukan
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Data tidak ditemukan',
        ]);
    }
}

public function hapusData()
{
    $no = $this->request->getPost('no');
    echo($no);
    // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
    $model = new ModelPenjadwalan();
    $existingData = $model->where('No', $no)->first();

    if ($existingData) {
        // Hapus data dari database
        $model->delete($no);

        // Response JSON sukses
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    } else {
        // Response JSON error jika data dengan nomor (No) yang diberikan tidak ditemukan
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Data tidak ditemukan',
        ]);
    }
}

public function search()
{
    $request = service('request');
    $keyword = $request->getPost('keyword');

    $model = new ModelPenjadwalan();
    $data['penjadwalan'] = $model->like('No', $keyword)
        ->orLike('Nama_Event', $keyword)
        ->orLike('Tanggal', $keyword)
        ->orLike('Jam', $keyword)
        ->orLike('Tempat', $keyword)
        ->findAll();

    return $this->response->setJSON($data['penjadwalan']);
}


}