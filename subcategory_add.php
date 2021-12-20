<?php 
	
	require 'db_connected.php';

	$name = $_POST['name'];
	$categoryid = $_POST['category'];

	$sql = 'INSERT INTO subcategory (name, category_id) VALUES (:value1, :value2)';
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $name);
	$stmt->bindParam(':value2', $categoryid);
	$stmt->execute();

	header('location:subcategory_list.php');
?>