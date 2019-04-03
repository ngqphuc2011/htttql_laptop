<?php
    function date_normalizer($d){
        if($d instanceof date){
            return $d->getTimestamp();
        } else {
            return strtotime($d);
        }
    }
    //Date params
    $from_date = "2019/01/01";
    $to_date = "2019/04/01";

    //Connection
    $serverName = "DESKTOP-B238NK5";
    $username = "sa";
    $password = "1";
    $dbName = "laptophd";
    $connectionInfo = array("Database"=>$dbName, "UID"=>$username, "PWD"=>$password);
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn === false ) {
        die( print_r(sqlsrv_errors(), true));
    }
    //Queries
    $sqlGetAllOrder = "SELECT * FROM [dbo].[cart]";

    $sqlGetOrdDetailByProduct = "SELECT * FROM [dbo].[cart_detail] WHERE procuct_id = ?";
    //Query for cart
    $sqlGetOrderBtwDate = "SELECT * FROM [dbo].[cart] WHERE cart_date BETWEEN '" . $from_date . "' AND  '" . $to_date . "'";
    $sqlGetOrderByCustomer = "SELECT * FROM [dbo].[cart] WHERE customer_id = ?";
    $sqlGetOrderByStock = "SELECT * FROM [dbo].[cart] WHERE stock_id = ?";
    $resultArray = [];
    $query = sqlsrv_query($conn, $sqlGetOrderBtwDate);
    if( $query === false){
        die( print_r(sqlsrv_errors(), true));
    }
    while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        array_push($resultArray, $result);
        echo $result["cart_id"].PHP_EOL."";
        echo $result["customer_id"].PHP_EOL."";
        echo $result["stock_id"].PHP_EOL."";
        echo $result["cart_price"].PHP_EOL."";
    }
    //"Debug"
    echo json_encode($resultArray);  

    $fp = fopen('order-statistics.json', 'w');
    fwrite($fp, json_encode($resultArray));
    fclose($fp);
?>