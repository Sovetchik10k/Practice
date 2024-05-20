<?php

// phpinfo();

$serverName = "HOME-PC";
$connectionOptions = array(
    "Database" => "ParkingSystem",
    "TrustServerCertificate" => true,
    "Encrypt" => true,
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT 1";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
