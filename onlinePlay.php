<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/db.php";

index($_POST);
function index($post) {
    $onlineplayers = getOnlinePlayers();
    $result = json_encode($onlineplayers);
    echo $result;
}

function getOnlinePlayers(){
    $query = db()->newQuery();
    $query->select("*")->from("users")->where(["online"=> 1]);
    $row = $query->execute()->fetchAll("assoc");
    return $row;
}
