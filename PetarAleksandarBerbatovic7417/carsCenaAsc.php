<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alex Rent</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<?php
	session_start(); 
	$konekcija= new mysqli('localhost', 'root', '', 'carrent');
	if($konekcija->error)
		die("Greska".$konekcija->error);
	$id='';

	if(isset($_POST['dodajj'])){
		if(!isset($_SESSION['username'])){
			echo "<script type='text/javascript'>
		 	alert('Morate se prvo prijaviti na Vaš nalog');
		 	location='login.php';
			</script>";
		}
		else{
			$korisnickoime=$_POST['username'] ;
			$result= "SELECT * FROM  korisnik WHERE username = '$korisnickoime'";
			$rezultat= $konekcija->query($result);
			if($niz=$rezultat->fetch_assoc()){
				$idkorisnika=$niz['idkorisnik'];
			}
			$idproizvoda=$_POST['id'];
			$_SESSION['car']=$_POST['id'];
			$cena=$_POST['cena'];
			$novacena=$cena*0.80;
			$user_check_query = "SELECT * FROM car WHERE idcar='$idproizvoda' LIMIT 1";
			$result = mysqli_query($konekcija, $user_check_query);
			$proizvod = mysqli_fetch_assoc($result);
			$date = $_POST['datum'];
			$count = $konekcija->query("SELECT count(*) as cnt from rezrvacija where idkorisnik='$idkorisnika'")->fetch_object()->cnt; 

			if($proizvod){
				if($count>2){
			 		$upit= "INSERT INTO korpa(idkorpa, datum, idkorisnik, cena) value('NULL', '$date', '$idkorisnika', '$novacena')";
			 	}
				else{
					$upit= "INSERT INTO korpa(idkorpa, datum, idkorisnik, cena) value('NULL', '$date', '$idkorisnika', '$cena')";
				}

			 	if($rezultat = $konekcija->query($upit)){
			 			echo "<script type='text/javascript'>
			 			alert('Uspesno ste dodali u korpu');
			 			location='korpa.php';
			 			</script>";
			 	}
			 	else{
			 		echo '<script language="javascript">';
			 		echo 'alert("Greška prilikom rezervisanja!")';
			 		echo '</script>';
				}
			}
			else{
			 	echo '<script language="javascript">';
			 	echo 'alert("Greška prilikom rezervisanja!")';
			 	echo '</script>';
			}
		}
	}
?>
</head>
<body>

<header class="header">
	<div class="slika">
		<nav>
		<ul>
			<li>
				<a class="logo" href="cars.php">Alex Rent</a>
			</li>
			<li>
				<a class="nav-bar" href="nalog.php">Nalog</a>
			</li>
			<li>
				<a class="nav-bar" href="korpa.php">Korpa</a>
			</li>
			<li>
				<a class="nav-bar" href="logout.php">Log out</a>
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

<section id="about" class="about-section">
	<div class="about-div-slika"></div>
	<div class="about-div">
		<h2>ALEX RENT</h2>
		<hr>
		<p>Dobrodosli na vas Nalog, <?php echo $_SESSION['username']; ?></p>
		<h3>Izdvojeni Automobili</h3>
		<p>Porsche Taycan, Audi R8, Nismo GTR, VW Passat, Rolls Royce Phantom Series II, Lamborghini Huracan Performante.</p>
	</div>	
</section>

<section id='menu' class='fix-slika-menu'>
	<div class='menu-text'>
		<h2 class='h2-text'>Meni</h2>
		<hr>
		<p class='p-text'>Nakon druge rezervacije, dobijate popust od 20% na bilo koju sledecu rezervaciju.</p>
		<p class='p-text'><a class='nav-bar' href='carsCenaDesc.php'>Sort by Price Descending</a></p>
		<p class='p-text'><a class='nav-bar' href='carsCenaAsc.php'>Sort by Price Ascending</a></p>
	</div>

