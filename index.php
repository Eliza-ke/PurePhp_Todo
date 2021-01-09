<?php 
require 'config.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<?php
	 $pdostatement =$pdo->prepare("SELECT * FROM todo ORDER BY id DESC"); 
	 $pdostatement->execute();
	 $result =$pdostatement->fetchAll();
	?>
	<div class);="card">
		<div class="card-body">
			<i><h2>Task List</h2></i>

			<div style="margin:5px "> <a href="add.php" class="btn btn-primary">Create New</a> </div>

			<table class="table table-stripped">
				<thead>
					<tr>
						<td>No</td>
						<td>Title</td>
						<td>Description</td>
						<td>Date</td>
						<td>Action</td>
					</tr>
				</thead>
			
				<?php 
				$i = 1;
				if ($result) {
					foreach ($result as $value) { 
				?>			
				<tbody>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $value['title']?></td>
						<td><?php echo $value['description']?></td>
						<td><?php echo date('Y-m-d',strtotime($value['create_at']))?></td>
						<td>
							<a href="edit.php?id=<?php echo $value['id']; ?>" type="button" class="btn btn-success">Edit</a>
							<a href="delete.php?id=<?php echo $value['id']; ?>" type="button" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				</tbody>
				<?php 
					$i++;
					}
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>