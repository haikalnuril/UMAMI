<?php

include_once 'models/users.php';
include_once 'function/main.php';
include_once 'app/config/static.php';

class ReaderController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if($user_role == '3'){
            view('reader/index', ['url' => 'dashboard', 'recipes' => Recipe::select($_SESSION['user']['id']), 'users' => User::select($_SESSION['user']['id']), 'categories' => Category::select($_SESSION['user']['id'])]);
        }else{
            header('location: restricted');
        }
    }
}