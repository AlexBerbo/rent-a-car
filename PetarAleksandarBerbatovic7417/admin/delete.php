<?php
	$konekcija= new mysqli('localhost', 'root', '', 'carrent');
    // Check connection
		if($konekcija->error)
		die("Greska".$konekcija->error);

	$id = $_GET['id']; // get id through query string
	$del = mysqli_query($konekcija, "delete from car where idcar = '$id'"); // delete query

	if($del){
    	echo "<script type='text/javascript'>
		alert('Car succesfully removed');
		location='carlist.php';
		</script>";	
	}
	else{
    	echo "<script type='text/javascript'>
		alert('Error!');
		location='index.php';
		</script>"; // display error message if not delete
	}
?>