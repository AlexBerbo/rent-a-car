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
    // Check connection
	if($konekcija->error)
		die("Greska".$konekcija->error);


	if (!isset($_SESSION['username'])) {

		header('location: login.php');
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
		<form method='post' action='korpa.php'>
				<?php
	$result = mysqli_query($konekcija, "SELECT * FROM rezrvacija LIMIT 1");
echo "<section id='menu' class='fix-slika-menu'>
	<div class='menu-text'>
		<h2 class='h2-text'>Menu</h2>
		<hr>
		<p class='p-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, distinctio.</p>
	</div>";

if($row=mysqli_fetch_assoc($result)){
		echo "
	<div class='menu-menu'>
		<div class='breakfast'>
			<hr class='hr-menu'>
			<h2 class='h2-menu-title'>VASA REZERVACIJA</h2>
			<h2 class='h2-menu'>".$row['datum']."</h2>
			<h2 class='h2-price'>".$row['ukupno']."$</h2>
			<p class='p-menu'>".$row['idcar']."</p>";
			if(isset($_SESSION['username']))
				{
					?>
					<input type='hidden' name='username' value=<?php echo $_SESSION['username']; ?> />
					<?php  
				}
				echo "
						</div>
			</div>";
			}	
			mysqli_close($konekcija);
?>
			</form>

	</div>	
</section>

<section id="menu" class="fix-slika-menu">
	<div class="menu-text">
		<h2 class="h2-text">Menu</h2>
		<hr>
		<p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, distinctio.</p>
	</div>
	<div class="menu-menu">
		<div class="breakfast">
			<h2 class="h2-menu-title">CITY CARS</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Renault Clio</h2>
			<h2 class="h2-price">100$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Smart ForTwo</h2>
			<h2 class="h2-price">70$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">VW Up!</h2>
			<h2 class="h2-price">70$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">VW Polo</h2>
			<h2 class="h2-price">80$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
		</div>
		<div class="main-course">
			<h2 class="h2-menu-title">TRACK CARS</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Lamborghini Huracan Performante</h2>
			<h2 class="h2-price">600$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Audi R8</h2>
			<h2 class="h2-price">550$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Nismo GTR</h2>
			<h2 class="h2-price">700$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">McLaren P1</h2>
			<h2 class="h2-price">1000$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
		</div>
	</div>
	<div class="menu-menu-2">
		<div class="dinner">
			<h2 class="h2-menu-title">AUTOBAHN CRUISERS</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">35$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">30$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">30$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">30$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
		</div>
		<div class="coffe">
			<h2 class="h2-menu-title">KARTING</h2>
			<hr class="hr-menu">
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">35$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">30$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">30$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
			<h2 class="h2-menu">Delicious Dish</h2>
			<h2 class="h2-price">30$</h2>
			<p class="p-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.</p>
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
			<div class="cars-1"></div>
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
			<a class="insta" href="https://instagram.com/alexberbo" target="blank"><img src="img/icons/instagram.png" height="33px" width="35px" alt=""></a>
			<a class="twitter" href="https://twitter.com" target="blank"><img src="img/icons/twitter.png" height="33px" width="35px" alt=""></a>
			<a class="google" href="https://plus.google.com/" target="blank"><img src="img/icons/google.png" height="30px" width="30px" alt=""></a>
			<p class="p-social">© 2022 Alex Rent. All rights reserved. Designed by <a class="a-social" href="http://instagram.com/alexberbo">alexberbo</a></p>
	</div>
	
</section>

</body>
</html>