<?php
    function renderAside() {
        $manage = isset($_GET['manage']) ? $_GET['manage'] : '';
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        if ($action) {
            include('modules/' . $manage . '/' . $action . '-' . $manage . '.php');
        }
        else {
            include('modules/' . $manage . '/' . 'create' . '-' . $manage . '.php');
        }
    }
    
    function renderAllData() {
        $manage = isset($_GET['manage']) ? $_GET['manage'] : '';
        include('modules/' . $manage . '/' . 'read' . '-' . $manage . '.php');
    }

    function emptyCart() {
        session_start();
        $_SESSION['product-in-cart'] = array();
        $_SESSION['product-quantity'] = array();
        $_SESSION['product-subtotal'] = array();
        $_SESSION['cart-total'] = 0;
    }

    function lastInsertId($queryId) {
        sqlsrv_next_result($queryId);
        sqlsrv_fetch($queryId);
        return sqlsrv_get_field($queryId, 0);
    }