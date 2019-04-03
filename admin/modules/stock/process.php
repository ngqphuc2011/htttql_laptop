<?php
    if (isset($_POST['create'])) {
        if ($_POST['stock-name'] == "") {
            echo '<script language="javascript">';
            echo 'alert("Xin hãy điền đầy đủ thông tin!")';
            echo '</script>';
        }
        else {
            require "../../../config/connection.php";
            
            $sqlCheckValidStockName = "SELECT stock_name FROM dbo.stock WHERE stock_name = ?";
            $params = array($_POST['stock-name']);
            $check = sqlsrv_query( $conn, $sqlCheckValidStockName, $params);
            if ($row = sqlsrv_fetch_array( $check, SQLSRV_FETCH_ASSOC)) {
                header('location:../../index.php?manage=stock&error=create');
            }
            else {
                $sqlInsertStock = "INSERT INTO dbo.stock (stock_name) VALUES (?)";
                $stmt = sqlsrv_query( $conn, $sqlInsertStock, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                header('location:../../index.php?manage=stock&success=create');
            }

            // close connection
            sqlsrv_close($conn);
        }
    }
    else if (isset($_POST['update'])) {
        require "../../../config/connection.php";
        
        $sqlUpdateStock = "UPDATE dbo.stock SET stock_name = ? WHERE stock_id = ?";
        $params = array($_POST['stock-name'], $_POST['stock-id']);
        $stmt = sqlsrv_query( $conn, $sqlUpdateStock, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        header('location:../../index.php?manage=stock&success=update');
        
        // close connection
        sqlsrv_close($conn);
    }