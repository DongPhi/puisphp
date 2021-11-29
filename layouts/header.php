
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="./assets/images/favico.ico" alt="" width="85px"></a>
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
                    <?php
                        if(!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        }
                        $count = 0;
                        // var_dump($_SESSION['cart']);
                        foreach($_SESSION['cart'] as $item) {
                            $count += $item['num'];
                        }
                    ?>
                    <span class="dot mr-2 ml-2">
                        <a href="cart.php"><i class="fas fa-shopping-basket"></i></a>
                        <span><?=$count?></span>
                    </span>
                </form>
            </div>
        </div>
    </nav>
</div>