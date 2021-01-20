<?php
include(dirname(__FILE__) . '/INTER-Mediator/params.php');

$mysql_host = getenv('MYSQL_HOST');
$pgsql_host = getenv('POSTGRES_HOST');
$dbDSN_PGSQL = "pgsql:host={$pgsql_host};port=5432;dbname=test_db";
$dbDSN_MYSQL = "mysql:host={$mysql_host};dbname=test_db;charset=utf8";

$dbDSN = $dbDSN_PGSQL;

$activateClientService = false;  // Default is TRUE!!. (In case of debuging phase, it should be false.)
$preventSSAutoBoot = true;
$notUseServiceServer = true;
