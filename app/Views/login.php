<!DOCTYPE html>
<html>

<head>
	<title>Universitas Teknokrat Indonesia</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

</head>

<body>
	<div class="Asean"><img src="assets/images/asean.png" width="50%" alt="Foto Profil">
	</div>
	<div class="container">
		<form action="Home/login" method="POST">
			<h1 style="text-align: center;margin-bottom: 7px;">Event Kampus</h1>
			<div class="bulat" onmouseover="moveImage()" onmouseout="stopImage()">
				<img src="assets/images/logo.png" alt="Foto Profil" id="gambar">
			</div>
			<h2 class="Login" style="text-align: center">Login</h2>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Enter Username">

			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter Password">
			<?php if (session()->has('error')): ?>
				<div class="alert alert-danger">
					<?= session('error') ?>
				</div>
			<?php endif; ?>

				<button type="submit">Login</button>

		</form>
	</div>
	<script src="/assets/js/login.js"></script>
</body>

</html>