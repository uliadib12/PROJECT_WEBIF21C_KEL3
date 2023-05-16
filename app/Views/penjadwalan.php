<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/penjadwalan.css">


</style>
</head>
<body>
<div class="container">
    <div class="navbar">
        <i class="bi bi-x-lg close-toggle" onclick="togglekecil()"></i>

        <div class="avatar-navbar">
          <img src="assets/images/logo.png" alt="Foto Profil" id="gambar">
        </div>
        <div class="items">
        <div class="nav-item"id="Dashboard_link"><i class="bi bi-speedometer2"></i><span>Dashboard</span></div>
        <div class="nav-item"id="Penjadwalan_link"><i class="bi bi-calendar-check"></i><span>Penjadwalan</span></div>
        <div class="nav-item"id="Laporan_link"><i class="bi bi-journal-bookmark"></i><span>Laporan</span></div>
        <div class="nav-item"id="Pengingat_link"><i class="bi bi-alarm"></i><span>Pengingat</span></div>
        <div class="nav-item"id="Data_Mitra_link"><i class="bi bi-people-fill"></i><span>Data Mitra</span></div>
        <div class="nav-item"id="Sertifikat_link"><i class="bi bi-award"></i><span>Sertifikat</span></div>

        </div>
    </div>
    <div class="container-content">
        
    <div class="navtop">
          <div class="toggle" onclick="Side()">
            <i class="bi bi-list"></i>
          </div>
          <span>Penjadwalan</span>
          <form> 
          </form>
          <div class="chat">
          <i class="bi bi-bell"></i>
          <i class="bi bi-gear-fill"></i>
          </div>
      </div>

      <table>
        <thead>
          <tr>
            <th class="option" colspan="20">
            <i class="bi bi-clipboard-minus-fill"></i>
            <i class="bi bi-plus-square" onclick="TambahData()"></i>
            <i class="bi bi-trash"></i>              
            </th>
          </tr>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Event</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tempat</th>
        </thead>
        <tbody>
        <?php if ($penjadwalan) : ?>
          <?php foreach ($penjadwalan as $jadwal) : ?>
              <tr>
                  <td><?= $jadwal['No'] ?></td>
                  <td style="overflow: visible">
                      <img src="<?= base_url('uploads/' . $jadwal['gambar']) ?>" alt="Gambar" style="max-width: 50px; height: auto;">
                  </td>
                  <td><?= $jadwal['Nama_Event'] ?></td>
                  <td><?= $jadwal['Tanggal'] ?></td>
                  <td><?= $jadwal['Jam'] ?></td>
                  <td><?= $jadwal['Tempat'] ?></td>
              </tr>
          <?php endforeach; ?>
      <?php endif; ?>

        </tbody>

        <tfoot>
            <form action="Home/tambahData" method="POST" enctype="multipart/form-data" class="form-isi-data">
            <tr>
              <td></td>
              <td><input type="file" class="input-data" name="gambar"></td>
              <td><input type="text" class="input-data" placeholder="Nama Event" name="nama_event"></td>
              <td><input type="date" class="input-data" placeholder="Tanggal" name="tanggal"></td>
              <td><input type="time" class="input-data" placeholder="Jam" name="jam"></td>
              <td><input type="text" class="input-data" placeholder="Tempat" name="tempat"></td>
            </tr>
            </form>
        </tfoot>

      </table>
            
    
  </div>


<script src="assets/js/dashboard.js"></script>
</body>
</html>