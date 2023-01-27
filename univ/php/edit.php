<?php
    	include('connect\connn.php');
    	$id=$_GET['id'];
    	$query=mysqli_query($conn,"select * from `facultate` where `ID Facultate`='$id'");
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
    		<label>Nume facultate:</label><input type="text" value="<?php echo $row['Nume Facultate']; ?>" name="namef">
    		<label>Adresa:</label><input type="text" value="<?php echo $row['Adresa']; ?>" name="adress">
            <label>Telefon:</label><input type="text" value="<?php echo $row['Telefon']; ?>" name="tel">
            <label>Email:</label><input type="text" value="<?php echo $row['Email']; ?>" name="email">
            <label>Website:</label><input type="text" value="<?php echo $row['Website']; ?>" name="webs">
            <label>Descriere:</label><input type="text" value="<?php echo $row['Descriere']; ?>" name="desc">

    		<input type="submit" name="submit">
    		<a href="index.php">Back</a>
    	</form>
    </body>
    </html>