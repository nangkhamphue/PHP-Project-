<?php 
	
	require('db_connected.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$category_id =  $_POST['category'];

	$sql = "UPDATE subcategory SET name=:value1, category_id=:value2 WHERE id=:value3";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam('value1', $name);
	$stmt->bindParam('value2', $category_id);
	$stmt->bindParam('value3', $id);
	$stmt->execute();

	header('location:subcategory_list.php');


?>