<?php
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
