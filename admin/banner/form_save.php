<?php
if(!empty($_POST)) {
	$id = getPost('id');
	$thumbnail = moveFile('thumbnail');	
	if($id > 0) {
		//update
		if($thumbnail != ''){
			$sql = "update Banner set thumbnail = '$thumbnail' where id = $id";	
		}
		execute($sql);
		header('Location: index.php');
		die();

	} else {
		//insert
		$sql = "insert into Banner(thumbnail) values ( '$thumbnail')";
		execute($sql);
		header('Location: index.php');
		die();
	}
}