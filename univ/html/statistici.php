<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
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
            <a href="realhome.php">Home</a>
            <a href="faculty.html">Logout</a>
            <a href="../php/features/table.php">Edit Features</a>
            <a href="../php/table.php">Edit Faculty</a>
            <a href="home.php">Sali</a>
            <a href="statistici.php">Stats</a>
            <a href="#about" style="float:right">About</a>
        </div>
        <div class="content-stats">
            <div class="statistic">
                <h3>Cea mai mare sala din campus</h3>
            <?php 
                    include('..\php\connect\connn.php');

                    $sql = "SELECT f.`Nume Facultate`, s.`Nume sala`, s.Locuri
                            FROM facultate f
                            JOIN sala s ON f.`ID Facultate` = s.`ID Sala`
                            WHERE s.Locuri IN (SELECT MAX(s2.Locuri)
                                            FROM sala s2)
                            ORDER BY s.Locuri DESC;";
                    $result = $conn->query($sql);
                    //display data on web page
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        echo " ".$row["Nume sala"]. "  ".$row["Locuri"].
                        " locuri ".$row["Nume Facultate"]."  ". "</br></br>";
                    }
                }
                ?>
               </div> 
               <div class="statistic">
            <h3>Numarul total de locuri disponibile in fiecare facultate</h3>
             <?php 
                include('..\php\connect\connn.php');

                $sql = "SELECT f.`Nume Facultate`,(SELECT SUM(s.Locuri)
                                                   FROM sala s
                                                   WHERE s.`ID Facultate` = f.`ID Facultate`) AS TotalLocuri
                        FROM facultate f;";
                $result = $conn->query($sql);
                //display data on web page
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                       echo " ".$row["Nume Facultate"]. "  ".$row["TotalLocuri"]. "</br></br>";
                   }
               }
             ?>
            </div>
            <div class="statistic">
            <h3>TOP 3 Facultati cu cele mai multe dispozitive </h3>
            <?php 
                include('..\php\connect\connn.php');

                $sql = "SELECT facultate.`Nume Facultate`, SUM(saladispozitive.`Cantitate dispozitive`) as TotalDeviceQuantity
                        FROM facultate
                        INNER JOIN (
                            SELECT sala.`ID Facultate`, SUM(saladispozitive.`Cantitate dispozitive`) as `Cantitate dispozitive`
                            FROM sala
                            INNER JOIN saladispozitive ON sala.`ID Sala` = saladispozitive.`ID Sala`
                            GROUP BY sala.`ID Facultate`
                        ) saladispozitive ON facultate.`ID Facultate` = saladispozitive.`ID Facultate`
                        GROUP BY facultate.`Nume facultate`
                        ORDER BY TotalDeviceQuantity DESC";
                $result = $conn->query($sql);
                //display data on web page
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                       echo " ".$row["Nume Facultate"]. " ".$row["TotalDeviceQuantity"]. "</br></br>";
                   }
               }
             ?>
            </div>

        </div>


    </body>
        



</html>