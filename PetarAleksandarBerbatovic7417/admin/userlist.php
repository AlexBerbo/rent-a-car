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
<?php 
	$ime='';
	$konekcija= new mysqli('localhost', 'root', '', 'carrent');
	if($konekcija->error)
		die("Greska".$konekcija->error);
?>
<header class="header">
	<div class="slika">
		<nav>
		<ul>
			<li>
				<a class="logo" href="rezervacije.php">Alex Rent</a>
			</li>
			<li>
				<a class="nav-bar" href="rezervacije.php">Rezervacije</a>
			</li>
			<li>
				<a class="nav-bar" href="carlist.php">Auti</a>
			</li>
			<li>
				<a class="nav-bar" href="userlist.php">Korisnici</a>
			</li>
			<li>
				<a class="nav-bar" href="categorylist.php">Kategorije</a>
			</li>
			<li>
				<a class="nav-bar" href="logout.php">Log Out</a>
			</li>
		</ul>
		</nav>
		<div class="zavesa">
			<h1 class="touche-intro">Alex Rent</h1>
			<p class="intro-p">IZNAJMLJIVANJE LUKSUZNIH AUTOMOBILA</p>
			<a href="">PRONADJI UZITAK</a>
		</div>
	</div>	
</header>

<section id="login" class="login-section">
	<div class="login-div">
	<?php
		$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    	// Check connection
    	if($konekcija->error)
			die("Greska".$konekcija->error);

    	$result = mysqli_query($konekcija, "SELECT * FROM korisnik");
			echo"<table class='table table-striped'>
					<tr>
						<th>ID Korisnika</th>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Email</th>
						<th>Korisnicko ime</th>
					</tr>";
    	while($row = mysqli_fetch_array($result)){
    		echo "<tr>
    				<td>" . $row['idkorisnik'] . "</td>
    				<td> " . $row['ime'] . "</td>
    				<td> " . $row['prezime'] . "</td>
    				<td> " . $row['email'] . "</td>
    				<td> " . $row['username'] . "</td>
    			</tr>";
      }
		echo"</table>";
    	mysqli_close($konekcija);
 	?>
 	<button><a href="rezervacije.php">BACK</a></button>
	</div>	
</section>

<section class="contact-foot">
	<div class="div-contact-foot">
		<div class="text-foot-contact-1">
			<h3 class="h3-contact">Adresa</h3>
			<p class="p-contact">Stevana Velikog 14, Indjija,</p>
			<p class="p-contact">Srbija, 22320</p>
		</div>
		<div class="text-foot-contact-2">
			<h3 class="h3-contact">Radno vreme</h3>
			<p class="p-contact">Pon-Cet: 10:00 AM - 11:00 PM</p>
			<p class="p-contact">Pet-Ned: 11:00 AM - 02:00 AM</p>
		</div>
		<div class="text-foot-contact-3">
			<h3 class="h3-contact">Kontakt</h3>
			<p class="p-contact">Telefon: +381645472355</p>
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