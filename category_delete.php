<?php 

	require 'db_connected.php';

	$id = $_POST['id'];

	$sql = "DELETE FROM category WHERE id=:value1";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $id);
	$stmt->execute();

	header('location: category_list.php');

?>