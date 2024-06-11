<?php

include_once 'models/users.php';
include_once 'models/recipes.php';
include_once 'models/categories.php';
include_once 'models/comments.php';
include_once 'function/main.php';
include_once 'app/config/static.php';


class AuthController {
    static function index(){
        view('auth/landingpage', ['url' => 'index']);
    }
    static function restricted(){
        view('restricted',['url'=> 'restricted']);
    }
    static function resep(){
        view('resep',['url'=> 'resep', 'recipes' => Recipe::finds($_GET['slug']), 'users' => User::select($_SESSION['user']['id']), 'category' => Category::select($_SESSION['user']['id']), 'comments' => Comment::select($_SESSION['user']['id'])]);
    }
    static function comment(){
        if (!isset($_SESSION['user'])) {
            header('Location: login');
        }else{
            $post = array_map('htmlspecialchars', $_POST);
            $comment = Comment::insert(
                $post['recipe_id'],
                $_SESSION['user']['id'],
                $post['komen'],
                date('Y-m-d H:i:s')
            );
            if ($comment) {
                header('Location: resep?slug='.$post['slug']);
                exit();
            }else{
                echo ('Terjadi Kesalahan');
            }
        }
    }
    static function login(){
        view('auth/login', ['url' => 'login']);
    }
    static function register(){
        view('auth/register', ['url' => 'register']);
    }
    static function sessionLogin(){
        $post = array_map('htmlspecialchars', $_POST);
        $requiredFields = [ 'email', 'password'];
        foreach ($requiredFields as $field) {
            if (empty(trim($post[$field]))) {
                http_response_code(400);
                echo json_encode(['message' => 'Harap isi semua kolom yang diperlukan!']);
                exit();
            }
        }
        $user = User::login([
            'email' => $post['email'], 
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            if($user['role_id'] == '1'){
                $_SESSION['user'] = $user;
                header('Location: dashboard-admin');
            }
            elseif($user['role_id'] == '2'){
                $_SESSION['user'] = $user;
                header('Location: dashboard-writer');
            }
            elseif($user['role_id'] == '3'){
                $_SESSION['user'] = $user;
                header('Location: dashboard');
            }
        }
        else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }
    static function newRegister(){
        $post = array_map('htmlspecialchars', $_POST);
        $requiredFields = ['username', 'password', 'email', 'role_id'];
        foreach ($requiredFields as $field) {
            if (empty(trim($post[$field]))) {
                http_response_code(400);
                echo json_encode(['message' => 'Harap isi semua kolom yang diperlukan!']);
                exit();
            }
        }
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode(['message' => 'Email tidak valid!']);
            exit();
        }
    
        try {
            $existingUser = User::findUserByUsernameOrEmail( $post[ 'username' ], $post[ 'email' ] );
    
            if ( $existingUser ) {
                if ( $existingUser[ 'username' ] === $post['username'] ) {
                    throw new Exception( 'Username already taken' );
                }
    
                if ( $existingUser[ 'email' ] === $post[ 'email' ] ) {
                    throw new Exception( 'Email already in use' );
                }
            }

            User::register([
                'username' => $post['username'],
                'password' => $post[ 'password' ],
                'email' => $post[ 'email' ],
                'role_id' => $post[ 'role_id' ],
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' )
            ]);
    
            exit();
        }
        catch ( Exception $e ) {
            http_response_code(400);
            echo json_encode(['message' => $e->getMessage()]);
            exit();
        }
    }
    
    static function back(){
        $user_role = $_SESSION['user']['role_id'];
        if ($user_role == '2') {
            header('Location:' .BASEURL. 'dashboard-writer');
        }
        elseif ($user_role == '1') {
            header('Location:' .BASEURL. 'dashboard-admin');
        }
        elseif ($user_role == '3') {
            header('Location:' .BASEURL. 'dashboard');
        }
        else {
            header('Location:' .BASEURL. 'index');
        }
    }
}