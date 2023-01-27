    <?php
    $conn = mysqli_connect("localhost:8111","root", "", "dotari");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    ?>