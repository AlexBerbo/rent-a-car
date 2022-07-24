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
	$cPw='';
	$newPw='';
	$user='';
	$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    // Check connection
            if($konekcija->error)
                die("Greska".$konekcija->error);

	if(isset($_POST['login'])){ // when click on Update button
		$korisnickoime=$_POST['username'] ;
		$result= "SELECT * FROM moderator WHERE username = '$korisnickoime'";
		$rezult= $konekcija->query($result);
		if($niz=$rezult->fetch_assoc()){
			$username=$niz['username'];
		}
		$newPw=$_POST['password'];
		$cPw=$_POST['cpassword'];
		$user = $_POST['username'];
		if($newPw==$cPw){
			if($username==$user){
				$qry = mysqli_query($konekcija, "select * from moderator where username='$user'"); // select query
			$data=$qry->fetch_assoc();
   	 		$upit="UPDATE moderator SET password='$newPw' WHERE username='$user'";
			$rezultat= $konekcija->query($upit);
			}
			else{
				echo "<script type='text/javascript'>
			alert('Username do not match!')
			location='promeniSifru.php';
			</script>";
			}
		}
    	else{
    		echo "<script type='text/javascript'>
			alert('Passwords do not match!');
			location='promeniSifru.php';
			</script>";
    	}
    
    if($rezultat){
        echo "<script type='text/javascript'>
		alert('Password succesfully changed');
		location='index.php';
		</script>";
    }
    else{
       echo "<script type='text/javascript'>
		alert('Error!');
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
		<form class="login-form" action="promeniSifru.php" method="post">
		<h2>LOGIN</h2>
			<hr>
			<p>Username: <input type="text" name="username" /></p>
			<p>New password: <input type="password" name="password" /></p>
			<p>Confirm password: <input type="password" name="cpassword" /></p>
			<input class="login-dugme" name="login" type="submit" value="Change Password"/>
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