<?php
    require "../../../config/connection.php";

    $sqlDeleteOrderById = "DELETE FROM dbo.cart WHERE cart_id = ?";
    $sqlDeleteOrderDetailById = "DELETE FROM dbo.cart_detail WHERE cart_id = ?";
    $params = array($_GET['id']);
    $stmt1 = sqlsrv_query( $conn, $sqlDeleteOrderDetailById, $params);
    $stmt2 = sqlsrv_query( $conn, $sqlDeleteOrderById, $params);
    if ($stmt1 === false || $stmt2 === false) {
        header('location:../../index.php?manage=order&error=delete');
    }
    else {
        header('location:../../index.php?manage=order&success=delete');
    }

    // close connection
    sqlsrv_close($conn);