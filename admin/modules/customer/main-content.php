<?php
    require "../config/connection.php";
?>

<main id="main" data-page-content="customer">
    <div class="container">

        <?php
            // Alert boxes
            include('webpage-components/alert-box.php');
        ?>

        <div class="row">
            <div class="col-md-3">
                <aside class="left">
                    <?php
                        echo "<b>Thêm tài khoản khách hàng mới</b>";
                        echo "<hr>";
                        renderAside();
                    ?>
                </aside>
            </div>

            <?php
                // Select all brands in databse
                $sqlReadAllCustomers = "SELECT * FROM dbo.customer";
                $allCustomers = sqlsrv_query( $conn, $sqlReadAllCustomers);
            ?>

            <div class="col-md-9">
                <section class="right">
                    <table class="table">
                        <caption>Danh sách khách hàng đã đăng ký</caption>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Show all customer accounts -->
                            <?php
                                $i = 0;
                                while ($customer = sqlsrv_fetch_array($allCustomers)) {
                            ?>
                                <tr>
                                    <td><?php echo $customer['customer_id']; ?></td>
                                    <td><?php echo $customer['customer_name']; ?></td>
                                    <td><?php echo $customer['customer_email']; ?></td>
                                    <td><?php echo $customer['customer_address']; ?></td>
                                    <td>
                                        <button class="btn btn-success"
                                                    onclick="window.location.href='index.php?manage=customer&action=update&id= <?php echo $customer['customer_id']; ?> '">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-danger"
                                                    onclick="window.location.href='modules/customer/delete-customer.php?id= <?php echo $customer['customer_id']; ?> '">
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