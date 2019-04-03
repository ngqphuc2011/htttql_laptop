<?php
    // Giang's Laptop: DESKTOP-B238NK5
    // Giang's Desktop: DESKTOP-P4LC40P
    // Phuc's Laptop: DESKTOP-ATUH7UU
    // Khanh's Laptop: DESKTOP-9P63LEP\SQLSERVER2017

    $serverName = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $username = "sa";
    $password = "1";
    $dbName = "laptop";

    $connectionInfo = array("Database"=>$dbName, "UID"=>$username, "PWD"=>$password, "CharacterSet"=>"UTF-8");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if($conn === false) {
        die( print_r( sqlsrv_errors(), true));
    }