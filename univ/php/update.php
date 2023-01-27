<?php
    	include('connect\connn.php');
    	$id=$_GET['id'];
        $namef = $_POST['namef'];
    	$adress = $_POST['adress'];
        $tel= $_POST['tel'];
        $email= $_POST['email'];
        $webs= $_POST['webs'];
        $desc= $_POST['desc'];

        mysqli_query($conn,"update `facultate` set `Nume Facultate`='$namef', `Adresa`='$adress', `Telefon`='$tel', `Email`='$email', `Website`='$webs', `Descriere`='$desc' where `facultate`.`ID Facultate`='$id'");

    	header('location:table.php');
    ?>