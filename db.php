<?php
require_once __DIR__ . "/vendor/autoload.php";
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;

function db()
{
    static $db = null;
    if ($db === null) {
        $driver = new Mysql([
            'host' => "127.0.0.1",
            'database' => "test",
            'username' => "root",
            'password' => "",
            'prefix' => '',
            'flags' => [
                // Enable exceptions
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // Set default fetch mode
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ]);
        $db = new Connection([
            'driver' => $driver
        ]);
        $db->connect();
    }
    return $db;
}

//function db()
//{
//    static $db = null;
//    if ($db === null) {
//        $driver = new \Cake\Database\Driver\Mysql([
//            'host' => "127.0.0.1",
////            'port' => $config['port'],
//            'database' => "test",
//            'username' => "root",
//            'password' => "",
////            'encoding' => $config['encoding'],
////            'charset' => "utf8mb4_unicode",
////            'collation' => "utf8mb4_unicode_ci",
//            'prefix' => '',
//            'flags' => [
//                // Enable exceptions
//                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                // Set default fetch mode
//                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                PDO::ATTR_PERSISTENT => false,
//                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
//            ]
//        ]);
//        $db = new \Cake\Database\Connection([
//            'driver' => $driver
//        ]);
//        $db->connect();
//    }
//    return $db;
//}
