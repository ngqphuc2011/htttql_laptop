<form action="modules/customer/process.php" method="POST">
    <div class="form-group">
        <label for="customer-name-input">Tên khách hàng</label>
        <input type="text" class="form-control" name="customer-name" id="customer-name-input" required>
    </div>
    <div class="form-group">
        <label for="username-input">Email</label>
        <input type="email" class="form-control" name="customer-email" id="customer-email-input" required>
    </div>
    <div class="form-group">
        <label for="password-input">Mật khẩu</label>
        <input type="text" class="form-control" name="customer-password" id="customer-password-input" required>
    </div>
    <div class="form-group">
        <label for="address-input">Địa chỉ</label>
        <input type="text" class="form-control" name="customer-address" id="customer-address-input" required>
    </div>
    <input type="submit" class="btn btn-info" name="create" value="Thêm">
</form>