<?php
	$result = mysqli_query($konekcija, "SELECT * FROM car ORDER BY cena ASC");
	while($row=mysqli_fetch_assoc($result)){
		echo "<div class='menu-menu'>
		<form class='forma' method='post' action='cars.php'>
		<div class='breakfast'>
			<hr class='hr-menu'>
			<h2 class='h2-menu-title'>OUR CARS</h2>
			<h2 class='h2-menu'>".$row['naziv']."</h2>
			<h2 class='h2-price'>".$row['cena']."$</h2>
			<p class='p-menu'>".$row['opis']."</p>
			<p class='slike'><img src=img/".$row['slika']." class='rounded-circle'></p>
			<input type='date' id='datumm' name='datum' required>";
			if(isset($_SESSION['username']))
				{
					?>
					<input class='hidden' type='hidden' name='username' value=<?php echo $_SESSION['username']; ?> />
					<?php  
				}
				echo "<p class='hiddenP'><input class='hidden' type='hidden' name='id' value=".$row['idcar']." /></p>
				<p class='hiddenP'><input class='hidden' type='hidden' name='cena' value=".$row['cena']." /></p>";
				echo "<input type='submit' name='dodajj' value='Rezervisi' class='buy'></input>
				</form>
						</div>
			</div>
			</section>";

			}	
			mysqli_close($konekcija);
?>

<section id="gallery" class="fix-slika-gallery">
	<div class="menu-text">
		<h2 class="h2-text">GALERIJA</h2>
		<hr>
		<p class="p-text">Galerija vozila koje nudimo nasim vernim klijentima.</p>
	</div>
	<div class="div-gallery">
		<button><a href="">ELEKTRICNA VOZILA</a></button>
		<button><a href="">AUTOMOBILI ZA STAZE</a></button>
		<button><a href="">AUTOBAHN KRUZERI</a></button>
		<button><a href="">LUKSUZNA VOZILA</a></button>
	</div>
</section>

<section class="portfolio">
		<div class="slika-1">
			<div class="zavesa-1">
				<a class="dish-name" href="">Tesla Model S</a>
			</div>
		</div>
		<div class="slika-2">
			<div class="zavesa-2">
				<a class="dish-name" href="">Porsche Taycan TURBO S</a>
			</div>
		</div>
		<div class="slika-3">
			<div class="zavesa-3">
				<a class="dish-name" href="">Audi RS E-Tron GT</a>
			</div>
		</div>
</section>

<section class="portfolio">
		<div class="slika-4">
			<div class="zavesa-4">
				<a class="dish-name" href="">Lamborghini Huracan</a>
			</div>
		</div>
		<div class="slika-5">
			<div class="zavesa-5">
				<a class="dish-name" href="">Audi R8</a>
			</div>
		</div>
		<div class="slika-6">
			<div class="zavesa-6">
				<a class="dish-name" href="">Nismo GTR</a>
			</div>
		</div>
</section>

<section class="portfolio">
		<div class="slika-7">
			<div class="zavesa-7">
				<a class="dish-name" href="">VW Passat</a>
			</div>
		</div>
		<div class="slika-8">
			<div class="zavesa-8">
				<a class="dish-name" href="">Audi RS6</a>
			</div>
		</div>
		<div class="slika-9">
			<div class="zavesa-9">
				<a class="dish-name" href="">Audi RS4</a>
			</div>
		</div>
</section>

<section class="portfolio">
		<div class="slika-10">
			<div class="zavesa-10">
				<a class="dish-name" href="">BMW M760LI</a>
			</div>
		</div>
		<div class="slika-11">
			<div class="zavesa-11">
				<a class="dish-name" href="">Mercedes Benz S63s</a>
			</div>
		</div>
		<div class="slika-12">
			<div class="zavesa-12">
				<a class="dish-name" href="">Audi S8</a>
			</div>
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
			<p class="p-contact">Pon-Pet: 10:00 AM - 11:00 PM</p>
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