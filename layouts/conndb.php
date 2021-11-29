<?php 
    session_start();
    require_once('utils/utility.php');
    require_once('database/dbhelper.php');

    // --- Lấy danh mục sản phẩm
    $sql = "select * from Category";
	$menuItems = executeResult($sql);
?>