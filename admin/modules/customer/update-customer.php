<?php
    require "../config/connection.php";

    $sqlReadCustomerById = "SELECT * FROM dbo.customer WHERE customer_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlReadCustomerById, $params);
    $customer = sqlsrv_fetch_array($stmt);
?>

<form action="modules/customer/process.php" method="POST">
    <input type="hidden" name="customer-id" value="<?php echo $customer['customer_id']; ?>">
    <div class="form-group">
        <label for="customer-name-input">Tên khách hàng</label>
        <input type="text" class="form-control" name="customer-name" id="customer-name-input" value="<?php echo $customer['customer_name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="username-input">Email</label>
        <input type="email" class="form-control" name="customer-email" id="customer-email-input" value="<?php echo $customer['customer_email'] ?>" required>
    </div>
    <div class="form-group">
        <label for="password-input">Mật khẩu</label>
        <input type="text" class="form-control" name="customer-password" id="customer-password-input" value="<?php echo $customer['customer_password'] ?>" required>
    </div>
    <div class="form-group">
        <label for="address-input">Địa chỉ</label>
        <input type="text" class="form-control" name="customer-address" id="customer-address-input" value="<?php echo $customer['customer_address'] ?>" required>
    </div>
    <input type="submit" class="btn btn-info" name="update" value="Cập nhật">
</form>