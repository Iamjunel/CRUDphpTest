<?php
require_once 'config.php';
	
	 $id = $_GET["id"];

	$sql = "DELETE FROM MyGuests WHERE id=$id";

	if (mysqli_query($conn, $sql)) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}
	

	header('location: index.php');