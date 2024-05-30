<?php

include_once 'models/users.php';
include_once 'function/main.php';
include_once 'app/config/static.php';

class AdminController{
    static function index(){
        view('admin/dashboard', ['url' => 'dashboard']);
    }
}