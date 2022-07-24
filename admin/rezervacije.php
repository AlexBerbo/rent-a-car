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
	
	$sifra='';
	$konekcija= new mysqli('localhost', 'root', '', 'carrent');
	if($konekcija->error)
		die("Greska".$konekcija->error);

	if(isset($_POST['obrisi'])){
		$id=$_POST['id'];
	
		$upit= "DELETE FROM car WHERE idcar='$id'";
		$rezultat=$konekcija->query($upit);
	}
?>
<header class="header">
	<div class="slika">
		<nav>
		<ul>
			<li>
				<a class="logo" href="rezervacije.php">Alex Rent</a>
			</li>
			<li>
				<a class="nav-bar" href="rezervacije.php">Reservations</a>
			</li>
			<li>
				<a class="nav-bar" href="carlist.php">Cars</a>
			</li>
			<li>
				<a class="nav-bar" href="userlist.php">Users</a>
			</li>
			<li>
				<a class="nav-bar" href="categorylist.php">Categories</a>
			</li>
			<li>
				<a class="nav-bar" href="logout.php">Log Out</a>
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

<section id="login" class="login-section">
	<div class="login-div-slika"></div>
	<div class="login-div">
		<form class="login-form" action="rezervacije.php" method="post">
		<?php	
			$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    		// Check connection
			if($konekcija->error)
				die("Greska".$konekcija->error);
				$result = mysqli_query($konekcija, "SELECT * FROM rezrvacija r INNER JOIN korisnik k on r.idkorisnik=k.idkorisnik ORDER BY datum DESC");
				?>
				<div class="table">
				<table class='table table-striped'>
					<tr>
						<th>Šifra porudžbine</th>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Email</th>
						<th>Datum</th>
						<th>Cena</th>
						<th></th>
						<th></th>
					</tr>
					<?php  
					while($row = mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $row['idrezervacija']; ?></td>
							<td><?php echo $row['ime']; ?></td>
							<td><?php echo $row['prezime']; ?></td>  
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['datum']; ?></td>
							<td><?php echo $row['ukupno']; ?></td>
							<td><a href="edit.php?id=<?php echo $row['idrezervacija']; ?>">Edit</a></td>
							<td><a href="detalji.php?id=<?php echo $row['idrezervacija']; ?>">Details</a></td>
						</tr>	
						<?php
					}
					mysqli_close($konekcija);
					?>
				</table>
		</form>	
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