<?php
    require "../config/connection.php";

    $sqlReadBrandById = "SELECT * FROM dbo.brand WHERE brand_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlReadBrandById, $params);
    $brand = sqlsrv_fetch_array($stmt);
?>

<form action="modules/brand/process.php" method="POST">
    <input type="hidden" name="brand-id" value="<?php echo $_GET['id'] ?>">
    <div class="form-group">
        <label for="brand-name-input">Tên thương hiệu/nhà sản xuất</label>
        <input type="text" class="form-control" name="brand-name" id="brand-name-input" value="<?php echo $brand['brand_name']; ?>" required>
    </div>
    <input type="submit" class="btn btn-success" name="update" value="Cập nhật">
</form>