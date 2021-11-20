<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if($user == null) {
	die();
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteImage();
			break;
	}
}

function deleteImage() {
	$id = getPost('id');
	$sql = "delete from Banner where id = $id";
	execute($sql);
}