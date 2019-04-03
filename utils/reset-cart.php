<?php
    session_start();
    $_SESSION['product-in-cart'] = array();
    $_SESSION['product-quantity'] = array();
    $_SESSION['product-subtotal'] = array();
    $_SESSION['cart-total'] = 0;
    
    header('location:../cart.php');