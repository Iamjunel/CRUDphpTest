<?php


require_once 'config.php';

$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests order by id desc";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<h1>Total Guest: <?php echo mysqli_num_rows($result) ?></h1>
<a href="add.php" class="btn btn-primary m-2">Add Guest</a>


<table class="table table-bordered">
	<thead class="bg-primary">
		<th >Firstname</th>
		<th>Lastname</th>
		<th>Email</th>
		<th>Reg Date</th>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php
		if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)){

		?>
		<tr>
			<td><?php echo $row['firstname'] ?></td>
			<td><?php echo $row['lastname'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo date('D F d Y',strtotime($row['reg_date'])); ?></td>

			<td>
				<a  href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning">Update</a>
				
				<a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php
			}
		}else{
		?>
		<tr>
			<td colspan="4" class="text-center">No result</td>
			
		</tr>	
		<?php
		}

		?>
	</tbody>
</table>

</body>
</html>


