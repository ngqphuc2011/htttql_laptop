<?php
    session_start();
    if (isset($_GET['stock'])) {
        $_SESSION['stock'] = $_GET['stock'];
    }
    header('location:index.php?manage=chart');