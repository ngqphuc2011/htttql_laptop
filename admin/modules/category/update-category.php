<?php
    require "../config/connection.php";

    $sqlReadCategoryById = "SELECT * FROM dbo.category WHERE category_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlReadCategoryById, $params);
    $category = sqlsrv_fetch_array($stmt);
?>

<form action="modules/category/process.php" method="POST">
    <input type="hidden" name="category-id" value="<?php echo $_GET['id'] ?>">
    <div class="form-group">
        <label for="brand-name-input">Tên loại hàng</label>
        <input type="text" class="form-control" name="category-name" id="category-name-input" value="<?php echo $category['category_name']; ?>" required>
    </div>
    <input type="submit" class="btn btn-success" name="update" value="Cập nhật">
</form>