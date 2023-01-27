<?php
    	include('..\connect\connn.php');
    	$id=$_GET['id'];
    	$query=mysqli_query($conn,"select * from `dispozitive` where `ID Dispozitiv`='$id'");
    	$row=mysqli_fetch_array($query);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Basic MySQLi Commands</title>
    </head>
    <body>
    	<h2>Edit</h2>
    	<form method="POST" action="update.php?id=<?php echo $id; ?>">
    		<label>Nume dispozitiv:</label><input type="text" value="<?php echo $row['Nume dispozitiv']; ?>" name="named">
    		<label>Cod dispozitiv:</label><input type="text" value="<?php echo $row['Cod dispozitiv']; ?>" name="cod">
            <label>Specificatii:</label><input type="text" value="<?php echo $row['Specificatii']; ?>" name="spec">
            <label>Garantie:</label><input type="text" value="<?php echo $row['Garantie']; ?>" name="garanty">

    		<input type="submit" name="submit">
    		<a href="index.php">Back</a>
    	</form>
    </body>
    </html>