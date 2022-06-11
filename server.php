<?php

/* $host = "localhost";
$user = "litrasof_acpn";
$password = "Applied1010.";
$dbName = "litrasof_acpn";

$connectdb = mysqli_connect($host, $user, $password, $dbName); */

$host = "localhost";
$user = "onostarmedia";
$password = "yMcmb@her0123";
$dbName = "acpn_delta";

$dsn = "mysql:host=".$host.";dbname=".$dbName;
$connectdb = new PDO($dsn, $user, $password);
$connectdb->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$connectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
ini_set('smtp_port', 587);