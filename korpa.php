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

  	if(isset($_POST['dodaj'])){
		if(!isset($_SESSION['username'])){
			echo "<script type='text/javascript'>
			 alert('Morate se prvo prijaviti na Vaš nalog');
			 location='login.php';
			</script>";
		}
		else{
			$korisnickoime=$_SESSION['username'];
			$result= "SELECT * FROM  korisnik WHERE username = '$korisnickoime'";
			$rezultat= $konekcija->query($result);
			if($niz=$rezultat->fetch_assoc()){
				$idkorisnika=$niz['idkorisnik'];
			}
			if(!isset($_SESSION['car'])){
				echo "<script type='text/javascript'>
			 	alert('ID nema :(');
			 	location='login.php';
				</script>";
			}
			else{
				$idproizvoda=$_SESSION['car'];
				$user_check_query = "SELECT * FROM car WHERE idcar='$idproizvoda' LIMIT 1";
				$result = mysqli_query($konekcija, $user_check_query);
				$resultid=$konekcija->query($user_check_query);

				if($nizid=$resultid->fetch_assoc()){
					$idcar=$nizid['idcar'];
				}

				$proizvod = mysqli_fetch_assoc($result);
				$query1 = "SELECT * FROM korpa WHERE idkorisnik='$idkorisnika' ORDER BY idkorpa DESC LIMIT 1";
				$rezultat1= $konekcija->query($query1);

				if($niz1=$rezultat1->fetch_assoc()){
					$date=$niz1['datum'];
					$cena=$niz1['cena'];
				}
				else{
					echo '<script language="javascript">';
			 		echo 'alert("Greška prilikom pisanja datuma i cene!")';
			 		echo '</script>';
				}
			
			 	if($proizvod){ 
			 		$upit= "INSERT INTO rezrvacija(idrezervacija, datum, ukupno, idkorisnik, idcar) value('NULL', '$date', '$cena', '$idkorisnika', '$idcar')";
			 		if($rezultat = $konekcija->query($upit)){
						echo "<script type='text/javascript'>
			 			alert('You successfully booked a car!');
			 			location='nalog.php';
			 			</script>";
			 		}
				else{
			 		echo '<script language="javascript">';
			 		echo 'alert("Greška prilikom rezervisanja!")';
			 		echo '</script>';
			 	}
			}
			$del = mysqli_query($konekcija, "DELETE FROM korpa ORDER BY idkorpa DESC LIMIT 1");
			 	if($del){
			 		echo "<script type='text/javascript'>
			 		alert('DELETE');
			 		location='nalog.php';
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
if(isset($_GET['logout'])){
  	session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
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
				<a class="nav-bar" href="nalog.php">Account</a>
			</li>
			<li>
				<a class="nav-bar" href="logout.php">Log out</a>
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
		<h2>YOUR ACCOUNT</h2>
		<hr>
		<p>Welcome to your Account, <?php echo $_SESSION['username']; ?></p>
		<form method='post' action='korpa.php'>
        	<table class='table table-striped' id="porudzbine">
         		<tr>
            		<th>Date</th>
            		<th>Price</th>
            		<th>Your ID</th>
            		<th></th>
          		</tr>
          	<?php
          		if(!isset($_SESSION['username'])){
					echo "<script type='text/javascript'>
			 		alert('Morate se prvo prijaviti na Vaš nalog');
			 		location='login.php';
					</script>";
				}
			else{
				$korisnickoime=$_SESSION['username'] ;
				$result= "SELECT * FROM  korisnik WHERE username = '$korisnickoime'";
				$rezultat= $konekcija->query($result);

				if($niz=$rezultat->fetch_assoc()){
					$idkorisnika=$niz['idkorisnik'];
				}
			}
          	$result1 = mysqli_query($konekcija, "SELECT * FROM korpa Where idkorisnik='$idkorisnika' order by idkorpa desc");

          	if($row = mysqli_fetch_array($result1)){
          	?>
            	<tr>
             		<td><?php echo $row['datum']; ?></td>
              		<td><p><?php echo $row['cena']; ?>$</p></td>
              		<td><?php echo $row['idkorisnik']; ?></td>
            	</tr>
           	<?php
          	}
          	else{
          		echo "<script type='text/javascript'>
			 		alert('Korpa je prazna!');
			 		location='korpaPrazna.php';
					</script>";
          	}
          	mysqli_close($konekcija);
        	?>
        	</table>
        	<input type='submit' name='dodaj' value='Book' class='buy'></input>
      	</form>
      	
      	<button><a href="deletekorpa.php?id=<?php echo $row['idkorpa']; ?>">DELETE FROM CART</a></button>
      	<button><a href="logout.php">LOGOUT</a></button>
      	<button><a href="cars.php">BACK</a></button>
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