<?php 
    session_start();
    require_once('utils/utility.php');
    require_once('database/dbhelper.php');

    // --- Lấy danh mục sản phẩm
    $sql = "select * from Category";
	$menuItems = executeResult($sql);

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
    
    <link rel="stylesheet" href="./assets/css/client/style.css">
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
                        <span class="dot mr-2 ml-2"><a href=""><i class="fas fa-heart"></i></a></span>
                        <span class="dot mr-2 ml-2"><a href=""><i class="fas fa-user"></i></a></span>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./assets/images/slide1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/images/slide2.png" alt="Second slide">
                </div>
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
        <div class="container">
            <div class="text-center mb-5"><h2 class="font-weight-bold"> - Sản phẩm mới nhất -</h2></div>
            <div class="owl-carousel owl-theme">
                <?php 
                    if(!empty($lastestItems)){
                        foreach($lastestItems as $item){
                ?>
                    <div>
                        <div class="text-center">
                            <img src="<?php echo $item["thumbnail"];?>" alt="" height="214px">
                            <p><?php echo $item["title"];?></p>
                            <p>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </p>
                            <p><?php echo number_format($item["price"]);?> đ</p>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div> 
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