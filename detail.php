<?php 
    require_once('./layouts/conndb.php'); 

    $productId = getGet('id');
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.id = $productId";
    $product = executeResult($sql, true);

    $category_id = $product['category_id'];
    
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = $category_id and Product.deleted = 0 order by Product.updated_at desc limit 0,4";
	$lastestItems = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./layouts/head.php'); ?>
    <title>Document</title>
</head>
<body>
    <?php require_once('./layouts/header.php'); ?>
    <div class="container mt-4 mb-5">
        <div>
            <div class="line-bot"><a href="index.php">Trang chủ</a><span> / </span><a href="category.php?id=<?=$product['category_id']?>"><?=$product['category_name']?></a><span> / </span><?=$product['title']?></div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-8">
                <img src="<?=$product['product_banner']?>" alt="" width="100%">
            </div>
            <div class="col-sm-4">
                <h3 class="font-weight-bold"><?=$product['title']?></h3>
                <div>
                    <span class="product-review text-warning">4.0</span>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="far fa-star text-warning"></i>
                    <span class="heart-product">500 yêu thích</span>
                </div>
                <div class="attribute mt-1">
                    <div>
                        <span>Dung lượng: </span>
                    </div>
                    <div>
                        <a class="att-item active" href="">64GB</a>
                        <a class="att-item" href="">128GB</a>
                        <a class="att-item" href="">256GB</a>
                    </div>
                    
                </div>
                <div class="attribute mt-1">
                    <div><span>Màu sắc: </span></div>
                    <div>
                        <a class="att-item active" href="">Đỏ</a>
                        <a class="att-item" href="">Đen</a>
                        <a class="att-item" href="">Trắng</a>
                        <a class="att-item" href="">Xanh lá</a>
                        <a class="att-item" href="">Tím</a>
                    </div>
                </div>
                <div class="money-product mt-1">
                    <span class="money-item font-weight-bold"><?= number_format($product['price'])?> đ</span>
                    <span class="pay">Trả góp 0%</span>
                </div>
                <div class="quantity">
                    <div class="row">
                        <div class="col-2">
                            <input type="number" name="num" value="1" step="1" onchange="fixCartNum()">
                        </div>
                        <div class="col">
                            <div class="quantity-nav">
                                <button class="quantity-button quantity-up" onclick="addMoreCart(1)">+</button>
                            </div>
                            <div class="quantity-nav">
                                <button class="quantity-button quantity-down" onclick="addMoreCart(-1)">-</button>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="pay-product mt-3">
                    <button onclick="addCart(<?=$product['id']?>, $('[name=num]').val())" type="button" class="btn btn-success w-100">Thêm vào giỏ hàng</button>
                </div>
                <div class="pay-product mt-1">
                    <button type="button" class="btn btn-info w-100">Xem giỏ hàng</button>
                </div>
                <div class="mt-4">
                    <h4 class="font-weight-bold">Thông số kỹ thuật</h4>
                    <div class="text-size-16"><?=$product['specifications']?></div>
                </div>
            </div>
        </div>
        <div class="mt-4">  
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="font-weight-bold">Đánh giá chi tiết <?=$product['title']?></h4>
                    <div class="text-size-17"><?=$product['description']?></div>  
                </div>
                <div class="col-sm-4">
                    
                </div>  
            </div>
            
        </div>
        <div class="mt-4">
            <div class=""><h4 class="font-weight-bold">Sản phẩm liên quan</h4></div>
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
    </div>
    <?php require_once('./layouts/footer.php'); ?>
</body>
</html>