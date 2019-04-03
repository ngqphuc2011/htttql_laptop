<?php
    require "../config/connection.php";
?>

<main id="main" data-page-content="brand">
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
                // Select all brands in databse
                $sqlReadAllBrands = "SELECT * FROM dbo.brand ORDER BY brand_name ASC";
                $allBrands = sqlsrv_query( $conn, $sqlReadAllBrands);
            ?>
            <div class="col-md-9">
                <section class="right">
                    <table class="table">
                        <caption>Danh sách thương hiệu/nhà sản xuất</caption>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên thương hiệu</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Show all brands -->
                            <?php
                                $i = 0;
                                while ($brand = sqlsrv_fetch_array($allBrands)) {
                            ?>
                                    <tr>
                                        <td><?php echo $brand['brand_id'] ?></td>
                                        <td><?php echo $brand['brand_name']; ?></td>
                                        <td>
                                            <button class="btn btn-success"
                                                    onclick="window.location.href='index.php?manage=brand&action=update&id= <?php echo $brand['brand_id']; ?> '">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-danger"
                                                    onclick="window.location.href='modules/brand/delete-brand.php?id= <?php echo $brand['brand_id']; ?> '">
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