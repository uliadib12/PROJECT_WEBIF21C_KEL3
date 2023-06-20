<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="assets/css/profil.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/penjadwalan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



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
                <div class="nav-item" id="Penjadwalan_link"><i class="bi bi-calendar-check"></i><span>Penjadwalan</span>
                </div>
                <div class="nav-item" id="Laporan_link"><i class="bi bi-journal-bookmark"></i><span>Laporan</span></div>
                <div class="nav-item" id="Data_Mitra_link"><i class="bi bi-people-fill"></i><span>Data Mitra</span>
                </div>
                <div class="nav-item" id="Sertifikat_link"><i class="bi bi-award"></i><span>Sertifikat</span></div>

            </div>
        </div>
        <div class="container-content">
            <div class="navtop">
                <div class="toggle" onclick="Side()">
                    <i class="bi bi-list"></i>
                </div>
                <span>Profile</span>
                <form>
                </form>
                <div class="chat">
                    <i class="bi bi-bell"></i>
                    <div class="dropdown">
                        <i class="bi bi-gear-fill" onclick="toggleDropdown()"></i>

                        <div class="dropdown-content" id="gearDropdown">
                            <!-- Konten dropdown menu -->
                            <a href="profile"><i class="bi bi-person-circle"></i>Profile</a>
                            <a href="#" onclick="logoutadmin()"><i class="bi bi-box-arrow-right"></i></i>Logout</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container_profile">

                <div class="case_profile">
                    <!-- Tambahkan foto profil -->
                    <img src="assets/images/logo.png" alt="Foto Profil" id="profil">

                    <!-- Form untuk mengubah foto profil dan nama pengguna -->
                    <h2>Informasi Profil</h2>
                    <p>Username:
                        <?php echo session('admin')['username']; ?>
                    </p>
                    <p>Email:
                        <?php echo session('admin')['email']; ?>
                    </p>







                </div>

                <div class="opsi_profile">
                    <div class="pilih-atur">
                        <span class="pengaturan">Pengaturan Profile</span>
                        <span>Ubah Password</span>
                    </div>

                    <div class="case-settings">
                        <div class="pengaturan-profile">
                            <h2>Pengaturan Profil</h2>
                            <form action="/profile/update" method="post" enctype="multipart/form-data">
                                <label for="profile-image">Foto Profil:</label>
                                <input type="file" id="profile-image" name="profile_image">
                                <br>
                                <label for="username">Nama Pengguna:</label>
                                <input type="text" id="username" name="username">
                                <br>
                                <input type="submit" value="Simpan">
                            </form>
                        </div>

                        <!-- Form untuk mengubah kata sandi -->
                        <div class="ubah-sandi">
                            <h2>Pengaturan Kata Sandi</h2>
                            <form action="/profile/updatePassword" method="post">
                                <label for="current-password">Kata Sandi Saat Ini:</label>
                                <input type="password" id="current-password" name="current_password">
                                <br>
                                <label for="new-password">Kata Sandi Baru:</label>
                                <input type="password" id="new-password" name="new_password">
                                <br>
                                <label for="confirm-password">Konfirmasi Kata Sandi Baru:</label>
                                <input type="password" id="confirm-password" name="confirm_password">
                                <br>
                                <input type="submit" value="Simpan">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <i class="bi bi-arrow-up-circle-fill" onclick="topFunction()" id="scrollBtn"></i>
        </div>

        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/main.js"></script>




</body>

</html>