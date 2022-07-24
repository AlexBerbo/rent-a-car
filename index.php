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
				<a class="nav-bar" href="#about">About</a>
			</li>
			<li>
				<a class="nav-bar" href="#menu">Menu</a>
			</li>
			<li>
				<a class="nav-bar" href="#gallery">Gallery</a>
			</li>
			<li>
				<a class="nav-bar" href="#cars">Cars</a>
			</li>
			<li>
				<a class="nav-bar" href="#contact">Contact</a>
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

<section id="about" class="about-section">
	<div class="about-div-slika"></div>
	<div class="about-div">
		<h2>OUR CAR RENTAL</h2>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam.
		Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam
		commodo nibh.</p>
		<h3>Awarded Cars</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. 
		Duis sed dapibus leo nec ornare.</p>
	</div>	
</section>

<section id="menu" class="fix-slika-menu">
	<div class="menu-text">
		<h2 class="h2-text">Menu</h2>
		<hr>
		<p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, distinctio.</p>
	</div>
	<div class="menu-menu">
		<div class="breakfastt">
			<h2 class="h2-menu-title">CITY CARS</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Renault Clio</h2>
			<h2 class="h2-price">100$</h2>
			<p class="p-menu">Small hatchback, comfortable economic city car with plenty of fun and easy driving character.</p>
			<h2 class="h2-menu">Smart ForTwo</h2>
			<h2 class="h2-price">70$</h2>
			<p class="p-menu">Very small car only for big and very car crowded places, easy to manouver anywhere in the city.</p>
			<h2 class="h2-menu">VW Up!</h2>
			<h2 class="h2-price">70$</h2>
			<p class="p-menu">Very small car only for big and very car crowded places, easy to manouver anywhere in the city.</p>
			<h2 class="h2-menu">VW Polo</h2>
			<h2 class="h2-price">80$</h2>
			<p class="p-menu">Small hatchback, comfortable economic city car with plenty of fun and easy driving character.</p>
		</div>
		<div class="main-course">
			<h2 class="h2-menu-title">TRACK CARS</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Lamborghini Huracan Performante</h2>
			<h2 class="h2-price">600$</h2>
			<p class="p-menu">The Huracán Performante has reworked the concept of super sports cars and taken the notion of performance to levels never seen before.</p>
			<h2 class="h2-menu">Audi R8</h2>
			<h2 class="h2-price">550$</h2>
			<p class="p-menu">The Audi R8 performance Coupe showcases its motorsport DNA while the 610-hp V10 engine.</p>
			<h2 class="h2-menu">Nismo GTR</h2>
			<h2 class="h2-price">700$</h2>
			<p class="p-menu">Discover the 2021 Nissan GT-R NISMO: a 4-seat sports car with a legendary historic racing heritage.</p>
			<h2 class="h2-menu">McLaren P1</h2>
			<h2 class="h2-price">1000$</h2>
			<p class="p-menu">Discover McLaren P1 sports car - designed, engineered, and built to be the best driver's car in the world, inspired by the iconic F1.</p>
		</div>
	</div>
	<div class="menu-menu-2">
		<div class="dinner">
			<h2 class="h2-menu-title">AUTOBAHN CRUISERS</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">VW Passat</h2>
			<h2 class="h2-price">150$</h2>
			<p class="p-menu">The 2022 Volkswagen Passat has a well-crafted luxurious interior that will provide comfort for your whole crew.</p>
			<h2 class="h2-menu">Audi RS6</h2>
			<h2 class="h2-price">300$</h2>
			<p class="p-menu">With powerful horsepower and plenty of cargo room, the 2022 RS6 Avant brings a fusion of sport, utility and comfort for your whole crew.</p>
			<h2 class="h2-menu">Audi RS4</h2>
			<h2 class="h2-price">250$</h2>
			<p class="p-menu">Supercar performance and the practicality of an Audi Avant. These two distinct qualities have been perfectly combined in the new Audi RS 4 Avant.</p>
			<h2 class="h2-menu">Skoda Superb</h2>
			<h2 class="h2-price">125$</h2>
			<p class="p-menu">The 2022 Skoda Superb has a well-crafted luxurious interior that will provide comfort for your whole crew.</p>
		</div>
		<div class="coffe">
			<h2 class="h2-menu-title">KARTING</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Kart 80cc</h2>
			<h2 class="h2-price">50$</h2>
			<p class="p-menu">Kart with 80cc, fun and easy for beginners.</p>
			<h2 class="h2-menu">Kart 100cc</h2>
			<h2 class="h2-price">75$</h2>
			<p class="p-menu">Kart with 100cc, a step forward and a challenge to become intermediate.</p>
			<h2 class="h2-menu">Kart 125cc</h2>
			<h2 class="h2-price">100$</h2>
			<p class="p-menu">Kart with 125cc, much faster and a bigger challenge for intermediate drivers.</p>
			<h2 class="h2-menu">Nissan Skyline GTR R34</h2>
			<h2 class="h2-price">1200$</h2>
			<p class="p-menu">A technologically advanced display unit set the model apart, while it’s RB26DETT twin-turbo I6  engine produced impressive horsepower.</p>
		</div>
