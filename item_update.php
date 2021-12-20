
<?php 
	
	require('db_connected.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$oldphoto = $_POST['oldphoto'];
	$codeno = $_POST['code'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$description = $_POST['description'];
	$brand = $_POST['brandid'];
	$subcategory = $_POST['subcategoryid'];

	$newphoto = $_FILES['newphoto'];

	if ($newphoto['size'] > 0) {
		$basepath="image/item/";
		$fullpath=$basepath.$newphoto['name']; //photo/category/vote1.jpg
		move_uploaded_file($newphoto['tmp_name'], $fullpath);
	}
	else{
		$fullpath = $oldphoto;
	}

	$sql = "UPDATE item SET name=:value1, photo=:value2, codeno=:value3, price=:value4, discount=:value5,description=:value6,brand_id=:value7, subcategory_id=:value8  WHERE id=:value9";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $name);
	$stmt->bindParam(':value2', $fullpath);
	$stmt->bindParam(':value3', $codeno);
	$stmt->bindParam(':value4', $price);
	$stmt->bindParam(':value5', $discount);
	$stmt->bindParam(':value6', $description);
	$stmt->bindParam(':value7', $brand);
	$stmt->bindParam(':value8', $subcategory);
	$stmt->bindParam(':value9', $id);

	$stmt->execute();

	header('location:item_list.php');


?>

