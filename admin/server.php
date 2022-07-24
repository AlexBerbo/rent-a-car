<?php
	session_start();

	//promenljive
	$idkorisnik="";
	$ime="";
	$prezime="";
	$email="";
	$username="";
	$password="";

	$errors=array(); //greska koja se ispisuje ako ih bude bilo

	//database con
	$mysqli = mysqli_connect('localhost', 'root', '', 'carrent');

	//registracija
	if(isset($_POST['register'])){
		$ime=mysqli_real_escape_string($mysqli, $_POST['ime']);
		$prezime=mysqli_real_escape_string($mysqli, $_POST['prezime']);
		$email=mysqli_real_escape_string($mysqli, $_POST['email']);
		$username=mysqli_real_escape_string($mysqli, $_POST['username']);
		$password=mysqli_real_escape_string($mysqli, $_POST['password']);

		//provera da li postoji user
		$user_check="SELECT * from korisnik where username='$username' or email='$email' limit 1";
		$result=mysqli_query($mysqli, $user_check);
		$user=mysqli_fetch_assoc($result);

		if($user){
			if($user['username']===$username){
				echo '<script language="javascript">';
				echo 'alert("Uneti username vec postoji!")';
				echo '</script>';
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Uneti email vec postoji!")';
				echo '</script>';
			}
		}
		else{
			$result=mysqli_query($mysqli, "SELECT max(idkorisnik) as max from korisnik");
			$row=mysqli_fetch_assoc($result);
			$max=$row['max'];
			$max++;
			$upitInsert="INSERT INTO korisnik (idkorisnik, ime, prezime, email, username, password) VALUES('$max', '$ime', '$prezime', '$email', '$username', '$password')";
			mysqli_query($mysqli, $upitInsert);

			$resultKorpa=mysqli_query($mysqli, "SELECT max(idkorpa) as maximum from korpa");
			$row=mysqli_fetch_assoc($resultKorpa);
			$maximum=$row['maximum'];
			$maximum++;
			$upitInsertKorpa="INSERT INTO korpa (idkorpa, idkorisnik, ukupno) VALUES('$maximum', '$max', NULL)";
			mysqli_query($mysqli, $upitInsertKorpa);

			$_SESSION['$username']=$username;
			$_SESSION['success']="You are now logged in!";
			echo "<script type='text/javascript'>
			 		alert('Uspesno ste se registrovali!');
			 		</script>";
			header('location: cars.php');
		}
	}

	if(isset($_POST['login'])){
		$username=mysqli_real_escape_string($mysqli, $_POST['username']);
		$password=mysqli_real_escape_string($mysqli, $_POST['password']);

		if(empty($username)){
			array_push($errors, "Username is required");
		}
		if(empty($password)){
			array_push($errors, "Password is requierd");
		}

		if(count($errors)==0){
			$upitLogin="SELECT * from korisnik where username='$username' and password= '$password'";
			$resultLogin=$mysqli->query($upitLogin);
			$userLogin=mysqli_fetch_assoc($resultLogin);
			if($userLogin){
				$_SESSION['username']=$username;
				$_SESSION['succes']="You are now logged in!";
				echo "<script type='text/javascript'>
			 		alert('Uspesno ste se ulogovali!');
			 		</script>";
				header('location: cars.php');
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Pogresan username ili password!")';
				echo '</script>';
			}
		}
	}
?>