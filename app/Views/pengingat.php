<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengingat</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
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
          <span>Pengingat</span>
          <form> 
          </form>
          <div class="chat">
          <i class="bi bi-bell"></i>
          <i class="bi bi-gear-fill"></i>
          </div>
      </div>
      <br>
    <div class="content">
        
    </div>
  </div>


<script src="assets/js/dashboard.js"></script>
</body>
</html>