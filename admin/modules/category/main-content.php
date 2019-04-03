<?php
    require "../config/connection.php";
?>

<main id="main" data-page-content="category">
    <div class="container">
        <?php
            // Alert boxes
            include('webpage-components/alert-box.php');
        ?>

        <div class="row">
            <div class="col-md-3">
                <aside class="left">
                    <?php
                        echo "<b>Thêm loại hàng mới</b>";
                        echo "<hr>";
                        renderAside();
                    ?>
                </aside>
            </div>

            <?php
                // Select all categories in databse
                $sqlReadAllCategories = "SELECT * FROM dbo.category ORDER BY category_name ASC";
                $allCategories = sqlsrv_query( $conn, $sqlReadAllCategories);
            ?>
            <div class="col-md-9">
                <section class="right">
                    <table class="table">
                        <caption>Danh sách loại hàng</caption>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên loại hàng</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Show all categories -->
                            <?php
                                $i = 0;
                                while ($category = sqlsrv_fetch_array($allCategories)) {
                            ?>
                                    <tr>
                                        <td><?php echo $category['category_id'] ?></td>
                                        <td><?php echo $category['category_name']; ?></td>
                                        <td>
                                            <button class="btn btn-success"
                                                    onclick="window.location.href='index.php?manage=category&action=update&id= <?php echo $category['category_id']; ?> '">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-danger"
                                                    onclick="window.location.href='modules/category/delete-category.php?id= <?php echo $category['category_id']; ?> '">
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