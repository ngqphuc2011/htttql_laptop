<?php
    if (isset($_POST['create'])) {
        if ($_POST['customer-name'] == "") {
            echo '<script language="javascript">';
            echo 'alert("Xin hãy điền đầy đủ thông tin!")';
            echo '</script>';
        }
        else {
            require "../../../config/connection.php";
            
            $sqlCheckValidCustomerName = "SELECT customer_name FROM dbo.customer WHERE customer_name = ?";
            $param = array($_POST['customer-name']);
            $check = sqlsrv_query( $conn, $sqlCheckValidCustomerName, $param);
            if ($row = sqlsrv_fetch_array( $check, SQLSRV_FETCH_ASSOC)) {
                header('location:../../index.php?manage=customer&error=create');
            }
            else {
                $sqlInsertCustomer = "INSERT INTO dbo.customer 
                                        (customer_name, customer_email, customer_password, customer_address)
                                        VALUES (?,?,?,?)";
                $name = $_POST['customer-name'];
                $email = $_POST['customer-email'];
                $pass = $_POST['customer-password'];
                $address = $_POST['customer-address'];
                $params = array($name, $email, $pass, $address);
                $stmt = sqlsrv_query( $conn, $sqlInsertCustomer, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                header('location:../../index.php?manage=customer&success=create');
            }

            // close connection
            sqlsrv_close($conn);
        }
    }
    else if (isset($_POST['update'])) {
        require "../../../config/connection.php";
        
        $sqlUpdateCustomer = "UPDATE dbo.customer SET 
                                customer_name = ?,
                                customer_email = ?,
                                customer_password =?, 
                                customer_address = ? 
                                WHERE customer_id = ?";
        $name = $_POST['customer-name'];
        $email = $_POST['customer-email'];
        $pass = $_POST['customer-password'];
        $address = $_POST['customer-address'];
        $id = $_POST['customer-id'];
        $params = array($name, $email, $pass, $address, $id);
        $stmt = sqlsrv_query( $conn, $sqlUpdateCustomer, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        header('location:../../index.php?manage=customer&success=update');
        
        // close connection
        sqlsrv_close($conn);
    }