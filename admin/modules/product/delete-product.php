<?php
    require "../../../config/connection.php";

    $sqlDeleteProductById = "DELETE FROM dbo.product WHERE product_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlDeleteProductById, $params);
    if ($stmt === false) {
        header('location:../../index.php?manage=product&error=delete');
    }
    else {
        header('location:../../index.php?manage=product&success=delete');
    }

    // close connection
    sqlsrv_close($conn);