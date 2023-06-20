<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sertifikat</title>
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
        <span>Sertifikat</span>

        <div class="chat">
          <input type="text" placeholder="Search.. " id="pencarian-sertifikat">
          <i class="bi bi-bell"></i>
          <div class="dropdown show">
            <i class="bi bi-gear-fill" onclick="toggleDropdown()"></i>
            <div class="dropdown-content" id="gearDropdown">
              <!-- Konten dropdown menu -->
              <a href="profile"><i class="bi bi-person-circle"></i>Profile</a>
              <a href="#" onclick="logoutadmin()"><i class="bi bi-box-arrow-right"></i></i>Logout</a>
            </div>
          </div>
       
        </div>
        <div class="topnav">

        </div>
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
            <th>Id Sertifikat</th>
            <th>Nama Pemilik</th>
            <th>Nomor Sertifikat</th>
            <th>Tanggal Terbit</th>
            <th>Deskripsi</th>
            <th>Institusi Penerbit</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($sertifikat) : ?>
          <?php foreach ($sertifikat as $sertif) : ?> 
          <tr class="pilih-data">
            <td class="No_Urut">
              <?= $sertif['No'] ?>
            </td>
            <td class="Id_Sertif">
              <?= $sertif['Id_Sertifikat'] ?>
            </td>
            <td>
              <?= $sertif['Nama_Pemilik'] ?>
            </td>
            <td>
              <?= $sertif['Nomor_Sertifikat'] ?>
            </td>
            <td>
              <?= $sertif['Tanggal_Terbit'] ?>
            </td>
            <td>
              <?= $sertif['Deskripsi'] ?>
            </td>
            <td>
              <?= $sertif['Institusi_Penerbit'] ?>
            </td>
            <td>
              <i class="bi bi-trash3" onclick="TombolHapus(event)"></i>
              <i class="bi bi-pencil-square"></i>
              <i class="bi bi-printer"></i>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>

        </tbody>
      </table>
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <form action="Home/" class="form-input-data" method="post" enctype="multipart/form-data"
            class="form-isi-data">
              
            <table>
              <tr>
                <td class="kolompopup">
                  <label for="">Id Sertifikat</label><br>
                  <label for="">Nama Pemilik</label><br>
                  <label for="">Nomor Sertifikat</label><br>
                  <label for="">Tanggal Terbit</label><br>
                  <label for="">Deskripsi</label><br>
                  <label for="">Institusi Penerbit</label><br>

                </td>

                <td class="kolompopup">
                  <input type="text" class="input-data" placeholder="Id Sertifikat" name="Id_Sertifikat"><br>
                  <input type="text" class="input-data" placeholder="Nama pemilik" name="Nama_Pemilik"><br>
                  <input type="text" class="input-data" placeholder="Nomor Sertifikat" name="Nomor_Sertifikat"><br>
                  <input type="date" class="input-data" placeholder="Tanggal Terbit" name="Tanggal_Terbit"><br>
                  <input type="text" class="input-data" placeholder="Deskripsi" name="Deskripsi"><br>
                  <input type="text" class="input-data" placeholder="Institusi Penerbit" name="Institusi_Penerbit"><br>

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

<!-- Pop Up Hapus -->
      <div id="confirmation-popup" class="confirmation-popup">
       <span><b>Apakah Anda Ingin Menghapus Data Ini?</b></span><br>
        <button onclick="HapusData()" class="konfirmasiYes">Yes</button>
        <button onclick="CloseConfirmation()" class="konfirmasiNo">No</button>
      </div>
    </div>




    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/sertifikat.js"></script>
    <script src="assets/js/pencariansertifikat.js"></script>


</body>

</html>