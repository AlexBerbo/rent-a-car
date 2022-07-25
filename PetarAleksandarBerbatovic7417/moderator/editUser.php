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
	$prezime='';
	$username='';
	$id='';
	$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    // Check connection
            if($konekcija->error)
                die("Greska".$konekcija->error);

	$id = $_GET['id']; // get id through query string
	$qry = mysqli_query($konekcija, "select * from korisnik where idkorisnik='$id'"); // select query
	$data=$qry->fetch_assoc();
       
	if(isset($_POST['update'])){ // when click on Update button
		$ime=$_POST['ime'];
		$prezime=$_POST['prezime'];
		$username=$_POST['username'];
		$idkorisnik= $_POST['idkorisnik'];
    
    $upit="UPDATE korisnik SET ime='$ime', prezime='$prezime', username='$username' WHERE idkorisnik='$idkorisnik'";
	$rezultat= $konekcija->query($upit);
    
    if($rezultat){
        echo "<script type='text/javascript'>
		alert('Korisnik uspesno azuriran!');
		location='userlist.php';
		</script>";
    }
    else{
       echo "<script type='text/javascript'>
		alert('Greska!');
		location='index.php';
		</script>";
    	}       
	}
?>
<header class="header">
	<div class="slika">
		<nav>
		<ul>
			<li>
				<a class="logo" href="index.php">Alex Rent</a>
			</li>
			<li>
				<a class="nav-bar" href="rezervacije.php">Rezervacije</a>
			</li>
			<li>
				<a class="nav-bar" href="userlist.php">Korisnici</a>
			</li>
		</ul>
		</nav>
		<div class="zavesa">
			<h1 class="touche-intro">Alex Rent</h1>
			<p class="intro-p">IZNAJMLJIVANJE LUKSUZNIH VOZILA</p>
			<a href="">PRONADJI UZITAK</a>
		</div>
	</div>	
</header>

<section id="login" class="login-section">
	<div class="login-div-slika"></div>
	<div class="login-div">
		<form class="login-form" action="editUser.php" method="post">
		<table>
            <tr>
                <td><label>ID Korisnika: </label>
                <td><input type="text" name="idkorisnik"  value="<?php echo $data['idkorisnik'] ?>" readonly></td>
            </tr>
            <tr>
                <td><label>Ime: </label>
                <td><input type="text" name="ime" required value="<?php echo  $data['ime']?>"></td>
            </tr>
            <tr>
                <td><label>Prezime: </label>
                <td><input type="text" name="prezime" required value="<?php echo $data['prezime'] ?>"></td>
             </tr>
             <tr>
                <td><label>Korisnicko ime: </label>
                <td><input type="text" name="username" required value="<?php echo $data['username'] ?>"></td>
             </tr>
				</table>
			<input type="submit" name="update" value="Azuriraj">
		</form>	
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