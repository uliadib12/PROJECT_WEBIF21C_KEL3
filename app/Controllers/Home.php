<?php

namespace App\Controllers;

use App\Models\ModelLogin;
use App\Models\ModelPenjadwalan;
use App\Models\ModelUser;
use App\Models\ModelDatamitra;
use App\Models\ModelSertifikat;
use App\Models\ModelLaporan;
use App\Models\ModelSignup;





class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $username = $this->request->getPost("username");
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        $model = new ModelLogin();
        $user = $model->where("username", $username)->first();
        $email = $model->where("email", $email)->first();
        $pass = $model->where("password", $password)->first();

        if ($user && $pass && $email) {
            $session = session();
            $session->set('admin', $user);
            $session->set('email', $email);



            return redirect()->to('dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->to('/loginAdmin');
        }
    }

    public function signUp()
    {
        $model = new ModelSignup();

        // Validasi inputan dari form sign-up
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $already = $model->getUser();
        if ($already == null) {
            // Jika validasi gagal, kembali ke halaman sign-up dengan pesan error
            return redirect()->back()->withInput()->with('errors', "Akun sudah terdaftar");
        }
        // Ambil data dari form sign-up

        // Simpan data pengguna baru ke database
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
        $model->insert($data);

        // Redirect ke halaman sukses sign-up
        return redirect()->to('/dashboardUser');
    }



    public function dashboard()
    {

        $session = session();

        // Periksa apakah session 'admin' telah diatur
        if (!$session->has('admin')) {
            // Redirect ke halaman login jika session tidak diatur
            return redirect()->to('/loginAdmin');
        }

        $model = new ModelPenjadwalan();
        $data['penjadwalan'] = $model->getPenjadwalan();
        return view('dashboard', $data);


    }

    public function penjadwalan()
    {
        $model = new ModelPenjadwalan();
        $data['penjadwalan'] = $model->getPenjadwalan();

        return view('penjadwalan', $data);
    }


    public function laporan()
    {
        $modelLaporan = new ModelLaporan();
        $data['laporan'] = $modelLaporan->getLaporan();

        // Load view atau lakukan operasi lain dengan data yang didapatkan

        return view('laporan', $data);
    }

    public function profile()
    {
        return view('profile');
    }

    public function data_mitra()
    {
        $model = new ModelDatamitra();
        $data['datamitra'] = $model->getDataMitra();

        return view('data_mitra', $data);
    }

    public function sertifikat()
    {
        $model = new ModelSertifikat();
        $data['sertifikat'] = $model->getDataSertifikat();

        return view('sertifikat', $data);
    }
    public function duser()
    {
        $this->logout();
        $modelPenjadwalan = new ModelPenjadwalan();
        $data['penjadwalan'] = $modelPenjadwalan->getPenjadwalan();

        $modelLaporan = new ModelLaporan();
        $data['laporan'] = $modelLaporan->getLaporan();

        $model = new ModelDatamitra();
        $data['datamitra'] = $model->getDataMitra();

        return view('dashboard-user', $data);
    }



    public function showDetails()
    {
        $eventName = $this->request->getPost('eventName');
        $model = new ModelPenjadwalan();
        $data = $model->where('Nama_Event', $eventName)->findAll();
        return $data;
    }


    public function innerpage()
    {
        return view('inner-page');
    }



    public function logout()
    {
        // Hapus session 'admin' saat logout
        $session = session();
        $session->remove('admin');
        return redirect()->to('/');
    }
    function pindahdanlogout()
    {
        $this->logout();
        return redirect()->to('dashboard-user');



    }
    public function updateNoUrut()
    {
        $model = new ModelSertifikat();
        $data = $model->findAll();
        $noUrut = 1;

        foreach ($data as $row) {
            $model->update($row['Id_Sertifikat'], ['No' => $noUrut]);
            $noUrut++;
        }
    }
    public function updateNoPenjadwalan()
    {
        $model = new ModelPenjadwalan();
        $data = $model->findAll();
        $noUrut = 1;

        foreach ($data as $row) {
            $model->update($row['No'], ['No' => $noUrut]);
            $noUrut++;
        }
    }
    public function updateNoLaporan()
    {
        $model = new ModelLaporan();
        $data = $model->findAll();
        $noUrut = 1;

        foreach ($data as $row) {
            $model->update($row['No'], ['No' => $noUrut]);
            $noUrut++;
        }
    }
    public function updateNoMitra()
    {
        $model = new ModelDataMitra();
        $data = $model->findAll();
        $noUrut = 1;

        foreach ($data as $row) {
            $model->update($row['No'], ['No' => $noUrut]);
            $noUrut++;
        }
    }

    public function tambahData()
    {
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
        $linkdaftar = $this->request->getPost('Link_Daftar');


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
                'Tempat' => $tempat,
                'Link_Daftar' => $linkdaftar

            ];

            // Memasukkan data ke dalam model
            $model->insert($data);
            $this->updateNoPenjadwalan();
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
            $existingData['Link_Daftar'] = $data['Link_Daftar'];


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
        echo ($no);
        // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
        $model = new ModelPenjadwalan();
        $existingData = $model->where('No', $no)->first();

        if ($existingData) {
            // Hapus data dari database
            $model->delete($no);
            $this->updateNoPenjadwalan();
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
    public function login_user()
    {
        $tabelmodel = new ModelUser();

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        // Proses validasi username dan password

        // Jika username dan password valid
        $user = $tabelmodel->where("username", $username)->first();
        $pass = $tabelmodel->where("password", $password)->first();
        if ($user && $pass) {
            $_SESSION['user'] = $user;
            session()->remove("error");
            return $this->response->setJSON([
                'success' => true
            ]);
            return redirect()->to('dashboard-user');
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Username atau Password Salah'
            ]);
        }

    }

    public function tambahMitra()
    {
        $model = new ModelDataMitra();
        $lastNo = $model->selectMax('No')->get()->getRow()->No;

        // Menambahkan 1 ke nomor data terakhir
        $newNo = $lastNo + 1;
        // Mengambil data dari form
        $namaMitra = $this->request->getPost('Nama_Mitra');
        $kontak = $this->request->getPost('Kontak');
        $kategori = $this->request->getPost('Kategori_Mitra');
        $deskripsi = $this->request->getPost('Deskripsi');
        $gambar = $this->request->getFile('gambar');


        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $newName);

            // Simpan nama file yang baru ke dalam kolom gambar di tabel database
            $data = [
                'No' => $newNo,
                'Nama_Mitra' => $namaMitra,
                'Kontak' => $kontak,
                'Kategori_Mitra' => $kategori,
                'Deskripsi' => $deskripsi,
                'Dokumen_Terkait' => $newName
            ];

            // Memasukkan data ke dalam model
            $model->insert($data);
            $this->updateNoMitra();
            return redirect()->to("data_mitra");

            // Redirect atau lakukan operasi lain setelah penyimpanan berhasil
            // return redirect()->to('/penjadwalan');
        } else {
            // Jika file gambar tidak valid
            return redirect()->back()->withInput()->with('error', 'Gambar tidak valid');
        }
    }



    public function updateMitra()
    {
        $data = $this->request->getPost(); // Mendapatkan semua data dari AJAX

        // Dapatkan nomor (No) dari data
        $no = $data['no'];

        // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
        $model = new ModelDataMitra();
        $existingData = $model->where('No', $no)->first();

        if ($existingData) {
            // Update nilai-nilai yang diubah dari data ke existingData
            $existingData['Nama_Mitra'] = $data['Nama_Mitra'];
            $existingData['Kontak'] = $data['Kontak'];
            $existingData['Kategori_Mitra'] = $data['Kategori_Mitra'];
            $existingData['Deskripsi'] = $data['Deskripsi'];

            // Periksa apakah ada file gambar yang diunggah
            $gambar = $this->request->getFile('gambar');
            if ($gambar && $gambar->isValid()) {
                $newName = $gambar->getRandomName();
                $gambar->move(ROOTPATH . 'public/uploads', $newName);

                // Simpan nama file yang baru ke dalam kolom gambar di tabel database
                $existingData['Dokumen_Terkait'] = $newName;
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

    public function hapusMitra()
    {
        $no = $this->request->getPost('no');

        // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
        $model = new ModelDataMitra();
        $existingData = $model->where('No', $no)->first();

        if ($existingData) {
            // Hapus data dari database
            $model->delete($no);
            $this->updateNoMitra();


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

    public function searchMitra()
    {
        $request = service('request');
        $keywordMitra = $request->getPost('keywordMitra');

        $model = new ModelDatamitra();
        $datamitra = $model->like('No', $keywordMitra)
            ->orLike('Nama_Mitra', $keywordMitra)
            ->orLike('Kontak', $keywordMitra)
            ->orLike('Kategori_Mitra', $keywordMitra)
            ->orLike('Deskripsi', $keywordMitra)
            ->findAll();

        return $this->response->setJSON(['datamitra' => $datamitra]);
    }

    // controler sertifikat

    public function datasertifikat()
    {
        $model = new ModelSertifikat();
        $data['sertifikat'] = $model->getDataSertifikat();

        return view('home', $data);
    }

    public function tambahsertifikat()
    {
        $model = new ModelSertifikat();
        $lastNo = $model->selectMax('No')->get()->getRow()->No;

        // Menambahkan 1 ke nomor data terakhir
        $newNo = $lastNo + 1;
        // Mengambil data dari form
        $Id_Sertifikat = $this->request->getPost('Id_Sertifikat');
        $Nama_Pemilik = $this->request->getPost('Nama_Pemilik');
        $Nomor_Sertifikat = $this->request->getPost('Nomor_Sertifikat');
        $Tanggal_Terbit = $this->request->getPost('Tanggal_Terbit');
        $Deskripsi = $this->request->getPost('Deskripsi');
        $Institusi_Penerbit = $this->request->getPost('Institusi_Penerbit');




        // Simpan nama file yang baru ke dalam kolom gambar di tabel database
        $data = [
            'No' => $newNo,
            'Id_Sertifikat' => $Id_Sertifikat,
            'Nama_Pemilik' => $Nama_Pemilik,
            'Nomor_Sertifikat' => $Nomor_Sertifikat,
            'Tanggal_Terbit' => $Tanggal_Terbit,
            'Deskripsi' => $Deskripsi,
            'Institusi_Penerbit' => $Institusi_Penerbit
        ];

        // Memasukkan data ke dalam model
        $model->insert($data);
        $this->updateNoUrut();
        // Redirect atau lakukan operasi lain setelah penyimpanan berhasil

    }

    public function updatesertifikat()
    {
        $data = $this->request->getPost(); // Mendapatkan semua data dari AJAX

        // Dapatkan nomor (No) dari data
        $ID = $data['Id_Sertifikat'];

        // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
        $model = new ModelSertifikat();
        $existingData = $model->where('Id_Sertifikat', $ID)->first();

        if ($existingData) {
            // Update nilai-nilai yang diubah dari data ke existingData
            $existingData['Id_Sertifikat'] = $data['Id_Sertifikat'];
            $existingData['Nama_Pemilik'] = $data['Nama_Pemilik'];
            $existingData['Nomor_Sertifikat'] = $data['Nomor_Sertifikat'];
            $existingData['Tanggal_Terbit'] = $data['Tanggal_Terbit'];
            $existingData['Deskripsi'] = $data['Deskripsi'];
            $existingData['Institusi_Penerbit'] = $data['Institusi_Penerbit'];




            // Simpan perubahan ke database
            $model->update($ID, $existingData, 'Id_Sertifikat');

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

    public function hapusSertifikat()
    {
        $ID = $this->request->getPost('Keys');
        // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
        $model = new ModelSertifikat();
        $existingData = $model->where('Id_sertifikat', $ID)->first();

        if ($existingData) {
            // Hapus data dari database
            $model->delete($ID);
            $this->updateNoUrut();
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

    public function searchsertifikat()
    {
        $request = service('request');
        $keywordSertifikat = $request->getPost('keyword');

        $model = new ModelSertifikat();
        $data['sertifikat'] = $model->like('No', $keywordSertifikat)
            ->orLike('Id_Sertifikat', $keywordSertifikat)
            ->orLike('Nama_Pemilik', $keywordSertifikat)
            ->orLike('Nomor_Sertifikat', $keywordSertifikat)
            ->orLike('Tanggal_Terbit', $keywordSertifikat)
            ->orLike('Deskripsi', $keywordSertifikat)
            ->orLike('Institusi_Penerbit', $keywordSertifikat)
            ->findAll();

        return $this->response->setJSON($data['sertifikat']);
    }




    public function tambahLaporan()
    {
        $model = new ModelLaporan();
        $lastNo = $model->selectMax('No')->get()->getRow()->No;

        // Menambahkan 1 ke nomor data terakhir
        $newNo = $lastNo + 1;
        // Mengambil data dari form
        $gambar = $this->request->getFile('gambar');
        $judul = $this->request->getPost('Judul');
        $keterangan = $this->request->getPost('Keterangan');



        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $newName);

            // Simpan nama file yang baru ke dalam kolom gambar di tabel database
            $data = [
                'No' => $newNo,
                'gambar' => $newName,
                'Judul' => $judul,
                'Keterangan' => $keterangan,

            ];

            // Memasukkan data ke dalam model
            $model->insert($data);
            $this->updateNoLaporan();
            // Redirect atau lakukan operasi lain setelah penyimpanan berhasil
            // return redirect()->to('/penjadwalan');
        } else {
            // Jika file gambar tidak valid
            return redirect()->to("laporan")->withInput()->with('error', 'Gambar tidak valid');
        }
    }

    public function updateLaporan()
    {
        $data = $this->request->getPost(); // Mendapatkan semua data dari AJAX

        // Dapatkan nomor (No) dari data
        $no = $data['no'];

        // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
        $model = new ModelLaporan();
        $existingData = $model->where('No', $no)->first();

        if ($existingData) {
            // Update nilai-nilai yang diubah dari data ke existingData
            $existingData['Judul'] = $data['Judul'];
            $existingData['Keterangan'] = $data['Keterangan'];

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

    public function hapusLaporan()
    {
        $no = $this->request->getPost('no');
        echo ($no);
        // Query dan dapatkan data yang sesuai dengan nomor (No) dari database
        $model = new ModelLaporan();
        $existingData = $model->where('No', $no)->first();

        if ($existingData) {
            // Hapus data dari database
            $model->delete($no);
            $this->updateNoPenjadwalan();
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

    public function searchlaporan()
    {
        $request = service('request');
        $keywordLaporan = $request->getPost('keywordLaporan');

        $model = new ModelLaporan();
        $data['laporan'] = $model->like('No', $keywordLaporan)
            ->orLike('Judul', $keywordLaporan)
            ->orLike('Keterangan', $keywordLaporan)
            ->findAll();

        return $this->response->setJSON($data['laporan']);
    }

}