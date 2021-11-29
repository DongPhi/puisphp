<?php
if(!empty($_POST)) {
	$id = getPost('id');
	$title = getPost('title');
	$price = getPost('price');
	$discount = getPost('discount');
	$thumbnail = moveFile('thumbnail');
	$product_banner = moveFile('product_banner');
	$description = getPost('description');
	$specifications = getPost('specifications');
	$category_id = getPost('category_id');
	$created_at = $updated_at = date("Y-m-d H:i:s");	

	if($id > 0) {
		//update
		if($thumbnail != ''){
			$sql = "update Product set thumbnail = '$thumbnail', product_banner = '$product_banner', title = '$title', price = $price, discount = $discount, description = '$description', specifications='$specifications' , updated_at = '$updated_at', category_id = '$category_id' where id = $id";	
		}else if($product_banner != ''){
			$sql = "update Product set product_banner = '$product_banner', title = '$title', price = $price, discount = $discount, description = '$description', specifications='$specifications', updated_at = '$updated_at', category_id = '$category_id' where id = $id";
		}else{
			$sql = "update Product set title = '$title', price = $price, discount = $discount, description = '$description', specifications = '$specifications', updated_at = '$updated_at', category_id = '$category_id' where id = $id";
		}
		execute($sql);
		header('Location: index.php');
		die();

	} else {
		//insert
		$sql = "insert into Product(title, category_id, price, discount, thumbnail, product_banner, description, specifications, created_at, updated_at, deleted) values ('$title', '$category_id', '$price', '$discount', '$thumbnail', '$product_banner', '$description','$specifications','$created_at', '$updated_at', 0)";
		execute($sql);
		header('Location: index.php');
		die();
	}
}