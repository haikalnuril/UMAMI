<?php

include_once 'models/users.php';
include_once 'function/main.php';
include_once 'app/config/static.php';


class AuthController {
    static function login(){
        view('auth/login', ['url' => 'login']);
    }
}