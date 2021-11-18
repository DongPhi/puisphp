<?php
if(!empty($_POST)) {
	$id = getPost('id');
	$title = getPost('title');
	$price = getPost('price');
	$discount = getPost('discount');
	$thumbnail = moveFile('thumbnail');
	$description = getPost('description');
	$category_id = getPost('category_id');
	$created_at = $updated_at = date("Y-m-d H:i:s");	

	if($id > 0) {
		//update
		if($thumbnail != ''){
			$sql = "update Product set thumbnail = '$thumbnail', title = '$title', price = $price, discount = $discount, description = '$description', updated_at = '$updated_at', category_id = '$category_id' where id = $id";	
		}else{
			$sql = "update Product set title = '$title', price = $price, discount = $discount, description = '$description', updated_at = '$updated_at', category_id = '$category_id' where id = $id";
		}
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