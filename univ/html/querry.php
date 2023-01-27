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

        <div class="content">
            <div class="faculty-card">
                <img href="faculty/automatica.php" src="../images/faculty/facultatea_de_automatica_02.png" 
                      alt = "automatica" height = "200" width="400" />
                <a href="faculty/automatica.php"><h3>Facultatea de Automatica si Calculatoare</h3></a>
                <div class="card-back">
                <p>Sali : </p>
                <?php 
                    include('..\php\connect\connn.php');

                    $sql = "SELECT s.`Nume sala`
                            FROM `sala` s
                            INNER JOIN `facultate` f ON s.`ID Facultate` = f.`ID Facultate`
                            WHERE f.`Nume Facultate` = 'Automatica si Calculatoare'";
                    $result = $conn->query($sql);
                    //display data on web page
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        echo " - ".$row["Nume sala"]. "</br></br>";
                        }
                    }
                 ?>
                </div>
            </div>
            <div class="faculty-card">
                <img src="../images/faculty/facultatea_electronica_03-1024x681.jpeg" 
                      alt = "automatica" height = "200" width="400"/>
                    <a href = "faculty/etti.php"><h3>Facultatea de Electronica Telecomunicatii si Tehnologie a Informatiei</h3></a>
                    <div class="card-back">
                    <p>Sali : </p>
                    <?php 

                    include('..\php\connect\connn.php');

                    $sql = "SELECT s.`Nume sala`
                            FROM `sala` s
                            INNER JOIN `facultate` f ON s.`ID Facultate` = f.`ID Facultate`
                            WHERE f.`Nume Facultate` = 'Electronica Telecomunicatii si Tehnologia Informat'";
                    $result = $conn->query($sql);
                    //display data on web page
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    echo " - ".$row["Nume sala"]. "</br></br>";
                    }
                }
                ?>
                 </div>
            </div>
            <div class="faculty-card">
                <img src="../images/faculty/facultatea_inginerie_electrica3-1024x683.jpg" 
                      alt = "automatica" height = "200" width="400"/>
                <h3>Facultatea de Inginerie Electrica</h3>
                <div class="card-back">
                <p>Sali : </p>
                    <?php 

                        include('..\php\connect\connn.php');

                        $sql = "SELECT s.`Nume sala`
                                FROM `sala` s
                                INNER JOIN `facultate` f ON s.`ID Facultate` = f.`ID Facultate`
                                WHERE f.`Nume Facultate` = 'Inginerie Electrica'";
                        $result = $conn->query($sql);
                        //display data on web page
                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                            echo " - ".$row["Nume sala"]. "</br></br>";
                         }
                        }

                    ?>
                </div>
            </div>
        </div>

        <div class="form-container">
          <form action="querry.php" method="post">
            <label for="sala_id">Selectare Sala :</label>
            <select name="sala_id" id="sala_id">
                <?php
                    include('..\php\connect\connn.php');
                    $query = "SELECT `ID Sala`, `Nume sala` FROM sala";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["ID Sala"] . "'>" . $row["Nume sala"] . "</option>";
                    }
                    $conn->close();
                ?>
            </select>
            <input type="submit" value="Submit">
           </form>
        </div>

    </body>
        
</html>

<?php
include('..\php\connect\connn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sala_id = $_POST["sala_id"];

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT s.`Nume sala`, SUM(sd.`Cantitate dispozitive`) as total
              FROM sala s
              JOIN saladispozitive sd ON s.`ID Sala` = sd.`ID Sala`
              WHERE s.`ID Sala` = ?
              GROUP BY s.`ID Sala`;";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $sala_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "Ati selectat sala : " . $row["Nume sala"] . " - totalul dispozitivelor continute de aceasta sala  : " . $row["total"] . "<br>";
    }

    $stmt->close();
    $conn->close();
}
?>
