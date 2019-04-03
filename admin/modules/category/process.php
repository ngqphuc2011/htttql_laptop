<?php
    if (isset($_POST['create'])) {
        if ($_POST['category-name'] == "") {
            echo '<script language="javascript">';
            echo 'alert("Xin hãy điền đầy đủ thông tin!")';
            echo '</script>';
        }
        else {
            require "../../../config/connection.php";
            
            $sqlCheckValidCategoryName = "SELECT category_name FROM dbo.category WHERE category_name = ?";
            $params = array($_POST['category-name']);
            $check = sqlsrv_query( $conn, $sqlCheckValidCategoryName, $params);
            if ($row = sqlsrv_fetch_array( $check, SQLSRV_FETCH_ASSOC)) {
                header('location:../../index.php?manage=category&error=create');
            }
            else {
                $sqlInsertCategory = "INSERT INTO dbo.category (category_name) VALUES (?)";
                $stmt = sqlsrv_query( $conn, $sqlInsertCategory, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                header('location:../../index.php?manage=category&success=create');
            }

            // close connection
            sqlsrv_close($conn);
        }
    }
    else if (isset($_POST['update'])) {
        require "../../../config/connection.php";
        
        $sqlUpdateCategory = "UPDATE dbo.category SET category_name = ? WHERE category_id = ?";
        $params = array($_POST['category-name'], $_POST['category-id']);
        $stmt = sqlsrv_query( $conn, $sqlUpdateCategory, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        header('location:../../index.php?manage=category&success=update');
        
        // close connection
        sqlsrv_close($conn);
    }