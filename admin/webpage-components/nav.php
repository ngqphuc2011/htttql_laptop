<?php
    session_start();
    require('../config/connection.php');

    $sqlReadStockById = "SELECT * FROM dbo.stock WHERE stock_id = ?";
    $params = array($_SESSION['stock']);
    $stmt = sqlsrv_query( $conn, $sqlReadStockById, $params);
    $currentStock = sqlsrv_fetch_array($stmt);
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" id="nav">
    <a class="navbar-brand" href="index.php?manage=chart">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class=" nav-link js-nav-item" href="index.php?manage=stock" data-page-content="stock">Quản lý kho</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link js-nav-item" href="index.php?manage=category" data-page-content="category">Quản lý loại hàng</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link js-nav-item" href="index.php?manage=brand" data-page-content="brand">Quản lý nhà sản xuất</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link js-nav-item" href="index.php?manage=product" data-page-content="product">Quản lý sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link js-nav-item" href="index.php?manage=order" data-page-content="order">Quản lý đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link js-nav-item" href="index.php?manage=customer" data-page-content="customer">Quản lý khách hàng</a>
            </li>
        </div>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Bạn muốn tìm kiếm gì?" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form> -->
        <div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kho <?php echo $currentStock['stock_name']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                            // Select all stocks in databse
                            $sqlReadAllStocks = "SELECT * FROM dbo.stock ORDER BY stock_name ASC";
                            $allStocks = sqlsrv_query( $conn, $sqlReadAllStocks);
                            while ($stock = sqlsrv_fetch_array($allStocks)) {
                        ?>
                            <a class="dropdown-item" href="set-stock.php?stock=<?php echo $stock['stock_id']; ?>"><?php echo $stock['stock_name']; ?></a>
                        <?php
                            }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>