<?php
require_once __DIR__ . "/vendor/autoload.php";
index($_POST);
function index($post)
{
    $userinfo = [];
    foreach ($post as $key => $value) {
        $userinfo[] = $value;
    }
    if (checkUser($_POST["username"], $_POST["password"])) {
        echo "ok";
    } else {
        echo "notOk";
    }
}

function checkUser($user, $password)
{

    $db = db()->newQuery();
    $query = $db->select("*")->from("users")->where(["username" => $user]);
    $row = $query->execute()->fetch();
    if (password_verify($password, $row[2])) {
        return true;
    }
    return false;
}

function insertMe()
{
    $db = db();
    $db->insert("users", [
        "username" => "bjoern",
        "password" => password_hash("bjoern", PASSWORD_DEFAULT)
    ]);
}

function db()
{
    static $db = null;
    if ($db === null) {
        $driver = new \Cake\Database\Driver\Mysql([
            'host' => "127.0.0.1",
//            'port' => $config['port'],
            'database' => "tic-tac-toe",
            'username' => "root",
            'password' => "",
//            'encoding' => $config['encoding'],
//            'charset' => "utf8mb4_unicode",
//            'collation' => "utf8mb4_unicode_ci",
            'prefix' => '',
            'flags' => [
                // Enable exceptions
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // Set default fetch mode
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
            ]
        ]);
        $db = new \Cake\Database\Connection([
            'driver' => $driver
        ]);
        $db->connect();
    }
    return $db;
}