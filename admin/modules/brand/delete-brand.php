<?php
    require "../../../config/connection.php";

    $sqlDeleteBrandById = "DELETE FROM dbo.brand WHERE brand_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlDeleteBrandById, $params);
    if ($stmt === false) {
        header('location:../../index.php?manage=brand&error=delete');
    }
    else {
        header('location:../../index.php?manage=brand&success=delete');
    }

    // close connection
    sqlsrv_close($conn);