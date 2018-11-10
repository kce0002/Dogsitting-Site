<!DOCTYPE html>
<html>
	<head>
		<title>Charley Chores</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="js/script.js"></script>
		<?php
			$dbhost = "10.1.100.7";
			$dbuser = "appuser";
			$dbpass = "password";
			$dbname = "charley";

			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			if (!$conn) {
				die("Connection failed: ".mysqli_connect_error());
			}

			$query = "SELECT * FROM chores;";
		?>
	</head>
	<body>
		<div id="myDIV" class="header">
			<h2>Charley Chores</h2>
			<p>Name - Task - Date - Time</p>
			<form method="POST" action="">
				<input type="text" id="myInput" placeholder="Chore..." name="myInput">
				<input type="submit" class="addBtn">
			</form>
			<?php
				if (isset($_POST['myInput'])) {
					$c = $_POST['myInput'];
					$q = "INSERT INTO chores VALUES ('".$c."');";
					mysqli_query($conn, $q);
					mysqli_close($conn);
					echo "<meta http-equiv='refresh' content='0'>";
				}
			?>
		</div>
		<ul id="myUL">
			<?php
				$result = mysqli_query($conn, $query);	
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<li>".$row["chore"]."</li>";
					}
				}
			?>
		</ul>
	</body>
</html>
