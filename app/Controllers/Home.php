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
        return view('dashboard');
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
            return redirect()->to('/penjadwalan');
        } else {
            // Jika file gambar tidak valid
            return redirect()->back()->withInput()->with('error', 'Gambar tidak valid');
        }
    }


    // public function tambahData()
    // {
    //     $model = new ModelPenjadwalan();

    //     // Mengambil data dari form
    //     $gambar = $this->request->getFile('gambar');
    //     $namaEvent = $this->request->getPost('nama_event');
    //     $tanggal = $this->request->getPost('tanggal');
    //     $jam = $this->request->getPost('jam');
    //     $tempat = $this->request->getPost('tempat');
        
    //     $data = [
    //         'gambar' => $gambar,
    //         'Nama_Event' => $namaEvent,
    //         'Tanggal' => $tanggal,
    //         'Jam' => $jam,
    //         'Tempat' => $tempat
    //     ];
    //     // Memeriksa apakah file gambar diunggah
    //     echo "<pre>";
    // echo "Nilai dari \$data:";
    // print_r($data);
    // echo "</pre>";
    //     $model->insert($data);

    //     return redirect()->to('penjadwalan');

    // }


    

}