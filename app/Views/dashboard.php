<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        <span>Dashboard</span>
        <form>
        </form>
        <div class="chat">
          <i class="bi bi-bell"></i>
          <div class="dropdown">
            <i class="bi bi-gear-fill" onclick="toggleDropdown()"></i>
            <button class="login_user" onclick="pindahdanlogout()">Login User</button>
            <div class="dropdown-content" id="gearDropdown">
              <!-- Konten dropdown menu -->
              <a href="profile"><i class="bi bi-person-circle"></i>Profile</a>

              <a href="#" onclick="logoutadmin()"><i class="bi bi-box-arrow-right"></i></i>Logout</a>
            </div>
          </div>
        </div>

      </div>
      <div class="isi_content">
        <h1 style="text-align: center">Event Terbaru</h1>
      </div>

      <div class="case-card-event">
        <?php foreach ($penjadwalan as $dashboard): ?>
          <table class="card-event">
            <tr>
              <td>
                <img src="<?= base_url('uploads/' . $dashboard['gambar']) ?>" class="gambar-event" alt="">
              </td>
              <td class="deskripsi-event">
                <span><b>
                    <?= $dashboard['Nama_Event']; ?>
                  </b></span><br>
                <span>Tanggal :
                  <?= $dashboard['Tanggal']; ?>
                </span><br>
                <span>Jam :
                  <?= $dashboard['Jam']; ?>
                </span><br>
                <span>Tempat :
                  <?= $dashboard['Tempat']; ?>
                </span><br>
                <span>Link Daftar :
                  <?= $dashboard['Link_Daftar']; ?>
                </span><br>
              </td>
            </tr>
            <tr>
              <td>
               
            </tr>
          </table>
        <?php endforeach; ?>

      </div>
      <i class="bi bi-arrow-up-circle-fill" onclick="topFunction()" id="scrollBtn"></i>


      <script src="assets/js/dashboard.js"></script>
</body>

</html>