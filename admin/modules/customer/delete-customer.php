<?php
    require "../../../config/connection.php";

    $sqlDeleteCustomerById = "DELETE FROM dbo.customer WHERE customer_id = ?";
    $params = array($_GET['id']);
    $stmt = sqlsrv_query( $conn, $sqlDeleteCustomerById, $params);
    if ($stmt === false) {
        header('location:../../index.php?manage=customer&error=delete');
    }
    else {
        header('location:../../index.php?manage=customer&success=delete');
    }

    // close connection
    sqlsrv_close($conn);