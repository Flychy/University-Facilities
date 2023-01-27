<?php
    	include('..\connect\connn.php');
        $named = $_POST['named'];
    	$cod = $_POST['cod'];
        $spec= $_POST['spec'];
        $garanty = $_POST['garanty'];
    	mysqli_query($conn,"insert into `dispozitive` (`Nume dispozitiv`, `Cod dispozitiv`, `Specificatii`, `Garantie`) 
                    values ('$named','$cod','$spec','$garanty')");
    	header('location:table.php');
     
    ?>