<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/penjadwalan.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="navbar">
      <i class="bi bi-x-lg close-toggle" onclick="togglekecil()"></i>
      <div class="avatar-navbar">
        <img src="assets/images/logo.png" alt="Foto Profil" id="gambar">
      </div>
      <div class="items">
        <div class="nav-item" id="Dashboard_link"><i class="bi bi-speedometer2"></i><span>Dashboard</span></div>
        <div class="nav-item" id="Penjadwalan_link"><i class="bi bi-calendar-check"></i><span>Penjadwalan</span></div>
        <div class="nav-item" id="Laporan_link"><i class="bi bi-journal-bookmark"></i><span>Laporan</span></div>
        <div class="nav-item" id="Data_Mitra_link"><i class="bi bi-people-fill"></i><span>Data Mitra</span></div>
        <div class="nav-item" id="Sertifikat_link"><i class="bi bi-award"></i><span>Sertifikat</span></div>
      </div>
    </div>
    <div class="container-content">
      <div class="navtop">
        <div class="toggle" onclick="Side()">
          <i class="bi bi-list"></i>
        </div>
        <span>Data Mitra</span>
        <div class="chat">
          <input type="text" placeholder="Search.." id="pencarian-mitra">
          <i class="bi bi-bell"></i>
          <div class="dropdown show">
            <i class="bi bi-gear-fill" onclick="toggleDropdown()"></i>
            <div class="dropdown-content" id="gearDropdown">
              <a href="profile"><i class="bi bi-person-circle"></i>Profile</a>
              <a href="#" onclick="logoutadmin()"><i class="bi bi-box-arrow-right"></i>Logout</a>
            </div>
          </div>
        </div>
        <div class="topnav"></div>
      </div>
      <table id="tableBody">
        <thead>
          <tr>
            <th class="option" colspan="20">
              <i class="bi bi-plus-square" onclick="openForm()"></i>
            </th>
          </tr>
          <tr>
            <th>No</th>
            <th>Nama Mitra</th>
            <th>Kontak</th>
            <th>Kategori Mitra</th>
            <th>Deskripsi</th>
            <th>Dokumen Terkait</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($datamitra) : ?>
            <?php foreach ($datamitra as $mitra) : ?>
              <tr class="pilih-data">
                <td class="No_Urut"><?= $mitra['No'] ?></td>
                <td><?= $mitra['Nama_Mitra'] ?></td>
                <td><?= $mitra['Kontak'] ?></td>
                <td><?= $mitra['Kategori_Mitra'] ?></td>
                <td><?= $mitra['Deskripsi'] ?></td>
                <td style="overflow: visible">
                  <img src="<?= base_url('uploads/' . $mitra['Dokumen_Terkait']) ?>" alt="Gambar" style="max-width: 50px; height: auto;">
                </td>
                <td>
                  <i class="bi bi-trash3" onclick="TombolHapus(event)"></i>
                  <i class="bi bi-pencil-square"></i>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
      <div id="myModal" class="modal">
        <div class="modal-content">
          <form action="Home/" class="form-input-data" method="POST" enctype="multipart/form-data">
            <table>
              <tr>
                <td class="kolompopup">
                  <label for="">Nama_Mitra</label><br>
                  <label for="">Kontak</label><br>
                  <label for="">Kategori_Mitra</label><br>
                  <label for="">Deskripsi</label><br>
                  <label for="">Dokumen_Terkait</label><br>
                </td>
                <td class="kolompopup">
                  <input type="text" class="input-data" placeholder="Nama Mitra" name="Nama_Mitra"><br>
                  <input type="text" class="input-data" placeholder="Kontak" name="Kontak"><br>
                  <input type="text" class="input-data" placeholder="Kategori Mitra" name="Kategori_Mitra"><br>
                  <input type="text" class="input-data" placeholder="Deskripsi" name="Deskripsi"><br>
                  <input type="file" class="input-data" name="gambar"><br>

                </td>
              </tr>
              <tr class="popupbawah">
                <td class="hapusboder"></td>
                <td class="hapusboder">
                  <button style="float:right" class="Tambah_Data">TAMBAH</button>
                  <button style="float:right" class="Edit_Data">EDIT</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <i class="bi bi-arrow-up-circle-fill" onclick="topFunction()" id="scrollBtn"></i>
      <div id="confirmation-popup" class="confirmation-popup">
        <span><b>Apakah Anda Ingin Menghapus Data Ini?</b></span><br>
        <button onclick="HapusData()" class="konfirmasiYes">Yes</button>
        <button onclick="CloseConfirmation()" class="konfirmasiNo">No</button>
      </div>
    </div>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/mitra.js"></script>
    <script src="assets/js/pencarianmitra.js"></script>


    
</body>
</html>
