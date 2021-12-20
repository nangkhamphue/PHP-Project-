<?php 
	
	require('db_connected.php');

	$name =	$_POST['name'];
	$photo = $_FILES['photo'];

	$source_dir = 'image/brand/';

	$basepath="image/brand/";
	$fullpath=$basepath.$photo['name']; //image/brand/brand1.jpg
	move_uploaded_file($photo['tmp_name'], $fullpath);
	$sql = "INSERT INTO brand (name, photo) VALUES(:value1, :value2)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $name);
	$stmt->bindParam(':value2', $fullpath);
	$stmt->execute();

	header('location:brand_list.php');

?>