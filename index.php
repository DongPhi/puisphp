<?php 
    session_start();
    require_once('utils/utility.php');
    require_once('database/dbhelper.php');

    // --- Lấy danh mục sản phẩm
    $sql = "select * from Category";
	$menuItems = executeResult($sql);

    // --- Lấy banner
    $sql = "select * from Banner";
	$bannerItem = executeResult($sql);


    // -- Lấy sản phẩm mới nhất
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit 0,5";
	$lastestItems = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="./assets/css/client/styles.css">
    <link rel="shortcut icon" href="./assets/images/favico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <title>Điện thoại chất</title>
</head>
<body> 
    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="./assets/images/favico.ico" alt="" width="85px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-2 ml-2">
                            <a class="nav-link text-uppercase" href="index.php">Trang chủ</a>
                        </li>
                        <?php 
                            foreach($menuItems as $item){
                                echo '
                                <li class="nav-item mr-2 ml-2">
                                    <a class="nav-link text-uppercase" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
                                </li> 
                                ';
                            }
                        ?>
                        <li class="nav-item mr-2 ml-2">
                            <a class="nav-link text-uppercase" href="index.php">Bài viết</a>
                        </li>
                        <li class="nav-item mr-2 ml-2">
                            <a class="nav-link text-uppercase" href="index.php">Liên hệ</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <span class="dot mr-2 ml-2"><a href=""><i class="fas fa-search"></i></a></span>
                        <span class="dot mr-2 ml-2"><a href=""><i class="fas fa-user"></i></a></span>
                        <span class="dot mr-2 ml-2"><a href=""><i class="fas fa-shopping-basket"></i></a></span>
                    </form>
                </div>
            </div>
        </nav>
    </div>
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
    <div class="lastestProduct mt-5 pb-4">
        <div class="container">
            <div class="text-center mb-4"><h2 class="font-weight-bold"> - Sản phẩm mới nhất -</h2></div>
            <div class="owl-carousel owl-theme">
                <?php 
                    if(!empty($lastestItems)){
                        foreach($lastestItems as $item){
                ?>
                    <div class="text-center">
                        <div class="product-item">
                            <a class="" href="">
                                <img src="<?php echo $item["thumbnail"];?>" alt=""  height="auto">
                                <p><?php echo $item["title"];?></p>
                                <p>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                </p>
                                <p><?php echo number_format($item["price"]);?> đ</p>
                            </a>
                            <button type="button" class="btn btn-success">Thêm vào giỏ hàng</button>
                        </div>
                        
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div> 
    </div>
    <div>
        <div class="container">
            <div class="text-center mt-5"><h2 class="font-weight-bold"> - Danh mục hàng hóa -</h2></div>
        </div>
    </div>
    <div class="menu-footer mt-5">
        <div class="container mt-3 mb-2">
            <div class="row">
                <div class="col-sm-3">
                    <h4>Hỗ trợ khách hàng</h4>
                        <a href=""><p>Chính Sách Đổi Trả</p></a>  
                        <a href=""><p>Chính Sách Bảo Mật</p></a> 
                        <a href=""><p>Chính Sách Bảo Hành</p></a>
                        <a href=""><p>Chính Sách Giao Hàng</p></a>
                        <a href=""><p>Phương Thức Thanh Toán</p></a>
                </div>
                <div class="col-sm-3">
                    <h4>Pui's Mobile</h4>
                    <a href=""><p>Về Pui's</p></a>
                    <a href=""><p>Tuyển dụng</p></a>
                    <a href=""><p>Khuyến mãi</p></a>
                    <a href=""><p>Hỏi đáp</p></a>
                    <a href=""><p>Tra cứu bảo hành</p></a>
                </div>
                <div class="col-sm-3">
                    <h4>Tổng đài hỗ trợ</h4>
                    <p>Tư vấn mua hàng </br> <b>0968.123.367</b></p>
                    <p>Hỗ trợ kỹ thuật </br> <b>0582.565.855</b></p>
                    <p>Khiếu nại - gói ý </br> <b>0582.565.855</b></p>
                </div>
                <div class="col-sm-3">
                    <h4>Liên hệ</h4>
                    <p><i class="fas fa-map-marker-alt mr-1"></i> 104 Bình An 7, Hải Châu, Đà Nẵng</p>
                    <p><i class="fas fa-phone-alt mr-1"></i> 0582.565.855</p>
                    <p><i class="fas fa-envelope mr-1"></i> dongphivnn@gmail.com</p>
                    <h4>Mạng xã hội</h4>
                    <a class="icon-social mr-3" href=""><span><i class="fab fa-facebook-square"></i></span></a>
                    <a class="icon-social mr-3" href=""><span><i class="fab fa-instagram"></i></span></a>
                    <a class="icon-social mr-3" href=""><span><i class="fab fa-youtube"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Bản quyền của Pui's Mobile ® 2021. Bảo lưu mọi quyền. </br> Ghi rõ nguồn "www.puis.com.vn" ® khi sử dụng lại thông tin từ website này.</p>
    </div>
	<script>
        $(document).ready(function(){
    	    $('.owl-carousel').owlCarousel({
                margin:70,
                loop:true,
                dots: false,
                nav:true,
                responsive:
                {
                0:{items:1},
                575:{items:3},
                768:{items:4}
                }
    		});

    	});
    </script>
    
</body>
</html>