<?php
	$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    // Check connection
		if($konekcija->error)
		die("Greska".$konekcija->error);

	$id = $_GET['id']; // get id through query string
	$del = mysqli_query($konekcija, "delete from korisnik where idkorisnik = '$id'"); // delete query

	if($del){
    	echo "<script type='text/javascript'>
		alert('User succesfully removed');
		location='userlist.php';
		</script>";	
	}
	else{
    	echo "<script type='text/javascript'>
		alert('Error!');
		location='index.php';
		</script>"; // display error message if not delete
	}
?>