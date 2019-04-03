<?php
    require "../config/connection.php";
?>

<main id="main" data-page-content="stock">
    <div class="container">
        <?php
            // Alert boxes
            include('webpage-components/alert-box.php');
        ?>

        <div class="row">
            <div class="col-md-3">
                <aside class="left">
                    <?php
                        echo "<b>Thêm nhà sản xuất mới</b>";
                        echo "<hr>";
                        renderAside();
                    ?>
                </aside>
            </div>

            <?php
                // Select all stocks in databse
                $sqlReadAllStocks = "SELECT * FROM dbo.stock ORDER BY stock_name ASC";
                $allStocks = sqlsrv_query( $conn, $sqlReadAllStocks);
            ?>
            <div class="col-md-9">
                <section class="right">
                    <table class="table">
                        <caption>Danh sách kho</caption>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên kho</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Show all stocks -->
                            <?php
                                $i = 0;
                                while ($stock = sqlsrv_fetch_array($allStocks)) {
                            ?>
                                    <tr>
                                        <td><?php echo $stock['stock_id'] ?></td>
                                        <td><?php echo $stock['stock_name']; ?></td>
                                        <td>
                                            <button class="btn btn-success"
                                                    onclick="window.location.href='index.php?manage=stock&action=update&id= <?php echo $stock['stock_id']; ?> '">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-danger"
                                                    onclick="window.location.href='modules/stock/delete-stock.php?id= <?php echo $stock['stock_id']; ?> '">
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
    </div>
</main>