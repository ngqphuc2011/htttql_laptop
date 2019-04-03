<?php include('../utils/utilities.php'); ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang quản lý - Hệ thống Kinh doanh Máy tính xách tay</title>
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/chart.js/dist/Chart.min.css">
    <link rel="stylesheet" href="src/css/main.css">
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>
    <!-- Navigation bar -->
    <?php include('webpage-components/nav.php'); ?>

    <!-- Header -->
    <?php include('webpage-components/header.php'); ?>

    <!-- Main content -->
    <script src="lib/NicEdit/nicEdit.js"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <?php include('webpage-components/content.php'); ?>

    <!-- Footer -->
    <!-- <?php include('webpage-components/footer.php'); ?> -->

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="src/js/main.js"></script>
</body>

</html>