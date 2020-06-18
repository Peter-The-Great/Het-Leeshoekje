<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
$sql = "SELECT id,title,date FROM articles ORDER BY date DESC;";
$result = $conn->query($sql);
$username = $_SESSION['name'];
$id = $_SESSION['id'];

?>
<!doctype html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/618095047711391757/713383608932368434/default.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
	<title>De Colomnist Admin - Dashboard</title>
</head>
<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light main-nav">
	<div class="container">
		<ul class="nav mx-auto">
			<li class="nav-item">
				<a class="nav-link active text-dark" href="dashboard.php">Posts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-secondary" href="info.php">Biografie</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-secondary" href="../php/login/logout.php">Logout</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
	<?php echo '<a href="createbook.php" class="btn btn-success mt-5"><i class="fas fa-user-plus"></i> Post Aanmaken</a>' ?>
	<div class="center-div">
		<table class="table mt-2">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Titel</th>
					<th scope="col">Datum</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($result as $item) {
					echo "<td>" . $item["id"] . "</td>" . "<td>" . $item["title"] . "</td><td>" . $item["date"] . "</td></td><td><a href='../post.php?id=" . $item['id'] . "' class='btn btn-info'><i class='fas fa-eye'></i></a></td><td><a href='changebook.php?id=" . $item['id'] . "' class='btn btn-warning'><i class='fas fa-user-edit'></i></a></td><td><a href='../php/removepost.php?id=" . $item["id"] . "' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td></tr>";
				}
				?>
			</tbody>
		</table>

	</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/24c24daece.js"></script>

</html>