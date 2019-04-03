<?php
    session_start();
    require 'config/connection.php';
    // Select all categories in databse
    $sqlReadAllCategories = "SELECT * FROM dbo.category ORDER BY category_name ASC";
    $allCategories = sqlsrv_query( $conn, $sqlReadAllCategories);
    $mobile__allCategories = sqlsrv_query( $conn, $sqlReadAllCategories);

    // Select all categories in databse
    $sqlReadAllBrands = "SELECT * FROM dbo.brand ORDER BY brand_name ASC";
    $allBrands = sqlsrv_query( $conn, $sqlReadAllBrands);
    $mobile__allBrands = sqlsrv_query( $conn, $sqlReadAllBrands);
?>

<!-- Header -->

<header class="header">
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo"><a href="index.php">Laptop 69</a></div>
                        <nav class="main_nav">
                            <ul>
                                <li class="js-nav-item" data-page-content="home">
                                    <a href="index.php">Trang chủ</a>
                                </li>
                                <li class="hassubs" data-page-content="category">
                                    <a href="#">Danh mục</a>
                                    <ul>
                                        <?php
                                            
                                            while ($category = sqlsrv_fetch_array($allCategories)) {
                                        ?>
                                            <li><a href="product-list.php?category=<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></a></li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li class="hassubs" data-page-content="brand">
                                    <a href="#">Thương hiệu</a>
                                    <ul>
                                        <?php
                                            // require 'config/connection.php';
                                            // Select all categories in databse
                                            while ($brand = sqlsrv_fetch_array($allBrands)) {
                                        ?>
                                            <li><a href="product-list.php?brand=<?php echo $brand['brand_name']; ?>"><?php echo $brand['brand_name']; ?></a></li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li class="js-nav-item" data-page-content="contact">
                                    <a href="contact.php">Liên hệ</a>
                                </li>
                                <?php
                                    if (isset($_SESSION['customer-id'])) {
                                ?>
                                     <li class="js-nav-item" data-page-content="account">
                                        <a href="logout.php">Đăng xuất</a>
                                    </li>
                                <?php
                                    }
                                    else {
                                ?>
                                        <li class="hassubs js-nav-item" data-page-content="account">
                                            <a href="#">Tài khoản</a>
                                            <ul>
                                                <li><a href="login.php">Đăng nhập</a></li>
                                                <li><a href="register.php">Đăng ký</a></li>
                                            </ul>
                                        </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </nav>
                        <div class="header_extra ml-auto">
                            <div class="shopping_cart js-nav-item" data-page-content="cart">
                                <a href="cart.php">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
                                        <g>
                                            <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
                                            c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
                                            C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
                                            H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
                                            c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z" />
                                        </g>
                                    </svg>
                                    <div>
                                        <?php include('utils/math.php'); ?>
                                        Giỏ hàng 
                                        <span>(<?php
                                                    if (isset($_SESSION['customer-id'])) {
                                                        echo sumArray($_SESSION['product-quantity']);
                                                    }
                                                    else {
                                                        echo 0;
                                                    }
                                                ?>)
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Panel -->
    <!-- <div class="search_panel trans_300">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#"> 
                            <input type="text" class="search_input" placeholder="Search" required="required">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</header>

<!-- Menu -->

<div class="menu menu_mm trans_300">
    <div class="menu_container menu_mm">
        <div class="page_menu_content">

            <div class="page_menu_search menu_mm">
                <form action="#">
                    <input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
                </form>
            </div>
            <ul class="page_menu_nav menu_mm">
                <li class="page_menu_item has-children menu_mm" data-page-content="home">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="page_menu_item has-children menu_mm" data-page-content="category">
                    <a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                    <ul class="page_menu_selection menu_mm">
                        <?php
                            while ($mobile__category = sqlsrv_fetch_array($mobile__allCategories)) {
                        ?>
                            <li class="page_menu_item menu_mm">
                                <a href="product-list.php?category=<?php echo $mobile__category['category_id']; ?>">
                                <?php echo $mobile__category['category_name']; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
                <li class="page_menu_item has-children menu_mm" data-page-content="category">
                    <a href="#">Thương hiệu<i class="fa fa-angle-down"></i></a>
                    <ul class="page_menu_selection menu_mm">
                        <?php
                            while ($mobile__brand = sqlsrv_fetch_array($mobile__allBrands)) {
                        ?>
                            <li class="page_menu_item menu_mm">
                                <a href="product-list.php?brand=<?php echo $mobile__brand['brand_id']; ?>">
                                <?php echo $mobile__brand['brand_name']; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
                <li class="page_menu_item menu_mm" data-page-content="contact">
                    <a href="contact.php">Liên hệ</a>
                </li>
                <?php
                    if (isset($_SESSION['customer-id'])) {
                ?>
                    <li class="page_menu_item menu_mm">
                        <a href="logout.php">Đăng xuất</a>
                    </li>
                <?php
                    }
                    else {
                ?>
                    <li class="page_menu_item menu_mm">
                        <a href="register.php">Đăng ký</a>
                    </li>
                    <li class="page_menu_item menu_mm">
                        <a href="login.php">Đăng nhập</a>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>

    <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
</div>