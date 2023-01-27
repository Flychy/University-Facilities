<?php
    	include('connect\connn.php');
        $namef = $_POST['namef'];
    	$adress = $_POST['adress'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $webs = $_POST['webs'];
        $desc = $_POST['desc'];
    	mysqli_query($conn,"insert into `facultate` (`Nume Facultate`, `Adresa`, `Telefon`, `Email`, `Website`, `Descriere`) 
                    values ('$namef','$adress','$tel','$email','$webs','$desc')");
    	header('location:table.php');
     
    ?>