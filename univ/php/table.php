<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <meta charset="UTF-8">
        <meta name="description" content=" This is an awsome website">
        <title>Home UPBI</title>
    </head>
    <body>
        <div class="header">
            <h1>UPBInsider</h1>
            <h6>See the truth about the University!</h6>
        </div>

        <div class="navbar">
            <a href="../html/realhome.php">Home</a>
            <a href="../faculty.html">Logout</a>
            <a href="features/table.php">Edit Features</a>
            <a href="table.php">Edit Faculty</a>
            <a href="../html/home.php">Sali</a>
            <a href="../html/statistici.php">Stats</a>
            <a href="#about" style="float:right">About</a>
        </div>
          <br><br><br>
    	<div>
    		<form method="POST" action="add.php">
    			<label>Nume facultate:</label><input type="text" name="namef">
    			<label>Adresa:</label><input type="text" name="adress">
                <label>Telefon:</label><input type="text" name="tel">
                <label>Email:</label><input type="text" name="email">
                <label>Website:</label><input type="text" name="webs">
                <label>Descriere:</label><input type="text" name="desc">
    			<input type="submit" name="add">
    		</form>
    	</div>
    	<br>
    	<div>
    		<table border="1">
    			<thead>
    				<th>Nume facultate</th>
    				<th>Adresa</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Descriere</th>
    				<th></th>
    			</thead>
    			<tbody>
    				<?php
    					include('connect\connn.php');
    					$query = mysqli_query($conn,"select * from `facultate`");
    					while($row = mysqli_fetch_array($query)){
    						?>
    						<tr>
    							<td><?php echo $row['Nume Facultate']; ?></td>
    							<td><?php echo $row['Adresa']; ?></td>
                                <td><?php echo $row['Telefon']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Website']; ?></td>
                                <td><?php echo $row['Descriere']; ?></td>
    							<td>
    								<a href="edit.php?id=<?php echo $row['ID Facultate']; ?>">Edit</a>
    								<a href="delete.php?id=<?php echo $row['ID Facultate']; ?> " onClick="return confirm('Delete this row?')">Delete</a>

    							</td>
    						</tr>
    						<?php
    					}
    				?>
    			</tbody>
    		</table>
    	</div>
    </body>
</html>