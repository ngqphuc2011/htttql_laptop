<?php
    require "../config/connection.php";

    // get order by id
    $sqlReadOrderById = "SELECT * FROM dbo.cart WHERE cart_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlReadOrderById, $params);
    $order = sqlsrv_fetch_array($stmt);

    // get customer by id
    $sqlReadCustomerById = "SELECT * FROM dbo.customer WHERE customer_id = ?";
    $params = array($order['customer_id']);
    $stmt = sqlsrv_query( $conn, $sqlReadCustomerById, $params);
    $cus = sqlsrv_fetch_array($stmt);

    // get cart_detail by id
    $sqlReadOrderDetailById = "SELECT * FROM dbo.cart_detail WHERE cart_id = ?";
    $params = array($order['cart_id']);
    $cartDetails = sqlsrv_query( $conn, $sqlReadOrderDetailById, $params);
?>
<b>Xem chi tiết đơn hàng</b>
<hr>

<div class="row">
    <div class="col-md-6">
        <div>Mã đơn hàng: <?php echo $order['cart_id']; ?></div>
        <div>Ngày đặt hàng: <?php echo $order['cart_date']->format("d-m-Y"); ?></div>
        <div>Thành tiền: <?php echo $order['cart_price']; ?> vnđ</div>
    </div>
    <div class="col-md-6">
        <div>Mã khách hàng: <?php echo $order['customer_id']; ?></div>
        <div>Tên khách hàng: <?php echo $cus['customer_name']; ?></div>
        <div>Địa chỉ khách hàng: <?php echo $cus['customer_address']; ?></div>
    </div>
</div>
<div class="row">
    <table class="table">
        <caption>Danh sách đơn hàng</caption>
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Có sẵn</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Ảnh sản phẩm</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 1;
                while ($cd = sqlsrv_fetch_array($cartDetails)) {
                    $sqlReadProductById = "SELECT * FROM dbo.product WHERE product_id = ?";
                    $params = array($cd['product_id']);
                    $stmt = sqlsrv_query( $conn, $sqlReadProductById, $params);
                    $product = sqlsrv_fetch_array($stmt);
            ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo ($product['stock_id'] == $_SESSION['stock']) ? "Có" : "Không"; ?></td>
                        <td><?php echo $cd['product_id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><img class="product-img" src="../<?php echo $product['product_img']; ?>"/></td>
                        <td><?php echo $product['product_price']; ?></td>
                        <td><?php echo $cd['cd_quantity'] ?></td>
                        <td><?php echo $cd['cd_price'] ?></td>
                    </tr>
            <?php
                    $count++;
                }
            ?>
        </tbody>
</div>