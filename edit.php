<?php
require 'config.php';

if($_POST){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$desc = $_POST['description'];

	$pdostatement =$pdo->prepare("UPDATE todo SET title='$title', description='$desc' WHERE id='$id' ");
	$result = $pdostatement->execute();

	if ($result) {
		echo "<script>alert('New ToDO is edited');window.location.href='index.php' </script>"; 
	}
}

else{
	 $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']); 
	 $pdostatement->execute();
	 $result =$pdostatement->fetchAll();
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
			background: green;
			text-align: center;
			color: #fff;
			padding: 7px;
			
		}
	</style>
</head>value="<?php echo $result[0]['title'] ?>" required
<body>

<div class="card">
	<h2>Update Task</h2>
	<div class="card-body">
		<form action="" method="post">		
			<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo $result[0]['title'] ?>" required >
			</div>
			<br>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"><?php echo $result[0]['description'] ?> </textarea>
			</div>
			<br>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="UPDATE">
				<a href="index.php" type="button" class="btn btn-warning">Back </a>
			</div>
		</form>
	</div>
</div>
</body>
</html>