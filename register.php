<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alex Rent</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>

<header class="header">
	<div class="slika">
		<nav>
		<ul>
			<li>
				<a class="logo" href="index.php">Alex Rent</a>
			</li>
			<li>
				<a class="nav-bar" href="login.php">Log In</a>
			</li>
		</ul>
		</nav>
		<div class="zavesa">
			<h1 class="touche-intro">Alex Rent</h1>
			<p class="intro-p">Car Rent / Karting / Restaurant</p>
			<a href="">DISCOVER DRIVE</a>
		</div>
	</div>	
</header>

<section id="register" class="register-section">
	<div class="register-div-slika"></div>
	<div class="register-div">
		<form class="register-form" action="register.php" method="post">
		<?php include('errors.php'); ?>
		<h2>REGISTER</h2>
			<hr>
			<p>Ime: <input type="text" required name="ime" value="<?php echo $ime; ?>"/></p>
			<p>Prezime: <input type="text" required name="prezime" value="<?php echo $prezime; ?>"/></p>
			<p>Email: <input type="text" required name="email" value="<?php echo $email; ?>"/></p>
			<p>Username: <input type="text" required name="username" value="<?php echo $username; ?>"/></p>
			<p>Password: <input type="password" required name="password" value="<?php echo $password; ?>"/></p>
			<input class="register-dugme" name="register" type="submit" value="Register"/>
			<p> Zaboravili ste <a href="promeniSifru.php">lozinku?</a></p>
			<p> Admin ste? <a href="admin/index.php">Uloguj se</a></p>
			<p> Moderator ste? <a href="moderator/index.php">Uloguj se</a></p>
		</form>	
	</div>	
</section>

<section id="contact" class="reservation">
	<div class="number-res">
		<h2 class="h2-res">WANT TO RENT A CAR? CALL <strong>+381645472355</strong></h2>
	</div>
</section>

<section class="contact-foot">
	<div class="div-contact-foot">
		<div class="text-foot-contact-1">
			<h3 class="h3-contact">Address</h3>
			<p class="p-contact">Stevana Velikog 14, Indjija,</p>
			<p class="p-contact">Srbija, 22320</p>
		</div>
		<div class="text-foot-contact-2">
			<h3 class="h3-contact">Opening hours</h3>
			<p class="p-contact">Mon-Thurs: 10:00 AM - 11:00 PM</p>
			<p class="p-contact">Fri-Sun: 11:00 AM - 02:00 AM</p>
		</div>
		<div class="text-foot-contact-3">
			<h3 class="h3-contact">Contact info</h3>
			<p class="p-contact">Phone: +381645472355</p>
			<p class="p-contact">Email: berbo997@gmail.com</p>
		</div>
	</div>
	<div class="social">
		<div class="icons-social">
			<a class="insta" href="https://instagram.com/alexberbo" target="blank"><img src="img/icons/instagram.png" height="33px" width="35px" alt=""></a>
			<a class="twitter" href="https://twitter.com" target="blank"><img src="img/icons/twitter.png" height="33px" width="35px" alt=""></a>
			<a class="google" href="https://plus.google.com/" target="blank"><img src="img/icons/google.png" height="30px" width="30px" alt=""></a>
			<p class="p-social">© 2022 Alex Rent. All rights reserved. Designed by <a class="a-social" href="http://instagram.com/alexberbo">alexberbo</a></p>
	</div>
	
</section>

</body>
</html>
