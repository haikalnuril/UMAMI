<?php

include_once 'models/users.php';
include_once 'function/main.php';
include_once 'app/config/static.php';


class AuthController {
    static function index(){
        view('auth/landingpage', ['url' => 'index']);
    }
    static function login(){
        view('auth/login', ['url' => 'login']);
    }
    static function register(){
        view('auth/register', ['url' => 'register']);
    }
    static function sessionLogin(){
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'email' => $post['email'], 
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            header('Location: dashboard-admin');
        }
        else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }
}