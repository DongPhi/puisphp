<?php
if(!empty($_POST)) {
	$id = getPost('id');
	$title = getPost('title');
	$price = getPost('price');
	$discount= getPost('discount');
	$thumbnail = getPost('thumbnail');
	$description = getPost('description');	
	$created_at = $updated_at = date("Y-m-d H:i:s");

	$category_id = getPost('category_id');

	if($id > 0) {
		//update
		$sql = "update Product set title = '$title',price = '$price',discount = '$discount',thumbnail = '$thumbnail', description = '$description' where id = $id";
		execute($sql);
		header('Location: index.php');
		die();

	} else {
		//insert
		$sql = "insert into Product(title, category_id, price, discount, thumbnail, description, created_at, updated_at, deleted) values ('$title', '$category_id', '$price', '$discount', '$thumbnail', '$description', '$created_at', '$updated_at', 0)";
		execute($sql);
		header('Location: index.php');
		die();
	}
}