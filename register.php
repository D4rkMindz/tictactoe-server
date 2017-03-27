<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/db.php";

index($_POST);
function index($post)
{
    if ($post['password1'] != $post['password2']) {
        echo "notOk";
    } else if (!userExists($post["username"])) {
        echo "userExists";
    } else if (insertUser($post["username"], $post["email"], $post['password1'])) {
        echo "ok";
    } else {
        echo "notOk";
    }
}

function insertUser($username, $email, $password)
{
    $query = db()->newQuery()->insert([
        "username",
        "password",
        "email"
    ])
        ->into("users")
        ->values([
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "email" => $email
        ]);
    $query->execute();
    return true;
}

function userExists($user)
{
//    insertMe();
    $db = db()->newQuery();
    $query = $db->select("*")->from("users")->where(["username" => $user]);
    $row = $query->execute()->fetch();
    if (empty($row)) {
        return true;
    }
    return false;
}