<?php
    	$id=$_GET['id'];
    	include('..\connect\connn.php');
    	mysqli_query($conn,"delete from `dispozitive` where `ID Dispozitiv`='$id'");
    	header('location:table.php');
    ?>