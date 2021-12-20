<?php 

	require 'db_connected.php';

	$id = $_POST['id'];

	$sql = "DELETE FROM item WHERE id=:value1";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $id);
	$stmt->execute();

	header('location: item_list.php');

?>