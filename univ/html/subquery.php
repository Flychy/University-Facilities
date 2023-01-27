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
                <img src="../images/faculty/facultatea_de_automatica_02.png" 
                      alt = "automatica" height = "200" width="400" />
                <h3>Facultatea de Automatica si Calculatoare</h3>
                <div class="card-back">
                    <p> Ingineria Sistemelor și Calculatoare și Tehnologia Informației.</p>
                </div>
            </div>
            <div class="faculty-card">
                <img src="../images/faculty/facultatea_electronica_03-1024x681.jpeg" 
                      alt = "automatica" height = "200" width="400"/>
                <h3>Facultatea de Electronica Telecomunicatii si Tehnologie a Informatiei</h3>
            </div>
            <div class="faculty-card">
                <img src="../images/faculty/facultatea_inginerie_electrica3-1024x683.jpg" 
                      alt = "automatica" height = "200" width="400"/>
                <h3>Facultatea de Inginerie Electrica</h3>
            </div>
        </div>
        <a>Pentru o vizualizare mai rapida a dotarilor fiecarei facultati, puteti selecta Facultatea dorita</a>
        <br><br>
        <div class="form-container">
          <form action="subquery.php" method="post">
                <label for="faculty_id">Selectati Facultatea :</label>
                <select name="faculty_id" id="faculty_id">
                    <?php
                        include('..\php\connect\connn.php');
                        $query = "SELECT `ID Facultate`, `Nume Facultate` FROM facultate";
                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["ID Facultate"] . "'>" . $row["Nume Facultate"] . "</option>";
                        }
                        $conn->close();
                    ?>
                </select>
                <input type="submit" value="Submit">
            </form>
        </div>
        <br>
    </body>
</html>
<?php
include('..\php\connect\connn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_id = $_POST["faculty_id"];

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT facultate.`Nume Facultate`, `TotalDeviceQuantity`.`Cantitate dispozitive`
    FROM facultate
    INNER JOIN (
        SELECT sala.`ID Facultate`, SUM(saladispozitive.`Cantitate dispozitive`) as `Cantitate dispozitive`
        FROM sala
        INNER JOIN saladispozitive ON sala.`ID Sala` = saladispozitive.`ID Sala`
        WHERE sala.`ID Facultate` = ?
        GROUP BY sala.`ID Facultate`
    ) TotalDeviceQuantity ON facultate.`ID Facultate` = TotalDeviceQuantity.`ID Facultate`";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $faculty_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "Ati selectat : " . $row["Nume Facultate"] . " - totalul dispozitivelor de care beneficiaza facultatea : " . $row["Cantitate dispozitive"] . "<br>";
    }

    $stmt->close();
    $conn->close();
}
?>
