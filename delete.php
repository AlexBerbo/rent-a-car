<?php

$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    // Check connection
if($konekcija->error)
	die("Greska".$konekcija->error);

$id = $_GET['id'];

$del = mysqli_query($konekcija,"delete from rezrvacija where idrezervacija = '$id'"); // delete query

if($del){
    echo "<script type='text/javascript'>
	alert('Succesfully deleted the car for reservation!');
	location='nalog.php';
	</script>";	
}
else{
    echo "<script type='text/javascript'>
	alert('Greska prilikom brisanja iz korpe');
	location='nalog.php';
	</script>";	// display error message if not delete
}

?>