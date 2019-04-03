<?php
    require "../config/connection.php";
?>

<main id="main" data-page-content="product">
    <div class="container-fluid">
        <?php
            // Alert boxes
            include('webpage-components/alert-box.php');
        ?>

        <div class="row">
            <div class="offset-md-3 col-md-6">
                <section>
                    <?php
                        echo "<b>Thêm sản phẩm mới</b>";
                        echo "<hr>";
                        renderAside();
                        echo $GLOBALS['stock'];
                    ?>
                </section>
            </div>
        </div>
        <br>

        <?php
            // Select all products in databse
            $sqlReadAllProducts = "SELECT * FROM dbo.product WHERE stock_id = ? ORDER BY product_name ASC";
            $params = array($_SESSION['stock']);
            $allProducts = sqlsrv_query( $conn, $sqlReadAllProducts, $params);
        ?>

        <div>
            <section>
                <table class="table">
                    <caption>Danh sách sản phẩm</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Loại sản phẩm</th>
                            <th scope="col">Thương hiệ<u></u></th>
                            <th scope="col">Gía sản phẩm</th>
                            <th scope="col">Mô tả sản phẩm</th>
                            <th scope="col">Hình ảnh sản phẩm</th>
                            <!-- <th scope="col">Kho</th> -->
                            <th scope="col">Số lượng</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Show all products -->
                        <?php
                            $i = 0;
                            while ($product = sqlsrv_fetch_array($allProducts)) {
                        ?>
                                <tr>
                                    <td><?php echo $product['product_id'] ?></td>
                                    <td><?php echo $product['product_name']; ?></td>
                                    <td>
                                        <?php
                                            $sqlReadCategoryById = "SELECT * FROM dbo.category WHERE category_id = ?";
                                            $params = array($product['category_id']);
                                            $stmt = sqlsrv_query( $conn, $sqlReadCategoryById, $params);
                                            $category = sqlsrv_fetch_array($stmt);
                                            echo $category['category_name'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sqlReadBrandById = "SELECT * FROM dbo.brand WHERE brand_id = ?";
                                            $params = array($product['brand_id']);
                                            $stmt = sqlsrv_query( $conn, $sqlReadBrandById, $params);
                                            $brand = sqlsrv_fetch_array($stmt);
                                            echo $brand['brand_name'];
                                        ?>
                                    </td>
                                    <td><?php echo $product['product_price']; ?></td>
                                    <td><?php echo $product['product_desc']; ?></td>
                                    <td><img class="product-img" src="../<?php echo $product['product_img']; ?>"/></td>
                                    <!-- <td>
                                        <?php
                                            $sqlReadStockById = "SELECT * FROM dbo.stock WHERE stock_id = ?";
                                            $params = array($product['stock_id']);
                                            $stmt = sqlsrv_query( $conn, $sqlReadStockById, $params);
                                            $stock = sqlsrv_fetch_array($stmt);
                                            echo $stock['stock_name'];
                                        ?>
                                    </td> -->
                                    <td><?php echo $product['product_quantity']; ?></td>
                                    <td>
                                        <button class="btn btn-success"
                                                onclick="window.location.href='index.php?manage=product&action=update&id= <?php echo $product['product_id']; ?> '">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger"
                                                onclick="window.location.href='modules/product/delete-product.php?id= <?php echo $product['product_id']; ?> '">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</main>