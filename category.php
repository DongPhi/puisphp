<?php 
    require_once('./layouts/conndb.php');
    // -- Lấy sản phẩm theo danh mục
    $categoryId = getGet('id');
    $sql = "select * from Category where Category.id = $categoryId";
    $category = executeResult($sql, true);

    $category_id = getGet('id');
    if($category_id == null || $category_id == ''){
        $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit 0,12";
    }else{
        $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = $category_id and Product.deleted = 0 order by Product.updated_at desc limit 0,12";
    }
	$lastestItems = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./layouts/head.php'); ?>
    <title>Điện Thoại - Laptop - Phụ Kiện</title>
</head>
<body>
    <?php require_once('./layouts/header.php'); ?>
    <div class="container mt-4 mb-5">
    <div class="line-bot"><a href="index.php">Trang chủ</a><span> / </span><?=$category['name']?> </div>
    <h2 class="text-center font-weight-bold mt-4"><?=$category['name']?></h2>
        <div class="row">
            <?php
            foreach($lastestItems as $item){
                echo '
                <div class="col-sm-3">
                    <div class="product-item text-center">
                        <a href="detail.php?id='.$item['id'].'">
                            <img src="'.$item['thumbnail'].'" alt="" width="220px"  height="220px">
                            <div class="font-weight-bold">'.$item['title'].'</div>
                            <div>'.number_format($item['price']).' đ</div>
                            <div>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div>
                        </a>
                        <button onclick="addCart('.$item['id'].', 1)" type="button" class="btn btn-success">Thêm vào giỏ</button>
                    </div>
                </div>';
            } ?> 
        </div>
    </div>
    <?php require_once('./layouts/footer.php'); ?>
</body>
</html>