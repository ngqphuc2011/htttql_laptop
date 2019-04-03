<?php
    if (isset($_POST['create'])) {
        require "../../../config/connection.php";

        // Get product brand NAME by ID
        $sqlReadBrandById = "SELECT * FROM dbo.brand WHERE brand_id = ?";
        $params = array($_POST['product-brand']);
        $stmt = sqlsrv_query( $conn, $sqlReadBrandById, $params);
        $brand = sqlsrv_fetch_array($stmt);
    
        // Insert record to database
        $sqlInsertProduct = "INSERT INTO dbo.product 
                            (category_id, brand_id, stock_id, product_name, product_price, product_desc, product_quantity, product_img) 
                            VALUES (?,?,?,?,?,?,?,?)";
        $params = array(
            $_POST['product-category'],
            $_POST['product-brand'],
            $_POST['product-stock'],
            $_POST['product-name'],
            $_POST['product-price'],
            $_POST['product-desc'],
            $_POST['product-quantity'],
            'img/' . $brand['brand_name'] . '/' . $_FILES['product-img']['name']
        );
        $stmt = sqlsrv_query( $conn, $sqlInsertProduct, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Upload product image to server
        $target_dir = "../../../img/" . $brand['brand_name'] . "/";
        $file_name = basename($_FILES["product-img"]["name"]);
        $target_file = $target_dir . $file_name;
        $supportedType = array("jpg", "jpeg", "png", "gif");
        $isReadyToUpload = true;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) $isReadyToUpload = false;
        // Check if file is of supported type
        $isFileSupported = in_array($fileType, $supportedType);
        if (!$isFileSupported) $isReadyToUpload = false;

        // Upload process
        if (!$isReadyToUpload) {
            echo "<div class='alert alert-danger' role='alert'>"."Your file was not uploaded! Please check your file and try again!"."</div>";
            $isUploadedSuccessfully = false;
        }
        else {
            // Proceed to upload the file
            if (move_uploaded_file($_FILES["product-img"]["tmp_name"], $target_file)) {
                $isUploadedSuccessfully = true;
            } else {
                $isUploadedSuccessfully = false;
                header('location:../../index.php?manage=product&error=create');
            }
        }

        header('location:../../index.php?manage=product&success=create');

        // close connection
        sqlsrv_close($conn);
    }
    else if (isset($_POST['update'])) {
        require "../../../config/connection.php";
        
        // Get product brand NAME by ID
        $sqlReadBrandById = "SELECT * FROM dbo.brand WHERE brand_id = ?";
        $params = array($_POST['product-brand']);
        $stmt = sqlsrv_query( $conn, $sqlReadBrandById, $params);
        $brand = sqlsrv_fetch_array($stmt);
    
        // Insert record to database
        $sqlUpdateProduct = "UPDATE dbo.product 
                            SET category_id = ?, brand_id = ?, stock_id = ?, product_name = ?, product_price =?, product_desc = ?, product_quantity = ?, product_img = ?
                            WHERE product_id = ?";
        $params = array(
            $_POST['product-category'],
            $_POST['product-brand'],
            $_POST['product-stock'],
            $_POST['product-name'],
            $_POST['product-price'],
            $_POST['product-desc'],
            $_POST['product-quantity'],
            'img/' . $brand['brand_name'] . '/' . $_FILES['product-img']['name'],
            $_POST['product-id']
        );
        $stmt = sqlsrv_query( $conn, $sqlUpdateProduct, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Upload product image to server
        $target_dir = "../../../img/" . $brand['brand_name'] . "/";
        $file_name = basename($_FILES["product-img"]["name"]);
        $target_file = $target_dir . $file_name;
        $supportedType = array("jpg", "jpeg", "png", "gif");
        $isReadyToUpload = true;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) $isReadyToUpload = false;
        // Check if file is of supported type
        $isFileSupported = in_array($fileType, $supportedType);
        if (!$isFileSupported) $isReadyToUpload = false;

        // Upload process
        if (!$isReadyToUpload) {
            echo "<div class='alert alert-danger' role='alert'>"."Your file was not uploaded! Please check your file and try again!"."</div>";
            $isUploadedSuccessfully = false;
        }
        else {
            // Proceed to upload the file
            if (move_uploaded_file($_FILES["product-img"]["tmp_name"], $target_file)) {
                $isUploadedSuccessfully = true;
            } else {
                $isUploadedSuccessfully = false;
                header('location:../../index.php?manage=product&error=update');
            }
        }

        header('location:../../index.php?manage=product&success=update');

        // close connection
        sqlsrv_close($conn);
    }