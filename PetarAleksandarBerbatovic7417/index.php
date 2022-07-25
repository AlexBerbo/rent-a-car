<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alex Rent</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<?php session_start();
		$konekcija=new mysqli('localhost', 'root', '', 'carrent');
		if($konekcija->error){
			die("Greska :" . $konekcija->error);
			if(isset($_POST['dodaj'])){
				if(!isset($_SESSION['username'])){
					echo "<script type='text/javascript'>
							alert('Morate se prvo prijaviti na vas nalog!');
							location='login.php';
							</script>";
				}
				else{
					$korisnickoime=$_POST['username'];
					$upitUser="SELECT * from korisnik where username='$korisnickoime'";
					$result=$konekcija->query($upitUser);
					if($row=$result->fetch_assoc()){
						$idkorisnika=$row['idkorisnik'];
					}	
					$upitId="SELECT * from korpa where idkorisnik='$idkorisnika'";
					$rezultat=$konekcija->query($upitId);
					if($row=$rezultat->fetch_assoc()){
						$idkorpe=$niz['idkorpa'];
					}
					$idcar=$_POST['id'];
					$upitStavke="SELECT * from stavkekorpe where idcar='$idcar' and idkorpe='$idkorpe' LIMIT 1;";
					$result=$konekcija->query($upitStavke);
					$car=$result->mysqli_fetch_assoc();
					if($car){
						$upitInsertStavke="INSERT INTO stavkekorpe(idstavka, idkorpa, idcar) VALUES('NULL, '$idkorpe', '$idcar');";
						if($result=$konekcija->query($upitInsertStavke)){
							echo "<script type='text/javascript'>
			 					alert('Uspesno ste rezervisali automobil');
			 					location='korpa.php';
			 					</script>";
						}
						else{
							echo '<script language="javascript">';
			 				echo 'alert("Greška prilikom rezervisanja!")';
			 				echo '</script>';
						}
					}
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
				<a class="logo" href="index.php">Alex Rent</a>
			</li>
			<li>
				<a class="nav-bar" href="#about">O nama</a>
			</li>
			<li>
				<a class="nav-bar" href="#menu">Meni</a>
			</li>
			<li>
				<a class="nav-bar" href="#gallery">Galerija</a>
			</li>
			<li>
				<a class="nav-bar" href="#cars">Automobili</a>
			</li>
			<li>
				<a class="nav-bar" href="#contact">Kontakt</a>
			</li>
			<li>
				<a class="nav-bar" href="login.php">Log In</a>
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
		<p>Iznajmljivanje luksuznih, sportskih, elektricnih i pouzdanih automobila za bilo koje potrebe.</p>
		<h3>Izdvojeni Automobili</h3>
		<p>Porsche Taycan, Audi R8, Nismo GTR, VW Passat, Rolls Royce Phantom Series II, Lamborghini Huracan Performante.</p>
	</div>	
</section>

<section id="menu" class="fix-slika-menu">
	<div class="menu-text">
		<h2 class="h2-text">Meni</h2>
		<hr>
		<p class="p-text">Vozila koja nudimo u nasoj kompaniji Alex Rent</p>
	</div>
	<div class="menu-menu">
		<div class="breakfastt">
			<h2 class="h2-menu-title">ELEKTRICNA VOZILA</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Tesla Model S</h2>
			<h2 class="h2-price">600$</h2>
			<p class="p-menu">Potpuno električni Tesla Model S je impresivno kompetentan luksuzni elektricni automobil sa visokim performansama, udobnosti i dometa.</p>
			<h2 class="h2-menu">Porsche Taycan TURBO S</h2>
			<h2 class="h2-price">700$</h2>
			<p class="p-menu">Impresivne, ponovljive vrhunske performanse i revolucionarna tehnologija.</p>
			<h2 class="h2-menu">Audi RS E-Tron GT</h2>
			<h2 class="h2-price">600$</h2>
			<p class="p-menu">RS e-tron GT je napravljen zajedno sa legendarnim Audijem R8 u fabrici Bollinger Hofe u Nemačkoj, gde se pažnja posvećena detaljima susreće sa preciznošću i kvalitetom.</p>
			<h2 class="h2-menu">BMW i4</h2>
			<h2 class="h2-price">650$</h2>
			<p class="p-menu">Električni BMW i4 limuzina je važan deo BMW-ovog portfolija elektricnih vozila. Grand Coupe serije 4 sa baterijskim pogonom i veoma udobnim i sportskim manirima na putu.</p>
		</div>
		<div class="main-course">
			<h2 class="h2-menu-title">AUTOMOBILI ZA STAZE</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Lamborghini Huracan Performante</h2>
			<h2 class="h2-price">600$</h2>
			<p class="p-menu">Huracan Performante je preradio koncept super sportskih automobila i podigao pojam performansi na nivoe nikada ranije.</p>
			<h2 class="h2-menu">Audi R8</h2>
			<h2 class="h2-price">550$</h2>
			<p class="p-menu">Audi R8 performance Coupe pokazuje svoj motorsportski DNK sa V10 motorom od 610 KS.</p>
			<h2 class="h2-menu">Nismo GTR</h2>
			<h2 class="h2-price">700$</h2>
			<p class="p-menu">Otkrijte Nissan GT-R NISMO 2021: sportski automobil sa 4 sedišta sa legendarnim istorijskim trkačkim nasleđem.</p>
			<h2 class="h2-menu">McLaren P1</h2>
			<h2 class="h2-price">1000$</h2>
			<p class="p-menu">Otkrijte McLaren P1 sportski automobil - dizajniran, projektovan i napravljen da bude najbolji automobil za vozače na svetu, inspirisan legendarnim F1 modelom.</p>
		</div>
	</div>
	<div class="menu-menu-2">
		<div class="dinner">
			<h2 class="h2-menu-title">AUTOBAHN KRUZERI</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">VW Passat</h2>
			<h2 class="h2-price">150$</h2>
			<p class="p-menu">Volkswagen Passat 2022 ima dobro izrađen luksuzni enterijer koji će pružiti udobnost celoj vašoj posadi.</p>
			<h2 class="h2-menu">Audi RS6</h2>
			<h2 class="h2-price">300$</h2>
			<p class="p-menu">Sa snažnim konjskim snagama i puno prostora za prtljag, 2022 RS6 Avant donosi fuziju sporta, korisnosti i udobnosti za celu vašu posadu.</p>
			<h2 class="h2-menu">Audi RS4</h2>
			<h2 class="h2-price">250$</h2>
			<p class="p-menu">Performanse superautomobila i praktičnost Audi Avant-a. Ova dva različita kvaliteta su savršeno kombinovana u novom Audiju RS 4 Avant.</p>
			<h2 class="h2-menu">Skoda Superb</h2>
			<h2 class="h2-price">125$</h2>
			<p class="p-menu">Škoda Superb 2022 ima dobro izrađen luksuzni enterijer koji će pružiti udobnost celoj vašoj posadi.</p>
		</div>
		<div class="coffe">
			<h2 class="h2-menu-title">LUKSUZNA VOZILA</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">BMW M760Li</h2>
			<h2 class="h2-price">1400$</h2>
			<p class="p-menu">BMW Serije 7 limuzina danas ispunjava zahteve sutrašnjice kao nijedno drugo vozilo: bilo da se radi o luksuzu, udobnosti ili vodećim inovacijama.</p>
			<h2 class="h2-menu">Mercedes Benz S63s AMG</h2>
			<h2 class="h2-price">1000$</h2>
			<p class="p-menu">Na mnogo načina, Mercedes-Benz S-klasa predstavlja najbolje od najboljih ako ste na tržištu za veliki luksuzni automobil.</p>
			<h2 class="h2-menu">Audi S8</h2>
			<h2 class="h2-price">900$</h2>
			<p class="p-menu">Brza i razigrana sportska limuzina izuzetno velike veličine, Audi S8 kombinuje udobnost unutrašnjosti sa snažnim performansama koje spajaju najbolje iz oba sveta.</p>
			<h2 class="h2-menu">Rolls Roys Phantom Series II</h2>
			<h2 class="h2-price">4500$</h2>
			<p class="p-menu">Vrhunski Rolls-Roice, Phantom Series II je legendarni maverick i ikona neponovljivog savršenstva.</p>
		</div>
</section>

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

<section id="cars" class="fix-slika-cars">
	<div class="cars-text">
		<h2 class="h2-text">Nasi Favoriti</h2>
		<hr>
		<p class="p-text">Vozila koja preporucujemo po svaku cenu.</p>
		<div class="cars-slike">
			<div class="cars-p1"></div>
			<div class="cars-2"></div>
			<div class="cars-3"></div>
		</div>
		<div class="cars-about">
			<div>
				<h3 class="h3-cars">McLaren P1</h3>
				<p class="p-cars">Otkrijte McLaren P1 sportski automobil <br>
				- dizajniran, projektovan i napravljen da bude najbolji automobil za vozače na svetu, <br>
				inspirisan legendarnim F1 modelom.</p>
			</div>
			<div  class="r8">
				<h3 class="h3-cars">Audi R8</h3>
				<p class="p-cars">Audi R8 performance Coupe pokazuje svoj motorsportski <br>
				DNK sa V10 motorom od 610 KS.</p>
			</div>
			<div>
				<h3 class="h3-cars">Audi RS6</h3>
				<p class="p-cars">Sa snažnim konjskim snagama i puno prostora za prtljag, <br>
				2022 RS6 Avant donosi fuziju sporta, korisnosti i udobnosti za celu vašu posadu.</p>
			</div>
		</div>
	</div>
</section>

<section id="contact" class="reservation">
	<div class="number-res">
		<h2 class="h2-res">ZELITE DA IZNAJMITE VOZILO? POZOVITE <strong>+381645472355</strong></h2>
	</div>
</section>

<section class="section-form">
	<div class="contact-form-text">
		<h2 class="h2-form">Kontakt forma</h2>
		<hr>
		<p class="p-form">Za sva pitanja i odgovore mozete nam poslati poruku.</p>
		<form class="form">
			<input class="prva-forma" type="text" name="ime" placeholder="Name">
			<input class="druga-forma" type="text" name="mail" placeholder="Email">
		</form>
		<form class="form-2">
			<textarea class="treca-forma" type="text" name="msg" placeholder="Message"></textarea>
		</form>
		<div class="div-button">
			<button class="button-send-message">
				<a class="message-send" href="">Posalji poruku</a>
			</button>
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
			<a class="insta" href="https://instagram.com/alexberbo" target="blank"><img class="insta1" src="img/icons/instagram.png" height="33px" width="35px" alt=""></a>
			<a class="twitter" href="https://twitter.com" target="blank"><img class="twitter1" src="img/icons/twitter.png" height="33px" width="35px" alt=""></a>
			<a class="google" href="https://plus.google.com/" target="blank"><img class="google1" src="img/icons/google.png" height="30px" width="30px" alt=""></a>
			<p class="p-social">© 2022 Alex Rent. All rights reserved. Designed by <a class="a-social" href="http://instagram.com/alexberbo">alexberbo</a></p>
	</div>
	
</section>

</body>
</html>