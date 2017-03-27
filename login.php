<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/db.php";
index($_POST);
function index($post)
{
    if (checkUser($post["username"], $post["password"])) {
        echo "ok";
    } else {
        echo "notOk";
    }
}

function checkUser($user, $password)
{
//    insertMe();
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
