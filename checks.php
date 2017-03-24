<?php
function is_user($input) {
    if (!is_numeric($input)){
        return true;
    }
    return false;
}
function user_exists($user){
    $db = db();
    $query = $db->newQuery()->select("*")->from("test")->where(["username" => $user]);
    $row = $query->execute()->fetch("Assoc");
    if (!empty($row)){
        return true;
    }
    return false;
}