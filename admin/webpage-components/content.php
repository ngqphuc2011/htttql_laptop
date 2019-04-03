<?php
    $manage = isset($_GET['manage']) ? $_GET['manage'] : '';

    switch ($manage) {
        case 'chart':
            include('modules/chart/main-content.php');
            break;
        case 'stock':
            include('modules/stock/main-content.php');
            break;
        case 'category':
            include('modules/category/main-content.php');
            break;
        case 'brand':
            include('modules/brand/main-content.php');
            break;
        case 'product':
            include('modules/product/main-content.php');
            break;
        case 'order':
            include('modules/order/main-content.php');
            break;
        case 'customer':
                include('modules/customer/main-content.php');
                break;
        default:
            include('404.php');
            break;
    }