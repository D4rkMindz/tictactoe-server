<?php


namespace App\Controller;


class LoginController
{
    public function index($post){
        $userinfo = [];
        foreach ($post as $key=>$value){
            $userinfo[] = $value;
        }
        echo true;
    }
}