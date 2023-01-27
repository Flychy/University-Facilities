<?php
    	$id=$_GET['id'];
    	include('connect\connn.php');
    	mysqli_query($conn,"delete from `facultate` where `ID Facultate`='$id'");
    	header('location:table.php');
    ?>