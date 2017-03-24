<?php
require_once __DIR__ . "/vendor/autoload.php";
$input = [];
$input['user'] = [];
$input['play'] = [];
foreach ($_POST as $key => $value) {
    if (is_user($value)) {
        if (!user_exists($value)){
            $db = db();
            $db->insert("test",["username" => $input['user']]);
        }
    } else {
        $input['play'][] = $value;
    }
}
