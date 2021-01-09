<?php
require 'config.php';

if(!empty($_POST)){
	$title = $_POST['title'];
	$desc = $_POST['description'];

	$sql = "INSERT INTO todo (title,description) VALUES (:title ,:description)";
	$pdostatement =$pdo->prepare($sql);
	$result = $pdostatement->execute(
		array(
			':title' => $title,
			':description' => $desc
		)
	);
	if ($result) {
		echo "<script>alert('New ToDO is added');window.location.href='index.php' </script>";
	}
}	
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style type="text/css">
		.card{
			margin: 100px;
			border: 1px solid #ccc;
			padding: 0;
		}
		h2{
			background: darkblue;
			text-align: center;
			color: #fff;
			padding: 7px;
			
		}
		
	</style>
</head>
<body>

<div class="card">
	<h2>Add Task</h2>
	<div class="card-body">
		<div> <a href="add.php" class="btn btn-primary">Create New</a> </div>

		<br>
		<form class="form" action="add.php" method="post">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="description"></textarea>
			</div>
			<br>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-success" value="OK">
				<a href="index.php" type="button" class="btn btn-warning">Back</a>
			</div>
			<br>
		</form>
	</div>
</div>
</body>
</html>


