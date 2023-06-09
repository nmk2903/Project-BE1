<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Project-Nhom9</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> 0773879257</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> nguyenminhkhoi02092003@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> CĐ Công Nghệ Thủ Đức</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
                    <li><a href="login/index.php"><i class="fa fa-user-o"></i><?php echo isset($_SESSION['user']) ? $_SESSION['user']:" Guest"; ?> </a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <img src="./img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="result.php" method="get">
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="2">Category 02</option>
                                </select>
                                <input class="input" name="keyword" placeholder="Search here">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="wishlist.php">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <?php
                                    $qty =0;
                                    if (isset($_SESSION['wishlist'])) {
                                        foreach ($_SESSION['wishlist'] as $key => $value) {
                                            $qty += $value;
                                        }
                                    }
                                    ?>

                                    
                                    <div class="qty"><?php echo $qty ?></div>                                    

                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <?php
                                    require "./config.php";
                                    require "./models/db.php";
                                    require "./models/product.php";
                                    require "./models/manufacture.php";
                                    $product = new Product;
                                    $products = $product->getAllProducts();
                                    $qty = 0;
                                    $totalCost = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $qty += $value;
                                        }
                                    }
                                    ?>
                                    <div class="qty"><?php echo $qty ?></div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <?php
                                        foreach ($products as $key => $valueproduct) {
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                    if ($valueproduct['id'] == $key) {
                                                        $total = 0;
                                                        $checkSale = true;
                                                        if ($valueproduct["feature"] != 1) {
                                                            $checkSale = true;
                                                        } else {
                                                            $checkSale = false;
                                                        } ?>
                                                        <div class="product-widget">
                                                            <div class="product-img">
                                                                <img src="./img/<?php echo $valueproduct['image'] ?>" alt="">
                                                            </div>
                                                            <div class="product-body">
                                                                <h3 class="product-name"><a href="#"><?php echo $valueproduct['name'] ?></a></h3>
                                                                <h4 class="product-price">
                                                                    <span class="product-price"><?php echo $value . "x " ?></span>
                                                                    <?php if ($checkSale == true) {
                                                                        $total += ($valueproduct["price"] * 0.7);
                                                                    } else {
                                                                        $total += $valueproduct['price'];
                                                                    }
                                                                    echo number_format($total);
                                                                    ?>
                                                                    <del class="product-old-price"><?php echo $checkSale ? number_format($valueproduct["price"]) : "" ?></del>
                                                                </h4>
                                                                <?php $totalCost += $value * $total ?>
                                                            </div>
                                                            <a href="del.php?id=<?php echo $valueproduct['id']; ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
                                                        </div>
                                        <?php }
                                                }
                                            }
                                        } ?>
                                    </div>
                                    <div class="cart-summary">
                                        <small><?php echo $qty ?> Item(s) selected</small>
                                        <h5>SUBTOTAL: <?php echo number_format($totalCost) ?></h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="viewcart.php">View Cart</a>
                                        <a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php
                    $arrCate = $product->getCategory();
                    for ($i = 0; $i < count($arrCate); $i++) {
                        echo "<li><a href=store.php?category=";
                        echo $arrCate[$i]["type_name"];
                        echo ">";
                        echo $arrCate[$i]["type_name"];
                        echo "</a></li>";
                    }
                    ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->