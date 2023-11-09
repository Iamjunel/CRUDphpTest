<?php
require 'config.php';

$id = $_GET["id"];

/*get the record*/
$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests where id = $id";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);
/*end of getting the record*/

if(isset($_POST["submit"])){

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];

	$sql = "UPDATE MyGuests SET lastname='$lastname', firstname = '$firstname',email = '$email' WHERE id= '$id'";

	if (mysqli_query($conn, $sql)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	

	header('location: index.php');
}



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

	<div class="row container">
		<h2>Add New Guest</h2>
 <form  method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Lastname</label>
    <input type="text"  name="lastname" value="<?php echo $data["lastname"];?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Firstname</label>
    <input type="text" name="firstname" value="<?php echo $data["firstname"];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" value="<?php echo $data["email"];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>
	</div>

</body>
</html>