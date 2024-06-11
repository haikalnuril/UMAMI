<?php

include_once 'models/users.php';
include_once 'models/recipes.php';
include_once 'function/main.php';
include_once 'app/config/static.php';


class AdminController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if ($user_role == '1'){
            view('admin/dashboard', ['url' => 'dashboard-admin','recipes' => Recipe::select($_SESSION['user']['id']), 'users' => User::select($_SESSION['user']['id']), 'categories' => Category::select($_SESSION['user']['id'])]);
        }
        else{
            header('location: restricted');
        }
    }
    static function laporan(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if ($user_role == '1'){
            view('admin/laporan', ['url' => 'dashboard-admin/laporan', 'recipes' => Recipe::select($_SESSION['user']['id']), 'users' => User::select($_SESSION['user']['id'])]);
        }
        else{
            header('location: restricted');
        }
    }
}