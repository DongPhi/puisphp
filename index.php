<?php 
    require_once('./layouts/conndb.php');

    // --- Lấy banner
    $sql = "select * from Banner";
	$bannerItem = executeResult($sql);

    // -- Lấy sản phẩm mới nhất
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit 0,10";
	$lastestItems = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./layouts/head.php'); ?>
    <title>Điện Thoại - Laptop - Phụ Kiện</title>
</head>
<body> 
    <?php require_once('./layouts/header.php') ?>
    <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                    $i = 0;
                    foreach ($bannerItem as $item){
                        $actives = '';
                        if($i == 0){
                            $actives = 'active';
                        }
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i;?>" class="<?=$actives?>"></li>
                <?php $i++; } ?>
            </ol>
            <div class="carousel-inner">
                <?php 
                    $i = 0;
                    foreach ($bannerItem as $item){
                        $actives = '';
                        if($i == 0){
                            $actives = 'active';
                        }
                ?>
                <div class="carousel-item <?=$actives?>">
                    <img class="d-block w-100" src="<?= $item['thumbnail'] ?>" alt="First slide">
                </div>
                <?php $i++; } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="lastestProduct mt-5">
        <div class="container line">
            <div class="text-center mb-4"><h2 class="font-weight-bold"> - Sản phẩm mới nhất -</h2></div>
            <div class="owl-carousel owl-theme">
                <?php 
                    if(!empty($lastestItems)){
                        foreach($lastestItems as $item){
                ?>
                    <div class="text-center">
                        <div class="product-item">
                            <a href="detail.php?id=<?=$item['id']?>">
                                <img src="<?php echo $item["thumbnail"];?>" alt=""  height="100%">
                                <div class="font-weight-bold"><?php echo $item["title"];?></div>
                                <div><?php echo number_format($item["price"]);?> đ</div>
                                <div>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                </div>
                            </a>
                            <button onclick="addCart(<?=$item['id']?>,1)" type="button" class="btn btn-success">Thêm vào giỏ</button>
                        </div>
                        
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div> 
    </div>
    
    <?php 
        foreach($menuItems as $item){
        $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = ".$item['id']." order by Product.updated_at desc limit 0,8";
        $items = executeResult($sql);
        if($items == null || count($items) < 4) continue;
    ?>
        <div class="products">
            <div class="container line">
                <div class="text-center mt-4"><h2 class="font-weight-bold"> - <?=$item['name']?> -</h2></div>
                <div class="row text-center mb-4">
                    <?php 
                    foreach($items as $pItem){
                        echo'
                            <div class="col-sm-3">
                                <div class="product-item">
                                    <a href="detail.php?id='.$pItem['id'].'">
                                        <img src="'.$pItem['thumbnail'].'" alt="" width="220px"  height="220px">
                                        <div class="font-weight-bold">'.$pItem['title'].'</div>
                                        <div>'.number_format($pItem['price']).' đ</div>
                                        <div>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </a>
                                    <button onclick="addCart('.$pItem['id'].', 1)" type="button" class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php require_once('./layouts/footer.php'); ?>
	<script>
        $(document).ready(function(){
    	    $('.owl-carousel').owlCarousel({
                margin:5,
                loop:true,
                dots: false,
                nav:true,
                responsive:
                {
                0:{items:1},
                575:{items:3},
                768:{items:5}
                }
    		});

    	});
    </script>
    
</body>
</html>