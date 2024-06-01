<?php

include_once 'models/users.php';
include_once 'function/main.php';
include_once 'app/config/static.php';

class WriterController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if($user_role == '2'){
            view('writer/index', ['url' => 'dashboard-writer']);
        }else{
            header('location: restricted');
        }
    }
}