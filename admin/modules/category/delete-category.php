<?php
    require "../../../config/connection.php";

    $sqlDeleteCategoryById = "DELETE FROM dbo.category WHERE category_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlDeleteCategoryById, $params);
    if ($stmt === false) {
        header('location:../../index.php?manage=category&error=delete');
    }
    else {
        header('location:../../index.php?manage=category&success=delete');
    }

    // close connection
    sqlsrv_close($conn);