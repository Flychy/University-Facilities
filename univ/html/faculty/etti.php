<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../css/style.css">
        <meta charset="UTF-8">
        <meta name="description" content=" This is an awsome website">
        <title>Home UPBI</title>
        <script>
            var facultyCards = document.querySelectorAll('.faculty-card');

            for (var i = 0; i < facultyCards.length; i++) {
                facultyCards[i].addEventListener('click', function() {
                    this.classList.toggle('flip');
                });
            }
        </script>
    </head>
    <body>
        <div class="header">
            <h1>UPBInsider</h1>
            <h6>See the truth about the University!</h6>
        </div>

        <div class="navbar">
            <a href="../realhome.php">Home</a>
            <a href="../faculty.html">Logout</a>
            <a href="../../php/features/table.php">Edit Features</a>
            <a href="../../php/table.php">Edit Faculty</a>
            <a href="../home.php">Sali</a>
            <a href="../statistici.php">Stats</a>
            <a href="#about" style="float:right">About</a>
        </div>

        <div class="content">
            
            <div class="faculty-card">
                <img src="../../images/faculty/facultatea_electronica_03-1024x681.jpeg" 
                 alt = "eetonica" height = "200" width="400"/>
                <h3>Facultatea de Electronica Telecomunicatii si Tehnologia Informatiei</h3>
                <div class="card-back">
                    <p> Telecomunicatii si Tehnologia Informatiei.</p>
                </div>
            </div>
        </div>
          
          <h4>Decan : </h4>
          <?php 

                include('..\..\php\connect\connn.php');

                $sql = "SELECT p.Prenume, p.Nume
                        FROM `personal` p
                        INNER JOIN `departament` d ON p.`ID Departament` = d.`ID Departament`
                        INNER JOIN `facultate` f ON f.`ID Facultate` = d.`ID Facultate`
                        WHERE f.`Nume Facultate` = 'Electronica Telecomunicatii si Tehnologia Informat' 
                        AND p.Functie = 'Decan' ;";
                $result = $conn->query($sql);
                //display data on web page
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                       echo "  ".$row["Prenume"]. "  ".$row["Nume"]. "</br></br>";
                   }
               }

        ?>
          <h4>Departamente : </h4>
          <?php 

                include('..\..\php\connect\connn.php');

                $sql = "SELECT d.`Nume departament`, p.Prenume, p.Nume
                        FROM `departament` d
                        INNER JOIN `personal` p ON d.`ID Departament` = p.`ID Departament`
                        INNER JOIN `facultate` f ON d.`ID Facultate` = f.`ID Facultate`
                        WHERE f.`Nume Facultate` = 'Electronica Telecomunicatii si Tehnologia Informat'";
                $result = $conn->query($sql);
                //display data on web page
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                       echo " Departamentul de ".$row["Nume departament"]. 
                       " (responsabil) ".$row["Prenume"]. "  ".$row["Nume"]. "</br></br>";
                   }
               }

        ?>
        <h4>Sali : </h4>
        <?php 

            include('..\..\php\connect\connn.php');

            $sql = "SELECT s.`Nume sala`, s.`Locuri`
                    FROM `sala` s
                    INNER JOIN `facultate` f ON s.`ID Facultate` = f.`ID Facultate`
                    WHERE f.`Nume Facultate` = 'Electronica Telecomunicatii si Tehnologia Informat'";
            $result = $conn->query($sql);
            //display data on web page
            if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                echo " - ".$row["Nume sala"]. " : ".$row["Locuri"]. " locuri ". "</br></br>";
            }
            }

         ?>
        <h4>Salile sunt dotate cu urmatoarele dispozitive : </h4>
        <?php 

            include('..\..\php\connect\connn.php');

            $sql = "SELECT DISTINCT d.`Nume dispozitiv`, sd.`Cantitate dispozitive`
                    FROM dispozitive d 
                    LEFT JOIN saladispozitive sd ON d.`ID Dispozitiv` = sd.`ID Dispozitiv`
                    JOIN `sala` s ON sd.`ID Sala` = s.`ID Sala`
                    JOIN `facultate` f ON s.`ID Facultate` = f.`ID Facultate`
                    WHERE f.`Nume Facultate` = 'Electronica Telecomunicatii si Tehnologia Informat';";
            $result = $conn->query($sql);
            //display data on web page
            if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                echo " - ".$row["Nume dispozitiv"]. " -> numar dispozitive :  ".$row["Cantitate dispozitive"]. "</br></br>";
                }
            }

         ?>
        <h4>Numarul total de dispozitive : </h4>

        <?php 

            include('..\..\php\connect\connn.php');

            $sql = "SELECT f.`Nume Facultate`, SUM(sd.`Cantitate dispozitive`) AS total
                    FROM saladispozitive sd
                    JOIN sala s ON sd.`ID Sala` = s.`ID Sala`
                    JOIN facultate f ON s.`ID Facultate` = f.`ID Facultate`
                    WHERE f.`Nume Facultate` = 'Electronica Telecomunicatii si Tehnologia Informat';";
            $result = $conn->query($sql);
            //display data on web page
            if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                echo "  ".$row["Nume Facultate"]. " detine un numar de  ".$row["total"]. " de astfel de dispozitive ". "</br></br>";
                }
            }

         ?>


        


    </body>
        



</html>