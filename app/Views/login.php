<!DOCTYPE html>
<html>
<head>
	<title>Universitas Teknokrat Indonesia</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
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
			<h2 class="Login"style="text-align: center">Login</h2>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Enter Username">

			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter Password">
			<?php if(session()->has('error')) : ?>
				<div class="alert alert-danger"><?= session('error')?></div>
			<?php endif; ?>
      		<p class="forgot-password"><a href="#">Forgot password?</a></p>

			<button type="submit">Login</button>
      		<p class="signup-message" style="text-align: center;">Don't have an account? <a href="#">Sign up</a></p>
		</form>
	</div>
   <script src="/assets/js/login.js"></script>
</body>
</html>
