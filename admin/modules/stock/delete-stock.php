<?php
    require "../../../config/connection.php";

    $sqlDeleteStockById = "DELETE FROM dbo.stock WHERE stock_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlDeleteStockById, $params);
    if ($stmt === false) {
        header('location:../../index.php?manage=stock&error=delete');
    }
    else {
        header('location:../../index.php?manage=stock&success=delete');
    }

    // close connection
    sqlsrv_close($conn);