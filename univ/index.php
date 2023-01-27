<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
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
            <a href="index.php">Home</a>
            <a href="home.php">Sali</a>
            <a href="statistici.php">Stats</a>
            <a href="html\connect\connect.html">Connect</a>
            <a href="#about" style="float:right">About</a>
        </div>

        <div class="content">
            
            <div class="faculty-card">
                <img src="images/faculty/facultatea_de_automatica_02.png" 
                      alt = "automatica" height = "200" width="400" />
                <h3>Facultatea de Automatica si Calculatoare</h3>
                <div class="card-back">
                    <p> Ingineria Sistemelor și Calculatoare și Tehnologia Informației.</p>
                </div>
            </div>
            <div class="faculty-card">
                <img src="images/faculty/facultatea_electronica_03-1024x681.jpeg" 
                      alt = "automatica" height = "200" width="400"/>
                <h3>Facultatea de Electronica Telecomunicatii si Tehnologie a Informatiei</h3>
            </div>
            <div class="faculty-card">
                <img src="images/faculty/facultatea_inginerie_electrica3-1024x683.jpg" 
                      alt = "automatica" height = "200" width="400"/>
                <h3>Facultatea de Inginerie Electrica</h3>
            </div>
        </div>
        <a>Pentru o vizualizare mai rapida a dotarilor fiecarei facultati, puteti selecta Facultatea dorita</a>
        <br><br>
        <div class="form-container">
          <form action="subquery.php" method="post">
            <label for="faculty_id">Selectare Facultate :</label>
            <select name="faculty_id" id="faculty_id">
                <?php
                    include('php\connect\connn.php');
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
    </body>
</html>