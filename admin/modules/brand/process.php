<?php
    if (isset($_POST['create'])) {
        if ($_POST['brand-name'] == "") {
            echo '<script language="javascript">';
            echo 'alert("Xin hãy điền đầy đủ thông tin!")';
            echo '</script>';
        }
        else {
            require "../../../config/connection.php";
            
            $sqlCheckValidBrandName = "SELECT brand_name FROM dbo.brand WHERE brand_name = ?";
            $params = array($_POST['brand-name']);
            $check = sqlsrv_query( $conn, $sqlCheckValidBrandName, $params);
            if ($row = sqlsrv_fetch_array( $check, SQLSRV_FETCH_ASSOC)) {
                header('location:../../index.php?manage=brand&error=create');
            }
            else {
                $sqlInsertBrand = "INSERT INTO dbo.brand (brand_name) VALUES (?)";
                $stmt = sqlsrv_query( $conn, $sqlInsertBrand, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                header('location:../../index.php?manage=brand&success=create');
            }

            // close connection
            sqlsrv_close($conn);
        }
    }
    else if (isset($_POST['update'])) {
        require "../../../config/connection.php";
        
        $sqlUpdateBrand = "UPDATE dbo.brand SET brand_name = ? WHERE brand_id = ?";
        $params = array($_POST['brand-name'], $_POST['brand-id']);
        $stmt = sqlsrv_query( $conn, $sqlUpdateBrand, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        header('location:../../index.php?manage=brand&success=update');
        
        // close connection
        sqlsrv_close($conn);
    }