</section>

<section id="gallery" class="fix-slika-gallery">
	<div class="menu-text">
		<h2 class="h2-text">GALLERY</h2>
		<hr>
		<p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, distinctio.</p>
	</div>
	<div class="div-gallery">
		<button><a href="">CITY CARS</a></button>
		<button><a href="">TRACK CARS</a></button>
		<button><a href="">AUTOBAHN CRUISERS</a></button>
		<button><a href="">KARTING</a></button>
	</div>
</section>

<section class="portfolio">
		<div class="slika-1">
			<div class="zavesa-1">
				<a class="dish-name" href="">Renault Clio</a>
			</div>
		</div>
		<div class="slika-2">
			<div class="zavesa-2">
				<a class="dish-name" href="">Smart ForTwo</a>
			</div>
		</div>
		<div class="slika-3">
			<div class="zavesa-3">
				<a class="dish-name" href="">VW Up!</a>
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
				<a class="dish-name" href="">Kart</a>
			</div>
		</div>
		<div class="slika-11">
			<div class="zavesa-11">
				<a class="dish-name" href="">Kart</a>
			</div>
		</div>
		<div class="slika-12">
			<div class="zavesa-12">
				<a class="dish-name" href="">Kart</a>
			</div>
		</div>
</section>

<section id="cars" class="fix-slika-cars">
	<div class="cars-text">
		<h2 class="h2-text">Cars</h2>
		<hr>
		<p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, distinctio.</p>
		<div class="cars-slike">
			<div class="cars-p1"></div>
			<div class="cars-2"></div>
			<div class="cars-3"></div>
		</div>
		<div class="cars-about">
			<div>
				<h3 class="h3-cars">McLaren P1</h3>
				<p class="p-cars">Lorem ipsum dolor sit amet, consectetur <br>
				 adipisicing elit. Aperiam laudantium facilis <br>
				  esse laboriosam accusamus aliquid!</p>
			</div>
			<div  class="r8">
				<h3 class="h3-cars">Audi R8</h3>
				<p class="p-cars">Lorem ipsum dolor sit amet, consectetur <br>
				 adipisicing elit. Aperiam laudantium facilis <br>
				  esse laboriosam accusamus aliquid!</p>
			</div>
			<div>
				<h3 class="h3-cars">Audi RS6</h3>
				<p class="p-cars">Lorem ipsum dolor sit amet, consectetur <br>
				 adipisicing elit. Aperiam laudantium facilis <br>
				  esse laboriosam accusamus aliquid!</p>
			</div>
		</div>
	</div>
</section>

<section id="contact" class="reservation">
	<div class="number-res">
		<h2 class="h2-res">WANT TO RENT A CAR? CALL <strong>+381645472355</strong></h2>
	</div>
</section>

<section class="section-form">
	<div class="contact-form-text">
		<h2 class="h2-form">Contact form</h2>
		<hr>
		<p class="p-form">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, distinctio.</p>
		<form class="form">
			<input class="prva-forma" type="text" name="ime" placeholder="Name">
			<input class="druga-forma" type="text" name="mail" placeholder="Email">
		</form>
		<form class="form-2">
			<textarea class="treca-forma" type="text" name="msg" placeholder="Message"></textarea>
		</form>
		<div class="div-button">
			<button class="button-send-message">
				<a class="message-send" href="">Send message</a>
			</button>
		</div>
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
			<a class="insta" href="https://instagram.com/alexberbo" target="blank"><img class="insta1" src="img/icons/instagram.png" height="33px" width="35px" alt=""></a>
			<a class="twitter" href="https://twitter.com" target="blank"><img class="twitter1" src="img/icons/twitter.png" height="33px" width="35px" alt=""></a>
			<a class="google" href="https://plus.google.com/" target="blank"><img class="google1" src="img/icons/google.png" height="30px" width="30px" alt=""></a>
			<p class="p-social">© 2022 Alex Rent. All rights reserved. Designed by <a class="a-social" href="http://instagram.com/alexberbo">alexberbo</a></p>
	</div>
	
</section>

</body>
</html>