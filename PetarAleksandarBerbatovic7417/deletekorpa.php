<?php

$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    // Check connection
if($konekcija->error)
	die("Greska".$konekcija->error);

$id = $_GET['id'];

$del = mysqli_query($konekcija,"delete from korpa where idkorpa = '$id'"); // delete query

if($del){
	$del2 = mysqli_query($konekcija,"delete from rezrvacija order by idrezervacija desc LIMIT 1");
	if($del2){
		echo "<script type='text/javascript'>
		alert('Uspesno ste obrisali auto iz korpe!');
		location='nalog.php';
		</script>";
	}
    else{
    	echo "<script type='text/javascript'>
		alert('Greska prilikom brisanja iz korpe');
		location='nalog.php';
		</script>";	// display error message if not delete
	}
}
else{
    echo "<script type='text/javascript'>
	alert('Greska prilikom brisanja iz korpe');
	location='nalog.php';
	</script>";	// display error message if not delete
}

?>