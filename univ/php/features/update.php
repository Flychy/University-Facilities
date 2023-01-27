<?php
    	include('..\connect\connn.php');
    	$id=$_GET['id'];
        $named = $_POST['named'];
    	$cod = $_POST['cod'];
        $spec= $_POST['spec'];
        $garanty = $_POST['garanty'];

        mysqli_query($conn,"update `dispozitive` set `Nume dispozitiv`='$named', `Cod dispozitiv`='$cod', `Specificatii`='$spec', `Garantie`='$garanty' where `dispozitive`.`ID Dispozitiv`='$id'");

    	header('location:table.php');
    ?>