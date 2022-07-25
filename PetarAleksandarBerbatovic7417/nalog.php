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
			$idkategorija=$nizid['idkategorija'];
		}
	}

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

  	if(!isset($_SESSION['username'])){
   		$_SESSION['msg'] = "You must log in first";
    	header('location: login.php');
  	}
  	else{
  		$korisnickoime=$_SESSION['username'] ;
    	$result= "SELECT * FROM  korisnik WHERE username = '$korisnickoime'";
    	$rezultat= $konekcija->query($result);
    	if($niz=$rezultat->fetch_assoc()){
      	$idkorisnika=$niz['idkorisnik'];
    	}
  	}
  	if(isset($_GET['logout'])) {
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
				<a class="nav-bar" href="nalog.php">Nalog</a>
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
		<h2>VAS NALOG</h2>
		<hr>
		<p>Dobrodosli na vas Nalog, <?php echo $_SESSION['username']; ?></p>
		<form method='post' action='nalog.php'>
        	<table class='table table-striped' id="porudzbine">
         		<tr>
            		<th>ID Rezervacije</th>
            		<th>Datum</th>
            		<th>Cena</th>
            		<th></th>
            		<th></th>
          		</tr>
          	<?php  
          		$total=0;
          		$result = mysqli_query($konekcija,"SELECT * FROM rezrvacija Where idkorisnik='$idkorisnika'");
          		$count = $konekcija->query("SELECT count(*) as cnt from rezrvacija where idkorisnik='$idkorisnika'")->fetch_object()->cnt; 
          		$korisnikid=$konekcija->query("SELECT idkorisnik  as kid FROM korisnik where idkorisnik='$idkorisnika'")->fetch_object()->kid;

          	while($row = mysqli_fetch_array($result)){
          	?>
            	<tr>
              		<td><?php echo $row['idrezervacija']; ?></td>
             		<td><?php echo $row['datum']; ?></td>
              		<td><p><?php echo $row['ukupno']; ?>$</p></td>
              		<td><button><a href="delete.php?id=<?php echo $row['idrezervacija']; ?>">OBRISI</a></button></td>
              		<td><button><a href="editRez.php?id=<?php echo $row['idrezervacija']; ?>">IZMENI DATUM</a></button></td>
            	</tr> 
           	<?php
          	}
          		
          		?>
        	</table>
      	</form>
      	<p>Broj rezervacija - <?php echo $count; ?></p>
      	<p>Vas ID naloga je - <?php echo $korisnikid; ?></p>
      	<button><a href="logout.php">LOGOUT</a></button>
      	<button><a href="cars.php">NAZAD</a></button>
	</div>	
</section>

<?php
	$result = mysqli_query($konekcija, "SELECT * FROM car where idkategorija='$idkategorija' and idcar!='$idproizvoda' LIMIT 1 ");
	while($row=mysqli_fetch_assoc($result)){
		echo "<div class='menu-menu'>
		<form class='forma' method='post' action='cars.php'>
		<div class='breakfast'>
			<hr class='hr-menu'>
			<h2 class='h2-menu-title'>FOR YOU</h2>
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

<section class="contact-foot">
	<div class="div-contact-foot">
		<div class="text-foot-contact-1">
			<h3 class="h3-contact">Adresa</h3>
			<p class="p-contact">Stevana Velikog 14, Indjija,</p>
			<p class="p-contact">Srbija, 22320</p>
		</div>
		<div class="text-foot-contact-2">
			<h3 class="h3-contact">Radno Vreme</h3>
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