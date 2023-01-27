<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../css/style.css">
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
            <a href="../../html/realhome.php">Home</a>
            <a href="../../html/faculty.html">Logout</a>
            <a href="table.php">Edit Features</a>
            <a href="../table.php">Edit Faculty</a>
            <a href="../../html/home.php">Sali</a>
            <a href="../../html/statistici.php">Stats</a>
            <a href="#about" style="float:right">About</a>
        </div>
		<div class="content">
			<div>
				<form method="POST" action="add.php">
					<label>Nume dispozitiv:</label><input type="text" name="named">
					<label>Cod dispozitiv:</label><input type="text" name="cod">
					<label>Specificatii:</label><input type="text" name="spec">
					<label>Garantie:</label><input type="text" name="garanty">
					<input type="submit" name="add">
				</form>
			</div>
			<br>
			<div>
				<table border="1">
					<thead>
						<th>Nume dispozitiv</th>
						<th>Cod dispozitiv</th>
						<th>Specificatii</th>
						<th>Garantie</th>
						<th></th>
					</thead>
					<tbody>
						<?php
							include('..\connect\connn.php');
							$query = mysqli_query($conn,"select * from `dispozitive`");
							while($row = mysqli_fetch_array($query)){
								?>
								<tr>
									<td><?php echo $row['Nume dispozitiv']; ?></td>
									<td><?php echo $row['Cod dispozitiv']; ?></td>
									<td><?php echo $row['Specificatii']; ?></td>
									<td><?php echo $row['Garantie']; ?></td>
									<td>
										<a href="edit.php?id=<?php echo $row['ID Dispozitiv']; ?>">Edit</a>
										<a href="delete.php?id=<?php echo $row['ID Dispozitiv']; ?> " onClick="return confirm('Delete this row?')">Delete</a>

									</td>
								</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>	
    </body>
</html>