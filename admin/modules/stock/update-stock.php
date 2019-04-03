<?php
    require "../config/connection.php";

    $sqlReadStockById = "SELECT * FROM dbo.stock WHERE stock_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlReadStockById, $params);
    $stock = sqlsrv_fetch_array($stmt);
?>

<form action="modules/stock/process.php" method="POST">
    <input type="hidden" name="stock-id" value="<?php echo $_GET['id'] ?>">
    <div class="form-group">
        <label for="stock-name-input">Tên kho</label>
        <input type="text" class="form-control" name="stock-name" id="stock-name-input" value="<?php echo $stock['stock_name']; ?>" required>
    </div>
    <input type="submit" class="btn btn-success" name="update" value="Cập nhật">
</form>